<?php
/**
 * Short description for config.php
 *
 * @package config
 * @author sas <stefan.andre.schulze@gmail.com>
 * @version 0.1
 * @copyright (C) 2016 sas <stefan.andre.schulze@gmail.com>
 * @license MIT
 */

define('BASE_DIR', dirname(__FILE__).'/app/php');
define('ACTIONS_DIR', BASE_DIR . '/actions');
define('VIEWS_DIR', BASE_DIR . '/views');
define('DB_URI', 'mysql:host=localhost;dbname=rexx');
define('DB_USER', 'rexx');
define('DB_PASS', 'rexxland');

?>
