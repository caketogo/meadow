{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
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
					  <h3>{if $ResultCountOverDueContainers neq ''}{$ResultCountOverDueContainers}{else}0{/if} <p>Overdue Containers</p></h3>
					  
					</div>
				  </div>
				</div>
        <!-- ./col -->
		<!-- ./col -->
				<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box availsection">
						<div class="inner">
						  <h3>{if $ResultCountAvailableContainers neq ''}{$ResultCountAvailableContainers}{else}0{/if} <p>Available Containers</p></h3>
						  
						</div>
					  </div>
					</div>
        <!-- ./col -->

					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box locksection">
						<div class="inner">
						  <h3>{if $ResultCountLockedContainers neq ''}{$ResultCountLockedContainers}{else}0{/if}<p>Locked Containers</p></h3>
						</div>
					  </div>
					</div>
        <!-- ./col -->
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box paysection">
						<div class="inner">
						  <h3>{if $ResultCountPayments neq ''}{$ResultCountPayments}{else}0{/if}  <p>Payment Receipts</p></h3>
						</div>
					  </div>
					</div>
        <!-- ./col -->
					<div class="col-lg-2 col-xs-6">
					  <!-- small box -->
					  <div class="small-box smssection">
						<div class="inner">
						  <h3>{if $ResultCountSMSsent neq ''}{$ResultCountSMSsent}{else}0{/if} <p>SMS Sent</p></h3>
						  
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
										{section name="container" loop=$ContainersDetails}	
											
											{if $ContainersDetails[container].status eq 'Available'}
												
												 {if $ContainersDetails[container].container_category  eq '40ft'}
													<li class="ui-state-default external-event bg-green ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_{$ContainersDetails[container].id}"  style="width: 120px; margin-right:25px;" >
													<!--<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}">{$ContainersDetails[container].name}</a>-->
													<!--<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}">{$ContainersDetails[container].name}</a>-->
													{if $ContainersDetails[container].container_customer_id neq ''}		
														<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}" style="color:#000000;">{$ContainersDetails[container].name}</a>        {else}
														{$ContainersDetails[container].name}
													{/if}
													
													</li>
												{/if}	
												
											{elseif $ContainersDetails[container].status eq 'Occupied'}
													{if $ContainersDetails[container].container_category  eq '40ft'} 
											
														<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b>{$ContainersDetails[container].customer_first_name} {$ContainersDetails[container].customer_sur_name} </br> <b>Mobile Number :</b> {$ContainersDetails[container].customer_mobile_number}</br>  <b>Next Due Date : </b>{$ContainersDetails[container].contract_next_due_date}"  class="ui-state-default external-event bg-gray ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_{$ContainersDetails[container].id}"  style="width: 120px; margin-right:25px;">
														{if $ContainersDetails[container].container_customer_id neq ''}		
															<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}" style="color:#000000;">{$ContainersDetails[container].name}</a>        {else}
															{$ContainersDetails[container].name}
														{/if}
														</li>
													  {/if} 	
														
											{elseif $ContainersDetails[container].status eq 'overdue'}
											
											
												 {if $ContainersDetails[container].container_category  eq '40ft'}
													<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b>{$ContainersDetails[container].customer_first_name} {$ContainersDetails[container].customer_sur_name} </br> <b>Mobile Number :</b> {$ContainersDetails[container].customer_mobile_number}</br>  <b>Next Due Date : </b>{$ContainersDetails[container].contract_next_due_date}" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_{$ContainersDetails[container].id}"  style="width: 120px; margin-right:25px;">
													{if $ContainersDetails[container].container_customer_id neq ''}	
														<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}" style="color:#fff;">{$ContainersDetails[container].name}</a>        {else}
														{$ContainersDetails[container].name}
													{/if}
													</li>
												
												 {/if}
											{elseif $ContainersDetails[container].status eq 'locked' || $ContainersDetails[container].status eq 'Locked' }
											
												{if $ContainersDetails[container].container_category  eq '40ft'} 
												<li  data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b>{$ContainersDetails[container].customer_first_name} {$ContainersDetails[container].customer_sur_name} </br> <b>Mobile Number :</b> {$ContainersDetails[container].customer_mobile_number}</br>  <b>Next Due Date : </b>{$ContainersDetails[container].contract_next_due_date}" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 fourty_list" id="customer_li_{$ContainersDetails[container].id}" style="width: 120px; margin-right:25px;" >

												<a class="after_class" href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}">{$ContainersDetails[container].name}</a></li>
												{/if}
												
											{/if}	
											
										 {/section}
									</ul>		
									
									<ul id="sortable" style="float:left; width:100%;">
										{section name="container" loop=$ContainersDetails}	
												{if $ContainersDetails[container].status eq 'Available'}
												
												
												{if $ContainersDetails[container].container_category  eq '10ft' || $ContainersDetails[container].container_category  eq '20ft'} 
												
													<li class="ui-state-default external-event bg-green ui-draggable ui-draggable-handle col-md-1 t20_list " id="customer_li_{$ContainersDetails[container].id}"  style=" width: 60px;" >
													
													{if $ContainersDetails[container].container_customer_id neq ''}		
														<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}" style="color:#000000;">{$ContainersDetails[container].name}</a>        {else}
														{$ContainersDetails[container].name}
													{/if}
													
													</li>
												{/if}	
												
											{elseif $ContainersDetails[container].status eq 'Occupied'}
											
												{if $ContainersDetails[container].container_category  eq '10ft' || $ContainersDetails[container].container_category  eq '20ft'} 
													<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b>{$ContainersDetails[container].customer_first_name} {$ContainersDetails[container].customer_sur_name} </br> <b>Mobile Number :</b> {$ContainersDetails[container].customer_mobile_number}</br>  <b>Next Due Date : </b>{$ContainersDetails[container].contract_next_due_date}"  class="ui-state-default external-event bg-gray ui-draggable ui-draggable-handle col-md-1 t20_list" id="customer_li_{$ContainersDetails[container].id}"  style="width: 60px;" >
													{if $ContainersDetails[container].container_customer_id neq ''}		
														<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}" style="color:#000000;">{$ContainersDetails[container].name}</a>        {else}
														{$ContainersDetails[container].name}
													{/if}
													</li>
												{/if}	
													
											{elseif $ContainersDetails[container].status eq 'overdue'}
											
												{if $ContainersDetails[container].container_category  eq '10ft' || $ContainersDetails[container].container_category  eq '20ft'} 
													<li data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b>{$ContainersDetails[container].customer_first_name} {$ContainersDetails[container].customer_sur_name} </br> <b>Mobile Number :</b> {$ContainersDetails[container].customer_mobile_number}</br>  <b>Next Due Date : </b>{$ContainersDetails[container].contract_next_due_date}" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 t20_list" id="customer_li_{$ContainersDetails[container].id}"  style="width: 60px;"> 
													{if $ContainersDetails[container].container_customer_id neq ''}	
														<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}" style="color:#fff;">{$ContainersDetails[container].name}</a>        {else}
														{$ContainersDetails[container].name}
													{/if}
													</li>	
												{/if}	
											{elseif $ContainersDetails[container].status eq 'locked' || $ContainersDetails[container].status eq 'Locked' }
												
												{if $ContainersDetails[container].container_category  eq '10ft' || $ContainersDetails[container].container_category  eq '20ft'} 
												<li  data-html="true" data-toggle="popover" data-content="<b>Customer Name : </b>{$ContainersDetails[container].customer_first_name} {$ContainersDetails[container].customer_sur_name} </br> <b>Mobile Number :</b> {$ContainersDetails[container].customer_mobile_number}</br>  <b>Next Due Date : </b>{$ContainersDetails[container].contract_next_due_date}" class="ui-state-default external-event bg-red ui-draggable ui-draggable-handle col-md-1 t20_list" id="customer_li_{$ContainersDetails[container].id}" style="width: 60px;"  >

												<a class="after_class" href="{$siteadmin_globalpath}payment_history.php?customer_id={$ContainersDetails[container].container_customer_id}">{$ContainersDetails[container].name}</a></li>
												{/if}
											{/if}	
										 {/section}
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
		{if $adminuser_utype eq 'super_admin'}
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>40{*$dashboardarray.dashboardtemplatecount*}</h3>
						<p>Users Management 
						{*$dashboardarray.dashboardtemplateheading*}</p>
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
						<h3>30{*$dashboardarray.dashboardschdulecount*}</h3>
						<p>Category Management
						{*$dashboardarray.dashboardschduleheading*}</p>
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
						<h3>20{*$dashboardarray.dashboardpendingcount*}</h3>
						<p>Container Management
						{*$dashboardarray.dashboardpendingheading*}</p>
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
						<h3>500{*$dashboardarray.dashboardcompletecount*}</h3>
						<p>Customer Management
						{*$dashboardarray.dashboardcompleteheading*}</p>
					</div>
					<div class="icon"><i class="ion ion-pie-graph"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			{/if}   
			{if $adminuser_utype eq 'admin' && $adminuser_usermgnt eq 'yes'}
			
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3>40{*$dashboardarray.dashboardtemplatecount*}</h3>
						<p>Users Management 
						{*$dashboardarray.dashboardtemplateheading*}</p>
					</div>
					<div class="icon"><i class="ion ion-bag"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			{/if}   
			{if $adminuser_utype eq 'admin' && $adminuser_categorymgnt eq 'yes'}
			  <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>30{*$dashboardarray.dashboardschdulecount*}</h3>
						<p>Category Management
						{*$dashboardarray.dashboardschduleheading*}</p>
					</div>
					<div class="icon"><i class="ion ion-stats-bars"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			{/if}   
			{if $adminuser_utype eq 'admin' && $adminuser_containermgnt eq 'yes'}
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-black">
					<div class="inner">
						<h3>20{*$dashboardarray.dashboardpendingcount*}</h3>
						<p>Container Management
						{*$dashboardarray.dashboardpendingheading*}</p>
					</div>
					<div class="icon"><i class="ion ion-person-add"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			{/if}   
			{if $adminuser_utype eq 'admin' && $adminuser_customermgnt eq 'yes'}	
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3>500{*$dashboardarray.dashboardcompletecount*}</h3>
						<p>Customer Management
						{*$dashboardarray.dashboardcompleteheading*}</p>
					</div>
					<div class="icon"><i class="ion ion-pie-graph"></i></div>
					<a href="javascript:void(0);" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		{/if} 
			 
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
   {literal}
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
	{/literal}	
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	{literal}
		<script>
		$('[data-toggle="popover"]').popover({
		  placement: "auto",
		  trigger: "hover"
		})
		$( function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
		} );
		</script>
	{/literal}
