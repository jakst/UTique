<?php
class CartsController extends AppController {
	
	/* 	Vill ha in alla productid, antal + storlekar från sessionen (dvs hela Cart)
		Vill sen hämta namn+pris från databasen (vars produktid finns med i Cart)
		Vill sen skicka samlingen productid, namn, pris, antal och storlek till view som skriver ut detta (array: id, namn, pris, antal, storlek)	*/
	public function view() {
					
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
	
	public function empty_cart() {
		$this->Session->delete('Cart');
		$this->redirect(array('controller' => 'carts', 'action' => 'view'));
	}
	
	public function update_cart_item($id, $size, $count) {
		if ($count < 1){
			$this->Session->delete('Cart.'.$id.'.sizes.'.$size);
			if (count($this->Session->read('Cart.'.$id.'.sizes')) < 1) {$this->Session->delete('Cart.'.$id);}
			if (count($this->Session->read('Cart')) < 1) {$this->Session->delete('Cart');}
		} else {
			$this->Session->write('Cart.'.$id.'.sizes.'.$size.'.amount', $count);
		}
		
		$this->redirect(array('controller' => 'carts', 'action' => 'view'));
	}
}
?>