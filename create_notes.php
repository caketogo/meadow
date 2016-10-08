<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();


if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addNotes($_REQUEST);
 	header("location:notes_list.php?msgcode=1&customer_id=".$_REQUEST['customer_id']);
} 
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 2) {
	//$CustomernotesDetails = $objclient->getCustomerNotes($_REQUEST['id']);
}
if(isset($_REQUEST['customer_id']) && $_REQUEST['customer_id'] != '') {
	$objSmarty->assign("customer_id",$customer_id);

}

	$customer_id = $_REQUEST['customer_id'];
	if(isset($customer_id)){
		$CustomerList = $objclient->getAssignCustomerdetails($customer_id);
	}

	$first_name = $CustomerList[0]['first_name'];
	$sur_name = $CustomerList[0]['sur_name'];	
	
	$Customer_full_name = $first_name .' ' . $sur_name;
	
	$objSmarty->assign("Customer_full_name",$Customer_full_name);		



$objSmarty->assign("CustomernotesDetails",$CustomernotesDetails);
$objSmarty->assign('pgnametitle',	'Create Notes');
$objSmarty->assign('customer0',	'1');
$objSmarty->assign('customer1',	'8');
$objSmarty->display("create_notes.tpl");
?>