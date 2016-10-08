<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	
	$objTemplate->UpdateTemplateDetails($_REQUEST);
	header("location: template_list.php?msgcode=2");

} else{
	$objTemplate->GetEditTemplateDetails($_REQUEST);
}
$result = $objTemplate->GetsendgridTemplate();
$result1 = $objTemplate->GetAllTrigger();
$objSmarty->assign("pageActive", 'template_list');
$objSmarty->assign('pgnametitle',	'Edit Template');
$objSmarty->display("edittemplate.tpl");