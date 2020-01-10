<?php 
ob_start();

define("DS", DIRECTORY_SEPARATOR);
define("PRIVATE_PATH", dirname(__FILE__));
define("ADMIN_PATH", dirname(PRIVATE_PATH));
define("PROJECT_PATH", dirname(ADMIN_PATH));
define("INC_PATH", ADMIN_PATH . DS . 'inc');
define("IMG_PATH", ADMIN_PATH . DS . 'img');

require_once('db_config.php');
require_once('inc/functions.php');

function my_autoload($class) {
  if(preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . $class . '-class.php');
  } 
}
spl_autoload_register('my_autoload');

$db = new Database;
$session = new Session;










