<?php
class OrdersController extends AppController {
	public function create_order(){
		$data = $this->request->data;
		
		if ($this->request->is('post')) {
			if ($this->Session->check('Cart')) {
				$cart = $this->Session->read('Cart');
				
				$data['Order'] = array(
					'status' => 'oklar',
					'datetime' => date('Y-m-d H:i:s'),
				);
				
				foreach ($cart as $tee) {
					foreach ($tee['sizes'] as $orderItem) {
						$data['OrderItem'][] = $orderItem;
					}
				}
				
				$this->Order->create();
				if ($this->Order->Customer->save($data['Customer'])) {
					$data['Order']['customer_id'] = $this->Order->Customer->id;
					unset($data['Customer']);
					
					if ($this->Order->saveAll($data)) {
						$this->Session->delete('Cart');
						return $this->redirect(array('action' => 'confirm_order'));
					}
				}
			}
		}
	}
	
	public function confirm_order(){

	}
}
?>