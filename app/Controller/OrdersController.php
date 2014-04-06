<?php
class OrdersController extends AppController {

	public function create_order(){
	// kalla på checkInventoryStatus! 
		$data = $this->request->data;
		if ($this->request->is('post')) {
			if ($this->Session->check('Cart')) {
				$cart = $this->Session->read('Cart');
				
				$data['Order'] = array(
					'status' => 'oklar'
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
		//hämta hur många som finns av det id i databasen, minska med antal köpta och uppdatera
	//	$cart = $this->Session->read('Cart');

	//	$inventory = ClassRegistry::init('InventoryItem');
		// $inventory->recursive = -1;
		// $data['InventoryItem'] = Hash::combine($inventory->find('all'), '{n}.InventoryItem.id', '{n}.InventoryItem');

		// foreach ($cart as $id => $tee):
		// 	foreach ($tee['sizes'] as $size => $item):
		// 		$item_id = $item['item_id'];
		// 		$data['InventoryItem'][$item_id]['amount'] -= $item['amount'];
		// 		$this->InventoryItem->save($data['InventoryItem'][$item_id]);
		// 	endforeach;
		// endforeach;
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
}
?>