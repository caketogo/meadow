<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	/*echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	
	$objTemplate->UpdatecustomerDetails($_REQUEST);
	header("location: customer_list.php?msgcode=2");

} else{
	//$objTemplate->GetEditcustomerDetails($_REQUEST);
	$CustomerDetails = $objTemplate->view_Customerdetails($_REQUEST['id']);
	$CustomerContainerdetails = $objTemplate->view_CustomerContainerdetails($_REQUEST['id']);
	$CustomerAuthordetails = $objTemplate->CustomerAuthordetails($_REQUEST['id']);
}

	// get container number start
		/*$getcontainerTypelistEditCustomerResult = array();
		for($i=0; $i<count($CustomerContainerdetails); $i++){
			$getcontainerTypelistEditCustomerResult = $objTemplate->getcontainerTypelistEditCustomer($CustomerContainerdetails[$i]['container_type']);
		}
		echo '<pre>';
		print_r($getcontainerTypelistEditCustomerResult);*/
		//exit;
	// get container number End
	
	$address_proof 	= $CustomerDetails[0]['address_proof'];
	$id_proof		= $CustomerDetails[0]['id_proof'];	
	
	$id_proof_type 	= $CustomerDetails[0]['id_proof_type'];
	
	$get_address_proof 		= explode("/home/webuser/public_html/container_rental/uploads/address_proof/", $address_proof);
	$get_address_proof_res 	= $get_address_proof[1]; 
	
	$get_id_proof 		= explode("/home/webuser/public_html/container_rental/uploads/id_proof/", $id_proof);
	$get_id_proof_res 	= $get_id_proof[1]; 
	
	$objSmarty->assign("get_address_proof_res",$get_address_proof_res);
	$objSmarty->assign("get_id_proof_res",$get_id_proof_res);
	$objSmarty->assign("id_proof_type",$id_proof_type);	
	$objSmarty->assign("CustomerDetails",$CustomerDetails);
	$objSmarty->assign("CustomerContainerdetails",$CustomerContainerdetails);	
	//$objSmarty->assign("number_CustomerContainer",$number_CustomerContainer);		
	$objSmarty->assign("CustomerAuthordetails",$CustomerAuthordetails);
	$objSmarty->assign('customer0',	'1');
	$objSmarty->assign('customer3',	'1');
	$objSmarty->assign("pageActive", 'Customer');
	$objSmarty->assign("pgnametitle", 'Edit Customer');
	
	$objSmarty->display("edit_customer.tpl");