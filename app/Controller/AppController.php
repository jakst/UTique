<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright	 Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link		  http://cakephp.org CakePHP(tm) Project
 * @package	   app.Controller
 * @since		 CakePHP(tm) v 0.2.9
 * @license	   http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array(
		'Form' => array(
			'className' => 'BootstrapForm'
		),
		'Js'
 	);
	
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
			'logoutRedirect' => array('controller' => 'users', 'action' => 'index'),
			'authError' => 'Du har inte åtkomst till den här sidan.',
			'authorize' => array('Controller'),
			'authenticate' => array(
				'Form' => array(
					'passwordHasher' => 'blowFish'
				)
			)
		)
	);
	
	public function isAuthorized($user) {
		return true;
	}
	
	public function beforeFilter() {
		$this->Auth->allow();
		$this->set('loggedIn', $this->Auth->loggedIn());
		$this->set('currentUser', $this->Auth->user());
	}
  
	public function update_cart_item($id, $size, $count) {
		if ($count < 1){
			$this->Session->delete('Cart.'.$id.'.sizes.'.$size);
			if (count($this->Session->read('Cart.'.$id.'.sizes')) < 1) {$this->Session->delete('Cart.'.$id);}
			if (count($this->Session->read('Cart')) < 1) {$this->Session->delete('Cart');}
		} else {
			$this->Session->write('Cart.'.$id.'.sizes.'.$size.'.amount', $count);
		}
		$this->redirect( $this->referer() );
	}

}