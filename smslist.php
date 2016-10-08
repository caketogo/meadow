<?php 
	ob_start();
	session_start();
	include "includes/admin_common.php";
	check_authentication();
	$objTemplate = new siteadmin();
	
	$PerPage = 10;
	$Page    = $_REQUEST["Page"];
	$Display = $_REQUEST["Display"];
	
	
	if($_REQUEST['msgcode'] == 2) {
		$msg = 'SMS Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 1) {
		$msg = 'SMS Customer Added Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 3) {
		$msg = 'SMS Deleted Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	} elseif ($_REQUEST['msgcode'] == 15) {
		$msg = 'SMS Schedule Status Updated Successfully';
		$objSmarty->assign("msgcode", $_REQUEST['msgcode']);		
		$objSmarty->assign("update_msg", $msg);
	}
	
	//echo $_SERVER['REMOTE_ADDR'];
	//echo '<br>';
	//echo 'www.voodoosms.com/vapi/server/sendSMS?dest="somevalue"&orig="somevalue"&msg="somevalue for the Message"&uid="somevalue"&pass="somevalue"&validity="1"&format="php"&cc="countrycode"&tz="time zone"&sd="date and time in future"';

//echo 'www.voodoosms.com/vapi/server/sendSMS?dest=9994558325,9626542332&orig=HIP-Container&msg=This+is+a+test+SMS&uid=smsmanagement&pass=qtij32g&validity=1&format=php&cc=44&tz=+1&sd=2016-12-07T11:15';
	//echo 'www.voodoosms.com/vapi/server/sendSMS?dest=9994558325&orig=HIP-Container&msg=This+is+a+test+SMS&uid=smsmanagement&pass=qtij32g&validity=1&format=php&cc=+91&tz=+1&sd=2016-12-07T11:15';
	//echo '<br>';
	
	//echo 'http://www.voodoosms.com/vapi/server/sendSMS?dest=447548125172,447700777888&orig=VoodooSMS&msg=This+is+a+test+SMS&uid=smsmanagement&pass=qtij32g&validity=1&format=php&cc=44&tz=+1&sd=2016-08-03T16:35';

/*			$url = "www.voodoosms.com/vapi/server/sendSMS";
			$getString .="?dest=447548125172&";
			$getString .="orig=Container&";
			$getString .="msg=".urlencode("Testing The Container API Message ".date()."")."&";
			$getString .="uid=smsmanagement&";
			$getString .="pass=qtij32g&";
			$getString .="cc=44&";
			$getString .="validity=1";
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url.$getString);
			curl_setopt($ch,CURLOPT_HTTPGET,1); //default
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			$result = curl_exec($ch);
			echo($result);
			curl_close($ch);
*/	
		
		/*echo 'www.voodoosms.com/vapi/server/sendSMS?dest=919994558325&orig=VoodooSMS&msg=This+is+a+test+SMS&uid=smsmanagement&pass=qtij32g&validity=1&format=php&cc=91&tz=+
1&sd=2018-12-07T11:15';*/
		/*echo 'test';
		$url = "www.voodoosms.com/vapi/server/sendSMS";
		$getString .="?dest=9994558325&";
		 $getString .="orig=Container&";
		 $getString .="msg=".urlencode("Testing The Container API Message ")."&";
		 $getString .="uid=smsmanagement&";
		 $getString .="pass=qtij32g&";
		 $getString .="cc=+91&";
		 $getString .="validity=1";
		 $ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url.$getString);
		curl_setopt($ch,CURLOPT_HTTPGET,1); //default
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		$result = curl_exec($ch);
		echo($result);
		curl_close($ch)
		exit;*/
	//$ViewSMSList = '';
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}
	
	$ViewSMSCustomerTypeList = $objTemplate->getSMSCustomerTypeList($_REQUEST);
	
	$ViewSMSCustomerOverDueTypeList 	= $objTemplate->getSMSCustomerOverDueTypeList($_REQUEST);
	$getSMSCustomerAllTypeList			= $objTemplate->getSMSCustomerAllTypeList($_REQUEST);
	$ViewSMSCustomerSelectedTypeList	= $objTemplate->getSMSCustomerSelectedTypeList($_REQUEST);		


	// Get the SMS Schedule list stat
	$getSMSscheduleStatus_val	= $objTemplate->getSMSscheduleStatus($_REQUEST);			
	$objSmarty->assign("getSMSscheduleStatus_val",$getSMSscheduleStatus_val);	

	$objSmarty->assign("ViewSMSCustomerOverDueTypeList",$ViewSMSCustomerOverDueTypeList);
	$objSmarty->assign("getSMSCustomerAllTypeList",$getSMSCustomerAllTypeList);
	$objSmarty->assign("ViewSMSCustomerSelectedTypeList",$ViewSMSCustomerSelectedTypeList);			
	/*echo '<pre>';
	echo '1111111111';
	print_r($ViewSMSCustomerTypeList);
	exit;*/
	
	/*//$ViewSMSList = '';
	if(isset($_REQUEST['hdAction']) && $_REQUEST['hdAction'] == 2) {
		//$objTemplate->DeleteAdminUserDetails($_REQUEST['triggerid']);
	}*/
	
	$objSmarty->assign("ViewSMSCustomerTypeList",$ViewSMSCustomerTypeList);
	
	/*$objSmarty->assign("ViewSMSCustomerOverDueTypeList",$ViewSMSCustomerOverDueTypeList);
	$objSmarty->assign("getSMSCustomerAllTypeList",$getSMSCustomerAllTypeList);
	$objSmarty->assign("ViewSMSCustomerSelectedTypeList",$ViewSMSCustomerSelectedTypeList);*/

	
	//$objSmarty->assign("ViewSMSCustomerTypeList",$ViewSMSCustomerTypeList);
	
	$objSmarty->assign("current_user_id",$_SESSION["container_rental_admin_id"]);	
	$objSmarty->assign("current_customer_id",$_REQUEST["customer_id"]);	
	$objSmarty->assign('pgnametitle',	'View SMS Schedule');
	$objSmarty->assign('smslist0',	'1');
	$objSmarty->assign('smslist5',	'1');
	
	$objSmarty->display("smslist.tpl");
?>