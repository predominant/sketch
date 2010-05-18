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
 * Submissions Controller
 *
 * @package app
 * @subpackage app.controllers
 */
class SubmissionsController extends AppController {

/**
 * Index
 *
 * @return void
 */
	public function index() {
		$this->Submission->recursive = 0;
		$this->set('submissions', $this->paginate());
	}

/**
 * View Submission
 *
 * @param string $id Submission ID
 * @return void
 */
	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid submission', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('submission', $this->Submission->read(null, $id));
	}

/**
 * Add Submission
 *
 * @return void
 */
	public function add() {
		if (!empty($this->data)) {
			$this->Submission->create();
			if ($this->Submission->save($this->data)) {
				$this->Session->setFlash(__('The submission has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The submission could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Submission->User->find('list');
		$projects = $this->Submission->Project->find('list');
		$this->set(compact('users', 'projects'));
	}

/**
 * Edit Submission
 *
 * @param string $id Submission ID
 * @return void
 */
	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid submission', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Submission->save($this->data)) {
				$this->Session->setFlash(__('The submission has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The submission could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Submission->read(null, $id);
		}
		$users = $this->Submission->User->find('list');
		$projects = $this->Submission->Project->find('list');
		$this->set(compact('users', 'projects'));
	}

/**
 * Delete Submission
 *
 * @param string $id Submission ID
 * @return void
 */
	/*
	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for submission', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Submission->delete($id)) {
			$this->Session->setFlash(__('Submission deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Submission was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
}
