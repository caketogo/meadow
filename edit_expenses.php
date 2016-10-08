<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objTemplate = new siteadmin();
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$objTemplate->UpdateNotesDetails($_REQUEST);
	header("location: notes_list.php?msgcode=2");

} else{
	//$ExpensesEditDetails = $objTemplate->GetEditExpensesDetails($_REQUEST);
	/*echo '<pre>';
	print_r($NotesEditDetails);
	exit;*/
}
//$objTemplate->Getmapping('mapping');
//$objTemplate->GetMappingTemplateDetails();
//$objSmarty->assign('ExpensesEditDetails',	$ExpensesEditDetails);
$objSmarty->assign('expenses0',	'1');
$objSmarty->assign('expenses1',	'1');
$objSmarty->assign("pageActive", 'Expenses');
$objSmarty->assign("pgnametitle", 'Edit Expenses');

$objSmarty->display("edit_expenses.tpl");