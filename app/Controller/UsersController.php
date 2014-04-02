<?php
class UsersController extends AppController {
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->User->find('all'));
	}
	
	public function login() {
		if ($this->request->is('post')) {
			print_r($this->request->data);
			//$this->request->data['User']['password'] = Security::hash($this->request->data['User']['password']);
			//print_r($this->request->data);
			if ($this->Auth->login($this->request->data)) {
				$this->redirect($this->Auth->redirect());
			} else {
			echo '<span style="font-size: 24px; color: red;">DERP!</span>';
				$this->Session->setFlash('Det angivna anv�ndarnamnet eller l�senordet var felaktigt');
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
?>