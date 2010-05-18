<?php
class SubmissionsController extends AppController {

	var $name = 'Submissions';

	function index() {
		$this->Submission->recursive = 0;
		$this->set('submissions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid submission', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('submission', $this->Submission->read(null, $id));
	}

	function add() {
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

	function edit($id = null) {
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

	function delete($id = null) {
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
}
?>