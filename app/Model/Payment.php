<?php
class Payment extends AppModel {

    public $hasOne= 'Order';

    public $validate = array(
            'card_number' => array(
                'rule' => array('cc', 'all', false, null),
                'message' => 'Ange ett korrekt kortnummer'
            ),
            'expiry_date' => array(
                'rule'       => array('date', 'ym'),
      			'message'    => 'Ange ett korrekt utgångsdatum i formatet YY-MM',
     			
            )

        );

}
?>