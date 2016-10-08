<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->ChangePassword($_REQUEST);
	$objSmarty->assign('password_status',	'Password has been successfully changed.');
} 
$objSmarty->assign('pgnametitle',	'Change  Password');
$objSmarty->display("changepassword.tpl");
?>