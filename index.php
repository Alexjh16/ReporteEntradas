<?php 
require_once("core/core.php");
$class = (isset($_REQUEST['class'])) ? $_REQUEST['class'] : "Home";
$method = (isset($_REQUEST['method'])) ? $_REQUEST['method'] : "login";

$Controller = $class."Controller";
require_once("controllers/".$Controller.".php");


$ControllerObject = new $Controller();
$ControllerObject->$method();
?>