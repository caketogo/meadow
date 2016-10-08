<?php
	ob_start();
	session_start();
	include "includes/admin_common.php";
	$RedirectUrl = "index.php";
	unset($_SESSION["container_rental_admin_id"]);
	unset($_SESSION["container_rental_admin_emailid"]);
	unset($_SESSION["container_rental_admin_name"]);
	Redirect($RedirectUrl);
?>