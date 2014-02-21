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
		
		$tee = $this->Tee->findByProductid($id);
        
		if (!$tee) {
            throw new NotFoundException(__('Gå och dö'));
        }
		
		$this->set('tee', $tee);
	}	
}
?>