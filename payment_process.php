<?php 
	ob_start();
	session_start();
	header('Content-type: text/html; charset=utf-8');
	include "includes/admin_common.php";
	check_authentication();
	$objTemplate = new siteadmin();
	
	$PerPage = 10;
	$Page    = $_REQUEST["Page"];
	$Display = $_REQUEST["Display"];
	
	
	if($_REQUEST['msgcode'] == 2) {
		$msg = 'Payment Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Container Assigned Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Payment Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 5) {
		if($_REQUEST['payment_status'] == 'yes') {
			$customer_id = $_REQUEST['customer_id'];
			$result = $objTemplate->addPaymentProcess($_REQUEST);
			header("location:payment_history.php?customer_id=".$customer_id."&msgcode=20");
		}	
	}
	
	$customer_id = $_REQUEST['customer_id'];
	if(isset($customer_id)){
		$PaymentHistoryList = $objTemplate->getPaymentProcessList($PerPage, $Page, $Display, $_REQUEST);
	}else{
		header("location:customer_list.php");
		exit;	
	}
	
	$CustomerList = $objTemplate->getAssignCustomerdetails($customer_id);
	$first_name = $CustomerList[0]['first_name'];
	$sur_name = $CustomerList[0]['sur_name'];	
	$Customer_full_name = $first_name .' ' . $sur_name;
	$objSmarty->assign("Customer_full_name",$Customer_full_name);	
	$objSmarty->assign("PaymentHistoryList",$PaymentHistoryList);
	$objSmarty->assign("current_user_id",$_SESSION["container_rental_admin_id"]);	
	$objSmarty->assign("current_customer_id",$_REQUEST["customer_id"]);	
	$objSmarty->assign('pgnametitle',	'Payment History');
	$objSmarty->assign('payment0',	'1');
	$objSmarty->assign('payment1',	'1');
	
	$objSmarty->display("payment_process.tpl");
?>