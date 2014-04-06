<?php
class Item extends AppModel {
	public $hasOne = 'OrderItem', 'InventoryItem';
}
?>