<?php
/**
 * Slavitica Sketch MiniSite
 *
 * Copyright (c) 2010 Graham Weldon
 * Licensed under the LGPL GNU Lesser General Public License
 * Redistributions of files must retain the above copyright notice
 *
 * @author Graham Weldon (http://grahamweldon.com)
 * @copyright Copyright (c) 2010 Graham Weldon
 * @license LGPL GNU Lesser General Public License (http://www.gnu.org/licenses/lgpl.html)
 */

/**
 * Users Controller
 *
 * @package app
 * @subpackage app.controllers
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Recaptcha.Captcha' => array(
			'private_key' => RECAPTCHA_PRIVATE,
			'public_key' => RECAPTCHA_PUBLIC,
		)
	);

/**
 * View helpers
 *
 * @var array
 */
	public $helpers = array('Recaptcha.Recaptcha');

/**
 * Index
 *
 * @return void
 */
	public function index() {
		$this->set('users', $this->paginate());
	}

/**
 * Latest
 *
 * @return void
 */
	public function latest() {
		$this->paginate = array(
			'order' => 'User.modified',
			'limit' => 8,
			'contain' => array(
				'Submission' => array('limit' => 3),
				'Submission.Project'
			),
		);
		$this->set('users', $this->paginate());
		$this->render('index');
	}

/**
 * User Login
 *
 * @return void
 */
	public function login() {
	}

/**
 * User Logout
 *
 * @return void
 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}

/**
 * View User
 *
 * @param string $id User ID
 * @return void
 */
	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * Add User
 *
 * @return void
 */
	public function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if (!$this->Captcha->validate()) {
				$this->Session->setFlash(__('Captcha validation failed. Please try again', true));
			} else {
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
		}
	}

/**
 * Edit User
 *
 * @param string $id User ID
 * @return void
 */
	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

/**
 * Delete User
 *
 * @param string $id User ID
 * @return void
 */
	/*
	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
}
