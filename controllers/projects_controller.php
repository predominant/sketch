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
 * Projects Controller
 *
 * @package app
 * @subpackage app.controllers
 */
class ProjectsController extends AppController {

/**
 * Index
 *
 * @return void
 */
	public function index() {
		$this->set('projects', $this->paginate());
	}

/**
 * Latest projects
 *
 * @return void
 * @author Predominant
 */
	public function latest() {
		$this->paginate = array(
			'order' => $this->Project->alias . '.modified DESC',
			'limit' => 8,
			'contain' => array(
				'Submission' => array('limit' => 9),
				'Submission.User'
			),
		);
		$this->set('projects', $this->paginate());
		$this->render('index');
	}

/**
 * View Project
 *
 * @param string $id Project ID
 * @return void
 */
	public function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('project', $this->Project->read(null, $id));
	}

/**
 * Add Project
 *
 * @return void
 */
	public function add() {
		if (!empty($this->data)) {
			$this->Project->create();
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}

/**
 * Edit Project
 *
 * @param string $id Project ID
 * @return void
 */
	public function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid project', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Project->save($this->data)) {
				$this->Session->setFlash(__('The project has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Project->read(null, $id);
		}
		$users = $this->Project->User->find('list');
		$this->set(compact('users'));
	}

/**
 * Delete Project
 *
 * @param string $id Project ID
 * @return void
 */
	/*
	public function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for project', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Project->delete($id)) {
			$this->Session->setFlash(__('Project deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Project was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	*/
}
