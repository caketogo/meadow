<?php /* Smarty version 2.6.2, created on 2016-10-08 13:59:19
         compiled from includes/left_nav.tpl */ ?>

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
	<!-- Sidebar user panel -->
	<!-- sidebar menu: : style can be found in sidebar.less -->	
	<ul class="sidebar-menu">
		<li><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard </span></a></li>
	<?php if ($this->_tpl_vars['adminuser_utype'] == 'super_admin'): ?>
		<li class="<?php if ($this->_tpl_vars['adminuser0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Admin Users Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
			
				<li class="<?php echo $this->_tpl_vars['adminuser1'];  if ($this->_tpl_vars['adminuser1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
adminuser_list.php"><i class="fa fa-circle-o"></i> Admin Users List</a></li>
				
				<!--<li class="<?php if ($this->_tpl_vars['adminuser2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
add_adminuser.php"><i class="fa fa-circle-o"></i> Create Admin User</a></li>-->
			</ul>
		</li>
		
		<li class="<?php if ($this->_tpl_vars['container0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Container Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['container1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
container_list.php"><i class="fa fa-circle-o"></i> Container List</a></li>
				<!--<li class="<?php if ($this->_tpl_vars['container2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_container.php"><i class="fa fa-circle-o"></i> Create Manual Container</a></li>
				<li class="<?php if ($this->_tpl_vars['container3'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
import_container.php"><i class="fa fa-circle-o"></i> Import CSV Container</a></li>		-->		
				<li class="<?php if ($this->_tpl_vars['container4'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
container_prices_list.php"><i class="fa fa-circle-o"></i> Container Prices List</a></li>
				<li class="<?php if ($this->_tpl_vars['container6'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
penalityfee.php"><i class="fa fa-circle-o"></i> Penality Fees</a></li>	
				<li class="<?php if ($this->_tpl_vars['container7'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
license_period.php"><i class="fa fa-circle-o"></i>License Period</a></li>												

			</ul>
		</li>
		
		<li class="<?php if ($this->_tpl_vars['customer0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Customer Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['customer1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
customer_list.php"><i class="fa fa-circle-o"></i> Customer List</a></li>
				<li class="<?php if ($this->_tpl_vars['customer1'] == '8'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
view_payment_receipts.php"><i class="fa fa-circle-o"></i>View Payment Receipts</a></li>
				<!--<li class="<?php if ($this->_tpl_vars['customer1'] == '8'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
notes_list.php"><i class="fa fa-circle-o"></i> Customer Notes List</a></li>
				<li class="<?php if ($this->_tpl_vars['customer2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
		
		
		<li class="<?php if ($this->_tpl_vars['customer1'] == '10'): ?> active <?php endif; ?>">
			<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
removals_management.php"><i class="fa fa-cog"></i> <span>Removals Management</span><i class="fa fa-angle-left pull-right"></i></a>
			
			<!--<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['customer1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
customer_list.php"><i class="fa fa-circle-o"></i> Customer List</a></li>
				<li class="<?php if ($this->_tpl_vars['customer1'] == '8'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
view_payment_receipts.php"><i class="fa fa-circle-o"></i>View Payment Receipts</a></li>
			</ul>-->
		</li>
		

		
		
		<li class="<?php if ($this->_tpl_vars['expenses0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Expenses Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['expenses0'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
expenses_list.php"><i class="fa fa-circle-o"></i> Expenses view</a></li>
				<!--<li class="<?php if ($this->_tpl_vars['expenses1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
notes_list.php"><i class="fa fa-circle-o"></i> Customer Notes List</a></li>
				<li class="<?php if ($this->_tpl_vars['customer2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
		
		<li class="<?php if ($this->_tpl_vars['smslist0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>SMS Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php echo $this->_tpl_vars['adminuser1'];  if ($this->_tpl_vars['smslist5'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
smslist.php"><i class="fa fa-circle-o"></i>View SMS Schedule</a></li>
				<li class="<?php echo $this->_tpl_vars['adminuser1'];  if ($this->_tpl_vars['smslist3'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
send_smslist.php"><i class="fa fa-circle-o"></i>Create SMS Schedule</a></li>
			</ul>
		</li>
		
		
		<li class="<?php if ($this->_tpl_vars['terms0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Template Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['terms1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
change_terms_condition.php"><i class="fa fa-circle-o"></i> Terms and Conditions</a></li>				
				
				<!--<li class="<?php if ($this->_tpl_vars['customer1'] == '8'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
notes_list.php"><i class="fa fa-circle-o"></i> Customer Notes List</a></li>
				<li class="<?php if ($this->_tpl_vars['customer2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
		
		
		
		
	<?php endif; ?>   	
	<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_usermgnt'] == 'yes'): ?>
			<li class="<?php if ($this->_tpl_vars['adminuser0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Admin Users Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
			
				<li class="<?php echo $this->_tpl_vars['adminuser1'];  if ($this->_tpl_vars['adminuser1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
adminuser_list.php"><i class="fa fa-circle-o"></i> Admin Users List</a></li>
				
				<!--<li class="<?php if ($this->_tpl_vars['adminuser2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
add_adminuser.php"><i class="fa fa-circle-o"></i> Create Admin User</a></li>-->		
			</ul>
		</li>
	<?php endif; ?>   		
	<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_containermgnt'] == 'yes'): ?>
			<li class="<?php if ($this->_tpl_vars['container0'] == '1'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Container Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['container1'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
container_list.php"><i class="fa fa-circle-o"></i> Container List</a></li>
				<!--<li class="<?php if ($this->_tpl_vars['container2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_container.php"><i class="fa fa-circle-o"></i> Create Manual Container</a></li>
				<li class="<?php if ($this->_tpl_vars['container3'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
import_container.php"><i class="fa fa-circle-o"></i> Import CSV Container</a></li>		-->		
				<li class="<?php if ($this->_tpl_vars['container4'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
container_prices_list.php"><i class="fa fa-circle-o"></i> Container Prices List</a></li>
				<!--<li class="<?php if ($this->_tpl_vars['container5'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
container_prices.php"><i class="fa fa-circle-o"></i> Create Container Prices</a></li>	-->											
			</ul>
		</li>
	<?php endif; ?>   	
	<?php if ($this->_tpl_vars['adminuser_utype'] == 'admin' && $this->_tpl_vars['adminuser_customermgnt'] == 'yes'): ?>	
	 <li class="<?php if ($this->_tpl_vars['settings1'] == '2'): ?> active <?php endif; ?> treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Customer Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="<?php if ($this->_tpl_vars['settings2'] == '1'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
customer_list.php"><i class="fa fa-circle-o"></i> Customer List</a></li>
				<!--<li class="<?php if ($this->_tpl_vars['settings2'] == '2'): ?> active <?php endif; ?>"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
    <?php endif; ?>        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->