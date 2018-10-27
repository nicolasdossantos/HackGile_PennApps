<?php
ob_start(); // turn on output buffering
session_set_cookie_params(3600000, '/');
session_start();

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


require_once('status_error_functions.php');
require_once('validation_functions.php');
require_once('functions.php');


// Load class definitions manually
foreach (glob(PRIVATE_PATH . '/classes/*.php') as $file) {
    require_once($file);
}
/*require_once(PRIVATE_PATH . '/classes/*.php');
require_once('../classes/hackathon.php');
require_once('../classes/member.php');
require_once('../classes/project.php');
require_once('../classes/sprint.php');
require_once('../classes/story.php');*/


$database = Database::db_connect();
Database::set_database($database);


?>
