<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdatecategoryDetails($_REQUEST);
	header("location: category_list.php?msgcode=2");

} else{
	$objTemplate->GetEditcategoryDetails($_REQUEST);
}
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
$objSmarty->assign('trigger1',	'1');
$objSmarty->assign('trigger2',	'2');
$objSmarty->assign("pageActive", 'Category');
$objSmarty->assign("pgnametitle", 'Edit Category');

$objSmarty->display("edit_category.tpl");