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
		  'rule' => array('between', 5,5),
		  'message' => 'Postnumret måste vara 5 siffror långt'
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