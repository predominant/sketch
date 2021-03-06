<?php
/**
 * CaptchaToolHelper
 * 
 * CaptchaComponent and CaptchaToolHelper allow the easy use of reCaptcha.net's captcha library.
 * @link http://recaptcha.net
 *
 * @see CaptchaComponent
 * @author Jason Burgess <jason@holostek.net>
 * @version 0.8.0
 * @copyright (c) 2009 Jason Burgess
 * @license MIT/X
 *
 * Modified by Graham Weldon (http://grahamweldon.com)
 * - Added documentation
 * - Updated for CakePHP 1.3 standards
 */
class RecaptchaHelper extends AppHelper {

/**
 * View helpers
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * Display a reCaptcha input
 * 
 * @return void
 */
	public function show() {
		App::import('Vendor', 'Recaptcha.recaptcha/recaptchalib');
		
		if (empty($this->params['Recaptcha.public_key'])) {
			return $this->output(__('No public key was set for reCaptcha.', true));
		}
		
		$code = '';
		if (!empty($this->params['Recaptcha.configuration']) && is_array($this->params['Recaptcha.configuration'])) {
			$code = $this->Html->scriptBlock('var RecaptchaOptions = ' . json_encode($this->params['Recaptcha.configuration']));
		}
		
		return $this->output($code . recaptcha_get_html($this->params['Recaptcha.public_key']));
	}
}
