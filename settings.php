<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addSettings($_REQUEST);
 	header("location:settings_list.php?msgcode=1");
} 

$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Add Setting');
$objSmarty->assign('settings1',	'1');
$objSmarty->assign('settings2',	'2');
$objSmarty->display("settings.tpl");
?>