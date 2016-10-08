<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addContainerPrices($_REQUEST);
 	header("location:container_prices_list.php?msgcode=1");
} 
//$objclient->Getmapping('mapping');
//$objclient->GetMappingTemplateDetails();
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Container Prices');
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container5',	'1');
$objSmarty->display("container_prices.tpl");
?>