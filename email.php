<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objmapping = new siteadmin();
$PerPage = 10;
$Page    = $_REQUEST["Page"];
$Display = $_REQUEST["Display"];
/*if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addtemplate($_REQUEST);
 	header("location:template_list.php?msgcode=1");
} */



$objSmarty->assign("sort",$_REQUEST["sort"]);
$objSmarty->assign("order",$_REQUEST["order"]);
	
$objSmarty->assign("Page",$Page);
$objSmarty->assign("Display",$Display);


$objmapping->GetMappingTemplateDetails();
$objmapping->Getmapping('mapping');
$objmapping->getEmailList($PerPage, $Page, $Display,$_REQUEST);
$objSmarty->assign("template_id",$_REQUEST['template_id']);
$objSmarty->assign('pgnametitle',	'Email');
$objSmarty->assign('Email',	'1');

$objSmarty->display("email.tpl");
?>