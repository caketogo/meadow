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
		$msg = 'Assign Container Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Assign Container Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Assign Container Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}

	if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
		$result = $objTemplate->AssignContainer($_REQUEST);
		header("location:payment_history.php?customer_id=".$_REQUEST['customer_id']."");
	} 

	$customer_id = $_REQUEST['customer_id'];
	if(isset($customer_id)){
		$CustomerList = $objTemplate->getAssignCustomerdetails($customer_id);
	}

	/*if(isset($customer_id)){
		//$AssignContainerList = $objTemplate->getAssignContainerList($PerPage, $Page, $Display, $_REQUEST);
	}else{
	}*/
	$first_name = $CustomerList[0]['first_name'];
	$sur_name = $CustomerList[0]['sur_name'];	
	
	$Customer_full_name = $first_name .' ' . $sur_name;
	
	$objSmarty->assign("AssignContainerList",$AssignContainerList);
	
	
	$objSmarty->assign("Customer_full_name",$Customer_full_name);		
	$objSmarty->assign("current_user_id",$_SESSION["container_rental_admin_id"]);	
	$objSmarty->assign("current_customer_id",$_REQUEST["customer_id"]);	
	
	$objSmarty->assign('pgnametitle',	'Assign Container');
	$objSmarty->assign('payment0',	'1');
	$objSmarty->assign('payment7',	'1');
	
	$objSmarty->display("assign_container.tpl");
?>