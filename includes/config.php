<?php
	#==========================================================================================================#
	#											Global Config Values
	#==========================================================================================================#
	$global_config									=		array();
	$global_config["site_title"]					=		"Container Rental";
	$global_config["site_name"] 					=		"Container Rental";
	$global_config["site_env"]					=		"4"; /* 0=LIVE, 1=DEV, 2=STAGE, 3=DEVLOCAL, 4=LOCAL */
	$global_config["site_localpath"]				=		"/home/vagrant/Code/meadow/";
	$global_config["site_websiteurlpath"]		                =	        "http://192.185.46.249/~meadow";
	$global_config["site_globalpath"]				=		"http://meadow/"; // For Gloabl Path
	$global_config["sitepath"]					=	        "http://meadow/"; // For Gloabl Path
	$global_config["site_stylespath"]				=		$global_config["site_globalpath"]."css/";
	$global_config["site_scriptpath"]				=		$global_config["site_globalpath"]."js/";
	$global_config["site_imagepath"]				=		$global_config["site_globalpath"]."images/";
	$global_config["site_uploadpath"]				=		$global_config["site_globalpath"]."uploads/";
	$global_config["site_fontspath"]				=		$global_config["site_globalpath"]."fonts/";
	$global_config["site_includespath"]				=		$global_config["site_localpath"]."/includes/";
	$global_config["main_classpath"]				=		$global_config["site_localpath"]."/includes/classes/";
	$global_config["from_email"]					=		"Saravanan <dancersaran13@gmail.com>";
	$global_config["debug_mode"]					=		1; // 1 = ON , 0 = OFF
	$global_config["perpage_limit"]					=		"20";
	$global_config["SwitchMail"]					=		2;
	$global_config["dbhost"]						=		"localhost";
	$global_config["dbuname"]						=		"homestead";
	$global_config["dbpass"]						=		"secret";
	$global_config["dbname"]						=		"meadow";
	$global_config["table_prefix"]					=		"tbl_";
	$global_config["ipsecurityipaddress"]			=		"192.185.46.249";

	$global_config["siteadmin_localpath"]			=		"/home/vagrant/Code/meadow/";
	$global_config["siteadmin_globalpath"]			=		"http://meadow/";
	$global_config["siteadmin_stylespath"]			=		$global_config["siteadmin_globalpath"]."css/";
	$global_config["siteadmin_scriptpath"]			=		$global_config["siteadmin_globalpath"]."js/";
	$global_config["siteadmin_imagepath"]			=		$global_config["siteadmin_globalpath"]."images/";
	$global_config["siteadmin_uploadpath"]			=		$global_config["siteadmin_globalpath"]."uploads/";
	$global_config["siteadmin_fontspath"]			=		$global_config["siteadmin_globalpath"]."fonts/";	
	ini_set("memory_limit", "1024M");	
		ini_set("display_errors", "on");
		error_reporting(E_ALL ^ (E_NOTICE|E_WARNING));
	if($global_config["site_env"] == "4") {
		
	}
	else {
		//$global_config["site_globalpath"]		=		$_SERVER['HTTP_HOST'];
	}
	
	//print '<pre>'; print_r($global_config);exit;
	#==========================================================================================================#
	#											Global Config Values
	#==========================================================================================================#	
	/*
			$cluster  = Cassandra::cluster()->build();
			$keyspace  = 'listedo';
			$csession  = $cluster->connect($keyspace);
			*/
			
?>