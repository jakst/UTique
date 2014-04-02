<?php
class UsersController extends AppController {
	public function login() {
		if ($this->request->is('post')) {
			print_r($this->request->data);
			if ($this->Auth->login($this->request->data)) {
				$this->Auth->redirect();
				$this->redirect($this->referer());
			} else {
			echo '<span style="font-size: 24px; color: red;">DERP!</span>';
				$this->Session->setFlash('Det angivna anv�ndarnamnet eller l�senordet var felaktigt');
			}
		}
	}
	
	public function logout() {
		$this->Auth->logout();
		$this->redirect($this->referer());
	}
}
?>