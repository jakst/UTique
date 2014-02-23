<?php
class CartsController extends AppController {

	public function add_to_cart($id){
		$this->Session->write('Cart.'.$id, 1);
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
}
?>