<?php
App::uses('CakeSession', 'Model/Datasource');

class Order extends AppModel {
	public $hasMany = array(
		'OrderItem'
	);

	public $hasOne = array(
		'Customer',
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
			endforeach;
		endforeach;

		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				$inventory->save($data['InventoryItem'][$item_id]); 
			endforeach;
		endforeach;
		

		$this->Session->delete('Cart');

		return true; 
	}
}
?>