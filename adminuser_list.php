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
		$msg = 'Admin User Updated Successfully';
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Admin User Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	if($_REQUEST['msgcode'] == 10) {
		$msg = 'Admin User Updated Successfully';
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Admin User Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Admin User Deleted Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$AdminUserDetails = $objTemplate->GetAdminUserDetails($PerPage, $Page, $Display, $_REQUEST);
	$objSmarty->assign("AdminUserDetails",$AdminUserDetails);
	$objSmarty->assign('pgnametitle',	'Admin User List');
	
	$objSmarty->assign('adminuser1',	'1');
	$objSmarty->assign('adminuser0',	'1');
	
	$objSmarty->display("adminuser_list.tpl");
	

?>