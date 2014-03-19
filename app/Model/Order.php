<?php
class Order extends AppModel {
	public $hasAndBelongsMany = array(
		'Item' => array(
			'className' => 'Item',
			'joinTable' => 'items_orders',
			'foreignKey' => 'item_id',
			'associationForeignKey' => 'order_id'
		)
	);

}
?>