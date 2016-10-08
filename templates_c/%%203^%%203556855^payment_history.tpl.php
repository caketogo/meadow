<?php /* Smarty version 2.6.2, created on 2016-10-07 16:45:06
         compiled from payment_history.tpl */ ?>
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
		<h1>View Customer - <?php echo $this->_tpl_vars['Customer_full_name']; ?>
 </h1>
	</section>

<section class="content">
		<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('customer_details');">Customer Details</button>
				<button type="button" class="btn bg-primary btn-primary margin" onclick="customer_tab_form_section('payment_history');">Payment History</button>
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('communication_history');">Communication</button>
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('notes');">Notes</button>															

			</div>	
		</div>	
		
		<input type="hidden" name="siteadmin_globalpath" id="siteadmin_globalpath" value="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
" />		
		<form name="customer_tab_form" id="customer_tab_form" role="form" action="" method="post">
			<input type="hidden" name="hdaction" id="hdaction" value="5" />
			<input type="hidden" name="current_user_id" id="current_user_id" value="<?php echo $this->_tpl_vars['current_user_id']; ?>
"  /> 
			<input type="hidden" name="current_customer_id" id="current_customer_id" value="<?php echo $this->_tpl_vars['current_customer_id']; ?>
"  /> 			
			
		</form>
		
	<div class="row" >
		<div class="col-md-12" id="content_secion">
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
				<?php elseif ($this->_tpl_vars['msgcode'] == '20'): ?>
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						<?php echo $this->_tpl_vars['update_msg']; ?>

					  </div>	  
				<?php elseif ($this->_tpl_vars['msgcode'] == '15'): ?>
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						<?php echo $this->_tpl_vars['update_msg']; ?>

					  </div>	  					  
				<?php elseif ($this->_tpl_vars['msgcode'] == '25'): ?>
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
			
			
			<!--payment_process.php-->
			<form name="paymentprocessform" id="paymentprocessform" method="post">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->_tpl_vars['current_customer_id']; ?>
" />
				<input type="hidden" name="payment_process" id="payment_process" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				
				<input type="hidden" name="checked_container_number_val" id="checked_container_number_val" value=""/>
				
				<div class="box box-primary" id="scrollable_content1">
					
					<div class="row" >
							<div class="col-md-12 ">
								
								<div class="col-md-4">
									<h2 class="box-title"> Assigned Container (s)</h2>
								</div>
								<div class="col-md-8" style="margin-top:10px">
									<a class="col-xs-12 col-sm-4 col-md-4 btn bg-primary btn-primary margin" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
assign_container.php?customer_id=<?php echo $this->_tpl_vars['current_customer_id']; ?>
" title="Create Manual Container">
									Assign Container
									<!--<i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i>-->
									</a>
									<!--<button onclick="goDeAssignContainer();" class="btn bg-primary btn-primary margin" type="button">Assign Container</button>-->
									
									<!--<a class="new_admin_class" href="javascript:void(0)" title="De assign"><i class="glyphicon glyphicon-remove" style="font-size:28px;color:green;"></i></a>-->
								
									<select name='action_payment_history' id='action_payment_history' class='col-xs-12 col-sm-2 col-md-2 btn btn-primary dropdown-toggle select_view' style="margin-top:10px" onchange='getactionPaymentHistory('this.value');' >
														<option value='0'>View</option>
														<option value='license_agreement'>License Agreement</option>
														<option value='license_invoice'>Customer Invoice</option>									
													</select>	
													<!--<div class="col-sm-2 dropdown">
													<button class="btn btn-primary margin dropdown-toggle" type="button" data-toggle="dropdown">View
													</button>
														<ul class="dropdown-menu" style="margin-top:10px">
															<li><a href="javascript:void(0);">License Agreement</a></li>
															<li><a href="javascript:void(0);">Customer Invoice</a></li>
														</ul>
													</div>-->
									<button onclick="goDeAssignContainer();" class="col-xs-12 col-sm-8 col-md-5  btn bg-primary btn-primary margin" type="button">De Assign Container (s)</button>
									
									<!--<a class="new_admin_class" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_process.php?customer_id=<?php echo $this->_tpl_vars['current_customer_id']; ?>
" id="process_payment" title="De assign"><p style="font-size:28px;color:green;">Process a Payment</p></a>-->
									
									<button onclick="goProcessPayment();" class="col-xs-12 col-sm-8 col-md-5 btn bg-primary btn-primary margin" type="button">Process a Payment</button>
									<!--<div class="span4 proj-div" data-toggle="modal" data-target="#GSCCModal">Clickable content, graphics, whatever</div>-->
									<!--<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_process.php?customer_id=<?php echo $this->_tpl_vars['current_customer_id']; ?>
-->
									</div>
									
							</div>
					</div>
						

				<div class="box-body table-responsive">
					
				
					<table id="openTrigger_history" class="table table-striped table-bordered scroll">
						<thead>
							<tr>
								<th width="1%"></th>
								<th width="5%">Container Type</th>
								<th width="5%">Container Number</th>
								<th width="5%">Contract Start Date</th>
								<th width="5%">Next Due Date</th>
								<th width="8%">Related Period</th>
								<th width="8%">Days Over Due</th>								
								<th width="2%">License Fee</th>
								<th width="2%">Deposit Fee</th>																
								<th width="2%">Miscellaneous Fee</th>								
								<th width="7%">Penality Fee</th>
								<th width="9%">Total Payment Fee</th>
								<th width="20%">Container Status</th>																								
								<!--<th width="2%" style="text-align:center">Action</th>-->
							</tr>
						</thead>
						
						<tbody class="inner_table">
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

                          <tr>
                            <td width="1%"  class="text-center"><input type="checkbox" class="case" name="select_container_number[]" id="select_<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" />  </td>
							
                            <td width="6%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_type']; ?>
</td>
							<td width="6%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['containerName']; ?>
 <input type="hidden" class="case" name="select_container_number[]" id="select_container_number<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" value="<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
" /></td>
							<td width="7%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['contract_start_date']; ?>
</td>
							<td width="7%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['contract_next_due_date']; ?>
</td>
							<td width="16%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['Related_priod_Result']; ?>
</td>
							<td width="5%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['overdue']; ?>
</td>
							<td width="6%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['licence_amount_vat']; ?>
</td>
                            <td width="5%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['deposit_amount']; ?>
</td>
							<td width="8%">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['miscellaneous']; ?>
</td>
							<td width="6%"><?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['penality']; ?>
</td>
							<td width="8%"><p style="margin-left:10px;">&pound; <?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['totalAmountDueColumn']; ?>
</p></td>
							<td width="12%">							<div data-toggle="buttons" class="btn-group btn-group-new">
									<input class="btn btn-primary <?php if ($this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['status'] == 'Locked'): ?> active <?php endif; ?>"  type="button" onclick="updateContainerStatus('<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
', '<?php echo $this->_tpl_vars['current_customer_id']; ?>
', 'Locked')" id="Locked" name="container_status_locked" value="Locked"> 
									<input class="btn btn-primary <?php if ($this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['status'] == 'Occupied'): ?> active <?php endif; ?>" type="button" onclick="updateContainerStatus('<?php echo $this->_tpl_vars['PaymentHistoryList'][$this->_sections['payment']['index']]['container_number']; ?>
', '<?php echo $this->_tpl_vars['current_customer_id']; ?>
', 'Occupied')"  id="Occupied" name="container_status_occupied" value="Occupied"> 
							</div>
							
							</td>
							<!--<td width="2%">Invoice</td>-->
                          </tr>
                        <?php endfor; else: ?>
                          <tr>
                            <td colspan="7" align="center">No Assigned Container(s) found</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
						
						
					</table>
				</div>
				</div>
			</form>
			
			<form method="post" name="exportCSVpayhistoryForm" id="exportCSVpayhistoryForm" >
			     <input type="hidden" name="exporstCSVpayhis" id="exporstCSVpayhis" value="" />
			</form>
			<div class="box box-primary" id="scrollable_content_second" >
					
					<div class="row" >
							<div class="col-md-12 ">
								<div class="col-md-6 ">
									<h2 class="box-title"> Previous Payment History</h2>
								</div>
								
								<a  href="javascript:void(0);" onclick="exportCSVPaymenthistorylist();" title="Download all" class="col-xs-12 col-sm-3 btn bg-primary btn-primary margin">
				                   Export as CSV
				               </a>
							    <!--<div class="col-sm-2 dropdown" >
									<button class="btn btn-primary margin dropdown-toggle" type="button" data-toggle="dropdown">View</button>
										<ul class="dropdown-menu">
											<li><a href="javascript:void(0);">License Agreement</a></li>
											<li><a href="javascript:void(0);">Customer Invoice</a></li>
											<li><a href="javascript:void(0);">Payment Receipt</a></li>
										</ul>
									</div>-->
							  
							   	<select name='action_payment_history' id='action_payment_history' class='col-xs-12 col-sm-2 btn btn-primary dropdown-toggle select_view' style="margin-top:10px" onchange='getactionPaymentHistory('this.value');' >
														<option value='0'>View</option>
														<option value='license_agreement'>License Agreement</option>
														<option value='license_invoice'>Customer Invoice</option>
														<option value='license_receipt'>Payment Receipt</option>									
													</select>
							</div>
				
					</div>
						
		<form >
			
				<div class="box-body table-responsive" id="my_previous_payment_content">
					<table id="openTrigger" class="table table-striped table-bordered scroll">
					<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->_tpl_vars['current_customer_id']; ?>
" />
						<thead >
							<tr>
								<th width="5%">Container Type</th>
								<th width="5%" style="position:relative; left:5px;">Container Number</th>
								<th width="5%" style="text-align:center">Due Date</th>
								<th width="10%" style="position:relative; left:3px;">Related Period</th>
								<th width="6%" style="position:relative; left:-2px;text-align:right">Date Paid</th>								
								<th width="2%" style="position:relative; left:8px;text-align:right">License Fee</th>
								<th width="5%" style="position:relative; left:10px;">Deposit Fee</th>																
								<th width="5%" style="position:relative; left:10px;">Miscellaneous Fee</th>								
								<th width="5%" style="position:relative; left:2px;">Penality Fee</th>
								<th width="6%">Payment Type</th>																								
								<th width="5%">Number of months paid </th>
								<th width="5%">Total Amount Due</th>	
								<!--<th width="5%">Action</th>	-->
							</tr>
						</thead>
						
						<!--<tbody>
                        <?php if (isset($this->_sections['payment'])) unset($this->_sections['payment']);
$this->_sections['payment']['name'] = 'payment';
$this->_sections['payment']['loop'] = is_array($_loop=$this->_tpl_vars['PreviousPaymentHistory']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

                          <tr>
                            <td width="5%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['container_type']; ?>
</td>
							<td width="5%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['containerName']; ?>
</td>
							<td width="7%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['due_date']; ?>
</td>
							<td width="7%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['related_period']; ?>
</td>
							<td width="20%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['date_paid']; ?>
</td>
							<td width="5%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['license']; ?>
</td>
							<td width="5%">&pound; <?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['deposit']; ?>
</td>
                            <td width="5%">&pound; <?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['miscellaneous']; ?>
</td>
							<td width="7%">&pound; <?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['penality']; ?>
</td>
							<td width="7%"><?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['payment_type']; ?>
</td>
							<td width="7%">&pound; <?php echo $this->_tpl_vars['PreviousPaymentHistory'][$this->_sections['payment']['index']]['total_amount_due']; ?>
</td>
							<td width="10%">Action</td>
                          </tr>
                        <?php endfor; else: ?>
                          <tr>
                            <td colspan="7" align="center">No Payment History Found</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>-->
						
						
					</table>
				</div>
				
			</form>	
				</div>
				
				
				
				
			
			
		</div>
	</div>
</section>
</div>


<div id="DeAssignPopup" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h1 class="modal-title">De Assign Container</h1>
              </div>
              <div class="modal-body">
               <h3>No container has been selected. Please select at least One container before attempting to De Assign a Container.</h3>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-outline">Save changes</button>-->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
</div>

<div id="procesPopup" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h1 class="modal-title">Process a Payment</h1>
              </div>
              <div class="modal-body">
               <h3>No container has been selected. Please select at least One container before attempting to process a payment.</h3>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-outline">Save changes</button>-->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
    <script type="text/javascript">
		//$( tables.table().body()).addClass( \'highlight\' );
		
		//updateContainerStatus start
		function updateContainerStatus(containerId, customerId, status){
			var status_check = confirm(\'Are you sure want to change container status to \' + status + \' ?\');
			var siteadmin_globalpath = document.getElementById(\'siteadmin_globalpath\').value;
    		if(status_check) {
				$.ajax({
				type: "POST",
				url: "ajaxformdata.php?action=changeContainerStatus&container_id="+containerId+"&customer_id="+customerId+"&status="+status,
					success:function(data){
						if(data == \'success\'){
							window.location = "payment_history.php?customer_id="+customerId+"&msgcode=15";
						}
					}
				});
			}
		}
		//updateContainerStatus End		
		function goDeAssignContainer(){
			
			valid = true;
			if($(\'input[type=checkbox]:checked\').length == 0)
			{
				$(\'#DeAssignPopup\').modal(\'show\');				
				valid = false;
			}
			if(valid == true){
				var val = [];
				var final = \'\';
				$(\':checkbox:checked\').each(function(i){
				  	val[i] = $(this).val();
					if(val[i]){
					 final += val[i] + \',\';
					} 
				});
				if(final){
					document.getElementById(\'checked_container_number_val\').value= final;
					
					document.getElementById("paymentprocessform").action = "deassign_container.php";
					document.getElementById(\'paymentprocessform\').submit();
					return valid;
				}else{
					alert(\'Container number is empty\');	
				}
			}			
		
		}		
	
		function goProcessPayment(){
			valid = true;
			if($(\'input[type=checkbox]:checked\').length == 0)
			{
				$(\'#procesPopup\').modal(\'show\');				
				valid = false;
			}
			if(valid == true){
				var val = [];
				var final = \'\';
				$(\':checkbox:checked\').each(function(i){
				  	val[i] = $(this).val();
					if(val[i]){
					 final += val[i] + \',\';
					} 
				});
				if(final){
					document.getElementById(\'checked_container_number_val\').value= final;
					document.getElementById("paymentprocessform").action = "payment_process.php";					
					document.getElementById(\'paymentprocessform\').submit();
					return valid;
				}else{
					alert(\'Container number is empty\');	
				}
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
			}else if(action_type == \'communication_history\'){
				document.getElementById("customer_tab_form").action = "communication_list.php?customer_id=" + customer_id + "";	
			}
			document.getElementById(\'customer_tab_form\').submit();
		} 
	
    </script>
	
	<script type="text/javascript" language="javascript" >
	
	// Change the selector if needed
var $table = $(\'table.scroll\'),
    $bodyCells = $table.find(\'tbody tr:first\').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
$(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();
    
    // Set the width of thead columns
    $table.find(\'thead tr\').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });    
}).resize(); // Trigger resize handler
	
	var dataTable
    $(document).ready(function() {
	
	//$("#openTrigger > tbody").addClass(\'safasdf\');
	
	//$(\'#openTrigger_filter label\').text(\'smtext\');
	
/*		$("#openTrigger_filter label").text(function () {
			return $(this).text().replace("Search:", "testtext"); 
		});
*/	
		var current_customer_id = $("#current_customer_id").val();
         dataTable = $(\'#openTrigger\').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
               // url :"ajaxformdata.php?action=previoues_payment_history&customer_id="+current_customer_id, // json datasource
			    url :"ajaxformdata.php?action=previoues_payment_history&customer_id="+current_customer_id, // json datasource
			    //url :"ajaxformdata.php?action=expenseslist", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html(\'<tr><th colspan="3">No data found in the server</th></tr>\');
                    $("#openTrigger_processing").css("display","none");
 
                },
				
	
            }
        } );
    } );
	
	
	function exportCSVPaymenthistorylist() {
		  $("#exporstCSVpayhis").val(\'yes\');
		  $("#exportCSVpayhistoryForm").submit();
	}
	
/*	
	$(\'#openTrigger\').css(\'border\', \'1px solid blue\');
	$(\'.odd\').css(\'border\', \'1px solid yellow\');	
	$(\'#openTrigger [role=row]\').css(\'border\', \'1px solid green\');
	$(\'#openTrigger tr\').css(\'border\', \'1px solid yellow\');	
	$(\'#openTrigger td\').css(\'border\', \'1px solid green\');
	$(\'#openTrigger .row td\').css(\'border\', \'1px solid red\');*/

	
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
		/*display:none;*/
	}
	#openTrigger_info{
		display:none;
	}
	#openTrigger_paginate{
		display:none;
	}
	div#content_secion { /*overflow: scroll;*/ height: 100%; }
	div#scrollable_content {
		height: 350px;
		overflow-y:auto;
		padding: 10px;
	}
	div#scrollable_content_second {
		/*height: 350px;
		overflow-y:auto;
		padding: 10px;*/
	}	
	.btn-group-new .btn {
		-moz-user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
		cursor: pointer;
		display: inline-block;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857;
		margin-bottom: 0;
		padding: 2px 2px;
		text-align: center;
		vertical-align: middle;
		white-space: nowrap;
	}
	.main_table {
		table-layout: fixed;
	}
	.inner_table {
		/*height: 100px;*/
		overflow-y: auto;
	}

	table.scroll tbody,
	table.scroll thead { display: block; }
	
	table.scroll tbody {
		height: 200px;
		overflow-y: auto;
		overflow-x: hidden;
	}
	.odd td {
			border:1px solid red;
		min-width: 96px;
		text-align:center;
	}
	.even td {
		border:1px solid red;
		min-width: 96px;
		text-align:center;		
	}
	#openTrigger th {
		 min-width: 94px;
		text-align:center;				 
	}
	#my_previous_payment_content .row .col-sm-6:first-child {
		/*display: none;
		border:1px solid red !important;*/
		display:none;
	}
	@media screen and (max-width: 768px) {
	 .select_view
	  {
		  float:left;
		  left:10px;
		  position:relative;
	  }
	 }

	</style>
'; ?>
	