<?php
class OrdersController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('history', 'view');
	}
	
	public function create_order(){
	// kalla på checkInventoryStatus!
		$data = $this->request->data;
		if ($this->request->is('post')) {
			if ($this->Session->check('Cart')) {
				$cart = $this->Session->read('Cart');
				
				$data['Order'] = array(
					'status' => 'oklar',
					'price' => 0
				);
				
				foreach ($cart as $tee) {
					foreach ($tee['sizes'] as $orderItem) {
						$data['OrderItem'][] = $orderItem;
						$data['Order']['price'] += $orderItem['amount']*$orderItem['price'];
					}
				}
				
				$this->Order->create();
				if ($this->Order->Customer->save($data['Customer'])) {
					$data['Order']['customer_id'] = $this->Order->Customer->id;
					$this->Session->write('Customer', $data['Customer']);
					unset($data['Customer']);
					
					if ($this->Order->saveAll($data)) {
						$this->redirect(array('action' => 'confirm_order'));
					} else {
						if($this->Order->lastErrorMessage) {
							$this->Session->setFlash($this->Order->lastErrorMessage, 'flash/error');
						}

						$this->redirect(array('controller' => 'carts', 'action' => 'view'));
					}
				}
			}
		}
	}
	
	public function confirm_order(){
		$cart = $this->Session->read('Cart');
		$this->set('cart', $cart);
		$this->Session->delete('Cart');
	}
	
	public function history(){
		$customer = $this->Auth->user()['customer_id'];
		
		$this->Order->recursive = -1;
		$orders = $this->Order->find('all', array(
			'conditions' => array(
				'customer_id' => $customer)
			)
		);
		$this->set('orders', $orders);
	}
	
	public function view($id = null) {
		if ($id) {
			$order = $this->Order->findById($id);
			$item = $this->Order->OrderItem->Item->findById(1);
			
			if ($order) {
				$this->set('order', $order);
			} else {
            	throw new NotFoundException(__('Ordern existerar inte.'));
			}
		} else {
            throw new NotFoundException(__('Ordern existerar inte.'));
		}
	}
}
?>