<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdateadminUserDetails($_REQUEST);
	header("location: adminuser_list.php?msgcode=10");

} else{
	$objTemplate->GetEditadminUserDetails($_REQUEST);
}
$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('trigger1',	'1');
$objSmarty->assign('trigger2',	'2');
$objSmarty->assign("pageActive", 'AdminUser');
$objSmarty->assign("pgnametitle", 'Edit Admin User ');

$objSmarty->display("edit_adminuser.tpl");