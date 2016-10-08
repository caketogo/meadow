<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$objTemplate->UpdatePenalityFees($_REQUEST);
	header("location: penalityfee.php?msgcode=2");

} else{
	$objTemplate->GetEditPenalityFeesDetails($_REQUEST);
}
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container6',	'1');
$objSmarty->assign("pageActive", 'PenalityFees');
$objSmarty->assign("pgnametitle", 'Edit Penality Fees');

$objSmarty->display("edit_penalityfees.tpl");