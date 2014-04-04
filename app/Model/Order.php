<?php
class Order extends AppModel {
	public $hasMany = array(
		'OrderItem'
	);

	public $hasOne = array(
		'Customer',
		'Payment'
	);

	public function beforeSave($options = Array){
		//hämta hur många som finns av det id i databasen, minska med antal köpta och uppdatera
		$cart = $this->Session->read('Cart');

		$inventory = ClassRegistry::init('InventoryItem');
		$inventory->recursive = -1;
		$data['InventoryItem'] = Hash::combine($inventory->find('all'), '{n}.InventoryItem.id', '{n}.InventoryItem');

		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				$item_id = $item['item_id'];
				$data['InventoryItem'][$item_id]['amount'] -= $item['amount'];
				$this->InventoryItem->save($data['InventoryItem'][$item_id]); 
			endforeach;
		endforeach;

		//$this->Session->delete('Cart');

		return true; 
	}
}
?>