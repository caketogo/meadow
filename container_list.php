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
		$msg = 'Container Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$msg = 'Container Added Successfully';
		$objSmarty->assign("update_msg", $msg);
	}
	
	
	if($_REQUEST['msgcode'] == 5) {
		$msg = 'Container name already exits.';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	}  elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'Container Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);
		$objSmarty->assign("update_msg", $msg);
	}
	
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	if(isset($_REQUEST['exporstCSVcon']) && $_REQUEST['exporstCSVcon'] == 'yes') {
	
		$exportCSVPaymetReceiptsRestult = $objTemplate->exportCSVContainerList($_REQUEST);
	}
	
	$objSmarty->assign("Page",$Page);
	$objSmarty->assign("Display",$Display);
	$objSmarty->assign("sort",$_REQUEST["sort"]);
	$objSmarty->assign("order",$_REQUEST["order"]);
	
	$ContainerDetails = $objTemplate->getContainerdetails($PerPage, $Page, $Display, $_REQUEST);
	$objSmarty->assign("ContainerDetails",$ContainerDetails);
	$objSmarty->assign('pgnametitle',	'Container List');
	
	$objSmarty->assign('container0',	'1');
	$objSmarty->assign('container1',	'1');
	//$objSmarty->assign('container2',	'2');	
	
	$objSmarty->display("container_list.tpl");
	

?>