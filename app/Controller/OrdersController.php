<?php
class OrdersController extends AppController {

	public $uses = array('Order','InventoryItem');

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
		//hämta hur många som finns av det id i databasen, minska med antal köpta och uppdatera
		$cart = $this->Session->read('Cart');

		$inventory = ClassRegistry::init('InventoryItem');
		$inventory->recursive = -1;
		$data['InventoryItem'] = Hash::combine($inventory->find('all'), '{n}.InventoryItem.id', '{n}.InventoryItem');

		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				$item_id = $item['item_id'];
				$data['InventoryItem'][$item_id]['amount'] -= $item['amount'];
				$this->InventoryItem->save($data['InventoryItem'][$item_id]); 
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
		
	//	$this->Session->delete('Cart');
	}
}
?>