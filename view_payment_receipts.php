<?php 
	ob_start();
	session_start();
	include "includes/admin_common.php";
	check_authentication();
	$objTemplate = new siteadmin();
	
	$PerPage = 100;
	$Page    = $_REQUEST["Page"];
	$Display = $_REQUEST["Display"];
	
	/*	echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	
	if($_REQUEST['msgcode'] == 2) {
		$msg = 'Payment Receipts Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Payment Receipts Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Payment Receipts Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	

	if(isset($_REQUEST['exporstCSV']) && $_REQUEST['exporstCSV'] == 'yes') {
		/*	echo 'exporstCSV';
			exit;	*/	
		$exportCSVPaymetReceiptsRestult = $objTemplate->exportCSVPaymetReceipts($_REQUEST);
	}
	
	if(isset($_REQUEST['exporstsend_new']) && $_REQUEST['exporstsend_new'] == 'yes') {
			/*echo 'exporstsend';
			exit;	*/
		$ViewPaymentReceiptList = $objTemplate->exportCSVPaymentReceiptList($_REQUEST);			
		//$exportCSVPaymetEmailsend = $objTemplate->exportCSVPaymetEmailsend($_REQUEST);
	} else if(isset($_REQUEST['exporstsend']) && $_REQUEST['exporstsend'] == 'yes') {
		$sendMailAttachmentCSV = $objTemplate->sendMailAttachmentCSV($_REQUEST);	
		$ViewPaymentReceiptList = $objTemplate->getNewPaymentReceiptList($PerPage, $Page, $Display, $_REQUEST);
		
	}else{
		$ViewPaymentReceiptList = $objTemplate->getNewPaymentReceiptList($PerPage, $Page, $Display, $_REQUEST);
	}	
	//$ViewPaymentReceiptList = $objTemplate->getViewPaymentReceiptList($PerPage, $Page, $Display, $_REQUEST);
	//$ViewPaymentReceiptList = '';


	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);

	
	$objSmarty->assign("ViewPaymentReceiptList",$ViewPaymentReceiptList);
	
	$objSmarty->assign("current_user_id",$_SESSION["container_rental_admin_id"]);	
	$objSmarty->assign("current_customer_id",$_REQUEST["customer_id"]);	
	$objSmarty->assign('pgnametitle',	'View Payment Receipts');
	$objSmarty->assign('customer0',	'1');
	$objSmarty->assign('customer1',	'8');
	
	$objSmarty->display("view_payment_receipts.tpl");
?>