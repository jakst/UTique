<?php
class Customer extends AppModel {

    public $hasOne = 'User';
    public $hasMany = 'Order';

    public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Vänligen ange ditt namn'
		),
		'email' => array(
			'rule' => 'notEmpty',
			'message' => 'Vänligen ange en giltig email-adress'
		),
		'address' => array(
			'rule' => 'notEmpty',
			'message' => 'Vänligen ange din adress'
		),
		'zipcode' => array(
		  'rule'    => '/^[1-9][0-9]{4}$/i',
		  'message' => 'Ogiltigt postnummer'
		 ),
		'city' => array(
			'rule' => 'notEmpty',
			'message' => 'Vänligen ange din stad'
		),
		'country' => array(
			'rule' => 'notEmpty',
			'message' => 'Vänligen ange ditt land'
		)
	);
}
?>