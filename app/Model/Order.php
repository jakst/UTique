<?php
class Order extends AppModel {
	public $hasMany = array(
		'OrderItem'
	);

	public $hasOne = array(
		'Customer',
		'Payment'
	);
}
?>