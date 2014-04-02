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
	);
	
	public function beforeSave($options = array()) {
		if (!empty($this->data['User']['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
		}
		return true;
	}
}
?>