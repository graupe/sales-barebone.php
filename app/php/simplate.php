<?php
/**
 * A simplistic template engine, that is very similar to a one I always used. I 
 * don't know If I will find it in my archives, so I used this one.
 *
 * http://chadminick.com/articles/simple-php-template-engine.html#sthash.VvOJ90FP.dpbs
 *
 * @package Simplate
 * @author sas <stefan.andre.schulze@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 Stefan Schulze
 * @copyright (C) 2009 Chad Minick
 * @license WTFPL
 */

class Simplate {
	private $vars  = array();

	function __construct($vars=array()) {
		/* TODO: make sure there are no conflicts */
		$this->vars = $vars;
	}

	public function __get($name) {
		return $this->vars[$name];
	}

	public function __set($name, $value) {
		if($name == 'view_template_file') {
			throw new Exception("Cannot bind variable named 'view_template_file'");
		}
		$this->vars[$name] = $value;
	}

	public function render($view_name) {
		if(array_key_exists('view_template_file', $this->vars)) {
			throw new Exception("Cannot bind variable called 'view_template_file'");
		}
		extract($this->vars);
		ob_start();
		include(VIEWS_DIR . "/${view_name}.tpl.php");
		return ob_get_clean();
	}
}
?>
