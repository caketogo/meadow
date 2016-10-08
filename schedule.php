<?php 
include "includes/admin_common.php";
$objclient = new siteadmin();
$result = $objclient->addSchedule();
exit;
?>