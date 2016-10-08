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
		.pound_sym{
			bottom: 3px;
			font-size: 25px;
			left: 30px;
			position: relative;
		}
    </style>

<script type="text/javascript">
</script>
{/literal}	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
<section class="content-header">
		<h1>View Customer</h1>
	</section>

<section class="content">
		<!--<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('customer_details');">Customer Details</button>
				<button type="button" class="btn bg-primary btn-primary margin" onclick="customer_tab_form_section('payment_history');">Payment History</button>
				<button type="button" class="btn bg-navy btn-navy margin">Communication</button>
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('notes');">Notes</button>															

			</div>	
		</div>	
		<form name="customer_tab_form" id="customer_tab_form" role="form" action="" method="post">
			<input type="hidden" name="hdaction" id="hdaction" value="5" />
			<input type="hidden" name="current_user_id" id="current_user_id" value="{$current_user_id}"  /> 
			<input type="hidden" name="current_customer_id" id="current_customer_id" value="{$current_customer_id}"  /> 			
			
		</form>-->
		
	<div class="row" >
		<div class="col-md-12">
			{if $update_msg neq ''}
				{if $msgcode eq '3'}
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						{$update_msg}
					</div>
				{elseif $msgcode eq '1'}
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{$update_msg}
					  </div>
				{elseif $msgcode eq '2'}
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{$update_msg}
					  </div>
				{elseif $msgcode eq '15'}
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						{$update_msg}
					  </div>					  
				{else}	
					<div class="box box-primary">
							<span class="success_new">{$update_msg}</span>
					</div>
				{/if}		
			{/if}
		
			<form name="templatelist" id="templatelist" method="post" action="" onsubmit="return checkUpload();">
				<input type="hidden" name="Page" id="Page" value="payment_process" />
				<input type="hidden" name="customer_id" id="customer_id" value="{$current_customer_id}" />
				<input type="hidden" name="payment_status" id="payment_status" value="yes"/>
				<input type="hidden" name="hdAction" id="hdAction" value="1"/>
				<div class="box box-primary">
					
					<div class="row" >
							
							<div class="col-md-12 ">
								<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$current_customer_id}" class="btn bg-primary btn-primary margin" type="button">Back to Payment History</a>	
							</div>
								
							<div class="col-md-12 ">
								<div class="col-md-6">
									<h2 class="box-title">De Assign a Container - {$Customer_full_name}</h2>
								</div>
								<!--<div class="col-md-4">
									<a class="new_admin_class" href="{$siteadmin_globalpath}assign_container.php?customer_id={$current_customer_id}" title="Create Manual Container"><i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i></a>
									<a class="new_admin_class" href="javascript:void(0)" title="De assign"><i class="glyphicon glyphicon-remove" style="font-size:28px;color:green;"></i></a>
									
									<a class="new_admin_class" href="{$siteadmin_globalpath}payment_process.php?customer_id={$current_customer_id}" title="De assign"><p style="font-size:28px;color:green;">Accept a Payment</p></a>
									</div>-->
									
							</div>
					</div>
						

				<div class="box-body table-responsive">
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="8%">Container Type</th>
								<th width="8%">Container Number</th>
								<th width="9%">Next Due Date</th>
								<!--<th width="14%">Related Period</th>-->
								<th width="8%">Days Over Due</th>								
								<th width="12%">License Fee Due / Repayable</th>
								<th width="12%">Deposit Fee Due / Repayable</th>																
								<th width="12%">Miscellaneous Fee Due / Repayable</th>								
								<th width="12%">Penalty Fee Due</th>
								<th width="5%">Total amount due / Repayable</th>								
							</tr>
						</thead>
						
						<tbody>
                        {section name="payment" loop=$PaymentHistoryList}
							<input type="hidden" name="license_fee_amount_due[]" id="license_fee_amount_due{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].license_fee_amount_due}" />
							
							<input type="hidden" name="Repayable_Total_amount_due[]" id="Repayable_Total_amount_due{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].Repayable_Total_amount_due}" />							
							
							
							<!--<input type="hidden" name="container_total_month_paid[]" id="container_total_month_paid_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].total_month_paid}" />-->
														
													
							<input type="hidden" name="payment_id" id="payment_id" value="{$PaymentHistoryList[payment].id}" />
							
							<input type="hidden" name="container_payment_total[]" id="container_payment_total_{$PaymentHistoryList[payment].id}" value="" />


							<input type="hidden" name="container_type[]" id="container_type_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].container_type}" />
							<input type="hidden" name="container_number[]" id="container_number_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].container_number}" />
							<input type="hidden" name="contract_next_due_date[]" id="contract_next_due_date_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].contract_next_due_date}" />
							<input type="hidden" name="overdue[]" id="overdue_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].overdue}" />

							<input type="hidden" name="licence_amount_vat_sum[]" id="licence_amount_vat_sum_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].licence_amount_vat}" />
							<input type="hidden" name="deposit_amount_sum[]" id="deposit_amount_sum_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].deposit_amount}" />
							<input type="hidden" name="miscellaneous_sum[]" id="miscellaneous_sum_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].miscellaneous}" />
							<input type="hidden" name="penality_sum[]" id="penality_sum_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].penality_amount}" />							
							<input type="hidden" name="totalAmountDueColumn_sum[]" id="totalAmountDueColumn_sum_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].totalAmountDueColumn}" />														
							
							<!--<input type="hidden" name="related_date[]" id="related_date_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].Related_priod_Result}" />-->														
							<!-- <br />-->
                          <tr>
                            <td width="5%">{$PaymentHistoryList[payment].container_type}</td>
							<td width="5%">{$PaymentHistoryList[payment].containerName}</td>
							<td width="7%">{$PaymentHistoryList[payment].contract_next_due_date}</td>
							<td width="5%">{$PaymentHistoryList[payment].overdue}</td>
							<td width="5%">
							
							<!--<input type="text" name="licence_amount_vat_exact[]" id="licence_amount_vat_exact_{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].license_fee_amount_due_exact}" />-->
							
							<input type="hidden" name="licence_amount_vat_sum_without_symbol[]" id="licence_amount_vat_sum_without_symbol{$PaymentHistoryList[payment].id}" value="{$PaymentHistoryList[payment].license_fee_amount_amount_due_without_symbol}" />
							{$PaymentHistoryList[payment].license_fee_amount_due_with_symbol}</td>
                            <td width="5%">- &pound; 
							{$PaymentHistoryList[payment].RepayDepositamount}
							</td>
							<td width="7%">&pound; {if $PaymentHistoryList[payment].miscellaneous eq ''} 0 {else} {$PaymentHistoryList[payment].miscellaneous} {/if}</td>
							<td width="7%">{$PaymentHistoryList[payment].penality}</td>
							<td width="35%" id="total_amount_due">
							 <input type="hidden" class="finalTotalAmountDue_without_symbol" style="width:79%; border:none; " id="total_amount_due_lmdp_without_symbol{$PaymentHistoryList[payment].id}" name="total_amount_due_lmdp_without_symbol[]" value="{$PaymentHistoryList[payment].Repayable_Total_amount_due_without_symbol}" readonly="" />
							 
							 <input type="text" class="finalTotalAmountDue" style="width:79%; border:none; " id="total_amount_due_lmdp_{$PaymentHistoryList[payment].id}" name="total_amount_due_lmdp" disabled="disabled" value="{$PaymentHistoryList[payment].Repayable_Total_amount_due}" readonly="" /></td>
                          </tr> 
                        {sectionelse}
                          <tr>
                            <td colspan="7" align="center">No Payment Process Found</td>
                          </tr>
                        {/section}
                      </tbody>
						
						
					</table>
					
					
				</div>
				</div>
			
			
			
				<div class="box box-primary">	
						
						<div class="col-md-12">
							<br />
							<span id="lblError" style="color: red; padding-top: 10px;"></span>
						</div>
						
				
						<div class="row">
							<div class="col-md-6">
							
								<div class="form-group">
									<div id="payment_content">
										<div class="col-md-12" id="new_author_user_content_{$smarty.section.author.index}">
												<div class="col-md-6">
												<label for="exampleInputEmail1">Total amount due / Repayable: </label>
												<span class="pull-right pound_sym">&pound;</span>
												</div>	
												
												<div class="col-md-6">
													<!----><input type="text" name="total_amount_due_final" id="total_amount_due_final" readonly="" value=""  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
												</div>
												
												<div class="col-md-6">
												<label for="exampleInputEmail1">Payment Method: </label>
												</div>	
												
												<div class="col-md-6">
												<select name="payment_method" id="payment_method" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
														<option value="0">Select Payment Type</option>
														<option value="Cash">Cash</option>
														<option value="Card">Card</option>
														<option value="Bank">Bank</option>									
												</select>
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<br />
							<span id="lblError" style="color: red; padding-top: 10px;"></span>
						</div>
						
						
						<div class="box-footer">
							<div class="col-md-offset-3">
								<!--<button class="btn btn-primary">Submit</button>-->
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>	
						</div>
					</div>
					
					
			</form>		
		</div>
	</div>
	
	
			
	
</section>
</div>
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}

<script src="{$siteadmin_globalpath}js/res/json2.js" type="text/javascript"></script>
<script src="{$siteadmin_globalpath}js/condition-builder.js" type="text/javascript"></script>
{literal}
    <script type="text/javascript">
		
		/*	var sum = 0;
			$('.finalTotalAmountDue').each(function() {
				sum += Number($(this).val());
			});

		if (sum < 0) {
			sum = "- &pound; "+ sum.toFixed(2);
		}else{
			sum = "&pound; "+ sum.toFixed(2);		
		}
		
		$('#total_amount_due_final').val(sum);
		*/
		
		var sum = 0;
		var sum_symbol = '';
		var myarr1 = 0;
			
			$('.finalTotalAmountDue_without_symbol').each(function() {
				sum += Number($(this).val());
			});

		if (sum < 0) {
			sum_symbol = "- &pound; ";			
			$('.pound_sym').html(sum_symbol);
			var myarr = sum.toString().split('-'); //sum.split("-");
			 myarr1 = myarr[1];
			//var myvar = myarr[0] + ":" + myarr[1];
			
		}else{
			 myarr1 = sum.toFixed(2);
			sum_symbol = "- &pound; ";
			$('.pound_sym').html(sum_symbol);
		}
		
		
		$('#total_amount_due_final').val(myarr1);


		function getActiveContainers(containerCategory, contentDiv_id){
			if(containerCategory !=0 || containerCategory !=''){
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "ajaxformdata.php?action=getcontainerCategory&containerCategoryType="+containerCategory,
						success:function(data){
							$('#new_container_content_'+ contentDiv_id +' select#container_number').html(data.optioin_value);
							$('#new_container_content_'+ contentDiv_id +' #deposit_amount').val(data.deposit_amount);
							$('#new_container_content_'+ contentDiv_id +' #licence_vat_amount').val(data.licence_amount_vat);
							
							var deposit_amount = (isNaN(parseInt(data.deposit_amount))) ? 0 : parseInt(data.deposit_amount);
							var licence_amount_vat = (isNaN(parseInt(data.licence_amount_vat))) ? 0 : parseInt(data.licence_amount_vat);
							//input3.val(deposit_amount + licence_amount_vat);
							var total_due_amount = deposit_amount + licence_amount_vat;
							
							$('#new_container_content_'+ contentDiv_id +' #total_payment_due').val(total_due_amount);
						}
				});	
			}	
		}
			// Get the ACtive container list End			
		
		function allownumericwithoutdecimal(val, id){
			var licence_vat_amount = $("#new_container_content_"+ id +" #licence_vat_amount").val();				
			var deposit_amount = $("#new_container_content_"+ id +" #deposit_amount").val();				
			
			if(licence_vat_amount !='' && deposit_amount !=''){
				var miscellaneous_amount = parseInt(licence_vat_amount) + parseInt(deposit_amount) + parseInt(val);
				$("#new_container_content_"+ id +" #total_payment_due").val(miscellaneous_amount);
			}	
		 }
		  
			
		$(document).ready(function () {
			initdatepicker();
        });
	
		function initdatepicker(){
			var currentDate = $( ".contract_start_date" ).datepicker( "setDate", new Date() );
		}	
		
		function checkUpload(){
			
			var total_amount_due_final = $( "#total_amount_due_final" ).val();
			var payment_method = $( "#payment_method" ).val();

			if(total_amount_due_final == "" ){
				alert('Total amount amount due is empty');
				$( "#total_amount_due_final" ).focus();				
				$( "#total_amount_due_final" ).css('border', '1px solid red');
				return false;
			}else{
				$( "#total_amount_due_final" ).css('border', '1px solid #d2d6de');			
			}
			
			if(payment_method == "0" ){
				alert('Please select the Payment type');
				$( "select#payment_method" ).css('border', '1px solid red');				
				$( "#payment_method" ).focus();				
				return false;
			}else{
				$( "select#payment_method" ).css('border', '1px solid #d2d6de');			
			}
			
		}
    </script>
	<script src="signature/assets/json2.min.js"></script>
{/literal}	