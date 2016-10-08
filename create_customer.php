<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
/*	echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	$result = $objclient->addCustomer($_REQUEST);
 	header("location:customer_list.php?msgcode=1");
} 
//$objclient->Getmapping('mapping');
//$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Create Customer');
$objSmarty->assign('customer0',	'1');
$objSmarty->assign('customer2',	'1');
$objSmarty->display("create_customer.tpl");
?>