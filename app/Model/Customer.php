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
              'rule' => array('between', 5,5),
              'message' => 'Postnumret måste vara 5 siffror långt'
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