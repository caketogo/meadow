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
		$msg = 'Template Updated Successfully';
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Category Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Category Deleted Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$CategoryDetails = $objTemplate->getCategorylistdetails($PerPage, $Page, $Display, $_REQUEST);
	$objSmarty->assign("CategoryDetails",$CategoryDetails);
	$objSmarty->assign('pgnametitle',	'Category List');
	
	$objSmarty->assign('category0',	'1');
	$objSmarty->assign('category1',	'1');
	
	$objSmarty->display("category_list.tpl");
	

?>