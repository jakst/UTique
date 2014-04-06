<?php
App::uses('CakeSession', 'Model/Datasource');

class Order extends AppModel {
	public $hasMany = array(
		'OrderItem'
	);

	public $hasOne = array(
		'Payment'
	);

	public function beforeSave($options = array()){
		$cart = CakeSession::read('Cart');
		$inventory = ClassRegistry::init('InventoryItem');
		$inventory->recursive = -1;
		$data['InventoryItem'] = Hash::combine($inventory->find('all'), '{n}.InventoryItem.id', '{n}.InventoryItem');

		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				$item_id = $item['item_id'];
				$data['InventoryItem'][$item_id]['amount'] -= $item['amount'];
				if($data['InventoryItem'][$item_id]['amount'] -= $item['amount'] < 0){
					$this->lastErrorMessage = "Tyvärr finns det bara ".$item['amount']." kvar i lager av t-shirt ".$tee['Tee']['name']." i storlek ".$size.". Var god ändra din beställning.";
					return false;
				}
			endforeach;
		endforeach;
		
		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				$inventory->save($data['InventoryItem'][$item_id]);
			endforeach;
		endforeach;

		return true;
	}

	public function afterSave($created, $options = array()){
		$this->Session->delete('Cart');
	}

}
?>