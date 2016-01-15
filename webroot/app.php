<?php
/**
 * @author sas <stefan.andre.schulze@gmail.com>
 * @copyright (C) 2016 sas <stefan.andre.schulze@gmail.com>
 * @license MIT
 */

error_reporting(E_ALL);

require_once dirname(__FILE__) . '/../config.php';
set_include_path(get_include_path() . PATH_SEPARATOR . BASE_DIR );

require_once 'simtrol.php';

$ctl = new Simtrol();
$ctl->map_route();

?>
