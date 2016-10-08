<?PHP
/****************************************************************************************************************
*	SCRIPT TYPE: Class  																						*											
*	SCRIPT NAME: Common																							*	
*	DESCRIPTION: General Class to access database informations													*
*	Author: Secure Next																							*											
*	WRITTEN ON: 02-Jul-2008																						*	
*	LAST MODIFIED ON:14-Jul-2008																				*	
*****************************************************************************************************************/
class common extends extendsClassDB {
		var $RecState;
		var $RecCountry;
		var $RecSetting;
		var $RecProvider;
		var $RecCount;
		var $strInsertedId;
		var $strUpdatedId;
		var $ErrorStatus;
		var $ErrorMsg;
		
		/**
		* @desc Constructor
		*/
	function common () {
		$this->RecState = 0;
		$this->RecCountry = 0;
		$this->RecSetting = 0;
		$this->RecProvider = 0;
		$this->RecCount = 0;
		$this->strInsertedId = 0;
		$this->strUpdatedId = "";
		$this->ErrorStatus=0;
		$this->ErrorMsg="";
		$this->RecId="";
		}
		/**
			 function To check whether a data exists in the specified table			
		   * @param string $strTable        - specifies table name
		   * @param string $strPrimaryField - Optional, contains the field name
		   * @param string $strPrimaryValue - Optional, contains the column name
		   * @param int $debugMode			- Optional 
											  1 for debuging ON, 0 for debuging OFF
											  debuging ON will print the condition built
											  $debugMode=1;
						
			Example: 
			$strTable         = "Admin"
			$strPrimaryField  = "First_Name"
			$strPrimaryValue  =  "John"
		    
			query ="select * from Admin Where First_Name = 'John'"
		*/
		
		function common_Check($strTable,$strPrimaryField,$strPrimaryValue,$debugMode=0) {
			global $global_config;
			
			$obj_Select = new extendsClassDB();
			if($strPrimaryField!="") {
				$QrySelect = "Select * from ".$strTable." where ".$strPrimaryField."= '".$strPrimaryValue."'";
				
				if( $debugMode != 0 && $global_config["debug_mode"] == "1"){
					echo $QrySelect;
				}
				$obj_Select->dbSetQuery($QrySelect,"select");
				$RecProvider = $obj_Select->dbSelectQuery();
				//$this->RecCount = $obj_Select->dbQueryNumRows;
				return($obj_Select->dbQueryNumRows);
			} else {
				return 0;
			}	
		}		
		
		/*
		   Fuction to Construct and Execute INSERT Query
				   
		   * @param string $strTable         specifies table name
		   * @param array  $strUpdateArray   Should be an array , contains ColumnName and ColumnValues
		   * @param string $strPrimaryField  Optional, contains the field name
		   * @param string $strPrimaryValue  Optional, contains the column name
		   * @param int $debugMode			 Optional 
											  1 for debuging ON, 0 for debuging OFF
											  debuging ON will print the condition built
											  $debugMode=1;
		   Example:-
		   $strInsertArray = array(
									array("Topic_Title", $txtTitle),
									array("Pre_Requisties", $txtPreReq),
									);
		   $strTable = "Topic"					 
		   Query : Insert into Topic (Topic_Title,Pre_Requisties) values ($txtTitle,$txtPreReq)
		
		*/
		function common_Insert($strTable,$strInsertArray,$strPrimaryField,$strPrimaryValue,$debugMode=0,$nocommit=0) { 
			global $global_config;

			if($this->common_Check($strTable,$strPrimaryField,$strPrimaryValue)==0) {
				$obj_Select = new extendsClassDB();
				
				for($i=0;$i<count($strInsertArray);$i++) {
					$tmpstrFieldNames = "`".$strInsertArray[$i][0]."`";  #By Ruby#
					$strFieldNames.= $tmpstrFieldNames;
					if($strInsertArray[$i][2] == "NOQUOT")
						$strValues.= addslashes($strInsertArray[$i][1]);
					else
						$strValues.= "'".addslashes($strInsertArray[$i][1])."'";
					if($i<count($strInsertArray)-1)	{	
						$strFieldNames.=", ";
						$strValues.=", ";
					}
				}
				//PrintArray($strFieldNames);exit;
				$QryInsert = "Insert into ".$strTable." (".$strFieldNames.") values (".$strValues.")";
				
				if($debugMode!=0 && $global_config["debug_mode"] == "1") {
					print $QryInsert."<br>";
				}
				
				// Added to Test the Insert without Committing the Query
				
				if($nocommit) {
					print $QryInsert;
					return true;
				}
				$obj_Select->dbSetQuery($QryInsert,"insert");  
				$obj_Select->dbExecuteQuery();
				
				$this->strInsertedId =  $obj_Select->dbLastInsertRow;
				return true;
			}	else	{
				$this->ErrorStatus=1;
				return false;
			}
		}

		function common_BulkInsert($strSQL,$debugMode=0) {
			global $global_config;
			
			if($strSQL != '') {
				$obj_Select = new extendsClassDB();
				if($debugMode!=0 && $global_config["debug_mode"] == "1"){
					print $strSQL."<br>";
				}
				$QryInsert = $strSQL;
				$obj_Select->dbSetQuery($QryInsert,"insert");  
				$obj_Select->dbExecuteQuery();
				
				$this->strInsertedId =  $obj_Select->dbLastInsertRow;
				return true;
			} else {
				$this->ErrorStatus=1;
				return false;
			}
		}
		/*
		   Function to Construct and Execute Update Query
		   
		   * @param string $strTable        - specifies table name
		   * @param array $strUpdateArray   - Should be an array , contains ColumnName and ColumnValues
		   * @param string $strPrimaryField - Optional, contains the field name
		   * @param string $strPrimaryValue - Optional, contains the column name
		   * @param int $debugMode			- Optional 
											  1 for debuging ON, 0 for debuging OFF
											  debuging ON will print the condition built
											  $debugMode=1;
		  		   
		   Argument 3 and 4 are used to To check whether a specific data exists in the table
		   
		   Example:-
		   $strInsertArray = array(
									array("Topic_Title", $txtTitle),
									array("Pre_Requisties", $txtPreReq),
									);
		   $strTable = "Topic"					 
		   Query : update Topic set Topic_Title,Pre_Requisties) values ($txtTitle,$txtPreReq)
		
		*/
		
		function common_Update ($strTable, $strUpdateArray, $strPrimaryField, $strPrimaryValue, $debugMode=0) { 
			global $global_config,$global_log;
			
			$obj_Select = new extendsClassDB();
			for ($i=0; $i < count ($strUpdateArray); $i++) {
				$strQuery.= $strUpdateArray[$i][0]."="."'".addslashes($strUpdateArray[$i][1])."'";
				if($i<count($strUpdateArray)-1) $strQuery.=", ";
			}
			$QryUpdate = "Update ".$strTable." set ".$strQuery." where ".$strPrimaryField ."= '".$strPrimaryValue."'";
			
			if($debugMode!=0 && $global_config["debug_mode"] == "1") {
				echo $QryUpdate."<BR>";
			}
			/*
			if($_SERVER['REMOTE_ADDR']=='172.31.8.204')
			{	
				echo $QryUpdate."<BR>";
			}
			*/
			$obj_Select->dbSetQuery($QryUpdate,"update");  
			$obj_Select->dbExecuteQuery();
			
			if($obj_Select->dbQueryNumRows==0) {
				$this->ErrorStatus=1;
				return false;
			}			
		}
				
		function common_Update_Set1($strTable,$strUpdateArray,$strWhereClause="",$debugMode=0,$operation = 0) {
			global $global_config,$global_log;
			//echo '14141515';
			for($i=0;$i<count($strUpdateArray);$i++) {
				if($operation == 1)
					$strQuery.= "`".$strUpdateArray[$i][0]."` = ".addslashes($strUpdateArray[$i][1]);
				else
					$strQuery.= "`".$strUpdateArray[$i][0]."` = '".addslashes($strUpdateArray[$i][1])."'";
				if($i<count($strUpdateArray)-1)		
					$strQuery.=", ";
			}

			$obj_Select = new extendsClassDB();
			if ($strWhereClause) $strWhereClause = ' where '.$strWhereClause;
			$QryUpdate = "Update ".$strTable." set ".$strQuery.$strWhereClause;
			if($debugMode!=0 && $global_config["debug_mode"] == "1"){
				$QryUpdate."<BR>";
			}	
			//echo '<pre>';print_r($QryUpdate);exit;
			$obj_Select->dbSetQuery($QryUpdate,"update");  
			$obj_Select->dbExecuteQuery();
			if($obj_Select->dbQueryNumRows==0){
				$this->ErrorStatus=1;
				return false;
			}			
		}
		
		// deleting a record with 2 conditions  an operator has to be passed for - AND / OR... This Functions MODIFIED by ////````				
		function common_Delete($strTableName, $strFieldName, $strValue , $debugMode=0)	{
			global $global_config;
			
			$obj_Select = new extendsClassDB();
			if($strFieldName!="" && $strValue!="" && $strTableName!="")
				$WhereClause = " Where $strFieldName = '$strValue'";
			else
				trigger_error("<br><b>".str_replace("src=","src=../",$this->getError(__CLASS__."->".__FUNCTION__."(TableName = $strTableName, FieldName = $strFieldName, FieldValue=$strValue) -- Invalid Parameters. "))."</b><br>",E_USER_ERROR);
			
			$QryDelete = "Delete from ".$strTableName.$WhereClause;
			
			if($debugMode!=0 && $global_config["debug_mode"] == "1"){
				print $QryDelete."<BR>";
			}
			
			$obj_Select->dbSetQuery($QryDelete,"delete");
			$obj_Select->dbExecuteQuery();
			
			if($obj_Select->dbQueryNumRows==0){
				$this->ErrorStatus=1;
				return false;
			}
			return true;
		}
		
		// DELETING RECORDS BY SQL
		function DirectSQLDelete($QryDelete, $debugMode=0) {
			global $global_config;
			
			if($QryDelete != '') {
				$obj_Select = new extendsClassDB();
				if($debugMode!=0 && $global_config["debug_mode"] == "1") {
					print $QryDelete;
				}
				
				$obj_Select->dbSetQuery($QryDelete,"delete");
				$obj_Select->dbExecuteQuery();
				
				if($obj_Select->dbQueryNumRows==0) {
					$this->ErrorStatus=1;
					return false;
				}
				return true;
			} else {
				/* If this is not query, please check the query */
				
			}
		}
		
		function Begin($debugMode = 0) {
			global $global_config;
			
			$strSQL = "BEGIN";
			if($debugMode==1 && $global_config["debug_mode"] == "1") {
				print $strSQL."<br>";
			}
			$obj_Select = new extendsClassDB();
			$obj_Select->dbSetQuery($strSQL,"select");
			$obj_Select->dbSelectQuery();
			if($obj_Select->dbQueryNumRows==0){
				$this->ErrorStatus=1;
				return false;
			}
		}
		
		function Commit($debugMode = 0) {
			global $global_config;
			
			$strSQL = "COMMIT";
			if($debugMode==1 && $global_config["debug_mode"] == "1") {
				print $strSQL."<br>";
			}
			$obj_Select = new extendsClassDB();
			$obj_Select->dbSetQuery($strSQL,"select");
			$obj_Select->dbSelectQuery();
			if($obj_Select->dbQueryNumRows==0){
				$this->ErrorStatus=1;
				return false;
			}
		}
		
		function SavePoint($strSavePoint,$debugMode = 0) {
			global $global_config;
			
			$strSQL = "SAVEPOINT ".$strSavePoint;
			if($debugMode==1 && $global_config["debug_mode"] == "1") {
				print $strSQL."<br>";
			}
			$obj_Select = new extendsClassDB();
			$obj_Select->dbSetQuery($strSQL,"select");
			$obj_Select->dbSelectQuery();
			if($obj_Select->dbQueryNumRows==0){
				$this->ErrorStatus=1;
				return false;
			}
		}
		
		function RollBack($strSavePoint = "",$debugMode = 0) {
			global $global_config;
			
			if($strSavePoint!="")
				$strSQL = "ROLLBACK";
			else
				$strSQL = "ROLLBACK TO SAVEPOINT ".$strSavePoint;
				
			if($debugMode==1 && $global_config["debug_mode"] == "1") {
				print $strSQL."<br>";
			}
			$obj_Select = new extendsClassDB();
			$obj_Select->dbSetQuery($strSQL,"select");
			$obj_Select->dbSelectQuery();
			if($obj_Select->dbQueryNumRows==0){
				$this->ErrorStatus=1;
				return false;
			}
		}

		function SelectQry ($objTables, $objFields='', $isDistinct=FALSE, $strWhereClause='', $strOrderBy='', $strLowLimit='', $strUpLimit='', $debugMode='', $strGroupBy='') {
			global $global_config;
			
			$obj_Select = new extendsClassDB();
			
			if(is_array($objTables)) {
				/*
				*  This is array of tables, and Build the Query for MySQl & MSSQL as Seperate way.
				*/

				// For MySQL
				$strFields = '';
				if($objFields == '') $strFields = '*';
				else {
					for ($i = 0; $i < count ($objFields); $i++) {
						if($objFields[$i]!="") {
							$strFields .= $objFields[$i];
							if($i != count ($objFields)-1) $strFields.= ', ';
							}
						}
					}
				if ($strFields == '') $strFields = '*';
				if ($isDistinct) $strFields = ' DISTINCT '.$strFields;
					
				$strSQL = "Select $strFields FROM ";
				for($i=0;$i<count($objTables);$i++)	{
					$strSQL.= $objTables[$i];
					
					if($i!=count($objTables)-1)
						$strSQL.= ", ";
				}
				if($strLowLimit!="" || $strUpLimit!="") {
					$LimitClause =  " Limit $strLowLimit, $strUpLimit";
				}
				if ($strWhereClause) {
					if (is_array ($strWhereClause)) $strWhereClause = implode (' AND ', $strWhereClause);
					$strSQL = $strSQL.' WHERE '.$strWhereClause;
					}
				if ($strGroupBy) $strSQL = $strSQL.' GROUP BY '.$strGroupBy;
				if($strOrderBy!="")
					$strSQL = $strSQL." ".$strOrderBy;
					
				if($LimitClause!="")
					$strSQL = $strSQL.$LimitClause;
					
				//print "<br>".$strSQL."<br>";	
				if($debugMode==1 && $global_config["debug_mode"] == "1") {
					//print $strSQL."<br>"; //print the Error
				}
				//print "<br>".$strSQL."<br>";
				$obj_Select->dbSetQuery($strSQL,"select");
				$this->RecSetting = $obj_Select->dbSelectQuery();
				$this->RecCount = $obj_Select->dbQueryNumRows;
				if($obj_Select->dbQueryNumRows==0){
					$this->ErrorStatus=1;
					return false;
				}
				
				return MakeStripSlashes($this->RecSetting);
			} else {
				/* If this is not an array, it has only one table so use table_select for this case */
			}
		}
		
		function SelectQryOrder ($objTables, $objFields='', $isDistinct=FALSE, $strWhereClause='', $strOrderField='',$strOrderBy='', $strLowLimit='', $strUpLimit='', $debugMode='', $strGroupBy='') {
			global $global_config;
			if($this->VFPMode) { $obj_Select = new extendsClassOdbtpDB(); }
			else { $obj_Select = new extendsClassDB(); }
			
			if(is_array($objTables)) {
				/*
				*  This is array of tables, and Build the Query for MySQl & MSSQL as Seperate way.
				*/

				// For MySQL
				$strFields = '';
				if($objFields == '') $strFields = '*';
				else {
					for ($i = 0; $i < count ($objFields); $i++) {
						if($objFields[$i]!="") {
							$strFields .= $objFields[$i];
							if($i != count ($objFields)-1) $strFields.= ', ';
							}
						}
					}
				if ($strFields == '') $strFields = '*';
				if ($isDistinct) $strFields = ' DISTINCT '.$strFields;
					
				$strSQL = "Select $strFields FROM ";
				for($i=0;$i<count($objTables);$i++)
				{
					if($this->VFPMode)
					$strSQL.= $objTables[$i];
					else
					$strSQL.= $objTables[$i];
					
					if($i!=count($objTables)-1)
						$strSQL.= ", ";
				}
				if($strLowLimit!="" || $strUpLimit!="") {
					$LimitClause =  " Limit $strLowLimit, $strUpLimit";
				}
				if ($strWhereClause) {
					if (is_array ($strWhereClause)) $strWhereClause = implode (' AND ', $strWhereClause);
					$strSQL = $strSQL.' WHERE '.$strWhereClause;
					}
				if ($strGroupBy) $strSQL = $strSQL.' GROUP BY '.$strGroupBy;
				if($strOrderBy!="")
					//$strSQL = $strSQL." ".$strOrderBy;
					$strSQL= $strSQL." " ."order by $strOrderField $strOrderBy";
					
				if($LimitClause!="")
					$strSQL = $strSQL.$LimitClause;
					
				//print "<br>".$strSQL."<br>";	
				if($debugMode==1 && $global_config["debug_mode"] == "1") {
					print $strSQL."<br>"; //print the Error
				}
				//print "<br>".$strSQL."<br>";
				$obj_Select->dbSetQuery($strSQL,"select");
				$this->RecSetting = $obj_Select->dbSelectQuery();
				$this->RecCount = $obj_Select->dbQueryNumRows;
				$this->VFPMode = "";
				if($obj_Select->dbQueryNumRows==0){
					$this->ErrorStatus=1;
					return false;
				}
				return $this->RecSetting;
			}
			else {
				/* If this is not an array, it has only one table so use table_select for this case */
				}
		}
		
		
		function SelectQryDirect($strSQL, $debugMode='') {
			global $global_config;
			
			$obj_Select = new extendsClassDB();
			if($strSQL != '') {
				//print "<br>".$strSQL."<br>";	
				if($debugMode==1 && $global_config["debug_mode"] == "1") {
					print $strSQL."<br>"; //print the Error
				}
				//print "<br>".$strSQL."<br>";
				$obj_Select->dbSetQuery($strSQL,"select");
				$this->RecSetting = $obj_Select->dbSelectQuery();
				$this->RecCount = $obj_Select->dbQueryNumRows;
				if($obj_Select->dbQueryNumRows==0){
					$this->ErrorStatus=1;
					return false;
				}
				return $this->RecSetting;
			} else {
				/* If this is not query, please check the query */
			}
		}

		/*
			 function to display the error message
			 * @param string $strVal - Error Message Text
		*/
		function getError($strVal) {
			global $global_config;
			$strmsg="<img src='".$global_config["site_imagepath"]."error.gif' >&nbsp;<font color='#FF0000'>$strVal</font>";
			return ($strmsg);
		}
		
		/*
			 function to display the success  message
			 * @param string $strVal - success Message Text
		*/
		function getSusMsg($strVal)	{
			global $global_config;
			$strmsg="<img src='".$global_config["site_imagepath"]."success.gif' align='absbottom' >&nbsp;<font color='#003300'>$strVal</font>";
			return ($strmsg);
		}
		
		function getRsAsXML($rsData,$isAssociateArray = true) {
			$strXML = "";
			$i = 0;
			foreach($rsData as $Key => $Value)
			{
				if($isAssociateArray == true && ((++$i) % 2 == 0))
					$strXML .= "<".$Key.">".$Value."</".$Key.">";
			}
			return $strXML;
		}
		
		function getRsAsXMLAsNode($rsData,$NodeName,$isAssociateArray = true)
		{
			if($rsData !="") {
				$strXML = "<".$NodeName." ";
				$i = 0;
				if(is_array($rsData)) {
					foreach($rsData as $Key => $Value)
					{
						if($isAssociateArray == true && !is_integer($Key))
							$strXML .= $Key.'="'.$Value.'" ';
					}
				}
				$strXML .= "/>";
			} 
			
			return $strXML;
		}
		
	 	/**
		  * Function to Parse Xml Array Function
		 */
		function xmlParse($filename,$TagName,$Type="") {
			$data = implode("",file($filename));
			$parser = xml_parser_create();
			xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
			xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
			xml_parse_into_struct($parser,$data,$values,$tags);
			xml_parser_free($parser);
			foreach ($tags as $key=>$val){
				if ($key == $TagName) {
					$molranges = $val;
					for ($i=0; $i < count($molranges); $i+=2) {
						$offset = $molranges[$i] + 1;
						$len = $molranges[$i + 1] - $offset;
						$tdb[] = $this->parseVal(array_slice($values, $offset, $len),$Type);
					}
				}else{
					continue;
				}
			}
			return $tdb;
		}

		function parseVal($mvalues,$Type=""){
			for($i=0;$i<count($mvalues);$i++){
				if($Type == 'Listing')
					$mol[$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
				else
					$mol[][$mvalues[$i]["tag"]] = $mvalues[$i]["value"];
			}
			return  $mol;
		}
		
		function getBrowserType() {
		$ua = $_SERVER[HTTP_USER_AGENT]; 
		
		if (strpos($ua,'MSIE')>0)
		{
		  $B_Name="MSIE";
		  $B_Name1=1;
	
		}else if (strpos($ua,'Netscape')>0)
		{
		  $B_Name="Netscape";
		  $B_Name1=2;
		}else if (strpos($ua,'Safari')>0)
		{
		  $B_Name="Safari";
		  $B_Name1=2;
		}
		else
		{
		  $B_Name="Firefox";
		  $B_Name1=2;
		}
	
		return $B_Name;
	}
	/**
	 * Funciton to assign all the Posted Values to Smarty Variables
	 */
	function prePopulateForm(){
		global $objSmarty, $_REQUEST;
		
		foreach($_REQUEST as $key=>$value){
			$$key = $value;
			if($key==fname)
			$value=stripslashes($value);
			else if($key==lname)
			$value=stripslashes($value);
			//	echo "<br>".$key.":".stripslashes($value)."<br>";
			$objSmarty->assign($key,stripslashes($value));
		}
	 }	
	 function getValuesByPrefix($objArray,$strFieldPrefix,$objAvoidFields=array()) {
			if(!is_array($objArray))
				return "";
			foreach($objArray as $Key => $Value) {
				if(substr($Key,0,strlen($strFieldPrefix)) == $strFieldPrefix)
				{
					$strFieldKey = substr($Key,strlen($strFieldPrefix));
					if(!in_array($strFieldKey,$objAvoidFields))
						$FormValues[$strFieldKey] = $Value;
				}
			}
		return $FormValues;
	}
	function ValidateImages($ImageType)
	{   
		$ImageTypes = array("jpg","jpeg","gif","pjpeg","PJPEG","JPG","JPEG","GIF","png","PNG");
		$objType = explode("/",$ImageType);
		if(strtolower($objType[0]) != "image")
			return false;
		if(in_array(strtolower($objType[1]),$ImageTypes))
			return true;
		return false;
	}
	function ValidateImages_Ads($ImageType)
	{   
		$ImageTypes = array("jpg","jpeg","gif","pjpeg","PJPEG","JPG","JPEG","GIF","swf","SWF","png","PNG");
		$objType = explode("/",$ImageType);
		if(strtolower($objType[0]) != "image")
			return false;
		if(in_array(strtolower($objType[1]),$ImageTypes))
			return true;
		return false;
	}	
	function GetFileExtenstion($FileName){
		$ExtAry	= explode(".",$FileName);
		$ExtLen = count($ExtAry)-1;
		$strLowerExt = strtolower($ExtAry[$ExtLen]);
		return $strLowerExt;
	}
	function createFolder($Folder)
	{
		if(!is_dir($Folder)){
			if(mkdir($Folder,0777));
				return true;
		}	
		else
			return false;
	}
	function CopyImage($SourcePath,$DestPath)
	 {
		@copy($SourcePath,$DestPath);
	 }
}
?>