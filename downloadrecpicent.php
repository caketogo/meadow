<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objmapping = new siteadmin();
/*$PerPage = 10;
$Page    = $_REQUEST["Page"];
$Display = $_REQUEST["Display"];
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addtemplate($_REQUEST);
 	header("location:template_list.php?msgcode=1");
}



$objSmarty->assign("sort",$_REQUEST["sort"]);
$objSmarty->assign("order",$_REQUEST["order"]);
	
$objSmarty->assign("Page",$Page);
$objSmarty->assign("Display",$Display); */


$emaillist = $objmapping->getEmailListByID($_REQUEST);



	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen('php://output', 'w');
	fputcsv($output, array('customers_id', 'Email', 'Orders', 'Date'));

	/*require_once 'Classes/PHPExcel.php';
	require_once 'Classes/PHPExcel/IOFactory.php';
	include 'Classes/PHPExcel/Writer/Excel2007.php';
	
	$fileName = 'email1.xlsx';
	
	$objPHPExcel = PHPExcel_IOFactory::createReader('Excel2007');
	
	$objPHPExcel = $objPHPExcel->load('email_result.xlsx'); // Empty Sheet
	
	$objPHPExcel->setActiveSheetIndex(0);

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$fileName.'"');
	header('Cache-Control: max-age=0'); */
	
	for($x=1; $x<=count($emaillist);$x++){
		$customers_id =  stripslashes($emaillist[$x-1]['customers_id']);
		$customers_email_address =  stripslashes($emaillist[$x-1]['customers_email_address']);
		$temp_name =	stripslashes($emaillist[$x-1]['temp_name']);
		$orders_id =	stripslashes($emaillist[$x-1]['orders_id']);
		$Schedule_date		 =	date("m/d/Y H:i:s", strtotime($emaillist[$x-1]['Schedule_date']));
		
		/*$bKey	=	"A".($x + 2);
		$dKey	=	"B".($x + 2);
		$eKey	=	"C".($x + 2);
		$fKey	=	"D".($x + 2);
		$hKey	=	"E".($x + 2);
		
		$objPHPExcel->getActiveSheet()->SetCellValue($bKey, $customers_id);
		$objPHPExcel->getActiveSheet()->SetCellValue($dKey, $customers_email_address);
		$objPHPExcel->getActiveSheet()->SetCellValue($eKey, $orders_id);
		$objPHPExcel->getActiveSheet()->SetCellValue($fKey, $temp_name);
		$objPHPExcel->getActiveSheet()->SetCellValue($hKey, $Schedule_date);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');*/
		
			fputcsv($output, array($customers_id, $customers_email_address,  $orders_id , $Schedule_date));
		
	}
	//$objWriter->save('php://output');
	

?>