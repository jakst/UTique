<?php
class Payment extends AppModel {

    public $hasOne= 'Order';

    public $validate = array(
            'card_number' => array(
                'rule' => array('cc', 'all', false, null)
            ),
            'expiry_date' => array(
                'rule' => 'notEmpty'
            )
        );
}
?>