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
	$msg = 'Template Updated Successfully';
	$objSmarty->assign("update_msg", $msg);
} elseif ($_REQUEST['msgcode'] == 1) {
	$msg = 'Template Added Successfully';
	$objSmarty->assign("update_msg", $msg);
}

if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
	
	$objTemplate->DeletetriggerDetails($_REQUEST['triggerid']);
}

$objSmarty->assign("Page",$Page);
$objSmarty->assign("Display",$Display);
$objSmarty->assign("sort",$_REQUEST["sort"]);
$objSmarty->assign("order",$_REQUEST["order"]);

$TriggerDetails = $objTemplate->GetTriggeringDetails($PerPage, $Page, $Display, $_REQUEST);

$objSmarty->assign("TriggerDetails",$TriggerDetails);
$objSmarty->assign('pgnametitle',	'Trigger List');

$objSmarty->assign('trigger1',	'1');
$objSmarty->assign('trigger2',	'1');

$objSmarty->display("trigger_list.tpl");

?>