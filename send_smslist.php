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
		$msg = 'SMS Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'SMS Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'SMS Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['customer_type']) && $_REQUEST['customer_type'] !='') {
			$customer_type = $_REQUEST['customer_type'];
			$ViewSMSCustomerList = $objTemplate->getSMSCustomerList($_REQUEST);
	}
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$ViewSMSCustomerList = $objTemplate->updateSMSCustomerList($_REQUEST);
	 	header("location:smslist.php?msgcode=1");		
	}
	$objSmarty->assign("customer_type", $customer_type);

	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);

	
	$objSmarty->assign("ViewSMSCustomerList",$ViewSMSCustomerList);
	
	$objSmarty->assign("current_user_id",$_SESSION["container_rental_admin_id"]);	
	$objSmarty->assign("current_customer_id",$_REQUEST["customer_id"]);	
	$objSmarty->assign('pgnametitle',	'Create SMS Schedule');
	$objSmarty->assign('smslist0',	'1');
	$objSmarty->assign('smslist3',	'1');
	
	$objSmarty->display("send_smslist.tpl");
?>