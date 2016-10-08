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
		$msg = 'Terms Condition Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$msg = 'Terms Condition Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	
	if($_REQUEST['msgcode'] == 5) {
		$msg = 'Terms Condition name already exits.';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	}  elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Terms Condition Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	}
	
	/*if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}*/
	

	//$objSmarty->assign("ContainerDetails",$ContainerDetails);
	$objSmarty->assign('pgnametitle',	'Terms Condition');
	
	$objSmarty->assign('terms0',	'1');
	$objSmarty->assign('terms1',	'1');
	//$objSmarty->assign('container2',	'2');	
	
	$objSmarty->display("change_terms_condition.tpl");
	

?>