<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addAdminuser($_REQUEST);
 	header("location:adminuser_list.php?msgcode=1");
} 
//$objclient->Getmapping('mapping');
//$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Add Admin User');
$objSmarty->assign('adminuser0',	'1');
//$objSmarty->assign('adminuser0',	'1');
$objSmarty->assign('adminuser2',	'1');
$objSmarty->display("add_adminuser.tpl");
?>