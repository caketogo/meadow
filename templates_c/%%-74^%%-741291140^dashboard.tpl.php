<?php /* Smarty version 2.6.2, created on 2016-06-20 03:36:08
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
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Dashboard <small>Control panel</small></h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			
			
			
			<!-- ./col -->
		
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-purple">
					<div class="inner">
						<h3><?php echo $this->_tpl_vars['dashboardarray']['dashboardtemplatecount']; ?>
</h3>
						<p><?php echo $this->_tpl_vars['dashboardarray']['dashboardtemplateheading']; ?>
</p>
					</div>
					<div class="icon"><i class="ion ion-bag"></i></div>
					<a href="template_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
					<div class="inner">
						<h3><?php echo $this->_tpl_vars['dashboardarray']['dashboardschdulecount']; ?>
</h3>
						<p><?php echo $this->_tpl_vars['dashboardarray']['dashboardschduleheading']; ?>
</p>
					</div>
					<div class="icon"><i class="ion ion-stats-bars"></i></div>
					<a href="email.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-black">
					<div class="inner">
						<h3><?php echo $this->_tpl_vars['dashboardarray']['dashboardpendingcount']; ?>
</h3>
						<p><?php echo $this->_tpl_vars['dashboardarray']['dashboardpendingheading']; ?>
</p>
					</div>
					<div class="icon"><i class="ion ion-person-add"></i></div>
					<a href="email.php?schedule_from_date=<?php echo $this->_tpl_vars['today']; ?>
" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-red">
					<div class="inner">
						<h3><?php echo $this->_tpl_vars['dashboardarray']['dashboardcompletecount']; ?>
</h3>
						<p><?php echo $this->_tpl_vars['dashboardarray']['dashboardcompleteheading']; ?>
</p>
					</div>
					<div class="icon"><i class="ion ion-pie-graph"></i></div>
					<a href="email.php?schedule_to_date=<?php echo $this->_tpl_vars['today']; ?>
" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>