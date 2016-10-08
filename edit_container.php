<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdatecontainerDetails($_REQUEST);
	header("location: container_list.php?msgcode=2");

} else{
	$objTemplate->GetEditcontainerDetails($_REQUEST);
}
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('container0',	'1');
$objSmarty->assign('container2',	'1');
$objSmarty->assign("pageActive", 'Container');
$objSmarty->assign("pgnametitle", 'Edit Container');

$objSmarty->display("edit_container.tpl");