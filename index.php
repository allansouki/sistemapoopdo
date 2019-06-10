<?php
// site/index.php?Pessoas


$controller = key($_GET);
$controller.= "Controller";
require_once "controller/$controller.php";
$obj = new $controller();
$obj->view($_SERVER['REQUEST_METHOD']);

?>