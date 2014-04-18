<?php
class CartsController extends AppController {
	
	public function view() {
		$this->set('title_for_layout', 'Varukorg');
		$shipping = 49;
		$this->Session->write('Shipping', $shipping);
		$this->set('shipping', $shipping);
	}
	
	public function empty_cart() {
		$this->Session->delete('Cart');
		$this->redirect(array('controller' => 'carts', 'action' => 'view'));
	}
}
?>