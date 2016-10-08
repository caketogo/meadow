<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdatetriggerDetails($_REQUEST);
	header("location: trigger_list.php?msgcode=2");

} else{
	$objTemplate->GetEdittriggerDetails($_REQUEST);
}
$objTemplate->Getmapping('mapping');
$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('trigger1',	'1');
$objSmarty->assign('trigger2',	'2');
$objSmarty->assign("pageActive", 'Trigger');
$objSmarty->assign("pgnametitle", 'Edit Trigger ');

$objSmarty->display("edittrigger.tpl");