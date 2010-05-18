<?php
/* Submissions Test cases generated on: 2010-05-18 12:05:06 : 1274150526*/
App::import('Controller', 'Submissions');

class TestSubmissionsController extends SubmissionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SubmissionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.submission', 'app.user', 'app.project');

	function startTest() {
		$this->Submissions =& new TestSubmissionsController();
		$this->Submissions->constructClasses();
	}

	function endTest() {
		unset($this->Submissions);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>