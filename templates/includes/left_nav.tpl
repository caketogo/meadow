
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
	<!-- Sidebar user panel -->
	<!-- sidebar menu: : style can be found in sidebar.less -->	
	<ul class="sidebar-menu">
		<li><a href="{$siteadmin_globalpath}dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard </span></a></li>
	{if $adminuser_utype eq 'super_admin'}
		<li class="{if $adminuser0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Admin Users Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
			
				<li class="{$adminuser1}{if $adminuser1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}adminuser_list.php"><i class="fa fa-circle-o"></i> Admin Users List</a></li>
				
				<!--<li class="{if $adminuser2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}add_adminuser.php"><i class="fa fa-circle-o"></i> Create Admin User</a></li>-->
			</ul>
		</li>
		
		<li class="{if $container0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Container Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{if $container1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}container_list.php"><i class="fa fa-circle-o"></i> Container List</a></li>
				<!--<li class="{if $container2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}create_container.php"><i class="fa fa-circle-o"></i> Create Manual Container</a></li>
				<li class="{if $container3 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}import_container.php"><i class="fa fa-circle-o"></i> Import CSV Container</a></li>		-->		
				<li class="{if $container4 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}container_prices_list.php"><i class="fa fa-circle-o"></i> Container Prices List</a></li>
				<li class="{if $container6 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}penalityfee.php"><i class="fa fa-circle-o"></i> Penality Fees</a></li>	
				<li class="{if $container7 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}license_period.php"><i class="fa fa-circle-o"></i>License Period</a></li>												

			</ul>
		</li>
		
		<li class="{if $customer0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Customer Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{if $customer1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}customer_list.php"><i class="fa fa-circle-o"></i> Customer List</a></li>
				<li class="{if $customer1 eq '8'} active {/if}"><a href="{$siteadmin_globalpath}view_payment_receipts.php"><i class="fa fa-circle-o"></i>View Payment Receipts</a></li>
				<!--<li class="{if $customer1 eq '8'} active {/if}"><a href="{$siteadmin_globalpath}notes_list.php"><i class="fa fa-circle-o"></i> Customer Notes List</a></li>
				<li class="{if $customer2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
		
		
		<li class="{if $customer1 eq '10'} active {/if}">
			<a href="{$siteadmin_globalpath}removals_management.php"><i class="fa fa-cog"></i> <span>Removals Management</span><i class="fa fa-angle-left pull-right"></i></a>
			
			<!--<ul class="treeview-menu">
				<li class="{if $customer1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}customer_list.php"><i class="fa fa-circle-o"></i> Customer List</a></li>
				<li class="{if $customer1 eq '8'} active {/if}"><a href="{$siteadmin_globalpath}view_payment_receipts.php"><i class="fa fa-circle-o"></i>View Payment Receipts</a></li>
			</ul>-->
		</li>
		

		
		
		<li class="{if $expenses0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Expenses Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{if $expenses0 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}expenses_list.php"><i class="fa fa-circle-o"></i> Expenses view</a></li>
				<!--<li class="{if $expenses1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}notes_list.php"><i class="fa fa-circle-o"></i> Customer Notes List</a></li>
				<li class="{if $customer2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
		
		<li class="{if $smslist0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>SMS Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{$adminuser1}{if $smslist5 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}smslist.php"><i class="fa fa-circle-o"></i>View SMS Schedule</a></li>
				<li class="{$adminuser1}{if $smslist3 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}send_smslist.php"><i class="fa fa-circle-o"></i>Create SMS Schedule</a></li>
			</ul>
		</li>
		
		
		<li class="{if $terms0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Template Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{if $terms1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}change_terms_condition.php"><i class="fa fa-circle-o"></i> Terms and Conditions</a></li>				
				
				<!--<li class="{if $customer1 eq '8'} active {/if}"><a href="{$siteadmin_globalpath}notes_list.php"><i class="fa fa-circle-o"></i> Customer Notes List</a></li>
				<li class="{if $customer2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
		
		
		
		
	{/if}   	
	{if $adminuser_utype eq 'admin' && $adminuser_usermgnt eq 'yes'}
			<li class="{if $adminuser0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Admin Users Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
			
				<li class="{$adminuser1}{if $adminuser1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}adminuser_list.php"><i class="fa fa-circle-o"></i> Admin Users List</a></li>
				
				<!--<li class="{if $adminuser2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}add_adminuser.php"><i class="fa fa-circle-o"></i> Create Admin User</a></li>-->		
			</ul>
		</li>
	{/if}   		
	{if $adminuser_utype eq 'admin' && $adminuser_containermgnt eq 'yes'}
			<li class="{if $container0 eq '1'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Container Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{if $container1 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}container_list.php"><i class="fa fa-circle-o"></i> Container List</a></li>
				<!--<li class="{if $container2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}create_container.php"><i class="fa fa-circle-o"></i> Create Manual Container</a></li>
				<li class="{if $container3 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}import_container.php"><i class="fa fa-circle-o"></i> Import CSV Container</a></li>		-->		
				<li class="{if $container4 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}container_prices_list.php"><i class="fa fa-circle-o"></i> Container Prices List</a></li>
				<!--<li class="{if $container5 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}container_prices.php"><i class="fa fa-circle-o"></i> Create Container Prices</a></li>	-->											
			</ul>
		</li>
	{/if}   	
	{if $adminuser_utype eq 'admin' && $adminuser_customermgnt eq 'yes'}	
	 <li class="{if $settings1 eq '2'} active {/if} treeview">
			<a href="#"><i class="fa fa-cog"></i> <span>Customer Management</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="{if $settings2 eq '1'} active {/if}"><a href="{$siteadmin_globalpath}customer_list.php"><i class="fa fa-circle-o"></i> Customer List</a></li>
				<!--<li class="{if $settings2 eq '2'} active {/if}"><a href="{$siteadmin_globalpath}create_customer.php"><i class="fa fa-circle-o"></i> Create Customer</a></li>-->
			</ul>
		</li>
    {/if}        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->
