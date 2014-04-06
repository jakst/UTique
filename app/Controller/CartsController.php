<?php
class CartsController extends AppController {
	
	/* 	Vill ha in alla productid, antal + storlekar från sessionen (dvs hela Cart)
		Vill sen hämta namn+pris från databasen (vars produktid finns med i Cart)
		Vill sen skicka samlingen productid, namn, pris, antal och storlek till view som skriver ut detta (array: id, namn, pris, antal, storlek)	*/
	public function view() {
					

	}
	
	public function empty_cart() {
		$this->Session->delete('Cart');
		$this->redirect(array('controller' => 'carts', 'action' => 'view'));
	}
}
?>