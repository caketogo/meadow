<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
/*	echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	$objTemplate->UpdateTermsConditionDetails($_REQUEST);
	header("location: change_terms_condition.php?msgcode=2");

} else{
	$TermsConditionDetails = $objTemplate->GetEditTermsConditionDetails($_REQUEST);
	/*echo '<pre>';
	print_r($NotesEditDetails);
	exit;*/
}
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('TermsConditionDetails',	$TermsConditionDetails);
$objSmarty->assign('terms0',	'1');
$objSmarty->assign('terms1',	'1');
$objSmarty->assign("pageActive", 'TermsConditionDetails');
$objSmarty->assign("pgnametitle", 'Edit Terms Condition Details');

$objSmarty->display("edit_change_terms_condition.tpl");