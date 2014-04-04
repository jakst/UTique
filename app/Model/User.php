<?php
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $validate = array(
		'username' => array(
			'Username length' => array(
				'rule' => array('between', 4, 15),
				'message' => 'Användarnamnet måste vara mellan 4 och 15 tecken långt'
			),
			'Username unique' => array(
				'rule' => 'isUnique',
				'message' => 'Användarnamnet är redan taget. Prova med ett annat användarnamn.'
			)
		),
		'password' => array(
			'Not empty' => array(
				'rule' => 'notEmpty',
				'message' => 'Lösenordet får inte vara tomt.'
			),
			'Matching' => array(
				'rule' => 'matchPasswords',
				'message' => 'Lösenorden matchar inte.'
			)
		),
		'password_confirmation' => array(
			'Not empty' => array(
				'rule' => 'notEmpty',
				'message' => 'Du måste upprepa ditt lösenord.'
			)
		)
	);
	
	function matchPasswords($data) {
		if ($data['password'] == $this->data['User']['password_confirmation']) {
			return true;
		}
		
		$this->invalidate('password_confirmation', 'Lösenorden matchar inte.');
		return false;
	}
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['User']['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
		}
		return true;
	}
}
?>