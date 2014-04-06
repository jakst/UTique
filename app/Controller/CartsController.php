<?php
class CartsController extends AppController {
	
	public function view() {
					

	}
	
	public function empty_cart() {
		$this->Session->delete('Cart');
		$this->redirect(array('controller' => 'carts', 'action' => 'view'));
	}
}
?>