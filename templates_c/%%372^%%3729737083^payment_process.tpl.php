<?php /* Smarty version 2.6.2, created on 2016-10-07 16:45:05
         compiled from payment_process.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/left_nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">
function editNotesDetails(id){
	//alert(\'Processing on this section..will get back to you soon.\'+id);
	//return false;
	if(id > 0) {
	//loading(\'Processing\');
		window.location.href = "edit_notes.php?id="+id;
	}
}

function statuschage(id,status) {
	//loading(\'Processing\');
	$("#active"+id).hide();
	$("#deactive"+id).hide();
	$("#loadingactive"+id).show();

	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=adminuserstatus&id="+id+"&status="+status,
        	success:function(){
			$("#loadingactive"+id).hide();
			if (status == 0){
				$("#active"+id).hide();
				$("#deactive"+id).show();
				
			} else {
  				$("#active"+id).show();
				$("#deactive"+id).hide();
				
			}
			
			//$.fancybox.close();
    }});
}

function DeleteNotesDetails(Id) {
	
  document.getElementById(\'hdAction\').value = 2;
  document.getElementById(\'triggerid\').value = Id;
 
  if(Id > 0) {
    var result=confirm(\'Are you sure want to delete?\');
    if(result) {
	//loading(\'Processing\');
	$("#delb"+Id).hide();
	$("#loadingdel"+Id).show();
	var current_customer_id = $("#current_customer_id").val();
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deleteNotes&id="+Id,
        	success:function(){
				var anSelected = dataTable.$(\'#row\'+Id);
				if ( anSelected.length !== 0 ) {
				$(\'#row\'+Id).remove();
					window.location = "notes_list.php?msgcode=3&customer_id="+current_customer_id;
					//&current_customer_id="+current_customer_id,
				}
    }});
	  
    } else {
      return false;
    }
  } 
}

</script>
'; ?>

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
			<input type="hidden" name="current_user_id" id="current_user_id" value="<?php echo $this->_tpl_vars['current_user_id']; ?>
"  /> 
			<input type="hidden" name="current_customer_id" id="current_customer_id" value="<?php echo $this->_tpl_vars['current_customer_id']; ?>
"  /> 			
			
		</form>-->
		
	<div class="row" >
		<div class="col-md-12">
			<?php if ($this->_tpl_vars['update_msg'] != ''): ?>
				<?php if ($this->_tpl_vars['msgcode'] == '3'): ?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						<?php echo $this->_tpl_vars['update_msg']; ?>

					</div>
				<?php elseif ($this->_tpl_vars['msgcode'] == '1'): ?>
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						<?php echo $this->_tpl_vars['update_msg']; ?>

					  </div>
				<?php elseif ($this->_tpl_vars['msgcode'] == '2'): ?>
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						<?php echo $this->_tpl_vars['update_msg']; ?>

					  </div>
				<?php else: ?>	
					<div class="box box-primary">
							<span class="success_new"><?php echo $this->_tpl_vars['update_msg']; ?>
</span>
					</div>
				<?php endif; ?>		
			<?php endif; ?>
		
			<form name="templatelist" id="templatelist" method="post" action="" onsubmit="return checkUpload();">
				<input type="hidden" name="Page" id="Page" value="payment_process" />
				<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->_tpl_vars['current_customer_id']; ?>
" />
				<input type="hidden" name="payment_status" id="payment_status" value="yes"/>
				<input type="hidden" name="hdAction" id="hdAction" value="5"/>
				<div class="box box-primary">
					
					<div class="row" >
							<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['current_customer_id']; ?>
" class="btn bg-primary btn-primary margin" type="button">Back to Payment History</a>
					
							<div class="col-md-12 ">
								
								<div class="col-md-6">
									<h2 class="box-title">Process a Payment - <?php echo $this->_tpl_vars['Customer_full_name']; ?>
</h2>
								</div>
								<!--<div class="col-md-4">
									<a class="new_admin_class" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
assign_container.php?customer_id=<?php echo $this->_tpl_vars['current_customer_id']; ?>
" title="Create Manual Container"><i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i></a>
									<a class="new_admin_class" href="javascript:void(0)" title="De assign"><i class="glyphicon glyphicon-remove" style="font-size:28px;color:green;"></i></a>
									
									<a class="new_admin_class" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_process.php?customer_id=<?php echo $this->_tpl_vars['current_customer_id']; ?>
" title="De assign"><p style="font-size:28px;color:green;">Accept a Payment</p></a>
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
								<th width="14%">Related Period</th>
								<th width="8%">Days Over Due</th>								
								<th width="2%">License Fee</th>
								<th width="2%">Deposit Fee</th>																
								<th width="2%">Miscellaneous Fee</th>								
								<th width="7%">Penality Fee</th>
								<th width="9%">Amount Due</th>																								
								<th width="5%">Number of Months</th>
								<th width="5%">Total Amount Due</th>								
							</tr>
						</thead>
						
						<tbody>
                        <?php if (isset($this->_sections['payment'])) unset($this->_sections['payment']);
$this->_sections['payment']['name'] = 'payment';
$this->_sections['payment']['loop'] = is_array($_loop=$this->_tpl_vars['PaymentHistoryList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['payment']['show'] = true;
$this->_sections['payment']['max'] = $this->_sections['payment']['loop'];
$this->_sections['payment']['step'] = 1;
$this->_sections['payment']['start'] = $this->_sections['payment']['step'] > 0 ? 0 : $this->_sections['payment']['loop']-1;
if ($this->_sections['payment']['show']) {
    $this->_sections['payment']['total'] = $this->_sections['payment']['loop'];
    if ($this->_sections['payment']['total'] == 0)
        $this->_sections['payment']['show'] = false;
} else
    $this->_sections['payment']['total'] = 0;
if ($this->_sections['payment']['show']):

            for ($this->_sections['payment']['index'] = $this->_sections['payment']['start'], $this->_sections['payment']['iteration'] = 1;
                 $this->_sections['payment']['iteration'] <= $this->_sections['payment']['total'];
                 $this->_sections['payment']['index'] += $this->_sections['payment']['step'], $this->_sections['payment']['iteration']++):
$this->_sections['payment']['rownum'] = $this->_sections['payment']['iteration'];
$this->_sections['payment']['index_prev'] = $this->_sections['payment']['index'] - $this->_sections['payment']['step'];
$this->_sections['payment']['index_next'] = $this->_sections['payment']['index'] + $this->_sections['payment']['step'];
$this->_sections['payment']['first']      = ($this->_sections['payment']['iteration'] == 1);
$this->_sections['payment']['last']       = ($this->_sections['payment']['iteration'] == $this->_sections['payment']['total']);
?>
							<input type="hidden" name="payment_id" id="payment_id" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" />
							
							<input type="hidden" name="container_payment_total[]" id="container_payment_total_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="" />


							<input type="hidden" name="container_type[]" id="container_type_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_type']; ?>
" />
							<input type="hidden" name="container_number[]" id="container_number_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" />
							<input type="hidden" name="contract_next_due_date[]" id="contract_next_due_date_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['contract_next_due_date']; ?>
" />
							<input type="hidden" name="overdue[]" id="overdue_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['overdue']; ?>
" />

							<input type="hidden" name="licence_amount_vat_sum[]" id="licence_amount_vat_sum_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['licence_amount_vat']; ?>
" />
							<input type="hidden" name="deposit_amount_sum[]" id="deposit_amount_sum_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['deposit_amount']; ?>
" />
							<input type="hidden" name="miscellaneous_sum[]" id="miscellaneous_sum_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['miscellaneous']; ?>
" />
							<input type="hidden" name="penality_sum[]" id="penality_sum_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['penality_amount']; ?>
" />							
							<input type="hidden" name="totalAmountDueColumn_sum[]" id="totalAmountDueColumn_sum_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['totalAmountDueColumn']; ?>
" />														
							
							<!--<input type="hidden" name="related_date[]" id="related_date_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['Related_priod_Result']; ?>
" />-->														
							<!-- <br />-->
                          <tr>
                           <!-- <td width="2%"  class="text-center"><input type="checkbox" class="case" name="select_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" id="select_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" value="<?php echo $this->_tpl_vars['ProjectList'][$this->_sections['project']['index']]['project_id']; ?>
" /></td>-->
                            <td width="5%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_type']; ?>
</td>
							<td width="5%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['containerName']; ?>
</td>
							<td width="7%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['contract_next_due_date']; ?>
</td>
							<td width="20%">
							<input type="text" name="related_date[]" readonly="" id="related_date_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['Related_priod_Result']; ?>
" style="min-width: 75%; border:none" />	
							</td>
							<td width="5%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['overdue']; ?>
</td>
							<td width="5%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['licence_amount_vat']; ?>
</td>
                            <td width="5%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['deposit_amount']; ?>
</td>
							<td width="7%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['miscellaneous']; ?>
</td>
							<td width="7%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['penality']; ?>
</td>
							<td width="7%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['totalAmountDueColumn']; ?>
</td>
							<td width="5%"><select name="total_month" id="total_month" onchange="makeTotalDueAmount(this.value, '<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
')">
								<option value="0"> Select Month</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
								<option value="31">31</option>
								<option value="32">32</option>
								<option value="33">33</option>
								<option value="34">34</option>
								<option value="35">35</option>
								<option value="36">36</option>
																					
							</select></td>							
							<td width="35%" id="total_amount_due">&pound; <input type="text" style="width:79%; border:none; " id="total_amount_due_lmdp_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['id']; ?>
" name="total_amount_due_lmdp" disabled="disabled" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['totalAmountDueColumn']; ?>
" readonly="" /></td>
                          </tr> 
                        <?php endfor; else: ?>
                          <tr>
                            <td colspan="7" align="center">No Payment Process Found</td>
                          </tr>
                        <?php endif; ?>
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
										<div class="col-md-12" id="new_author_user_content_<?php echo $this->_sections['author']['index']; ?>
">
												<div class="col-md-4">
												<label for="exampleInputEmail1">Total Amount Due: </label>
												<span class="pull-right pound_sym">&pound;</span>
												</div>	
												
												<div class="col-md-6">
													<!----><input type="text" name="total_amount_due_final" id="total_amount_due_final" readonly="" value=""  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
												</div>
												
												<div class="col-md-4">
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
								<button type="submit" class="btn btn-primary">Process a Payment</button>
							</div>	
						</div>
					</div>
					
					
			</form>		
		</div>
	</div>
	
	
			
	
</section>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
    <script type="text/javascript">
	
		function checkUpload(){
			
			var total_amount_due_final = $(\'#total_amount_due_final\').val();
							
			if(total_amount_due_final == 0 || total_amount_due_final == \'\'){
				alert(\'Total due amount should be added, Please select the month\');
				 $(\'#total_amount_due_final\').focus();
				return false;
			}
			
			var payment_method = $(\'#payment_method\').val();
							
			if(payment_method ==0){
				alert(\'Please select the payment method\');
				 $(\'#payment_method\').focus();
				return false;
			}
			
			if(payment_method !=0){
				return true;
			}
			
			
			return false;
		
		}
	
		function makeTotalDueAmount(monthval, id){
			if(monthval != 0 && monthval !=\'\'){
				//alert(monthval);
				var licence_amount_vat_sum	= $("#licence_amount_vat_sum_"+id).val();				
				var deposit_amount_sum		= $("#deposit_amount_sum_"+id).val();				
				var miscellaneous_sum	 	= $("#miscellaneous_sum_"+id).val();				
				var penality_sum		 	= $("#penality_sum_"+id).val();								
				var contract_next_due_date		 	= $("#contract_next_due_date_"+id).val();	
				var TotalamountDue = $("#totalAmountDueColumn_sum_"+id).val();				
				
				//var deposit_amount = $("#new_container_content_"+ id +" #deposit_amount").val();	
				//var related_date_val		 	= $("#related_date_"+id).val();
											
				
				if(monthval != \'\'){
					$.ajax({
					type: "POST",
					url: "ajaxformdata.php?action=totalMonthDueDateCalculation&monthval="+monthval+"&next_due_date="+contract_next_due_date,
						success:function(data){
							$("#related_date_"+id).val(data);
							/*if(data == \'success\'){
								//window.location = "payment_history.php?customer_id="+customerId+"&msgcode=15";
							}*/
						}
					});
				}
				
							
				
				if(licence_amount_vat_sum !=\'\' && deposit_amount_sum !=\'\' && miscellaneous_sum !=\'\' && penality_sum !=\'\'){
					var TotalamountDue = parseInt( licence_amount_vat_sum * monthval) + parseInt(deposit_amount_sum) + parseInt(miscellaneous_sum) + parseInt(penality_sum);
					//var TotalamountDue = parseInt( TotalamountDue * monthval);
					$("#total_amount_due_lmdp_"+ id).val(TotalamountDue ); //1168
					
					
					$("#container_payment_total_"+ id).val(TotalamountDue ); //1168
					
					//Final Total amount Due
					var pound_sym = \'&pound;\';
					var arr_totalAmountDueColumn_sum = document.getElementsByName(\'total_amount_due_lmdp\');
						var tot=0;
						for(var i=0;i<arr_totalAmountDueColumn_sum.length;i++){
							if(parseInt(arr_totalAmountDueColumn_sum[i].value))
								tot += parseInt(arr_totalAmountDueColumn_sum[i].value);
						}
					document.getElementById(\'total_amount_due_final\').value = tot;
				}	
		 
			}else{
				var contract_next_due_date		 	= $("#contract_next_due_date_"+id).val();	
				alert(\'Please select any month\');
				
				if(monthval != \'\'){
					$.ajax({
					type: "POST",
					url: "ajaxformdata.php?action=totalMonthDueDateCalculation&monthval="+monthval+"&next_due_date="+contract_next_due_date,
						success:function(data){
							$("#related_date_"+id).val(data);
							/*if(data == \'success\'){
								//window.location = "payment_history.php?customer_id="+customerId+"&msgcode=15";
							}*/
						}
					});
				}
				
				var TotalamountDue = $("#totalAmountDueColumn_sum_"+id).val();	
				$("#total_amount_due_lmdp_"+ id).val(TotalamountDue );
				
				var arr_totalAmountDueColumn_sum = document.getElementsByName(\'total_amount_due_lmdp\');
						var tot=0;
						for(var i=0;i<arr_totalAmountDueColumn_sum.length;i++){
							if(parseInt(arr_totalAmountDueColumn_sum[i].value))
								tot += parseInt(arr_totalAmountDueColumn_sum[i].value);
						}
					document.getElementById(\'total_amount_due_final\').value = tot;
				
			}
		}
		
		
	
		function customer_tab_form_section(action_type){
			
			var customer_id = document.getElementById("current_customer_id").value;
			
			if(action_type == \'customer_details\'){
				document.getElementById("customer_tab_form").action = "view_customer.php?id=" + customer_id + "";	
			}else if(action_type == \'notes\'){
				document.getElementById("customer_tab_form").action = "notes_list.php?customer_id=" + customer_id + "";	
			}else if(action_type == \'payment_history\'){
				document.getElementById("customer_tab_form").action = "payment_history.php?customer_id=" + customer_id + "";	
			}
			document.getElementById(\'customer_tab_form\').submit();
			
		} 
	
     /* function gotoNotessection(){
			//alert(pagename);
			document.getElementById(\'customer_page\').submit();
			
		} */
		
	//	total_amount_due_lmdp
	
    </script>
	
	<script type="text/javascript" language="javascript" >
	/*var dataTable
    $(document).ready(function() {
		var current_customer_id = $("#current_customer_id").val();
         dataTable = $(\'#openTrigger\').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=payment_history&customer_id="+current_customer_id, // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html(\'<tr><th colspan="3">No data found in the server</th></tr>\');
                    $("#openTrigger_processing").css("display","none");
 
                },
				
	
            }
        } );
    } );*/
	</script>
	<style>
	.row{
		margin :0 !important;
	}
	.new_admin_class{
		display: inline-block;
		margin-top: 20px;
		margin-right:15px;
	}
	#openTrigger_length{
		display:none;
	}
	#openTrigger_filter{
		display:none;
	}
	#openTrigger_info{
		display:none;
	}
	#openTrigger_paginate{
		display:none;
	}
	.pound_sym{
		bottom: 3px;
		font-size: 25px;
		left: 30px;
		position: relative;
	}
	
	</style>
'; ?>
	