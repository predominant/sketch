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
 * Thumb Helper
 *
 * Handles image thumbnail-ing and caching
 *
 * @package app
 * @subpackage app.helpers
 */
class ThumbHelper extends AppHelper {

/**
 * Default values
 *
 * @var array
 */
	protected $_defaults = array(
		'w' => 100,
		'h' => 100,
		'zc' => 1,
		'f' => 'jpg',
		'q' => 90,
		'config_imagemagick_path' => array(
			'/opt/local/bin/convert',
			'/usr/bin/convert'
		),
		'save_path' => 'thumbs', // Relative to webroot
		'expires' => '+1 day',
		'force' => false,
	);

/**
 * Cacheable phpThumb options
 *
 * @var array
 */
	protected $_cacheableProperties = array(
		'src', 'new', 'w', 'h', 'wp', 'hp', 'wl', 'hl', 'ws', 'hs', 'f', 'q',
		'sx', 'sy', 'sw', 'sh', 'zc', 'bc', 'bg', 'fltr', 'ra', 'ar', 'sfn',
		'aoe', 'iar', 'far', 'dpi', 'maxb'
	);

/**
 * Internal error information
 * @var mixed
 */
	private $_error = false;

/**
 * Helper dependencies
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * phpThumb configuration options
 *
 * @var array
 */
	public $options = array();

/**
 * Initialize the helper with default values and setup cache filenaming
 *
 * @param $options
 * @return void
 */
	private function _initialize($src = '', $options = array()) {
		if (!isset($options['f'])) {
			$options['f'] = $this->_getFileExtension($src);
		}
		$this->options = array_merge($this->_defaults, $options);
		$this->_setupImageMagick();
	}

/**
 * Setup ImageMagick paths
 *
 * @return void
 */
	protected function _setupImageMagick() {
		$imPath = $this->options['config_imagemagick_path'];
		if (is_array($imPath)) {
			foreach ($imPath as $path) {
				if (file_exists($path)) {
					$this->options['config_imagemagick_path'] = $path;
					return;
				}
			}
			//trigger_error(__('ImageMagick is not installed.', true), E_USER_ERROR);
			unset($this->options['config_imagemagick_path']);
		}
	}

/**
 * Get file extension based on supplied source file.
 * Also used for phpThumb/ImageMagick file format.
 *
 * @return string File extension
 */
	protected function _getFileExtension($src) {
		$ext = 'png';
		$pattern = '/^.*\.([^.]*)$/i';
		if (preg_match($pattern, basename($src), $matches)) {
			$ext = $matches[1];
		}
		return $ext;
	}
/**
 * Setup the cache filename
 *
 * @return void
 */
	protected function _getCacheFilename($src) {
		ksort($this->options);
		$filenameParts = array();
		foreach($this->options as $k => $v) {
			if(in_array($k, $this->_cacheableProperties)) {
				if ($k == 'fltr') {
					// Ensure filtering options cause uniqueness in name generation
					foreach ($v as $filterKey => $filterValue) {
						$filenameParts['fltr' . $filterKey] = $filterValue;
					}
				} else {
					$filenameParts[$k] = $v;
				}
			}
		}
		
		$cacheName = '';
		foreach($filenameParts as $key => $value) {
			$cacheName .= $key . $value;
		}
		return $this->options['save_path'] . DS . sha1($src . $cacheName) . '.' . $this->options['f'];
	}

/**
 * Check if the image has been cached
 * 
 * @return boolean Cached
 */
	protected function _isCached($src) {
		return is_file('img' . DS . $this->_getCacheFilename($src));
	}

/**
 * Check if the cached image has expired
 *
 * @return boolean Expired
 */
	protected function _expired($src) {
		$filename = 'img' . DS . $this->_getCacheFilename($src);
		if (!$this->options['expires'] || !is_file($filename)) {
			return true;
		}
		return time() > filemtime($filename) + strtotime($this->options['expires']);
	}

/**
 * Create a thumbnail, and cache.
 *
 * @return mixed Cached filename returned if thumbnailing was successful. False on error.
 */
	public function createThumb($src, $dest) {
		App::import('Vendor', 'phpthumb', array('file' => 'phpThumb' . DS . 'phpthumb.class.php'));
		if (!class_exists('phpthumb')) {
			trigger_error(__('phpThumb must be installed in the vendors directory: APP/vendors/phpThumb', true), E_USER_ERROR);
		}
		$phpThumb = new phpthumb();
		$phpThumb->setParameter('src', $src);
		foreach ($this->options as $k => $v) {
			if ($k == 'fltr') {
				// Setup the Filtering as string options.
				foreach ($v as $vk => &$vv) {
					$vv = $vk . '|' . $vv;
				}
				$phpThumb->setParameter($k, $v);
			} else {
				// All non-filter options
				$phpThumb->setParameter($k, $v);
			}
		}
		@ini_set('max_execution_time', 0);
		if ($phpThumb->GenerateThumbnail()) {
			$phpThumb->RenderToFile('img' . DS . $dest);
			return $dest;
		}
		$this->_error = preg_replace('/[^A-Za-z0-9\/: .]/', '', $phpThumb->fatalerror);
		$this->_error = preg_replace('/phpThumb v[0-9\.\-]+/', '', $this->_error);
		return false;
	}

/**
 * Generate an image tag
 *
 * @return string
 */
	public function imageTag($src, $tagOptions = array()) {
		if($this->_error !== false) {
			$src = ' ';
			$tagOptions['alt'] = $this->_error;
		}
		return $this->Html->image($src, $tagOptions);
	}

/**
 * Show the thumbnail
 *
 * @param $src
 * @param $options
 * @param $tag_options
 * @return string
 */
	public function image($src, $options = array(), $tagOptions = array()) {
		return $this->imageTag($this->generate($src, $options), $tagOptions);
	}

/**
 * Generate Thumbnail
 *
 * @param string $src Image filename
 * @param array $options Image generation options
 * @param array $tagOptions HTML Image tag options
 * @return string Thumb filename
 */
	public function generate($src, $options = array(), $tagOptions = array()) {
		$this->_initialize($src, $options);
		$cacheName = $this->_getCacheFilename($src);
		if(!$this->_isCached($src) || $this->_expired($src) || $this->options['force']) {
			return $this->createThumb($src, $cacheName);
		}
		return $cacheName;
	}
}
