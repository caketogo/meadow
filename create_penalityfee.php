<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();

if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	/*echo '<pre>';
	print_r($_REQUEST);
	exit;*/
	$result = $objclient->addPenalityFee($_REQUEST);
 	header("location:penalityfee.php?msgcode=1");
} 
$objSmarty->assign('pgnametitle',	'Penality Fee');
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container6',	'1');
$objSmarty->display("create_penalityfee.tpl");
?>