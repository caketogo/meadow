<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

//$objclient->Getmapping('mapping');
//$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Page is currently under construction');
$objSmarty->assign('trigger1',	'1');
$objSmarty->assign('trigger2',	'2');
$objSmarty->display("page-not-found.tpl");
?>