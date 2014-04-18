<?php
class OrdersController extends AppController {

	public $helpers = array('Js' => array('Jquery'));
	public $components = array('RequestHandler');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->deny('history', 'view');
	}
	
	public function create_order(){
		$this->set('title_for_layout', 'Orderuppgifter');
		if (($this->referer() != Router::url(array('controller' => 'carts', 'action' => 'view'), true) && $this->referer() != Router::url(array('controller' => 'orders', 'action' => 'create_order'), true)) || !$this->Session->check('Cart')) {
			$this->redirect(array('controller' => 'tees'));
		}
		
		
		$user = $this->Auth->user();
		if ($this->Auth->loggedIn() && !empty($user['customer_id']) && empty($this->request->data['Customer']['load'])) {
			$this->Order->Customer->recursive = -1;
			$customer = $this->Order->Customer->findById($user['customer_id']);
			$this->request->data['Customer'] = $customer['Customer'];
		}
		
		if($this->request->is('post')) {
			$data = $this->request->data;
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
				
				if ($this->Order->Customer->save($data['Customer'])) {
					$id = $this->Order->Customer->id;
					$this->Session->write('Customer', $data['Customer']);
					$data['Order']['customer_id'] = $id;
					
					if ($this->Auth->loggedIn()) {
						$this->Session->write('Auth.User.customer_id', $id);
						$user['customer_id'] = $id;
						$this->Order->Customer->User->save($user);
					}
					
					unset($data['Customer']);
					
					$this->Order->create();
					if ($this->Order->saveAll($data)) {
						$this->redirect(array('action' => 'confirm_order'));
					} else if ($this->Order->lastErrorMessage){
						$this->Session->setFlash($this->Order->lastErrorMessage, 'flash/error');
						$this->redirect(array('controller' => 'carts', 'action' => 'view'));
					}
				}			
			}
		}
	}
	
	public function confirm_order(){
		$this->set('title_for_layout', 'Orderbekräftelse');
		if ($this->referer() != Router::url(array('controller' => 'orders', 'action' => 'create_order'), true) || !$this->Session->check('Cart')) {
			$this->redirect(array('controller' => 'tees'));
		}
		$this->set('cart', $this->Session->read('Cart'));
		$this->set('customer', $this->Session->read('Customer'));
		$this->Session->delete('Cart');
		$this->Session->delete('Customer');
	}
	
	public function history(){
		$this->set('title_for_layout', 'Orderhistorik');
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
			$user = $this->Auth->user();
			$this->Order->Behaviors->load('Containable');
			$this->Order->contain('OrderItem.Tee');
			$order = $this->Order->find('first', array('conditions' => array(
				'id' => $id,
				'customer_id' => $user['customer_id']
			)));
			
			if ($order) {
				$this->set('order', $order);
			} else {
            	throw new NotFoundException(__('Ordern existerar inte'));
			}
		} else {
            throw new NotFoundException(__('Ordern existerar inte'));
		}
	}
	
	public function validate_form() {
		if($this->request->isAjax()){
			
			$this->request->data['Customer'][$this->request['data']['field']] = $this->request['data']['value'];
			$this->request->data['Payment'][$this->request['data']['field']] = $this->request['data']['value'];
			
			if ($this->Order->Customer->validates($this->Order->Customer->set($this->request->data)) && $this->Order->Payment->validates($this->Order->Payment->set($this->request->data))) {
				$this->autoRender = false;
			} else {
				$error = $this->validateErrors($this->Order);
				
				if($this->Order->Customer->validates($this->Order->Customer->set($this->request->data))==false){
					$this->set('error', $this->Order->Customer->validationErrors[$this->request['data']['field']][0]);
				} else {
					$this->set('error', $this->Order->Payment->validationErrors[$this->request['data']['field']][0]); 
				}
			}		
		}
	}	
}
?>