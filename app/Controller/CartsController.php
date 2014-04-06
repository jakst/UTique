<?php
class CartsController extends AppController {
	
	public function view() {
	//$this->Session->setFlash($errorMessage, 'flash/error');
	
		// if($this->InventoryItem->lastErrorMessage) {
			// $this->Session->setFlash($this->InventoryItem->lastErrorMessage, 'flash/error');
		// }	
	}
	
	public function empty_cart() {
		$this->Session->delete('Cart');
		$this->redirect(array('controller' => 'carts', 'action' => 'view'));
	}
}
?>