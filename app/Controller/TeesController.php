<?php
class TeesController extends AppController {

    public function index() {
		$this->set('tees', $this->Tee->find('all'));
    }
	
	public function view($id = null) {
	    if (!$id) {
            throw new NotFoundException(__('Gå och dö'));
        }
		
		$tee = $this->Tee->findById($id);
        
		if (!$tee) {
            throw new NotFoundException(__('Gå och dö'));
        }
		
		$this->set('tee', $tee);
	}	
	
	public function add_to_cart(){
		$id = $this->request->data['id'];
		$sizeId = $this->request->data['size'];
		
		if (!$id || !$sizeId) {
            throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}

		$this->Tee->recursive = -1;
		$tee = $this->Tee->find('all', array(
			'contain' => false,
			'conditions' => array('Tee.id' => $id),
			'fields' => array('id', 'name', 'price', 'color', 'sex')
		))['0'];
		
		$sId = explode('-', $sizeId)[0];
		$size = explode('-', $sizeId)[1];
		
		if (!$tee){
			throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}
		
		$amount = 0;
		
		if ($this->Session->check('Cart.'.$id)){
			if ($this->Session->check('Cart.'.$id.'.sizes.'.$size)){
				$amount = $this->Session->read('Cart.'.$id.'.sizes.'.$size.'.amount');
			}
		} else {
			$this->Session->write('Cart.'.$id, $tee);
		}

		$orderItem = array('item_id' => $sId, 'amount' => $amount + 1);
		$this->Session->write('Cart.'.$id.'.sizes.'.$size, $orderItem);
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
}
?>