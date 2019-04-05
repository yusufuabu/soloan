<?php 

// Initiating constants
defined("DS")? null : define("DS", DIRECTORY_SEPARATOR);
// defined("SITE_ROOT")? null : define("SITE_ROOT",  "C:" .DS. "wamp64".DS."www".DS.'socialoan');
// defined("INCLUDES_PATH")? null : define("INCLUDES_PATH", SITE_ROOT . DS . "admin" .DS. "includes");
require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("session.php");

  
require_once("adminsession.php");
require_once("db_object.php");
require_once("user.php"); 
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/Exception.php");
require_once("admin.php");
require_once("endorsements.php");
require_once("constants.php");
require_once("loans.php");
require_once("repay.php");
require_once("iquote.php");
require_once("quote.php");
require_once("claims.php");
require_once("level.php");
require_once("message.php");
require_once("paginate.php");



?>