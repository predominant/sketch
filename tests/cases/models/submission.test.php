<?php
/* Submission Test cases generated on: 2010-05-18 12:05:37 : 1274150437*/
App::import('Model', 'Submission');

class SubmissionTestCase extends CakeTestCase {
	var $fixtures = array('app.submission', 'app.user', 'app.project');

	function startTest() {
		$this->Submission =& ClassRegistry::init('Submission');
	}

	function endTest() {
		unset($this->Submission);
		ClassRegistry::flush();
	}

}
?>