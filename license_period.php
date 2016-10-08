<?php
	ob_start();
	session_start();
	include "includes/admin_common.php";
	check_authentication();
	$objTemplate = new siteadmin();
	$LicensePeriod 		=	$objTemplate->GetLicensePeriod($_POST);
	//print_r($users);
	$objSmarty->assign("LicensePeriod", $LicensePeriod);

	$PerPage = 10;
	$Page    = $_REQUEST["Page"];
	$Display = $_REQUEST["Display"];
	if($_REQUEST['msgcode'] == 2) {
		$msg = 'License Period Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$msg = 'License Period Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	
	/*if($_REQUEST['msgcode'] == 5) {
		$msg = 'License Period name already exits.';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	}  elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'License Period Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	}*/
	//$objTemplate->GetLicensePeriod($_REQUEST);
//$objSmarty->assign("ContainerDetails",$ContainerDetails);
	//$objSmarty->assign("LicensePeriod",$LicensePeriod);
	$objSmarty->assign('pgnametitle',	'License Period');
	
	$objSmarty->assign('container0',	'1');
	$objSmarty->assign('container7',	'1');	
	
	$objSmarty->display("license_period.tpl");
	

?>
