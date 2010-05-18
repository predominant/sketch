<?php
/* Project Test cases generated on: 2010-05-18 12:05:42 : 1274150442*/
App::import('Model', 'Project');

class ProjectTestCase extends CakeTestCase {
	var $fixtures = array('app.project', 'app.user', 'app.submission');

	function startTest() {
		$this->Project =& ClassRegistry::init('Project');
	}

	function endTest() {
		unset($this->Project);
		ClassRegistry::flush();
	}

}
?>