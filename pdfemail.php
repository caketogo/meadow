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

 require_once("dompdf/dompdf_config.inc.php");
 
$emaillist = $objmapping->getEmailList($PerPage, $Page, $Display,$_REQUEST);

$pagecontent = $objSmarty->fetch("templates/emailpdf.tpl");


	$dompdf = new DOMPDF();
	$dompdf->load_html($pagecontent);
	$dompdf->render();
	$dompdf->stream("sample.pdf");
	

?>