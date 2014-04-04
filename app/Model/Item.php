<?php
class Item extends AppModel {
	public $hasOne = 'InventoryItem';
	public $hasMany = array(
		'OrderItem',
	);
}
?>