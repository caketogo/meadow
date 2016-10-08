<?php /* Smarty version 2.6.2, created on 2016-10-08 13:59:19
         compiled from dashboard.tpl */ ?>
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
<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
 
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Dashboard <small>Control panel</small></h1>
		<!--<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>-->
	</section>
	
	
	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		
		
		
		<div class="row">
				<div class="col-lg-2 col-md-offset-1 col-xs-6">
				  <!-- small box -->
				  <div class="small-box overdueset">
					<div class="inner">
					  <h3><?php if ($this->_tpl_vars['ResultCountOverDueContainers'] != ''):  echo $this->_tpl_vars['ResultCountOverDueContainers'];  else: ?>0<?php endif; ?> <p>Overdue Containers</p></h3>
					  
					</div>
				  </div>
				</div>
        <!-- ./col -->
		<!-- ./col -->
				<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box availsection">
						<div class="inner">
						  <h3><?php if ($this->_tpl_vars['ResultCountAvailableContainers'] != ''):  echo $this->_tpl_vars['ResultCountAvailableContainers'];  else: ?>0<?php endif; ?> <p>Available Containers</p></h3>
						  
						</div>
					  </div>
					</div>
        <!-- ./col -->

					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box locksection">
						<div class="inner">
						  <h3><?php if ($this->_tpl_vars['ResultCountLockedContainers'] != ''):  echo $this->_tpl_vars['ResultCountLockedContainers'];  else: ?>0<?php endif; ?><p>Locked Containers</p></h3>
						</div>
					  </div>
					</div>
        <!-- ./col -->
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box paysection">
						<div class="inner">
						  <h3><?php if ($this->_tpl_vars['ResultCountPayments'] != ''):  echo $this->_tpl_vars['ResultCountPayments'];  else: ?>0<?php endif; ?>  <p>Payment Receipts</p></h3>
						</div>
					  </div>
					</div>
        <!-- ./col -->
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box smssection">
						<div class="inner">
						  <h3><?php if ($this->_tpl_vars['ResultCountSMSsent'] != ''):  echo $this->_tpl_vars['ResultCountSMSsent'];  else: ?>0<?php endif; ?> <p>SMS Sent</p></h3>
						  
						</div>
					  </div>
					</div>
        <!-- ./col -->
		
		
      </div>
		
		
		
		
		
		
		
		
		
		<div class="row">
			<div class="col-md-12">
				<!-- <h3 class="box-title">Containers List</h3>-->
						<div class="box box-solid">
							<div class="box-body" style="background-color: #ecf0f5;">
								<div class="row" style="min-height:500px;  background-color: #ecf0f5;">
									<ul id="sortable">
										<?php if (isset($this->_sections['container'])) unset($this->_sections['container']);
$this->_sections['container']['name'] = 'container';
$this->_sections['container']['loop'] = is_array($_loop=$this->_tpl_vars['ContainersDetails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['container']['show'] = true;
$this->_sections['container']['max'] = $this->_sections['container']['loop'];
$this->_sections['container']['step'] = 1;
$this->_sections['container']['start'] = $this->_sections['container']['step'] > 0 ? 0 : $this->_sections['container']['loop']-1;
if ($this->_sections['container']['show']) {
    $this->_sections['container']['total'] = $this->_sections['container']['loop'];
    if ($this->_sections['container']['total'] == 0)
        $this->_sections['container']['show'] = false;
} else
    $this->_sections['container']['total'] = 0;
if ($this->_sections['container']['show']):

            for ($this->_sections['container']['index'] = $this->_sections['container']['start'], $this->_sections['container']['iteration'] = 1;
                 $this->_sections['container']['iteration'] <= $this->_sections['container']['total'];
                 $this->_sections['container']['index'] += $this->_sections['container']['step'], $this->_sections['container']['iteration']++):
$this->_sections['container']['rownum'] = $this->_sections['container']['iteration'];
$this->_sections['container']['index_prev'] = $this->_sections['container']['index'] - $this->_sections['container']['step'];
$this->_sections['container']['index_next'] = $this->_sections['container']['index'] + $this->_sections['container']['step'];
$this->_sections['container']['first']      = ($this->_sections['container']['iteration'] == 1);
$this->_sections['container']['last']       = ($this->_sections['container']['iteration'] == $this->_sections['container']['total']);
?>	
											
											<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'Available'): ?>
												
												 <?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '40ft'): ?>
													<li class="ui-state-default external-event bg-green ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
"  style="width: 120px; margin-right:25px;" >
													<!--<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>-->
													<!--<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>-->
													<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id'] != ''): ?>		
														<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
" style="color:#000000;"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>        <?php else: ?>
														<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>

													<?php endif; ?>
													
													</li>
												<?php endif; ?>	
												
											<?php elseif ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'Occupied'): ?>
													<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '40ft'): ?> 
											
														<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_first_name']; ?>
 <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_sur_name']; ?>
 </br> <b>Mobile Number :</b> <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_mobile_number']; ?>
</br>  <b>Next Due Date : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['contract_next_due_date']; ?>
"  class="ui-state-default external-event bg-gray ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
"  style="width: 120px; margin-right:25px;">
														<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id'] != ''): ?>		
															<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
" style="color:#000000;"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>        <?php else: ?>
															<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>

														<?php endif; ?>
														</li>
													  <?php endif; ?> 	
														
											<?php elseif ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'overdue'): ?>
											
											
												 <?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '40ft'): ?>
													<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_first_name']; ?>
 <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_sur_name']; ?>
 </br> <b>Mobile Number :</b> <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_mobile_number']; ?>
</br>  <b>Next Due Date : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['contract_next_due_date']; ?>
" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
"  style="width: 120px; margin-right:25px;">
													<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id'] != ''): ?>	
														<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
" style="color:#fff;"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>        <?php else: ?>
														<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>

													<?php endif; ?>
													</li>
												
												 <?php endif; ?>
											<?php elseif ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'locked' || $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'Locked'): ?>
											
												<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '40ft'): ?> 
												<li  data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_first_name']; ?>
 <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_sur_name']; ?>
 </br> <b>Mobile Number :</b> <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_mobile_number']; ?>
</br>  <b>Next Due Date : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['contract_next_due_date']; ?>
" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
" style="width: 120px; margin-right:25px;" >

												<a class="after_class" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a></li>
												<?php endif; ?>
												
											<?php endif; ?>	
											
										 <?php endfor; endif; ?>
									</ul>		
									
									<ul id="sortable" style="float:left; width:100%;">
										<?php if (isset($this->_sections['container'])) unset($this->_sections['container']);
$this->_sections['container']['name'] = 'container';
$this->_sections['container']['loop'] = is_array($_loop=$this->_tpl_vars['ContainersDetails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['container']['show'] = true;
$this->_sections['container']['max'] = $this->_sections['container']['loop'];
$this->_sections['container']['step'] = 1;
$this->_sections['container']['start'] = $this->_sections['container']['step'] > 0 ? 0 : $this->_sections['container']['loop']-1;
if ($this->_sections['container']['show']) {
    $this->_sections['container']['total'] = $this->_sections['container']['loop'];
    if ($this->_sections['container']['total'] == 0)
        $this->_sections['container']['show'] = false;
} else
    $this->_sections['container']['total'] = 0;
if ($this->_sections['container']['show']):

            for ($this->_sections['container']['index'] = $this->_sections['container']['start'], $this->_sections['container']['iteration'] = 1;
                 $this->_sections['container']['iteration'] <= $this->_sections['container']['total'];
                 $this->_sections['container']['index'] += $this->_sections['container']['step'], $this->_sections['container']['iteration']++):
$this->_sections['container']['rownum'] = $this->_sections['container']['iteration'];
$this->_sections['container']['index_prev'] = $this->_sections['container']['index'] - $this->_sections['container']['step'];
$this->_sections['container']['index_next'] = $this->_sections['container']['index'] + $this->_sections['container']['step'];
$this->_sections['container']['first']      = ($this->_sections['container']['iteration'] == 1);
$this->_sections['container']['last']       = ($this->_sections['container']['iteration'] == $this->_sections['container']['total']);
?>	
												<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'Available'): ?>
												
												
												<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '10ft' || $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '20ft'): ?> 
												
													<li class="ui-state-default external-event bg-green ui-draggable ui-draggable-handle col-md-1 t20_list " id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
"  style=" width: 60px;" >
													
													<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id'] != ''): ?>		
														<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
" style="color:#000000;"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>        <?php else: ?>
														<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>

													<?php endif; ?>
													
													</li>
												<?php endif; ?>	
												
											<?php elseif ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'Occupied'): ?>
											
												<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '10ft' || $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '20ft'): ?> 
													<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_first_name']; ?>
 <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_sur_name']; ?>
 </br> <b>Mobile Number :</b> <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_mobile_number']; ?>
</br>  <b>Next Due Date : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['contract_next_due_date']; ?>
"  class="ui-state-default external-event bg-gray ui-draggable ui-draggable-handle col-md-1 t20_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
"  style="width: 60px;" >
													<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id'] != ''): ?>		
														<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
" style="color:#000000;"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>        <?php else: ?>
														<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>

													<?php endif; ?>
													</li>
												<?php endif; ?>	
													
											<?php elseif ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'overdue'): ?>
											
												<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '10ft' || $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '20ft'): ?> 
													<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_first_name']; ?>
 <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_sur_name']; ?>
 </br> <b>Mobile Number :</b> <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_mobile_number']; ?>
</br>  <b>Next Due Date : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['contract_next_due_date']; ?>
" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 t20_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
"  style="width: 60px;"> 
													<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id'] != ''): ?>	
														<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
" style="color:#fff;"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a>        <?php else: ?>
														<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>

													<?php endif; ?>
													</li>	
												<?php endif; ?>	
											<?php elseif ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'locked' || $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['status'] == 'Locked'): ?>
												
												<?php if ($this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '10ft' || $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_category'] == '20ft'): ?> 
												<li  data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_first_name']; ?>
 <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_sur_name']; ?>
 </br> <b>Mobile Number :</b> <?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['customer_mobile_number']; ?>
</br>  <b>Next Due Date : </b><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['contract_next_due_date']; ?>
" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 t20_list" id="customer_li_<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['id']; ?>
" style="width: 60px;"  >

												<a class="after_class" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
payment_history.php?customer_id=<?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['container_customer_id']; ?>
"><?php echo $this->_tpl_vars['ContainersDetails'][$this->_sections['container']['index']]['name']; ?>
</a></li>
												<?php endif; ?>
											<?php endif; ?>	
										 <?php endfor; endif; ?>
									</ul>			
								
									</div>
								<!-- /.box-body -->
							</div>
						</div>	
					</div>	
					
			 </div> 
		</div>
				
		
		
		
		<div class="row" style="display:none">
						<!-- ./col -->
		<?php if ($this->_tpl_vars['adminuser_utype'] == 'super_admin'): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>40</h3>
						<p>Users Management 
						</p>
					</div>
					<div class="icon"><i class="ion ion-bag"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>30</h3>
						<p>Category Management
						</p>
					</div>
					<div class="icon"><i class="ion ion-stats-bars"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-black">
					<div class="inner">
						<h3>20</h3>
						<p>Container Management
						</p>
					</div>
					<div class="icon"><i class="ion ion-person-add"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>500</h3>
						<p>Customer Management
						</p>
					</div>
					<div class="icon"><i class="ion ion-pie-graph"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php endif; ?>   
			<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_usermgnt'] == 'yes'): ?>
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>40</h3>
						<p>Users Management 
						</p>
					</div>
					<div class="icon"><i class="ion ion-bag"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php endif; ?>   
			<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_categorymgnt'] == 'yes'): ?>
			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>30</h3>
						<p>Category Management
						</p>
					</div>
					<div class="icon"><i class="ion ion-stats-bars"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php endif; ?>   
			<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_containermgnt'] == 'yes'): ?>
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-black">
					<div class="inner">
						<h3>20</h3>
						<p>Container Management
						</p>
					</div>
					<div class="icon"><i class="ion ion-person-add"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<?php endif; ?>   
			<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_customermgnt'] == 'yes'): ?>	
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>500</h3>
						<p>Customer Management
						</p>
					</div>
					<div class="icon"><i class="ion ion-pie-graph"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		<?php endif; ?> 
			 
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
   <?php echo '
		<style>
		   .overdueset{
			  background:#FF0000;
			  color:#FFFFFF;
		   } 
		   .locksection{
			  background:#FF0000;
			  color:#FFFFFF;
		   }
		   .paysection{
			  background:orange;
			  color:#FFFFFF;
		   }
		   .smssection{
			  background:blue;
			  color:#FFFFFF;
		   }
		   .availsection{
			  background:green;
			  color:#FFFFFF;
		   }
		   
			#sortable { list-style-type: none; margin: 0; padding: 0; }	
			#sortable li a{ 
				font-size: 14px;
				text-align: center;
				color:#FFFFFF;
				position:relative;
				bottom:2px;
				font-weight:bold;
			}
			#sortable li{ 
				/*float: left;
				height: 27px;
				font-size: 16px;
				margin: 3px 30px;
				padding: 1px;
				border: 2px solid black;
				text-align: center;
				width: 161px;*/
				border: 2px solid black;
				float: left;
				font-size: 14px;
				height: 23px;
				font-weight:bold;
				margin: 0px;
				padding: 0px;
				text-align: center;
				width: 60px;
			}
			
			.ui-state-default.external-event.bg-red.ui-draggable.ui-draggable-handle.col-md-1.ui-sortable-handle > span::before {
				background: #fff none repeat scroll 0 0;
				content: "";
				display: block;
				height: 3px;
				left: -1px;
				position: absolute;
				top: 45%;
				width: 42%;
			}
			.ui-state-default.external-event.bg-red.ui-draggable.ui-draggable-handle.col-md-1.ui-sortable-handle > span::after {
				background: #fff  none repeat scroll 0 0;
				content: "";
				display: block;
				height: 3px;
				position: absolute;
				top: 45%;
				right:0;
				width: 42%;
			}
			.box-body ul{
				margin:0px;
				padding:0px;
			}
			.box-body ul li{
				margin:0px;
				padding:0px;
				list-style:none;
			}
			.box.box-solid.box-primary {
				width: 30%;
				text-align:left;
			}
			.after_class:after{
				background: white none repeat scroll 0 0;
				content: "";
				height: 2px;
				position: absolute;
				top: 10px;
				right:0px;
				width: 40%;
			}
			.after_class:before{
				background: white none repeat scroll 0 0;
				content: "";
				height: 2px;
				position: absolute;
				top: 10px;
				left:0px;
				width: 40%;
			}
			
			#sortable li:nth-child(2n) {
				margin-right: 25px;
			}
			
			.fourty_list{
				list-style:none !important;
			}
			.t20_list{
				list-style:none !important;
			}
			
		</style>
	'; ?>
	
<!-- /.content-wrapper -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<?php echo '
		<script>
		$(\'[data-toggle="popover"]\').popover({
		  placement: "auto",
		  trigger: "hover"
		})
		$( function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
		} );
		</script>
	'; ?>
