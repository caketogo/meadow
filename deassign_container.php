<?php 
	ob_start();
	session_start();
	include "includes/admin_common.php";
	check_authentication();
	$objTemplate = new siteadmin();
	
	$PerPage = 10;
	$Page    = $_REQUEST["Page"];
	$Display = $_REQUEST["Display"];
	
/*	echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	
	if($_REQUEST['msgcode'] == 2) {
		$msg = 'De Assign Container Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'De Assign Container Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'De Assign Container Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}elseif ($_REQUEST['msgcode'] == 15) {
		$msg = 'DeAssigned Container Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	

	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 1) {
	/*	echo '<pre>';
		print_r($_REQUEST);
		exit;*/
		$result = $objTemplate->DeAssignContainer($_REQUEST);
		header("location:payment_history.php?customer_id=".$_REQUEST['customer_id']."&msgcode=25");
	} 
	

	$customer_id = $_REQUEST['customer_id'];
	if(isset($customer_id)){
		$PaymentHistoryList = $objTemplate->getDeAssignContainerList($PerPage, $Page, $Display, $_REQUEST);
		/*echo '<pre>';
		print_r($PaymentHistoryList);*/
			
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
	/*$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$ContainerPricesList = $objTemplate->getContainerPricesList($PerPage, $Page, $Display, $_REQUEST);*/
	
	//$getCustomerNotesList = $objTemplate->getCustomerNotesList();
	//$objSmarty->assign("PaymentHistoryList",$PaymentHistoryList);
	
	$objSmarty->assign('pgnametitle',	'De Assign Container');
	$objSmarty->assign('payment0',	'1');
	$objSmarty->assign('payment1',	'1');
	
	$objSmarty->display("deassign_container.tpl");
?>