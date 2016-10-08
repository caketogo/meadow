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
	$result = $objclient->addChangeTermsCondition($_REQUEST);
 	header("location:change_terms_condition.php?msgcode=1");
} 
//$objclient->Getmapping('mapping');
//$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Create Change Terms Condition');
$objSmarty->assign('terms0',	'1');
$objSmarty->assign('terms1',	'1');
$objSmarty->display("create_change_terms_condition.tpl");
?>