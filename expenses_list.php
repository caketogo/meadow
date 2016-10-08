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
		$msg = 'Expenses Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Expenses Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Expenses Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	//downloadZipExpenseList
	if(isset($_REQUEST['downloadzipexp']) && $_REQUEST['downloadzipexp'] == 'yes') {
		$exportCSVExpenseList = $objTemplate->downloadZipExpenseList($_REQUEST);
	}
	
	if(isset($_REQUEST['exporstCSVexp']) && $_REQUEST['exporstCSVexp'] == 'yes') {
		$exportCSVExpenseList = $objTemplate->exportCSVExpenseList($_REQUEST);
	}
	
		
	/*$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$ContainerPricesList = $objTemplate->getContainerPricesList($PerPage, $Page, $Display, $_REQUEST);*/
	
	//$getCustomerNotesList = $objTemplate->getCustomerNotesList();
	//$objSmarty->assign("getCustomerNotesList",$getCustomerNotesList);
	
	$objSmarty->assign('pgnametitle',	'Expenses List');
	$objSmarty->assign('expenses0',	'1');
	$objSmarty->assign('expenses1',	'1');
	
	$objSmarty->display("expenses_list.tpl");
?>