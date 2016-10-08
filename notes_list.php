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
		$msg = 'Notes Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Notes Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Notes Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	$objSmarty->assign("current_customer_id",$_REQUEST["customer_id"]);	
	
	
	$customer_id = $_REQUEST['customer_id'];
	if(isset($customer_id)){
		$CustomerList = $objTemplate->getAssignCustomerdetails($customer_id);
	}

	$first_name = $CustomerList[0]['first_name'];
	$sur_name = $CustomerList[0]['sur_name'];	
	
	$Customer_full_name = $first_name .' ' . $sur_name;
	
	$objSmarty->assign("Customer_full_name",$Customer_full_name);		
	/*$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$ContainerPricesList = $objTemplate->getContainerPricesList($PerPage, $Page, $Display, $_REQUEST);*/
	
	//$getCustomerNotesList = $objTemplate->getCustomerNotesList();
	//$objSmarty->assign("getCustomerNotesList",$getCustomerNotesList);
	
	$objSmarty->assign('pgnametitle',	'Customer Notes List');
	$objSmarty->assign('notes0',	'1');
	$objSmarty->assign('customer1',	'8');
	
	$objSmarty->display("notes_list.tpl");
?>