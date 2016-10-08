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
		$msg = 'Customer Updated Successfully';
		$objSmarty->assign("update_msg", $msg);
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Customer Added Successfully';
		$objSmarty->assign("update_msg", $msg);
		$objSmarty->assign("update_msg", $msg);
		
	}elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Customer Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$objTemplate->DeleteCustomerDetails($_REQUEST['triggerid']);
	}
	
	if(isset($_REQUEST['exporstCSVcus']) && $_REQUEST['exporstCSVcus'] == 'yes') {
		$exportCSVCustomerList = $objTemplate->exportCSVCustomerList($_REQUEST);
	}
	
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$CustomerDetails = $objTemplate->getCustomerdetails($PerPage, $Page, $Display, $_REQUEST);
	$objSmarty->assign("CustomerDetails",$CustomerDetails);
	$objSmarty->assign('pgnametitle',	'Customer List');
	
	$objSmarty->assign('customer0',	'1');
	$objSmarty->assign('customer1',	'1');
	
	$objSmarty->display("customer_list.tpl");
	

?>