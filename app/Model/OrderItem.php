<?php
class OrderItem extends AppModel {
	public $belongsTo = array(
		'Order',
		'Item'
	);
		
}
?>