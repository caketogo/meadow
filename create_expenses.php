<?php 
ob_start();
session_start();
include "includes/admin_common.php";
check_authentication();
$objclient = new siteadmin();


if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 1) {
	$result = $objclient->addExpenses($_REQUEST);
 	header("location:expenses_list.php?msgcode=1");
} 
if(isset($_REQUEST['hdaction']) && $_REQUEST['hdaction'] == 2) {
	//$CustomernotesDetails = $objclient->getCustomerNotes($_REQUEST['id']);
}
if(isset($_REQUEST['expense_id']) && $_REQUEST['expense_id'] != '') {
	$objSmarty->assign("expense_id",$expense_id);
}
$objSmarty->assign("ExpenseDetails",$ExpenseDetails);
$objSmarty->assign('pgnametitle',	'Create Expense');
$objSmarty->assign('expenses0',	'1');
$objSmarty->assign('expenses1',	'1');
$objSmarty->display("create_expenses.tpl");
?>