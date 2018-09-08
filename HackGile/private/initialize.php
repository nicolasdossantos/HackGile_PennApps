<?php

  ob_start(); // turn on output buffering


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
  require_once('../classes/hackathon.php');
  require_once('../classes/member.php');
  require_once('../classes/project.php');
  require_once('../classes/sprint.php');
  require_once('../classes/story.php');
  require_once('../classes/database.php');

$database = db_connect();
Database::set_database($database);




?>
