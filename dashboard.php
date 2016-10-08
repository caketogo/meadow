<?php
	error_reporting(E_ALL);
	ob_start();
	session_start();
	
	include "includes/admin_common.php";
	$objsiteadmin = new siteadmin();
	check_authentication();
	if($_POST['hdaction'] == "adminloginprocess")	{
		$objsiteadmin->adminloginprocess($_POST);
	}
	$todaydate = time();
	$today=date("m/d/y",$todaydate);
	
	//$ContainersDetails = $objsiteadmin->GetContainersDetails($PerPage, $Page, $Display, $_REQUEST);
	$ContainersDetails = $objsiteadmin->GetContainersDetails();

	$ResultCountAvailableContainers	= $objsiteadmin->GetCountAvailableContainers();		
	$ResultCountLockedContainers	= $objsiteadmin->GetCountLockedContainers();	
	$ResultCountOverDueContainers 	= $objsiteadmin->GetCountOverDueContainers();		
	
	$ResultCountPayments 	= $objsiteadmin->GetCountPayments();			
	$ResultCountSMSsent 	= $objsiteadmin->GetCountSMSsent();				
	
/*	echo '<pre>';
	print_r($ResultCountOverDueContainers);
	exit;*/
	
	$objSmarty->assign("ContainersDetails",$ContainersDetails);
	
	$objSmarty->assign("ResultCountOverDueContainers",$ResultCountOverDueContainers['overdue_count']);
	$objSmarty->assign("ResultCountLockedContainers",$ResultCountLockedContainers);	
	$objSmarty->assign("ResultCountAvailableContainers",$ResultCountAvailableContainers);		
	$objSmarty->assign("ResultCountPayments",$ResultCountPayments);			
	$objSmarty->assign("ResultCountSMSsent",$ResultCountSMSsent);				
		
	$objSmarty->assign('pgnametitle',	'Admin User List');
	$dashboardarray = "";
	$objSmarty->assign('dashboardarray', $dashboardarray);
	$objSmarty->assign('today', $today);
	$objSmarty->assign('pgnametitle',	'Dashboard');
	$objSmarty->display('dashboard.tpl');
?>