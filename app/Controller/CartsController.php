<?php
class CartsController extends AppController {

	public function add_to_cart($id){
	
	$this->Session->write('User.item', $id);
	
	$product = $this->Session->read('User.item');
	echo $product; 
		
	$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
}
?>