<?php /* Smarty version 2.6.2, created on 2016-10-07 14:11:17
         compiled from smslist.tpl */ ?>
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
    </style>

<script type="text/javascript">

	
	function getResults(searchType)  {
		document.forms[document.forms.length-1].submit();
	}

	function ShiftPage(Page,Display)  {
	//loading(\'Processing\');
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
'; ?>
	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
<section class="content-header">
		<h1>View SMS Schedule</h1>
	</section>

<section class="content">

	<div class="row" >
	
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
				<?php elseif ($this->_tpl_vars['msgcode'] == '15'): ?>
						<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
						<h4><i class="icon fa fa-check"></i> Alert!</h4>
						<?php echo $this->_tpl_vars['update_msg']; ?>

					  </div>	  					  
				<?php endif; ?>		
		<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-body table-responsive">
				
				 <form name="smslist_form" id="smslist_form" method="post" action="send_smslist.php">
				
						<input type="hidden" name="Page" id="Page" />
<!--						<input type="hidden" name="Display" id="Display" />
						<input type="hidden" name="sort" id="sort" value="" />
						<input type="hidden" name="order" id="order" />-->
						<input type="hidden" name="hdAction" id="hdAction" value="1"/>
						<input type="hidden" name="customer_type" id="customer_type_val" value="" />
					  
						<div class="col-md-2" style="display:none">
						<label for="exampleInputEmail1">Select Recipients: </label>
						<select name="get_payments_date_range" id="get_payments_date_range" onchange="getResults(this.value)" class="form-control container_type_customer" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
								<option value="0" <?php if ($this->_tpl_vars['daterange'] == '0'): ?> selected="selected"<?php endif; ?>>Select Recipients</option>
								<option value="overdue_customers"  <?php if ($this->_tpl_vars['daterange'] == 'overdue_customers'): ?> selected="selected"<?php endif; ?>>Overdue Customers</option>
								<option value="all_customers" <?php if ($this->_tpl_vars['daterange'] == 'all_customers'): ?> selected="selected"<?php endif; ?>>All Customers</option>
								<option value="specific_customers" <?php if ($this->_tpl_vars['daterange'] == 'specific_customers'): ?> selected="selected"<?php endif; ?>>Specific Customers</option>									
							</select>
						</div>
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr style="display:none">
								<th width="5%">
									<div class="checkbox">
										<label class="btn btn-block btn-primary">&nbsp; <input type="checkbox" name="selectall" id="selectall" />&nbsp; Select All</label>	
									</div>
								</th>
								<th width="5%">
									<div class="checkbox">
										<label class="btn btn-block btn-primary">&nbsp; <input type="checkbox" name="deleteall" id="deleteall" />&nbsp; Delete</label>				
									</div>
								</th>
							</tr>
							<tr>
								<th width="2%">&nbsp;</th>
								<th width="10%" style="text-align:left">Recipients</th>
								<!--<th width="25%">SMS Message</th>
								<th width="10%">Repetition</th>
								<th width="10%">Time to Send</th>-->								
								<th width="20%" style="text-align:left">Status</th>
								
								<th width="10%">&nbsp;</th>
								<th width="10%">&nbsp;</th>
								<th width="10%">&nbsp;</th>
								<th width="10%">&nbsp;</th>
								<th width="10%">&nbsp;</th>
								
							</tr>
						</thead>
						<tbody class="inner_table">
                                                  <tr>
							<!--<th width="2%"><input type="checkbox" value="25" name="checkboxlist" id="chk" class="case"></th>-->
							<th width="2%"><a href="javascript:get_sms_customer_list('over_due_customer')" title="Overdue Customers">View</a></th>
                            <td width="10%">Overdue Customers</td>
							<!--<td width="25%">Dear Customer testing 1</td>
							<td width="10%">Daily</td>
							<td width="10%">9.00 am</td>-->
							<td width="20%"><div data-toggle="buttons" class="btn-group btn-group-new">
							
							
							<input class="btn btn-primary <?php if ($this->_tpl_vars['getSMSscheduleStatus_val'][0]['status'] == 'Active'): ?> active <?php endif; ?>"  type="button" onclick="updateSMSscheduleStatus('over_due_customer', 'Active')" id="Active" name="container_status_locked" value="Active"> 
									<input class="btn btn-primary <?php if ($this->_tpl_vars['getSMSscheduleStatus_val'][0]['status'] == 'DeActive'): ?> active <?php endif; ?>" type="button" onclick="updateSMSscheduleStatus('over_due_customer','DeActive')"  id="Deactive" name="container_status_Deactive" value="Deactive"> 
							</div></td>
							
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
                          </tr>
						  
						  
						  <tr>
							<!--<th width="2%"><input type="checkbox" value="25" name="checkboxlist" id="chk" class="case"></th>-->
							<th width="2%"><a href="javascript:get_sms_customer_list('all_customer')" title="Overdue Customers">View</a></th>
                            <td width="10%">All Customers</td>
							<!--<td width="25%">Dear Customer testing 1</td>
							<td width="10%">Daily</td>
							<td width="10%">9.00 am</td>-->
							<td width="20%"><div data-toggle="buttons" class="btn-group btn-group-new">
							<input class="btn btn-primary <?php if ($this->_tpl_vars['getSMSscheduleStatus_val'][1]['status'] == 'Active'): ?> active <?php endif; ?>"  type="button" onclick="updateSMSscheduleStatus('all_customer', 'Active')" id="Active" name="container_status_locked" value="Active"> 
									<input class="btn btn-primary <?php if ($this->_tpl_vars['getSMSscheduleStatus_val'][1]['status'] == 'DeActive'): ?> active <?php endif; ?>" type="button" onclick="updateSMSscheduleStatus('all_customer','DeActive')"  id="Deactive" name="container_status_Deactive" value="Deactive"> 
							</div></td>
							
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
                          </tr>
						  
						  <tr>
							<th width="2%"><a href="javascript:get_sms_customer_list('selected_customer')" title="Overdue Customers">View</a></th>
                            <td width="10%">Specific Customers</td>
							<td width="20%"><div data-toggle="buttons" class="btn-group btn-group-new">
							<input class="btn btn-primary <?php if ($this->_tpl_vars['getSMSscheduleStatus_val'][2]['status'] == 'Active'): ?> active <?php endif; ?>"  type="button" onclick="updateSMSscheduleStatus('selected_customer', 'Active')" id="Active" name="container_status_locked" value="Active"> 
									<input class="btn btn-primary <?php if ($this->_tpl_vars['getSMSscheduleStatus_val'][2]['status'] == 'DeActive'): ?> active <?php endif; ?>" type="button" onclick="updateSMSscheduleStatus('selected_customer','DeActive')"  id="Deactive" name="container_status_Deactive" value="Deactive"> 
							</div></td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
							<td width="10%">&nbsp;</td>
                          </tr>
						  
						   
						  
						   
                                                  <tr style="display:none">
                            <td colspan="7" align="center">No SMS List Found</td>
                          </tr>
                                              </tbody>
					</table>
					
				
				</div>
				</div>
			</form>		
		</div>
	</div>
			
	
</section>
</div>
<!-- /.content-wrapper -->


<div id="over_due_popup" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h1 class="modal-title">Overdue Customers </h1>
              </div>
              <div class="modal-body">
			   
					   <div class="row" style="display:none">
							<div class="form-group col-lg-12">
								<ul id="all_customer">
										<?php if (isset($this->_sections['over_due_customer'])) unset($this->_sections['over_due_customer']);
$this->_sections['over_due_customer']['name'] = 'over_due_customer';
$this->_sections['over_due_customer']['loop'] = is_array($_loop=$this->_tpl_vars['ViewSMSCustomerOverDueTypeList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['over_due_customer']['show'] = true;
$this->_sections['over_due_customer']['max'] = $this->_sections['over_due_customer']['loop'];
$this->_sections['over_due_customer']['step'] = 1;
$this->_sections['over_due_customer']['start'] = $this->_sections['over_due_customer']['step'] > 0 ? 0 : $this->_sections['over_due_customer']['loop']-1;
if ($this->_sections['over_due_customer']['show']) {
    $this->_sections['over_due_customer']['total'] = $this->_sections['over_due_customer']['loop'];
    if ($this->_sections['over_due_customer']['total'] == 0)
        $this->_sections['over_due_customer']['show'] = false;
} else
    $this->_sections['over_due_customer']['total'] = 0;
if ($this->_sections['over_due_customer']['show']):

            for ($this->_sections['over_due_customer']['index'] = $this->_sections['over_due_customer']['start'], $this->_sections['over_due_customer']['iteration'] = 1;
                 $this->_sections['over_due_customer']['iteration'] <= $this->_sections['over_due_customer']['total'];
                 $this->_sections['over_due_customer']['index'] += $this->_sections['over_due_customer']['step'], $this->_sections['over_due_customer']['iteration']++):
$this->_sections['over_due_customer']['rownum'] = $this->_sections['over_due_customer']['iteration'];
$this->_sections['over_due_customer']['index_prev'] = $this->_sections['over_due_customer']['index'] - $this->_sections['over_due_customer']['step'];
$this->_sections['over_due_customer']['index_next'] = $this->_sections['over_due_customer']['index'] + $this->_sections['over_due_customer']['step'];
$this->_sections['over_due_customer']['first']      = ($this->_sections['over_due_customer']['iteration'] == 1);
$this->_sections['over_due_customer']['last']       = ($this->_sections['over_due_customer']['iteration'] == $this->_sections['over_due_customer']['total']);
?>
											<li><?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][$this->_sections['over_due_customer']['index']]['container_customer_first_name']; ?>
</li>
										<?php endfor; endif; ?>									
								  </ul>
							</div>
						</div>
						
					<form class="form-horizontal" role="form">
                  
                   <div class="form-group">
                    <label class="col-sm-3 control-label"
                          for="inputPassword3" >Customer List
						  						  </label>
                    <div class="col-sm-9">
							<select name="payment_method" id="payment_method" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
									<option value="0">View Customer List</option>
									<?php if (isset($this->_sections['over_due_customer'])) unset($this->_sections['over_due_customer']);
$this->_sections['over_due_customer']['name'] = 'over_due_customer';
$this->_sections['over_due_customer']['loop'] = is_array($_loop=$this->_tpl_vars['ViewSMSCustomerOverDueTypeList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['over_due_customer']['show'] = true;
$this->_sections['over_due_customer']['max'] = $this->_sections['over_due_customer']['loop'];
$this->_sections['over_due_customer']['step'] = 1;
$this->_sections['over_due_customer']['start'] = $this->_sections['over_due_customer']['step'] > 0 ? 0 : $this->_sections['over_due_customer']['loop']-1;
if ($this->_sections['over_due_customer']['show']) {
    $this->_sections['over_due_customer']['total'] = $this->_sections['over_due_customer']['loop'];
    if ($this->_sections['over_due_customer']['total'] == 0)
        $this->_sections['over_due_customer']['show'] = false;
} else
    $this->_sections['over_due_customer']['total'] = 0;
if ($this->_sections['over_due_customer']['show']):

            for ($this->_sections['over_due_customer']['index'] = $this->_sections['over_due_customer']['start'], $this->_sections['over_due_customer']['iteration'] = 1;
                 $this->_sections['over_due_customer']['iteration'] <= $this->_sections['over_due_customer']['total'];
                 $this->_sections['over_due_customer']['index'] += $this->_sections['over_due_customer']['step'], $this->_sections['over_due_customer']['iteration']++):
$this->_sections['over_due_customer']['rownum'] = $this->_sections['over_due_customer']['iteration'];
$this->_sections['over_due_customer']['index_prev'] = $this->_sections['over_due_customer']['index'] - $this->_sections['over_due_customer']['step'];
$this->_sections['over_due_customer']['index_next'] = $this->_sections['over_due_customer']['index'] + $this->_sections['over_due_customer']['step'];
$this->_sections['over_due_customer']['first']      = ($this->_sections['over_due_customer']['iteration'] == 1);
$this->_sections['over_due_customer']['last']       = ($this->_sections['over_due_customer']['iteration'] == $this->_sections['over_due_customer']['total']);
?>
										<option value="<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][$this->_sections['all_customer']['index']]['container_customer_first_name']; ?>
">
										<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][$this->_sections['over_due_customer']['index']]['first_name']; ?>
</option>	
									<?php endfor; endif; ?>		
									
							</select>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-sm-3 control-label"
                          for="inputPassword3" >SMS Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" disabled="disabled" rows="8" id="customer_notes" name="customer_notes">
						<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][0]['sms_content']; ?>
																													
						</textarea>
                    </div>
                  </div>
                  
				  <div class="form-group">
                    <label  class="col-sm-3 control-label"
                              for="inputEmail3">Repetition</label>
                    <div class="col-sm-9">
                      		<input class="form-control" disabled="disabled" value="<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][0]['repetition']; ?>
"/>
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label  class="col-sm-3 control-label"
                              for="inputEmail3">Time to Send</label>
                    <div class="col-sm-9">
                      		<input class="form-control" disabled="disabled" value="<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][0]['time_to_send']; ?>
"/>							
                    </div>
                  </div>
                  
                </form>		
			   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-outline">Save changes</button>-->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
</div>


<div id="all_customer_popup" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h1 class="modal-title">All Customers</h1>
              </div>
              <div class="modal-body">
			   		<div class="row" style="display:none">
						<div class="form-group col-lg-12">
								<ul id="all_customer">
										<?php if (isset($this->_sections['all_customer'])) unset($this->_sections['all_customer']);
$this->_sections['all_customer']['name'] = 'all_customer';
$this->_sections['all_customer']['loop'] = is_array($_loop=$this->_tpl_vars['ViewSMSCustomerOverDueTypeList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['all_customer']['show'] = true;
$this->_sections['all_customer']['max'] = $this->_sections['all_customer']['loop'];
$this->_sections['all_customer']['step'] = 1;
$this->_sections['all_customer']['start'] = $this->_sections['all_customer']['step'] > 0 ? 0 : $this->_sections['all_customer']['loop']-1;
if ($this->_sections['all_customer']['show']) {
    $this->_sections['all_customer']['total'] = $this->_sections['all_customer']['loop'];
    if ($this->_sections['all_customer']['total'] == 0)
        $this->_sections['all_customer']['show'] = false;
} else
    $this->_sections['all_customer']['total'] = 0;
if ($this->_sections['all_customer']['show']):

            for ($this->_sections['all_customer']['index'] = $this->_sections['all_customer']['start'], $this->_sections['all_customer']['iteration'] = 1;
                 $this->_sections['all_customer']['iteration'] <= $this->_sections['all_customer']['total'];
                 $this->_sections['all_customer']['index'] += $this->_sections['all_customer']['step'], $this->_sections['all_customer']['iteration']++):
$this->_sections['all_customer']['rownum'] = $this->_sections['all_customer']['iteration'];
$this->_sections['all_customer']['index_prev'] = $this->_sections['all_customer']['index'] - $this->_sections['all_customer']['step'];
$this->_sections['all_customer']['index_next'] = $this->_sections['all_customer']['index'] + $this->_sections['all_customer']['step'];
$this->_sections['all_customer']['first']      = ($this->_sections['all_customer']['iteration'] == 1);
$this->_sections['all_customer']['last']       = ($this->_sections['all_customer']['iteration'] == $this->_sections['all_customer']['total']);
?>
											<li><?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][$this->_sections['all_customer']['index']]['container_customer_first_name']; ?>
</li>
										<?php endfor; endif; ?>									
								  </ul>
							</div>
					</div>							
					<form class="form-horizontal" role="form">
                  
                   <div class="form-group">
                    <label class="col-sm-3 control-label"
                          for="inputPassword3" >Customer List
						  						  </label>
                    <div class="col-sm-9">
							<select name="payment_method" id="payment_method" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
									<option value="0">View Customer List</option>
									<?php if (isset($this->_sections['all_customer'])) unset($this->_sections['all_customer']);
$this->_sections['all_customer']['name'] = 'all_customer';
$this->_sections['all_customer']['loop'] = is_array($_loop=$this->_tpl_vars['getSMSCustomerAllTypeList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['all_customer']['show'] = true;
$this->_sections['all_customer']['max'] = $this->_sections['all_customer']['loop'];
$this->_sections['all_customer']['step'] = 1;
$this->_sections['all_customer']['start'] = $this->_sections['all_customer']['step'] > 0 ? 0 : $this->_sections['all_customer']['loop']-1;
if ($this->_sections['all_customer']['show']) {
    $this->_sections['all_customer']['total'] = $this->_sections['all_customer']['loop'];
    if ($this->_sections['all_customer']['total'] == 0)
        $this->_sections['all_customer']['show'] = false;
} else
    $this->_sections['all_customer']['total'] = 0;
if ($this->_sections['all_customer']['show']):

            for ($this->_sections['all_customer']['index'] = $this->_sections['all_customer']['start'], $this->_sections['all_customer']['iteration'] = 1;
                 $this->_sections['all_customer']['iteration'] <= $this->_sections['all_customer']['total'];
                 $this->_sections['all_customer']['index'] += $this->_sections['all_customer']['step'], $this->_sections['all_customer']['iteration']++):
$this->_sections['all_customer']['rownum'] = $this->_sections['all_customer']['iteration'];
$this->_sections['all_customer']['index_prev'] = $this->_sections['all_customer']['index'] - $this->_sections['all_customer']['step'];
$this->_sections['all_customer']['index_next'] = $this->_sections['all_customer']['index'] + $this->_sections['all_customer']['step'];
$this->_sections['all_customer']['first']      = ($this->_sections['all_customer']['iteration'] == 1);
$this->_sections['all_customer']['last']       = ($this->_sections['all_customer']['iteration'] == $this->_sections['all_customer']['total']);
?>
										<option value="<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][$this->_sections['all_customer']['index']]['container_customer_first_name']; ?>
">
										<?php echo $this->_tpl_vars['getSMSCustomerAllTypeList'][$this->_sections['all_customer']['index']]['container_customer_first_name']; ?>
</option>	
									<?php endfor; endif; ?>		
									
							</select>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-sm-3 control-label"
                          for="inputPassword3" >SMS Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" disabled="disabled" rows="8" id="customer_notes" name="customer_notes">
						<?php echo $this->_tpl_vars['getSMSCustomerAllTypeList'][0]['sms_content']; ?>
																													
						</textarea>
                    </div>
                  </div>
                  
				  <div class="form-group">
                    <label  class="col-sm-3 control-label"
                              for="inputEmail3">Repetition</label>
                    <div class="col-sm-9">
                      		<input class="form-control" disabled="disabled" value="<?php echo $this->_tpl_vars['getSMSCustomerAllTypeList'][0]['repetition']; ?>
"/>
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label  class="col-sm-3 control-label"
                              for="inputEmail3">Time to Send</label>
                    <div class="col-sm-9">
                      		<input class="form-control" disabled="disabled" value="<?php echo $this->_tpl_vars['getSMSCustomerAllTypeList'][0]['time_to_send']; ?>
"/>							
                    </div>
                  </div>
                  
                </form>
			   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
                <!--<button type="button" class="btn btn-outline">Save changes</button>-->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
</div>

<div id="selected_customer_popup" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h1 class="modal-title">Selected Customer </h1>
              </div>
              <div class="modal-body">
				<form class="form-horizontal" role="form">
                  
                   <div class="form-group">
                    <label class="col-sm-3 control-label"
                          for="inputPassword3" >Customer List
						  						  </label>
                    <div class="col-sm-9">
							<select name="payment_method" id="payment_method" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
									<option value="0">View Customer List</option>
									<?php if (isset($this->_sections['all_customer'])) unset($this->_sections['all_customer']);
$this->_sections['all_customer']['name'] = 'all_customer';
$this->_sections['all_customer']['loop'] = is_array($_loop=$this->_tpl_vars['ViewSMSCustomerSelectedTypeList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['all_customer']['show'] = true;
$this->_sections['all_customer']['max'] = $this->_sections['all_customer']['loop'];
$this->_sections['all_customer']['step'] = 1;
$this->_sections['all_customer']['start'] = $this->_sections['all_customer']['step'] > 0 ? 0 : $this->_sections['all_customer']['loop']-1;
if ($this->_sections['all_customer']['show']) {
    $this->_sections['all_customer']['total'] = $this->_sections['all_customer']['loop'];
    if ($this->_sections['all_customer']['total'] == 0)
        $this->_sections['all_customer']['show'] = false;
} else
    $this->_sections['all_customer']['total'] = 0;
if ($this->_sections['all_customer']['show']):

            for ($this->_sections['all_customer']['index'] = $this->_sections['all_customer']['start'], $this->_sections['all_customer']['iteration'] = 1;
                 $this->_sections['all_customer']['iteration'] <= $this->_sections['all_customer']['total'];
                 $this->_sections['all_customer']['index'] += $this->_sections['all_customer']['step'], $this->_sections['all_customer']['iteration']++):
$this->_sections['all_customer']['rownum'] = $this->_sections['all_customer']['iteration'];
$this->_sections['all_customer']['index_prev'] = $this->_sections['all_customer']['index'] - $this->_sections['all_customer']['step'];
$this->_sections['all_customer']['index_next'] = $this->_sections['all_customer']['index'] + $this->_sections['all_customer']['step'];
$this->_sections['all_customer']['first']      = ($this->_sections['all_customer']['iteration'] == 1);
$this->_sections['all_customer']['last']       = ($this->_sections['all_customer']['iteration'] == $this->_sections['all_customer']['total']);
?>
										<option value="<?php echo $this->_tpl_vars['ViewSMSCustomerOverDueTypeList'][$this->_sections['all_customer']['index']]['container_customer_first_name']; ?>
">
										<?php echo $this->_tpl_vars['ViewSMSCustomerSelectedTypeList'][$this->_sections['all_customer']['index']]['container_customer_first_name']; ?>
</option>	
									<?php endfor; endif; ?>		
									
							</select>
                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label class="col-sm-3 control-label"
                          for="inputPassword3" >SMS Message</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" disabled="disabled" rows="8" id="customer_notes" name="customer_notes">
						<?php echo $this->_tpl_vars['ViewSMSCustomerSelectedTypeList'][0]['sms_content']; ?>
																													
						</textarea>
                    </div>
                  </div>
                  
				  <div class="form-group">
                    <label  class="col-sm-3 control-label"
                              for="inputEmail3">Repetition</label>
                    <div class="col-sm-9">
                      		<input class="form-control" disabled="disabled" value="<?php echo $this->_tpl_vars['ViewSMSCustomerSelectedTypeList'][0]['repetition']; ?>
"/>
                    </div>
                  </div>
				  
				  
				  <div class="form-group">
                    <label  class="col-sm-3 control-label"
                              for="inputEmail3">Time to Send</label>
                    <div class="col-sm-9">
                      		<input class="form-control" disabled="disabled" value="<?php echo $this->_tpl_vars['ViewSMSCustomerSelectedTypeList'][0]['time_to_send']; ?>
"/>							
                    </div>
                  </div>
                  
                </form>              
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

<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/res/json2.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/condition-builder.js" type="text/javascript"></script>
<?php echo '
    <script type="text/javascript">
	
		//updateSMSscheduleStatus start
		function updateSMSscheduleStatus(schedule_type, status){
			var status_check = confirm(\'Are you sure want to change schedule status to \' + status + \' ?\');
			//var siteadmin_globalpath = document.getElementById(\'siteadmin_globalpath\').value;
    		if(status_check) {
				$.ajax({
				type: "POST",
				url: "ajaxformdata.php?action=changeSMSscheduleStatus&schedule_type="+schedule_type+"&status="+status,
					success:function(data){
						if(data == \'success\'){
							window.location = "smslist.php?msgcode=15";
						}
					}
				});
			}
		}
		//updateSMSscheduleStatus End		
	
		function get_sms_customer_list(typecustomer){
			//alert(typecustomer);
			$("#customer_type_val").val(typecustomer);
			if(typecustomer == \'over_due_customer\'){
				$(\'#over_due_popup\').modal(\'show\');		
			}
			if(typecustomer == \'all_customer\'){
				$(\'#all_customer_popup\').modal(\'show\');		
			}
			
			if(typecustomer == \'selected_customer\'){
				$(\'#selected_customer_popup\').modal(\'show\');		
			}
				
			
			//document.forms[document.forms.length-1].submit();
		}
    </script>
	<script src="signature/assets/json2.min.js"></script>
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
		padding: 2px 5px;
		margin: 0 5px !important;
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

	</style>	
'; ?>
	