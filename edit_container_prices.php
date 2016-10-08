<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdateContainerPricesListDetails($_REQUEST);
	header("location: container_prices_list.php?msgcode=2");

} else{
	$ContainerPricesDetails = $objTemplate->GetEditContainerPricesListDetails($_REQUEST);
}

$objSmarty->assign("ContainerPricesDetails",$ContainerPricesDetails);	
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container4',	'1');
$objSmarty->assign("pageActive", 'ContainerPrices');
$objSmarty->assign("pgnametitle", 'Edit Container Prices');
$objSmarty->display("edit_container_prices.tpl");
?>