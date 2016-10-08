<?php 
#==========================================================================================================#
#						Common Functions
#==========================================================================================================#
	function printArray($objArray) {
		global $global_config;
		if($global_config["debug_mode"] == "1"){
			if(is_array($objArray)) {
				print "<PRE>";
				print_r($objArray);
				print "</PRE>";
			}
			else
				print $objArray." <br> ";
		}	
	}
	
	function Redirect($strUrl) {
		header("location:".$strUrl);
		exit();
	}	
	
	function JSRedirect($strUrl) {
		print "<script>window.location.href='".$strUrl."';</script>";
	}	
		
	function prePopulate($objArray) {
		global $objSmarty;
		
		if(is_array($objArray)) {
			foreach($objArray as $key=>$value) {
				$$key = $value;
				if($value != '') {
					$objSmarty->assign($key,$value);
				}
			}
		}
	}
	
	function get_file_content($filename){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		return $contents;
	}	
	
	function check_authentication() {
		global $_SESSION;
		$_SESSION["container_rental_admin_id"] = trim($_SESSION["container_rental_admin_id"]);	
		if(!isset($_SESSION["container_rental_admin_id"]) || $_SESSION["container_rental_admin_id"] == '') {
			header("location:index");
		}
	}	
	
	function check_logintype() {
		global $_SESSION;
		if($_SESSION["ses_login_type"] == 'connect1' || $_SESSION["ses_login_type"] == 'both') {
			//header("location:dashboard.php");
		} else {
			header("location:logout.php");
		}
	}
	
    function check_authentication_superadmin() {
		global $_SESSION;
		$_SESSION["ses_role"] = trim($_SESSION["ses_role"]);		
		if($_SESSION["ses_role"] != 'superadmin') {
			header("location:dashboard.php");
		}
	}

   function check_authentication_admin() {
		global $_SESSION;
		$_SESSION["ses_role"] = trim($_SESSION["ses_role"]);		
		if($_SESSION["ses_role"] != 'admin') {
			header("location:dashboard.php");
		}
	}
	
   function check_authentication_both_admin() {
   	global $_SESSION;
	$_SESSION["ses_role"] = trim($_SESSION["ses_role"]);		
	
	if($_SESSION["ses_role"] != 'admin' && $_SESSION["ses_role"] != 'superadmin') {
		header("location:dashboard.php");
    }
   }


	
	function table_exists ($table, $db) { 
		$tables = mysql_list_tables ($db); 
		while (list ($temp) = mysql_fetch_array ($tables)) {
			if ($temp == $table) {
				return TRUE;
			}
		}
		return FALSE;
	}
	function setDates() {
		global $objSmarty;
		
		$DateNumbers[] = "";
		$DateNames[] = "--Date--";
		for($i=1;$i<=31;$i++) {
			$DateNumbers[]  = ($i > 9) ? $i : "0".$i;
			$DateNames[] = ($i > 9) ? $i : "0".$i;
		}
		$objSmarty->assign("DateNumbers",$DateNumbers);
		$objSmarty->assign("DateNames",$DateNames);
	}
	
	function setExpireMonths() {
		global $objSmarty;
		
		$MonthNumbers[] = "";
		$MonthNames[] = "--Month--";
		for($i=1;$i<=12;$i++) {
			$MonthNumbers[]  = ($i > 9) ? $i : "0".$i;
			$MonthNames[] = ($i > 9) ? $i : "0".$i; //date("M",strtotime($i."/01/".date("Y")));
		}
		$objSmarty->assign("MonthNumbers",$MonthNumbers);
		$objSmarty->assign("MonthNames",$MonthNames);
	}
	
	function setYears() {
		global $objSmarty;
		
		$Years[] = "";
		$YearsN[] = "--Year--";
		for($i=2000;$i<=date("Y");$i++) {
			$Years[]  = $i;
			$YearsN[] = $i;
		}
		$objSmarty->assign("Years",$Years);
		$objSmarty->assign("YearsN",$YearsN);
	}
	
	function setExpireYears() {
		global $objSmarty;
		
		$Years[] = "";
		$YearsN[] = "--Year--";
		for($i=date("Y");$i<date("Y")+20;$i++) {
			$Years[]  = $i;
			$YearsN[] = $i;
		}
		$objSmarty->assign("Years",$Years);
		$objSmarty->assign("YearsN",$YearsN);
	}
	/**
	 *	Funtion for Ecrypting given string
	 *	@param string $txt - input string
	 *  @param sting $key - keycode 
	 *  @return string		 
	 */
	function Encrypt($string, $key='')	{
		global $global_config;
		
		if($key == '')
			$key = $global_config["en_decrypt_keys"];
		$result = '';
		for($i=1; $i<=strlen($string); $i++){
			$char = substr($string, $i-1, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	
	/**
	 *	Funtion for Decrypting given string
	 *	@param string $txt - Encrypted string
	 *  @param sting $key - keycode 
	 *  @return string		 
	 */
	function Decrypt($string, $key=''){
		global $global_config;
		
		if($key == '')
			$key = $global_config["en_decrypt_keys"];
		$result = '';
		for($i=1; $i<=strlen($string); $i++){
			$char = substr($string, $i-1, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	
function getAge($dob, $tdate){
        $age = 0;
        while( $tdate > $dob = strtotime('+1 year', $dob)){
         ++$age;
        }
        return $age;
}
	
	
function formatinr($input){
            //CUSTOM FUNCTION TO GENERATE ##,##,###.##
            $dec = "";
            $pos = strpos($input, ".");
            if ($pos === false){
                //no decimals   
            } else {
                //decimals
                $dec = substr(round(substr($input,$pos),2),1);
                $input = substr($input,0,$pos);
            }
            $num = substr($input,-3); //get the last 3 digits
            $input = substr($input,0, -3); //omit the last 3 digits already stored in $num
            while(strlen($input) > 0) //loop the process - further get digits 2 by 2
            {
                $num = substr($input,-2).",".$num;
                $input = substr($input,0,-2);
            }
            return $num . $dec;
        }	

 function formatcurrency($floatcurr, $curr = "THB"){
        $currencies['ARS'] = array(2,',','.');          //  Argentine Peso
        $currencies['AMD'] = array(2,'.',',');          //  Armenian Dram
        $currencies['AWG'] = array(2,'.',',');          //  Aruban Guilder
        $currencies['AUD'] = array(2,'.',' ');          //  Australian Dollar
        $currencies['BSD'] = array(2,'.',',');          //  Bahamian Dollar
        $currencies['BHD'] = array(3,'.',',');          //  Bahraini Dinar
        $currencies['BDT'] = array(2,'.',',');          //  Bangladesh, Taka
        $currencies['BZD'] = array(2,'.',',');          //  Belize Dollar
        $currencies['BMD'] = array(2,'.',',');          //  Bermudian Dollar
        $currencies['BOB'] = array(2,'.',',');          //  Bolivia, Boliviano
        $currencies['BAM'] = array(2,'.',',');          //  Bosnia and Herzegovina, Convertible Marks
        $currencies['BWP'] = array(2,'.',',');          //  Botswana, Pula
        $currencies['BRL'] = array(2,',','.');          //  Brazilian Real
        $currencies['BND'] = array(2,'.',',');          //  Brunei Dollar
        $currencies['CAD'] = array(2,'.',',');          //  Canadian Dollar
        $currencies['KYD'] = array(2,'.',',');          //  Cayman Islands Dollar
        $currencies['CLP'] = array(0,'','.');           //  Chilean Peso
        $currencies['CNY'] = array(2,'.',',');          //  China Yuan Renminbi
        $currencies['COP'] = array(2,',','.');          //  Colombian Peso
        $currencies['CRC'] = array(2,',','.');          //  Costa Rican Colon
        $currencies['HRK'] = array(2,',','.');          //  Croatian Kuna
        $currencies['CUC'] = array(2,'.',',');          //  Cuban Convertible Peso
        $currencies['CUP'] = array(2,'.',',');          //  Cuban Peso
        $currencies['CYP'] = array(2,'.',',');          //  Cyprus Pound
        $currencies['CZK'] = array(2,'.',',');          //  Czech Koruna
        $currencies['DKK'] = array(2,',','.');          //  Danish Krone
        $currencies['DOP'] = array(2,'.',',');          //  Dominican Peso
        $currencies['XCD'] = array(2,'.',',');          //  East Caribbean Dollar
        $currencies['EGP'] = array(2,'.',',');          //  Egyptian Pound
        $currencies['SVC'] = array(2,'.',',');          //  El Salvador Colon
        $currencies['ATS'] = array(2,',','.');          //  Euro
        $currencies['BEF'] = array(2,',','.');          //  Euro
        $currencies['DEM'] = array(2,',','.');          //  Euro
        $currencies['EEK'] = array(2,',','.');          //  Euro
        $currencies['ESP'] = array(2,',','.');          //  Euro
        $currencies['EUR'] = array(2,',','.');          //  Euro
        $currencies['FIM'] = array(2,',','.');          //  Euro
        $currencies['FRF'] = array(2,',','.');          //  Euro
        $currencies['GRD'] = array(2,',','.');          //  Euro
        $currencies['IEP'] = array(2,',','.');          //  Euro
        $currencies['ITL'] = array(2,',','.');          //  Euro
        $currencies['LUF'] = array(2,',','.');          //  Euro
        $currencies['NLG'] = array(2,',','.');          //  Euro
        $currencies['PTE'] = array(2,',','.');          //  Euro
        $currencies['GHC'] = array(2,'.',',');          //  Ghana, Cedi
        $currencies['GIP'] = array(2,'.',',');          //  Gibraltar Pound
        $currencies['GTQ'] = array(2,'.',',');          //  Guatemala, Quetzal
        $currencies['HNL'] = array(2,'.',',');          //  Honduras, Lempira
        $currencies['HKD'] = array(2,'.',',');          //  Hong Kong Dollar
        $currencies['HUF'] = array(0,'','.');           //  Hungary, Forint
        $currencies['ISK'] = array(0,'','.');           //  Iceland Krona
        $currencies['INR'] = array(2,'.',',');          //  Indian Rupee
        $currencies['IDR'] = array(2,',','.');          //  Indonesia, Rupiah
        $currencies['IRR'] = array(2,'.',',');          //  Iranian Rial
        $currencies['JMD'] = array(2,'.',',');          //  Jamaican Dollar
        $currencies['JPY'] = array(0,'',',');           //  Japan, Yen
        $currencies['JOD'] = array(3,'.',',');          //  Jordanian Dinar
        $currencies['KES'] = array(2,'.',',');          //  Kenyan Shilling
        $currencies['KWD'] = array(3,'.',',');          //  Kuwaiti Dinar
        $currencies['LVL'] = array(2,'.',',');          //  Latvian Lats
        $currencies['LBP'] = array(0,'',' ');           //  Lebanese Pound
        $currencies['LTL'] = array(2,',',' ');          //  Lithuanian Litas
        $currencies['MKD'] = array(2,'.',',');          //  Macedonia, Denar
        $currencies['MYR'] = array(2,'.',',');          //  Malaysian Ringgit
        $currencies['MTL'] = array(2,'.',',');          //  Maltese Lira
        $currencies['MUR'] = array(0,'',',');           //  Mauritius Rupee
        $currencies['MXN'] = array(2,'.',',');          //  Mexican Peso
        $currencies['MZM'] = array(2,',','.');          //  Mozambique Metical
        $currencies['NPR'] = array(2,'.',',');          //  Nepalese Rupee
        $currencies['ANG'] = array(2,'.',',');          //  Netherlands Antillian Guilder
        $currencies['ILS'] = array(2,'.',',');          //  New Israeli Shekel
        $currencies['TRY'] = array(2,'.',',');          //  New Turkish Lira
        $currencies['NZD'] = array(2,'.',',');          //  New Zealand Dollar
        $currencies['NOK'] = array(2,',','.');          //  Norwegian Krone
        $currencies['PKR'] = array(2,'.',',');          //  Pakistan Rupee
        $currencies['PEN'] = array(2,'.',',');          //  Peru, Nuevo Sol
        $currencies['UYU'] = array(2,',','.');          //  Peso Uruguayo
        $currencies['PHP'] = array(2,'.',',');          //  Philippine Peso
        $currencies['PLN'] = array(2,'.',' ');          //  Poland, Zloty
        $currencies['GBP'] = array(2,'.',',');          //  Pound Sterling
        $currencies['OMR'] = array(3,'.',',');          //  Rial Omani
        $currencies['RON'] = array(2,',','.');          //  Romania, New Leu
        $currencies['ROL'] = array(2,',','.');          //  Romania, Old Leu
        $currencies['RUB'] = array(2,',','.');          //  Russian Ruble
        $currencies['SAR'] = array(2,'.',',');          //  Saudi Riyal
        $currencies['SGD'] = array(2,'.',',');          //  Singapore Dollar
        $currencies['SKK'] = array(2,',',' ');          //  Slovak Koruna
        $currencies['SIT'] = array(2,',','.');          //  Slovenia, Tolar
        $currencies['ZAR'] = array(2,'.',' ');          //  South Africa, Rand
        $currencies['KRW'] = array(0,'',',');           //  South Korea, Won
        $currencies['SZL'] = array(2,'.',', ');         //  Swaziland, Lilangeni
        $currencies['SEK'] = array(2,',','.');          //  Swedish Krona
        $currencies['CHF'] = array(2,'.','\'');         //  Swiss Franc 
        $currencies['TZS'] = array(2,'.',',');          //  Tanzanian Shilling
        $currencies['THB'] = array(0,'',',');          //  Thailand, Baht
        $currencies['TOP'] = array(2,'.',',');          //  Tonga, Paanga
        $currencies['AED'] = array(2,'.',',');          //  UAE Dirham
        $currencies['UAH'] = array(2,',',' ');          //  Ukraine, Hryvnia
        $currencies['USD'] = array(2,'.',',');          //  US Dollar
        $currencies['VUV'] = array(0,'',',');           //  Vanuatu, Vatu
        $currencies['VEF'] = array(2,',','.');          //  Venezuela Bolivares Fuertes
        $currencies['VEB'] = array(2,',','.');          //  Venezuela, Bolivar
        $currencies['VND'] = array(0,'','.');           //  Viet Nam, Dong
        $currencies['ZWD'] = array(2,'.',' ');          //  Zimbabwe Dollar

        if ($curr == "INR"){
            return formatinr($floatcurr);
        } else {
            return number_format($floatcurr,$currencies[$curr][0],$currencies[$curr][1],$currencies[$curr][2]);
        }
    }

function formatdecimalcurrency($floatcurr, $curr = "THB"){
        $currencies['ARS'] = array(2,',','.');          //  Argentine Peso
        $currencies['AMD'] = array(2,'.',',');          //  Armenian Dram
        $currencies['AWG'] = array(2,'.',',');          //  Aruban Guilder
        $currencies['AUD'] = array(2,'.',' ');          //  Australian Dollar
        $currencies['BSD'] = array(2,'.',',');          //  Bahamian Dollar
        $currencies['BHD'] = array(3,'.',',');          //  Bahraini Dinar
        $currencies['BDT'] = array(2,'.',',');          //  Bangladesh, Taka
        $currencies['BZD'] = array(2,'.',',');          //  Belize Dollar
        $currencies['BMD'] = array(2,'.',',');          //  Bermudian Dollar
        $currencies['BOB'] = array(2,'.',',');          //  Bolivia, Boliviano
        $currencies['BAM'] = array(2,'.',',');          //  Bosnia and Herzegovina, Convertible Marks
        $currencies['BWP'] = array(2,'.',',');          //  Botswana, Pula
        $currencies['BRL'] = array(2,',','.');          //  Brazilian Real
        $currencies['BND'] = array(2,'.',',');          //  Brunei Dollar
        $currencies['CAD'] = array(2,'.',',');          //  Canadian Dollar
        $currencies['KYD'] = array(2,'.',',');          //  Cayman Islands Dollar
        $currencies['CLP'] = array(0,'','.');           //  Chilean Peso
        $currencies['CNY'] = array(2,'.',',');          //  China Yuan Renminbi
        $currencies['COP'] = array(2,',','.');          //  Colombian Peso
        $currencies['CRC'] = array(2,',','.');          //  Costa Rican Colon
        $currencies['HRK'] = array(2,',','.');          //  Croatian Kuna
        $currencies['CUC'] = array(2,'.',',');          //  Cuban Convertible Peso
        $currencies['CUP'] = array(2,'.',',');          //  Cuban Peso
        $currencies['CYP'] = array(2,'.',',');          //  Cyprus Pound
        $currencies['CZK'] = array(2,'.',',');          //  Czech Koruna
        $currencies['DKK'] = array(2,',','.');          //  Danish Krone
        $currencies['DOP'] = array(2,'.',',');          //  Dominican Peso
        $currencies['XCD'] = array(2,'.',',');          //  East Caribbean Dollar
        $currencies['EGP'] = array(2,'.',',');          //  Egyptian Pound
        $currencies['SVC'] = array(2,'.',',');          //  El Salvador Colon
        $currencies['ATS'] = array(2,',','.');          //  Euro
        $currencies['BEF'] = array(2,',','.');          //  Euro
        $currencies['DEM'] = array(2,',','.');          //  Euro
        $currencies['EEK'] = array(2,',','.');          //  Euro
        $currencies['ESP'] = array(2,',','.');          //  Euro
        $currencies['EUR'] = array(2,',','.');          //  Euro
        $currencies['FIM'] = array(2,',','.');          //  Euro
        $currencies['FRF'] = array(2,',','.');          //  Euro
        $currencies['GRD'] = array(2,',','.');          //  Euro
        $currencies['IEP'] = array(2,',','.');          //  Euro
        $currencies['ITL'] = array(2,',','.');          //  Euro
        $currencies['LUF'] = array(2,',','.');          //  Euro
        $currencies['NLG'] = array(2,',','.');          //  Euro
        $currencies['PTE'] = array(2,',','.');          //  Euro
        $currencies['GHC'] = array(2,'.',',');          //  Ghana, Cedi
        $currencies['GIP'] = array(2,'.',',');          //  Gibraltar Pound
        $currencies['GTQ'] = array(2,'.',',');          //  Guatemala, Quetzal
        $currencies['HNL'] = array(2,'.',',');          //  Honduras, Lempira
        $currencies['HKD'] = array(2,'.',',');          //  Hong Kong Dollar
        $currencies['HUF'] = array(0,'','.');           //  Hungary, Forint
        $currencies['ISK'] = array(0,'','.');           //  Iceland Krona
        $currencies['INR'] = array(2,'.',',');          //  Indian Rupee
        $currencies['IDR'] = array(2,',','.');          //  Indonesia, Rupiah
        $currencies['IRR'] = array(2,'.',',');          //  Iranian Rial
        $currencies['JMD'] = array(2,'.',',');          //  Jamaican Dollar
        $currencies['JPY'] = array(0,'',',');           //  Japan, Yen
        $currencies['JOD'] = array(3,'.',',');          //  Jordanian Dinar
        $currencies['KES'] = array(2,'.',',');          //  Kenyan Shilling
        $currencies['KWD'] = array(3,'.',',');          //  Kuwaiti Dinar
        $currencies['LVL'] = array(2,'.',',');          //  Latvian Lats
        $currencies['LBP'] = array(0,'',' ');           //  Lebanese Pound
        $currencies['LTL'] = array(2,',',' ');          //  Lithuanian Litas
        $currencies['MKD'] = array(2,'.',',');          //  Macedonia, Denar
        $currencies['MYR'] = array(2,'.',',');          //  Malaysian Ringgit
        $currencies['MTL'] = array(2,'.',',');          //  Maltese Lira
        $currencies['MUR'] = array(0,'',',');           //  Mauritius Rupee
        $currencies['MXN'] = array(2,'.',',');          //  Mexican Peso
        $currencies['MZM'] = array(2,',','.');          //  Mozambique Metical
        $currencies['NPR'] = array(2,'.',',');          //  Nepalese Rupee
        $currencies['ANG'] = array(2,'.',',');          //  Netherlands Antillian Guilder
        $currencies['ILS'] = array(2,'.',',');          //  New Israeli Shekel
        $currencies['TRY'] = array(2,'.',',');          //  New Turkish Lira
        $currencies['NZD'] = array(2,'.',',');          //  New Zealand Dollar
        $currencies['NOK'] = array(2,',','.');          //  Norwegian Krone
        $currencies['PKR'] = array(2,'.',',');          //  Pakistan Rupee
        $currencies['PEN'] = array(2,'.',',');          //  Peru, Nuevo Sol
        $currencies['UYU'] = array(2,',','.');          //  Peso Uruguayo
        $currencies['PHP'] = array(2,'.',',');          //  Philippine Peso
        $currencies['PLN'] = array(2,'.',' ');          //  Poland, Zloty
        $currencies['GBP'] = array(2,'.',',');          //  Pound Sterling
        $currencies['OMR'] = array(3,'.',',');          //  Rial Omani
        $currencies['RON'] = array(2,',','.');          //  Romania, New Leu
        $currencies['ROL'] = array(2,',','.');          //  Romania, Old Leu
        $currencies['RUB'] = array(2,',','.');          //  Russian Ruble
        $currencies['SAR'] = array(2,'.',',');          //  Saudi Riyal
        $currencies['SGD'] = array(2,'.',',');          //  Singapore Dollar
        $currencies['SKK'] = array(2,',',' ');          //  Slovak Koruna
        $currencies['SIT'] = array(2,',','.');          //  Slovenia, Tolar
        $currencies['ZAR'] = array(2,'.',' ');          //  South Africa, Rand
        $currencies['KRW'] = array(0,'',',');           //  South Korea, Won
        $currencies['SZL'] = array(2,'.',', ');         //  Swaziland, Lilangeni
        $currencies['SEK'] = array(2,',','.');          //  Swedish Krona
        $currencies['CHF'] = array(2,'.','\'');         //  Swiss Franc 
        $currencies['TZS'] = array(2,'.',',');          //  Tanzanian Shilling
        $currencies['THB'] = array(2,'.',',');          //  Thailand, Baht
        $currencies['TOP'] = array(2,'.',',');          //  Tonga, Paanga
        $currencies['AED'] = array(2,'.',',');          //  UAE Dirham
        $currencies['UAH'] = array(2,',',' ');          //  Ukraine, Hryvnia
        $currencies['USD'] = array(2,'.',',');          //  US Dollar
        $currencies['VUV'] = array(0,'',',');           //  Vanuatu, Vatu
        $currencies['VEF'] = array(2,',','.');          //  Venezuela Bolivares Fuertes
        $currencies['VEB'] = array(2,',','.');          //  Venezuela, Bolivar
        $currencies['VND'] = array(0,'','.');           //  Viet Nam, Dong
        $currencies['ZWD'] = array(2,'.',' ');          //  Zimbabwe Dollar

        if ($curr == "INR"){
            return formatinr($floatcurr);
        } else {
            return number_format($floatcurr,$currencies[$curr][0],$currencies[$curr][1],$currencies[$curr][2]);
        }
    }

	
	/*
		About validateUrlSyntax():
			This function will verify if a http URL is formatted properly, returning
			either with true or false.
			
			I used rfc #2396 URI: Generic Syntax as my guide when creating the
			regular expression. For all the details see the comments below.
		
		
		Usage:
			validateUrlSyntax( url_to_check[, options])
		
			url_to_check - string - The url to check
			
			options - string - A optional string of options to set which parts of
					the url are required, optional, or not allowed. Each option
					must be followed by a "+" for required, "?" for optional, or 
					"-" for not allowed.
		
					s - Scheme. Allows "+?-", defaults to "s?"
						H - http:// Allows "+?-", defaults to "H?"
						S - https:// (SSL). Allows "+?-", defaults to "S?"
						E - mailto: (email). Allows "+?-", defaults to "E-"
						F - ftp:// Allows "+?-", defaults to "F-"
							Dependant on scheme being enabled
					u - User section. Allows "+?-", defaults to "u?"
						P - Password in user section. Allows "+?-", defaults to "P?"
							Dependant on user section being enabled
					a - Address (ip or domain). Allows "+?-", defaults to "a+"
						I - Ip address. Allows "+?-", defaults to "I?"
							If I+, then domains are disabled
							If I-, then domains are required
							Dependant on address being enabled
					p - Port number. Allows "+?-", defaults to "p?"
					f - File path. Allows "+?-", defaults to "f?"
					q - Query section. Allows "+?-", defaults to "q?"
					r - Fragment (anchor). Allows "+?-", defaults to "r?"
		
			Paste the funtion code, or include_once() this template at the top of the page
			you wish to use this function.
		
		
		Examples:
			validateUrlSyntax('http://george@www.cnn.com/#top')
		
			validateUrlSyntax('https://games.yahoo.com:8080/board/chess.htm?move=true')
		
			validateUrlSyntax('http://www.hotmail.com/', 's+u-I-p-q-r-')
		
			validateUrlSyntax('/directory/file.php#top', 's-u-a-p-f+')
		
		
			if (validateUrlSyntax('http://www.canowhoopass.com/', 'u-'))
			{
				echo 'URL SYNTAX IS VERIFIED';
			} else {
				echo 'URL SYNTAX IS ILLEGAL';
			}
			
		Intentional Limitations:
			-Does not verify url actually exists. Only validates the syntax
			-Strictly follows the RFC standards. Some urls exist in the wild which will
			 not validate. Including ones with square brackets in the query section '[]'
		
		Known Problems:
   			 -None at this time
		*/
		
		// BEGINNING OF validateUrlSyntax() function
		function validateUrlSyntax( $urladdr, $options="" ){
		
			// Force Options parameter to be lower case
			// DISABLED PERMAMENTLY - OK to remove from code
			//    $options = strtolower($options);
		
			// Check Options Parameter
			if (!ereg( '^([sHSEFuPaIpfqr][+?-])*$', $options ))
			{
				trigger_error("Options attribute malformed", E_USER_ERROR);
			}
		
			// Set Options Array, set defaults if options are not specified
			// Scheme
			if (strpos( $options, 's') === false) $aOptions['s'] = '?';
			else $aOptions['s'] = substr( $options, strpos( $options, 's') + 1, 1);
			// http://
			if (strpos( $options, 'H') === false) $aOptions['H'] = '?';
			else $aOptions['H'] = substr( $options, strpos( $options, 'H') + 1, 1);
			// https:// (SSL)
			if (strpos( $options, 'S') === false) $aOptions['S'] = '?';
			else $aOptions['S'] = substr( $options, strpos( $options, 'S') + 1, 1);
			// mailto: (email)
			if (strpos( $options, 'E') === false) $aOptions['E'] = '-';
			else $aOptions['E'] = substr( $options, strpos( $options, 'E') + 1, 1);
			// ftp://
			if (strpos( $options, 'F') === false) $aOptions['F'] = '-';
			else $aOptions['F'] = substr( $options, strpos( $options, 'F') + 1, 1);
			// User section
			if (strpos( $options, 'u') === false) $aOptions['u'] = '?';
			else $aOptions['u'] = substr( $options, strpos( $options, 'u') + 1, 1);
			// Password in user section
			if (strpos( $options, 'P') === false) $aOptions['P'] = '?';
			else $aOptions['P'] = substr( $options, strpos( $options, 'P') + 1, 1);
			// Address Section
			if (strpos( $options, 'a') === false) $aOptions['a'] = '+';
			else $aOptions['a'] = substr( $options, strpos( $options, 'a') + 1, 1);
			// IP Address in address section
			if (strpos( $options, 'I') === false) $aOptions['I'] = '?';
			else $aOptions['I'] = substr( $options, strpos( $options, 'I') + 1, 1);
			// Port number
			if (strpos( $options, 'p') === false) $aOptions['p'] = '?';
			else $aOptions['p'] = substr( $options, strpos( $options, 'p') + 1, 1);
			// File Path
			if (strpos( $options, 'f') === false) $aOptions['f'] = '?';
			else $aOptions['f'] = substr( $options, strpos( $options, 'f') + 1, 1);
			// Query Section
			if (strpos( $options, 'q') === false) $aOptions['q'] = '?';
			else $aOptions['q'] = substr( $options, strpos( $options, 'q') + 1, 1);
			// Fragment (Anchor)
			if (strpos( $options, 'r') === false) $aOptions['r'] = '?';
			else $aOptions['r'] = substr( $options, strpos( $options, 'r') + 1, 1);
		
		
			// Loop through options array, to search for and replace "-" to "{0}" and "+" to ""
			foreach($aOptions as $key => $value)
			{
				if ($value == '-')
				{
					$aOptions[$key] = '{0}';
				}
				if ($value == '+')
				{
					$aOptions[$key] = '';
				}
			}
			
			// DEBUGGING - Unescape following line to display to screen current option values
			// echo '<pre>'; print_r($aOptions); echo '</pre>';
		
		
			// Preset Allowed Characters
			$alphanum    = '[a-zA-Z0-9]';  // Alpha Numeric
			$unreserved  = '[a-zA-Z0-9_.!~*' . '\'' . '()-]';
			$escaped     = '(%[0-9a-fA-F]{2})'; // Escape sequence - In Hex - %6d would be a 'm'
			$reserved    = '[;/?:@&=+$,]'; // Special characters in the URI
			
			// Beginning Regular Expression
							   // Scheme - Allows for 'http://', 'https://', 'mailto:', or 'ftp://'
			$scheme            = '(';
			if     ($aOptions['H'] === '') { $scheme .= 'http://'; }
			elseif ($aOptions['S'] === '') { $scheme .= 'https://'; }
			elseif ($aOptions['E'] === '') { $scheme .= 'mailto:'; }
			elseif ($aOptions['F'] === '') { $scheme .= 'ftp://'; }
			else
			{
				if ($aOptions['H'] === '?') { $scheme .= '|(http://)'; }
				if ($aOptions['S'] === '?') { $scheme .= '|(https://)'; }
				if ($aOptions['E'] === '?') { $scheme .= '|(mailto:)'; }
				if ($aOptions['F'] === '?') { $scheme .= '|(ftp://)'; }
				$scheme = str_replace('(|', '(', $scheme); // fix first pipe
			}
			$scheme            .= ')' . $aOptions['s'];
			// End setting scheme
			
							   // User Info - Allows for 'username@' or 'username:password@'. Note: contrary to rfc, I removed ':' from username section, allowing it only in password.
							   //   /---------------- Username -----------------------\  /-------------------------------- Password ------------------------------\
			$userinfo          = '((' . $unreserved . '|' . $escaped . '|[;&=+$,]' . ')+(:(' . $unreserved . '|' . $escaped . '|[;:&=+$,]' . ')+)' . $aOptions['P'] . '@)' . $aOptions['u'];
			
							   // IP ADDRESS - Allows 0.0.0.0 to 255.255.255.255
			$ipaddress         = '((((2(([0-4][0-9])|(5[0-5])))|([01]?[0-9]?[0-9]))\.){3}((2(([0-4][0-9])|(5[0-5])))|([01]?[0-9]?[0-9])))';
			
							   // Tertiary Domain(s) - Optional - Multi - Although some sites may use other characters, the RFC says tertiary domains have the same naming restrictions as second level domains
			$domain_tertiary   = '(' . $alphanum . '(([a-zA-Z0-9-]{0,62})' . $alphanum . ')?\.)*';
		
							   // Second Level Domain - Required - First and last characters must be Alpha-numeric. Hyphens are allowed inside.
			$domain_secondary  = '(' . $alphanum . '(([a-zA-Z0-9-]{0,62})' . $alphanum . ')?\.)';
			
			/* // This regex is disabled on purpose in favour of the more exact version below
							   // Top Level Domain - First character must be Alpha. Last character must be AlphaNumeric. Hyphens are allowed inside.
			$domain_toplevel   = '([a-zA-Z](([a-zA-Z0-9-]*)[a-zA-Z0-9])?)';
			*/
			
							   // Top Level Domain - Required - Domain List Current As Of December 2004. Use above escaped line to be forgiving of possible future TLD's
			$domain_toplevel   = '(aero|biz|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|post|pro|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|az|ax|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)';
			
		
							   // Address can be IP address or Domain
			if ($aOptions['I'] === '{0}') {       // IP Address Not Allowed
				$address       = '(' . $domain_tertiary . $domain_secondary . $domain_toplevel . ')';
			} elseif ($aOptions['I'] === '') {  // IP Address Required
				$address       = '(' . $ipaddress . ')';
			} else {                            // IP Address Optional
				$address       = '((' . $ipaddress . ')|(' . $domain_tertiary . $domain_secondary . $domain_toplevel . '))';
			}
			$address = $address . $aOptions['a'];
			
							   // Port Number - :80 or :8080 or :65534 Allows range of :0 to :65535
							   //    (0-59999)         |(60000-64999)   |(65000-65499)    |(65500-65529)  |(65530-65535)
			$port_number       = '(:(([0-5]?[0-9]{1,4})|(6[0-4][0-9]{3})|(65[0-4][0-9]{2})|(655[0-2][0-9])|(6553[0-5])))' . $aOptions['p'];
			
							   // Path - Can be as simple as '/' or have multiple folders and filenames
			$path              = '(/((;)?(' . $unreserved . '|' . $escaped . '|' . '[:@&=+$,]' . ')+(/)?)*)' . $aOptions['f'];
			
							   // Query Section - Accepts ?var1=value1&var2=value2 or ?2393,1221 and much more
			$querystring       = '(\?(' . $reserved . '|' . $unreserved . '|' . $escaped . ')*)' . $aOptions['q'];
			
							   // Fragment Section - Accepts anchors such as #top
			$fragment          = '(#(' . $reserved . '|' . $unreserved . '|' . $escaped . ')*)' . $aOptions['r'];
			
			
			// Building Regular Expression
			$regexp = '^' . $scheme . $userinfo . $address . $port_number . $path . $querystring . $fragment . '$';
			
			// DEBUGGING - Uncomment Line Below To Display The Regular Expression Built
			// echo '<pre>' . htmlentities(wordwrap($regexp,70,"\n",1)) . '</pre>';
		
			// Running the regular expression
			if (eregi( $regexp, $urladdr ))
			{
				return true; // The domain passed
			}
			else
			{
				return false; // The domain didn't pass the expression
			}
		
		} // END Function validateUrlSyntax()
		
	function isValidEmail($EmailAddress) 	{
		$valid=preg_match('#^([a-zA-ZàÀéÉîÏôÔùÛÇç0-9_\\-\\.]+)@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.)|(([a-zA-Z0-9\\-]+\\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\\]?)$#',$EmailAddress);
		return $valid;
	}
	
	function MakeStripSlashes($array,$replaceValue='',$replaceValueTo='') {
		if($array) {
			foreach($array as $key=>$value) {
				if(is_array($value))  {
					$value=MakeStripSlashes($value);
					if($replaceValue==''&&$replaceValueTo=='')
						$array_temp[$key]=str_replace("#AMP#","",$value);
					else
						$array_temp[$key]=str_replace($replaceValue,$replaceValueTo,$value);                      
				}
				else
					$array_temp[$key]=stripslashes(stripslashes($value));
			}    
		}   
		return $array_temp;   
	}
		
	function encrypt_string($string, $key=NULL) {
		$result = '';
		$key="$@%%@^&xfcbdfgfdsh)()(*)(&^&*%";
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
	}
	
	function decrypt_string ($string,  $key=NULL) {
		$key="$@%%@^&xfcbdfgfdsh)()(*)(&^&*%";
		$result = '';
		$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) {
			 $char = substr($string, $i, 1);
			 $keychar = substr($key, ($i % strlen($key))-1, 1);
			 $char = chr(ord($char)-ord($keychar));
			 $result.=$char;
		}
		return $result;
	}

	function xml2array($xml) {
		$xmlary = array();
		
		$reels = '/<(\w+)\s*([^\/>]*)\s*(?:\/>|>(.*)<\/\s*\\1\s*>)/s';
		$reattrs = '/(\w+)=(?:"|\')([^"\']*)(:?"|\')/';
		
		preg_match_all($reels, $xml, $elements);
		
		foreach ($elements[1] as $ie => $xx) {
			$xmlary[$ie]["name"] = $elements[1][$ie];
			
			if ($attributes = trim($elements[2][$ie])) {
				preg_match_all($reattrs, $attributes, $att);
				foreach ($att[1] as $ia => $xx)
				$xmlary[$ie]["attributes"][$att[1][$ia]] = $att[2][$ia];
			}
			
			$cdend = strpos($elements[3][$ie], "<");
			if ($cdend > 0) {
				$xmlary[$ie]["text"] = substr($elements[3][$ie], 0, $cdend - 1);
			}
			
			if (preg_match($reels, $elements[3][$ie]))
				$xmlary[$ie]["elements"] = xml2array($elements[3][$ie]);
				else if ($elements[3][$ie]) {
				$xmlary[$ie]["text"] = $elements[3][$ie];
			}
		}
		return $xmlary;
	}
?>