<?php
class Customer extends AppModel {

    public $hasMany= 'Order';

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
                'numbers' => array(
                    'rule' => 'alphaNumeric' 
                ),
                /*'fiveDigits' => array(
                    'rule' => array('length', 8)
                )*/
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