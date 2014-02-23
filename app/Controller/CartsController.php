<?php
class CartsController extends AppController {

	public function add_to_cart($id = null, $size = null){
		if (!$id) {
            throw new NotFoundException(__('Hej'));
		}
	
		if ($this->Session->check('Cart.'.$id.$size)) {
			$amount = $this->Session->read('Cart.'.$id.$size);
			$this->Session->write('Cart.'.$id.$size, $amount+1);
		} else{
			$this->Session->write('Cart.'.$id.$size, 1);
		}
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
}
?>