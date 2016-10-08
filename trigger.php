<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addTrigger($_REQUEST);
 	header("location:trigger_list.php?msgcode=1");
} 
$objclient->Getmapping('mapping');
$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Add Trigger');
$objSmarty->assign('trigger1',	'1');
$objSmarty->assign('trigger2',	'2');
$objSmarty->display("trigger.tpl");
?>