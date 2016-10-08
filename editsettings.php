<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdateSettingsDetails($_REQUEST);
	header("location: settings_list.php?msgcode=2");

} else{
	$objTemplate->GetEditSettingsDetails($_REQUEST);
}

$objSmarty->assign("pageActive", 'settings_list');
$objSmarty->assign('pgnametitle',	'Edit Settings');
$objSmarty->display("editsettings.tpl");