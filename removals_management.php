<?php 
	ob_start();
	session_start();
	include "includes/admin_common.php";
	check_authentication();
	$objTemplate = new siteadmin();
	
	$PerPage = 10;
	$Page    = $_REQUEST["Page"];
	$Display = $_REQUEST["Display"];
	
	if($_REQUEST['msgcode'] == 2) {
		$msg = 'Removals Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Removals Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Removals Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	if(isset($_REQUEST['exporstCSVexp']) && $_REQUEST['exporstCSVexp'] == 'yes') {
		$exportCSVExpenseList = $objTemplate->exportCSVRemovals($_REQUEST);
	}

	
	$objSmarty->assign('pgnametitle',	'Removals Management');
	//$objSmarty->assign('customer0',	'1');
	$objSmarty->assign('customer1',	'10');
	//$objSmarty->assign('expenses1',	'1');
	
	$objSmarty->display("removals_management.tpl");
?>