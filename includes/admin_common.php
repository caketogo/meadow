<?php

	require "config.php";

	require $global_config["site_includespath"]."functions.php";

	require $global_config["site_localpath"]."includes/smarty/Smarty.class.php";

	require $global_config["site_includespath"]."db/db_class.php";

	require $global_config["site_includespath"]."db/db_gen_class.php";

	

	//error_reporting(E_ALL);

	

	error_reporting(E_ALL ^ (E_NOTICE|E_WARNING));

	

	function __autoload($classname)	{

		global $global_config;

		if(file_exists($global_config['path']."includes/classes/class.".$classname . '.php')) {

			require $global_config['path']."includes/classes/class.".$classname . '.php';

		}

	}

	$objSmarty = new Smarty();

	/*

	$objSmarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'].'/listedo/templates/');

	$objSmarty->setCompileDir($_SERVER['DOCUMENT_ROOT'].'/listedo/templates_c/');

	$objSmarty->setConfigDir($_SERVER['DOCUMENT_ROOT'].'/listedo/configs/');

	$objSmarty->setCacheDir($_SERVER['DOCUMENT_ROOT'].'/listedo/cache/');	

	*/

	if(isset($_POST))	{

		foreach ($_POST as $key => $val)	{

			$$key = $val;

		}

	}

	

	if(isset($_GET))	{

		foreach ($_GET as $key => $val)

			$$key = $val;

	}

	if(isset($_SESSION))	{

		foreach ($_SESSION as $key => $val)

			$$key = $val;

	}

	



	require $global_config["site_includespath"]."classes/class.common.php";

	require $global_config["site_includespath"]."classes/class.siteadmin.php";

	$objcommon = new common();

	$objsiteadmin = new siteadmin();

	

	$objcommon = new common();

	$objsiteadmin = new siteadmin();

	if($_SESSION['container_rental_admin_id'] != "") {

		$adminuserdetails = $objsiteadmin->getadminuserdetails();

		

		$notesdetails = $objsiteadmin->getnotesdashcount();

		$notesdetailscomds = $objsiteadmin->getnotesdashdetails();

		$noteslist	= $objsiteadmin->getnotesdetails();



/* echo '<pre>';

print_r($notesdetailscomds);

exit;*/

        $objSmarty->assign("notesdetailscomds",$notesdetailscomds);

        $objSmarty->assign("notescount",$notesdetails);

		$objSmarty->assign("noteslist",$noteslist);

		



		$objSmarty->assign("adminuser_id",					$adminuserdetails[0]['uid']);

		$objSmarty->assign("adminuser_d_created",		date('j M. Y', $adminuserdetails[0]['created_date']['seconds']));

		$objSmarty->assign("adminuser_d_dob",				date('m/d/Y', $adminuserdetails[0]['dob']['seconds']));

		$objSmarty->assign("adminuser_utype",				$adminuserdetails[0]['user_type']);

		$objSmarty->assign("adminuser_fname",				$adminuserdetails[0]['first_name']);

		$objSmarty->assign("adminuser_lname",				$adminuserdetails[0]['last_name']);

		$objSmarty->assign("adminuser_email",				$adminuserdetails[0]['email']);

		$objSmarty->assign("adminuser_usermgnt",			$adminuserdetails[0]['user_management']);

		$objSmarty->assign("adminuser_categorymgnt",		$adminuserdetails[0]['category_management']);

		$objSmarty->assign("adminuser_containermgnt",		$adminuserdetails[0]['container_management']);

		$objSmarty->assign("adminuser_customermgnt",		$adminuserdetails[0]['customer_management']);

		$objSmarty->assign("adminuser_fullname",		$adminuserdetails[0]['first_name']." ".$adminuserdetails[0]['last_name']);

		$objSmarty->assign("adminuser_gender",			$adminuserdetails[0]['gender']);

		$objSmarty->assign("adminuser_uuid",				$adminuserdetails[0]['uid']);

		if($adminuserdetails[0]['user_image'] != "") {

			$objSmarty->assign("adminuser_pimage",			$global_config['siteadmin_uploadpath']."adminusers/".$adminuserdetails[0]['id']."/".$adminuserdetails[0]['profile_image']);

		}

		else {

			$objSmarty->assign("adminuser_pimage",			$global_config['siteadmin_uploadpath']."adminusers/default.png");

		}

	}

	

	$objSmarty->assign("site_title",			$global_config["site_title"]);

	$objSmarty->assign("site_name",				$global_config["site_name"]);

	$objSmarty->assign("site_env",				$global_config["site_env"]);

	$objSmarty->assign("site_localpath",		$global_config["site_localpath"]);

	$objSmarty->assign("site_websiteurlpath",	$global_config["site_websiteurlpath"]);

	$objSmarty->assign("site_globalpath",		$global_config["site_globalpath"]);

	$objSmarty->assign("sitepath",				$global_config["sitepath"]);

	$objSmarty->assign("site_stylespath",		$global_config["site_stylespath"]);

	$objSmarty->assign("site_scriptpath",		$global_config["site_scriptpath"]);

	$objSmarty->assign("site_imagepath",		$global_config["site_imagepath"]);

	$objSmarty->assign("site_uploadpath",		$global_config["site_uploadpath"]);

	$objSmarty->assign("site_fontspath",		$global_config["site_fontspath"]);

	$objSmarty->assign("site_includespath",		$global_config["site_includespath"]);

	$objSmarty->assign("main_classpath",		$global_config["main_classpath"]);

	$objSmarty->assign("from_email",			$global_config["from_email"]);

	$objSmarty->assign("debug_mode",			$global_config["debug_mode"]);

	$objSmarty->assign("perpage_limit",			$global_config["perpage_limit"]);

	$objSmarty->assign("SwitchMail",			$global_config["SwitchMail"]);

	

	$objSmarty->assign("siteadmin_localpath",		$global_config["siteadmin_localpath"]);

	$objSmarty->assign("siteadmin_globalpath",	$global_config["siteadmin_globalpath"]);

	$objSmarty->assign("siteadmin_stylespath",	$global_config["siteadmin_stylespath"]);

	$objSmarty->assign("siteadmin_scriptpath",	$global_config["siteadmin_scriptpath"]);

	$objSmarty->assign("siteadmin_imagepath",		$global_config["siteadmin_imagepath"]);

	$objSmarty->assign("siteadmin_uploadpath",	$global_config["siteadmin_uploadpath"]);

	$objSmarty->assign("siteadmin_fontspath",		$global_config["siteadmin_fontspath"]);

	

	$timezonevalue = "America/Los_Angeles";

	date_default_timezone_set($timezonevalue);

	ini_set('display_errors',0);

	error_reporting(E_ALL);

?>