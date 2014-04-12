<?php
class UsersController extends AppController {
	public function index() {
		$customer = $this->User->Customer->find('all');
		$this->set('customer', $customer);
	}
	
	public function login() {
		$this->Auth->authenticate = 'Blowfish';
		$this->set('referer', $this->referer());
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->set('loggedIn', $this->Auth->loggedIn());
				$this->set('currentUser', $this->Auth->user());
				
				$referer = $this->referer();
				if (!empty($this->request->data['User']['referer'])) {
					$referer = $this->request->data['User']['referer'];
				}
				
				$this->redirect($referer);
			} else {
				$this->Session->setFlash('Det angivna användarnamnet eller lösenordet är felaktigt! ', 'flash/error');
			}
		}
	}
	
	public function logout() {
		$this->Auth->logout();
		$this->redirect($this->referer());
	}
	
	public function register() {
		if ($this->request->is('post')) {
			$data = $this->request->data;
			if ($this->User->save($data)) {
				$this->Auth->login();
				$this->set('loggedIn', $this->Auth->loggedIn());
				$this->set('currentUser', $this->Auth->user());
				$this->Session->setFlash('Grattis '.$data['User']['username'].', ditt konto har skapats!', 'flash/success');
				$this->redirect(array('controller' => 'tees'));
			}
		}
	}
}
?>