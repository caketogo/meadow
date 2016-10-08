<?php
	ini_set('display_errors', '1');

	//Local db
	//mysql_connect("localhost", "root", "") or die("Could not connect: " . mysql_error());
	//mysql_select_db("container_rental");
	
	//Live db
	mysql_connect("localhost", "webuser", "iTsS3cuR3pIN") or die("Could not connect: " . mysql_error());
	mysql_select_db("container");
/*	echo '111';
	exit;*/
	
	$query_sms_schedule = mysql_query("SELECT * FROM tbl_sms_schedule");
		if(mysql_num_rows($query_sms_schedule) > 0){
			
				while ($row_sms_schedule = mysql_fetch_array($query_sms_schedule, MYSQL_ASSOC)){ 
					 $row_sms_schedule_result[] = $row_sms_schedule;
					 
					 //Setting the Over due section start
					 $schedule_type 	=  $row_sms_schedule['schedule_type']; 
					 $schedule_status 	=  $row_sms_schedule['status']; 
				
				}	
					 
					 if($schedule_type =='over_due_customer' && $schedule_status=='Active'){
					 	
						$query = mysql_query("SELECT * FROM tbl_smscustomer_list WHERE  customer_type='".$schedule_type."'");
						if(mysql_num_rows($query) > 0){
							while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){ 
							$over_due_customer_sms_content = $row['sms_content'];
						}	
						
						$result = mysql_query("SELECT a.*, b.* FROM tbl_customer as a, tbl_customer_container as b  WHERE  a.id=b.customer_id");
						$n =0;
						while ($Res_container_customer = mysql_fetch_array($result, MYSQL_ASSOC)){ 
							$current_date = date("d/m/Y ");// current date									
							$contract_next_due_date =  $Res_container_customer['contract_next_due_date'];
							
							if($Res_container_customer['contract_next_due_date'] !=''){
								$now = strtotime(str_replace("/", '-', $Res_container_customer['contract_next_due_date'])); // or your date as well
								$your_date = strtotime(str_replace("/", '-', $current_date));
								$datediff = $your_date - $now;
								$rsValues[$n]['overdue'] = floor($datediff/(60*60*24));
								$overdue = floor($datediff/(60*60*24));
									if($overdue > 0){
									$get_customer_over_due_qry = mysql_query("SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer['customer_id']."'");
										while ($reesult_new = mysql_fetch_array($get_customer_over_due_qry, MYSQL_ASSOC)){ 
											$Res_over_due_container_customer[] = $reesult_new;
											$Res_over_due_container_customer[$n]['over_due_customer_sms_content'] = $over_due_customer_sms_content;
										}
									}
							}
							$n++;	
						}
						
						if(is_array($Res_over_due_container_customer)){	
								// Send SMS to the Over due Customer start
									for($m=0; $m < count($Res_over_due_container_customer); $m++){
									$customer_ID = @$Res_over_due_container_customer[$m]['id'];
									$mobile_number = @$Res_over_due_container_customer[$m]['mobile_number'];
									$selected_customer_sms_content = @$Res_over_due_container_customer[$m]['over_due_customer_sms_content'];
											if($mobile_number !=''){
											
												
												$result = sendSMSgetResponse($mobile_number, $selected_customer_sms_content);	
												
												if($result[$m]['result']== 402){
													$customer_ID 	= $customer_ID;
													$SMS_content	= $selected_customer_sms_content;
													$api_status 	= $result[$m]['resultText'];
													$status_code 	= $result[$m]['result'];
													
													$current_Date 	= date("Y-m-d H:i:s");	
													$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, status_code, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."',  '".$status_code."', '".$current_Date."')");
													
												}
												
												
											// Insert the SMS content to the Customer 
												if($result[$m]['result']== 200){
													$customer_ID 	= $customer_ID;
													$SMS_content	= $selected_customer_sms_content;
													$api_status 	= $result[$m]['reference_id'][0];
													$status_code 	= '200';
													$current_Date 	= date("Y-m-d H:i:s");	
													$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, status_code, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."',  '".$status_code."', '".$current_Date."')");$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."', '".$current_Date."')");
													if($query_insert){
														// goes Log files here
														//query_insert
													}
													
												}			
											}	
									}
									// Send SMS to the Over due Customer End
									//echo 'SMS Sent Successfully';				
								}	
							
							}else{
							echo 'not found';
							}		
						}	
					 // End SMS to the Over due Customer 
					 
					 
					 if($schedule_type =='all_customer' && $schedule_status=='Active'){ 	// Start SMS to the All Customer 
					 
							$query = mysql_query("SELECT * FROM tbl_smscustomer_list WHERE  customer_type='".$schedule_type."'");
								if(mysql_num_rows($query) > 0){
								
									while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){ 
										$all_customer_sms_content = $row['sms_content'];
									}
									$n =0;
									$result = mysql_query("SELECT a.*, b.* FROM tbl_customer as a, tbl_customer_container as b  WHERE  a.id=b.customer_id");
							
									while ($Res_container_customer = mysql_fetch_array($result, MYSQL_ASSOC)){ 
										$get_userdet_res['container_customer_id'] = $Res_container_customer['customer_id'];
										$get_customer_over_due_qry = mysql_query("SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer['customer_id']."'");
										while ($reesult_new = mysql_fetch_array($get_customer_over_due_qry, MYSQL_ASSOC)){ 
											$Res_all_custome_customer[] = $reesult_new;
											$Res_all_custome_customer[$n]['all_customer_sms_content'] = $all_customer_sms_content;
										}
										$n++;		
									}
								
								if(is_array($Res_all_custome_customer)){	
										for($m=0; $m < count($Res_all_custome_customer); $m++){
											$customer_ID = @$Res_all_custome_customer[$m]['id'];
											$mobile_number = @$Res_all_custome_customer[$m]['mobile_number'];
											$selected_customer_sms_content = @$Res_all_custome_customer[$m]['all_customer_sms_content'];
											
											if($mobile_number !=''){
												$result = sendSMSgetResponse($mobile_number, $selected_customer_sms_content);	
												if($result[$m]['result']== 402){
													$customer_ID 	= $customer_ID;
													$SMS_content	= $selected_customer_sms_content;
													$api_status 	= $result[$m]['resultText'];
													$status_code 	= '402';
													$current_Date 	= date("Y-m-d H:i:s");	
													$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, status_code, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."',  '".$status_code."', '".$current_Date."')");$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."', '".$current_Date."')");
												}
											// Insert the SMS content to the Customer 
												if($result[$m]['result']== 200){
													$customer_ID 	= $customer_ID;
													$SMS_content	= $selected_customer_sms_content;
													$api_status 	= $result[$m]['reference_id'][0];
													$status_code 	= '200';
													$current_Date 	= date("Y-m-d H:i:s");	
													$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, status_code, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."',  '".$status_code."', '".$current_Date."')");$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."', '".$current_Date."')");
													if($query_insert){
														// goes Log files here
														//query_insert
													}
													
												}
											}	
										}
										//echo 'SMS Sent Successfully';				
									}	
								
								}else{
							echo 'not found';
							}	
	
					 
					 // End SMS to the All Customer 
					 }
					 
					 
					 if($schedule_type =='selected_customer' && $schedule_status=='Active'){  // Start SMS to the Selected Customer 
					 	
			
							$query = mysql_query("SELECT * FROM tbl_smscustomer_list WHERE  customer_type='".$schedule_type."'");
							if(mysql_num_rows($query) > 0){
								$n =0;
								while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){ 
									$selected_customer_sms_content = $row['sms_content'];
									$get_customer_over_due_qry = mysql_query("SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$row['customer_id']."'");
										while ($reesult_new = mysql_fetch_array($get_customer_over_due_qry, MYSQL_ASSOC)){ 
											$Res_selected_customer[] = $reesult_new;
											$Res_selected_customer[$n]['mobile_number'] = $reesult_new['mobile_number']; 
											$Res_selected_customer[$n]['selected_customer_sms_content'] = $selected_customer_sms_content;
										}
										$n++;		
								}
							
								if(is_array($Res_selected_customer)){	
									for($m=0; $m < count($Res_selected_customer); $m++){
										$customer_ID = @$Res_selected_customer[$m]['id'];
										$mobile_number = @$Res_selected_customer[$m]['mobile_number'];
										$selected_customer_sms_content = @$Res_selected_customer[$m]['selected_customer_sms_content'];
										
										if($mobile_number !=''){
												$result[$m] = sendSMSgetResponse($mobile_number, $selected_customer_sms_content);				
												
												if($result[$m]['result']== 402){
													$customer_ID 	= $customer_ID;
													$SMS_content	= $selected_customer_sms_content;
													$api_status 	= $result[$m]['resultText'];
													$status_code 	= '402';
													$current_Date 	= date("Y-m-d H:i:s");	
													$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, status_code, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."',  '".$status_code."', '".$current_Date."')");$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."', '".$current_Date."')");
													
												}
												
												
											// Insert the SMS content to the Customer 
												if($result[$m]['result']== 200){
													$customer_ID 	= $customer_ID;
													$SMS_content	= $selected_customer_sms_content;
													$api_status 	= $result[$m]['reference_id'][0];
													$status_code 	= '200';
													$current_Date 	= date("Y-m-d H:i:s");	
													$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, status_code, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."',  '".$status_code."', '".$current_Date."')");$query_insert = mysql_query("INSERT INTO tbl_customer_communication (customer_id, sms_message, api_status, date_sent)VALUES ('".$customer_ID."', '".$SMS_content."', '".$api_status."', '".$current_Date."')");
													if($query_insert){
														// goes Log files here
														//query_insert
													}
													
												}
												//exit;
												
										}	
									}
									
								}
								//echo 'SMS Sent Successfully';
							
							}else{
							echo 'not found';
							}	
	
					 }// End SMS to the Selected Customer
									 
					 
				
		}
		
		
		
	function sendSMSgetResponse($mobile_number, $selected_customer_sms_content){
		$getString  ='';
		$url = "www.voodoosms.com/vapi/server/sendSMS";
		$getString .="?dest=44".$mobile_number."&";
		$getString .="orig=Container&";
		$getString .="msg=".urlencode("".$selected_customer_sms_content."")."&";
		$getString .="uid=smsmanagement&";
		$getString .="pass=qtij32g&";
		$getString .="pass=qtij32g&";
		$getString .="cc=44&";
		$getString .="format=json&";
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
			/*echo '<br>';
			//echo 'Specific Customer';												
			echo '<pre>';
			print_r($result);
			//echo($result);
			
			echo '<br>';*/												
		
		curl_close($ch);
		 return json_decode($result, true);
	}	
	/*echo '<pre>';
	print_r($row_sms_schedule_result);
		
	exit;				*/
	
	
/*	$customer_type = $_REQUEST['customer_type'];
	if($customer_type =='over_due_customer'){
		$query = mysql_query("SELECT * FROM tbl_smscustomer_list WHERE  customer_type='".$customer_type."'");
		if(mysql_num_rows($query) > 0){
			
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){ 
					 $over_due_customer_sms_content = $row['sms_content'];
				}	
			
				$result = mysql_query("SELECT a.*, b.* FROM tbl_customer as a, tbl_customer_container as b  WHERE  a.id=b.customer_id");
				$n =0;
				while ($Res_container_customer = mysql_fetch_array($result, MYSQL_ASSOC)){ 
					$current_date = date("d/m/Y ");// current date									
					$contract_next_due_date =  $Res_container_customer['contract_next_due_date'];
					
					if($Res_container_customer['contract_next_due_date'] !=''){
						$now = strtotime(str_replace("/", '-', $Res_container_customer['contract_next_due_date'])); // or your date as well
						$your_date = strtotime(str_replace("/", '-', $current_date));
						$datediff = $your_date - $now;
						$rsValues[$n]['overdue'] = floor($datediff/(60*60*24));
						$overdue = floor($datediff/(60*60*24));
						if($overdue > 0){
							$get_customer_over_due_qry = mysql_query("SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer['customer_id']."'");
							while ($reesult_new = mysql_fetch_array($get_customer_over_due_qry, MYSQL_ASSOC)){ 
								$Res_over_due_container_customer[] = $reesult_new;
								$Res_over_due_container_customer[$n]['over_due_customer_sms_content'] = $over_due_customer_sms_content;
							}
						}
					}
					$n++;	
				}
				
				
				
				for($m=0; $m < count($Res_over_due_container_customer); $m++){
					$mobile_number = $Res_over_due_container_customer[$m]['mobile_number'];
					$selected_customer_sms_content = $Res_over_due_container_customer[$m]['over_due_customer_sms_content'];
				
					if($mobile_number !=''){
						$getString  ='';
						$url = "www.voodoosms.com/vapi/server/sendSMS";
						 $getString .="?dest=44".$mobile_number."&";
						 $getString .="orig=Container&";
						 $getString .="msg=".urlencode("".$selected_customer_sms_content."")."&";
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
					}	
				}
				echo 'SMS Sent Successfully';				
				
		}else{
			echo 'not found';
		}		
	}
	
	
	
	 if($customer_type =='all_customer'){
		$query = mysql_query("SELECT * FROM tbl_smscustomer_list WHERE  customer_type='".$customer_type."'");
		if(mysql_num_rows($query) > 0){
		
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){ 
				 $all_customer_sms_content = $row['sms_content'];
				}
				$n =0;
				$result = mysql_query("SELECT a.*, b.* FROM tbl_customer as a, tbl_customer_container as b  WHERE  a.id=b.customer_id");
			
				while ($Res_container_customer = mysql_fetch_array($result, MYSQL_ASSOC)){ 
				$get_userdet_res['container_customer_id'] = $Res_container_customer['customer_id'];
						$get_customer_over_due_qry = mysql_query("SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer['customer_id']."'");
						while ($reesult_new = mysql_fetch_array($get_customer_over_due_qry, MYSQL_ASSOC)){ 
							$Res_all_custome_customer[] = $reesult_new;
							$Res_all_custome_customer[$n]['all_customer_sms_content'] = $all_customer_sms_content;
						}
					$n++;		
				}
				
				for($m=0; $m < count($Res_all_custome_customer); $m++){
					$mobile_number = $Res_all_custome_customer[$m]['mobile_number'];
					$selected_customer_sms_content = $Res_all_custome_customer[$m]['all_customer_sms_content'];
				
					if($mobile_number !=''){
						$getString  ='';
						$url = "www.voodoosms.com/vapi/server/sendSMS";
						 $getString .="?dest=44".$mobile_number."&";
						 $getString .="orig=Container&";
						 $getString .="msg=".urlencode("".$selected_customer_sms_content."")."&";
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
					}	
				}
				echo 'SMS Sent Successfully';				
				
		}else{
			echo 'not found';
		}	
	}
	
	
	if($customer_type =='selected_customer'){
			
			$query = mysql_query("SELECT * FROM tbl_smscustomer_list WHERE  customer_type='".$customer_type."'");
			if(mysql_num_rows($query) > 0){
				$n =0;
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC)){ 
						$selected_customer_sms_content = $row['sms_content'];
						$get_customer_over_due_qry = mysql_query("SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$row['customer_id']."'");
						while ($reesult_new = mysql_fetch_array($get_customer_over_due_qry, MYSQL_ASSOC)){ 
							$Res_selected_customer[] = $reesult_new;
							$Res_selected_customer[$n]['mobile_number'] = $reesult_new['mobile_number']; 
							$Res_selected_customer[$n]['selected_customer_sms_content'] = $selected_customer_sms_content;
						}
						$n++;		
				}
				
				for($m=0; $m < count($Res_selected_customer); $m++){
					$mobile_number = $Res_selected_customer[$m]['mobile_number'];
					$selected_customer_sms_content = $Res_selected_customer[$m]['selected_customer_sms_content'];
				
					if($mobile_number !=''){
						$getString  ='';
						$url = "www.voodoosms.com/vapi/server/sendSMS";
						 $getString .="?dest=44".$mobile_number."&";
						 $getString .="orig=Container&";
						 $getString .="msg=".urlencode("".$selected_customer_sms_content."")."&";
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
					}	
				}
				
				echo 'SMS Sent Successfully';
				
			}else{
				echo 'not found';
			}	
	}*/
	?>