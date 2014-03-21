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

	public $hasOne = 'Customer';

	public $validate = array(
        'name' => array(
            'rule' => 'notEmpty'
        ),
        'email' => array(
            'rule' => 'notEmpty'
        ),
                'Address' => array(
            'rule' => 'notEmpty'
        ),
        'address' => array(
            'rule' => 'notEmpty'
        ),
        'zipcode' => array(
            'rule' => 'notEmpty'
        ),
        'city' => array(
            'rule' => 'notEmpty'
        ),
        'country' => array(
            'rule' => 'notEmpty'
        )
    );

}
?>