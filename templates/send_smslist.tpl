{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<!--<link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">-->
<style type="text/css">

        .head
        {
            /* for IE */
            filter: alpha(opacity=50);
            /* CSS 3 standard */
            opacity: 0.5;
        }
        .seperator
        {
            border-right: 2px solid brown;
			
        }

		.add_more img{
			cursor:pointer;
		}
		
		.pad {
			border: 1px solid;
			padding: 10px;
		}
		.clearButton {
			list-style: outside none none;
		}
		.clearButton a{
			color: red !important;
			cursor: pointer;
			float: right;
			margin-right: 10%;
		}
		
		.pound-symbol {
			display:none;
			font-size: 24px;
			font-weight: bold;
			left: 40px;
			position: relative;
		}
		
		.multiselect.dropdown-toggle.btn.btn-default {
			width: 244px;
		}
		.open > .dropdown-menu {
		    display: block;
			height: 250px;
			overflow-y: scroll;
			width: 244px;
		}		
    </style>

<script type="text/javascript">

	
	function getResults(searchType)  {
		//document.forms[document.forms.length-1].submit();
	}

	function ShiftPage(Page,Display)  {
	//loading('Processing');
	  if(document.getElementById("sort") && document.getElementById("hdsort_ord")) {
		document.getElementById("sort").value = document.getElementById("hdsort_ord").value;
		document.getElementById("order").value = document.getElementById("hdorder").value;
	  }
	  if(document.getElementById("modelbx")){
		document.forms[1].Page.value=Page;
		document.forms[1].submit();
	  } 
	  document.forms[document.forms.length-1].Page.value=Page;
	  document.forms[document.forms.length-1].submit();
	}

</script>
{/literal}	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
<section class="content-header">
		<h1>Schedule an SMS</h1>
	</section>

<section class="content">
	<div class="row">
	
		
	
		<form name="send_smslist_form" id="send_smslist_form" role="form" method="post"  onsubmit="return checkValidation();">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					
						<input type="hidden" name="hdAction" id="hdAction" value="2" />
						<input type="hidden" name="selected_customer_ids" id="selected_customer_ids" value="" />						
						
						
						<!--<input type="hidden" name="user_type" id="user_type" value="admin" />						
						
						<input type="hidden" name="address_proof_file_type" id="address_proof_file_type" value="" />
						<input type="hidden" name="id_proof_file_type" id="id_proof_file_type" value="" />
						
						
						<input type="hidden" name="listsmsvalue" id="listsmsvalue" value="">
						<input type="hidden" name="listsmsvaluename" id="listsmsvaluename" value="">-->
						
						<div class="box-body">
						
						
						
							
							
							<div class="form-group col-lg-6">
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<label for="exampleInputEmail1">Select Recipient: </label>
								</div>	
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
		
									<select name="customer_type" id="customer_type" class="form-control container_type_customer" onchange="getSMScustomerslist(this.value)"  style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
										<option value="0" {if $customer_type eq '0'} selected="selected"{/if}>Select Recipients</option>
										<option value="over_due_customer"  {if $customer_type eq 'over_due_customer'} selected="selected"{/if}>Overdue Customers</option>
										<option value="all_customer" {if $customer_type eq 'all_customer'} selected="selected"{/if}>All Customers</option>
										<option value="selected_customer" {if $customer_type eq 'selected_customer'} selected="selected"{/if}>Specific customers</option>									
									</select>
								</div>	
							</div>
							
							
							<div class="form-group col-lg-12" style="display:none">
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<label for="exampleInputEmail1">Select - {$customer_type} - Customers:</label>
								</div>	
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									 <select class="form-control class listsms" name="listsms" id="inputError" multiple="multiple">
									</select>
								</div>
							</div>	
							
							
						{if $customer_type neq 'over_due_customer'}
							<div class="form-group col-lg-12">
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<label for="exampleInputEmail1">Select Customers: </label>
									
								</div>	
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<select id="lstCustomer" name="lstCustomer" multiple="multiple" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;">
										{section name="sms" loop=$ViewSMSCustomerList}
											<option value="{$ViewSMSCustomerList[sms].id}">{$ViewSMSCustomerList[sms].first_name}</option>
										{/section}									
							  </select>
								</div>	
							</div>
						{else}
							<div class="form-group col-lg-12">
								&nbsp;
							</div>	
						{/if}
							
						
						<div class="form-group col-lg-6">	
							<div class="bootstrap-timepicker">
								<div class="bootstrap-timepicker-widget dropdown-menu">
									<table>
									<tbody>
									<tr>
									<td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td>
									<td class="separator">&nbsp;</td>
									<td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td>
									<td class="separator">&nbsp;</td>
									<td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-up"></i></a></td>
									</tr>
									<tr>
									<td><span class="bootstrap-timepicker-hour">02</span></td>
									<td class="separator">:</td>
									<td><span class="bootstrap-timepicker-minute">15</span></td>
									<td class="separator">&nbsp;</td>
									<td><span class="bootstrap-timepicker-meridian">PM</span></td>
									</tr>
									<tr>
									<td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td>
									<td class="separator"></td>
									<td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td>
									<td class="separator">&nbsp;</td>
									<td><a href="#" data-action="toggleMeridian"><i class="glyphicon glyphicon-chevron-down"></i></a></td>
									</tr>
									</tbody>
									</table>
								</div>
								<div class="form-group">
									<label>Time picker:</label>
									<div class="input-group">
									<input type="text" name="time_value" id="time_value" value="{$ViewSMSCustomerList[0].time_to_send}"  class="form-control timepicker">
									<div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
									</div>
									<!-- /.input group -->
									</div>
								<!-- /.form group -->
								</div>
							</div>
							
		  
		  					<!--<input type="button" id="btnSelected" value="Get Selected" />-->
							
								
							<div class="form-group col-lg-6">
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<label for="exampleInputEmail1">Select Repetition: </label>
								</div>	
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<select name="get_repetition" id="get_repetition" onchange="getResults(this.value)" class="form-control container_type_customer" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
										<option value="0" {if $daterange eq '0'} selected="selected"{/if}>Select Repetition</option>
										<option value="daily"  {if $daterange eq 'overdue_customers'} selected="selected"{/if}>Daily</option>
										<option value="weekly" {if $daterange eq 'all_customers'} selected="selected"{/if}>Weekly</option>
										<option value="monthly" {if $daterange eq 'specific_customers'} selected="selected"{/if}>Monthly</option>									
									</select>
								</div>	
							</div>
								
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">SMS Message: </label>
								</div>	
								<div class="col-md-12">
									<textarea placeholder="Enter Message" id="sms_content" cols="10" rows="5" class="form-control" name="sms_content" ></textarea>
								</div>	
							</div>
							
							<div class="form-group">
											<div class="col-md-12">
												<label for="exampleInputEmail1">&nbsp;</label>
											</div>	
											<div class="col-md-8 col-md-offset-2">
												<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
											</div>
											<div class="col-md-12">
												<label for="exampleInputEmail1">&nbsp;</label>
											</div>	
									</div>
							
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!--/.col (left) -->
			
			
			
			
			</form>
			
			 <form name="smslist_form" id="smslist_form" method="post" action="send_smslist.php">
						<!--<input type="hidden" name="hdAction" id="hdAction" value="1"/>-->
						<input type="hidden" name="customer_type" id="customer_type_val" value="" />
			</form>				
			
		</div>
			
	
</section>
</div>
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}

<script src="{$siteadmin_globalpath}js/res/json2.js" type="text/javascript"></script>
<script src="{$siteadmin_globalpath}js/condition-builder.js" type="text/javascript"></script>
<script src="{$siteadmin_globalpath}plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
	<script src="signature/assets/json2.min.js"></script>

<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js" type="text/javascript"></script>

{literal}
    <script type="text/javascript">
	
		
		function getSMScustomerslist(customerType){
			
			$('#customer_type_val').val(customerType);
			$('#smslist_form').submit();
			
			//window.location='send_smslist.php';
		
			/*if(customerType !=0 || customerType !=''){
				$.ajax({
				type: "POST",
				dataType: "json",
				url: "ajaxformdata.php?action=getAjaxSMScustomerslist&customerType="+customerType,
					success:function(data){
						if(data != "failed"){
							$('#lstCustomer').html(data);
							
						}else{
							alert('asdfasdf');
						}	
						location.reload();
					}
				});	
			}	*/
		}
	
		function checkValidation(){
			var customer_type	 = $('#customer_type').val();
			var get_repetition	 = $('#get_repetition').val();			
			var sms_content		 = $('#sms_content').val();						
			var lstCustomer		 = $('#lstCustomer').val();									
			
			
			if(lstCustomer ==0 || lstCustomer ==''){
				alert('Please select the Customer');
				return false;
			}			
			if(customer_type ==0 || customer_type ==''){
				alert('Please select the Recipient');
				return false;
			}
			if(get_repetition ==0){
				alert('Please Select the Repetition');
				return false;
			}
			
			if(sms_content ==0){
				alert('Please Enter the description');
				$('#sms_content').focus();	
				return false;
			}
			
			if(customer_type == 'over_due_customer'){
				/*var result=confirm('Are you sure want to delete? all  old over due customers?');
				if(!result) {
					alert('eeeeeeeeeeee');
				}else{
					alert('ffffffffffff');
				}	*/
			}	
		
			if(customer_type == 'all_customer'){
				var result=confirm('Are you sure want to delete? all  old customers?');
				if(result) {
					//alert('ssssssssssss');
				}else{
					return false;
					//alert('dddddddddd');
				}	
			}	
			
			if(customer_type == 'selected_customer'){
				var result=confirm('Are you sure want to delete? all  old selected customers?');
				if(result) {

				}else{
					return false;
				}	
			}	
			
			
			
			var selected = $("#lstCustomer option:selected");
			var message = "";
			selected.each(function () {
				//message += $(this).text() + " " + $(this).val() + "\n";
				message += $(this).val() + ",";
			});
			$('#selected_customer_ids').val(message);
			//return false;
			//alert(message);
		}
	
		//$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
		
		/*function get_list(){
		
				var data_html = '<option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option><option value="0">Test - New </option>';
				
				$('select.listsms').html(data_html);
					$('select.listsms').multiselect({
						columns: 1,
						placeholder: 'Select Teachers',
						selectAll: true,
						search: true
						});
				
					$('select.listsms').multiselect( 'reload' );

		}*/		 /*$.ajax({
				type: 'POST',
				url: 'lisssssssssssssssssssssssst',
				data: {sc_school:sc_school,sc_class:sc_class,sc_section:sc_section1[0]},
				success: function(resp) {
					var data_html = '<option value='{$var1}'>{$var2} - {$var}</option>';
					$('select.listsms').html(data_html);
					$('select.listsms').multiselect({
						columns: 1,
						placeholder: 'Select Teachers',
						selectAll: true,
						search: true
						});
				
					$('select.listsms').multiselect( 'reload' );
					}
			});*/
		//}	
				
			
		 $(function () {
		 //Timepicker
			$(".timepicker").timepicker({
			  showInputs: false
			});
		  });
    </script>
		  <script type="text/javascript">
				$(function () {
					$('#lstCustomer').multiselect({ 
						includeSelectAllOption: true
					});
					/*$('#btnSelected').click(function () {
						var selected = $("#lstCustomer option:selected");
						var message = "";
						selected.each(function () {
							message += $(this).text() + " " + $(this).val() + "\n";
						});
						alert(message);
					});*/
				});
			</script>
{/literal}	