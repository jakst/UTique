<?php
class InventoryItemsController extends AppController {
	public function check_inventory(){
		$cart = $this->Session->read('Cart');
		$this->InventoryItem->recursive = -1;
		$inventoryItems = $this->InventoryItem->find('all');
		$data['InventoryItem'] = Hash::combine($inventoryItems, '{n}.InventoryItem.id', '{n}.InventoryItem');

		$items = array();
		foreach ($data['InventoryItem'] as $item) {
			$tee = $item['tee_id'];
			$size = $item['size'];
			$items[$tee][$size] = $item;
		}
		
		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $item):
				if($items[$id][$size]['amount'] - $item['amount'] < 0){
					$errorMessage = "Tyvärr finns det bara ".$items[$id][$size]['amount']." st. kvar i lager av t-shirt <em>".$tee['Tee']['name']."</em> i storlek ".$size.". Var god ändra din beställning.";
					$this->Session->setFlash($errorMessage, 'flash/error');
					$this->redirect(array('controller' => 'carts', 'action' => 'view'));
				}
			endforeach;
		endforeach;
		
		$this->redirect(array('controller' => 'orders', 'action' => 'create_order'));
	}
}
?>