<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$objTemplate->UpdateLicensePeriodLength($_REQUEST);
	header("location: license_period.php?msgcode=2");

} else{
	$objTemplate->GetEditLicensePeriod($_REQUEST);
}
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign("pageActive", 'License Period');
$objSmarty->assign("pgnametitle", 'Edit License Period');
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container7',	'1');

$objSmarty->display("edit_license_period.tpl");
?>