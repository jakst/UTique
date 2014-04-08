<?php
class Item extends AppModel {
	public $hasOne = 'InventoryItem';
	public $hasMany = 'OrderItem';
}
?>