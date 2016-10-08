<?php /* Smarty version 2.6.2, created on 2016-06-23 07:12:42
         compiled from edit_category.tpl */ ?>
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
'; ?>
	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Category</h1>
		
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
								<label for="exampleInputEmail1">Category Name : </label>
							</div>	
								<div class="col-md-12">
								<input type="text" name="category_name" id="category_name" value="<?php echo $this->_tpl_vars['CategoryEditDetails'][0]['category_name']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
							
							</div>	
							
							
							
							</div>
							<!--<div class="form-group">
							
								<div class="col-md-12">
								
								
								
								<input type="hidden" name="tsid" id="tsid"  value=""/>	
								<input type="hidden" name="tsh" id="tsh"  value=""/>	
								<input type="hidden" name="tsf" id="tsf"  value=""/>
								<input type="hidden" name="thtml" id="thtml"  value=""/>	
								<input type="hidden" name="tvalue" id="tvalue"  value=""/>
								<input type="hidden" name="tid" id="tid"  value=""/>	
								</div>
							</div>-->
							<div class="col-md-12">
								<label for="exampleInputEmail1">Status : </label>
							</div>	
								<div class="col-md-12">
									<select name="txt_status" id="txt_status" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
										<option value="0"  <?php if ($this->_tpl_vars['CategoryEditDetails'][0]['status'] == 'Inactive'): ?> selected="selected" <?php endif; ?>>Inactive</option>
										<option value="1"  <?php if ($this->_tpl_vars['CategoryEditDetails'][0]['status'] == 'Active'): ?> selected="selected" <?php endif; ?>>Active</option>
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