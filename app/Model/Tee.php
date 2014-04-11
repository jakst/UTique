<?php
class Tee extends AppModel {
	public $hasMany = array(
		'OrderItem',
		'InventoryItem' => array(
			'conditions' => array('InventoryItem.amount >' => '0')
		)
	);
}
?>