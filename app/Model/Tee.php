<?php
class Tee extends AppModel {
	public $hasMany = array(
		'Item' => array(
			'order' => 'Item.id ASC',
		)
	);
}
?>