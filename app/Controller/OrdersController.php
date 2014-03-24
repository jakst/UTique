<?php
class OrdersController extends AppController {

	public function view($id = null) {

	}

	public function add_information(){

	}

	public function create_order(){	
		$data = array(
			'Order' => array(
				'status' => 'oklar',
				'datetime' => date('Y-m-d H:i:s'),
				'user_id' => 1337
			),
			'Item' => array(
				'1',
				'2'
				)
		);

		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($data)){
				if ($this->Order->Customer->save($this->request->data)){
					$this->Payment = ClassRegistry::init('Payment');
					$this->Payment->set('order_id', $this->Order->id);
           			if ($this->Payment->save($this->request->data)) {
                		return $this->redirect(array('action' => 'confirm_order'));
           			}
           		}
           	}   			
        }
		/*$h = $this->Item->find('list');
		print_r($h);*/

	}
	public function confirm_order(){

	}

}
?>