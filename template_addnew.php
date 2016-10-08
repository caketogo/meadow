<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addtemplate($_REQUEST);
 	header("location:template_list.php?msgcode=1");
} 
$result = $objclient->GetsendgridTemplate();
$result1 = $objclient->GetAllTrigger();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Add Template');
$objSmarty->assign('emailtemplate1',	'1');
$objSmarty->assign('emailtemplate2',	'2');

$objSmarty->display("template_addnew.tpl");

?>