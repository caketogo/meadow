<?php

	class siteadmin extends common	{
		/* Constructor */
		function siteadmin()	{

			$this->Common();
			$this->adminuserstable						=		"tbl_users";
			$this->categorytable						=		"tbl_category";			
		}


		function getadminusersdetails() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM ".$this->adminuserstable;
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				for($i=0;$i<count($get_userdet_res);$i++) {
					$get_userdet_res[$i]['added_on'] = date('j M. Y', $get_userdet_res[$i]['created_date']['seconds']);
					$get_userdet_res[$i]['last_login_on'] = date('j M. Y', $get_userdet_res[$i]['last_access_date']['seconds']);
					
				}
			}
			/*echo '<pre>';
			print_r($get_userdet_res);
			exit;*/
			return $get_userdet_res;
		}
		
		function getadminusersdetailsResult() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM ".$this->adminuserstable. " WHERE user_type != 'super_admin' ORDER BY id ASC LIMIT $start_from, $limit ";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			return $get_userdet_res;
		}
		
		function getadminusersdetailsCount() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM ".$this->adminuserstable. " WHERE user_type != 'super_admin'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			return $get_userdet_res;
		}
		
		function getcountofdashboard() {
			global $global_config, $objSmarty;
			$getcountofdashboard = array();
			$Template_qry = "SELECT COUNT(*) FROM tbl_template";
			$Template_res = $this->SelectQryDirect($Template_qry);
			$getcountofdashboard['dashboardtemplateheading'] = "Template";
			$getcountofdashboard['dashboardtemplatecount'] = $Template_res[0][0];
			$Schedule_qry = "SELECT COUNT(*) FROM tbl_email";
			$Schedule_res = $this->SelectQryDirect($Schedule_qry);
			$getcountofdashboard['dashboardschduleheading'] = "Schedule Email";
			$getcountofdashboard['dashboardschdulecount'] = $Schedule_res[0][0];
			$Pending_qry = "SELECT COUNT(*) FROM tbl_email where Schedule_date > now() ";
			$Pending_res = $this->SelectQryDirect($Pending_qry);
			$getcountofdashboard['dashboardpendingheading'] = "Pending Schedule";
			$getcountofdashboard['dashboardpendingcount'] = $Pending_res[0][0];
			$Completed_qry = "SELECT COUNT(*) FROM tbl_email where Schedule_date < now()";
			$Completed_res = $this->SelectQryDirect($Completed_qry);
			$getcountofdashboard['dashboardcompleteheading'] = "Completed Schedule";
			$getcountofdashboard['dashboardcompletecount'] = $Completed_res[0][0];
			if(is_array($getcountofdashboard)) {
				return $getcountofdashboard;
			}
		}
		
		
		function getadminusersdetailsbyid($id) {
			global $global_config, $objSmarty;
			//if($id != "") {
				$get_userdet_qry = "SELECT * FROM tbl_users WHERE user_type !=super_admin";
				$get_userdet_res = $this->get_query_results($get_userdet_qry);
				/*if(is_array($get_userdet_res)) {
					for($i=0;$i<count($get_userdet_res);$i++) {
						$get_userdet_res[$i]['added_on'] = date('j M. Y', $get_userdet_res[$i]['date_created']['seconds']);
						$get_userdet_res[$i]['last_login_on'] = date('j M. Y', $get_userdet_res[$i]['last_login']['seconds']);
					}
				}*/
				return $get_userdet_res;
			//}
		}
		
		/*function getadminusersdetailsbyid($id) {
			global $global_config, $objSmarty;
			if($id != "") {
				$get_userdet_qry = "SELECT * FROM tbl_adminusers WHERE id=".$id;
				$get_userdet_res = $this->get_query_results($get_userdet_qry);
				if(is_array($get_userdet_res)) {
					for($i=0;$i<count($get_userdet_res);$i++) {
						$get_userdet_res[$i]['added_on'] = date('j M. Y', $get_userdet_res[$i]['date_created']['seconds']);
						$get_userdet_res[$i]['last_login_on'] = date('j M. Y', $get_userdet_res[$i]['last_login']['seconds']);
					}
				}
				return $get_userdet_res;
			}
		}*/
		
		function updateadminuserdetbyid($objarray) {
			global $global_config, $objSmarty;
			if($objarray['user_id'] != "") {
				$get_userdet_qry = "SELECT id, emailid FROM tbl_adminusers WHERE emailid='".$objarray['txt_users_emailid']."'";
				$get_userdet_res = $this->get_query_results($get_userdet_qry);
				if($objarray['txt_users_emailid'] == $get_userdet_res[0]['emailid']) {
					if($objarray['user_id'] == $get_userdet_res[0]['id']) {
						$emaidexist = 0;
					}
					else {
						$emaidexist = 1;
					}
				}
				else {
					$emaidexist = 0;
				}
				if($emaidexist == "0") {
					$updatearray = array();
					$updatearray['1##firstname']	=		$objarray['txt_users_firstname'];
					$updatearray['1##lastname']	=		$objarray['txt_users_lastname'];
					$updatearray['1##emailid']			=		$objarray['txt_users_emailid'];
					$updatearray['1##gender']				=		$objarray['user_gender'];
					$updatearray['0##status']				=		$objarray['user_status'];
					if($objarray['txt_users_password'] != "") {
						$updatearray['1##password']			=		$objarray['txt_users_password'];
					}
					$updatewhere											=		"WHERE id=".$objarray['user_id'];
					$upd_val = $this->update_query_bywhere($this->adminuserstable, $updatearray, $updatewhere);
					return 1;
				}
				else {


					$objSmarty->assign('emailerrmsg',	1);
				}
			}
		}

		

		function insertnewadminuserdetails($objarray) {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT id, emailid FROM tbl_adminusers WHERE emailid='".$objarray['txt_users_emailid']."'";
			$get_userdet_res = $this->get_query_results($get_userdet_qry);
			if($objarray['txt_users_emailid'] == $get_userdet_res[0]['emailid']) {
				if($objarray['user_id'] == $get_userdet_res[0]['id']) {
					$emaidexist = 0;
				}
				else {
					$emaidexist = 1;
				}
			}
			else {
				$emaidexist = 0;
			}
			if($emaidexist == "0") {
				$get_idcountusers_qry		=		"SELECT * FROM tbl_idcount where tablenme='tbl_adminusers'";
				$get_idcountusers_res		=		$this->get_query_results($get_idcountusers_qry);
				$newusers_id							=		$get_idcountusers_res[0]['counter_val']['value'] + 1;
				$cluster								=		Cassandra::cluster()->build();
				$keyspace								=		'listedo_common';
				$session								=		$cluster->connect($keyspace);
				$insusers_qry						=		"INSERT INTO tbl_adminusers (id, date_created, dob, emailid, firstname, gender, lastname, password, status, user_id) VALUES (".$newusers_id.", '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '".$objarray['txt_users_emailid']."', '".$objarray['txt_users_firstname']."', '".$objarray['user_gender']."', '".$objarray['txt_users_lastname']."', '".$objarray['txt_users_password']."', ".$objarray['user_status'].", now())";
				$insusers_res						=		$session->execute(new Cassandra\SimpleStatement($insusers_qry));
				$updusers_qry						=		"UPDATE tbl_idcount SET counter_val = counter_val+1 WHERE tablenme='tbl_adminusers'";
				$updusers_res						=		$session->execute(new Cassandra\SimpleStatement($updusers_qry));
				return $newusers_id;
			}
			else {
				$objSmarty->assign('emailerrmsg',	1);
			}
		}		
		
		// Get the category list section
		function getCategorylistdetails() {
			global $global_config, $objSmarty;
			$get_catedet_qry = "SELECT * FROM tbl_container";
			//$get_catedet_qry = "SELECT * FROM ".$this->categorytable." ";
			
			$get_catedet_res = $this->SelectQryDirect($get_catedet_qry);
			/*echo '<pre>';
			print_r($get_catedet_res);
			exit;*/
			if(is_array($get_catedet_res)) {
				return $get_catedet_res;
			}
		}
	
		
		// Get GetCountPayments
		function GetCountSMSsent() {
			global $global_config, $objSmarty;
				$container_rental_user_type = $_SESSION['container_rental_user_type'];
					//echo $get_userdet_qry = "SELECT * FROM tbl_payment_history WHERE date_paid > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY id DESC ";
					$get_userdet_qry = "SELECT * FROM `tbl_customer_communication` WHERE DATE(`date_sent`) = CURDATE()";
					//SELECT * FROM `table` WHERE DATE(`timestamp`) = CURDATE()
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$CountSMSsent = count($get_userdet_res);
					}	
			return $CountSMSsent;
		}	

		
		// Get GetCountPayments
		function GetCountPayments() {
			global $global_config, $objSmarty;
				$container_rental_user_type = $_SESSION['container_rental_user_type'];
					//echo $get_userdet_qry = "SELECT * FROM tbl_payment_history WHERE date_paid > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY id DESC ";
					$get_userdet_qry = "SELECT * FROM `tbl_payment_history` WHERE DATE(`date_paid`) = CURDATE()";
					//SELECT * FROM `table` WHERE DATE(`timestamp`) = CURDATE()
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$CountPayments_Receipts = count($get_userdet_res);
					}	
			return $CountPayments_Receipts;
		}	
		// Get GetCountAvailableContainers
		function GetCountAvailableContainers() {
			global $global_config, $objSmarty;
				$container_rental_user_type = $_SESSION['container_rental_user_type'];
					$get_userdet_qry = "SELECT * FROM tbl_container where status='Available'";
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$CountAvailableContainers = count($get_userdet_res);
					}	
			return $CountAvailableContainers;
		}		
		
		// Get GetCountLockedContainers
		function GetCountLockedContainers() {
			global $global_config, $objSmarty;
				$container_rental_user_type = $_SESSION['container_rental_user_type'];
					$get_userdet_qry = "SELECT * FROM tbl_container where status='Locked'";
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$CountLockedContainers = count($get_userdet_res);
					}	
			return $CountLockedContainers;
		}		
		// Get GetContainersDetailslist
		function GetCountOverDueContainers() {
			
			global $global_config, $objSmarty;
				$container_rental_user_type = $_SESSION['container_rental_user_type'];
					$get_userdet_qry = "SELECT * FROM tbl_container";
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$dataResult = array();
						$overdue_count = array();						
						
						$over_due_count = 0;
						$count_get_userdet_res = count($get_userdet_res);
						for($m=0; $m < $count_get_userdet_res; $m++){
							$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where container_number='".$get_userdet_res[$m]['id']."' ";
							$Res_container_customer = $this->SelectQryDirect($get_container_customer_qry);		
							$count_Res_container_customer = count($Res_container_customer);
								for($n=0; $n < $count_Res_container_customer; $n++){
									$get_userdet_res[$m]['container_customer_id'] = $Res_container_customer[$n]['customer_id'];
									$get_userdet_res[$m]['contract_start_date'] = $Res_container_customer[$n]['contract_start_date'];
									$get_userdet_res[$m]['contract_next_due_date'] = $Res_container_customer[$n]['contract_next_due_date'];
									$get_userdet_res[$m]['customer_container_status'] = $Res_container_customer[$n]['status'];
									$current_date = date("d/m/Y ");// current date									
									$contract_next_due_date =  $Res_container_customer[$n]['contract_next_due_date'];
									
									if($Res_container_customer[$n]['contract_next_due_date'] !=''){
										$now = strtotime(str_replace("/", '-', $Res_container_customer[$n]['contract_next_due_date'])); // or your date as well
										$your_date = strtotime(str_replace("/", '-', $current_date));
										$datediff = $your_date - $now;
										$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
										$overdue = floor($datediff/(60*60*24));
										if($overdue > 0){
											$get_userdet_res[$m]['status'] = 'overdue';	
											$overdue_count['overdue_count'] = $over_due_count;	
											$over_due_count	++;
										}
									}else{
										$get_userdet_res[$m]['status'] = $get_userdet_res[$m]['status'];	
									}
									
								}
								
						}
					}	
			return $overdue_count;
		
		
		}	
			
		// Get GetContainersDetailslist
		function GetContainersDetails() {
			global $global_config, $objSmarty;
				$container_rental_user_type = $_SESSION['container_rental_user_type'];
					$get_userdet_qry = "SELECT * FROM tbl_container";
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$dataResult = array();
						$count_get_userdet_res = count($get_userdet_res);
						for($m=0; $m < $count_get_userdet_res; $m++){
							//$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where container_number='".$get_userdet_res[$m]['id']."' AND status = '".$get_userdet_res[$m]['status']."'";
							$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where container_number='".$get_userdet_res[$m]['id']."' ";
							$Res_container_customer = $this->SelectQryDirect($get_container_customer_qry);		
							$count_Res_container_customer = count($Res_container_customer);
								for($n=0; $n < $count_Res_container_customer; $n++){
									$get_userdet_res[$m]['container_customer_id'] = $Res_container_customer[$n]['customer_id'];
									$get_userdet_res[$m]['contract_start_date'] = $Res_container_customer[$n]['contract_start_date'];
									$get_userdet_res[$m]['contract_next_due_date'] = $Res_container_customer[$n]['contract_next_due_date'];
									$get_userdet_res[$m]['customer_container_status'] = $Res_container_customer[$n]['status'];
									
									
									$current_date = date("d/m/Y ");// current date									
									
									//$contract_start_date =  $Res_container_customer[$n]['contract_start_date'];
									$contract_next_due_date =  $Res_container_customer[$n]['contract_next_due_date'];
									
									if($Res_container_customer[$n]['contract_next_due_date'] !=''){
										$now = strtotime(str_replace("/", '-', $Res_container_customer[$n]['contract_next_due_date'])); // or your date as well
										$your_date = strtotime(str_replace("/", '-', $current_date));
										$datediff = $your_date - $now;
										$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
										$overdue = floor($datediff/(60*60*24));
										if($overdue > 0){
											//$get_userdet_res[$m]['status'] = 'overdue--------'. $overdue.'----------------'.$Res_container_customer[$n]['contract_next_due_date'];	
											$get_userdet_res[$m]['status'] = 'overdue';	
										}
									}else{
										$get_userdet_res[$m]['status'] = $get_userdet_res[$m]['status'];	
									}
									
									$get_customer_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
									$Res_get_customer = $this->SelectQryDirect($get_customer_qry);	
									$get_userdet_res[$m]['customer_mobile_number'] = $Res_get_customer[$n]['mobile_number'];
									$get_userdet_res[$m]['customer_first_name'] = $Res_get_customer[$n]['first_name'];
									$get_userdet_res[$m]['customer_sur_name'] = $Res_get_customer[$n]['sur_name'];									
								}	
						}
					}	
			return $get_userdet_res;
		}	
		
		// Get Container Price list
		function getContainerPricesList() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM tbl_container_prices";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}	
		
		function getSMSCustomerList($objarray) {
			global $global_config, $objSmarty;
			
			//echo '<pre>';
			//echo '1111111111';
			//print_r($objarray);
			//exit;
			$customer_type = $objarray['customer_type'];
			if($customer_type =='over_due_customer'){
				//$customer_type = 'over_due_customer';
				$customer_type = 'over_due_customer';	
				//$get_userdet_qry = "SELECT * FROM tbl_customer";
				//$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					$get_userdet_qry = "SELECT * FROM tbl_customer";
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$dataResult = array();
						$count_get_userdet_res = count($get_userdet_res);
						for($m=0; $m < $count_get_userdet_res; $m++){
							//$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where container_number='".$get_userdet_res[$m]['id']."' AND status = '".$get_userdet_res[$m]['status']."'";
							$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where customer_id='".$get_userdet_res[$m]['id']."' ";
							$Res_container_customer = $this->SelectQryDirect($get_container_customer_qry);		
							$count_Res_container_customer = count($Res_container_customer);
								for($n=0; $n < $count_Res_container_customer; $n++){
									$get_userdet_res[$m]['container_customer_id'] = $Res_container_customer[$n]['customer_id'];
									$get_userdet_res[$m]['contract_start_date'] = $Res_container_customer[$n]['contract_start_date'];
									$get_userdet_res[$m]['contract_next_due_date'] = $Res_container_customer[$n]['contract_next_due_date'];
									//$get_userdet_res[$m]['customer_container_status'] = $Res_container_customer[$n]['status'];
									
									
									$current_date = date("d/m/Y ");// current date									
									
									//$contract_start_date =  $Res_container_customer[$n]['contract_start_date'];
									$contract_next_due_date =  $Res_container_customer[$n]['contract_next_due_date'];
									
									if($Res_container_customer[$n]['contract_next_due_date'] !=''){
										$now = strtotime(str_replace("/", '-', $Res_container_customer[$n]['contract_next_due_date'])); // or your date as well
										$your_date = strtotime(str_replace("/", '-', $current_date));
										$datediff = $your_date - $now;
										$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
										$overdue = floor($datediff/(60*60*24));
										if($overdue > 0){
											//$get_userdet_res[$m]['status'] = 'overdue--------'. $overdue.'----------------'.$Res_container_customer[$n]['contract_next_due_date'];	
											//$get_userdet_res[$m]['status'] = 'overdue';	
											$get_customer_over_due_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
											$Res_get_customer_over_due = $this->SelectQryDirect($get_customer_over_due_qry);	
										}
									}
									/*$get_customer_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
									$Res_get_customer = $this->SelectQryDirect($get_customer_qry);	
									$get_userdet_res[$m]['customer_mobile_number'] = $Res_get_customer[$n]['mobile_number'];
									$get_userdet_res[$m]['customer_first_name'] = $Res_get_customer[$n]['first_name'];
									$get_userdet_res[$m]['customer_sur_name'] = $Res_get_customer[$n]['sur_name'];		*/							
								}	
						}
					}	
			//echo '<pre>';		
			//print_r($Res_get_customer_over_due);
			//exit;
				if(is_array($Res_get_customer_over_due)) {
					return $Res_get_customer_over_due;
				}
						
			}else if($customer_type =='all_customer'){
				//$customer_type = 'all_customer';	
				$customer_type = 'all_customer';		
				$get_userdet_qry = "SELECT * FROM tbl_customer";
				$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
				if(is_array($get_userdet_res)) {
					return $get_userdet_res;
				}
			}else if($customer_type =='selected_customer'){
				//$customer_type = 'selected_customer';
				$customer_type = 'selected_customer';
				$get_userdet_qry = "SELECT * FROM tbl_smscustomer_list where customer_type='selected_customer'";
				$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {	
						$dataResult = array();
						$count_get_userdet_res = count($get_userdet_res);
							for($m=0; $m < $count_get_userdet_res; $m++){
							
								$get_customer_over_due_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$get_userdet_res[$m]['customer_id']."'";
								$Res_get_customer_over_due = $this->SelectQryDirect($get_customer_over_due_qry);	
								
								$get_userdet_res[$m]['id'] = $Res_get_customer_over_due[$m]['id'];
								$get_userdet_res[$m]['first_name'] = $Res_get_customer_over_due[$m]['first_name'];								
								$get_userdet_res[$m]['sur_name'] = $Res_get_customer_over_due[$m]['sur_name'];																
							
								/*$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where customer_id='".$get_userdet_res[$m]['customer_id']."' ";
								$Res_container_customer = $this->SelectQryDirect($get_container_customer_qry);		
								$count_Res_container_customer = count($Res_container_customer);*/
								}
								
							
								
					}else{
						$get_customer_over_due_qry = "SELECT * FROM tbl_customer";
						$get_userdet_res = $this->SelectQryDirect($get_customer_over_due_qry);
						
						
					}
				
			if(is_array($get_userdet_res)) {
								return $get_userdet_res;
							}		
			/*	echo '<pre>';
				print_r($get_userdet_res);
				exit;*/
					
						
			}
		} // End Function 	
		
		
		function getAjaxSMScustomerslist($objarray) {
			global $global_config, $objSmarty;
			
			/*echo '<pre>';
			print_r($objarray);
			exit;*/
			$customer_type = $objarray['customerType'];
			if($customer_type =='over_due_customer'){
				$customer_type = 'over_due_customer';
				//$customer_type = 'over_due_customer';			
			}else if($customer_type =='all_customer'){
				$customer_type = 'all_customer';	
				//$customer_type = 'all';		
			}else if($customer_type =='selected_customer'){
				$customer_type = 'selected_customer';
				//$customer_type = 'all';
			}
			//echo "SELECT * FROM tbl_smscustomer_list WHERE customer_type = '".$customer_type."'";
			$get_userdet_qry = "SELECT * FROM tbl_smscustomer_list WHERE customer_type = '".$customer_type."'";
			$getAjaxSMScustomerslist_res = $this->SelectQryDirect($get_userdet_qry);
			$getAjaxSMScustomerslist_res_count = count($getAjaxSMScustomerslist_res);
			
			if($getAjaxSMScustomerslist_res_count > 1){			
				for($i=0;$i<$getAjaxSMScustomerslist_res_count;$i++) {
					echo "<option value='".$getAjaxSMScustomerslist_res[$i]['id']."'>".$getAjaxSMScustomerslist_res[$i]['customer_type']."</option>";
				}
			}else{
				echo 'failed';
			}	
			exit;
/*			echo '<pre>';
			print_r($get_userdet_res);
			exit;
			if(is_array($get_userdet_res)) {
				//return $get_userdet_res;
				//$objSmarty->assign("over_due_customer", $get_userdet_res); //for PerPage	
				return $get_userdet_res;				
			}*/
		}	
		
		function getSMSCustomerOverDueTypeList($objarray) {
			global $global_config, $objSmarty;
			
			
			
				//$customer_type = 'over_due_customer';
				$customer_type = 'over_due_customer';	
				//$get_userdet_qry = "SELECT * FROM tbl_customer";
				//$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					$get_userdet_qry = "SELECT * FROM tbl_customer";
					$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
					if(is_array($get_userdet_res)) {
						$dataResult = array();
						$count_get_userdet_res = count($get_userdet_res);
						for($m=0; $m < $count_get_userdet_res; $m++){
							//$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where container_number='".$get_userdet_res[$m]['id']."' AND status = '".$get_userdet_res[$m]['status']."'";
							$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where customer_id='".$get_userdet_res[$m]['id']."' ";
							$Res_container_customer = $this->SelectQryDirect($get_container_customer_qry);		
							$count_Res_container_customer = count($Res_container_customer);
								for($n=0; $n < $count_Res_container_customer; $n++){
									$get_userdet_res[$m]['container_customer_id'] = $Res_container_customer[$n]['customer_id'];
									$get_userdet_res[$m]['contract_start_date'] = $Res_container_customer[$n]['contract_start_date'];
									$get_userdet_res[$m]['contract_next_due_date'] = $Res_container_customer[$n]['contract_next_due_date'];
									//$get_userdet_res[$m]['customer_container_status'] = $Res_container_customer[$n]['status'];
									
									
									$current_date = date("d/m/Y ");// current date									
									
									//$contract_start_date =  $Res_container_customer[$n]['contract_start_date'];
									$contract_next_due_date =  $Res_container_customer[$n]['contract_next_due_date'];
									
									if($Res_container_customer[$n]['contract_next_due_date'] !=''){
										$now = strtotime(str_replace("/", '-', $Res_container_customer[$n]['contract_next_due_date'])); // or your date as well
										$your_date = strtotime(str_replace("/", '-', $current_date));
										$datediff = $your_date - $now;
										$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
										$overdue = floor($datediff/(60*60*24));
										if($overdue > 0){
											//$get_userdet_res[$m]['status'] = 'overdue--------'. $overdue.'----------------'.$Res_container_customer[$n]['contract_next_due_date'];	
											//$get_userdet_res[$m]['status'] = 'overdue';	
											$get_customer_over_due_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
											$Res_get_customer_over_due = $this->SelectQryDirect($get_customer_over_due_qry);	
											
											//$customer_type[$n]['customer_type'] = 'over_due_customer';
											//$smscustomer_qry = "SELECT *  tbl_smscustomer_list  WHERE customer_type = '".$customer_type[$n]['customer_type']."'";
											$smscustomer_qry = "SELECT * FROM tbl_smscustomer_list  WHERE customer_type = 'over_due_customer'";
											$smscustomer_val = $this->SelectQryDirect($smscustomer_qry);	
											
											$Res_get_customer_over_due[0]['repetition'] = $smscustomer_val[0]['repetition'];
											$Res_get_customer_over_due[0]['time_to_send'] = $smscustomer_val[0]['time_to_send'];								
											$Res_get_customer_over_due[0]['sms_content'] = $smscustomer_val[0]['sms_content'];	
											$Res_get_customer_over_due[0]['status'] = $smscustomer_val[0]['status'];												
										}
									}
									/*$get_customer_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
									$Res_get_customer = $this->SelectQryDirect($get_customer_qry);	
									$get_userdet_res[$m]['customer_mobile_number'] = $Res_get_customer[$n]['mobile_number'];
									$get_userdet_res[$m]['customer_first_name'] = $Res_get_customer[$n]['first_name'];
									$get_userdet_res[$m]['customer_sur_name'] = $Res_get_customer[$n]['sur_name'];		*/							
								}	
						}
					}	
		/*	echo '<pre>';		
			print_r($Res_get_customer_over_due);
			exit;*/
				if(is_array($Res_get_customer_over_due)) {
					return $Res_get_customer_over_due;
				}

		}
		
		function getSMSCustomerAllTypeList($objarray) {
			global $global_config, $objSmarty;

			$customer_type = 'all_customer';
			$get_userdet_qry = "SELECT * FROM tbl_smscustomer_list  WHERE customer_type = '".$customer_type."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			
			$count_Res_container_customer = count($get_userdet_res);
					for($n=0; $n < $count_Res_container_customer; $n++){
						if($get_userdet_res[$n]['customer_id'] !=''){
							$get_customer_over_due_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$get_userdet_res[$n]['customer_id']."'";
							//echo '<br>';
							$Res_get_customer_over_due = $this->SelectQryDirect($get_customer_over_due_qry);	
							
							$get_userdet_res[$n]['container_customer_id'] = $Res_get_customer_over_due[$n]['id'];
							$get_userdet_res[$n]['container_customer_first_name'] = $Res_get_customer_over_due[$n]['first_name'];								
							$get_userdet_res[$n]['container_customer_sur_name'] = $Res_get_customer_over_due[$n]['sur_name'];		
						}
					}
			/*echo '<pre>';
			echo 'All customer';						
			print_r($get_userdet_res);
			
			echo '<br>';
			echo '***********************************************';
			echo '<br>';						
			exit;	*/		
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;				
			}
		}	
		
		function getSMSCustomerSelectedTypeList($objarray) {
			global $global_config, $objSmarty;

			$customer_type = 'selected_customer';
			$get_userdet_qry = "SELECT * FROM tbl_smscustomer_list  WHERE customer_type = '".$customer_type."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);

			$count_Res_container_customer = count($get_userdet_res);
					for($n=0; $n < $count_Res_container_customer; $n++){
						if($get_userdet_res[$n]['customer_id'] !=''){
							$get_customer_over_due_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$get_userdet_res[$n]['customer_id']."'";
							//echo '<br>';
							$Res_get_customer_over_due = $this->SelectQryDirect($get_customer_over_due_qry);	
							
							$get_userdet_res[$n]['container_customer_id'] = $Res_get_customer_over_due[$n]['id'];
							$get_userdet_res[$n]['container_customer_first_name'] = $Res_get_customer_over_due[$n]['first_name'];								
							$get_userdet_res[$n]['container_customer_sur_name'] = $Res_get_customer_over_due[$n]['sur_name'];		
						}
					}
			/*echo '<pre>';
			echo 'Selected';			
			print_r($get_userdet_res);
			echo '<br>';
			echo '***********************************************';
			echo '<br>';*/						
			
			
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;				
			}
		}
		
		
		function getSMSCustomerTypeList($objarray) {
			global $global_config, $objSmarty;
			
			/*$customer_type = $objarray['customer_type'];
			if($customer_type =='over_due_customer'){
				//$customer_type = 'over_due_customer';
				$customer_type = 'over_due_customer';			
			}else if($customer_type =='all_customer'){
				//$customer_type = 'all_customer';	
				$customer_type = 'all';		
			}else if($customer_type =='selected_customer'){
				//$customer_type = 'selected_customer';
				$customer_type = 'all';
			}*/
			//echo $customer_type;
			//exit;			
			
			//$get_userdet_qry = "SELECT * FROM tbl_customer where id = '".$customerID."'";
			$get_userdet_qry = "SELECT * FROM tbl_smscustomer_list";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				//return $get_userdet_res;
				//$objSmarty->assign("over_due_customer", $get_userdet_res); //for PerPage	
				return $get_userdet_res;				
			}
			
			/*$get_userdet_qry1 = "SELECT * FROM tbl_smscustomer_list where customer_type = 'all_customer'";
			$get_userdet_res1 = $this->SelectQryDirect($get_userdet_qry1);
			if(is_array($get_userdet_res1)) {
				//return $get_userdet_res1;
				$objSmarty->assign("all_customer", $get_userdet_res1); //for PerPage	
				//return $get_userdet_res1;				
			}
			
			$get_userdet_qry2 = "SELECT * FROM tbl_smscustomer_list where customer_type = 'selected_customer'";
			$get_userdet_res2 = $this->SelectQryDirect($get_userdet_qry2);
			if(is_array($get_userdet_res2)) {
				$objSmarty->assign("selected_customer", $get_userdet_res2); //for PerPage
				//return $get_userdet_res2;
			}*/
			
		}	
		
		
		
		
		/****************************************************************************************************************
		*	Function Name : updateSMSCustomerList								*	
		*	Description : Adding the updateSMSCustomerList details				*
		*****************************************************************************************************************/		
		function updateSMSCustomerList($objarray)	{
		global $global_config, $objSmarty;
		
			/*echo 'class: updateSMSCustomerList';
			echo '<pre>';
			print_r($objarray);*/
			
			$customer_type = $objarray['customer_type'];
			if($customer_type =='over_due_customer'){
				//$customer_type = 'over_due_customer';
				$customer_type = 'over_due_customer';	
				
				$strSQL = "DELETE FROM tbl_smscustomer_list WHERE customer_type = '".$customer_type."'";
				$rsValues = $this->SelectQryDirect($strSQL,0);
				
				$selected_customer_ids 	= $objarray['selected_customer_ids'];
				$selected_customer_ids 	= '-';
				$time_value				= $objarray['time_value'];
				$get_repetition			= $objarray['get_repetition'];
				$sms_content			= $objarray['sms_content'];		
						
			}else if($customer_type =='all_customer'){
				$customer_type = 'all_customer';	

				$strSQL = "DELETE FROM tbl_smscustomer_list WHERE customer_type = '".$customer_type."'";
				$rsValues = $this->SelectQryDirect($strSQL,0);
				
				$selected_customer_ids 	= $objarray['selected_customer_ids'];
				$selected_customer_ids 	= rtrim($selected_customer_ids, ',');
				$time_value				= $objarray['time_value'];
				$get_repetition			= $objarray['get_repetition'];
				$sms_content			= $objarray['sms_content'];		
			}else if($customer_type =='selected_customer'){
				$customer_type = 'selected_customer';

				$strSQL = "DELETE FROM tbl_smscustomer_list WHERE customer_type = '".$customer_type."'";
				$rsValues = $this->SelectQryDirect($strSQL,0);

				$selected_customer_ids 	= $objarray['selected_customer_ids'];
				$selected_customer_ids 	= rtrim($selected_customer_ids, ',');
				$time_value				= $objarray['time_value'];
				$get_repetition			= $objarray['get_repetition'];
				$sms_content			= $objarray['sms_content'];		
			}
			
			
			//$customer_type			= $objarray['customer_type'];		
			$Admin_ID = $_SESSION['container_rental_admin_id'];
			$created_date 			= date("Y-m-d H:i:s");			
			
			$selected_customer_ids_array = explode(',', $selected_customer_ids);
			$selected_customer_ids_count = count($selected_customer_ids_array);
			//print_r($selected_customer_ids_array);
			 for ($n = 0; $n < $selected_customer_ids_count; $n++) {
			 
			 		$strInsertPaymentHistoryArray = array(
								array("customer_id", 	$selected_customer_ids_array[$n]),
								array("customer_type", 	$customer_type),									
								array("repetition", 	$get_repetition),
								array("time_to_send", 	$time_value),
								array("sms_content", 	nl2br($sms_content)),									
								array("status", 	'DeActive'),	
								array("created_by", 	$Admin_ID),									
								array("created_date", 	$created_date)
							);
						//echo '<pre>';
						//print_r($strInsertPaymentHistoryArray);
						$this->common_Insert(tbl_smscustomer_list, $strInsertPaymentHistoryArray,'','',0);
			 		
					//$get_customer_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
					//$Res_get_customer = $this->SelectQryDirect($get_customer_qry);	
					//$get_userdet_res[$m]['customer_mobile_number'] = $Res_get_customer[$n]['mobile_number'];
					//$get_userdet_res[$m]['customer_first_name'] = $Res_get_customer[$n]['first_name'];
					//$get_userdet_res[$m]['customer_sur_name'] = $Res_get_customer[$n]['sur_name'];				
			 }
			
			//exit;

			/*$objTables  = array(tbl_template);
			$objFields  = array("COUNT(template_id) CNT");
			$strWhereClass = "template_id = '".$objarray['template_id']."'";
			$ChkDeployVal = $this->SelectQry($objTables, $objFields,'',$strWhereClass,'','','','0');
	
			if($ChkDeployVal[0]['CNT'] > 0) {
				$strSQL = "DELETE FROM ".tbl_template." WHERE template_id = '".$objarray['template_id']."'";
				$rsValues = $this->SelectQryDirect($strSQL,0);
			}
	
			$strInsertArray = array(
									array("template_id", 		$objarray['template_id']),
									array("title",		 		$objarray['txt_title']),
									array("send_grid_email", 	$objarray['txt_tempid']),
									array("schedule_hour", 		$objarray['schedule1']),
									array("schedule_format", 	$objarray['schedule2']),
									array("trigger_id", 	$objarray['triggerid']),
									array("trigger_name", 	$objarray['triggername']),
									array("status", 	$objarray['txt_status']),
	
								);
			$this->common_Insert(tbl_template, $strInsertArray,'','',0);*/
		}
				
		// Get Containerlist
		function view_Customerdetails($customerID) {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM tbl_customer where id = '".$customerID."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}	
		
		
				// Get Containerlist
		function CustomerAuthordetails($customerID) {
			global $global_config, $objSmarty;
			
			$get_userdet_qry = "SELECT * FROM tbl_authorised_users where customer_id = '".$customerID."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			//$get_userdet_qry = "SELECT * FROM tbl_customer where id = '".$customerID."'";
			//$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}	
		// Get Containerlist
		function view_CustomerContainerdetails($customerID) {
			global $global_config, $objSmarty;
			
			$get_userdet_qry = "SELECT * FROM tbl_customer_container where customer_id = '".$customerID."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			//$get_userdet_qry = "SELECT * FROM tbl_customer where id = '".$customerID."'";
			//$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}	
		
		
		// Get Containerlist
		function getCustomerdetails() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM tbl_customer";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}
		
		// Get Containerlist
		function getAssignCustomerdetails($customerID) {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM tbl_customer where id = '".$customerID."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}	

		// Get Containerlist
		function getContainerdetails() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM ".$this->adminuserstable." where uid=".$_SESSION['container_rental_admin_id'];
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}	
		// Get Admin user list
		function getadminuserdetails() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM ".$this->adminuserstable." where uid=".$_SESSION['container_rental_admin_id'];
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if(is_array($get_userdet_res)) {
				return $get_userdet_res;
			}
		}
		
		function getnotesdashcount() {
			global $global_config, $objSmarty;
			$status ='Active';
			$get_userdet_qry = "SELECT * FROM tbl_notes_dashboard where status = '".$status."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);
			if($get_userdet_res!=''){
			$getcntres = count($get_userdet_res);
			}
			return $getcntres;
		}
		
		function getnotesdashdetails() {
			global $global_config, $objSmarty;
			$status ='Active';
			$get_userdet_qry = "SELECT * FROM  tbl_notes_dashboard where status = '".$status."'";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);

		/*for($i=0;$i<count($get_userdet_res);$i++) {
		  // $cntid = $get_userdet_res[$i]['notes_id'];
		      $get_userdet_qry2 = "SELECT * FROM tbl_notes where id = '".$get_userdet_res[$i]['notes_id']."'";
			  $get_userdet_res1 = $this->SelectQryDirect($get_userdet_qry2);
			  $get_userdet_reschk = $get_userdet_res1[$i]['customer_notes'];
		}*/
		 foreach ($get_userdet_res as $valuenew ) {
				$get_container_name_qry = "SELECT * FROM tbl_notes where id='".$valuenew['notes_id']."' ";
				$Res_get_container_name[] = $this->SelectQryDirect($get_container_name_qry,0);	
		/*echo '<pre>';
		print_r($Res_get_container_name);*/
			 }//exit;
         	  return $Res_get_container_name;
		}
		
		function getnotesdetails() {
			global $global_config, $objSmarty;
			$get_userdet_qry = "SELECT * FROM tbl_notes_dashboard ORDER BY id DESC LIMIT 0 , 5 ";
			$get_userdet_res = $this->SelectQryDirect($get_userdet_qry);

		
		 foreach ($get_userdet_res as $valuenew ) {
				$get_container_name_qry = "SELECT * FROM tbl_notes where id='".$valuenew['notes_id']."' ";
				$Res_get_container_name[] = $this->SelectQryDirect($get_container_name_qry,0);	

			 }
         	  return $Res_get_container_name;
		}
		
		function adminloginprocess($objarray)	{
			
			global $global_config, $objSmarty;
			if( ($objarray['txt_loginemailid'] != "") && ($objarray['txt_loginemailid'] != "") ) {
				
				$get_userdet_qry = "SELECT * FROM ".$this->adminuserstable." where email='".trim($objarray['txt_loginemailid'])."' or username ='".trim($objarray['txt_loginemailid'])."'";
				$get_userdet_res = $this->SelectQryDirect($get_userdet_qry,0);
				
				if(is_array($get_userdet_res)) {
					if($get_userdet_res[0]['password'] == md5($objarray['txt_loginpassword'])) {
						if($get_userdet_res[0]['status'] == "Active") {
							$_SESSION['container_rental_admin_id']					=	$get_userdet_res[0]['uid'];
							$_SESSION['container_rental_admin_emailid']				=	$get_userdet_res[0]['email'];
							$_SESSION['container_rental_admin_name']	=	$get_userdet_res[0]['first_name'];
							$_SESSION['container_rental_user_type']	=	$get_userdet_res[0]['user_type'];
							
							Redirect($global_config['siteadmin_globalpath'].'dashboard.php');
						}
						else {
							$objSmarty->assign('logerrmsg', 'Account has been deactivated.');
						}
					}
					else {
						$objSmarty->assign('logerrmsg', 'Invalid Password.');
					}
				}
				else {
					$objSmarty->assign('logerrmsg', 'Invalid Login Information.');
				}
			}
			else {
				$objSmarty->assign('logerrmsg', 'Invalid Emaild Id or Password.');
			}
		}

/****************************************************************************************************************
	*	Function Name : addtemplate								*	
	*	Description : Adding the template details				*
*****************************************************************************************************************/		
	function addtemplate($objarray)	{
		global $global_config, $objSmarty;

		$objTables  = array(tbl_template);
		$objFields  = array("COUNT(template_id) CNT");
		$strWhereClass = "template_id = '".$objarray['template_id']."'";
		$ChkDeployVal = $this->SelectQry($objTables, $objFields,'',$strWhereClass,'','','','0');

		if($ChkDeployVal[0]['CNT'] > 0) {
			$strSQL = "DELETE FROM ".tbl_template." WHERE template_id = '".$objarray['template_id']."'";
			$rsValues = $this->SelectQryDirect($strSQL,0);
		}

		$strInsertArray = array(
								array("template_id", 		$objarray['template_id']),
								array("title",		 		$objarray['txt_title']),
								array("send_grid_email", 	$objarray['txt_tempid']),
								array("schedule_hour", 		$objarray['schedule1']),
								array("schedule_format", 	$objarray['schedule2']),
								array("trigger_id", 	$objarray['triggerid']),
								array("trigger_name", 	$objarray['triggername']),
								array("status", 	$objarray['txt_status']),

							);
		$this->common_Insert(tbl_template, $strInsertArray,'','',0);
	}

	/****************************************************************************************************************
	*	Function Name : GetTemplateDetails								*	
	*	Description : Getting the template list details				*
	*****************************************************************************************************************/
	function GetTemplateDetails($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;

		if($PerPage=="") $PerPage = 10;
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		$objTables 		=array('tbl_template');
		$objFields 		=array("*");

		$TemplateList = "SELECT * FROM tbl_template ORDER BY title ASC";

		$TemplateCNT = "SELECT COUNT(template_id) as CNT FROM tbl_template";
		$TemplateDetails = $this->SelectQryOrder($objTables,$objFields,'','','','', $Start, $PerPage,0,'');
		$TemplateDetails1 =$this->SelectQryDirect($TemplateCNT,0);
		$TotalNum = $TemplateDetails1[0][0];
		if($TotalNum < $Start){
			$Start = 0;
		}

		require $global_config["site_localpath"]."includes/perpage.php";
		$objSmarty->assign("intSearchPerPage", $intPerPage); //for PerPage

		$objSmarty->assign("TemplateList",$TemplateDetails);
		prePopulate($objArray);
		return $TemplateDetails;
	}

	/****************************************************************************************************************
	*	Function Name : GetEditTemplateDetails								*	
	*	Description : Getting the template edit details				*
	*****************************************************************************************************************/
	function GetEditTemplateDetails($objarray)	{
		global $global_config, $objSmarty;

		$TemplateEdit = "SELECT * FROM tbl_template WHERE template_id='".$objarray['template_id']."'";
		$TemplateEditDetails = $this->SelectQryDirect($TemplateEdit,0);

		$objSmarty->assign("TemplateEditDetails",$TemplateEditDetails);
		return $TemplateEditDetails;

	}
	/****************************************************************************************************************
	*	Function Name 	:  for Edit Notes page		*	
	*	Description 	:  for Edit Notes page		*
	*****************************************************************************************************************/
	function GetEditTermsConditionDetails($objarray)	{
		global $global_config, $objSmarty;
		
		$TermsConditionDetailsEdit = "SELECT * FROM tbl_template_management WHERE id='".$objarray['id']."'";
		$TermsConditionDetailsEdit_Res = $this->SelectQryDirect($TermsConditionDetailsEdit,0);

		//$objSmarty->assign("NotesEditDetails",$NotesEditDetails);
		return $TermsConditionDetailsEdit_Res;
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdateTermsConditionDetails					*	
	*	Description : Updating the UpdateTermsConditionDetails details				*
	*****************************************************************************************************************/
	function UpdateTermsConditionDetails($objArray) {
		global $objSmarty, $global_config;

		$strTable = tbl_template_management;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$strUpdateArray = array(
								array("terms_condition",	$objArray['terms_condition']),
								array("created_by",	$Admin_ID),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$created_date),
								array("modify_date", 	$update_date)	
							);					
	
		if($objArray['id'] > 0) {
			$strWhereClause	= "id = '".$objArray['id']."'";
			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	/****************************************************************************************************************
	*	Function Name : addChangeTermsCondition					*	
	*	Description : Updating the addChangeTermsCondition details				*
	*****************************************************************************************************************/
	function addChangeTermsCondition($objArray) {
		global $objSmarty, $global_config;

		$strTable = tbl_template_management;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$strInsertArray = array(
								array("terms_condition",	nl2br($objArray['terms_condition'])),
								array("created_by",	$Admin_ID),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$created_date),
								array("modify_date", 	$update_date)	
							);					
		$this->common_Insert(tbl_template_management, $strInsertArray,'','',0);
		
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdateNotesDetails					*	
	*	Description : Updating the Notes details				*
	*****************************************************************************************************************/
	function UpdateNotesDetails($objArray) {
		global $objSmarty, $global_config;

		$strTable = tbl_notes;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$update_date 			= date("Y-m-d H:i:s");		
		
		$strUpdateArray = array(
								array("customer_id",	$objArray['customer_id']),
								array("customer_notes",	nl2br($objArray['customer_notes'])),
								array("created_by",	$objArray['created_by']),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$objArray['create_date']),
								array("update_date", 	$update_date)	
							);					
	
		if($objArray['id'] > 0) {
			$strWhereClause	= "id = '".$objArray['notes_id']."'";
			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	/****************************************************************************************************************
	*	Function Name 	:  for Edit Notes page		*	
	*	Description 	:  for Edit Notes page		*
	*****************************************************************************************************************/
	function GetEditNotesDetails($objarray)	{
		global $global_config, $objSmarty;
		
		$NotesEdit = "SELECT * FROM tbl_notes WHERE id='".$objarray['id']."'";
		$NotesEditDetails = $this->SelectQryDirect($NotesEdit,0);

		//$objSmarty->assign("NotesEditDetails",$NotesEditDetails);
		return $NotesEditDetails;
	}
	
	
	/****************************************************************************************************************
	*	Function Name 	:  for add addPenalityFee page		*	
	*	Description 	:  for add addPenalityFee page		*
	*****************************************************************************************************************/
	function addPenalityFee($objarray)	{

		global $global_config, $objSmarty;
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");	
					
		/*echo '<pre>';
		print_r($objarray);
		exit;
*/	
		$strInsertArray = array(
								array("days_overdue",	$objarray['days_overdue']),
								array("penality_fee_amount", $objarray['penality_fee']),
								array("created_by",	$Admin_ID),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$created_date),
							);
		$this->common_Insert(tbl_penalityfees, $strInsertArray,'','',0);
	}
	
	
	
	/****************************************************************************************************************
	*	Function Name 	:  for addRemovals Management page		*	
	*	Description 	:  for addRemovals Management page		*
	*****************************************************************************************************************/
	function addRemovals($objarray)	{

		global $global_config, $objSmarty;
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");	
					

		$id_expensive_filetime  = strtotime(date("Y-m-d H:i:s"));
		//$id_expensive_fileName  = $id_expensive_filetime."_".$_FILES['expanes_attachements']['name'];
		
		
		//@move_uploaded_file($_FILES['expanes_attachements']['tmp_name'],  $global_config['site_localpath']."uploads/expenses/".$id_expensive_fileName);
		//$id_expensive_fileName =  $global_config['site_localpath']."uploads/expenses/".trim($id_expensive_fileName);

	
		$strInsertArray = array(
								array("date_incurred",	$objarray['date_incurred']),
								array("description",	nl2br($objarray['description'])),
								array("payment_method",	$objarray['payment_method']),
								array("amount_excluding_vat",	$objarray['amount_excluding_vat']),
								array("vat",	$objarray['vat']),
								array("amount_including_vat",	$objarray['amount_including_vat']),
								//array("expanes_attachements",	$id_expensive_fileName),																																								
								array("created_by",	$Admin_ID),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$created_date),
								array("modify_date", 	$update_date)								
							);
		$this->common_Insert(tbl_removals_management, $strInsertArray,'','',0);
	}
	
	
	/****************************************************************************************************************
	*	Function Name 	:  for add addExpenses page		*	
	*	Description 	:  for add addExpenses page		*
	*****************************************************************************************************************/
	function addExpenses($objarray)	{

		global $global_config, $objSmarty;
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");	
					

		$id_expensive_filetime  = strtotime(date("Y-m-d H:i:s"));
		$id_expensive_fileName  = $id_expensive_filetime."_".$_FILES['expanes_attachements']['name'];
		
		
		@move_uploaded_file($_FILES['expanes_attachements']['tmp_name'],  $global_config['site_localpath']."uploads/expenses/".$id_expensive_fileName);
		$id_expensive_fileName =  $global_config['site_localpath']."uploads/expenses/".trim($id_expensive_fileName);

/*echo '<pre>';
print_r($id_expensive_fileName);
exit;*/
	
		$strInsertArray = array(
								array("date_incurred",	$objarray['date_incurred']),
								array("description",	nl2br($objarray['description'])),
								array("payment_method",	$objarray['payment_method']),
								array("amount_excluding_vat",	$objarray['amount_excluding_vat']),
								array("vat",	$objarray['vat']),
								array("amount_including_vat",	$objarray['amount_including_vat']),
								array("expanes_attachements",	$id_expensive_fileName),																																								
								array("created_by",	$Admin_ID),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$created_date),
								array("modify_date", 	$update_date)								
							);
		$this->common_Insert(tbl_expenses, $strInsertArray,'','',0);
	}
	
	
	/****************************************************************************************************************
	*	Function Name 	:  for add addNotes customer page		*	
	*	Description 	:  for add addNotes customer page		*
	*****************************************************************************************************************/
	function addNotes($objarray)	{
		global $global_config, $objSmarty;

		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$strInsertArray = array(
								array("customer_id",	$objarray['customer_id']),
								array("customer_notes",	nl2br($objarray['customer_notes'])),
								array("created_by",	$Admin_ID),
								array("modified_by",	''),
								array("create_date", 	$created_date),
								array("update_date", 	$update_date)								
							);
		$this->common_Insert(tbl_notes, $strInsertArray,'','',0);
	}
	
	/****************************************************************************************************************
	*	Function Name : getcontainerCategoryTypelist for Edit customer page			*	
	*	Description :  getcontainerCategoryTypelist for Edit customer page			*
	*****************************************************************************************************************/
	function getcontainerTypelistEditCustomer($containerCategoryType)	{
		global $global_config, $objSmarty;

		//echo $containerCate = "SELECT * FROM tbl_container WHERE container_category='".trim($containerCategoryType)."'";
		$containerCate1 = "SELECT * FROM tbl_container WHERE container_category='".trim($containerCategoryType)."' and status='Occupied'";
		return $containerCateDetailsNew = $this->SelectQryDirect($containerCate1,0);
		/*if(is_array($containerCateDetails)){
			$optioin_value = '';
			$optioin_value .='<option value="0">Select Container Number</option>'; 
				foreach ($containerCateDetails as $key => $value) {
					// $optioin_value .='<option value="'.$value["id"].'">'.$value["id"].' - '.$value["name"].'</option>'; 
					 $optioin_value .='<option value="'.$value["id"].'">'.$value["name"].'</option>'; 
				}
		}	  */
	}

	/****************************************************************************************************************
	*	Function Name : getcontainerCategoryTypelist								*	
	*	Description : Getting the getcontainerCategoryTypelist details				*
	*****************************************************************************************************************/
	function getcontainerCategoryTypelist($containerCategoryType)	{
		global $global_config, $objSmarty;

		//echo $containerCate = "SELECT * FROM tbl_container WHERE container_category='".trim($containerCategoryType)."'";
		$containerCate = "SELECT * FROM tbl_container WHERE container_category='".trim($containerCategoryType)."' and status='Available'";
		$containerCateDetails = $this->SelectQryDirect($containerCate,0);
		if(is_array($containerCateDetails)){
			$optioin_value = '';
			$optioin_value .='<option value="0">Select Container Number</option>'; 
				foreach ($containerCateDetails as $key => $value) {
					// $optioin_value .='<option value="'.$value["id"].'">'.$value["id"].' - '.$value["name"].'</option>'; 
					 $optioin_value .='<option value="'.$value["id"].'">'.$value["name"].'</option>'; 
				}
		}	  

		$containerCatePrice = "SELECT * FROM  tbl_container_prices WHERE container_category='".trim($containerCategoryType)."'";
		$containerCatePriceDetails = $this->SelectQryDirect($containerCatePrice,0);
			//echo '<pre>';
			//print_r($containerCatePriceDetails);
		if(is_array($containerCatePriceDetails)){
				$deposit_amount ='';
				$licence_amount_vat ='';
								
				foreach ($containerCatePriceDetails as $key => $value) {
						//echo 'deposit_amount =>'. $deposit_amount 	= $containerCatePriceDetails[$key]["deposit_amount"];
						//echo 'licence_amount_vat =>'. $licence_amount_vat = $containerCatePriceDetails[$key]["licence_amount_vat"];
						$deposit_amount 		= $containerCatePriceDetails[$key]["deposit_amount"];
						$licence_amount_vat		= $containerCatePriceDetails[$key]["licence_amount_vat"];
						
				}
		}	

		$data = array();
		$data['optioin_value'] = $optioin_value;
		$data['deposit_amount'] = $deposit_amount;
		$data['licence_amount_vat'] = $licence_amount_vat;						
		//$data['licence_amount'] = $licence_amount;
		//$data['vat_amount'] = $vat_amount;
		
		//$data['fruits'] = array('apple','banana','cherry');
		//$data['animals'] = array('dog', 'elephant');
		echo json_encode($data);
		/*$data = array();
		$data = array('dog'=>$optioin_value, 'elephant'=>'dancedr');
		//$data['animals'] = array('dog', 'elephant');
		echo json_encode($data);*/
		//return json_encode("optionvalue" => $optioin_value, "myval" => "test");
		exit;
	}


	/****************************************************************************************************************
	*	Function Name : checkcheckEmail								*	
	*	Description : Getting the checkcheckEmail details				*
	*****************************************************************************************************************/
	function checkcheckEmail($objarray)	{
		global $global_config, $objSmarty;

		$TemplateEdit = "SELECT first_name FROM tbl_users WHERE email='".trim($objarray['useremail'])."'";
		$TemplateEditDetails = $this->SelectQryDirect($TemplateEdit,0);
		//echo 'My Count'. $countResEmail = count($TemplateEditDetails);
		$first_name = $TemplateEditDetails[0]['first_name'];		
		//echo '<br>';		
		if($first_name !=''){
			echo 'exits';
		}else{
			echo 'not-exits';
		}	
	}
	
	
	/****************************************************************************************************************
	*	Function Name : UpdateContainerPricesListDetails					*	
	*	Description : Updating the UpdateContainerPricesListDetails details				*
	*****************************************************************************************************************/
	function UpdateContainerPricesListDetails($objArray) {
		global $objSmarty, $global_config;

		/*echo '<pre>';
		print_r($objArray);*/
		
		$strTable = tbl_container_prices;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		//$created_date 		= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$strUpdateArray = array(
								array("container_category",	$objArray['category_name']),
								array("deposit_amount", 	$objArray['deposit_amount']),
								array("licence_amount",	$objArray['licence_amount']),
								array("vat_amount",	$objArray['vat_amount']),
								array("licence_amount_vat", 	$objArray['licence_amount_vat']),
								array("created_by",	$Admin_ID),
								array("update_date", 	$update_date)								
							);					
	
		if($objArray['id'] > 0) {
			$strWhereClause	= "id = '".$objArray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdateTemplateDetails					*	
	*	Description : Updating the template details				*
	*****************************************************************************************************************/
	function UpdateTemplateDetails($objArray) {
		global $objSmarty, $global_config;

		$strTable = tbl_template;
		$strUpdateArray = array(

								array("title",		 		$objArray['txt_title']),
								array("send_grid_email", 	$objArray['txt_tempid']),
								array("schedule_hour", 		$objArray['schedule1']),
								array("schedule_format", 	$objArray['schedule2']),
								array("trigger_id", 	$objArray['triggerid']),
								array("trigger_name", 	$objArray['triggername']),
								array("status", 	$objArray['txt_status']),
							);

		if($objArray['template_id'] > 0) {
			$strWhereClause	= "template_id = '".$objArray['template_id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}


	/****************************************************************************************************************
	*	Function Name : deleteNotes								*	
	*	Description : Deleting the deleteNotes details							*
	*****************************************************************************************************************/
	function DeleteNotesDetailsDB($Notes_id) {
		global $objSmarty, $global_config;
		//$Notes_id = $_REQUEST['id'];
		$strDelDetails = "DELETE FROM tbl_notes WHERE id ='".$Notes_id."'";
		$this->DirectSQLDelete($strDelDetails, 0);

	}
	
	/****************************************************************************************************************
	*	Function Name : DeletecustomerDetails								*	
	*	Description : DeletecustomerDetails the  details							*
	*****************************************************************************************************************/
	function DeletecustomerDetailsDB($customer_id) {
		global $objSmarty, $global_config;
		//$Notes_id = $_REQUEST['id'];
		$strDelDetails = "DELETE FROM tbl_customer WHERE id ='".$customer_id."'";
		$this->DirectSQLDelete($strDelDetails, 0);

	}

	/****************************************************************************************************************
	*	Function Name : DeleteTemplateDetails								*	
	*	Description : Deleting the template details							*
	*****************************************************************************************************************/
	function DeleteTemplateDetails($template_id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_template WHERE template_id ='".$template_id."'";
		$this->DirectSQLDelete($strDelDetails, 0);

	}

	
	/****************************************************************************************************************
	*	Function Name : addContainerPrices								*	
	*	Description : Adding the addContainerPrices details				*
	*****************************************************************************************************************/
	function AssignContainer($objarray) {
		global $objSmarty, $global_config;
		
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		//echo '<pre>';
		//print_r($objarray);
		//$number_of_container = count($objarray['container_name']);
		
		
		$status = 'Occupied';
		$customer_id = $objarray['customer_id'];
		if($customer_id){
			
			$number_of_container = count($objarray['container_name']);
			
				if($number_of_container !=''){
						 for ($n = 0; $n < $number_of_container; $n++) {
							//container_name start
							$container_name_val 	= $objarray['container_name'][$n];
							$container_number_val 	= $objarray['container_number'][$n];
							$contract_start_date	= $objarray['contract_start_date'][$n];
							
							$licence_vat_amount		= $objarray['licence_vat_amount'][$n];
							$deposit_amount_val		= $objarray['deposit_amount'][$n];
							$miscellaneous			= $objarray['miscellaneous'][$n];
							$total_payment_due		= $objarray['total_payment_due'][$n];																																				
							
							if($container_name_val == '10ft'){
								$container_name_val = '10ft';
							}
							if($container_name_val == '20ft'){
								$container_name_val = '20ft';									
							}
							if($container_name_val == '40ft'){
								$container_name_val = '40ft';									
							}
							//container_name end
							
							########################### Update Container Status #########################################
							$strTable = tbl_container;
							$strUpdateArray = array(
								array("status", $status)
							);
							
							$strWhereClause	= "id = '".$container_number_val."'";
							$update = $this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
							############################ Update Container Status #########################################
							
							
							$strInserCutomerContainertArray = array(
									array("customer_id", 	$customer_id),
									array("container_type", 	$container_name_val),
									array("container_number", 	$container_number_val),
									array("contract_start_date", 	$contract_start_date),
									array("contract_next_due_date", $contract_start_date),									
									array("licence_amount_vat", 	$licence_vat_amount),								
									array("deposit_amount", 	$deposit_amount_val),
									array("miscellaneous", 	$miscellaneous),
									array("total_payment_due", 	$total_payment_due),									
									array("customer_signature", 	''),								
									array("employee_signature", 	''),
										//array("customer_signature", 	$signature_customer_val),								
										//array("employee_signature", 	$signature_employee_val),
									array("created_by", 	$Admin_ID),
									array("modified_by", 	$Admin_ID),
									array("status", 	$status),								
									array("create_date", 	$created_date),
									array("modify_date", 	$update_date)
								);
							$this->common_Insert(tbl_customer_container, $strInserCutomerContainertArray,'','',0);
							
						}	
					}
		}
		
		/*$strInsertArray = array(
								array("container_category",	$objarray['category_name']),
								array("deposit_amount", 	$objarray['deposit_amount']),
								array("licence_amount",	$objarray['licence_amount']),
								array("vat_amount",	$objarray['vat_amount']),
								array("licence_amount_vat", 	$objarray['licence_amount_vat']),
								array("created_by",	$Admin_ID),
								array("create_date", 	$created_date),
								array("update_date", 	$update_date)								
							);
		$this->common_Insert(tbl_container_prices, $strInsertArray,'','',0);*/
	}
	
	
	/****************************************************************************************************************
	*	Function Name : DeAssignContainer								*	
	*	Description : Adding the DeAssignContainer details				*
	*****************************************************************************************************************/
	function DeAssignContainer($objarray) {
		global $objSmarty, $global_config;
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$selected_month_paid = 'N/A';
		$status = 'Available';
		$customer_id = $objarray['customer_id'];
		if($customer_id){
			
			$number_of_container = count($objarray['container_type']);
			
				if($number_of_container !=''){
						 for ($n = 0; $n < $number_of_container; $n++) {
							//container_name start
							$container_name_val 	= $objarray['container_type'][$n];
							$container_number_val 	= $objarray['container_number'][$n];
							$contract_start_date	= $objarray['contract_start_date'][$n];
							
							########################### Update Container Status #########################################
							$licence_vat_amount		= $objarray['licence_amount_vat_sum_without_symbol'][$n];
							$deposit_amount_val		= $objarray['deposit_amount_sum'][$n];
							$miscellaneous			= $objarray['miscellaneous_sum'][$n];
							$total_payment_due		= $objarray['total_amount_due_lmdp_without_symbol'][$n];																																				
							########################### Update Container Status #########################################
							
							if($container_name_val == '10ft'){
								$container_name_val = '10ft';
							}
							if($container_name_val == '20ft'){
								$container_name_val = '20ft';									
							}
							if($container_name_val == '40ft'){
								$container_name_val = '40ft';									
							}
							//container_name end
							
							########################### Update Container Status #########################################
							//$strTable = tbl_container;
							$strUpdateArray = array(
								array("status", $status)
							);
							
							$strWhereClause	= "id = '".$container_number_val."'";
							$update = $this->common_Update_Set1(tbl_container, $strUpdateArray, $strWhereClause,0);
							############################ Update Container Status #########################################
							
							
							$strUpdateArray_New = array(
									//array("customer_id", 	$customer_id),
									array("container_type", 	$container_name_val),
									array("container_number", 	$container_number_val),
									array("status", 	$status),								
									array("modify_date", 	$update_date)
								);
							
							$strWhereClause_new	= "customer_id = '".$customer_id."' and container_type 	= '".$container_name_val."' and container_number = '".$container_number_val."' ";	
							$update1 = $this->common_Update_Set1(tbl_customer_container, $strUpdateArray_New, $strWhereClause_new,0);	
							//$this->common_Insert(tbl_customer_container, $strInserCutomerContainertArray,'','',0);
							
							$strInsertPaymentHistoryArray = array(
								array("customer_id", 	$objarray['customer_id']),
								array("created_by", 	$Admin_ID),									
								array("container_type", 	$objarray['container_type'][$n]),
								array("container_number", 	$objarray['container_number'][$n]),
								array("due_date", 	$objarray['contract_next_due_date'][$n]),									
									//array("related_period", 	$objarray['related_date'][$n]),								
								array("related_period", 	'N/A'),								
								array("date_paid", 	$created_date),
								array("license", 	$objarray['licence_amount_vat_sum_without_symbol'][$n]),
								array("deposit", 	$objarray['deposit_amount_sum'][$n]),									
								array("miscellaneous", 	$objarray['miscellaneous_sum'][$n]),								
								array("penality", 	$objarray['penality_sum'][$n]),
								array("total_amount_due", 	$objarray['total_amount_due_lmdp_without_symbol'][$n]),									
								array("payment_type", 	$objarray['payment_method']),		
								array("total_month_paid", 	$selected_month_paid),																																		
								array("create_date", 	$created_date)
							);
						//echo '<pre>';
						//print_r($strInsertPaymentHistoryArray);
						$this->common_Insert(tbl_payment_history, $strInsertPaymentHistoryArray,'','',0);
							
							
						}	
					}
			}
	}
	
	
	/****************************************************************************************************************
	*	Function Name : addContainerPrices								*	
	*	Description : Adding the addContainerPrices details				*
	*****************************************************************************************************************/
	function addContainerPrices($objarray) {
		global $objSmarty, $global_config;
		
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$strInsertArray = array(
								array("container_category",	$objarray['category_name']),
								array("deposit_amount", 	$objarray['deposit_amount']),
								array("licence_amount",	$objarray['licence_amount']),
								array("vat_amount",	$objarray['vat_amount']),
								array("licence_amount_vat", 	$objarray['licence_amount_vat']),
								array("created_by",	$Admin_ID),
								array("create_date", 	$created_date),
								array("update_date", 	$update_date)								
							);
		$this->common_Insert(tbl_container_prices, $strInsertArray,'','',0);
	}
	
	/****************************************************************************************************************
	*	Function Name : addSettings								*	
	*	Description : Adding the settings details				*
	*****************************************************************************************************************/
	function addSettings($objarray) {
		global $objSmarty, $global_config;
		
		$strInsertArray = array(
								array("field",	$objarray['txt_field']),
								array("value", 	$objarray['txt_value']),
							);
		$this->common_Insert(tbl_settings, $strInsertArray,'','',0);
	}
	
	/****************************************************************************************************************
	*	Function Name : totalMonthDueDateCalculation								*	
	*	Description : Adding the Customer totalMonthDueDateCalculation details				*
	*****************************************************************************************************************/
	function totalMonthDueDateCalculation($objarray) {
		global $objSmarty, $global_config;
		
		$monthval = $objarray['monthval'];
		$next_due_date = $objarray['next_due_date'];

		if($monthval !='' && $monthval > 1){
				$total_month_multiply_val = 30 * $monthval;
				$After_Payment_Next_due_date = date('d/m/Y ', strtotime(str_replace("/", '-', $next_due_date) . " +".$total_month_multiply_val." days"));
				echo $next_due_date .' - ' . $After_Payment_Next_due_date;
		}else{
				$monthval = 1;
				$total_month_multiply_val = 30 * $monthval;
				$After_Payment_Next_due_date = date('d/m/Y ', strtotime(str_replace("/", '-', $next_due_date) . " +".$total_month_multiply_val." days"));
				echo $next_due_date .' - ' . $After_Payment_Next_due_date;
		}	
	}	
	
	/****************************************************************************************************************
	*	Function Name : addPaymentProcess								*	
	*	Description : Adding the Customer addPaymentProcess details				*
	*****************************************************************************************************************/
	function addPaymentProcess($objarray) {
		global $objSmarty, $global_config;
		
		/*echo '<pre>';
		print_r($objarray);
		exit;*/
		
		$number_of_container = count($objarray['container_number']);
		$selected_month_paid = $objarray['total_month'];
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		//$created_date = date("d/m/y H:i:s");
		
		$created_date 			= date("Y-m-d H:i:s");
		$modify_date 			= date("Y-m-d H:i:s");
		
			if($number_of_container !=''){

			 	for ($n = 0; $n < $number_of_container; $n++) {	
					$total_month_multiply_val = 30 * $objarray['total_month'];
					$After_Payment_Next_due_date = date('d/m/Y ', strtotime(str_replace("/", '-', $objarray['contract_next_due_date'][$n]) . " +".$total_month_multiply_val." days"));
					$penality_amount_customer_container = '0';
					$miscellaneous_amount_customer_container = '0';
					
					########################### Update Container Status #########################################
					$strTable =  tbl_customer_container;
					$strUpdateArray = array(
						//array("contract_start_date", $After_Payment_Next_due_date),					
						array("contract_next_due_date", $After_Payment_Next_due_date),
						array("deposit_amount", $penality_amount_customer_container),
						array("miscellaneous", $miscellaneous_amount_customer_container),						
						array("modify_date", $modify_date)
					);
					
					$strWhereClause	= "customer_id = '".$objarray['customer_id']."' and  container_number='".$objarray['container_number'][$n]."' ";
					$update = $this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
					############################ Update Container Status #########################################
					
					
				
				
					$strInsertPaymentHistoryArray = array(
						array("customer_id", 	$objarray['customer_id']),
						array("created_by", 	$Admin_ID),									
						array("container_type", 	$objarray['container_type'][$n]),
						array("container_number", 	$objarray['container_number'][$n]),
						array("due_date", 	$objarray['contract_next_due_date'][$n]),									
						array("related_period", 	$objarray['related_date'][$n]),								
						array("date_paid", 	$created_date),
						array("license", 	$objarray['licence_amount_vat_sum'][$n]),
						array("deposit", 	$objarray['deposit_amount_sum'][$n]),									
						array("miscellaneous", 	$objarray['miscellaneous_sum'][$n]),								
						array("penality", 	$objarray['penality_sum'][$n]),
						array("total_amount_due", 	$objarray['container_payment_total'][$n]),									
						array("payment_type", 	$objarray['payment_method']),															
						array("total_month_paid", 	$selected_month_paid),																					
						array("create_date", 	$created_date)
					);
						//echo '<pre>';
						//print_r($strInsertPaymentHistoryArray);
						$this->common_Insert(tbl_payment_history, $strInsertPaymentHistoryArray,'','',0);
				}
			}					
		//exit;
	}
	
	//UpdatecustomerDetails
	/****************************************************************************************************************
	*	Function Name : addCustomer								*	
	*	Description : Adding the Customer details				*
	*****************************************************************************************************************/
	function addCustomer($objarray) {
		global $objSmarty, $global_config;
		//require_once('html2pdf/html2pdf.class.php');
		require_once($global_config['site_localpath']."dompdf/dompdf_config.inc.php");
			//require_once("dompdf/dompdf_config.inc.php");
		require_once ($global_config['site_localpath'].'signature-to-image.php');
		
		@$signature_image1 = $objarray['output'];
		@$signature_image2 = $objarray['output-2'];		
		
		@$signature_customer = sigJsonToImage($signature_image1,array('imageSize'=>array(198, 75)));
		@$signature_employee = sigJsonToImage($signature_image2,array('imageSize'=>array(198, 75)));		
		
		imagepng($signature_customer, $global_config['site_localpath']."uploads/digitalsignatures/signature_customer_".date('m_dY_H_i_s').".png");
		imagepng($signature_employee, $global_config['site_localpath']."uploads/digitalsignatures/signature_employee_".date('m_dY_H_i_s').".png");		
		$signature_customer_val = "signature_customer_".date('m_dY_H_i_s').".png";
		$signature_employee_val = "signature_employee_".date('m_dY_H_i_s').".png";		

		$container_name 		= $objarray['container_name'];
		$contract_start_date 	= $objarray['contract_start_date'];
		$first_name		 		= $objarray['first_name'];
		$sur_name		 		= $objarray['sur_name'];
		$address_line1		 	= $objarray['address_line1'];
		$address_line2 			= $objarray['address_line2'];
		$address_line3 			= $objarray['address_line3'];
		$postcode 				= $objarray['postcode'];
		$mobile_number 			= $objarray['mobile_number'];
		$telephone_number		= $objarray['telephone_number'];
		$author_user_name	 	= $objarray['author_user_name'];
		$author_user_mobile		= $objarray['author_user_mobile'];
		$digital_signature		= $objarray['digital_signature'];		
		$addrss_proof			= $_FILES['addrss_proof']['name'];				
		$addrss_id				= $_FILES['addrss_id']['name'];				
		$Admin_ID				= $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");		
		
		$addrss_proof_filetime  = strtotime(date("Y-m-d H:i:s"));
		$addrss_proof_fileName  = $addrss_proof_filetime."_".$_FILES['addrss_proof']['name'];
		@move_uploaded_file($_FILES['addrss_proof']['tmp_name'],  $global_config['site_localpath']."uploads/address_proof/".$addrss_proof_fileName);
		$addrss_proof_fileName =  $global_config['site_localpath']."uploads/address_proof/".trim($addrss_proof_fileName);
		
		$id_proof_filetime  = strtotime(date("Y-m-d H:i:s"));
		$id_proof_fileName  = $id_proof_filetime."_".$_FILES['addrss_id']['name'];
		@move_uploaded_file($_FILES['addrss_id']['tmp_name'],  $global_config['site_localpath']."uploads/id_proof/".$id_proof_fileName);
		$id_proof_fileName =  $global_config['site_localpath']."uploads/id_proof/".trim($id_proof_fileName);
				
		
		if(isset($objarray['options'])){
			if($objarray['options'] =='passport'){
				$id_proof_type = 'passport';
			}else{
				$id_proof_type = 'driving';
			}
		}
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$status = 'Occupied';
		$created_date = date("Y-m-d H:i:s");
		$update_date = date("Y-m-d H:i:s");

		if(isset($objarray['invoice_address'])){
			$invoice_address_line1		 	= $objarray['invoice_address_line1'];
			$invoice_address_line2 			= $objarray['invoice_address_line2'];
			$invoice_address_line3 			= $objarray['invoice_address_line3'];
			$invoice_postcode 				= $objarray['invoice_postcode'];
		
			$strInsertArray = array(
							array("first_name", 	$first_name),
							array("sur_name", 	$sur_name),
							array("address1", 	$address_line1),
							array("address2", 	$address_line2),								
							array("address3", 	$address_line3),															
							array("post_code", 	$postcode),
							
							array("invoice_status", 	'yes'),
							
							array("invoice_address_line1", 	$invoice_address_line1),
							array("invoice_address_line2", 	$invoice_address_line2),								
							array("invoice_address_line3", 	$invoice_address_line3),															
							array("invoice_postcode", 	$invoice_postcode),
														
							array("mobile_number", 	$mobile_number),	
							array("phone_number", 	$telephone_number),								
														
							array("address_proof", 	$addrss_proof_fileName),
							array("id_proof", 	$id_proof_fileName),
							array("id_proof_type", 	$id_proof_type),								
							array("created_by", 	$Admin_ID),								
							array("modified_by", 	$Admin_ID),
							array("status", 	$status),								
							array("create_date", 	$created_date),
							array("update_date", 	$update_date)
						);
		}else{
			
						$strInsertArray = array(
							array("first_name", 	$first_name),
							array("sur_name", 	$sur_name),
							array("address1", 	$address_line1),
							array("address2", 	$address_line2),								
							array("address3", 	$address_line3),									
							array("post_code", 	$postcode),
							array("invoice_status", 	'no'),
							
							array("invoice_address_line1", 	$address_line1),
							array("invoice_address_line2", 	$address_line2),								
							array("invoice_address_line3", 	$address_line3),															
							array("invoice_postcode", 	$postcode),
							
							array("mobile_number", 	$mobile_number),
							array("phone_number", 	$telephone_number),									
							array("address_proof", 	$addrss_proof_fileName),
							array("id_proof", 	$id_proof_fileName),
							array("id_proof_type", 	$id_proof_type),								
							array("created_by", 	$Admin_ID),								
							array("modified_by", 	$Admin_ID),
							array("status", 	$status),								
							array("create_date", 	$created_date),
							array("update_date", 	$update_date)
						);
		}				
						
		$this->common_Insert(tbl_customer, $strInsertArray,'','',0);
	
	
		
		$Last_insert_customer_id = $this->strInsertedId;
		
		if($Last_insert_customer_id !=''){
			$number_of_container = count($objarray['container_name']);
			
				if($number_of_container !=''){
						 for ($n = 0; $n < $number_of_container; $n++) {
							//container_name start
							$container_name_val 	= $objarray['container_name'][$n];
							$container_number_val 	= $objarray['container_number'][$n];
							$contract_start_date	= $objarray['contract_start_date'][$n];
							
							$licence_vat_amount		= $objarray['licence_vat_amount'][$n];
							$deposit_amount_val		= $objarray['deposit_amount'][$n];
							$miscellaneous			= $objarray['miscellaneous'][$n];
							$total_payment_due		= $objarray['total_payment_due'][$n];																																				
							
							if($container_name_val == '10ft'){
								$container_name_val = '10ft';
							}
							if($container_name_val == '20ft'){
								$container_name_val = '20ft';									
							}
							if($container_name_val == '40ft'){
								$container_name_val = '40ft';									
							}
							//container_name end
														
							//author_user_name start
							$author_user_name	= $objarray['author_user_name'][$n];
							$author_user_mobile = $objarray['author_user_mobile'][$n];
							//author_user_name end
							
							########################### Update Container Status #########################################
							$strTable = tbl_container;
							$strUpdateArray = array(
								array("status", $status)
							);
							
							$strWhereClause	= "id = '".$container_number_val."'";
							$update = $this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
							############################ Update Container Status #########################################
							
							
							$strInserCutomerContainertArray = array(
									array("customer_id", 	$Last_insert_customer_id),
									array("container_type", 	$container_name_val),
									array("container_number", 	$container_number_val),
									array("contract_start_date", 	$contract_start_date),	
									array("contract_next_due_date", $contract_start_date),											
									array("licence_amount_vat", 	$licence_vat_amount),								
									array("deposit_amount", 	$deposit_amount_val),
									array("miscellaneous", 	$miscellaneous),
									array("total_payment_due", 	$total_payment_due),									
									array("customer_signature", 	$signature_customer_val),								
									array("employee_signature", 	$signature_employee_val),
									array("created_by", 	$Admin_ID),
									array("modified_by", 	$Admin_ID),
									array("status", 	$status),								
									array("create_date", 	$created_date),
									array("modify_date", 	$update_date)
								);
							$this->common_Insert(tbl_customer_container, $strInserCutomerContainertArray,'','',0);
							
						}	
					}
					
			// Author insert section start
			$number_of_author = count($objarray['author_user_name']);	
			if($number_of_author !=''){
						 for ($m = 0; $m < $number_of_author; $m++) {
														
							//author_user_name start
							$author_user_name	= $objarray['author_user_name'][$m];
							$author_user_mobile = $objarray['author_user_mobile'][$m];
							//author_user_name end
							
							$strInserCutomerAuthorArray = array(
									array("customer_id", 	$Last_insert_customer_id),
									array("authorized_user_name", 	$author_user_name),
									array("authorized_user_mobile_number", 	$author_user_mobile),
									array("create_date", 	$created_date),
								);
							$this->common_Insert(tbl_authorised_users, $strInserCutomerAuthorArray,'','',0);
							
						}	
					}
			}

		
		$get_authuser_qry = "SELECT *  FROM tbl_authorised_users where customer_id='".$Last_insert_customer_id."'";
		$Final_Auth_user = $this->SelectQryDirect($get_authuser_qry);
		

		/*echo '<pre>';
		print_r($Final_Auth_user);*/
		
		$Final_Auth_user_name1 = '-';
		$Final_Auth_mobile_name1 = '-';
		$Final_Auth_user_name2 = '-';
		$Final_Auth_mobile_name2 = '-';
								
		if(is_array($Final_Auth_user)) {		
		
				$Final_Auth_user_count = count($Final_Auth_user);
				if($Final_Auth_user_count > 2){
					$Final_Auth_user_name1 	= $Final_Auth_user[0]['authorized_user_name'];
					$Final_Auth_mobile_name1 = $Final_Auth_user[0]['authorized_user_mobile_number'];					

					$Final_Auth_user_name2 	= $Final_Auth_user[1]['authorized_user_name'];
					$Final_Auth_mobile_name2 = $Final_Auth_user[1]['authorized_user_mobile_number'];					
				}else if($Final_Auth_user_count ==1) {
					$Final_Auth_user_name1 	= $Final_Auth_user[0]['authorized_user_name'];
					$Final_Auth_mobile_name1 = $Final_Auth_user[0]['authorized_user_mobile_number'];					
				}	
				
		}	
		

		//exit;

		$get_cusdet_qry = "SELECT a.*, b.*  FROM tbl_customer as a JOIN  tbl_customer_container as b  ON a.id = b.customer_id where a.id='".$Last_insert_customer_id."'";
		$Final_CustblCus_Container = $this->SelectQryDirect($get_cusdet_qry);
		if(is_array($Final_CustblCus_Container)) {
			//echo '<pre>';
			//print_r($Final_CustblCus_Container);
			//return $get_userdet_res;

			$customer_id_db = $Final_CustblCus_Container[0]['customer_id'];									
						
			$first_name_db = $Final_CustblCus_Container[0]['first_name'];
			$sur_name_db = $Final_CustblCus_Container[0]['sur_name'];
			$address1_db = $Final_CustblCus_Container[0]['address1'];
			$address2_db = $Final_CustblCus_Container[0]['address2'];
			$post_code_db = $Final_CustblCus_Container[0]['post_code'];
			$mobile_number_db = $Final_CustblCus_Container[0]['mobile_number'];
			$address_proof_db = $Final_CustblCus_Container[0]['address_proof'];																		
			
			$id_proof_db = $Final_CustblCus_Container[0]['id_proof'];
			$id_proof_type_db = $Final_CustblCus_Container[0]['id_proof_type'];
			$created_by_db = $Final_CustblCus_Container[0]['created_by'];
			$modified_by_db = $Final_CustblCus_Container[0]['modified_by'];
			$status_db = $Final_CustblCus_Container[0]['status'];
			$create_date_db = $Final_CustblCus_Container[0]['create_date'];
			$update_date_db = $Final_CustblCus_Container[0]['update_date'];
			
			
			$container_type_db = $Final_CustblCus_Container[0]['container_type'];
			$container_number_db = $Final_CustblCus_Container[0]['container_number'];
			$contract_start_date_db = $Final_CustblCus_Container[0]['contract_start_date'];			
			$licence_amount_vat_db = $Final_CustblCus_Container[0]['licence_amount_vat'];
			
			$deposit_amount_db = $Final_CustblCus_Container[0]['deposit_amount'];
			$miscellaneous_db = $Final_CustblCus_Container[0]['miscellaneous'];
			$total_payment_due_db = $Final_CustblCus_Container[0]['total_payment_due'];
			$authorized_user_name_db = $Final_CustblCus_Container[0]['authorized_user_name'];
			$authorized_user_mobile_number_db = $Final_CustblCus_Container[0]['authorized_user_mobile_number'];
			$customer_signature_db = $Final_CustblCus_Container[0]['customer_signature'];
			$employee_signature_db = $Final_CustblCus_Container[0]['employee_signature'];

		}
		
		//signature data
		$signature_date = date("d/m/Y");
		
		$get_container_name_qry_new = "SELECT name FROM tbl_container where id='".$container_number_db."'";
		$Res_get_container_name_new = $this->SelectQryDirect($get_container_name_qry_new);		
		
		// Get the container name 
		$containerName_new = $Res_get_container_name_new[0]['name'];
		if($containerName_new !=''){	
			$containerName_new = $containerName_new;
		}else{
			$containerName_new = '-';
		}


		if($customer_signature_db){
			$customer_signature_img = '<img width="130" border="0" class="w180" src="'.$global_config['site_globalpath'].'uploads/digitalsignatures/'.$customer_signature_db.'" label="Image">';
		}else{
			$employee_signature_db_img = '';
		}
		if($employee_signature_db){
			$employee_signature_db_img = '<img width="130" border="0" class="w180" src="'.$global_config['site_globalpath'].'uploads/digitalsignatures/'.$employee_signature_db.'" label="Image">';
		}else{
			$employee_signature_db_img = '';
		}	
		
		// <img width="30" border="0" class="w180" src="'.$global_config['site_globalpath'].'uploads/digitalsignatures/green_check.png" label="Image" editable="true">
		
		$terms_content ='';
		/*********************************************************************/
		$terms_content ='<p style="margin-bottom:8px; margin-top:10px;">The Licensee hereby warrants that he/she is the owner of the goods in the Unit(s), or that in the event that the Licensee is not the owner warrants hereby that he has the owners full authority to enter into this Licence with Meadow Self Storage Ltd, and each and every term hereof.</p>
                <h3>Change of Address / Contact Details:</h3>
                <p>You must advise Meadow Self Storage Ltd promptly if you have a change of address or telephone number.</p>
                <h3>Late Payment Charges:</h3>
                <p>If you do not pay the Licence fees on the Due Date, you will immediately become liable to pay a late payment charge of HO each one week period ( or any part of it) that the Licence Fees remain unpaid after the Due Date.</p>
                <h3>Dishonoured Cheque / Direct Debit Payments:</h3>
                <p>We will make a further minimum charge of £30 on each occasion that your cheque or direct debit is returned.</p>
                <h3>Non -Payment of Licence Fees:</h3>
                <p>It is your responsibility to ensure that your rent payment is received by us on or before the due date.</p>
                <p>If you do not pay the Licence Fees on the Due Date, we may exclude you from the Site and from the Unit(s) and we may break the lock on the unit and install a new lock.</p>
                <div>IF YOU REMAIN IN DEFAULT OF THE STORAGE CHARGE FOR 2 MONTHS, WE WILL TAKE STEPS TO RECOVER OUR COSTS AND DISPOSE OF YOUR GOODS.</div>
                <p>You confirm that you are the owner of the items stored, or that ownership is vested in you for the purpose of entering into this agreement.</p>
                <p class"big">You understand and accept Meadow Self Storages right ultimately to sell or dispose of goods to recover any outstanding charges. Hereby authorise Meadow Self Storage Ltd to take any necessary steps required to recover their cost, and to dispose of my goods if I remain in default of the storage charge of 2 months.</p>';
				
		/*********************************************************************/		
		
		$proof_content ='';
		
		if($id_proof_type_db == 'passport'){
			$proof_content = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc; padding:5px;">
						<tr>
							<td colspan="2"><h2 style=" margin:0; font-weight:700; padding:0 0 0 2px;">Proof of Id</h2></td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 10px 5px;">
							 <img width="30" border="0" class="w180" src="http://server1.sitecare.org/container/images/green_check.png" label="Image" editable="true">
							</td>
							<td width="90%" style="padding:5px 10px 5px; font-size:11px;">Passport</td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 5px 3px;"><p style="border:1px solid #000;width:20px; height:20px;">
							<input type="checkbox" class="glyphicon glyphicon-star-empty" ></p></td>
							<td width="90%" style="padding:5px 4px 2px; font-size:11px;">Full UK Driving Licence</td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 4px 2px;"><p style="border:1px solid #000;width:20px; height:20px;">&nbsp;</p></td>
							<td width="90%" style="font-size:11px;">Utility Bill(Last 3 Month)</td>
						</tr>
						
					</table>';
		}else if($id_proof_type_db == 'driving'){
						$proof_content = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc; padding:5px;">
						<tr>
							<td colspan="2"><h2 style="margin:0; font-size:23px; padding:0 0 0 2px; font-weight:700;">Proof of Id</h2></td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 7px 5px;"><p style="border:1px solid #000;width:20px; height:20px;">&nbsp;
							</p></td>
							<td width="90%" style="padding:5px 7px 5px; font-size:16px;">Passport</td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 10px 5px;">
								 <img width="30" border="0" class="w180" src="http://server1.sitecare.org/container/images/green_check.png" label="Image" editable="true">
							</td>
							<td width="90%" style="padding:5px 10px 5px; font-size:16px;">Full UK Driving Licence</td>
						</tr>
			 			<tr>
							<td width="10%" style="padding:5px 7px 5px;"><p style="border:1px solid #000;width:20px; height:20px;">&nbsp;</p></td>
							<td width="90%" style="font-size:16px;">Utility Bill(Last 3 Month)</td>
						</tr>
						
					</table>';			
		}else {
						$proof_content = '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc; padding:5px;">
						<tr>
							<td colspan="2"><h2 style=" margin:0; font-size:23px; padding:0 0 0 2px; font-weight:700;">Proof of Id</h2></td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 10px 5px;"><p style="border:1px solid #000;width:20px; height:20px;">&nbsp;
							</p></td>
							<td width="90%" style="padding:5px 10px 5px; font-size:16px;">Passport</td>
						</tr>
						<tr>
							<td width="10%" style="padding:5px 10px 5px;"><p style="border:1px solid #000;width:20px; height:20px;">
							<input type="checkbox"></p></td>
							<td width="90%" style="padding:5px 10px 5px; font-size:16px;">Full UK Driving Licence</td>
						</tr>
						<tr>
							<td width="10%" ><p style="border:1px solid #000;width:20px; height:20px;">&nbsp;</p></td>
							<td width="90%" style="font-size:16px;">Utility Bill(Last 3 Month)</td>
						</tr>
						
					</table>';			
		}
		$dompdf = new DOMPDF();

	$html ='<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css">
<style>

body{padding:0; margin:0; font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#373737;}
h1, h2, h3, h4, h5, h6{font-family: "Open Sans", sans-serif;}

.total_right
{
    float: left;
    width: 360px;
	margin-bottom:-20px;
  
 }
.contaner_name1
{
    float: left;
    font-size: 18px;
	width:250px;
	margin-top:-15px;
	margin-left:140px;
 }
.topset { 
    line-height: 18px;
    border: 2px solid;
    font-size: 18px;   
}
.terms_condition p{
	margin-top:2px;
	margin-bottom:0px;
	padding-left:5px;
	font-size:12px; 
}
.terms_condition h3{
	font-size:14px; 
	margin-top:2px;
	margin-bottom:0px;
	padding-left:5px;
}
.terms_condition p.big{
	font-size:12px; 
	margin-top:2px;
	margin-bottom:0px;
	padding-left:5px;
}
.terms_condition div{
	font-size:12px; 
	margin-top:2px;
	float:left;
	font-weight:bold;
	width:100%;
	margin-bottom:0px;
	padding:5px;
	text-align:center;
	border:1px solid gray !important;
}
.sign1{
	font-size:12px; 
	margin-top:2px;
	float:left;
	width:100%;
}
.sign1 li{
	font-size:12px; 
	margin-top:2px;
	float:left;
	list-style:none;
	width:100%;
}
.sign1 li span{
	font-size:12px; 
	margin-top:2px;
	float:left;
	width:48%;
}
.sign2{
	font-size:12px; 
	margin-top:2px;
	float:left;
	width:100%;
}
.sign2 li{
	font-size:12px; 
	margin-top:2px;
	float:left;
	list-style:none;
	width:100%;
}
.sign2 li span{
	font-size:12px; 
	margin-top:2px;
	float:left;
	width:48%;
}
.sign1 li span:last-child{

}
.sign2 li span:last-child{

}
</style>
</head>
<body>
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
    	<tr>
   		  <td width="60%" align="left" valign="top">
          <h1 style="display:none; font-weight:800; color:#2960a5; text-transform:uppercase; margin:0;">Meadow Self storage</h1>
          <p style="display:none; font-weight:700; text-transform:uppercase; margin:0; padding:0;font-family: "Open Sans", sans-serif; color:#d1343d;">Containerised self storage</p>
          <p  style="display:none; font-weight:400; text-transform:capitalize; margin:0; padding:0;font-family: "Open Sans", sans-serif; color:#363435;">Hobson Street, Failsworth, manchester, M350JJ</p>       <p style="display:none; font-weight:400; text-transform:capitalize; margin:0; padding:0;font-family: "Open Sans", sans-serif; color:#363435;">T: 0161 682 6822</p>
          <h1 style="font-size:18px; margin-top:5px;">Licence Agreement</h1>
          </td>
          <td class="60%" align="right">
		  		     <div class="total_right">
					    <h1 class="contaner_name1">Container Number - <strong style="border: 2px solid; padding:10px; height:50px;">'.@$containerName_new.'</strong> </h1>
				   </div>
          </td>
    	</tr>
        <tr>
        	<td colspan="2">
      			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc;">
                  <tr>
						<td colspan="2"><h2 style=" margin:0; padding-left:10px;">Licence Details</h2></td>
                  </tr>
                  <tr>
                    <td width="70%" style="padding-right:5%; padding-left:15px;">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px 2px;">
                            <tr style="margin-top:7px;">
                            <td width="30%">Name of License:</td>
                            <td><p style="border-bottom:1px solid #ccc;">'.@$first_name_db.'</p></td>
                          </tr>
                          <tr style="margin-top:7px;">
                            <td width="30%">License Address:</td>
                            <td><p style="border-bottom:1px solid #666;">'.@$address1_db.'</p></td>
                          </tr>  <tr style="margin-top:7px;"> 
                            <td colspan="2"><p style="border-bottom:1px solid #666;">'.@$address2_db.'</p></td>
                          </tr>
                          <tr style="margin-top:7px;">
                          	<td colspan="2">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px 2px;">
                            <tr>
                            <td width="50%"><p style="border-bottom:1px solid #666;" >&nbsp;</p></td>
                            <td width="20%">Postcode &nbsp;</td>
                            <td><p style="border-bottom:1px solid #666;">'.@$post_code_db.'</p></td>
                          </tr>
                          </table>
                          </td>
                        </table>
                    </td>
                    <td width="45%">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px 5px;">
                          <tr>
                            <td width="50%">Contact start Date:</td>
                            <td><p style="border-bottom:1px solid #666;">'.@$contract_start_date_db.'</p></td>
                          </tr>
                          <tr>
                            <td width="50%">Invoice Address:</td>
                            <td><p style="border-bottom:1px solid #666;">'.@$address1_db.'</p></td>
                          </tr>
                          <tr>
                            <td colspan="2"><p style="border-bottom:1px solid #666;">'.@$address2_db.'</p></td>
                          </tr>
                          <tr>
                          	<td colspan="2">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding:0px 5px;">
                            <tr>
                            <td width="50%"><p style="border-bottom:1px solid #666;">&nbsp;</p></td>
                            <td width="80%">Postcode &nbsp;</td>
                            <td><p style="border-bottom:1px solid #666;">'.@$post_code_db.'</p></td>
                          </tr>
                          </table>
                          </td>
                        </table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:0 6px;">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="15%">Telephone No:</td>
                            <td style="padding-right:1%"><p style="border-bottom:1px solid #666;">-</p></td>
                            <td  width="10%">Mobile</td>
                            <td style="padding-right:1%"><p style="border-bottom:1px solid #666;">'.@$mobile_number_db.'</p></td>
                            <td  width="10%">Email</td>
                            <td><p style="border-bottom:1px solid #666;">-</p></td>
                          </tr>
                        </table>

                    </td>
                  </tr>
                </table>
    	
            </td>
        </tr>
        <tr>
        	<td colspan="2">&nbsp;</td>
        </tr>
        <tr>
        	<td colspan="2">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="32%" style="padding-right:1%" valign="top">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #666; padding:5px;">
                    	<tr>
                        	<td colspan="2"><h2 style="padding:0 0 5px 2px; margin:0;font-weight:700;">Payment Details</h2></td>
                        </tr>
                        <tr>
                       	<td style="width:30%" align="right" valign="bottom">
                            Licence Fee: &pound;<br/>
                            <span style="font-size:9px; padding-right:15px;">(/28days)</span>
                            </td>
                            <td style="width:50%" valign="top"><P style="border-bottom:1px solid #666;">'.@$licence_amount_vat_db.'</p></td>
                        </tr>
                        <tr>
                        	<td style="width:30%" align="right">Deposit: &pound;</td>
                            <td><P style="border-bottom:1px solid #666;">'.@$deposit_amount_db.'</p></td>
                        </tr>
                        <tr>
                        	<td style="width:30%" align="right">Miscellaneous: &pound;</td>
                            <td><P style="border-bottom:1px solid #666;">'.@$miscellaneous_db.'</p></td>
                        </tr>
                        <tr>
                        	<td style="width:30%" align="right">Total payment:  &pound;</td>
                            <td><P style="border-bottom:1px solid #666;">'.@$total_payment_due_db.'</p></td>
                        </tr>
                        
                    </table>
                </td>
                <td width="26%" style="padding-right:1%" valign="top">
                	'.$proof_content.'
                </td>
                <td width="40%" valign="top">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #666; padding:5px;">
                    	<tr>
                        	<td colspan="2">
                            <h2 style="padding-bottom:5px; padding-left:2px; margin:0; font-weight:700;">Authorised Users</h2>
                            <span style="font-size:8px; padding-left:2px;">Only these user will be allowed access to the Unit or Site</span>
                            </td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr>
                        	<td style="width:15%; font-size:11px; padding:0 0 0 2px;">1.&nbsp;&nbsp;Name:</td>
                            <td style="width:65%;padding:0;"><P style="border-bottom:1px solid #666; margin:5px 0;">'.@$Final_Auth_user_name1.'</p></td>
                        </tr>
                        <tr>
                        	<td style="width:15%; font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;Mobile:</td>
                            <td style="width:65%"><P style="border-bottom:1px solid #666;margin:5px 0;">'.@$Final_Auth_mobile_name1.'</p></td>
                        </tr>
                        <tr><td colspan="2">&nbsp;</td></tr>
                        <tr>
                        	<td style="width:15%; font-size:11px; padding:0 0 0 2px;">2.&nbsp;&nbsp;Name:</td>
                            <td style="width:65%;padding:0;"><P style="border-bottom:1px solid #666; margin:5px 0;">'.@$Final_Auth_user_name2.'</p></td>
                        </tr>
                        <tr>
                        	<td style="width:15%; font-size:11px;">&nbsp;&nbsp;&nbsp;&nbsp;Mobile:</td>
                            <td style="width:65%"><P style="border-bottom:1px solid #666; padding-bottom:5px;  margin:5px 0;">'.@$Final_Auth_mobile_name.'</p></td>
                        </tr>
                    </table>
                </td>
              </tr>
            </table>
            </td>
        </tr>
		
     
        <tr><td colspan="2">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc; padding:5px;">
            	<tr><td class="terms_condition">
                <h2 style="font-size:14px; margin-top:10px; margin-bottom:0px;">Terms & Conditions</h2>
               '.@$terms_content.'
                </td></tr>
            </table>
        </td></tr>
		
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ccc; padding:5px;">
	        	<tr><td colspan="2">
                	<h2 style="margin:5px;">Acceptance of Terms &amp; Conidtions</h2>
                    <p style="margin:5px;">I have read and under stood all the terms and conditions printed overleaf to which the licence is subject and my signature below indicates acceptance thereof</p>
                </td></tr>
                <tr>
                	<td width="48%">
						<ul class="sign1">
							<li><span>Licensee Signature:</span><span style="border-bottom:1px solid #ccc; ">'.@$customer_signature_img.'</span></li>
							<li><span>Date:</span><span style="border-bottom:1px solid #ccc; ">'.@$signature_date.'</span></li>
						</ul>
                    </td>
                    <td width="50%">
						<ul class="sign2">
							<li>Signed on behalf of</li>
							<li><span>Meado Self Storage Ltd:</span><span style="border-bottom:1px solid #ccc; ">'.@$employee_signature_db_img.'</span></li>
							<li><span>Date:</span><span style="border-bottom:1px solid #ccc; ">'.@$signature_date.'</span></li>
						</ul>
                    </td>
                </tr>
            </table>
        </td></tr>
		
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
			  <tr>
				  <td>
					<h3>THE PARTIES HEREBY AGREE AS FOLLOWS:</h3>
<ul>
	<li>This licence does not constitute a tenancy or do the parties wish to enter into the relationship of Landlord and Tenant</li>
	<li>This Licence does not give the Licensee the right of exclusive occupation of the Unit or of any Unit in the Premises</li>
	<li>Subject to clauses 14 and 15, Meadow Self Storage Ltd shall permit the licensee to occupy in common with Meadow Self Storage Ltd the Unit ( as herein defined) to use and keep using for the
purpose of storage of goods and to enter during Meadow Self Storage Ltd normal business hours the Premises of Meadow Self Storage Ltd</li>
	<li>The Licence may be terminated by Meadow Self Storage Ltd or the Licensee at any time with not less than 28 days’ notice and on the expiration of such notice (without prejudice to any rights of the
Licensor against the Licensee) all the rights of the Licensee hereunder shall case ending on any Dude Date and termination will take effect from that Dude Date, Please note that Licensee will be
charged for full 7 day period in case the Licensee should decide to occupy their unit following the expiry of their termination period even if such further occupancy period only represents a fraction of
full 7 day period.
	</li>
	</ul>
	<p>This License shall be construed according to the Laws of England.</p>
				 </td>
			  </tr>
			</table>

        </td></tr>
    </table>
</body>
</html>';
	
$dompdf->load_html($html);
$dompdf->render();
$output = $dompdf->output();

	$filetime_new  = strtotime(date("Y-m-d H:i:s"));
	$fileName_license_agreement  = $filetime_new."_license_agreement.pdf";
	//@move_uploaded_file($_FILES['container_file']['tmp_name'],  $global_config['site_localpath']."uploads/container_files/".$fileName);
	$file_to_save = $global_config['site_localpath']."uploads/license_agreement/".$fileName_license_agreement;
    file_put_contents($file_to_save, $output);
	
	$strTable = tbl_customer_container;
	$strUpdateArray = array(
		array("filename_license_agreement", 	$fileName_license_agreement)
	);
	$strWhereClause	= "customer_id = '".$Last_insert_customer_id."'";
	$update = $this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);

	}
	
	
	
	function DisplayPdfFormat($text){ 
		$output = "";
		$output.=$text; 
		//$output.='</table><br/>';			
		return $output;	
	}
	/****************************************************************************************************************
	*	Function Name : Check Container Name exits or not								*	
	*	Description : Check Container Name exits or not						*
	*****************************************************************************************************************/
	/*function checkContainerName($objarray) {
		global $objSmarty, $global_config;
	
		$CategoryEdit = "SELECT * FROM  tbl_container WHERE id='".$objarray['name']."'"; 
		$CategoryEditDetails = $this->SelectQryDirect($CategoryEdit,0);
		
		echo '<pre>';
		print_r($CategoryEditDetails);
		exit;
	}*/
	
	
	/****************************************************************************************************************
	*	Function Name : addContainer								*	
	*	Description : Adding the Container details				*
	*****************************************************************************************************************/
	function addContainer($objarray) {
		global $objSmarty, $global_config;
		
		
		//echo '<pre>';
		//print_r($objarray);
		$container_name = $objarray['container_name'];
		
		$container_type = $objarray['container_type'];		
		
		
		$CheckContainerName = "SELECT * FROM  tbl_container WHERE name='".$container_name."'"; 
		$CheckContainerName_Result = $this->SelectQryDirect($CheckContainerName,0);

		$countContainerVal = count($CheckContainerName_Result);
		
		$CheckContainerNameResult =  $CheckContainerName_Result[0]['name'];
		

		if($CheckContainerNameResult !='') {
			header("location:container_list.php?msgcode=5");
			exit;
		}else{
		
				if($container_type == 'manual_entry'){
			
					$container_name = $objarray['container_name'];
					$category_name = $objarray['category_name'];
					$Admin_ID = $_SESSION['container_rental_admin_id'];
					$created_date = date("Y-m-d H:i:s");
					$status = 'Available';
					$file_name = 'manual';
					
					$strInsertArray = array(
										array("name",	$container_name),
										array("container_category", 	$category_name),								
										array("admin_id", 	$Admin_ID),																
										array("status", 	$status),
										array("file_name", 	$file_name),																
										array("create_date", 	$created_date)
									);
								$this->common_Insert(tbl_container, $strInsertArray,'','',0);
				}else if($container_type == 'import_csv'){
				
						$created_date = date("Y-m-d H:i:s");
						//$txt_status = '';
						//$file_name = $_FILES['container_file']['name'];
						$filetime  = strtotime(date("Y-m-d H:i:s"));
						$fileName  = $filetime."_".$_FILES['container_file']['name'];
						@move_uploaded_file($_FILES['container_file']['tmp_name'],  $global_config['site_localpath']."uploads/container_files/".$fileName);
						set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
						include  $global_config['site_localpath'].'Classes/PHPExcel/IOFactory.php';
						//require MAIN_CLASS_PATH."SendgridEmail/sendgrid-php.php";
						$file_name =  $global_config['site_localpath']."uploads/container_files/".trim($fileName);
						$Admin_ID = $_SESSION['container_rental_admin_id'];
						$fp = fopen($file_name,"r");
								$m=0;
								while(($row = fgetcsv($fp,"500",",")) != FALSE){
									$num = count($row);
									for ($c=0; $c < $num; $c++) {
									  $col[$c] = $row[$c];
									}
									$created_date = date("Y-m-d H:i:s");
									$col1 = $col[0];
									$col2 = $col[1];
									$col3 = $Admin_ID;
									$col4 = 'Available';						
									$col5 = $fileName;
									$col6 = $created_date;												
								if($m > 0){
									$strInsertArray = array(
											array("name",	$col1),
											array("container_category", 	$col2),								
											array("admin_id", 	$col3),																
											array("status", 	$col4),
											array("file_name", 	$col5),																
											array("create_date", 	$col6)
										);
									$this->common_Insert(tbl_container, $strInsertArray,'','',0);
								}	
									
									$m++;
								}
						fclose($fp);
					}	
			}		
	}
	
	
	/****************************************************************************************************************
	*	Function Name : addCategory								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	

	/****************************************************************************************************************
	*	Function Name : containerlist								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	function exportCSVContainerList($objarray) {
		global $objSmarty, $global_config;

		$CheckContainerName = "SELECT * FROM tbl_container"; 
		$CheckContainerName_Result = $this->SelectQryDirect($CheckContainerName,0);
		$dataResult = array();
		$count_get_userdet_res = count($CheckContainerName_Result);
		for($m=0; $m < $count_get_userdet_res; $m++){
			$get_container_customer_qry = "SELECT customer_id, container_number, contract_start_date, contract_next_due_date, status  FROM tbl_customer_container where container_number='".$CheckContainerName_Result[$m]['id']."' ";
			$Res_container_customer = $this->SelectQryDirect($get_container_customer_qry);		
			
			$count_Res_container_customer = count($Res_container_customer);
				for($n=0; $n < $count_Res_container_customer; $n++){
					$CheckContainerName_Result[$m]['container_customer_id'] = $Res_container_customer[$n]['customer_id'];
					$CheckContainerName_Result[$m]['contract_start_date'] = $Res_container_customer[$n]['contract_start_date'];
					$CheckContainerName_Result[$m]['contract_next_due_date'] = $Res_container_customer[$n]['contract_next_due_date'];
					$current_date = date("d/m/Y ");// current date									
					$contract_next_due_date =  $Res_container_customer[$n]['contract_next_due_date'];
					
					if($Res_container_customer[$n]['contract_next_due_date'] !=''){
						$now = strtotime(str_replace("/", '-', $Res_container_customer[$n]['contract_next_due_date'])); // or your date as well
						$your_date = strtotime(str_replace("/", '-', $current_date));
						$datediff = $your_date - $now;
						$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
						$overdue = floor($datediff/(60*60*24));
						$Res_container_customer[$n]['contract_overdue'] = $overdue;
						//if($overdue > 0){
							$get_customer_over_due_qry = "SELECT id, first_name, sur_name,  mobile_number FROM tbl_customer where id='".$Res_container_customer[$n]['customer_id']."'";
							$Res_get_customer_over_due = $this->SelectQryDirect($get_customer_over_due_qry);	
							$CheckContainerName_Result[$m]['customer_first_name'] = $Res_get_customer_over_due[$n]['first_name'];
							$CheckContainerName_Result[$m]['customer_sur_name'] = $Res_get_customer_over_due[$n]['sur_name'];
							$CheckContainerName_Result[$m]['customer_mobile_number'] = $Res_get_customer_over_due[$n]['mobile_number'];
						//}
					}

				}	
		}
					
		$output	   = "";
		$output    ="S.No\tName\tContainer category\tFirst name\tSurname\tMobile Number\tNext Due Date\tOver Due\tStatus\tCreate Date"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($CheckContainerName_Result as $row){
				
				$output				.=	$s_no."\t";
				$output				.=	$row['name']."\t";
				$output				.=	$row['container_category']."\t";
				$output				.=	$row['customer_first_name']."\t"; 
				$output				.=	$row['customer_sur_name']."\t";
				$output				.=	$row['customer_mobile_number']."\t";
				$output				.=	$row['contract_next_due_date']."\t";
				$output				.=	$row['contract_overdue']."\t";
				$output				.=	$row['status']."\t";
				$output				.=	$row['create_date']."\t";
				$output .="\n";
				$s_no++;	
		}
		
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Container List.xls"');
		echo $output;
		exit;
	}	
	
	
	
	/****************************************************************************************************************
	*	Function Name : containerlist								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	function exportCSVCustomerList($objarray) {
		global $objSmarty, $global_config;
		
		$get_contract_start_date_qry = "SELECT customer_id, container_number, contract_start_date FROM tbl_customer_container where container_number !=''";
		//echo '<br>';
		$Res_customer_container = $this->SelectQryDirect($get_contract_start_date_qry);
		/*echo '<pre>';
		print_r($Res_customer_container);
		exit;*/
		
		
		for($n=0;$n<count($Res_customer_container);$n++) {
			$get_contianer_qry = "SELECT id, name, container_category,  status FROM tbl_container where id='".$Res_customer_container[$n]['container_number']."' ";
			//echo '<br>';
			$Res_container[] = $this->SelectQryDirect($get_contianer_qry);
			$Res_customer_container[$n]['Container_Name'] = $Res_container[$n][0]['name'];
			
			$get_customer_qry = "SELECT * FROM tbl_customer  where id='".$Res_customer_container[$n]['customer_id']."'"; 
			//echo '<br>';
			$Res_customer[] = $this->SelectQryDirect($get_customer_qry);			
			$Res_customer_container[$n]['Customer_Firstname'] = $Res_customer[$n][0]['first_name'];			
			//echo '<br>';			
			$Res_customer_container[$n]['Customer_Surname'] = $Res_customer[$n][0]['sur_name'];			
			$Res_customer_container[$n]['Customer_Mobile_number'] = $Res_customer[$n][0]['mobile_number'];									
		}
		
		/*echo '<pre>';
		print_r($Res_customer);
		exit;*/
		$output	   = "";
		$output    ="S.No\tName\tSur name\tMobile number\tContainer Name\tContract Start Date"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($Res_customer_container as $row){
				
				$output				.=	$s_no."\t";
				$output				.=	$row['Customer_Firstname']."\t";
				$output				.=	$row['Customer_Surname']."\t";
				$output				.=	$row['Customer_Mobile_number']."\t"; 
				$output				.=	$row['Container_Name']."\t";
				//$output				.=	$implode_val."\t";		
				$output				.=	$row['contract_start_date']."\t";
				//$output				.=	$row['status']."\t";
				$output .="\n";
				$s_no++;	
		}
		
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Customer List.xls"');
		echo $output;
		exit;		
	}	
	

	/****************************************************************************************************************
	*	Function Name : exportCSVRemovals								*	
	*	Description : Export the CSVRemovals details				*
	*****************************************************************************************************************/
	function exportCSVRemovals($objarray) {
	
		global $objSmarty, $global_config;

		$CheckExpenseName = "SELECT * FROM tbl_removals_management"; 
		$CheckExpenseName_Result = $this->SelectQryDirect($CheckExpenseName,0);
		

		$output	   = "";
		$output    ="S.No\tdate incurred\tdescription\tpayment method\tamount excluding vat\tvat\tamount including vat"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($CheckExpenseName_Result as $row){
				
				$output				.=	$s_no."\t";
				$output				.=	$row['date_incurred']."\t";
				$output				.=	$row['description']."\t";
				$output				.=	$row['payment_method']."\t"; 
				$output				.=	$row['amount_excluding_vat']."\t";
				$output				.=	$row['vat']."\t";
				$output				.=	$row['amount_including_vat']."\t";
				$output .="\n";
				$s_no++;	
		}
		
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Expense List.xls"');
		echo $output;
		exit;
	}	
	
	
	/****************************************************************************************************************
	*	Function Name : containerlist								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	function downloadZipExpenseList($objarray) {
		global $objSmarty, $global_config;

    if($_REQUEST['downloadstart_zip']=='' && $_REQUEST['downloadend_zip']==''){	
		$CheckExpenseName = "SELECT * FROM tbl_expenses"; 
		$CheckExpenseName_Result = $this->SelectQryDirect($CheckExpenseName,0);
	}else {
	    $CheckExpenseName = "SELECT * FROM tbl_expenses WHERE date_incurred BETWEEN '".$_REQUEST['downloadstart_zip']."' and '".$_REQUEST['downloadend_zip']."'";
	    $CheckExpenseName_Result = $this->SelectQryDirect($CheckExpenseName,0);
	}	
	
		$zipname = 'allexpenses.zip';
		$zip = new ZipArchive();
		$zip->open($global_config["site_localpath"] ."uploads/expenses/". $zipname, ZipArchive::CREATE);
		$filename = '';
		$file_path = '';
		for($i=0;$i<count($CheckExpenseName_Result);$i++){
		$row_new = explode("expenses/", $CheckExpenseName_Result[$i]['expanes_attachements']);
		$filename  = $row_new[1];
		$file_path  = $CheckExpenseName_Result[$i]['expanes_attachements'];
	/*	echo '<pre>';
		print_r($file_path);*/
		$zip_created = $zip->addFile($file_path, $filename);
		}
	//	exit;
		$zip->close();
		header('Pragma: public');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$zipname);
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($global_config["site_localpath"] ."uploads/expenses/".$zipname));
		header('Connection: close');
		readfile($global_config["site_localpath"] ."uploads/expenses/".$zipname);	
		exit;

	}

	
	
	/****************************************************************************************************************
	*	Function Name : containerlist								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	function exportCSVExpenseList($objarray) {
		global $objSmarty, $global_config;
	/* echo '<pre>';
	 print_r($_REQUEST);
	 exit;*/
	if($_REQUEST['downloadstart']=='' && $_REQUEST['downloadend']==''){	
		$CheckExpenseName = "SELECT * FROM tbl_expenses"; 
		$CheckExpenseName_Result = $this->SelectQryDirect($CheckExpenseName,0);
	}else {
	    $CheckExpenseName = "SELECT * FROM tbl_expenses WHERE date_incurred BETWEEN '".$_REQUEST['downloadstart']."' and '".$_REQUEST['downloadend']."'";
	    $CheckExpenseName_Result = $this->SelectQryDirect($CheckExpenseName,0);
	}
		
		$output	   = "";
		$output    ="S.No\tdate incurred\tdescription\tpayment method\tamount excluding vat\tvat\tamount including vat"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($CheckExpenseName_Result as $row){
				$output				.=	$s_no."\t";
				$output				.=	$row['date_incurred']."\t";
				$output				.=	$row['description']."\t";
				$output				.=	$row['payment_method']."\t"; 
				$output				.=	$row['amount_excluding_vat']."\t";
				$output				.=	$row['vat']."\t";
				$output				.=	$row['amount_including_vat']."\t";
				$output .="\n";
				$s_no++;	
		}
		
		
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Expense List.xls"');
		echo $output;
		exit;
		
	
		/*$zipname = 'allreturns.zip';
		$zip = new ZipArchive();
		$zip->open($global_config["site_localpath"] ."uploads/expenses/". $zipname, ZipArchive::CREATE);
		$filename = '';
		$file_path = '';
		for($i=0;$i<count($CheckExpenseName_Result);$i++){
		$row_new = explode("expenses/", $CheckExpenseName_Result[$i]['expanes_attachements']);
		$filename  = $row_new[1];
		$file_path  = $CheckExpenseName_Result[$i]['expanes_attachements'];
		
		$zip_created = $zip->addFile($file_path, $filename);
		
		}
		//exit;
		$zip->close();
		header('Pragma: public');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Content-Type: application/zip');
		header('Content-disposition: attachment; filename='.$zipname);
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($global_config["site_localpath"] ."uploads/expenses/".$zipname));
		header('Connection: close');
		readfile($global_config["site_localpath"] ."uploads/expenses/".$zipname);	*/
	
		
		
		/*header("Content-type: application/zip"); 
		header("Content-Disposition: attachment; filename=$archive_file_name");
		header("Content-length: " . filesize($archive_file_name));
		header("Pragma: no-cache"); 
		header("Expires: 0"); 
		readfile("$archive_file_name");*/
		
		
		
					/*$csv_handler = fopen ($global_config["site_localpath"].'uploads/expenses/payment_receipts.csv','w');
					fwrite ($csv_handler,$output);
					fclose ($csv_handler);
					
					echo 'Data saved to payment_receipts.csv'.$global_config["site_localpath"];
					$fileatt_type = "text/csv";
					$myfile = $global_config["site_localpath"]."uploads/expenses/payment_receipts.csv";
							
					$file_size = filesize($myfile);
					$handle = fopen($myfile, "r");
					$content = fread($handle, $file_size);
					fclose($handle);
					$content = chunk_split(base64_encode($content));
*/		
					//$uid = md5(uniqid(time()));
					//$uid = 'u-id';
					/*$from_name = 'saran';
					$from_mail = 'dancersaran13@gmail.com';		
					$header = "From: Saran <saravanan@securenext.in>\r\n";
					//$header .= "Reply-To: ".$replyto."\r\n";
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
					$header .= "This is a multi-part message in MIME format.\r\n";
					$header .= "--".$uid."\r\n";
					$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
					$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
					$header .= $message."\r\n\r\n";
					$header .= "--".$uid."\r\n";
					$header .= "Content-Type: text/csv; name=\"".$myfile."\"\r\n"; // use diff. tyoes here
					$header .= "Content-Transfer-Encoding: base64\r\n";
					$header .= "Content-Disposition: attachment; filename=\"".$myfile."\"\r\n\r\n";
					$header .= $content."\r\n\r\n";
					$header .= "--".$uid."--";
					
					$to = 'saravanan@securenext.in';				
					$subject = 'Test attachment mail for payment receipts';*/
		
		
					/*$from = 'dancersaran13@gmail.com';
					//$from = 'dan.sheriff@hotmail.com';
					$to = 'saravanan@securenext.in';
					
					$message = "Test attachment mail for payment receipts";
					$subject = 'Test attachment mail for payment receipts';
					$cc = '';
					
					$header = "From: " . strip_tags($from) . "\r\n";
					//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
					$header .= "CC: ".$cc."\r\n";
					$header .= "MIME-Version: 1.0\r\n";
					$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
					$header .= "This is a multi-part message in MIME format.\r\n";
					$header .= "--".$uid."\r\n";
					$header .= "Content-type:text/html; charset=iso-8859-1\r\n";
					$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
					$header .= $message."\r\n\r\n";
					$header .= "--".$uid."\r\n";
					
					$header .= "Content-Type: text/csv; name=\"".$myfile."\"\r\n"; // use diff. tyoes here
					$header .= "Content-Transfer-Encoding: base64\r\n";
					$header .= "Content-Disposition: attachment; filename=\"".$myfile."\"\r\n\r\n";
					$header .= $content."\r\n\r\n";
					$header .= "--".$uid."--";
					
					$mail_res = mail($to,$subject,$message, $header);
					//$mail_res = mail($to, $subject, '', $header);
					if($mail_res){
						echo '<p style="color:green;">success</p>';			
					}else{
						echo '<p style="color:red;">failed</p>';
					}
					*/
		
	}	
	
	
	
	/****************************************************************************************************************
	*	Function Name : containerlist								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	function exportCSVPaymenthistoryList($objarray) {
	
		global $objSmarty, $global_config;

		$ChecpayHistorName = "SELECT * FROM tbl_payment_history"; 
		$CheckPayhistory_Result = $this->SelectQryDirect($ChecpayHistorName,0);
		
/*	 echo '<pre>';
	 print_r($CheckContainerName_Result);
	 exit;
		*/
		$output	   = "";
		$output    ="S.No\tcontainer_type\tcontainer_number\tdue_date\trelated_period\tdate_paid\tlicense\tdeposit\tmiscellaneous\tpenality\ttotal_amount_due\tpayment_type"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($CheckPayhistory_Result as $row) {
				
				$output				.=	$s_no."\t";
				$output				.=	$row['container_type']."\t";
				$output				.=	$row['container_number']."\t";
				$output				.=	$row['due_date']."\t"; 
				$output				.=	$row['related_period']."\t";
				$output				.=	$row['date_paid']."\t";
				$output				.=	$row['license']."\t";
				$output				.=	$row['deposit']."\t";
				$output				.=	$row['miscellaneous']."\t";
				$output				.=	$row['penality']."\t";
				$output				.=	$row['total_amount_due']."\t";
				$output				.=	$row['payment_type']."\t";
				$output .="\n";
				$s_no++;	
		}
		
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Previous payment History.xls"');
		echo $output;
		exit;
	}	
	
	/****************************************************************************************************************
	*	Function Name : addCategory								*	
	*	Description : Adding the Category details				*
	*****************************************************************************************************************/
	function addCategory($objarray) {
		global $objSmarty, $global_config;
		$created_date = date("Y-m-d H:i:s");
		$txt_status = '';
		if(isset($objarray['txt_status'])){
			if($objarray['txt_status'] !='0'){
				$txt_status = 'Available';
			}else{
				$txt_status = 'Inactive';			
			}
		}
		$strInsertArray = array(
								array("category_name",	$objarray['category_name']),
								array("status", 	$txt_status),
								array("create_date", 	$created_date)
							);
		$this->common_Insert(tbl_category, $strInsertArray,'','',0);
	}
	
	
	function forgotPasswordEmail($email) {
		global $objSmarty, $global_config;
		
		$get_userdet_qry = "SELECT * FROM tbl_users WHERE email ='".$email."'";
		$SettingsEditDetails = $this->SelectQryDirect($get_userdet_qry,0);
		$countEmail = count($SettingsEditDetails);
		
		if($SettingsEditDetails[0]['email'] !=''){
			//echo $SettingsEditDetails[0]['email'];
			$user_email = $SettingsEditDetails[0]['email'];
			$username = $SettingsEditDetails[0]['username'];
			$Random_password = $this->generate_password();
			
			$strTable = tbl_users;
			$strUpdateArray = array(
								array("password", 	md5($Random_password))
							);
		
			$strWhereClause	= "email = '".$email."'";

			$update = $this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
			$this->send_mail_forgotPassword($Random_password,$username, $user_email);
			echo 'success';			
		}else{
			echo 'fail';
		}
		exit;
	}	
	
	
	/****************************************************************************************************************
	*	Function Name : addAdminuser								*	
	*	Description : Adding the add Admin user details				*
	*****************************************************************************************************************/
	function addAdminuser($objarray) {
		global $objSmarty, $global_config;
		
		$user_management = '';
		$category_management = '';
		$container_management = '';
		$customer_management = '';						
		
		if(isset($objarray['user_management'])){
			$user_management = 'yes';
		}else{
			$user_management = 'no';
		}

		if(isset($objarray['category_management'])){
			$category_management = 'yes';
		}else{
			$category_management = 'no';
		}

		if(isset($objarray['container_management'])){
			$container_management = 'yes';
		}else{
			$container_management = 'no';
		}

		if(isset($objarray['customer_management'])){
			$customer_management = 'yes';
		}else{
			$customer_management = 'no';
		}

		$created_date = date("Y-m-d H:i:s");
		$updated_date = date("Y-m-d H:i:s");
		$last_access_date = date("Y-m-d H:i:s");
		$Random_password = $this->generate_password();
		
		$txt_status = '';
		if(isset($objarray['txt_status'])){
			if($objarray['txt_status'] !='0'){
				$txt_status = 'Active';
			}else{
				$txt_status = 'Inactive';			
			}
		}
		
		$first_name = $objarray['first_name'];
		$last_name = $objarray['last_name'];
		
		$username = ucfirst($first_name[0]).'.'. $last_name;
		
		//echo 'User name is => '.$username = ucfirst($first_name[0]).'.'. $last_name;
		//exit;
		
			
		
		$Admin_ID = $_SESSION['container_rental_admin_id'];	
		//$global_config['site_globalpath']			
		$this->send_mail($Random_password,$username, $objarray['username']);
		$strInsertArray = array(
								array("user_type",	$objarray['user_type']),
								array("first_name", 	$objarray['first_name']),
								array("last_name", 	$objarray['last_name']),
								array("username", 	$username),
								array("password", 	md5($Random_password)),
								array("email", 	$objarray['username']),
								array("user_image", 	''),
								array("user_management", 	$user_management),
								array("category_management", 	$category_management),
								array("container_management", 	$container_management),
								array("customer_management", 	$customer_management),
								array("status", 	$txt_status),
								array("created_by", 	$Admin_ID),								
								array("created_date", 	$created_date),
								array("updated_date", 	$updated_date),
								array("last_access_date", 	$last_access_date)
							);
/*		echo '<pre>';
		print_r($strInsertArray);
		exit;*/
		$this->common_Insert(tbl_users, $strInsertArray,'','',0);
		
	}
	
	
	/*--------------------------------------------------------------------------------------------------------------- 
											Generates random password to a user
	-----------------------------------------------------------------------------------------------------------------
	*/
	public function generate_password(){
		$flag=0;
		$rands="";
		$alpha="0a1Z2b3Y4c5X6d7W8e9V!f@U#gShRiQjPkOlNmMnLoKpJqIrHsGtFuEvDwCxByAz";
		$i=0;
		$l=strlen($alpha)-1;
		while($i<=7){
			$fla=0;
			$r=$alpha[mt_rand(0,$l)];
				if($flag==1){
						foreach($rands as $v){
							if(strcmp($v, $r)==0){
								$fla+=1;
							} 
						}
						if($fla==0){
							$rands[$i]=$r;
							$i++;
						}
				}
				if($flag==0){
					$flag+=1;
					$rands[$i]=$r;
					$i++;
				}
		}
		$res=implode("",$rands);
		return $res;
		}
	
	
	/*--------------------------------------------------------------------------------------------------------------- 
									Sends the forgot password to the mail given by user
	-----------------------------------------------------------------------------------------------------------------
	*/	
	public function send_mail_forgotPassword($Random_password,$username, $user_email){
		global $objSmarty, $global_config;
		$message = '<table id="background-table" style="background-color: #ececec;" border="0" cellpadding="0" cellspacing="0" width="100%">
	  <tbody>
	
		<tr>
	
		  <td align="center" bgcolor="#ececec"><table class="w640" style="margin:0 10px;" border="0" cellpadding="0" cellspacing="0" width="640">
	
    	      <tbody>
        	   <tr>
              <td class="w640" height="20" width="640"></td>
            </tr>
            <tr>
              <td id="header" style=" border-radius:6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; -webkit-border-radius:6px 6px 0px 0px; -webkit-font-smoothing: antialiased; background-color: #fff;" class="w640" align="center" bgcolor="#fff" width="640"><table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
                  <tbody>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" height="30" width="580"></td>
                      <td class="w30" width="30"></td>
                    </tr>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" width="580"><div id="headline" align="center">
                          <p style="color: #e7cba3; font-family: Arial,Helvetica,sans-serif;  text-align: center; margin-top:0px; margin-bottom:0px;"> <strong> <img width="350" border="0" class="w180" src="'.$global_config['site_globalpath'].'images/logo.PNG" label="Image" editable="true"> </strong> </p>
                        </div></td>
                      <td class="w30" width="30"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="w640" bgcolor="#ffffff" height="30" width="640"></td>
            </tr>
            <tr id="simple-content-row">
              <td class="w640" bgcolor="#ffffff" width="640"><table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
                  <tbody>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" width="580"><repeater>
                          <layout label="Text only">
                            <table class="w580" border="0" cellpadding="0" cellspacing="0" width="580">
                              <tbody>
                                <tr>
                                  <td class="w580" width="580"><div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
                                      <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
									  	Dear Customer,<br>
										
									  </singleline>
                                    </div>
                                    <div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
									<singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
										Your login details:  <br>
									</singleline>	
									<singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
											User Name: '. @$username.' <br>
									   </singleline>
									
									    <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
											Password: '. @$Random_password.' <br>
									   </singleline>
                                    </div>
									
									 <div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
									 <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
											Please login with this details by clicking the link below: <br>
											<a style="text-decoration:none;outline:none;display:block" href="'.$global_config['site_globalpath'].'" target="_blank">  Container <br> </a>
									   </singleline>
									  </div> 
									
									
									  <div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
                                      <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
									   Thanks, <br>
									 <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
									  <a style="text-decoration:none;outline:none;display:none" href="'.$global_config['site_globalpath'].'" target="_blank">  Container <br> </a>
									 <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; color:darkgray">
											<p style="color:#a9a9a9">This email is auto generated from Container. Please do not reply this email.<p>
									</singleline>
									</div>  
                                  </td>
                                </tr>
                                <tr>
                                  <td class="w580" height="10" width="580"></td>
                                </tr>
                              </tbody>
                            </table>
                          </layout>
                        </repeater>
                      </td>
                      <td class="w30" width="30"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="w640" bgcolor="#ffffff" height="15" width="640"></td>
            </tr>
            <tr>
              <td class="w640"   width="640"><table style=" border-radius:0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; -webkit-border-radius:0px 0px 6px 6px; -webkit-font-smoothing: antialiased; background-color: #3c8dbc;" id="footer" class="w640" bgcolor="#ececec" border="0" cellpadding="0" cellspacing="0" width="640">
                  <tbody>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580 h0" height="30" width="360"></td>
                      <td class="w0" width="60"></td>
                      <td class="w0" width="160"></td>
                      <td class="w30" width="30"></td>
                    </tr>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" valign="top" width="360"><span class="hide">
                        <p id="permission-reminder" class="footer-content-left" align="left"></p>
                        </span>
                        <p class="footer-content-left" align="left">&nbsp; </p></td>
                      <td class="hide w0" width="60"></td>
                      <td class="hide w0" valign="top" width="160"><p id="street-address" class="footer-content-right" align="right"></p></td>
                      <td class="w30" width="30"></td>
                    </tr>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580 h0" height="15" width="360"></td>
                      <td class="w0" width="60"></td>
                      <td class="w0" width="160"></td>
                      <td class="w30" width="30"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="w640" height="60" width="640"></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>';

	
	//$from = 'saravanan@securenext.in';
	$from = 'dan.sheriff@hotmail.com';
	$to = $user_email;
	
	$subject = 'Forgot Password details from Container Site';
	$cc = '';
	//$cc = 'dan.sheriff@hotmail.com';
	
	
	$headers = "From: " . strip_tags($from) . "\r\n";
	//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
	$headers .= "CC: ".$cc."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($to,$subject,$message, $headers);
		
		/*if(mail($toemail,$subject,$message,$headers))
			echo "success";
		else 
			echo "Function failed";*/
	}	
		
	/*--------------------------------------------------------------------------------------------------------------- 
									Sends the generated password to the mail given by user
	-----------------------------------------------------------------------------------------------------------------
	*/	
	public function send_mail($pwd, $username, $toemail){
		global $objSmarty, $global_config;
		$message = '<table id="background-table" style="background-color: #ececec;" border="0" cellpadding="0" cellspacing="0" width="100%">
	  <tbody>
	
		<tr>
	
		  <td align="center" bgcolor="#ececec"><table class="w640" style="margin:0 10px;" border="0" cellpadding="0" cellspacing="0" width="640">
	
    	      <tbody>
        	   <tr>
              <td class="w640" height="20" width="640"></td>
            </tr>
            <tr>
              <td id="header" style=" border-radius:6px 6px 0px 0px; -moz-border-radius: 6px 6px 0px 0px; -webkit-border-radius:6px 6px 0px 0px; -webkit-font-smoothing: antialiased; background-color: #fff;" class="w640" align="center" bgcolor="#fff" width="640"><table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
                  <tbody>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" height="30" width="580"></td>
                      <td class="w30" width="30"></td>
                    </tr>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" width="580"><div id="headline" align="center">
                          <p style="color: #e7cba3; font-family: Arial,Helvetica,sans-serif;  text-align: center; margin-top:0px; margin-bottom:0px;"> <strong> <img width="350" border="0" class="w180" src="'.$global_config['site_globalpath'].'images/logo.PNG" label="Image" editable="true"> </strong> </p>
                        </div></td>
                      <td class="w30" width="30"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="w640" bgcolor="#ffffff" height="30" width="640"></td>
            </tr>
            <tr id="simple-content-row">
              <td class="w640" bgcolor="#ffffff" width="640"><table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
                  <tbody>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" width="580"><repeater>
                          <layout label="Text only">
                            <table class="w580" border="0" cellpadding="0" cellspacing="0" width="580">
                              <tbody>
                                <tr>
                                  <td class="w580" width="580"><div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
                                      <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
									  	Dear Customer,<br>
										Welcome to our container family.
									  </singleline>
                                    </div>
                                    <div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
									<singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
										Your login details:  <br>
									</singleline>	
									<singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
											User Name: '. @$username.' <br>
									   </singleline>
									
									    <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
											Password: '. @$pwd.' <br>
									   </singleline>
                                    </div>
									
									 <div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
									 <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
											Please login with this details by clicking the link below: <br>
											<a style="text-decoration:none;outline:none;display:block" href="'.$global_config['site_globalpath'].'" target="_blank">  Container <br> </a>
									   </singleline>
									  </div> 
									
									
									  <div class="article-content" style="font-size: 13px; line-height: 18px; color: #444444; margin-top: 0px; margin-bottom: 18px; font-family: Arial,Helvetica,sans-serif;" align="left">
                                      <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
									   Thanks, <br>
									 <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; ">
									  
									 <singleline label="Description" style="font-family: Arial,Helvetica,sans-serif; color:darkgray">
											<p style="color:#a9a9a9">This email is auto generated from Container. Please do not reply this email.<p>
									</singleline>
									</div>  
                                  </td>
                                </tr>
                                <tr>
                                  <td class="w580" height="10" width="580"></td>
                                </tr>
                              </tbody>
                            </table>
                          </layout>
                        </repeater>
                      </td>
                      <td class="w30" width="30"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="w640" bgcolor="#ffffff" height="15" width="640"></td>
            </tr>
            <tr>
              <td class="w640"   width="640"><table style=" border-radius:0px 0px 6px 6px; -moz-border-radius: 0px 0px 6px 6px; -webkit-border-radius:0px 0px 6px 6px; -webkit-font-smoothing: antialiased; background-color: #3c8dbc;" id="footer" class="w640" bgcolor="#ececec" border="0" cellpadding="0" cellspacing="0" width="640">
                  <tbody>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580 h0" height="30" width="360"></td>
                      <td class="w0" width="60"></td>
                      <td class="w0" width="160"></td>
                      <td class="w30" width="30"></td>
                    </tr>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580" valign="top" width="360"><span class="hide">
                        <p id="permission-reminder" class="footer-content-left" align="left"></p>
                        </span>
                        <p class="footer-content-left" align="left">&nbsp; </p></td>
                      <td class="hide w0" width="60"></td>
                      <td class="hide w0" valign="top" width="160"><p id="street-address" class="footer-content-right" align="right"></p></td>
                      <td class="w30" width="30"></td>
                    </tr>
                    <tr>
                      <td class="w30" width="30"></td>
                      <td class="w580 h0" height="15" width="360"></td>
                      <td class="w0" width="60"></td>
                      <td class="w0" width="160"></td>
                      <td class="w30" width="30"></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td class="w640" height="60" width="640"></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
  </tbody>
</table>';

	$to = $toemail;
	//$to = 'saravanan@securenext.in';

	$subject = 'User details from Container site!';
	//$to = 'saravanan@securenext.in';
	$cc = 'dan.sheriff@hotmail.com';
	
	$headers = "From: " . strip_tags($to) . "\r\n";
	//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
	$headers .= "CC: ".$cc."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	mail($to,$subject,$message, $headers);
		
		/*if(mail($toemail,$subject,$message,$headers))
			echo "success";
		else 
			echo "Function failed";*/
	}	
		
	/****************************************************************************************************************
	*	Function Name : addTrigger								*	
	*	Description : Adding the Trigger details				*
	*****************************************************************************************************************/
	function addTrigger($objarray) {
		global $objSmarty, $global_config;
		
		$strInsertArray = array(
								array("tablename",	$objarray['field1']),
								array("condition", 	$objarray['tvalue']),
								array("condition_html", 	$objarray['thtml']),
								array("temp_id", 	$objarray['tsid']),
								array("temp_title", 	$objarray['target']),
								array("temp_pid", 	$objarray['tid']),
								array("temp_schedule", 	$objarray['tsh']),
								array("temp_schedule_format", 	$objarray['tsf']),
								array("status", 	$objarray['txt_status']),
							);
		$this->common_Insert(tbl_trigger, $strInsertArray,'','',0);
	}

	/****************************************************************************************************************
	*	Function Name : GetSettingsDetails								*	
	*	Description : Getting the settings list details				*
	*****************************************************************************************************************/
	function GetSettingsDetails($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;

		if($PerPage=="") $PerPage = 10;
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		$objTables 		=array('tbl_settings');
		$objFields 		=array("*");


		$SettingsCNT = "SELECT COUNT(id) as CNT FROM tbl_settings";
		$SettingsDetails = $this->SelectQryOrder($objTables,$objFields,'','','','', $Start, $PerPage,0,'');
		$SettingDetails1 =$this->SelectQryDirect($SettingsCNT,0);
		$TotalNum = $SettingDetails1[0][0];
		if($TotalNum < $Start){
			$Start = 0;
		}

		require $global_config["site_localpath"]."includes/perpage.php";
		$objSmarty->assign("intSearchPerPage", $intPerPage); //for PerPage

		$objSmarty->assign("SettingsList",$SettingsDetails);
		prePopulate($objArray);
		return $SettingsDetails;
	}
	
	/****************************************************************************************************************
	*	Function Name : GetSettingsDetails								*	
	*	Description : Getting the settings list details				*
	*****************************************************************************************************************/
	function GetTriggeringDetails($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;

		if($PerPage=="") $PerPage = 10;
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		$objTables 		=array('tbl_trigger');
		$objFields 		=array("*");


		$SettingsCNT = "SELECT COUNT(id) as CNT FROM tbl_trigger where temp_pid in (select template_id from tbl_template where status=1)";
		$whereClass = "  temp_pid in (select template_id from tbl_template where status=1) ";
		$TriggerDetails = $this->SelectQryOrder($objTables,$objFields,'',$whereClass,'','', $Start, $PerPage,0,'');
		$SettingDetails1 =$this->SelectQryDirect($SettingsCNT,0);
		$TotalNum = $SettingDetails1[0][0];
		if($TotalNum < $Start){
			$Start = 0;
		}

		require $global_config["site_localpath"]."includes/perpage.php";
		$objSmarty->assign("intSearchPerPage", $intPerPage); //for PerPage

		$objSmarty->assign("TriggerList",$TriggerDetails);
		prePopulate($objArray);
		return $TriggerDetails;
	}

	/****************************************************************************************************************
	*	Function Name : GetEditSettingsDetails								*	
	*	Description : Getting the settings edit details				*
	*****************************************************************************************************************/
	function GetEditSettingsDetails($objarray) {
		global $objSmarty, $global_config;

		$SettingsEdit = "SELECT * FROM tbl_settings WHERE id='".$objarray['id']."'";
		$SettingsEditDetails = $this->SelectQryDirect($SettingsEdit,0);

		$objSmarty->assign("SettingsEditDetails",$SettingsEditDetails);
		return $SettingsEditDetails;
	}
	
	/****************************************************************************************************************
	*	Function Name : GetAllTrigger								*	
	*	Description : Getting the all Triggers 
	*****************************************************************************************************************/
	function GetAllTrigger($objarray) {
		global $objSmarty, $global_config;

		$SettingsEdit = "SELECT * FROM tbl_trigger";
		$SettingsEditDetails = $this->SelectQryDirect($SettingsEdit,0);

		$objSmarty->assign("TriggerAll",$SettingsEditDetails);
		return $SettingsEditDetails;
	}
	
	
	/****************************************************************************************************************
	*	Function Name : GetEditContainerPricesListDetails								*	
	*	Description : Getting the GetEditContainerPricesListDetails				*
	*****************************************************************************************************************/
	function GetEditContainerPricesListDetails($objarray) {
		global $objSmarty, $global_config;

		//$CategoryEdit = "SELECT * FROM  tbl_category WHERE id='".$objarray['id']."'"; // change this on june 24th 2016 -> to get category from container table
		$ContainerPricesEdit = "SELECT * FROM  tbl_container_prices WHERE id='".$objarray['id']."'"; 
		$ContainerPricesDetails = $this->SelectQryDirect($ContainerPricesEdit,0);

		/*echo '<pre>';
		print_r($ContainerPricesDetails);
		exit;*/
			
		//$objSmarty->assign("ContainerPricesDetails",$ContainerPricesDetails);
		return $ContainerPricesDetails;
	}
	
	
	/****************************************************************************************************************
	*	Function Name : GetEditcategoryDetails								*	
	*	Description : Getting the Adminuser edit details				*
	*****************************************************************************************************************/
	function GetEditcategoryDetails($objarray) {
		global $objSmarty, $global_config;

		//$CategoryEdit = "SELECT * FROM  tbl_category WHERE id='".$objarray['id']."'"; // change this on june 24th 2016 -> to get category from container table
		$CategoryEdit = "SELECT * FROM  tbl_container WHERE id='".$objarray['id']."'"; 
		$CategoryEditDetails = $this->SelectQryDirect($CategoryEdit,0);

		$objSmarty->assign("CategoryEditDetails",$CategoryEditDetails);
		return $CategoryEditDetails;
	}
	
		
	/****************************************************************************************************************
	*	Function Name : GetEditAdminuserDetails								*	
	*	Description : Getting the Adminuser edit details				*
	*****************************************************************************************************************/
	function GetEditadminUserDetails($objarray) {
		global $objSmarty, $global_config;

		$AdminUserEdit = "SELECT * FROM  tbl_users WHERE uid='".$objarray['id']."'";
		$AdminUserEditDetails = $this->SelectQryDirect($AdminUserEdit,0);

		$objSmarty->assign("AdminUserEditDetails",$AdminUserEditDetails);
		return $AdminUserEditDetails;
	}
	
	/****************************************************************************************************************
	*	Function Name : GetEditPenalityFeesDetails								*	
	*	Description : Getting the GetEditPenalityFeesDetails edit details				*
	*****************************************************************************************************************/
	function GetEditPenalityFeesDetails($objarray) {
		global $objSmarty, $global_config;

		$PenalityfeesEdit = "SELECT * FROM tbl_penalityfees WHERE id='".$objarray['id']."'";
		$PenalityfeesEdit_Res = $this->SelectQryDirect($PenalityfeesEdit,0);

	
		$objSmarty->assign("PenalityfeesEditDetails",$PenalityfeesEdit_Res);
		/*echo '<pre>';
		print_r($PenalityfeesEdit_Res);
		exit;*/
		return $PenalityfeesEditDetails;
	}
	
	/****************************************************************************************************************
	*	Function Name : GetEditContainerDetails								*	
	*	Description : Getting the trigger edit details				*
	*****************************************************************************************************************/
	function GetEditcontainerDetails($objarray) {
		global $objSmarty, $global_config;

		$TriggerEdit = "SELECT * FROM tbl_container WHERE id='".$objarray['id']."'";
		$TriggerEditDetails = $this->SelectQryDirect($TriggerEdit,0);

		$objSmarty->assign("ContainerEditDetails",$TriggerEditDetails);
		return $TriggerEditDetails;
	}

	/****************************************************************************************************************
	*	Function Name : GetEditTriggerDetails								*	
	*	Description : Getting the trigger edit details				*
	*****************************************************************************************************************/
	function GetEditTriggerDetails($objarray) {
		global $objSmarty, $global_config;

		$TriggerEdit = "SELECT * FROM tbl_trigger WHERE id='".$objarray['id']."'";
		$TriggerEditDetails = $this->SelectQryDirect($TriggerEdit,0);

		$objSmarty->assign("TriggerEditDetails",$TriggerEditDetails);
		return $TriggerEditDetails;
	}

	
	/****************************************************************************************************************
	*	Function Name : UpdatePenalityFees								*	
	*	Description : Updating the UpdatePenalityFees details				*
	*****************************************************************************************************************/
	function UpdatePenalityFees($objarray) {
		global $objSmarty, $global_config;

		$strTable = tbl_penalityfees;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");	
					
		$strUpdateArray = array(
								array("days_overdue",	$objarray['days_overdue']),
								array("penality_fee_amount", $objarray['penality_fee_amount']),
								array("created_by",	$Admin_ID),
								array("modified_by",	$Admin_ID),
								array("create_date", 	$created_date),
							);
							
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "id = '".$objarray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdateSettingsDetails								*	
	*	Description : Updating the settings details				*
	*****************************************************************************************************************/
	function UpdateSettingsDetails($objarray) {
		global $objSmarty, $global_config;

		$strTable = tbl_settings;
		$strUpdateArray = array(
								array("field",	$objarray['txt_field']),
								array("value", 	$objarray['txt_value']),
							);
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "id = '".$objarray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdatecategoryDetails								*	
	*	Description : Updating the UpdatecategoryDetails details				*
	*****************************************************************************************************************/
	function UpdatecategoryDetails($objarray) {
		global $objSmarty, $global_config;
		
		$txt_status = '';
		
		if(isset($objarray['txt_status'])){
			if($objarray['txt_status'] !='0'){
				$txt_status = 'Active';
			}else{
				$txt_status = 'Inactive';			
			}
		}
		
		$created_date = date("Y-m-d H:i:s");
		$strTable = tbl_category;
		$strUpdateArray = array(
								array("category_name",	$objarray['category_name']),
								array("status", 	$txt_status),
								array("create_date", 	$created_date)
							);
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "id = '".$objarray['id']."'";
			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
			
	}
		/****************************************************************************************************************
	*	Function Name : UpdatecontainerDetails								*	
	*	Description : Updating theContainer details				*
	*****************************************************************************************************************/
	function UpdatecontainerDetails($objarray) {
		global $objSmarty, $global_config;

		$strTable = tbl_container;
		$created_date = date("Y-m-d H:i:s");
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$filaname = $objarray['container_file_name'];
		$txt_status = '';
		
		if(isset($objarray['txt_status'])){
			if($objarray['txt_status'] !='0'){
				$txt_status = 'Available';
			}else{
				$txt_status = 'Available';			
			}
		}
		$strUpdateArray = array(
								array("name",	$objarray['name']),
								array("container_category", 	$objarray['container_category']),
								array("admin_id", 	$Admin_ID),
								array("file_name", 	$filaname),
								array("status", 	$txt_status),
								array("create_date", 	$created_date),
							);
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "id = '".$objarray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdateAdminUserDetails								*	
	*	Description : Updating the AdminUser details				*
	*****************************************************************************************************************/
	function UpdateadminUserDetails($objarray) {
		global $objSmarty, $global_config;
		
		$user_management = '';
		$category_management = '';
		$container_management = '';
		$customer_management = '';						
		
		if(isset($objarray['user_management'])){
			$user_management = 'yes';
		}else{
			$user_management = 'no';
		}

		if(isset($objarray['category_management'])){
			$category_management = 'yes';
		}else{
			$category_management = 'no';
		}

		if(isset($objarray['container_management'])){
			$container_management = 'yes';
		}else{
			$container_management = 'no';
		}

		if(isset($objarray['customer_management'])){
			$customer_management = 'yes';
		}else{
			$customer_management = 'no';
		}
	
		
		
		$txt_status = '';
		
		if($objarray['status'] !='0'){
			$txt_status = 'Active';
		}else{
			$txt_status = 'Inactive';			
		}
		
		/*echo '<pre>';
		print_r($objarray);
		exit;*/
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$updated_date = date("Y-m-d H:i:s");
		$strTable = tbl_users;
		$strUpdateArray = array(
								array("first_name", 	$objarray['first_name']),
								array("last_name", 	$objarray['last_name']),
								array("username", 	$objarray['email']),								
								array("email", 	$objarray['email']),
								array("user_management", 	$user_management),
								array("category_management", 	$category_management),
								array("container_management", 	$container_management),
								array("customer_management", 	$customer_management),
								array("status", 	$txt_status),
								array("created_by", 	$Admin_ID),	
								array("updated_date", 	$updated_date),
								array("last_access_date", 	$updated_date)
								/*array("first",	$objarray['field1']),
								array("condition", 	$objarray['tvalue']),
								array("condition_html", 	$objarray['thtml']),
								array("temp_id", 	$objarray['tsid']),
								array("temp_title", 	$objarray['target']),
								array("temp_pid", 	$objarray['tid']),
								array("temp_schedule", 	$objarray['tsh']),
								array("temp_schedule_format", 	$objarray['tsf']),
								array("status", 	$objarray['txt_status']),*/
							);
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "uid = '".$objarray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}

	
	/****************************************************************************************************************
	*	Function Name : UpdateTriggerDetails								*	
	*	Description : Updating the Trigger details				*
	*****************************************************************************************************************/
	function UpdateTriggerDetails($objarray) {
		global $objSmarty, $global_config;

		$strTable = tbl_trigger;
		$strUpdateArray = array(
								array("tablename",	$objarray['field1']),
								array("condition", 	$objarray['tvalue']),
								array("condition_html", 	$objarray['thtml']),
								array("temp_id", 	$objarray['tsid']),
								array("temp_title", 	$objarray['target']),
								array("temp_pid", 	$objarray['tid']),
								array("temp_schedule", 	$objarray['tsh']),
								array("temp_schedule_format", 	$objarray['tsf']),
								array("status", 	$objarray['txt_status']),
							);
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "id = '".$objarray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}

	/****************************************************************************************************************
	*	Function Name : DeleteSettingsDetails								*	
	*	Description : Delete the settings details				*
	*****************************************************************************************************************/
	function DeleteSettingsDetails($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_settings WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	
	/****************************************************************************************************************
	*	Function Name : delecteMultiplecontainerlist								*	
	*	Description : Delete the delecteMultiplecontainerlist details				*
	*****************************************************************************************************************/
	function delecteMultiplecontainerlist($ids) {
		global $objSmarty, $global_config;

			foreach($ids as $id){
					for($i=0;$i<count($id);$i++) {
						$container_id = $id[$i];
						$strDelDetails = "DELETE FROM tbl_container WHERE id ='".$container_id."'";
						$this->DirectSQLDelete($strDelDetails, 0);
					}
        	}
	}
	
	
	/****************************************************************************************************************
	*	Function Name : deletepenalityfee								*	
	*	Description : Delete the deletepenalityfee details				*
	*****************************************************************************************************************/
	
	function deletepenalityfee($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_penalityfees WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	/****************************************************************************************************************
	*	Function Name : DeletecontainerPrice								*	
	*	Description : Delete the DeletecontainerPrice details				*
	*****************************************************************************************************************/
	
	function deletecontainerPrice($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_container_prices WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	/****************************************************************************************************************
	*	Function Name : DeleteTermsConditionDetails								*	
	*	Description : Delete the DeleteTermsConditionDetails details				*
	*****************************************************************************************************************/
	
	function DeleteTermsConditionDetails($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_template_management WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	/****************************************************************************************************************
	*	Function Name : DeleteContainerDetails								*	
	*	Description : Delete the DeleteContainerDetails details				*
	*****************************************************************************************************************/
	
	function DeletecontainerDetails($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_container WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	/****************************************************************************************************************
	*	Function Name : DeleteCategoryDetails								*	
	*	Description : Delete the DeleteCategoryDetails details				*
	*****************************************************************************************************************/
	function DeleteCategoryDetails($id) {
		global $objSmarty, $global_config;

		//$strDelDetails = "DELETE FROM tbl_category WHERE id ='".$id."'";
		$strDelDetails = "DELETE FROM tbl_container WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	/****************************************************************************************************************
	*	Function Name : DeleteadminuserDetails								*	
	*	Description : Delete the admin user details				*
	*****************************************************************************************************************/
	function DeleteadminuserDetails($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_users WHERE uid ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	/****************************************************************************************************************
	*	Function Name : DeleteTriggerDetails								*	
	*	Description : Delete the trigger details				*
	*****************************************************************************************************************/
	function DeleteTriggerDetails($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_trigger WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}

	/****************************************************************************************************************
	*	Function Name : InsertmappingDetails					*	
	*	Description : Inserting the mapping details				*
	*****************************************************************************************************************/
	function InsertmappingDetails($objarray) {
		global $objSmarty, $global_config;
		
		$strInsertArray = array(
								array("templatetitle",		$objarray['target']),
								array("templateid",		    $objarray['templateid']),
								array("target_string",		$objarray['string']),
								array("replace_field1", 	$objarray['replace_field1']),
								array("replace_field2", 	$objarray['replace_field2']),
								array("temp_pid", 			$objarray['PTemplateId']),
							);
		$this->common_Insert(tbl_mapping, $strInsertArray,'','',0);
	}

	/****************************************************************************************************************
	*	Function Name : Getmapping								*	
	*	Description : Getting the mapping values				*
	*****************************************************************************************************************/
	function Getmapping($type){
		global $objSmarty, $global_config;

		$objTables1 		=array('tbl_settings');
		$objFields1 		=array("value");
		$Mapping = $this->SelectQryOrder($objTables1,$objFields1,'','field = "mapping_table" ','','', '', '',0,'');
		$mappingvalue = $Mapping[0][0];
		$mappArray = explode(",",$mappingvalue);
		$objSmarty->assign("Map",$mappArray);
		

	}

	/****************************************************************************************************************
	*	Function Name : GetMappingFields								*	
	*	Description : Getting the mapping field values				*
	*****************************************************************************************************************/
	function GetMappingFields($objTables2) {
		global $objSmarty, $global_config;

		//$objTables2 ='tbl_mapping';
		$MapFields = $this->productserverSql('Show columns from '.$objTables2);

		$objSmarty->assign("MapFields",$MapFields);
		$MappingFields = $objSmarty->fetch("templates/ajax/mapping_fields.tpl");

		return $MappingFields;
	}

	/****************************************************************************************************************
	*	Function Name : GetmappingDetails						*	
	*	Description : Getting the mapping details				*
	*****************************************************************************************************************/
	function GetmappingDetails($PerPage='', $Page='', $Display='',$objArray=''){
		global $objSmarty, $global_config;

		if($PerPage=="") $PerPage = 10;
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;

		$objTables 		=array('tbl_mapping');
		$objFields 		=array("*");
		$where = " temp_pid in (select template_id from tbl_template where status=1) ";
		$MappingDetails = $this->SelectQryOrder($objTables,$objFields,'',$where,'','', $Start, $PerPage,0,'');
		$MappingDetailsCNT = "SELECT COUNT(id) as CNT FROM tbl_mapping where  temp_pid in (select template_id from tbl_template where status=1) ";
		$MappingDetailsCNT1 =$this->SelectQryDirect($MappingDetailsCNT,0);
		$TotalNum = $MappingDetailsCNT1[0][0];
		if($TotalNum < $Start){
			$Start = 0;
		}

		require $global_config["site_localpath"]."includes/perpage.php";
		$objSmarty->assign("intSearchPerPage", $intPerPage); //for PerPage

		$objSmarty->assign("MappingDetails",$MappingDetails);

		$MappingContent = $objSmarty->fetch("templates/ajax/mapping_ajax.tpl");

		return $MappingContent;
	}

	/****************************************************************************************************************
	*	Function Name : DeleteMapping						*	
	*	Description : Deleting the mapping details			*
	*****************************************************************************************************************/
	function DeleteMapping($id) {
		global $objSmarty, $global_config;

		$strDelDetails = "DELETE FROM tbl_mapping WHERE id ='".$id."'";
		$this->DirectSQLDelete($strDelDetails, 0);
	}
	
	
	/****************************************************************************************************************
	*	Function Name : productserverSql						*	
	*	Description : get data from production server			*
	*****************************************************************************************************************/
	function productserverSql($sql) {
		global $objSmarty, $global_config;
			
		

		$server="localhost";
		$db="container_rental";
		$user="root";
		$pwd="";
			
		$dbhandle = mysqli_connect($server, $user, $pwd, $db)
		  or die("Unable to connect to MySQL");
		$result = mysqli_query($dbhandle,$sql);
		$row = array(); 
	    $record = array();
		//fetch tha data from the database
		while ($row = mysqli_fetch_array($result)) {
			 $record[] = $row; 	
		}
		return $record;
	}
	
	/****************************************************************************************************************
	*	Function Name : ChangePassword					*	
	*	Description : Changing the password				*
	*****************************************************************************************************************/
	function ChangePassword($objArray) {
		global $objSmarty, $global_config;
		$userid = $_SESSION['container_rental_admin_id'];
		$strUpdateArray = array(
							array('password',md5($objArray['confirmpassword'])),
							);
		if($userid > 0) {
			$strWhereClause	= "uid = '".$userid."'";
			$this->common_Update_Set1($this->adminuserstable, $strUpdateArray, $strWhereClause,0);
		}
	}

	/****************************************************************************************************************
	*	Function Name : GetMappingTemplateDetails					*	
	*	Description : Getting the template edit details				*
	*****************************************************************************************************************/
	function GetMappingTemplateDetails() {
		global $global_config, $objSmarty;

		$objTables1 		=array('tbl_template');
		$objFields1 		=array("title,send_grid_email,schedule_format,schedule_hour,template_id");
		$strWhereClause	= "status = 1";
		$TemplateDetails1 = $this->SelectQryOrder($objTables1,$objFields1,'',$strWhereClause,'','', '', '',0,'');
		$objSmarty->assign("TemplateDetails",$TemplateDetails1);
		return $TemplateDetails;

	}

	/****************************************************************************************************************
	*	Function Name : GetMappingTemplateId								*	
	*	Description : Getting the mapping template id				*
	*****************************************************************************************************************/
	function GetMappingTemplateId($objarray) {
		global $global_config, $objSmarty;
		
		$MapingTemplate = "SELECT send_grid_email FROM tbl_template WHERE title='".$objarray."'";
		$MapingTemplateDetails = $this->SelectQryDirect($MapingTemplate,0);
		
		$objSmarty->assign("MapingTemplateDetails",$MapingTemplateDetails);

		$MappingTemplate = $objSmarty->fetch("templates/ajax/mapping_template.tpl");

		return $MappingTemplate;
	}
	
	
	/****************************************************************************************************************
	*	Function Name : GetMappingTemplateId								*	
	*	Description : Getting the mapping template id				*
	*****************************************************************************************************************/
	function GetMappingTemplateBysendId($objarray) {
		global $global_config, $objSmarty;
		
		$MapingTemplate = "SELECT * FROM  tbl_mapping WHERE templateid ='".$objarray."'";
		$MapingTemplateDetails = $this->SelectQryDirect($MapingTemplate,0);
		return $MapingTemplateDetails;
	}
	
	
	/****************************************************************************************************************
	*	Function Name : GetsendgridTemplate
	*	Description : Getting the mapping template id				*
	*****************************************************************************************************************/
	function GetsendgridTemplate() {
		global $objSmarty, $global_config;

		$sendgridsql = "SELECT * FROM tbl_settings where field='sendgrid_apikey'";
		$sendgriddetails =$this->SelectQryDirect($sendgridsql,0);
		$sendgrid_apikey = $sendgriddetails[0]['value'];
		$url = 'https://api.sendgrid.com/';
		$request =  $url.'v3/templates';
		$session = curl_init($request);
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($session);
		$responseArray = json_decode($response,true);
		$objSmarty->assign("template_list",$responseArray['templates']);
		curl_close($session);
	}
	
	

	/****************************************************************************************************************
	*	Function Name : Payment Process List								*	
	*	Description : Adding the Payment Process List log				*
	*****************************************************************************************************************/
	
	function getDeAssignContainerList($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		if($objArray['checked_container_number_val'] !=''){
			$container_ids_val = rtrim($objArray['checked_container_number_val'],',');
			$container_ids = "and container_number IN ($container_ids_val)";
		}else{
			$container_ids = '';
		}
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		$customer_id = $objArray['customer_id'];
		$objTables  = array("tbl_customer_container");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS count ");
		$strWhereClause = "customer_id = '".$customer_id."' $container_ids ";
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intPaymentPerPage",$intPerPage);	
		$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');

		/*echo '<pre>';
		print_r($rsValues);*/
		
		$total_price = 0;
		/********************************/
		$dataResult = array();
			foreach($rsValues as $key => $dataVal) {
					$yrdata= strtotime($dataVal['contract_start_date']);
					$contract_start_date =  $dataVal['contract_start_date'];
					$contract_next_due_date =  $dataVal['contract_next_due_date'];
					
					$current_date = date("d/m/Y ");// current date
					$diff = abs(strtotime($current_date) - strtotime($dataVal['contract_start_date']));
					
					$Related_priod = date('d/m/Y ', strtotime(str_replace("/", '-', $dataVal['contract_next_due_date']) . " +30 days"));
					
					$Related_priod_Result = $dataVal['contract_next_due_date'] .' - '. $Related_priod;
					
					
					$rsValues[$key]['Related_priod_Result'] = $Related_priod_Result;		
					$rsValues[$key]['contract_next_due_date'] = $dataVal['contract_start_date'];
					$contract_start_date = date("d/m/Y ", strtotime($dataVal['contract_start_date']));
					
					$now = strtotime(str_replace("/", '-', $contract_next_due_date)); // or your date as well
					$your_date = strtotime(str_replace("/", '-', $current_date));
					$datediff = $your_date - $now;
					$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
					$overdue = floor($datediff/(60*60*24));
					 
					$license_fee_amount_due_without_symbol 	= ( $overdue / 30 ) * $dataVal['licence_amount_vat'];
					$license_fee_amount_due_with_decimal 	= ( $overdue / 30 ) * $dataVal['licence_amount_vat'];
					
					$pound = '&pound; ';
					
					if ($license_fee_amount_due_with_decimal == $license_fee_amount_due_with_decimal && $license_fee_amount_due_with_decimal > 0) {
						$license_fee_amount_due_display_purpose =  $pound . $license_fee_amount_due_with_decimal;
					}else{
						$license_fee_amount_due_with_decimal_symbol = explode("-", $license_fee_amount_due_with_decimal);
						$license_fee_amount_due_display_purpose = "- " .$pound .  number_format((float)$license_fee_amount_due_with_decimal_symbol[1], 2, '.', '');
					}

					$rsValues[$key]['license_fee_amount_due_exact'] =   $license_fee_amount_due_with_decimal;

					// Add view with symbol					
					$rsValues[$key]['license_fee_amount_due_with_symbol'] =   $license_fee_amount_due_display_purpose;
					
					// Add calculate
					$rsValues[$key]['license_fee_amount_amount_due_without_symbol'] =   $license_fee_amount_due_without_symbol;
					
					if($overdue < 5){
						$penality = $pound.' 0';
						$penality_amount = '0';												
					}else if($overdue <=6 || $overdue <= 9){
						$penality = $pound.' 10';					
						$penality_amount = '10';												
					}else if($overdue <= 10 || $overdue <= 14){
						$penality = $pound.' 20';						
						$penality_amount = '20';												
					}else if($overdue <= 15 || $overdue <= 19 ){
						$penality = $pound.' 40';						
						$penality_amount = '40';												
					}else if($overdue >= 20){
						$penality = $pound.' 60';						
						$penality_amount = ' 60';						
					}
					
					$rsValues[$key]['penality'] = $penality;
					$total_price = $dataVal['licence_amount_vat'] + $dataVal['deposit_amount'] + $dataVal['miscellaneous'] + $penality_amount;					
					
					$rsValues[$key]['penality_amount'] = $penality_amount;					
					$rsValues[$key]['totalAmountDueColumn'] = $total_price;
					
					
					$get_container_price_qry = "SELECT * FROM tbl_container_prices where container_category='".$dataVal['container_type']."'";
					$Res_get_container_price_name = $this->SelectQryDirect($get_container_price_qry);		
					$rsValues[$key]['RepayDepositamount'] = $Res_get_container_price_name[0]['deposit_amount'];
					
					$Repayable_Total_amount_due_without_symbol = $license_fee_amount_due_without_symbol + ( - $Res_get_container_price_name[0]['deposit_amount']) + $dataVal['miscellaneous'] + $penality_amount;	
					$Repayable_Total_amount_due_with_decimal = $license_fee_amount_due_without_symbol + ( - $Res_get_container_price_name[0]['deposit_amount']) + $dataVal['miscellaneous'] + $penality_amount;							
					
					
					if ($Repayable_Total_amount_due_without_symbol == $Repayable_Total_amount_due_without_symbol && $Repayable_Total_amount_due_without_symbol > 0) {
						$Repayable_Total_amount_due_with_decimal_new =  $pound . $Repayable_Total_amount_due_without_symbol;
					}else{
						$Repayable_Total_amount_due_with_decimal_val = explode("-", $Repayable_Total_amount_due_without_symbol);
						//$Repayable_Total_amount_due_with_decimal = "- " .$pound .  $Repayable_Total_amount_due_with_decimal[1];
						$Repayable_Total_amount_due_with_decimal_new = "- " .$pound .  number_format((float)$Repayable_Total_amount_due_with_decimal_val[1], 2, '.', '');		
					}
					
					//echo $Repayable_Total_amount_due_with_decimal_new;
					$rsValues[$key]['Repayable_Total_amount_due_without_symbol'] = number_format((float)$Repayable_Total_amount_due_without_symbol, 2, '.', '');			
					$rsValues[$key]['Repayable_Total_amount_due'] = $Repayable_Total_amount_due_with_decimal_new;			
					

					$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
					$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
					$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
					#####################################

		}
		
		return $rsValues;
	}	
	
	function exportCSVPaymentReceiptList($PerPage='', $Page='', $Display='',$objArray='') {
		
		global $objSmarty, $global_config;
		
		
		$sort = $objArray["sort"];
		
		if($objArray["order"] != '')
		$order = $objArray["order"];
		else
		$order = 'ASC';
		
		$strOrderField	= "id";
		
		$objTables  = array("tbl_payment_history");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS pCnt ");
		$strWhereClause = "id > 0 ";
		
		if($objArray["customers_id"] != '') {
		$customer_id = $_SESSION['container_rental_admin_id'];
		$strWhereClause.= " AND customer_id =  '".$customer_id."' ";
		}
		
		if($objArray["get_payments_date_range"] != '' || $objArray["get_payments_date_range"] != '0') {
			$orders_id = trim($objArray[orders_id]);
				
			$objSmarty->assign("daterange", '0');		
				if($objArray["get_payments_date_range"] == 'today'){
				//$strWhereClause.= "AND create_date  >= NOW() - INTERVAL 24 HOUR";
				$strWhereClause.= "AND DATE(`create_date`) = CURDATE()";
				$objSmarty->assign("daterange", 'today');	
				}else if($objArray["get_payments_date_range"] == '7'){
					//$strWhereClause.= "AND create_date >= CURDATE() - INTERVAL 7 DAY ";	
					$strWhereClause.= "AND create_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND create_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY ";	 
					$objSmarty->assign("daterange", '7');					
				}else if($objArray["get_payments_date_range"] == '30'){
					//$strWhereClause.= "AND create_date >= CURDATE() - INTERVAL 30 DAY ";	
					//$strWhereClause.= "AND tbl_payment_history.create_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and tbl_payment_history.create_date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)"; 
					$strWhereClause.= "AND create_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()"; 
					 /* Greater or equal to the start of last month */
					  //create_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and
					  /* Smaller or equal than one month ago */
					  //create_date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)
					$objSmarty->assign("daterange", '30');					
				}else if($objArray["get_payments_date_range"] == 'all'){
					$strWhereClause.= "";	
					$objSmarty->assign("daterange", 'all');					
				}	
			
			$PerPage = 200;	
		}
	
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		

		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intEmailPerPage",$intPerPage);	
		if ($_REQUEST['pdffile'] == 1){
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, '',0,'');
		} else {
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, $PerPage,0,'');
		}	

		foreach($rsValues as $key => $dataVal) {
			
			$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
			$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
			$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
		}
		
		
		
		$output	   = "";
		$output    ="S.No\tContainer Type\tContainer Number\tPayment Date\tPayment Method\tLicense Fee Amount\tDeposit Fee Amount\tMiscellaneous Fee Amount\tPenality Fee Amount\tNumber of months paid for\tTotal Receipt Amount"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($rsValues as $row){
				
				$output				.=	$s_no."\t";
				$output				.=	$row['container_type']."\t";
				$output				.=	$row['containerName']."\t";
				$output				.=	$row['create_date']."\t"; 
				$output				.=	$row['payment_type']."\t";
				$output				.=	$row['license']."\t";
				$output				.=	$row['deposit']."\t";
				$output				.=	$row['miscellaneous']."\t";
				$output				.=	$row['penality']."\t";
				$output				.=	$row['total_month_paid']."\t";
				$output				.=	$row['total_amount_due']."\t";				
				$output .="\n";
				$s_no++;	
		}
		
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Payment_Receipts_List.xls"');
		echo $output;
		exit;
		
		
		/*****Mail attachment ********/
		/*$cr = "\n";
		$csvdata = "First Name" . ',' . "Last Name"  . $cr;
		$csvdata .= $txtFName . ',' . $txtLName . $cr;
		
		$thisfile = 'file.csv';*/
		
		/*$encoded = chunk_split(base64_encode($output));
		
		// create the email and send it off
		
		$subject = "Payment Receipts";
		$from = "dancersaran13@gmail.com";
		$headers = 'MIME-Version: 1.0' . "\n";
		$headers .= 'Content-Type: multipart/mixed;
		boundary="----=_NextPart_001_0011_1234ABCD.4321FDAC"' . "\n";
		
		$message = '
		
		Hello
		
		We have attached for you the Payment Receipts that you requested.
		
		Regards
		Container';
		
		$message .= "$output";
		$message .= '"
		Content-Transfer-Encoding: base64
		Content-Disposition: attachment; filename="';
		$message .= "$output";
		$message .= '"
		
		';
		$message .= "$encoded";
		$message .= '
		';
		$email = 'saravanan@securenext.in';
		// now send the email
		mail($email, $subject, $message, $headers, "-f$from");*/
	
		
		
	}	
	
	
	
	/* Mail send with csv attachment starts here August 17,2016 */
	function sendMailAttachmentCSV($PerPage='', $Page='', $Display='',$objArray='') {
	
		
		global $objSmarty, $global_config;
		
		
		$sort = $objArray["sort"];
		
		if($objArray["order"] != '')
		$order = $objArray["order"];
		else
		$order = 'ASC';
		
		$strOrderField	= "id";
		
		$objTables  = array("tbl_payment_history");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS pCnt ");
		$strWhereClause = "id > 0 ";
		
		if($objArray["customers_id"] != '') {
		$customer_id = $_SESSION['container_rental_admin_id'];
		$strWhereClause.= " AND customer_id =  '".$customer_id."' ";
		}
		
		if($objArray["get_payments_date_range"] != '' || $objArray["get_payments_date_range"] != '0') {
			$orders_id = trim($objArray[orders_id]);

			$objSmarty->assign("daterange", '0');		
				if($objArray["get_payments_date_range"] == 'today'){
				//$strWhereClause.= "AND create_date  >= NOW() - INTERVAL 24 HOUR";
				$strWhereClause.= "AND DATE(`create_date`) = CURDATE()";
				$objSmarty->assign("daterange", 'today');	
				}else if($objArray["get_payments_date_range"] == '7'){
					//$strWhereClause.= "AND create_date >= CURDATE() - INTERVAL 7 DAY ";	
					$strWhereClause.= "AND create_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND create_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY ";	 
					$objSmarty->assign("daterange", '7');					
				}else if($objArray["get_payments_date_range"] == '30'){
					//$strWhereClause.= "AND create_date >= CURDATE() - INTERVAL 30 DAY ";	
					//$strWhereClause.= "AND tbl_payment_history.create_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and tbl_payment_history.create_date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)"; 
					$strWhereClause.= "AND create_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()"; 
					 /* Greater or equal to the start of last month */
					  //create_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and
					  /* Smaller or equal than one month ago */
					  //create_date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)
					$objSmarty->assign("daterange", '30');					
				}else if($objArray["get_payments_date_range"] == 'all'){
					$strWhereClause.= "";	
					$objSmarty->assign("daterange", 'all');					
				}	
			
			$PerPage = 200;	
		}
	
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		

		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intEmailPerPage",$intPerPage);	
		if ($_REQUEST['pdffile'] == 1){
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, '',0,'');
		} else {
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, $PerPage,0,'');
		}	

		foreach($rsValues as $key => $dataVal) {
			
			$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
			$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
			$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
		}
		
		
		
		$output	   = "";
		$output    ="S.No\tContainer Type\tContainer Number\tPayment Date\tPayment Method\tLicense Fee Amount\tDeposit Fee Amount\tMiscellaneous Fee Amount\tPenality Fee Amount\tNumber of months paid for\tTotal Receipt Amount"; 
		$output .="\n";
		$s_no	=	1;	
		
		foreach($rsValues as $row){
		
		$pos4 = strpos($row['license'], "-");
			// total_amount_due end						
			if($pos4 !== false) {
				$total_amount_due_val = explode("-", $row['license']);
				$total_amount_due_val_final = $total_amount_due_val[1];
				$row_license = '- £'.$total_amount_due_val_final;
			}else{
				$row_license = '£ '.$row['license'];		
			}	
			
			$pos5 = strpos($row['deposit'], "-");
			// total_amount_due end						
			if($pos5 !== false) {
				$total_amount_due_val = explode("-", $row['deposit']);
				$total_amount_due_val_final = $total_amount_due_val[1];
				$row_deposit = '- £'.$total_amount_due_val_final;
			}else{
				$row_deposit = '£ '.$row['deposit'];		
			}	
			
			$pos6 = strpos($row['miscellaneous'], "-");
			// total_amount_due end						
			if($pos6 !== false) {
				$total_amount_due_val = explode("-", $row['miscellaneous']);
				$total_amount_due_val_final = $total_amount_due_val[1];
				$row_miscellaneous = '- £'.$total_amount_due_val_final;
			}else{
				$row_miscellaneous = '£ '.$row['miscellaneous'];		
			}	
			
			
				$pos7 = strpos($row['penality'], "-");
			// total_amount_due end						
			if($pos7 !== false) {
				$total_amount_due_val = explode("-", $row['penality']);
				$total_amount_due_val_final = $total_amount_due_val[1];
				$row_penality = '- £'.$total_amount_due_val_final;
			}else{
				$row_penality = '£ '.$row['penality'];		
			}	
			
		$pos8 = strpos($row['total_amount_due'], "-");
			// total_amount_due end						
			if($pos8 !== false) {
				$total_amount_due_val = explode("-", $row['total_amount_due']);
				$total_amount_due_val_final = $total_amount_due_val[1];
				$row_total_amount_due = '- £'.$total_amount_due_val_final;
			}else{
				$row_total_amount_due = '£ '.$row['total_amount_due'];		
			}	
			
				
				$output				.=	$s_no."\t";
				$output				.=	$row['container_type']."\t";
				$output				.=	$row['containerName']."\t";
				$output				.=	$row['create_date']."\t"; 
				$output				.=	$row['payment_type']."\t";
				$output				.=	$row_license."\t";
				$output				.=	$row_deposit."\t";
				$output				.=	$row_row_miscellaneous."\t";
				$output				.=	$row_penality."\t";
				$output				.=	$row['total_month_paid']."\t";
				$output				.=	$row_total_amount_due."\t";				
				$output .="\n";
				$s_no++;	
		}
		
		/*header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Payment_Receipts_List.xls"');
		echo $output;
		exit;*/
		
		$csv_handler = fopen ($global_config["site_localpath"].'uploads/expenses/payment_receipts_boss.csv','w');
		fwrite ($csv_handler,$output);
		fclose ($csv_handler);
		
	$file = $global_config["site_localpath"].'uploads/expenses/payment_receipts_boss.csv';

 //define the receiver of the email 
$to = $_REQUEST['ctmemails']; 
//define the subject of the email 
$subject = 'Payment Receipts'; 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash 
$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n 
$headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com"; 
//add boundary string and mime type specification 
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents($global_config["site_localpath"].'uploads/expenses/payment_receipts_boss.csv'))); 
//define the body of the message. 
ob_start(); //Turn on output buffering 
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

Hello World!!! 
This is simple text email message. 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<h2>Hello</h2> 
<p> Please check the attachement about the <b> Payment Receipts </b></p> 

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/zip; name="payment_receipts_boss.csv"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
//copy current buffer contents into $message variable and delete current output buffer 
$message = ob_get_clean(); 
//send the email 
$mail_sent = @mail( $to, $subject, $message, $headers ); 
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
$mail_sent ? "Mail sent" : "Mail failed"; 
 


	
	}
	/* Mail send with csv attachment ends here August 17,2016 */
	
	function getNewExpenseList($PerPage='', $Page='', $Display='',$objArray=''){
    	global $objSmarty, $global_config;
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;

		$user_type = $new[0]['user_type'];
		/*added new end*/
		$objTables  = array("tbl_expenses");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS pCnt ");
		//$strWhereClause = "id != '' ";
			
		if ($objArray['expenses_start_date']!='' &&  $objArray['expenses_end_date']!=''  ) {
			 $strWhereClause.= " date_incurred BETWEEN '".$objArray['expenses_start_date']."' and '".$objArray['expenses_end_date']."'";	
		}
		 
	    if($strWhereClause!=''){	 
	  	   if ($objArray['search_by']!='') {
			  $strWhereClause.= " or description LIKE '%".$objArray['search_by']."%'";		
		   } 
        }
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$TotalNum = count($ProjectCount);
		/*echo '<pre>';
		print_r($ProjectCount);
		exit;*/
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intEmailPerPage",$intPerPage);	
	    $rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, $PerPage,0,'');		
			
	    foreach($rsValues as $key => $dataVal) {
			$get_container_name_qry = "SELECT * FROM tbl_expenses where id='".$dataVal['id']."'";
			$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);	

			$rsValues[$key]['id'] = $Res_get_container_name[0]['id'];
		}
		//prePopulate($objArray);strpos
		$objSmarty->assign("ViewExpenseList", $rsValues);
		return $rsValues;
	}
	
	
	/* Mail send with csv attachment ends here August 17,2016 */
	
	
	function getNewPaymentReceiptList($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		
		$sort = $objArray["sort"];
		
		if($objArray["order"] != '')
		$order = $objArray["order"];
		else
		$order = 'ASC';
		
		$strOrderField	= "id";
		
		$objTables  = array("tbl_payment_history");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS pCnt ");
		$strWhereClause = "id > 0 ";
		
		if($objArray["customers_id"] != '') {
		$customer_id = $_SESSION['container_rental_admin_id'];
		$strWhereClause.= " AND customer_id =  '".$customer_id."' ";
		}
		
		if($objArray["get_payments_date_range"] != '' || $objArray["get_payments_date_range"] != '0') {
			$orders_id = trim($objArray[orders_id]);
/*echo '<pre>';
print_r($objArray["get_payments_date_range"]);
exit;*/
//			$objSmarty->assign("daterange", '0');		
				if($objArray["get_payments_date_range"] == 'today'){

				//$strWhereClause.= "AND create_date  >= NOW() - INTERVAL 24 HOUR";
				$strWhereClause.= "AND DATE(`create_date`) = CURDATE()";
				$objSmarty->assign("daterange", 'today');	
				}else if($objArray["get_payments_date_range"] == '7'){
					//$strWhereClause.= "AND create_date >= CURDATE() - INTERVAL 7 DAY ";	
					$strWhereClause.= "AND create_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY AND create_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY ";	 
					$objSmarty->assign("daterange", '7');					
				}else if($objArray["get_payments_date_range"] == '30'){
					//$strWhereClause.= "AND create_date >= CURDATE() - INTERVAL 30 DAY ";	
					//$strWhereClause.= "AND tbl_payment_history.create_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and tbl_payment_history.create_date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)"; 
					$strWhereClause.= "AND create_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()"; 
					 /* Greater or equal to the start of last month */
					  //create_date >= DATE_ADD(LAST_DAY(DATE_SUB(NOW(), INTERVAL 2 MONTH)), INTERVAL 1 DAY) and
					  /* Smaller or equal than one month ago */
					  //create_date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)
					$objSmarty->assign("daterange", '30');					
				}else if($objArray["get_payments_date_range"] == 'all'){
					$strWhereClause.= "";	
					$objSmarty->assign("daterange", 'all');					
				}	
			
			$PerPage = 200;	
		}
	
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;

		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intEmailPerPage",$intPerPage);	
		if ($_REQUEST['pdffile'] == 1){
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, '',0,'');
		} else {
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, $PerPage,0,'');
		}	

		foreach($rsValues as $key => $dataVal) {
			
			$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
			$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
			$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
			


			$pos = strpos($dataVal['license'], "-");


			// license start
			if($pos !== false) {
				$license_val = explode("-", $dataVal['license']);
				$license_val_final = $license_val[1];
				$rsValues[$key]['license'] = "- &pound ".$license_val_final;
			}else{
				$rsValues[$key]['license'] = "&pound ".$dataVal['license'];		
			}
			// license end			
			
			$pos1 = strpos($dataVal['deposit'], "-");
			// deposit start			
			if($pos1 !== false) {
				$deposit_val = explode("-", $dataVal['deposit']);
				$deposit_val_final = $deposit_val[1];
				$rsValues[$key]['deposit'] = "- &pound ".$deposit_val_final;
			}else{
				$rsValues[$key]['deposit'] = "&pound ".$dataVal['deposit'];		
			}
			// deposit end						
			
			
			$pos2 = strpos($dataVal['miscellaneous'], "-");
			// miscellaneous end						
			if($pos2 !== false) {
				$miscellaneous_val = explode("-", $dataVal['miscellaneous']);
				$miscellaneous_val_final = $miscellaneous_val[1];
				$rsValues[$key]['miscellaneous'] = "- &pound ".$miscellaneous_val_final;
			}else{
				$rsValues[$key]['miscellaneous'] = "&pound ".$dataVal['miscellaneous'];		
			}
			// miscellaneous end	
			
			
			$pos3 = strpos($dataVal['penality'], "-");
			// penality end						
			if($pos3 !== false) {
				$penality_val = explode("-", $dataVal['penality']);
				$penality_val_final = $penality_val[1];
				$rsValues[$key]['penality'] = "- &pound ".$penality_val_final;
			}else{
				$rsValues[$key]['penality'] = "&pound ".$dataVal['penality'];		
			}
			// miscellaneous end	
			
			$pos4 = strpos($dataVal['total_amount_due'], "-");
			// total_amount_due end						
			if($pos4 !== false) {
				$total_amount_due_val = explode("-", $dataVal['total_amount_due']);
				$total_amount_due_val_final = $total_amount_due_val[1];
				$rsValues[$key]['total_amount_due'] = "- &pound ".$total_amount_due_val_final;
			}else{
				$rsValues[$key]['total_amount_due'] = "&pound ".$dataVal['total_amount_due'];		
			}
			// miscellaneous end				
								
			
		}
		
		/*echo '<pre>';
		print_r($rsValues);
		exit;*/
		//prePopulate($objArray);strpos
		$objSmarty->assign("ViewPaymentReceiptList", $rsValues);
		return $rsValues;
	}
		
		
		
	
	/****************************************************************************************************************
	*	Function Name : getViewPaymentReceiptList								*	
	*	Description : Getting the All payments Receipts				*
	*****************************************************************************************************************/
	
	function getViewPaymentReceiptList111($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		
		$customer_id = $_SESSION['container_rental_admin_id'];
		
		$objTables  = array("tbl_payment_history");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS count ");
		$strWhereClause = "customer_id = '".$customer_id."'";
		//$strWhereClause = " ";	
		
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		//$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'','', '', '', '', '',0,'');
		$TotalNum = count($ProjectCount);
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intPaymentPerPage",$intPerPage);	
		//$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$rsValues = $this->SelectQryOrder($objTables, $objFields,'','', '', '', '', '',0,'');

		$total_price = 0;
		/********************************/
		$dataResult = array();
			foreach($rsValues as $key => $dataVal) {
					$pound = '&pound;';
					
					$contract_start_date =  $dataVal['container_type'];
					$container_number	 =  $dataVal['container_number'];
					$payment_date 		 =  $dataVal['create_date'];
					$payment_type		 =  $dataVal['payment_type'];
					$license_amount		 =  $dataVal['license'];
					$deposit_amount		 =  $dataVal['deposit'];
					$miscellaneous_amt	 =  $dataVal['miscellaneous'];
					$penality_amount	 =  $dataVal['penality'];
					$number_of_months	 =  'Static- 2';	// number_of_months				
					$total_amount_due	 =  $dataVal['total_amount_due'];
					$user_ID_name		 =  'User Id Name';																									
					
					$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
					$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
					$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
					
					
					//$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
					//$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
					#####################################

		}
		return $rsValues;
	}

	/****************************************************************************************************************
	*	Function Name : Payment Process List								*	
	*	Description : Adding the Payment Process List log				*
	*****************************************************************************************************************/
	
	function getPaymentProcessList($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		if($objArray['checked_container_number_val'] !=''){
			//$container_ids_val = "'" . implode("', '", $objArray['checked_container_number_val']) . "'";
			$container_ids_val = rtrim($objArray['checked_container_number_val'],',');
			$container_ids = "and container_number IN ($container_ids_val)";
		}else{
			$container_ids = '';
		}
		//checked_container_number_val
		/*echo '<pre>';
		print_r($objArray);*/
		
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		$customer_id = $objArray['customer_id'];
		$objTables  = array("tbl_customer_container");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS count ");
		$strWhereClause = "customer_id = '".$customer_id."' $container_ids ";
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intPaymentPerPage",$intPerPage);	
		$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');

		/*echo '<pre>';
		print_r($strWhereClause);
		echo '*******************************************';
		print_r($objFields);
		echo '*******************************************';
		print_r($rsValues);
		exit;*/
		/*echo '*******************************************';		
		echo '<pre>';
		print_r($rsValues);
		echo '*******************************************';*/
		$total_price = 0;
		/********************************/
		$dataResult = array();
			foreach($rsValues as $key => $dataVal) {
					$yrdata= strtotime($dataVal['contract_start_date']);
					$contract_start_date =  $dataVal['contract_start_date'];
					$contract_next_due_date =  $dataVal['contract_next_due_date'];
					$Related_priod = date('d/m/Y ', strtotime(str_replace("/", '-', $dataVal['contract_next_due_date']) . " +30 days"));
					
					$Related_priod_Result = $dataVal['contract_next_due_date'] .' - '. $Related_priod;
					$current_date = date("d/m/Y ");// current date
					$diff = abs(strtotime($current_date) - strtotime($dataVal['contract_start_date']));
					
					$rsValues[$key]['Related_priod_Result'] = $Related_priod_Result;		
					$rsValues[$key]['contract_next_due_date'] = $dataVal['contract_start_date'];
					$contract_start_date = date("d/m/Y ", strtotime($dataVal['contract_start_date']));
					
					$now = strtotime(str_replace("/", '-', $contract_next_due_date)); // or your date as well
					$your_date = strtotime(str_replace("/", '-', $current_date));
					$datediff = $your_date - $now;
					$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
					$overdue = floor($datediff/(60*60*24));
					 
					$pound = '&pound;';
					
					if($overdue < 5){
						$penality = $pound.' 0';
						$penality_amount = '0';												
					}else if($overdue <=6 || $overdue <= 9){
						$penality = $pound.' 10';					
						$penality_amount = '10';												
					}else if($overdue <= 10 || $overdue <= 14){
						$penality = $pound.' 20';						
						$penality_amount = '20';												
					}else if($overdue <= 15 || $overdue <= 19 ){
						$penality = $pound.' 40';						
						$penality_amount = '40';												
					}else if($overdue >= 20){
						$penality = $pound.' 60';						
						$penality_amount = ' 60';						
					}
					
					$rsValues[$key]['penality'] = $penality;
					
					$total_price = $dataVal['licence_amount_vat'] + $dataVal['deposit_amount'] + $dataVal['miscellaneous'] + $penality_amount;					
					//echo '<br>';
					$rsValues[$key]['penality_amount'] = $penality_amount;					
					
					$rsValues[$key]['totalAmountDueColumn'] = $total_price;
					
					
					#####################################	
					//$container_number = $dataVal[$key]['container_number'];			
					/*echo '<br>';
					echo '#####################################'; 					
					echo '<br>';
					echo $get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
					echo '<br>';	
					echo '#####################################'; 										
					echo '<br>';*/
					
					$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
					$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
					//echo '<pre>'; 
					//print_r($Res_get_container_name);
					
					// Get the container name 
					//echo 'containerName :'.$containerName = $Res_get_container_name[0]['name'];
					//$rsValues[0]['containerName'] = $containerName;
					$rsValues[$key]['containerName'] = $Res_get_container_name[0]['name'];
					#####################################

		}
		
		/*echo '<pre>';
		print_r($rsValues);
		exit;*/
		/********************************/
		return $rsValues;
		
	}
	
	
	
	/****************************************************************************************************************
	*	Function Name : Payment History List								*	
	*	Description : Adding the Payment History List log				*
	*****************************************************************************************************************/
	
	function getPreviousPaymentHistoryList($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		
		$customer_id = $objArray['customer_id'];
		$objTables  = array("tbl_payment_history");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS count ");
		$strWhereClause = "customer_id = '".$customer_id."' ";
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$TotalNum = count($ProjectCount);
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intPaymentPerPage",$intPerPage);	
		$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		$total_price = 0;

		/********************************/
		$dataResult = array();
			foreach($rsValues as $key => $dataVal) {
				$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
				$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
				// Get the container name 
				$containerName = $Res_get_container_name[0]['name'];
				$rsValues[$key]['containerName'] = $containerName;
		}			 
				
		return $rsValues;
	}
	
	/****************************************************************************************************************
	*	Function Name : changeContainerStatusFun					*	
	*	Description : Updating the Container status				*
	*****************************************************************************************************************/
	function changeContainerStatusFun($objArray) {
		global $objSmarty, $global_config;

		$container_id = $objArray['container_id'];
		$customer_id = $objArray['customer_id'];
		$status = $objArray['status'];

		$strTable = tbl_container;
		$strUpdateArray = array(
								array("status", 	$status),
							);
		if($container_id > 0) {
			$strWhereClause	= "id = '".$container_id."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
		
		$strTable1 = tbl_customer_container;
		$strUpdateArray1 = array(
								array("status", 	$status),
							);
		if($container_id > 0) {
			$strWhereClause1	= "customer_id 	= '".$customer_id."' and container_number = '".$container_id."'";

			$this->common_Update_Set1($strTable1, $strUpdateArray1, $strWhereClause1,0);
		}
		echo 'success';
		exit;
		//header("location:payment_history.php?customer_id=".$customer_id."&msgcode=15");
		//exit;
	}

	
	/****************************************************************************************************************
	*	Function Name : Payment History List								*	
	*	Description : Adding the Payment History List log				*
	*****************************************************************************************************************/
	
	function getPaymentHistoryList($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		
		$customer_id = $objArray['customer_id'];
		$objTables  = array("tbl_customer_container");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS count ");
		$strWhereClause = "customer_id = '".$customer_id."' and status !='Available'";
		
		//echo '<pre>';
		//print_r($objArray);
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intPaymentPerPage",$intPerPage);	

		$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
	
		$total_price = 0;

		/********************************/
		$dataResult = array();
			foreach($rsValues as $key => $dataVal) {
				$yrdata= strtotime($dataVal['contract_start_date']);
				//$contract_start_date =  date('d/m/Y ', $yrdata);
				
				$contract_start_date =  $dataVal['contract_start_date'];
				$contract_next_due_date =  $dataVal['contract_next_due_date'];
			
				$Related_priod = date('d/m/Y ', strtotime(str_replace("/", '-', $dataVal['contract_next_due_date']) . " +30 days"));
				$Related_priod_Result = $dataVal['contract_next_due_date'] .' - '. $Related_priod;
				$current_date = date("d/m/Y ");// current date
			
				$rsValues[$key]['Related_priod_Result'] = $Related_priod_Result;		
				$rsValues[$key]['contract_next_due_date'] = $dataVal['contract_next_due_date'];

				$now = strtotime(str_replace("/", '-', $contract_next_due_date)); // or your date as well
				$your_date = strtotime(str_replace("/", '-', $current_date));
				$datediff = $your_date - $now;
				$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
				$overdue = floor($datediff/(60*60*24));
				
				$pound = '&pound;';
				
				if($overdue < 5){
					$penality = $pound.' 0';
					$penality_amount = '0';												
				}else if($overdue <=6 || $overdue <= 9){
					$penality = $pound.' 10';					
					$penality_amount = '10';												
				}else if($overdue <= 10 || $overdue <= 14){
					$penality = $pound.' 20';						
					$penality_amount = '20';												
				}else if($overdue <= 15 || $overdue <= 19 ){
					$penality = $pound.' 40';						
					$penality_amount = '40';												
				}else if($overdue >= 20){
					$penality = $pound.' 60';						
					$penality_amount = ' 60';						
				}
				
				$rsValues[$key]['penality'] = $penality;
				$total_price = $dataVal['licence_amount_vat'] + $dataVal['deposit_amount'] + $dataVal['miscellaneous'] + $penality_amount;					
				
				$rsValues[$key]['totalAmountDueColumn'] = $total_price;
				#####################################	
				//$container_number = $dataVal[$key]['container_number'];			
				$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
				//echo '<br>';
				$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
				// Get the container name 
				$containerName = $Res_get_container_name[0]['name'];
				$rsValues[$key]['containerName'] = $containerName;
				#####################################
			
			}			 
		return $rsValues;
	}
	
	
	/****************************************************************************************************************
	*	Function Name : addemail								*	
	*	Description : Adding the Email log				*
	*****************************************************************************************************************/
	function addemail($objarray) {
		global $objSmarty, $global_config;
		
		$strInsertArray = array(
								array("customers_id",	$objarray['customers_id']),
								array("customers_email_address", 	$objarray['customers_email_address']),
								array("orders_id", 	$objarray['orders_id']),
								array("temp_id", 	$objarray['temp_id']),
								array("temp_name", 	$objarray['temp_name']),
								array("assign_date", 	$objarray['assign_date']),
								array("Schedule_date", 	$objarray['Schedule_date']),
							);
		$this->common_Insert(tbl_email, $strInsertArray,'','',0);
	}
	
	
	
	
	
	function getEmailList($PerPage='', $Page='', $Display='',$objArray='') {
		global $objSmarty, $global_config;
		
		if($Page=="") $Page = 0; 
		if($Display=="") $Display = 1;
		$Start = $Page * $PerPage;
		
		$sort = $objArray["sort"];
		
		if($objArray["order"] != '')
			$order = $objArray["order"];
		else
			$order = 'ASC';
		
		if($sort == "customers_id") {
			$strOrderField	= "customers_id";
		} elseif($sort == "customers_email_address") {
			$strOrderField	= "customers_email_address";
		} elseif($sort == "orders_id") {
			$strOrderField	= "	orders_id";
		} elseif($sort == "temp_id") {
			$strOrderField	= "temp_id";
		} elseif($sort == "temp_name") {
			$strOrderField	= "temp_name";
		} elseif($sort == "assign_date") {
			$strOrderField	= "assign_date";	
		} elseif($sort == "Schedule_date") {
			$strOrderField	= "Schedule_date";		
		} else {
			$strOrderField	= "id";
		}
		
		$objSmarty->assign($sort."sort",$order);
		
		$objTables  = array("tbl_email");
		$objFields = array("*");
		$objFields1 = array(" COUNT(id) AS pCnt ");
		$strWhereClause = "status = '1' ";
		
		if($objArray["customers_id"] != '') {
			$customers_id = trim($objArray[customers_id]);
			$strWhereClause.= " AND customers_id =  '".$customers_id."' ";
		}
		
		if($objArray["orders_id"] != '') {
			$orders_id = trim($objArray[orders_id]);
			$strWhereClause.= " AND orders_id =  '".$orders_id."' ";
		}
		
		if($objArray["temp_id"] != '') {
			$temp_id = trim($objArray[temp_id]);
			$strWhereClause.= " AND temp_id =  '".$temp_id."' ";
		}
		
		if($objArray["temp_name"] != '') {
			$temp_name = trim($objArray[temp_name]);
			$strWhereClause.= " AND temp_name Like  '%".$temp_name."%' ";
		}
		
		if($objArray["customers_email_address"] != '') {
			$customers_email_address = trim($objArray[customers_email_address]);
			$strWhereClause.= " AND customers_email_address Like  '%".$customers_email_address."%' ";
		}
		
		
		if($objArray["assign_from_date"] != '') {
			$date_from	 = explode("/", $objArray["assign_from_date"]);
			$datefrom	 = $date_from[2]."-".$date_from[0]."-".$date_from[1];
			$strWhereClause.= " AND DATE(assign_date) >= '$datefrom' ";
		}
		if($objArray["assign_to_date"] != '') {
			$date_to	 = explode("/", $objArray["assign_to_date"]);
			$dateto		 = $date_to[2]."-".$date_to[0]."-".$date_to[1];
			$strWhereClause.= " AND DATE(assign_date) <= '$dateto' ";
		}
		
		if($objArray["schedule_from_date"] != '') {
			$sdate_from	 = explode("/", $objArray["schedule_from_date"]);
			$sdatefrom	 = $sdate_from[2]."-".$sdate_from[0]."-".$sdate_from[1];
			$strWhereClause.= " AND DATE(Schedule_date) >= '$sdatefrom' ";
		}
		if($objArray["schedule_to_date"] != '') {
			$sdate_to	 = explode("/", $objArray["schedule_to_date"]);
			$sdateto		 = $sdate_to[2]."-".$sdate_to[0]."-".$sdate_to[1];
			$strWhereClause.= " AND DATE(Schedule_date) <= '$sdateto' ";
		}
		
		
		
		$ProjectCount = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, '', '', '', '',0,'');
		
		$TotalNum = count($ProjectCount);
		
		require_once($global_config["site_localpath"]."includes/perpage.php");
		$objSmarty->assign("intEmailPerPage",$intPerPage);	
		if ($_REQUEST['pdffile'] == 1){
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, '',0,'');
		} else {
			$rsValues = $this->SelectQryOrder($objTables, $objFields,'',$strWhereClause, $strOrderField, $order, $Start, $PerPage,0,'');
		}	

		prePopulate($objArray);
		$objSmarty->assign("EmailList", $rsValues);
		
		return $rsValues;
	}
	
	/****************************************************************************************************************
	*	Function Name : UpdateSettingsDetails								*	
	*	Description : Updating the settings details				*
	*****************************************************************************************************************/
	function UpdateSettingsDetailsValues($values) {
		global $objSmarty, $global_config;

		$strTable = tbl_settings;
		$strUpdateArray = array(
								array("value", 	$values),
							);
		
		$strWhereClause	= " field='last_order_no'";
		$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		
	}
	
	
	
	/****************************************************************************************************************
	*	Function Name : updatetempstatus					*	
	*	Description : Updating the template status				*
	*****************************************************************************************************************/
	function updatetempstatus($objArray) {
		global $objSmarty, $global_config;

		$strTable = tbl_template;
		$strUpdateArray = array(

											array("status", 	$objArray['status']),
							);

		if($objArray['id'] > 0) {
			$strWhereClause	= "template_id = '".$objArray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	/****************************************************************************************************************
	*	Function Name : updateSMSschdulestatus					*	
	*	Description : Updating the updateSMSschdulestatus status				*
	*****************************************************************************************************************/
	function changeSMSscheduleStatus($objArray) {
		global $objSmarty, $global_config;
		
		$strTable = 'tbl_sms_schedule';
		$strUpdateArray = array(
							array("status", 	$objArray['status']),
							);
		if($objArray['schedule_type'] !='') {
			$strWhereClause	= "schedule_type = '".$objArray['schedule_type']."'";
			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
		echo 'success';
		exit;
	}
	
	/****************************************************************************************************************
	*	Function Name : Payment History List								*	
	*	Description : Adding the Payment History List log				*
	*****************************************************************************************************************/
	
	function getSMSscheduleStatus($objArray) {
		global $objSmarty, $global_config;
		
			#####################################	
			$get_smsSchedule_qry = "SELECT * FROM tbl_sms_schedule";
			$Res_get_smsSchedule = $this->SelectQryDirect($get_smsSchedule_qry);		
			//$containerName = $Res_get_smsSchedule[0]['name'];
			//$rsValues[$key]['containerName'] = $containerName;
			#####################################
			
		return $Res_get_smsSchedule;
	}

	/****************************************************************************************************************
	*	Function Name : adminuserstatus					*	
	*	Description : Updating the template status				*
	*****************************************************************************************************************/
	function updateadminuserstatus($objArray) {
		global $objSmarty, $global_config;
		/*echo '<pte>';
		print_r($objArray);
		exit;*/
		
		$strTable = 'tbl_users';
		
		$txt_status = '';
		
		if($objArray['status'] !='0'){
			$txt_status = 'Active';
		}else{
			$txt_status = 'Inactive';			
		}
	
		
		$strUpdateArray = array(

											array("status", 	$objArray['status']),
							);
			/*	echo $strTable; 
				echo '<pre>';
				print_r($strUpdateArray);
				$strWhereClause	= "uid = '".$objArray['id']."'";
				echo $strWhereClause;
				exit;*/
		if($objArray['uid'] > 0) {
			$strWhereClause	= "uid = '".$objArray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
		
		
	}
	
	
		
	/****************************************************************************************************************
	*	Function Name : updatetriggerstatus					*	
	*	Description : Updating the template status				*
	*****************************************************************************************************************/
	function updatetriggerstatus($objArray) {
		global $objSmarty, $global_config;

		$strTable = tbl_trigger;
		$strUpdateArray = array(

											array("status", 	$objArray['status']),
							);

		if($objArray['id'] > 0) {
			$strWhereClause	= "id = '".$objArray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	
	/****************************************************************************************************************
	*	Function Name : getEmailListByID								*	
	*	Description : Getting the order data, user data and add schedule email to sendgrid. 				*
	*****************************************************************************************************************/
	function getEmailListByID($objArray='') {
		global $objSmarty, $global_config;

		
		$TriggerList = "SELECT * FROM tbl_trigger where id='".$objArray['id']."'";
		$TriggerDetails =$this->SelectQryDirect($TriggerList,0);
		$schedlueArray = array();
		
			
		$sendgridsql = "SELECT * FROM tbl_settings where field='sendgrid_apikey'";
		$sendgriddetails =$this->SelectQryDirect($sendgridsql,0);
		$sendgrid_apikey = $sendgriddetails[0]['value'];
	
		
		
		foreach($TriggerDetails as $Trigger){
			
			
		$orders_idsql = "select orders_id  from tbl_email where temp_id ='".$Trigger['temp_id']."'";
		$orders_ids =$this->SelectQryDirect($orders_idsql,0);
		$oidArray = array();
		foreach($orders_ids as $oid){
			$oidArray[]=$oid['orders_id'];
		}			
		$ordersstring = implode(",",$oidArray);
		
			if ($Trigger[tablename] == 'orders_products' || $Trigger[tablename] == 'orders'){
				if ($ordersstring!=''){
					$Trigger[condition]  = " (orders_id  NOT in ($ordersstring))  and (" . $Trigger[condition].") ";
				}	
					
			}	
			
			
			
			$patterns = array();
			$patterns[0] = '/(\w+) NOT PURCHASED \'(.*)\'/s';
			$patterns[1] = '/(\w+) PURCHASED \'(.*)\'/s';
			$replacements = array();
			$replacements[1] = ' (orders_id in (select orders_id from '.$Trigger[tablename].' where $1 = \'$2\')) ';
			$replacements[0] = ' (orders_id NOT in (select orders_id from '.$Trigger[tablename].' where $1 = \'$2\')) ';
			
			
			while (preg_match_all($patterns[0], $Trigger[condition])) {
    			$Trigger[condition]= preg_replace($patterns[0], $replacements[0], $Trigger[condition]);
			}
			
			while (preg_match_all($patterns[1], $Trigger[condition])) {
    			$Trigger[condition]= preg_replace($patterns[1], $replacements[1], $Trigger[condition]);
			}
			

			
			$sqlValue = "select * from ".$Trigger[tablename]." where ".$Trigger[condition];
			
			if ($Trigger[tablename] == 'orders_products'){
					 $sqlValue = "select * from ".$Trigger[tablename]." where ".$Trigger[condition]. " group by orders_id ";
			}
			$schedlueArray[$Trigger[temp_id]]['details'] = $Trigger;
			$mappingFileds 	= $this->GetMappingTemplateBysendId($Trigger[temp_id]);
			$schedlueArray[$Trigger[temp_id]]['mappingFiled'] = $mappingFileds;
			
			set_time_limit (0);
			
			$TriggerRecord = $this->productserverSql($sqlValue);
			
			
			
			$triggerorderID = array();
			foreach ($TriggerRecord as $trigger){
				$triggerorderID[] = $trigger['orders_id'];
			}
			
			$triggerorderIDstring = implode(",",$triggerorderID);
			
			if ($triggerorderIDstring != ''){
			
				switch($Trigger[tablename]){
					case 'orders':
						$schedlueArray[$Trigger[temp_id]]['orders'][$trigger['orders_id']] = $trigger;
						$sqlValue = "select * from orders_products where orders_id = '".$trigger['orders_id']."'";
						$ordersRecord = $this->productserverSql($sqlValue);
						$schedlueArray[$Trigger['id']]['orders_product'][$trigger['orders_id']] = $ordersRecord;
						break;
					case 'orders_products':
						$sqlValue = "select * from orders_products where orders_id in ($triggerorderIDstring) ";
						$ordersRecord = $this->productserverSql($sqlValue);
						foreach($ordersRecord as $orderRecordD){
						
							$schedlueArray[$Trigger['id']]['orders_product'][$orderRecordD['orders_id']][] = $orderRecordD;
							
						}	
						
						$sqlValue = "select * from orders where orders_id in ($triggerorderIDstring) ";
						$ordersRecord = $this->productserverSql($sqlValue);
						foreach($ordersRecord as $orderRecordD){
							$schedlueArray[$Trigger['id']]['orders'][$orderRecordD['orders_id']][] = $orderRecordD;
						}	
						break;
					Default :	
						break;
						
					}
			}		
			
		}
		$emailData=array();
		$count = 0;
		
		
					

		foreach($schedlueArray as $schedlue){
		
		//$sendgrid_apikey ='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';
		//$sendgrid = new SendGrid($sendgrid_apikey);
		$est=time();
		
		foreach($schedlue['orders'] as $order){
			//$to[] = $order[0]['customers_email_address'];
			$to[] = $sample[$c];
			$emailData[$count]['customers_email_address'] = $order[0]['customers_email_address'];
			$emailData[$count]['customers_id'] = $order[0]['customers_id'];
			$emailData[$count]['orders_id'] = $order[0]['orders_id'];
			$emailData[$count]['temp_id'] =  $schedlue['details']['temp_id'];
			$emailData[$count]['temp_name'] =  $schedlue['details']['temp_title'];
			$emailData[$count]['assign_date'] = date("Y-m-d H:i:s", $est);
			$emailData[$count]['Schedule_date'] = date("Y-m-d H:i:s", $est);
			$count= $count+1;
			$c=$c+1;
			
			
			
		}
		
		}
		
		return $emailData;
	}
	
	
		/* Function to get open task information from Customer list tAjax table starts here */
		function CustomerlistListAjax($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'first_name',
			1 => 'sur_name',			
			2 => 'mobile_number',
			3 => 'container_name',			
			4 => 'create_date',
			5 => 'id'									
		);
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_customer ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_customer where id > 0";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( first_name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `address1` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
			foreach($data as $key => $dataVal) {
				$lastrow = '';
				$firstrow = '';
						$firstrow .= '<a href="javascript:void(0);" onclick="viewCustomerDetails(\''.$dataVal['id'].'\');"><span class="glyphicon glyphicon-eye-open"></span></a>';			
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editCustomerDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteCustomerDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />';
					$get_contract_start_date_qry = "SELECT container_number, contract_start_date FROM tbl_customer_container where customer_id='".$dataVal['id']."' and status='Occupied' ";
					$Res_contract_start_date = $this->SelectQryDirect($get_contract_start_date_qry);	
					$containerName['Container_nameNew'] = array();
					if($Res_contract_start_date[0] !=''){
						$contract_start_date = $Res_contract_start_date[$key]['contract_start_date'];
						$count_conainerNumber = count($Res_contract_start_date);
						if($count_conainerNumber !=''){	
							foreach ($Res_contract_start_date as $valuenew ) {
								$get_container_name_qry = "SELECT name FROM tbl_container where id='".$valuenew['container_number']."' ";
							
								$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
								//$containerName[$key]['Container_nameNew'][$n] = implode(",", $Res_get_container_name1[$n]['name']);
								$containerName['Container_nameNew'][] = $Res_get_container_name[0]['name'];
							}
						}	
					}	
					
					$Container_nameNew_array = array_filter($containerName['Container_nameNew']);

					if (!empty($Container_nameNew_array)) {
						$implode_val = implode(",  ", $containerName['Container_nameNew']);
					}else{
						$implode_val = '-';
					}
					//$implode_val = implode(",  ", $containerName['Container_nameNew']);
					$Res_contract_start_date = array_filter($Res_contract_start_date);	
					if($contract_start_date){
						$contract_start_date= strtotime($contract_start_date);
						$contract_date =  date('l F d, Y', $contract_start_date);
					}else{
						$contract_date =  '-';
					}							
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						'0'  => $firstrow,
						'1'  => $dataVal['first_name'],
						'2'	 => $dataVal['sur_name'],
						'3'	 => $dataVal['mobile_number'],	
						'4'	 => $implode_val,							
						'5'  => $lastrow
					);
			}
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		echo json_encode($json_data); 
	} 
	// End Customer list
	
	
	
	
	/* Function to get open task information from containerPricesList tAjax table starts here */
	function ContainerPricesList($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'container_category',
			1 => 'deposit_amount',			
			2 => 'licence_amount',
			3 => 'vat_amount',			
			4 => 'licence_amount_vat',
			5 => 'create_date',
			6 => 'id'
										
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_container_prices ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_container_prices where id > 0";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( container_category  LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=")";
		}
		$query=$this->SelectQryDirect($sql);
		
		//$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
				
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editContainerPricesDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteContainerPricesDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
							
						';
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $dataVal['container_category'],
						'1'	 => '&pound; ' .$dataVal['deposit_amount'],
						'2'	 => '&pound; ' .$dataVal['licence_amount'],	
						'3'	 => '&pound; ' .$dataVal['vat_amount'],							
						'4'	 => '&pound; ' .$dataVal['licence_amount_vat'],	
						'5'  => $create_date,
						'6'  => $lastrow
						
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End containerPricesList list


	
	function CustomerCummunicationListAjax($requestData) {
		$current_customer_id = $requestData['current_customer_id'];
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'date_sent',
			1 => 'sms_message',			
			3 => 'id'									
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_customer_communication where customer_id =".$current_customer_id." and status_code='200'";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_customer_communication where id > 0 and customer_id =".$current_customer_id." and status_code='200'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( customer_notes LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `create_date` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
				
						 //<td width="1%"  class="text-center"><input type="checkbox" class="case" id="chk" name="chk[]" value="{$EmailList[emails].id}" /></td>
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editNotesDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteNotesDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
						';
						
												
					$yrdata= strtotime($dataVal['date_sent']);
					$date_sent =  date('d/m/Y h:i:s a', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $date_sent,
						'1'	 => $dataVal['sms_message']
						//'2'	 => $admin_full_name,				
						//'3'	 => $lastrow 
						
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	
	}	

	/* Function to get customer notes Ajax table starts here */
		function CustomerNotesListAjax($requestData) {
			//echo '<pre>';
			//print_r($requestData['current_customer_id']);
			$current_customer_id = $requestData['current_customer_id'];
			//exit;
			
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'create_date',
			1 => 'customer_notes',			
			2 => 'created_by',
			3 => 'id'									
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_notes where customer_id =".$current_customer_id."";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_notes where id > 0 and customer_id =".$current_customer_id."";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( customer_notes LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `create_date` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
						 //<td width="1%"  class="text-center"><input type="checkbox" class="case" id="chk" name="chk[]" value="{$EmailList[emails].id}" /></td>
						$lastrow .= '<input type="checkbox" name="pin_notes_dashboard" id="pin_notes_dashboard" onclick="checkupdatenote(\''.$dataVal['id'].'\')">
						<input type="hidden" name="customer_notes_id" id="customer_notes_id" value="'.$current_customer_id.'"/>
						<input type="hidden" name="notes_id" id="notes_id" value="'.$dataVal['id'].'"/>';
						
						
					$get_adminname_qry = "SELECT first_name, last_name FROM tbl_users where uid='".$dataVal['created_by']."'";
					$Res_get_adminname_qry = $this->SelectQryDirect($get_adminname_qry);	
												
					$admin_first_name 	= $Res_get_adminname_qry[0]['first_name'];
					$admin_last_name	= $Res_get_adminname_qry[0]['last_name'];					
					
					$admin_full_name = strtoupper($admin_first_name[0]).'.' .ucwords(strtolower($admin_last_name));
						
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('d/m/Y h:i:s a', $yrdata);
					
					
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $create_date,
						'1'	 => $dataVal['customer_notes'],
						'2'	 => $admin_full_name,				
						'3'	 => $lastrow 
						
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End Notes list
	
	
	
	
	
	/* Function to get open task Previoues paymentHistorylistAjax starts here */
	function PreviouesPaymentHistorylistAjax($requestData, $customer_id) {
		
		
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'container_type',
			1 => 'container_number',			
			2 => 'due_date',
			3 => 'related_period',
			4 => 'date_paid',			
			5 => 'license',			
			6 => 'deposit',
			7 => 'miscellaneous',
			8 => 'penality',
			9 => 'total_amount_due',
			10 => 'payment_type',
			11 => 'id'			
		);
		
		
		//	$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
				//echo '<br>';
		//$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);	
				
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM   tbl_payment_history where  id > 0 and customer_id ='".$customer_id."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			/*echo 'ddddddddddddddd';
			exit;*/
			$stremailidexist_qry.=" AND ( container_type LIKE '%".$requestData['search']['value']."%' ";    
			$stremailidexist_qry.=" OR `container_number` LIKE '%".$requestData['search']['value']."%' )";
		}

		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM  tbl_payment_history where  id > 0 and customer_id ='".$customer_id."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( container_type LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `container_number` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		$sql.=" ORDER BY id  desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   desc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		
		
		
		$dataResult = array();
		
			foreach($data as $key => $dataVal) {
				$lastrow = '';
				/*		
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editContainerDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteContainerDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
							
						';*/
					$expens_file = explode("uploads/expenses/", $dataVal['expanes_attachements']);	
					$expens_file_val = $expens_file[1];
					
					$expens_file_New = $global_config['site_globalpath']."uploads/expenses/".$expens_file_val;
					
					//$lastrow = '<a class="glyphicon glyphicon-download-alt downloadable" onclick="viewmodel(\''.$expens_file_val.'\');"  href='.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.' data-toggle="modal" data-target="'.$dataVal['id'].'"> view</a>';
					//$lastrow = '<a class="downloadable" title="'.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.'" href="javascript:void(0);" data-toggle="modal" data-target="'.$dataVal['id'].'"> view</a>';
					
/*	$lastrow = '<a class="glyphicon glyphicon-download-alt" target=_blank title="'.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.'"  href="'.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.'" > view</a>';*/

				//$lastrow = '<img width="30" id="'.$dataVal['id'].'"  src="'.$global_config['site_globalpath'].'images/download_expenses.png" title="'.$expens_file_New.'" class="downloadable"/>';
				$lastrow = '-';
				
				$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
				//echo '<br>';
				$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);		
				// Get the container name 
				$containerName = $Res_get_container_name[0]['name'];
				$rsValues[$key]['containerName'] = $containerName;
				
				
					$pound = '&pound; ';					
					
					// license statt
					$license_amt_val = $dataVal['license'];
					if ($license_amt_val == $license_amt_val && $license_amt_val > 0) {
						$license_amt_val_display_purpose =  $pound . $license_amt_val;
					}else{
						$license_amt_val_with_decimal_symbol = explode("-", $license_amt_val);
						$license_amt_val_display_purpose = "- " .$pound .  number_format((float)$license_amt_val_with_decimal_symbol[1], 2, '.', '');
					}
					// license End	
					
					// total_amount_due statt
					$total_amount_due_val = $dataVal['total_amount_due'];
					if ($total_amount_due_val == $total_amount_due_val && $total_amount_due_val > 0) {
						$total_amount_due_val_display_purpose =  $pound . $total_amount_due_val;
					}else{
						$total_amount_due_val_decimal_symbol = explode("-", $total_amount_due_val);
						$total_amount_due_val_display_purpose = "- " .$pound .  number_format((float)$total_amount_due_val_decimal_symbol[1], 2, '.', '');
					}
					// total_amount_due End				
					
					$select_action = "<select name='action_payment_history' id='action_payment_history' class='form-control container_type_customer' onchange='getactionPaymentHistory('this.value');' style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
														<option value='0'>View</option>
														<option value='license_agreement'>View License Agreement</option>
														<option value='license_invoice'>View Invoice</option>
														<option value='license_receipt'>View Receipt</option>									
													</select>";	
						
					date_default_timezone_set('Europe/London');
					$sTime = date("d-m-Y H:i:s");  							
					$yrdata= strtotime($dataVal['date_paid']);
					//$due_date =  date('l F d, Y', $yrdata);
					//$date_paid =  date('d/m/Y H:i:s', $yrdata);
					$date_paid =  date('d/m/Y', $yrdata);
					
					if($dataVal['payment_type']){
						$total_month_paid = $dataVal['total_month_paid'];
					}else{
						$total_month_paid = "-";
					}
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0' => $dataVal['container_type'],
						'1' => $rsValues[$key]['containerName'],
						'2' => $dataVal['due_date'],
						'3' => $dataVal['related_period'],
						'4' => $date_paid,
						'5' => $license_amt_val_display_purpose,
						'6' => '&pound; ' .$dataVal['deposit'],
						'7' => '&pound; ' .$dataVal['miscellaneous'],
						'8' => '&pound; ' .$dataVal['penality'],
						'9' => $dataVal['payment_type'],
						'10' => $total_month_paid,
						'11' => $total_amount_due_val_display_purpose,
						//'12' => $select_action	
					);
		}
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 

		}
	/* Function to get open task Previoues paymentHistorylistAjax End here */
	
	
	/* Function to get open task paymentHistorylistAjax starts here */
			/*10 => 'payment_type',
			11 => 'id'			
		);*/
		
		
		//	$get_container_name_qry = "SELECT name FROM tbl_container where id='".$dataVal['container_number']."'";
				//echo '<br>';
		//$Res_get_container_name = $this->SelectQryDirect($get_container_name_qry);	
				
	
	
	/* Function to get open task paymentHistorylistAjax starts here */
	
	function paymentHistorylistAjax($customer_id) {
	
			//echo '<pre>';
			//print_r($requestData['current_customer_id']);
			$current_customer_id = $requestData['current_customer_id'];
			//exit;
			
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'container_type',
			1 => 'container_number',			
			2 => 'contract_start_date',
			3 => 'contract_start_date',
			4 => 'licence_amount_vat',
			5 => 'deposit_amount',			
			6 => 'miscellaneous',			
			7 => 'total_payment_due',
			8 => 'id'			
			
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_customer_container where customer_id ='".$customer_id."'";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_customer_container where id > 0 and customer_id ='".$customer_id."'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( container_type LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `container_number` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
				
						 //<td width="1%"  class="text-center"><input type="checkbox" class="case" id="chk" name="chk[]" value="{$EmailList[emails].id}" /></td>
					//$lastrow .= '<i class="fa fa-pencil-square-o" onclick="generateInvoice(\''.$dataVal['customer_id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
					$lastrow .= '<a class="btn btn-primary" onclick="generateInvoice(\''.$dataVal['customer_id'].'\');" style="font-size:16px; cursor:pointer;">Invoice</a> &nbsp;';
						
					
					$yrdata= strtotime($dataVal['contract_start_date']);
					$contract_start_date =  date('d/m/Y ', $yrdata);
					
					$yrdata1= strtotime($dataVal['contract_next_due_date']);
					$contract_next_due_date =  date('d/m/Y ', $yrdata1);
					
					
					$Related_priod = date('d/m/Y ', strtotime($contract_next_due_date . " +30 days"));
					$days_add = 30;
					$Related_priod = strtotime("+".$days_add." days", strtotime($dataVal['contract_start_date']));
					$Related_priod_2 = date("d/m/Y ", $Related_priod);
					$Related_priod_Result = $contract_next_due_date .' - '. $Related_priod_2;
					
					
					//$contract_next_due_date
					//$NewDate1 = date('d/m/Y', strtotime($contract_start_date, "+30 days"));
					//$NewDate2 = date('d/m/Y', strtotime("+30 days"));
					$current_date = date("d/m/Y ");// current date
					
					$diff = abs(strtotime($current_date) - strtotime($dataVal['contract_start_date']));
					
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$overdue = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

					/*echo $get_penality_qry = "SELECT * FROM tbl_penalityfees where days_overdue > $overdue";
					$get_penality_qry = "SELECT * FROM tbl_penalityfees where days_overdue > $overdue";
					$Res_get_penality_qry = $this->SelectQryDirect($get_penality_qry);	
					echo '<pre>';
					print_r($Res_get_penality_qry);*/
					//$admin_first_name 	= $Res_get_penality_qry[0]['first_name'];
					//$overdue = 5;
					
					
					$penality = 100;
					
					
					 if($dataVal['container_type'] !=''){
					 	$container_type = $dataVal['container_type'];
					 }else{
					 	$container_type = '-';					 
					 }
					 
					 
					 if($dataVal['container_number'] !=''){
					 	$container_number = $dataVal['container_number'];
					 }else{
					 	$container_number = '-';					 
					 }
					 
					 if($dataVal['licence_amount_vat'] !=''){
					 	$licence_amount_vat = $dataVal['licence_amount_vat'];
					 }else{
					 	$licence_amount_vat = '-';					 
					 }
					 
					  if($dataVal['deposit_amount'] !=''){
					 	$deposit_amount = $dataVal['deposit_amount'];
					 }else{
					 	$deposit_amount = '-';					 
					 }
					 
					 
					  if($dataVal['miscellaneous'] !=''){
					 	$miscellaneous = $dataVal['miscellaneous'];
					 }else{
					 	$miscellaneous = '-';					 
					 }
					 
					 
					 
					
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0' => $dataVal['container_type'],
						'1' => $dataVal['container_number'],
						'2' => $contract_start_date,
						'3' => $contract_next_due_date,
						'4' => $Related_priod_Result,
						'5' => $overdue,
						'6' => $dataVal['licence_amount_vat'],
						'7' => $dataVal['deposit_amount'],
						'8' => $dataVal['miscellaneous'],						
						'9' => $penality,
						'10' => $dataVal['total_payment_due'],						
						'11' => $lastrow 
									
					);
				
			}
			
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	
	}
	/* Function to get open task paymentHistorylistAjax End here */
	
	/* Function to get open task termsConditionlistAjax from Expenses list tAjax table starts here */
	function termsConditionlistAjax($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'terms_condition',
			1 => 'created_by',
			2 => 'id'				
		);
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_template_management ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_template_management where id > 0";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( terms_condition LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `created_by` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
					$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editTermsConditions(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteTermsConditions(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
							
						';
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						'0'  => $dataVal['terms_condition'],						
						'1'  => $dataVal['create_date'],
						'2'  => $lastrow
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End container list
	
	
	
	/* Function to get open task information from Removals Management list tAjax table starts here */
	function RemovalsListAjax($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'date_incurred',
			1 => 'description',			
			2 => 'payment_method',
			3 => 'amount_excluding_vat',
			4 => 'vat',
			5 => 'amount_including_vat',
			//6 => 'expanes_attachements'			
			//7 => 'id'
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_removals_management ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_removals_management where id > 0";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( payment_method LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `description` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
					//$expens_file = explode("uploads/expenses/", $dataVal['expanes_attachements']);	
					//$expens_file_val = $expens_file[1];
					//$expens_file_New = $global_config['site_globalpath']."uploads/expenses/".$expens_file_val;
					//$lastrow = '<img width="30" id="'.$dataVal['id'].'"  src="'.$global_config['site_globalpath'].'images/download_expenses.png" title="'.$expens_file_New.'" class="downloadable"/>';
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $dataVal['date_incurred'],						
						'1'  => $dataVal['description'],
						'2'	 => $dataVal['payment_method'],
						'3'	 => '&pound; ' .$dataVal['amount_excluding_vat'],				
						'4'  => '&pound; ' .$dataVal['vat'],						
						'5'  => '&pound; ' .$dataVal['amount_including_vat'],
						//'6'	 => $lastrow										
					);
		}
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End Removals Management list
	
	
	/* Function to get open task information from Expenses list tAjax table starts here */
	function ExpensesListAjax($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'date_incurred',
			1 => 'description',			
			2 => 'payment_method',
			3 => 'amount_excluding_vat',
			4 => 'vat',
			5 => 'amount_including_vat',
			6 => 'expanes_attachements'			
			//7 => 'id'
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_expenses ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_expenses where id > 0";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( payment_method LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `description` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
				/*		
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editContainerDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteContainerDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
							
						';*/
					$expens_file = explode("uploads/expenses/", $dataVal['expanes_attachements']);	
					$expens_file_val = $expens_file[1];
					
					$expens_file_New = $global_config['site_globalpath']."uploads/expenses/".$expens_file_val;
					
					//$lastrow = '<a class="glyphicon glyphicon-download-alt downloadable" onclick="viewmodel(\''.$expens_file_val.'\');"  href='.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.' data-toggle="modal" data-target="'.$dataVal['id'].'"> view</a>';
					//$lastrow = '<a class="downloadable" title="'.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.'" href="javascript:void(0);" data-toggle="modal" data-target="'.$dataVal['id'].'"> view</a>';
					
/*	$lastrow = '<a class="glyphicon glyphicon-download-alt" target=_blank title="'.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.'"  href="'.$global_config['site_globalpath']."uploads/expenses/".$expens_file_val.'" > view</a>';*/

				$lastrow = '<img width="30" id="'.$dataVal['id'].'"  src="'.$global_config['site_globalpath'].'images/download_expenses.png" title="'.$expens_file_New.'" class="downloadable"/>';
						
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $dataVal['date_incurred'],						
						'1'  => $dataVal['description'],
						'2'	 => $dataVal['payment_method'],
						'3'	 => $dataVal['amount_excluding_vat'],				
						'4'  => $dataVal['vat'],						
						'5'  => $dataVal['amount_including_vat'],
						'6'	 => $lastrow										
					);
		}
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End container list


function downloadsinglerecord($expense_id){
/*echo '<pre>';
print_r($CheckExpenseName_Result);
exit;*/
	    $CheckExpenseName = "SELECT * FROM tbl_expenses where id ='".$expense_id."'"; 
		$CheckExpenseName_Result = $this->SelectQryDirect($CheckExpenseName,0);
	
		$output	   = "";
		$output    ="S.No\tdate incurred\tdescription\tpayment method\tamount excluding vat\tvat\tamount including vat"; 
		$output .="\n";
		$s_no	=	1;	
		//foreach($CheckExpenseName_Result as $row){
				$output				.=	$s_no."\t";
				$output				.=	$CheckExpenseName_Result[0]['date_incurred']."\t";
				$output				.=	$CheckExpenseName_Result[0]['description']."\t";
				$output				.=	$CheckExpenseName_Result[0]['payment_method']."\t"; 
				$output				.=	$CheckExpenseName_Result[0]['amount_excluding_vat']."\t";
				$output				.=	$CheckExpenseName_Result[0]['vat']."\t";
				$output				.=	$CheckExpenseName_Result[0]['amount_including_vat']."\t";
				$output .="\n";
				$s_no++;	
		//}
		header('Content-type: application/xls');
		header('Content-Disposition: attachment; filename="Expense Single List.xls"');
		echo $output;
		exit;
}


	/* Function to get open task information from container list tAjax table starts here */
		function ContainerListAjax($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'name',
			1 => 'container_category',			
			2 => 'status',
			3 => 'create_date',
			4 => 'id'									
		);
		
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_container ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_container where id > 0";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `container_category` LIKE '%".$requestData['search']['value']."%' )";
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
				$lastrow = '';
				$firstrow = '';

						$firstrow .= '<input type="checkbox" class="case" id="chk" name="checkboxlist" value="'.$dataVal['id'].'" />';				
					 //<td width="1%"  class="text-center"><input type="checkbox" class="case" id="chk" name="chk[]" value="{$EmailList[emails].id}" /></td>
				
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editContainerDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeleteContainerDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
							
						';
						
					$get_cusdet_qry = "SELECT a.*, b.*  FROM tbl_customer as a JOIN  tbl_customer_container as b  ON a.id = b.customer_id where b.container_number='".$dataVal['id']."'";
					$Final_CustblCus_Container = $this->SelectQryDirect($get_cusdet_qry);
					if(is_array($Final_CustblCus_Container)) {
						$first_name_db = $Final_CustblCus_Container[0]['first_name'];
						$sur_name_db = $Final_CustblCus_Container[0]['sur_name'];
						$mobile_number_db = $Final_CustblCus_Container[0]['mobile_number'];
						$contract_next_due_date_db = $Final_CustblCus_Container[0]['contract_next_due_date'];			
						//$authorized_user_mobile_number_db = $Final_CustblCus_Container[0]['authorized_user_mobile_number'];
						
						$current_date = date("d/m/Y ");// current date									
						$days_over_due = '-';
						//$contract_start_date =  $Res_container_customer[$n]['contract_start_date'];
						$contract_next_due_date =  $Res_container_customer[$n]['contract_next_due_date'];
						
						if($Final_CustblCus_Container[0]['contract_next_due_date'] !=''){
						$now = strtotime(str_replace("/", '-', $Final_CustblCus_Container[0]['contract_next_due_date'])); // or your date as well
						$your_date = strtotime(str_replace("/", '-', $current_date));
						$datediff = $your_date - $now;
						$rsValues[$key]['overdue'] = floor($datediff/(60*60*24));
						$overdue = floor($datediff/(60*60*24));
							if($overdue > 0){
								//$get_userdet_res[$m]['status'] = 'overdue--------'. $overdue.'----------------'.$Res_container_customer[$n]['contract_next_due_date'];	
								$days_over_due = $overdue;	
							}
						}else{
							//$get_userdet_res[$m]['status'] = $get_userdet_res[$m]['status'];	
						}
						
					}else{
						$first_name_db = '-';
						$sur_name_db = '-';
						$mobile_number_db = '-';
						$contract_next_due_date_db = '-';			
						$authorized_user_mobile_number_db = '-';
					}
					
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
					$container_status = $dataVal['status'];
					if($container_status == 'Active' || $container_status == 'Available'){
						$container_status_value = '<span class="label label-success">Available</span>';
					}else if($container_status == 'Available'){
						$container_status_value = '<span class="label label-success">Available</span>';					
					}else if($container_status == 'Locked'){
						$container_status_value = '<span class="label label-danger">Locked</span>';					
					}else if($container_status == 'Occupied'){
						$container_status_value = '<span class="label label-warning">Occupied</span>';					
					}else{
						$container_status_value = '-';					
					}
					
					/*$days_over_due = '';
					if($days_over_due != ''){
						$days_over_due = '-';
					}else{
						$days_over_due = '-';
					}*/
					
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $firstrow,						
						'1'  => $dataVal['name'],
						'2'	 => $dataVal['container_category'],
						'3'	 => $first_name_db,
						'4'	 => $sur_name_db,
						'5'	 => $mobile_number_db,
						'6'	 => $contract_next_due_date_db,												
						'7'	 => $days_over_due,				
						'8'	 => $container_status_value, 
						'9'	 => $create_date, 
						'10'  => $lastrow
						
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End container list
	
	
	/* Function to get open task information from PenalityFeesListAjax table starts here */
		function PenalityFeesListAjax($requestData) {
			global $objSmarty, $global_config;
			$columns = array( 
			// datatable column index  => database column name
				0 => 'days_overdue',
				1 => 'penality_fee_amount',
				2 => 'create_date',						
				//3 => 'id'
			);
			// getting total number records without any search
			$stremailidexist_qry = "SELECT * ";
			//$stremailidexist_qry.=" FROM  tbl_category "; // change this on june 24th 2016 -> to get category from container table
			$stremailidexist_qry.=" FROM  tbl_penalityfees "; 
			
			//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
			$totalData = $this->SelectQryDirect($stremailidexist_qry);
			$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		
			$sql = "SELECT * ";
			//$sql.=" FROM tbl_category where id > 0"; // change this on june 24th 2016 -> to get category from container table
			$sql.=" FROM tbl_penalityfees where id > 0";
			
			if( !empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( days_overdue LIKE '%".$requestData['search']['value']."%' ";    
				$sql.=" OR penality_fee_amount LIKE '%".$requestData['search']['value']."%' )";
			}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
		
			
			foreach($data as $dataVal) {
				
				$lastrow = '';
				
						$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editPenalityfees(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
						<i class="fa fa-trash-o" onclick="DeletePenalityfees(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
							
						';
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $dataVal['days_overdue'],
						'1'  => '&pound; '.$dataVal['penality_fee_amount'],
						'2'  => $lastrow
						
					);
				
			
			
			}
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	}
	
	
	
		/* Function to get open task information from CategoryListAjax table starts here */
		function CategoryListAjax($requestData) {
			global $objSmarty, $global_config;
			$columns = array( 
			// datatable column index  => database column name
				0 => 'name',
				1 => 'container_category',
				2 => 'status',			
				3 => 'create_date',						
				//3 => 'id'
			);
			// getting total number records without any search
			$stremailidexist_qry = "SELECT * ";
			//$stremailidexist_qry.=" FROM  tbl_category "; // change this on june 24th 2016 -> to get category from container table
			$stremailidexist_qry.=" FROM  tbl_container "; 
			
			//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
			$totalData = $this->SelectQryDirect($stremailidexist_qry);
			$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
		
			$sql = "SELECT * ";
			//$sql.=" FROM tbl_category where id > 0"; // change this on june 24th 2016 -> to get category from container table
			$sql.=" FROM tbl_container where id > 0";
			
			if( !empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
				$sql.=" AND ( name LIKE '%".$requestData['search']['value']."%' ";    
				$sql.=" OR container_category LIKE '%".$requestData['search']['value']."%' )";
			}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
			foreach($data as $dataVal) {
	
											
				$yrdata= strtotime($dataVal['create_date']);
				$create_date =  date('l F d, Y', $yrdata);
		
				$dataResult[] = array(
					'DT_RowId' => "row".$dataVal['id'],
					'DT_RowClass' => "row".$dataVal['id'],
					'0'  => $dataVal['name'],
					'1'	 => $dataVal['container_category'],
					'2'	 => $dataVal['status'], 
					'3'  => $create_date
					
				);
			
			}
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	}
	
	
	/* Function to get open task information from booking table starts here */
		function AdminuserListAjax($requestData) {
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'first_name',
			1 => 'last_name',			
			2 => 'username',			
			3 => 'email',
			4 => 'status',			
			5 => 'uid'
			
					
		);
	
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_users ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_users where uid > 0 and user_type !='super_admin'";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( first_name LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `email` LIKE '%".$requestData['search']['value']."%' )";
			
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		
		$dataResult = array();
	
		
		foreach($data as $dataVal) {
		
		//$lastrow = '<a href="javascript:void(0)" id="loadingview'.$dataVal['id'].'" onclick="downloadXls('.$dataVal['uid'].')" class="btn btn-primary">View Recipient</a> 											<img src="/images/loading.gif" width="40" style="display:none" id="loadingrec'.$dataVal['uid'].'" />';
		$lastrow = '';
		
											
			/*if ($dataVal[status] == 'Active') {
									$lastrow .= '<img src="/images/loading.gif" width="30" style="display:none" id="loadingactive'.$dataVal['uid'].'" />
										<i id= "active'.$dataVal['uid'].'" class="fa fa-toggle-on" onclick="statuschage(\''.$dataVal['uid'].'\',\'0\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i>
										<i id="deactive'.$dataVal['uid'].'" class="fa fa-toggle-off"  style="display:none" onclick="statuschage(\''.$dataVal['uid'].'\',\'1\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
			} else {
									$lastrow .= '<img src="/images/loading.gif" width="30" style="display:none" id="loadingactive'.$dataVal['uid'].'" />
										<i id= "active'.$dataVal['uid'].'" class="fa fa-toggle-on" style="display:none" onclick="statuschage(\''.$dataVal['uid'].'\',\'0\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i>
										<i id="deactive'.$dataVal['uid'].'" class="fa fa-toggle-off"   onclick="statuschage(\''.$dataVal['uid'].'\',\'1\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
										
			}	*/				
									$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editTriggerDetails(\''.$dataVal['uid'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
										<i class="fa fa-trash-o" onclick="DeleteTriggerDetails(\''.$dataVal['uid'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['uid'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['uid'].'" />
										
									';
										
			
			$dataResult[] = array(
				'DT_RowId' => "row".$dataVal['uid'],
				'DT_RowClass' => "row".$dataVal['uid'],
				'0'  => $dataVal['first_name'],
				'1'	 => $dataVal['last_name'],
				'2'	 => $dataVal['username'],
				'3'	 => $dataVal['email'],
				'4'	 => $dataVal['status'],				
				'5'  => $lastrow
				
			);
		
		}
		/*$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = $row["name"];
			$nestedData[] = $row["phoneno"];
			$nestedData[] = $row["address1"];
			$nestedData[] = $row["address2"];
			$nestedData[] = $row["city"];
			$nestedData[] = $row["service"];
			$nestedData[] = $row["service_type"];
			
			$data[] = $nestedData;
		}*/
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	}
	
	
	/* Function to get open task information from booking table starts here */
		function TriggerListAjax($requestData) {
	
		$columns = array( 
		// datatable column index  => database column name
			0 => 'temp_title',
			1 => '`condition`',
			2 => 'id'
					
		);
	
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_trigger ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_trigger where id > 0 ";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND ( temp_title LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR `condition` LIKE '%".$requestData['search']['value']."%' )";
			
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		$data=$this->SelectQryDirect($sql);
		
		$dataResult = array();
	
		
		foreach($data as $dataVal) {
		
		$lastrow = '<a href="javascript:void(0)" id="loadingview'.$dataVal['id'].'" onclick="downloadXls('.$dataVal['id'].')" class="btn btn-primary">View Recipient</a>
											<img src="/images/loading.gif" width="40" style="display:none" id="loadingrec'.$dataVal['id'].'" />';
											
			if ($dataVal[status] == 1) {
									$lastrow .= '<img src="/images/loading.gif" width="30" style="display:none" id="loadingactive'.$dataVal['id'].'" />
										<i id= "active'.$dataVal['id'].'" class="fa fa-toggle-on" onclick="statuschage(\''.$dataVal['id'].'\',\'0\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i>
										<i id="deactive'.$dataVal['id'].'" class="fa fa-toggle-off"  style="display:none" onclick="statuschage(\''.$dataVal['id'].'\',\'1\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
			} else {
									$lastrow .= '<img src="/images/loading.gif" width="30" style="display:none" id="loadingactive'.$dataVal['id'].'" />
										<i id= "active'.$dataVal['id'].'" class="fa fa-toggle-on" style="display:none" onclick="statuschage(\''.$dataVal['id'].'\',\'0\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i>
										<i id="deactive'.$dataVal['id'].'" class="fa fa-toggle-off"   onclick="statuschage(\''.$dataVal['id'].'\',\'1\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
										
			}					
									$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editTriggerDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
										<i class="fa fa-trash-o" onclick="DeleteTriggerDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
										
									';
										
			
			$dataResult[] = array(
				'DT_RowId' => "row".$dataVal['id'],
				'DT_RowClass' => "row".$dataVal['id'],
				'0'  => $dataVal['temp_title'],
				'1'	 => $dataVal['condition'],
				'2'  => $lastrow
				
			);
		
		}
		/*$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = $row["name"];
			$nestedData[] = $row["phoneno"];
			$nestedData[] = $row["address1"];
			$nestedData[] = $row["address2"];
			$nestedData[] = $row["city"];
			$nestedData[] = $row["service"];
			$nestedData[] = $row["service_type"];
			
			$data[] = $nestedData;
		}*/
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	}
	
	
	/* Function to get open task information from booking table starts here */
		function TemplateListAjax($requestData) {
	
		$columns = array( 
		// datatable column index  => database column name
			0 => 'title',
			1 => 'send_grid_email',
			2 => 'schedule_hour',
			3 => 'trigger_name',
			4 => 'template_id',
			
					
		);
	
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_template ";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_template where template_id > 0 ";
		if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
			$sql.=" AND (  title LIKE '%".$requestData['search']['value']."%' ";    
			$sql.=" OR schedule_hour  LIKE '%".$requestData['search']['value']."%' ";
			$sql.=" OR schedule_format LIKE '%".$requestData['search']['value']."%' ";
			$sql.=" OR trigger_name LIKE '%".$requestData['search']['value']."%' ";
			$sql.=" OR send_grid_email LIKE '%".$requestData['search']['value']."%' )";
			
		}
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		$data=$this->SelectQryDirect($sql);
		
		$dataResult = array();
	
		
		foreach($data as $dataVal) {
		$dataVal['id'] = $dataVal['template_id']; 
											
			if ($dataVal[status] == 1) {
									$lastrow = '<img src="/images/loading.gif" width="30" style="display:none" id="loadingactive'.$dataVal['id'].'" />
										<i id= "active'.$dataVal['id'].'" class="fa fa-toggle-on" onclick="statuschage(\''.$dataVal['id'].'\',\'0\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i>
										<i id="deactive'.$dataVal['id'].'" class="fa fa-toggle-off"  style="display:none" onclick="statuschage(\''.$dataVal['id'].'\',\'1\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
			} else {
									$lastrow = '<img src="/images/loading.gif" width="30" style="display:none" id="loadingactive'.$dataVal['id'].'" />
										<i id= "active'.$dataVal['id'].'" class="fa fa-toggle-on" style="display:none" onclick="statuschage(\''.$dataVal['id'].'\',\'0\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i>
										<i id="deactive'.$dataVal['id'].'" class="fa fa-toggle-off"   onclick="statuschage(\''.$dataVal['id'].'\',\'1\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;';
										
			}					
									$lastrow .= '<i class="fa fa-pencil-square-o" onclick="editTemplateDetails(\''.$dataVal['id'].'\');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
										<i class="fa fa-trash-o" onclick="DeleteTemplateDetails(\''.$dataVal['id'].'\');" style="color:#FF0000; font-size:16px; cursor:pointer;"  id="delb'.$dataVal['id'].'" ></i><img src="/images/loading.gif" width="40" style="display:none" id="loadingdel'.$dataVal['id'].'" />
										
									';
										
			
			$dataResult[] = array(
				'DT_RowId' => "row".$dataVal['id'],
				'DT_RowClass' => "row".$dataVal['id'],
				'0'  => $dataVal['title'],
				'1'	 => $dataVal['send_grid_email'],
				'2'	 => $dataVal['schedule_hour']." ".$dataVal['schedule_format'],
				'3'	 => str_replace(",","<br>",$dataVal['trigger_name']),
				'4'  => $lastrow
				
			);
		
		}
		/*$data = array();
		while( $row=mysqli_fetch_array($query) ) {  // preparing an array
			$nestedData=array(); 
		
			$nestedData[] = $row["name"];
			$nestedData[] = $row["phoneno"];
			$nestedData[] = $row["address1"];
			$nestedData[] = $row["address2"];
			$nestedData[] = $row["city"];
			$nestedData[] = $row["service"];
			$nestedData[] = $row["service_type"];
			
			$data[] = $nestedData;
		}*/
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	}
	
	
	
	/****************************************************************************************************************
	*	Function Name : addSchedule								*	
	*	Description : Getting the order data, user data and add schedule email to sendgrid. 				*
	*****************************************************************************************************************/
	function addSchedule($objArray='') {
		global $objSmarty, $global_config;

		
		$TempList = "SELECT * FROM tbl_template where status=1 ";
		$TempDetails =$this->SelectQryDirect($TempList,0);
		$schedlueArray = array();
		
		$ordernosql = "SELECT * FROM tbl_settings where field='last_order_no'";
		$ordernodetails =$this->SelectQryDirect($ordernosql,0);
		$orderno = $ordernodetails[0]['value'];
		
		$sendgridsql = "SELECT * FROM tbl_settings where field='sendgrid_apikey'";
		$sendgriddetails =$this->SelectQryDirect($sendgridsql,0);
		$sendgrid_apikey = $sendgriddetails[0]['value'];
	
		
		$sql  = "select * from orders order by orders_id desc limit 1";
		$lastordernod = $this->productserverSql($sql);
		$lastorderno = $lastordernod[0]['orders_id'];	
		foreach($TempDetails as $Temp){
			
			
		$orders_idsql = "select orders_id  from tbl_email where temp_id ='".$Temp['send_grid_email']."'";
		$orders_ids =$this->SelectQryDirect($orders_idsql,0);
		$oidArray = array();
		foreach($orders_ids as $oid){
			$oidArray[]=$oid['orders_id'];
		}			
		$ordersstring = implode(",",$oidArray);
		$TriggersIds = $Temp['trigger_id'];
		
		$TriggerList = "SELECT * FROM tbl_trigger where id in ($TriggersIds)";
		$TriggerDetails =$this->SelectQryDirect($TriggerList,0);
		
		foreach($TriggerDetails as $Trigger) {
		
			if ($Trigger[tablename] == 'orders_products' || $Trigger[tablename] == 'orders'){
				if ($ordersstring!=''){
					$Trigger[condition]  = " (orders_id  NOT in ($ordersstring))  and (" . $Trigger[condition].") ";
				}
			}	
			
			
			
			$patterns = array();
			$patterns[0] = '/(\w+) NOT PURCHASED \'(.*)\'/s';
			$patterns[1] = '/(\w+) PURCHASED \'(.*)\'/s';
			$replacements = array();
			$replacements[1] = ' (orders_id in (select orders_id from '.$Trigger[tablename].' where $1 = \'$2\')) ';
			$replacements[0] = ' (orders_id NOT in (select orders_id from '.$Trigger[tablename].' where $1 = \'$2\')) ';
			
			
			while (preg_match_all($patterns[0], $Trigger[condition])) {
    			$Trigger[condition]= preg_replace($patterns[0], $replacements[0], $Trigger[condition]);
			}
			
			while (preg_match_all($patterns[1], $Trigger[condition])) {
    			$Trigger[condition]= preg_replace($patterns[1], $replacements[1], $Trigger[condition]);
			}
			

			
			$sqlValue = "select * from ".$Trigger[tablename]." where ".$Trigger[condition];
			
			if ($Trigger[tablename] == 'orders_products'){
					 $sqlValue = "select * from ".$Trigger[tablename]." where ".$Trigger[condition]. " group by orders_id ";
			}
			
			$schedlueArray[$Temp['send_grid_email']]['details'] = $Temp;
			$mappingFileds 	= $this->GetMappingTemplateBysendId($Temp['send_grid_email']);
			$schedlueArray[$Temp['send_grid_email']]['mappingFiled'] = $mappingFileds;
			
			set_time_limit (0);
			$TriggerRecord = $this->productserverSql($sqlValue);
			
		$triggerorderID = array();
			foreach ($TriggerRecord as $trigger){
				$triggerorderID[] = $trigger['orders_id'];
			}
			
			$triggerorderIDstring = implode(",",$triggerorderID);
			
			if ($triggerorderIDstring != ''){
			
				switch($Trigger[tablename]){
					
						/*$schedlueArray[$Trigger[temp_id]]['orders'][$trigger['orders_id']] = $trigger;
						$sqlValue = "select * from orders_products where orders_id = '".$trigger['orders_id']."'";
						$ordersRecord = $this->productserverSql($sqlValue);
						$schedlueArray[$Trigger[temp_id]]['orders_product'][$trigger['orders_id']] = $ordersRecord;
						break;*/
						
					case 'orders_products':
					case 'orders':
						$sqlValue = "select * from orders_products where orders_id in ($triggerorderIDstring) ";
						$ordersRecord = $this->productserverSql($sqlValue);
						foreach($ordersRecord as $orderRecordD){
						
							$schedlueArray[$Temp['send_grid_email']]['orders_product'][$orderRecordD['orders_id']][] = $orderRecordD;
							
						}	
						
						$sqlValue = "select * from orders where orders_id in ($triggerorderIDstring) ";
						$ordersRecord = $this->productserverSql($sqlValue);
						foreach($ordersRecord as $orderRecordD){
							$schedlueArray[$Temp['send_grid_email']]['orders'][$orderRecordD['orders_id']][] = $orderRecordD;
						}	
						break;
					Default :	
						break;
						
					}
			}		
					
						
		}
							
				
			
			
		
			
		}
		
		

		foreach($schedlueArray as $schedlue){
		$emailData=array();
		$count = 0;
		
		//$sendgrid_apikey ='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';
		//$sendgrid = new SendGrid($sendgrid_apikey);
		$s = "+ ".$schedlue['details']['schedule_hour']." ". $schedlue['details']['schedule_format'];
		$est=time();
		$st = strtotime("+ ".$schedlue['details']['schedule_hour']." ".$schedlue['details']['schedule_format']);
		$url = 'https://api.sendgrid.com/'; 
		$template_id = $schedlue['details']['temp_id'];
		$to = array();
		$sample = array('jeyakannan@securenext.net','muthaiah@securenext.net');
		$c=0;
		foreach($schedlue['orders'] as $order){
			//$to[] = $order[0]['customers_email_address'];
			$to[] = 'suryaprakash@securenext.in';
			$emailData[$count]['customers_email_address'] = $order[0]['customers_email_address'];
			$emailData[$count]['customers_id'] = $order[0]['customers_id'];
			$emailData[$count]['orders_id'] = $order[0]['orders_id'];
			$emailData[$count]['temp_id'] =  $schedlue['details']['send_grid_email'];
			$emailData[$count]['temp_name'] =  $schedlue['details']['title'];
			$emailData[$count]['assign_date'] = date("Y-m-d H:i:s", $est);
			$emailData[$count]['Schedule_date'] = date("Y-m-d H:i:s", $st);
			$count= $count+1;
			$c=$c+1;
			
		}
		$sub = array();
		foreach($schedlue['orders'] as $order){
			foreach($schedlue['mappingFiled'] as $mapping){
				switch($mapping['replace_field1']){
					case 'orders':
						$sub[$mapping['target_string']][] = $order[0][$mapping['replace_field2']];		
					break;
					case 'orders_products':
						$ordervalue=array();
					
						
						foreach($schedlue['orders_product'][$order[0]['orders_id']] as $order_products){
							$ordervalue[]=$order_products[$mapping['replace_field2']];	
						}	
						$ordervalue = array_unique($ordervalue);
						$ordervalueString = implode(",",$ordervalue);
						$sub[$mapping['target_string']][] = $ordervalueString;		
					break;
					
				}
				
			}
		}
		
	    $template_id = $schedlue['details']['send_grid_email'];
		if (!empty($sub)){
		$js = array(
		  'to' => $to,
		  'sub' => $sub,
		  'send_at'=>$st,
		  'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
		);
		} else {
		$js = array(
		  'to' => $to,
		  'send_at'=>$st,
		 'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $template_id)))
		);
		
		}
		
		//echo json_encode($js);
		$params = array(
			'to' => $to,
			'from'      => "mailer@container_rental.com",
			'fromname'  => "Container Rental Team",
			'subject'   =>$schedlue['details']['title'], 
			'text'      => "",
			'html'      => "container_rental",
			'x-smtpapi' => json_encode($js),
		  );
		  
		echo "<pre>";
		print_r($params);
			
		$request =  $url.'api/mail.send.json';
		$session = curl_init($request);
		curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
		curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
		curl_setopt ($session, CURLOPT_POST, true);
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		echo $response = curl_exec($session);
		curl_close($session);
		$responsej = json_decode($response,true);
		if ($responsej['message']!='error'){
			foreach($emailData as $edata){
				$this->addemail($edata);
			}
		}	
		
		}
		
		
		$this->UpdateSettingsDetailsValues($lastorderno);
		//printArray($schedlueArray);
		//exit;
		echo done;
		exit;
		return $TemplateDetails;
	}

    function CustomerNotesection($objArray) {
   
        $notesset_id = $_REQUEST['usernote_id'];
		$update_date 	= date("Y-m-d H:i:s");
		$status = 'Inactive';
		
		if ($notesset_id!='') 
		   {
			   $strUpdateArray = array(
						array("status",$status),
						array("update_date", $update_date)	
			   );					
			 
			  $strWhereClause	= "notes_id = '".$notesset_id."'";
			  $this->common_Update_Set1(tbl_notes_dashboard, $strUpdateArray, $strWhereClause,0);
		}
	/*	echo '<pre>';
		print_r($notesset_id);
		exit;*/
   }
   function CustomerNotificationlist($objArray) {
   
    $get_userdet_qry="SELECT customer_notes FROM tbl_notes ORDER BY id DESC LIMIT 0 , 3) t ORDER BY id ASC";
	echo '<pre>';
	print_r($get_userdet_qry);
	exit;
	$UpdateNotes = $this->SelectQryDirect($get_userdet_qry,0);
		}

	function CustomerNoteNotification($Arraypost){
	    global $global_config, $objSmarty;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");
		
		$notes_id=$_REQUEST['ctnote_id'];
		$customer_id=$_REQUEST['ctuser_id'];
		$status=$_REQUEST['ct_mchk'];
		
		$get_userdet_qry = "SELECT * FROM tbl_notes_dashboard WHERE notes_id ='".$notes_id."'";
		$UpdateNotes = $this->SelectQryDirect($get_userdet_qry,0);
		
		/*echo '<pre>';
		print_r($UpdateNotes);
		exit;*/
		   if ($UpdateNotes[0] > 0) 
		      {
 		   	        $strUpdateArray = array(
							    array("notes_id",$notes_id),
								array("customer_id",$customer_id),
								array("status",$status),
								array("create_date", 	$created_date),
								array("update_date", 	$update_date)	
							);					
	             
			   	  $strWhereClause	= "notes_id = '".$notes_id."'";
				  $this->common_Update_Set1(tbl_notes_dashboard, $strUpdateArray, $strWhereClause,0);
		   }
		else
		{		
			$strInsertArray = array(
								array("notes_id",$notes_id),
								array("customer_id",$customer_id),
								array("status",$status),
								array("create_date", 	$created_date),
								array("update_date", 	$update_date)								
							);
		$this->common_Insert(tbl_notes_dashboard, $strInsertArray,'','',0);
		}
		/*$strTable = tbl_notes_dashboard;
							$strUpdateArray = array(
								array("status", $status)
							);
							
							$strWhereClause	= "customer_id = '".$customer_id."'";
							$update = $this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);*/
	
	}
	function UpdateCustomerNotification($objArray) {
		global $objSmarty, $global_config;
		
		$customer_id=$_REQUEST['ctuser_id'];
		$status=$_REQUEST['ct_mchk'];	
		$update_date 	= date("Y-m-d H:i:s");
		
		$strTable = tbl_notes_dashboard;
		$strUpdateArray = array(
									array("update_date", 	$update_date),	
									array("status",$status)
							);
		if($objArray['id'] > 0) {
			$strWhereClause	= "id = '".$objArray['id']."'";
			$this->common_Update($strTable, $strUpdateArray, $strWhereClause,0);
		}
		
	}
	
	//view customerlist
	function ViewCustomerlist($Arraypost){
	global $global_config, $objSmarty;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");
		$update_date 			= date("Y-m-d H:i:s");
		$notes_id=$_REQUEST['ctnote_id'];
		$customer_id=$_REQUEST['ctuser_id'];
		$customer_notes=$_REQUEST['customer_notes'];
		
		}
		
		
		
		/*echo '<pre>';
		print_r($UpdateNotes);
		exit;*/
		
		//view customer list
	function viewCustomerlist($objarray)	{
				
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'customer_notes',
			1 => 'create_date',			
		);
		
		// getting total number records without any search
		$stremailidexist_qry = "SELECT * ";
		$stremailidexist_qry.=" FROM  tbl_notes";
		//$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
		$totalData = $this->SelectQryDirect($stremailidexist_qry);
		
		/*echo '<pre>';
		print_r($totalData);
		exit;*/
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.
	
		$sql = "SELECT * ";
		$sql.=" FROM tbl_notes where id > 0";
		
		$query=$this->SelectQryDirect($sql);
		$totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
		//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
		/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
		
		$data=$this->SelectQryDirect($sql);
		$dataResult = array();
		
				foreach($data as $dataVal) {
				$lastrow = '';
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('l F d, Y', $yrdata);
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						'0'  => $dataVal['customer_notes'],						
						'1'  => $dataVal['create_date'],
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
		
		
	}
	//view customer list
	
	/* Function to get customer notes Ajax table starts here */
		function ViewCustomerNotesList($requestData) {
			//echo '<pre>';
			//print_r($requestData['current_customer_id']);
			$current_customer_id = $requestData['current_customer_id'];
			//exit;
			
		global $objSmarty, $global_config;
		$columns = array( 
		// datatable column index  => database column name
			0 => 'notes_id',
			1 => 'current_customer_id',
			2 => 'customer_notes',			
			3 => 'created_date',
			4 => 'Update_date'									
		);
		
		
		
			foreach($data as $dataVal) {
			/*	$lastrow = '';
						 //<td width="1%"  class="text-center"><input type="checkbox" class="case" id="chk" name="chk[]" value="{$EmailList[emails].id}" /></td>
						$lastrow .= '<input type="checkbox" name="pin_notes_dashboard" id="pin_notes_dashboard" onclick="checkupdatenote(\''.$dataVal['id'].'\')">
						<input type="hidden" name="customer_notes_id" id="customer_notes_id" value="'.$current_customer_id.'"/>
						<input type="hidden" name="notes_id" id="notes_id" value="'.$dataVal['id'].'"/>';*/
						
						
					$getcustomer_notes = "SELECT customer_notes FROM tbl_notes where id='".$dataVal['id']."'";
					$customer_notes = $this->SelectQryDirect($getcustomer_notes);					
						
												
					$yrdata= strtotime($dataVal['create_date']);
					$create_date =  date('d/m/Y h:i:s a', $yrdata);
					
					$yrdata1= strtotime($dataVal['create_date']);
					$update_date =  date('d/m/Y h:i:s a', $yrdata1);
					
					
			
					$dataResult[] = array(
						'DT_RowId' => "row".$dataVal['id'],
						'DT_RowClass' => "row".$dataVal['id'],
						
						'0'  => $dataVal['id'],
						'1'  => $current_customer_id,
						'2'	 => $customer_notes,
						'3'	 => $create_date,				
						'4'	 => $update_date
						
					);
				
			}
			
		
	
		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $dataResult   // total data array
					);
		
		echo json_encode($json_data); 
	} 
	// End Notes list
	//Update license period length start here
	function UpdateLicensePeriodLength($objarray) {
		global $objSmarty, $global_config;

		$strTable = tbl_license_period_length;
		$Admin_ID = $_SESSION['container_rental_admin_id'];
		$created_date 			= date("Y-m-d H:i:s");	
					
		$strUpdateArray = array(
								array("date",	$objarray['date']),
								array("create_date", 	$created_date),
							);
							
		
		if($objarray['id'] > 0) {
			$strWhereClause	= "id = '".$objarray['id']."'";

			$this->common_Update_Set1($strTable, $strUpdateArray, $strWhereClause,0);
		}
	}
	
	//End update license period length
	
	//Edit License Details start
	function GetEditLicensePeriod($objarray) {
		global $objSmarty, $global_config;

		$LicensePeriodEdit = "SELECT * FROM tbl_license_period_length WHERE id='".$objarray['id']."'";
		$LicensePeriodEdit_Res = $this->SelectQryDirect($LicensePeriodEdit,0);

	
		$objSmarty->assign("LicensePeriodLength",$LicensePeriodEdit_Res);
		
		return $LicensePeriodLength;
	}
	//Edit License Details end
	//View License Details start
	function GetLicensePeriod() {
		global $objSmarty,$global_config;
		$stremailidexist_qry	=	"select * from tbl_license_period_length ";
		$stremailidexist_res	=	$this->SelectQryDirect($stremailidexist_qry);
		return $stremailidexist_res;
	} 
	//View License Details end
	
	

}
?>