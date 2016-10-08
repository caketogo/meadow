<?php
	require "config.php";
	require $global_config["site_includespath"]."functions.php";

	$global_config["English_l"]		=		"name_en";
	$global_config["Arabic_l"]		=		"name_ar";
	$global_config["French_l"]		=		"name_fr";
	$global_config["Spanish_l"]		=		"name_sp";
	$global_config["German_l"]		=		"name_gr";
	$global_config["Urdu_l"]			=		"name_ur";
	$global_config["Russian_l"]		=		"name_rs";

	$global_config["English_d"]		=		"description_en";
	$global_config["Arabic_d"]		=		"description_ar";
	$global_config["French_d"]		=		"description_fr";
	$global_config["Spanish_d"]		=		"description_sp";
	$global_config["German_d"]		=		"description_gr";
	$global_config["Urdu_d"]			=		"description_ur";
	$global_config["Russian_d"]		=		"description_rs";
	
	$global_config["English_cap"]	=		"ccap_en";
	$global_config["Arabic_cap"]	=		"ccap_ar";
	$global_config["French_cap"]	=		"ccap_fr";
	$global_config["Spanish_cap"]	=		"ccap_sp";
	$global_config["German_cap"]	=		"ccap_gr";
	$global_config["Urdu_cap"]		=		"ccap_ur";
	$global_config["Russian_cap"]	=		"ccap_rs";

	
	require $global_config["site_localpath"]."includes/smarty/Smarty.class.php";
	require $global_config["site_includespath"]."db/db_class.php";
	require $global_config["site_includespath"]."db/db_gen_class.php";
	ini_set('display_errors', 0);
	if($_SERVER['REMOTE_ADDR'] == "111.93.237.186") {
		//error_reporting(E_ALL);
		//ini_set('display_errors', 1);
		error_reporting(E_ALL ^ (E_NOTICE|E_WARNING));
	}
	else {
		//error_reporting(E_ALL);
		//ini_set('display_errors', 1);
		error_reporting(E_ALL ^ (E_NOTICE|E_WARNING));
	}
	//printArray($_SESSION);
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
	
	if($_SESSION['listedo_country_id'] == "") {
		$_SESSION['listedo_country_id']		=	11;
		$_SESSION['listedo_country']		=	'UAE';
		$_SESSION['listedo_countryprefix']	=	'uae';
	}
	if($_SESSION['listedo_language_id'] == "") {
		$_SESSION['listedo_language_id'] = 1;
		$_SESSION['listedo_language'] = 'English';
		$_SESSION['listedo_language_file'] = 'english';
	}
	
	/*$countlist = getcountlist();
	$objSmarty->assign('countlist', $countlist);
	*/
	
	$objcommon = new common();
	$objlanguages = new languages();
	$objcategories = new categories();
	
	if($_REQUEST['listcountry'] != "") {
		$country_fordb_arr = $objcommon->getcountry_fordb($_REQUEST);
		$global_config["dbname_country"]	=	"listedo_".$country_fordb_arr;
		$countlist = $objcommon->get_countries_list();
		$objSmarty->assign('countlist', $countlist);
	}
	else {

	
		if($_SESSION['listedo_countryprefix'] != "") {
			$country_fordb_arr = $objcommon->getcountry_fordb_1($_SESSION['listedo_countryprefix']);
			$global_config["dbname_country"]	=	"listedo_".$country_fordb_arr;
			$countlist = $objcommon->get_countries_list();
			$objSmarty->assign('countlist', $countlist);
		}
	}
/*	
	
	
	printArray($_REQUEST);
	printArray($_SESSION);
	printArray($global_config);
*/	
	
	if($_SESSION['listedo_country_id'] != "") {
		$countryselstr = 
		$countryselstr = $objlanguages->get_country_listbycid($_SESSION['listedo_country_id']);
		//$citylist = get_cities_list($_SESSION['listedo_country_id']);
		$citylist = $objcommon->get_cities_listbycid($_SESSION['listedo_country_id']);
		//printArray($citylist);
		$objSmarty->assign('citylist', $citylist);
		$objSmarty->assign('countryselstr', $countryselstr);
	}
	else {
		$objSmarty->assign('$citylist', "City Not Found");		
		$objSmarty->assign('countryselstr', 'Country');
	}

	if($_SESSION['listedo_country_id'] != "")	{
		$langlist = $objlanguages->get_languages_list($_SESSION['listedo_country_id']);
		$objSmarty->assign('langlist', $langlist);
	}

	if($_SESSION['listedo_language_id'] != "") {
		$langselarray = $objlanguages->get_language_listbyid($_SESSION['listedo_language_id']);
		$objSmarty->assign('langselstr', $langselarray[0]['title']);
	}
	else {
		$_SESSION['listedo_language_id'] = 1;
		$_SESSION['listedo_language'] = "English";
		$objSmarty->assign('langselstr', 'Language');
	}

		//printArray($_SESSION);
	$langfileary['English']	=	"en";
	$langfileary['Arabic']	=	"ar";
	$langfileary['Russian']	=	"rs";
	$langfileary['Spanish']	=	"sp";
	$langfileary['French']	=	"fr";
	$langfileary['Urdu']	=	"ur";
	$langfileary['German']	=	"gr";
	$objSmarty->assign('validatejs', "validate_".$langfileary[$_SESSION['listedo_language']].".js");
	
	require $global_config["site_includespath"]."languages/".$_SESSION['listedo_language'].".php";
	if($_SESSION['listedo_city_id'] != "") {
		$cityselstr = $objcommon->get_city_listbyid($_SESSION['listedo_city_id']);
		$objSmarty->assign('cityselstr', $cityselstr);
	}
	else {
		$objSmarty->assign('cityselstr', $language_values[0]['citytext']);
	}	
	
	$parentcategoriesary = $objcategories->getparentcategorieslist();
	//printArray($parentcategoriesary);
	$objSmarty->assign("categorystring",			$parentcategoriesary);
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
	$timezonevalue = "America/Los_Angeles";
	date_default_timezone_set($timezonevalue);
?>