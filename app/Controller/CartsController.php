<?php
class CartsController extends AppController {

	public function add_to_cart($id = null){
		if (!$id) {
            throw new NotFoundException(__('Hej'));
		}
	
		if ($this->Session->check('Cart.'.$id)) {
			$amount = $this->Session->read('Cart.'.$id);
			$amount++;
			$this->Session->write('Cart.'.$id, $amount);
		} else{
			$this->Session->write('Cart.'.$id, 1);
		}
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
}
?>