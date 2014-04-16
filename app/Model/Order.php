<?php
App::uses('CakeSession', 'Model/Datasource');

class Order extends AppModel {
	public $hasOne = 'Payment';
	public $hasMany = 'OrderItem';
	public $belongsTo = 'Customer';
	
	public function beforeSave($options = array()){
		$cart = CakeSession::read('Cart');
		$inventory = ClassRegistry::init('InventoryItem');
		$inventory->recursive = -1;
		$inventoryItems = Hash::combine($inventory->find('all'), '{n}.InventoryItem.id', '{n}.InventoryItem');
		
		$items = array();
		foreach ($inventoryItems as $item) {
			$tee = $item['tee_id'];
			$size = $item['size'];
			$items[$tee][$size] = $item;
		}
		
		$updatedItems = array();
		
		foreach ($cart as $id => $tee) {
			foreach ($tee['sizes'] as $size => $item) {
				if($items[$id][$size]['amount'] - $item['amount'] < 0){
					$this->lastErrorMessage = "Tyvärr finns det bara ".$items[$id][$size]['amount']." st. kvar i lager av t-shirt <em>".$tee['Tee']['name']."</em> i storlek ".$size.". Var god ändra din beställning.";
					return false;
				} else {
					$items[$id][$size]['amount'] -= $item['amount'];
					$updatedItems[] = $items[$id][$size];
				}
			}
		}
		
		if ($inventory->saveAll($updatedItems)) {
			$this->data['Order']['status'] = 'Bekräftad';
			return true;
		}
		
		$this->lastErrorMessage = "Okänt fel vid uppdatering av lagerstatus.";
		return false;
	}
}
?>