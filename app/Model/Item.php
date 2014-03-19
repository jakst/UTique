<?php
class Item extends AppModel {
	public $hasAndBelongsToMany = array(
		'Cart',
		'Order'
	);

}
?>