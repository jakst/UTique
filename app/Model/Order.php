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
		$inventoryItems = $inventory->find('all');
		$data['InventoryItem'] = Hash::combine($inventoryItems, '{n}.InventoryItem.id', '{n}.InventoryItem');
		
		$items = array();
		foreach ($data['InventoryItem'] as $item) {
			$tee = $item['tee_id'];
			$size = $item['size'];
			$items[$tee][$size] = $item;
		}
		
		foreach ($cart as $id => $tee) {
			foreach ($tee['sizes'] as $size => $item) {
				if($items[$id][$size]['amount'] - $item['amount'] < 0){
					$errorMessage = "Tyvärr finns det bara ".$items[$id][$size]['amount']." st. kvar i lager av t-shirt <em>".$tee['Tee']['name']."</em> i storlek ".$size.". Var god ändra din beställning.";
					return false;
				}
				
				$data['InventoryItem'][$id]['amount'] -= $item['amount'];
			}
		}
		
		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				$inventory->save($data['InventoryItem'][$id]);
			endforeach;
		endforeach;

		$this->data['Order']['status'] = 'Bekräftad';
		return true;
	}
}
?>