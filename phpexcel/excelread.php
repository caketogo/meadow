<?php
	set_time_limit(0);
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 0); 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	header('Content-Type: text/html; charset=utf-8');
	$myhost = mysql_connect("localhost","root","");
	$mydb	= mysql_select_db("toshiba");
	if(!$mydb){
		die ('could not connet '. mysql_error());
		exit;
	}
	
	set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
 	include 'PHPExcel/IOFactory.php';
	$file_name	=	'new_keywords/spare.xls';
	
	try {
		$objPHPExcel = PHPExcel_IOFactory::load($file_name);
	} catch(Exception $e) {
		die('Error loading file "'.pathinfo($file_name,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
	$csvarray = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	
/*	echo '<pre>';
	print_r($csvarray);
	exit;
*/
	/*
		basha		=>	Indonesia
		filipino	=>	Philipines
	*/
	
 for($x=1;$x<=count($csvarray);$x++) {
		 
		$parts2			=	trim($csvarray[$x]['A']);
	    $description_value3	=	trim($csvarray[$x]['B']);
	    $result 	=	mysql_query("INSERT INTO tbl_parts (parts,description) VALUES ('".$parts2."','".$description_value3."')"); 
				
	//$total = count($result);
//	print $total; 
	     print "Record inserted -----------> ".$result;
		 print "<br>";
	}
	exit;

	//for($x=2;$x<=count($csvarray);$x++){//
//		$data1		=	'';
//		$data2		=	'';
//		$data3		=	'';
//		$data4		=	'';
//		
//		$data1		=	$csvarray[$x]['A'];
//		$data2		=	$csvarray[$x]['B'];
//		$data3		=	$csvarray[$x]['C'];
//		//$data4		=	'';
//		/*if($csvarray[$x][3] != ''){
//			$data4		=	$csvarray[$x][3];
//		}*/
//		
//		/*print $data1;
//		exit;
//		 */
//		 
//		$language	=	'ph';
//		 
//		if($data1!=''){
// 			$Qry1		=	mysql_query("SELECT * FROM category_tags where tag	=  '".mysql_real_escape_string($data1)."' and parent_id = 0 ");	
//			$count1		=	mysql_num_rows($Qry1);
//			$row1 		=	mysql_fetch_assoc($Qry1);
//			
//			if($count1 == 0 && $data1 != ''){
//				$result 	=	mysql_query("INSERT INTO category_tags (tag,parent_id,language,created_date) VALUES ('".mysql_real_escape_string($data1)."',0,'".$language."',now())");
//				$parent_id	=	mysql_insert_id();
//			}else{
//				$parent_id	=	$row1['id'];
//			}
//		}
//		
//		if($data2!='' && isset($data2)){
//			//print "SELECT * FROM category_tags where tag	=  '".mysql_real_escape_string($data2)."' and parent_id = '".$parent_id."' ";
//			//print "<br>";
// 			$Qry2		=	mysql_query("SELECT * FROM category_tags where tag	=  '".mysql_real_escape_string($data2)."' and parent_id = '".$parent_id."' ");
//  			$count2		=	mysql_num_rows($Qry2);
//			$row2 		=	mysql_fetch_assoc($Qry2);
//			if($count2==0){
//				$result 			=	mysql_query("INSERT INTO category_tags (tag, parent_id,language,created_date) VALUES ('".mysql_real_escape_string($data2)."','".$parent_id."','".$language."',now())");
//				$sub_parent_id		=	mysql_insert_id();
//			}else{
//				$sub_parent_id	=	$row2['id'];
//			}
//		}
//		
//		if($data3!='' && isset($data3)){ 		
//			//print "SELECT * FROM category_tags where tag	=  '".mysql_real_escape_string($data3)."' and parent_id = '".$sub_parent_id."' ";
//			//print "<br>";
// 			$Qry3		=	mysql_query("SELECT * FROM category_tags where tag	=  '".mysql_real_escape_string($data3)."' and parent_id = '".$sub_parent_id."' ");
// 			$count3		=	mysql_num_rows($Qry3);
//			$row3 		=	mysql_fetch_assoc($Qry3);
//			
//			if($count3==0){
//				$resultdata1	=	mysql_query("INSERT INTO category_tags(tag, parent_id,language,created_date) VALUES ('".mysql_real_escape_string($data3)."','".$sub_parent_id."','".$language."',now())");
//			}
//		}
//		
// 		
//  		/*$post = strpos($data3, ' + ');
//		if($post !== false){
//			$gender_res	=	$gender_res.",' '";
//			$dataArr = explode(" + ", $data3);
//			if($dataArr[0] != ''){
//				$Qry3		=	mysql_query("SELECT * FROM category_tags where tag	=  '".$dataArr[0]."' and parent_id = '".$sub_parent_id."' ");
//				$count3		=	mysql_num_rows($Qry3);
//				$row3 		=	mysql_fetch_assoc($Qry3);
//				if($count3==0){
//					$resultdata1	=	mysql_query("INSERT INTO category_tags(tag, parent_id,created_date) VALUES ('".$dataArr[0]."','".$sub_parent_id."',now())");
//				}
//			}
//			if($dataArr[1] != '' && $dataArr[1] != '?'){
//				$Qry3		=	mysql_query("SELECT * FROM category_tags where tag	=  '".$dataArr[1]."' and parent_id = '".$sub_parent_id."' ");
//				$count3		=	mysql_num_rows($Qry3);
//				$row3 		=	mysql_fetch_assoc($Qry3);
//				if($count3==0){
//				$resultdata2	=	mysql_query("INSERT INTO category_tags(tag, parent_id,created_date) VALUES ('".$dataArr[1]."','".$sub_parent_id."',now())");
//				}
//			}
//		}else{
//			$Qry3		=	mysql_query("SELECT * FROM category_tags where tag	=  '".$data3."' and parent_id = '".$sub_parent_id."' ");
//			$count3		=	mysql_num_rows($Qry3);
//			$row3 		=	mysql_fetch_assoc($Qry3);
//			if($count3==0){
//				$result 			=	mysql_query("INSERT INTO category_tags(tag, parent_id,created_date) VALUES ('".$data3."','".$sub_parent_id."',now())");
//			}
//		}*/
//		/*if($data4 != '' && isset($data4)){
//			$resultdata2	=	mysql_query("INSERT INTO category_tags(tag, parent_id, created_date) VALUES ('".$data4."','".$sub_parent_id."',now())");
// 		}*/
//	}
	echo "Records successfully inserted!"
?>