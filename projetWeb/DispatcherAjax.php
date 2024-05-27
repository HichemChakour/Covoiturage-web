<?php
$nameApp = "monApplication";

$action =  $_REQUEST['action'];

require_once 'lib/core.php';
require_once $nameApp.'/controller/mainController.php';

foreach(glob($nameApp.'/model/*.class.php') as $model)
	include_once $model ;   

session_start();
$context = context::getInstance();
$context->init($nameApp);

$view=$context->executeAction($action, $_REQUEST);

	
$template_view=$nameApp."/view/".$action.$view.".php";
include($template_view);
echo "<script>var newNotif = " . json_encode($context->getNotif()) . ";</script>";
?>