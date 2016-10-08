<?php

	error_reporting(E_ALL);
	ob_start();
	session_start();
	
	include "includes/admin_common.php";
    
	$objsiteadmin = new siteadmin();

	if( ($_SESSION['container_rental_admin_id'] != "")) {
		Redirect($global_config['siteadmin_globalpath'].'dashboard.php');
	}
	if($_POST['hdaction'] == "adminloginprocess") {
		$objsiteadmin->adminloginprocess($_POST);
	}


	$objSmarty->assign('pgnametitle',	'LOGIN');
	$objSmarty->display('index.tpl');
	
?>