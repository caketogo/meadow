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
		$msg = 'Container Prices Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'Container Prices Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Container Price Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$ContainerPricesList = $objTemplate->getContainerPricesList($PerPage, $Page, $Display, $_REQUEST);
	$objSmarty->assign("ContainerPricesList",$ContainerPricesList);
	
	$objSmarty->assign('pgnametitle',	'Container Prices List');
	$objSmarty->assign('container0',	'1');
	$objSmarty->assign('container4',	'1');
	
	$objSmarty->display("container_prices_list.tpl");
?>