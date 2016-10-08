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
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Customer Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteCustomerDetails($_REQUEST['triggerid']);
	}
	
	/*echo '<pre>';
	print_r($_SESSION);
	exit;*/
	$container_rental_admin_id = $_SESSION['container_rental_admin_id'];
	$objSmarty->assign("current_user_id",$container_rental_admin_id);	
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$CustomerDetails = $objTemplate->view_Customerdetails($_REQUEST['id']);
	$CustomerContainerdetails = $objTemplate->view_CustomerContainerdetails($_REQUEST['id']);
	$CustomerAuthordetails = $objTemplate->CustomerAuthordetails($_REQUEST['id']);

	$number_CustomerContainer = count($CustomerContainerdetails);		
	
	
	$days = '28';
	for ($m = 0; $m < count($CustomerContainerdetails); $m++) {
		$date = strtotime("+".$days." days", strtotime($CustomerContainerdetails[$m]['contract_start_date']));
		$CustomerContainerdetails[$m]['due_date'] = date("m/d/Y", $date);
		//return  date("Y-m-d", $date);
	}	
	
	/*echo '<pre>';
	print_r($CustomerDetails);*/
	
	
	
	$address_proof 	= $CustomerDetails[0]['address_proof'];
	$id_proof		= $CustomerDetails[0]['id_proof'];	
	
	$id_proof_type 	= $CustomerDetails[0]['id_proof_type'];
	
	$filename_license_agreement = $CustomerContainerdetails[0]['filename_license_agreement'];
	
	$get_address_proof 		= explode("address_proof/", $address_proof);
	$get_address_proof_res 	= $get_address_proof[1]; 
	//echo '<br>';
	$get_id_proof 		= explode("uploads/id_proof/", $id_proof);
	$get_id_proof_res 	= $get_id_proof[1]; 
	
	
	//$CustomerList = $objTemplate->getAssignCustomerdetails($customer_id);
	
	$first_name = $CustomerDetails[0]['first_name'];
	$sur_name = $CustomerDetails[0]['sur_name'];	
	$Customer_full_name = $first_name .' ' . $sur_name;

	$objSmarty->assign("Customer_full_name",$Customer_full_name);
	
	
	$objSmarty->assign("filename_license_agreement",$filename_license_agreement);	
	
	$objSmarty->assign("get_address_proof_res",$get_address_proof_res);
		
		/*$objSmarty->assign("get_id_proof_res",$get_id_proof_res);
		$objSmarty->assign("id_proof_type",$id_proof_type);		*/
		
		$objSmarty->assign("get_id_proof_res",$get_id_proof_res);
		$objSmarty->assign("id_proof_type",$id_proof_type);		
		
	$objSmarty->assign("CustomerDetails",$CustomerDetails);
	$objSmarty->assign("CustomerContainerdetails",$CustomerContainerdetails);	
	$objSmarty->assign("number_CustomerContainer",$number_CustomerContainer);		
	$objSmarty->assign("CustomerAuthordetails",$CustomerAuthordetails);			
	
	$objSmarty->assign('pgnametitle',	'View Customer List');
	
	$objSmarty->assign('customer0',	'1');
	$objSmarty->assign('customer1',	'1');
	
	$objSmarty->display("view_customer.tpl");
	

?>