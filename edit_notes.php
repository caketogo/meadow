<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$objTemplate->UpdateNotesDetails($_REQUEST);
	header("location: notes_list.php?msgcode=2&customer_id=".$_REQUEST['customer_id']);

} else{
	$NotesEditDetails = $objTemplate->GetEditNotesDetails($_REQUEST);
	/*echo '<pre>';
	print_r($NotesEditDetails);
	exit;*/
}

	$customer_id = $_REQUEST['customer_id'];
	if(isset($customer_id)){
		$CustomerList = $objclient->getAssignCustomerdetails($customer_id);
	}

	$first_name = $CustomerList[0]['first_name'];
	$sur_name = $CustomerList[0]['sur_name'];	
	
	$Customer_full_name = $first_name .' ' . $sur_name;
	
	$objSmarty->assign("Customer_full_name",$Customer_full_name);	
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('NotesEditDetails',	$NotesEditDetails);
$objSmarty->assign('customer0',	'1');
$objSmarty->assign('customer1',	'8');
$objSmarty->assign("pageActive", 'Notes');
$objSmarty->assign("pgnametitle", 'Edit Notes');

$objSmarty->display("edit_notes.tpl");