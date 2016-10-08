<?php /* Smarty version 2.6.2, created on 2016-06-20 03:36:32
         compiled from includes/header.tpl */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $this->_tpl_vars['pgnametitle']; ?>
 | Container Rental </title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.4 -->
		<link href="<?php echo $this->_tpl_vars['siteadmin_stylespath']; ?>
bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome Icons -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Ionicons -->
		<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Theme style -->
		<link href="<?php echo $this->_tpl_vars['siteadmin_stylespath']; ?>
AdminLTE.min.css" rel="stylesheet" type="text/css" />
		<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link href="<?php echo $this->_tpl_vars['siteadmin_stylespath']; ?>
skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $this->_tpl_vars['siteadmin_stylespath']; ?>
datepicker.css?ver=5.01" rel="stylesheet" type="text/css" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="skin-blue sidebar-mini">
		<!-- Site wrapper -->
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
" class="logo"><!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>L</b>DO</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Container Rental</b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $this->_tpl_vars['adminuser_pimage']; ?>
" class="user-image" alt="User Image" />
                  <span class="hidden-xs"><?php echo $this->_tpl_vars['adminuser_fullname']; ?>
</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $this->_tpl_vars['adminuser_pimage']; ?>
" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->_tpl_vars['adminuser_fullname']; ?>
 - <?php echo $this->_tpl_vars['adminuser_utype']; ?>

                      <small>Member since <?php echo $this->_tpl_vars['adminuser_d_created']; ?>
</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
									<!--
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
									-->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
changepassword.php" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->	