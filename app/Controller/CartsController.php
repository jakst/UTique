<?php
class CartsController extends AppController {

	public function add_to_cart($id = null, $size = null){
		if (!$id || !$size) {
            throw new NotFoundException(__('Kunde inte lägga till varan i varukorgen'));
		}
	
		if ($this->Session->check('Cart.'.$id.$size)) {
			$amount = $this->Session->read('Cart.'.$id.$size);
			$this->Session->write('Cart.'.$id.$size, $amount+1);
		} else {
			$this->Session->write('Cart.'.$id.$size, 1);
		}
		
		$this->redirect(array('controller' => 'tees', 'action' => 'view', $id));
	}
	
	/* 	Vill ha in alla productid, antal + storlekar från sessionen (dvs hela Cart)
		Vill sen hämta namn+pris från databasen (vars produktid finns med i Cart)
		Vill sen skicka samlingen productid, namn, pris, antal och storlek till view som skriver ut detta (array: id, namn, pris, antal, storlek)	*/
	public function view(){
					
		$id = 2;
		$name = 'Hej';
		$price = 99;
		$amount = 3;
		$size = 'S';
		
		$tees = array(
			 'Tee' => array(
				'id' => $id,
				'name' => $name,
				'price' => $price,
				'amount' => $amount,
				'size' => $size
			),
			 'Teem' => array(
				'id' => $id,
				'name' => $name,
				'price' => $price,
				'amount' => $amount,
				'size' => $size
			)
		);
		$this->set('tees', $tees);
	}
}
?>