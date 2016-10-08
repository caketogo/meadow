<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	/*echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	$result = $objclient->addContainer($_REQUEST);
 	header("location:container_list.php?msgcode=1");
} 
//$objclient->Getmapping('mapping');
//$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Create Container');
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container2',	'1');
$objSmarty->display("create_container.tpl");
?>