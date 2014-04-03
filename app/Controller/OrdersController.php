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
						return $this->redirect(array('action' => 'confirm_order'));
					}
				}
			}
		}
	}
	
	public function confirm_order(){
		$cart = $this->Session->read('Cart');
		

		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $orderItem):
				$size = $cart[$id]['Tee']['sizes'];
				print_r($size);
			endforeach;
		endforeach;

/*		Array ( [13] => Array ( 
			[Tee] => Array ( 
				[id] => 13 
				[name] => If you're happy and you know it... 
				[price] => 189 
				[color] => Blå 
				[sex] => Dam ) 
				[sizes] => Array ( 
					[XS] => Array ( 
						[item_id] => 85 
						[amount] => 2 ) ) ) )*/
						
		// se till att lagersaldot ändras!
		
		$this->Session->delete('Cart');
	}
}
?>