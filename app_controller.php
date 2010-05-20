<?php
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {

/**
 * Components
 *
 * @var array
 */
	public $components = array('DebugKit.Toolbar', 'Session');

/**
 * View helpers
 *
 * @var array
 */
	public $helpers = array('Form', 'Goodies.Gravatar', 'Html', 'Session', 'Thumb');

/**
 * Constructor
 *
 */
	public function __construct() {
		parent::__construct();
		$this->_setupTheme();
	}

/**
 * Setup theme based on site settings
 *
 * @return void
 * @author Predominant
 */
	protected function _setupTheme() {
		$this->view = 'Theme';
		$this->theme = Configure::read('Site.Theme');
	}
}
