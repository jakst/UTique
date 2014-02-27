<?php
class TeesController extends AppController {
    // public $helpers = array('Html', 'Form');

    public function index() {
		// $data = array(
			// 'Tee' => array(
				// 'price' => 1,
				// 'color' => 'pink',
				// 'name' => 'Test Tee',
				// 'description' => 'Derp',
				// 'sex' => 'F'
			// )
		// );
		
		// $this->Tee->create();
		// $this->Tee->save($data);
        // $this->set('tees', $this->Tee->find('all'));
		
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


	public function add_to_cart($id = null, $size = null){
		if (!$id || !$size) {
            throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}

		$tee = $this->Tee->findById($id);
		if (!$tee){
			throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}

		$amount = 0;
		if ($this->Session->check('Cart.'.$id)){
			if ($this->Session->check('Cart.'.$id.'.'.$size)){
				$amount = $this->Session->read('Cart.'.$id.'.'.$size);
			}
		} else {
			$this->Session->write('Cart.'.$id, $tee);
		}

		$this->Session->write('Cart.'.$id.'.'.$size, $amount+1);
		
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
}
?>