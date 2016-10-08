<?php /* Smarty version 2.6.2, created on 2016-10-08 13:59:19
         compiled from includes/header.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'debug_print_var', 'includes/header.tpl', 65, false),)), $this); ?>
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
		
		<link href="http://almsaeedstudio.com/themes/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
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
					<span class="logo-mini"><b>C</b>R</span>
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
	  <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				  <i class="fa fa-bell-o"></i>
				  <span class="label label-warning"><?php if ($this->_tpl_vars['notescount'] != ''):  echo $this->_tpl_vars['notescount'];  else: ?>0<?php endif; ?></span>
              </a>
             <ul class="dropdown-menu">
			  <li>
                 <!--<li class="header">You have <?php echo $this->_tpl_vars['notescount']; ?>
 notifications</li>-->
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv">
			  	  <ul style="overflow-y: hidden; width: 100%; height: 200px; border-right: 1px solid steelblue; border-left: 1px solid steelblue; border-bottom: 1px solid steelblue;" class="menu">
				<!-- <?php echo smarty_modifier_debug_print_var($this->_tpl_vars['notesdetailscomds']); ?>
 -->
				<?php if (isset($this->_sections['customer'])) unset($this->_sections['customer']);
$this->_sections['customer']['name'] = 'customer';
$this->_sections['customer']['loop'] = is_array($_loop=$this->_tpl_vars['notesdetailscomds']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['customer']['show'] = true;
$this->_sections['customer']['max'] = $this->_sections['customer']['loop'];
$this->_sections['customer']['step'] = 1;
$this->_sections['customer']['start'] = $this->_sections['customer']['step'] > 0 ? 0 : $this->_sections['customer']['loop']-1;
if ($this->_sections['customer']['show']) {
    $this->_sections['customer']['total'] = $this->_sections['customer']['loop'];
    if ($this->_sections['customer']['total'] == 0)
        $this->_sections['customer']['show'] = false;
} else
    $this->_sections['customer']['total'] = 0;
if ($this->_sections['customer']['show']):

            for ($this->_sections['customer']['index'] = $this->_sections['customer']['start'], $this->_sections['customer']['iteration'] = 1;
                 $this->_sections['customer']['iteration'] <= $this->_sections['customer']['total'];
                 $this->_sections['customer']['index'] += $this->_sections['customer']['step'], $this->_sections['customer']['iteration']++):
$this->_sections['customer']['rownum'] = $this->_sections['customer']['iteration'];
$this->_sections['customer']['index_prev'] = $this->_sections['customer']['index'] - $this->_sections['customer']['step'];
$this->_sections['customer']['index_next'] = $this->_sections['customer']['index'] + $this->_sections['customer']['step'];
$this->_sections['customer']['first']      = ($this->_sections['customer']['iteration'] == 1);
$this->_sections['customer']['last']       = ($this->_sections['customer']['iteration'] == $this->_sections['customer']['total']);
?>
                         <li>
                           <a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
notes_list.php?customer_id=<?php echo $this->_tpl_vars['notesdetailscomds'][$this->_sections['customer']['index']][0]['customer_id']; ?>
" onClick="chknotificationdeactive(<?php echo $this->_tpl_vars['notesdetailscomds'][$this->_sections['customer']['index']][0]['id']; ?>
);">
                              <span class="uppercase_cnt"><?php echo $this->_tpl_vars['notesdetailscomds'][$this->_sections['customer']['index']][0]['customer_notes']; ?>
</span>
                           </a>
                       </li>
					  
		<!--			   <li class="footer_bottomm"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
notes_list.php?customer_id=<?php echo $this->_tpl_vars['notesdetailscomds'][$this->_sections['list']['index']]['customer_id']; ?>
">View all</a></li>-->
					<?php endfor; else: ?>
							<?php if (isset($this->_sections['customer'])) unset($this->_sections['customer']);
$this->_sections['customer']['name'] = 'customer';
$this->_sections['customer']['loop'] = is_array($_loop=$this->_tpl_vars['noteslist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['customer']['show'] = true;
$this->_sections['customer']['max'] = $this->_sections['customer']['loop'];
$this->_sections['customer']['step'] = 1;
$this->_sections['customer']['start'] = $this->_sections['customer']['step'] > 0 ? 0 : $this->_sections['customer']['loop']-1;
if ($this->_sections['customer']['show']) {
    $this->_sections['customer']['total'] = $this->_sections['customer']['loop'];
    if ($this->_sections['customer']['total'] == 0)
        $this->_sections['customer']['show'] = false;
} else
    $this->_sections['customer']['total'] = 0;
if ($this->_sections['customer']['show']):

            for ($this->_sections['customer']['index'] = $this->_sections['customer']['start'], $this->_sections['customer']['iteration'] = 1;
                 $this->_sections['customer']['iteration'] <= $this->_sections['customer']['total'];
                 $this->_sections['customer']['index'] += $this->_sections['customer']['step'], $this->_sections['customer']['iteration']++):
$this->_sections['customer']['rownum'] = $this->_sections['customer']['iteration'];
$this->_sections['customer']['index_prev'] = $this->_sections['customer']['index'] - $this->_sections['customer']['step'];
$this->_sections['customer']['index_next'] = $this->_sections['customer']['index'] + $this->_sections['customer']['step'];
$this->_sections['customer']['first']      = ($this->_sections['customer']['iteration'] == 1);
$this->_sections['customer']['last']       = ($this->_sections['customer']['iteration'] == $this->_sections['customer']['total']);
?>
								<li>
								<a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
notes_list.php?customer_id=<?php echo $this->_tpl_vars['noteslist'][$this->_sections['customer']['index']][0]['customer_id']; ?>
">
								<span class="uppercase_cnt"><?php echo $this->_tpl_vars['noteslist'][$this->_sections['customer']['index']][0]['customer_notes']; ?>
</span></a>
								</li>
								
						   <?php endfor; endif; ?>	
						  <!-- <li class="footer_bottomm">No items found</li>-->				   
		<?php endif; ?>
		         <?php if ($this->_tpl_vars['notescount'] != ''): ?> <li class="footer_bottomm"><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
viewcustomer_list.php">View all notes</a></li><?php endif; ?>
			    	
                </ul>
				</div>
             </li>
            </ul>
        
		   
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
                       <!--<small>Member since <?php echo $this->_tpl_vars['adminuser_d_created']; ?>
</small>-->
                    </p>
                  </li>
                  <!-- Menu Body -->

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
               <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
              </li>
            </ul>
          </div>
        </nav>
      </header>

<?php echo '  
<script>

function chknotificationdeactive(note_id)
	{
	var notes_id =note_id;
		$.ajax({
				type: "POST",
				url :"ajaxformdata.php?action=CustomerNoteid&usernote_id="+notes_id,
				 success:function(data){
					//alert(data);
			     },
			});	
	}	

</script>

	  <style>
	  	/*.list{
		position:relative;
		float:left;
		line-height:1.429px;
		padding:6px 6px;
		}*/
		.item_set {
			  float: left;
			  font-size: 15px;
			  padding-top: 8px;
			  text-align: center;
			  width: 100%;
		}
		 .uppercase_cnt {
				font-weight: bold;
				font-size: 14px;
				text-transform: capitalize;
				text-decoration: inherit;
				color: steelblue;
		 }
		 .footer_bottomm { 
				 border-bottom: 1px solid steelblue;
				 border-top: 1px solid steelblue;
				 bottom: 0;
				 font-size: 14px;
				 font-weight: bold;
				 position: absolute;
				 text-align: center;
				 width: 100%;
			}
			
	  </style>
 '; ?>

 
      <!-- =============================================== -->	