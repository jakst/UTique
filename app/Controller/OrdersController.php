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
					'status' => 'Oklar',
					'price' => 0,
					'shipping' => $this->Session->read('Shipping')
				);
				
				foreach ($cart as $tee) {
					foreach ($tee['sizes'] as $orderItem) {
						$data['OrderItem'][] = $orderItem;
						$data['Order']['price'] += $orderItem['amount']*$orderItem['price'];
					}
				}
				
				$user = $this->Auth->user();
				if (!empty($user['customer_id'])) {
					$customer = $this->Order->Customer->findById($user['customer_id']);
					$this->Session->write('Customer', $customer['Customer']);
					$data['Order']['customer_id'] = $user['customer_id'];
				} else if ($this->Order->Customer->save($data['Customer'])) {
					$this->Session->write('Customer', $data['Customer']);
					$data['Order']['customer_id'] = $this->Order->Customer->id;
					$this->Session->write('Customer', $data['Customer']);
					if ($this->Auth->loggedIn()) {
						$this->Session->write('Auth.User.customer_id', $this->Order->Customer->id);
					}
				}
				
				unset($data['Customer']);
				
				$this->Order->create();
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
	
	public function confirm_order(){
		$this->set('cart', $this->Session->read('Cart'));
		$this->set('customer', $this->Session->read('Customer'));
		$this->Session->delete('Cart');
		$this->Session->delete('Customer');
	}
	
	public function history(){
		$user = $this->Auth->user();
		$customer = $user['customer_id'];
		
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
			$this->Order->Behaviors->load('Containable');
			$this->Order->contain('OrderItem.Tee');
			$order = $this->Order->findById($id);
			
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