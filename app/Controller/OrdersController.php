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

		$customerdata = array(
			'Customer' => array(
				'name' => '',
				'email' => 'ylva_cool_90@hotmai.com',
				'address'=> 'Karamellvägen 4',
				'zipcode' => '44155',
				'city' =>'Alingsås',
				'country' => 'Sweden'
				)

		);

		$this->Order->create();
		$this->Order->save($data);
		$this->Order->Customer->save($this->request->data);


		/*$h = $this->Item->find('list');
		print_r($h);*/
		
	}
}
?>