<?php
/**
 * A simplistic router/dispatcher
 *
 * @package Simtrol
 * @author sas <stefan.andre.schulze@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 sas <stefan.andre.schulze@gmail.com>
 * @license MIT
 */


class Simtrol {
	private $action_404 = '404';
	private $params = array();
	private $route = '';
	function __construct($path_info=NULL, $params=NULL) {
		$this->params = $params ? $params : $_REQUEST;
		$this->route_desc = $_SERVER['PATH_INFO'];
		$this->route_desc[0] = NULL; /* strip leading slash */
	}
	public function set_property($n, $v) {
		$this->properties[$n] = $v;
	}
	public function get_property($n) {
		return $this->properties[$n];
	}
	public function map_route() {
		$route = explode('/', $this->route_desc);
		$controller = array_shift($route);
		$controller = preg_replace('/[^a-zA-Z]/', '', $controller);
		$action = end($route);
		$action = preg_replace('/[^a-zA-Z]/', '', $action);
		$file = ACTIONS_DIR . "/${controller}.php";
		if (!(include $file) or !function_exists('doo'.$action)) {
			include ACTIONS_DIR . '/404.php';
		} else {
			$request=array();
			$request['params'] = $this->params;
			$request['route'] = $route;
			call_user_func('doo'.$action, $request);
		}
	}
}


?>
