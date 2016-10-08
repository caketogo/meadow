<?php /* Smarty version 2.6.2, created on 2016-08-07 12:42:38
         compiled from edit_adminuser.tpl */ ?>
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
    </style>

<script type="text/javascript">

/* function mapfields() {
 	var id = $(\'#field1\').val();
	//loading(\'Processing\');
	$("#loadingimg").show();
	$(".query").html(\'\');
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace(\'class="col\', \'onchange="selectvalue(this)" class="col\');
			$(".query").html(\'\');
			$("#loadingimg").hide();
			rootflag=0;
			addqueryroot(\'.query\', true);
			$.fancybox.close();
    }});
 }
 
 function mapfields1() {
 	var id = $(\'#field1\').val();
	//loading(\'Processing\');
	
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace(\'class="col\', \'onchange="selectvalue(this)" class="col\');
			
			addqueryroot1(\'.query\', false);
			$.fancybox.close();
			
    }});
 }
 
  function mappingtemplate(thisselect) {
 	var sh = $(\'option:selected\', thisselect).attr(\'data-sh\');
	var sid = $(\'option:selected\', thisselect).attr(\'data-sid\');
	var sf = $(\'option:selected\', thisselect).attr(\'data-sf\');
	var tid = $(\'option:selected\', thisselect).attr(\'data-id\');
	$("#sh").html(sh);
	$("#sf").html(sf);
	$("#tsh").val(sh);
	$("#tsid").val(sid);
	$("#tid").val(tid);
	$("#tsf").val(sf);
	

	
 }	 */
</script>
'; ?>
	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Edit Admin User</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<div class="box-body">
							<div class="form-group">
								<div class="col-md-12">
								<label for="exampleInputEmail1">First Name : </label>
							</div>	
								<div class="col-md-12">
								<input type="text" name="first_name" id="first_name" value="<?php echo $this->_tpl_vars['AdminUserEditDetails'][0]['first_name']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
								<label for="exampleInputEmail1">Last Name : </label>
							</div>	
								<div class="col-md-12">
								<input type="text" name="last_name" id="last_name" value="<?php echo $this->_tpl_vars['AdminUserEditDetails'][0]['last_name']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							
							<div class="form-group">
								<div class="col-md-12">
								<label for="exampleInputEmail1">Email: </label>
							</div>	
								<div class="col-md-12">
								<input type="text" name="email" id="email" value="<?php echo $this->_tpl_vars['AdminUserEditDetails'][0]['email']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1"> </label>
								</div>
								<div class="col-md-12">
									<label for="exampleInputEmail1">User Privileges: </label>
								</div>	
							</div>
							
							
							<div class="form-group" style="display:none">
								<div class="col-md-12">
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value=""  <?php if (! empty ( $this->_tpl_vars['AdminUserEditDetails'][0]['user_management'] ) && $this->_tpl_vars['AdminUserEditDetails'][0]['user_management'] == 'yes'): ?>checked="checked"<?php endif; ?> name="user_management" id="user_management">Users Management</label>
									</div>
								</div>
							</div>		
									
							<div class="form-group">
								<div class="col-md-12">		
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" <?php if (! empty ( $this->_tpl_vars['AdminUserEditDetails'][0]['category_management'] ) && $this->_tpl_vars['AdminUserEditDetails'][0]['category_management'] == 'yes'): ?>checked="checked"<?php endif; ?>  name="category_management" id="category_management">Category Management</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12">		
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" <?php if (! empty ( $this->_tpl_vars['AdminUserEditDetails'][0]['container_management'] ) && $this->_tpl_vars['AdminUserEditDetails'][0]['container_management'] == 'yes'): ?>checked="checked"<?php endif; ?>  name="container_management" id="container_management">Container Management</label>
									</div>
								</div>
							</div>		
								
							<div class="form-group">
								<div class="col-md-12">	
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" <?php if (! empty ( $this->_tpl_vars['AdminUserEditDetails'][0]['customer_management'] ) && $this->_tpl_vars['AdminUserEditDetails'][0]['customer_management'] == 'yes'): ?>checked="checked"<?php endif; ?>  name="customer_management" id="customer_management">Customer Management</label>
									</div>
								</div>
							</div>	
							
							<div class="col-md-12">
								<label for="exampleInputEmail1">Status : </label>
							</div>	
								<div class="col-md-12">
									<select name="status" id="status" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
										<option value="0"  <?php if ($this->_tpl_vars['AdminUserEditDetails'][0]['status'] == Inactive): ?> selected="selected" <?php endif; ?>>Inactive</option>
										<option value="1"  <?php if ($this->_tpl_vars['AdminUserEditDetails'][0]['status'] == Active): ?> selected="selected" <?php endif; ?>>Active</option>
								</select>
							</div>	
							
							</div>
							
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
			<!--/.col (left) -->
		</div>
		<!-- /.row -->
	</section>
	
</div>
<!-- /.content-wrapper -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/res/json2.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/condition-builder.js" type="text/javascript"></script>