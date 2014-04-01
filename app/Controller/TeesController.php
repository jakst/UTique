<?php
class TeesController extends AppController {

	public function index() {
		$gender = 'Alla';
		$genderCondition = array();
		$colorCondition = array();
		$color = null;

		if ($this->request->is('post')) {
			$gender = $this->request->data['gender'];
			$color = $this->request->data['color'];
			print_r ($color);
						
			if($gender != 'Alla'){
				$genderCondition['Tee.sex'] = $gender;
			}
			
			if($color != null){
			
				foreach ($color as $value){
					$colorCondition['OR'][]['Tee.color'] = $value;
				}
				unset ($value);
			}
			
		}
		
		
		$tees = $this->Tee->find('all', array(
			'conditions' => array(
				$genderCondition,
				$colorCondition,
				// $price,
				// $size
				/*'OR' => array(
					array('Tee.color' => 'Svart'),
					array('Tee.color' => 'Vit')
				)*/
			)
		));
		
		$this->set('tees', $tees);
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
	
	public function reallocate() {
		$tees = $this->Tee->find('all');
		$this->Tee->Item->query('TRUNCATE items;');
		
		foreach ($tees as $tee) {
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'XS');
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'S');
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'M');
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'L');
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'XL');
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'XXL');
			$data[] = array('tee_id' => $tee['Tee']['id'], 'size' => 'XXXL');
		}
		
		if ($this->Tee->Item->saveMany($data)) {echo '<span style="color: red; font-size: 30px">YEEAAAHH!!!!</span>';}
	}
}
?>