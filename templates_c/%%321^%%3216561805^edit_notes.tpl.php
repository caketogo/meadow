<?php /* Smarty version 2.6.2, created on 2016-08-18 08:53:08
         compiled from edit_notes.tpl */ ?>
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
</script>
'; ?>
	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Edit Notes - <?php echo $this->_tpl_vars['Customer_full_name']; ?>
 </h1>
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
						<input type="hidden" name="create_date" id="create_date" value="<?php echo $this->_tpl_vars['NotesEditDetails'][0]['create_date']; ?>
" />												
						<input type="hidden" name="notes_id" id="notes_id" value="<?php echo $this->_tpl_vars['NotesEditDetails'][0]['id']; ?>
" />						
						<input type="hidden" name="created_by" id="created_by" value="<?php echo $this->_tpl_vars['NotesEditDetails'][0]['created_by']; ?>
" />
						<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->_tpl_vars['NotesEditDetails'][0]['customer_id']; ?>
" />
						<div class="box-body">
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Add Comments (about the customer): </label>
								</div>	
								<div class="col-md-6">
									<textarea class="form-control" rows="8" id="customer_notes" name="customer_notes"><?php echo $this->_tpl_vars['NotesEditDetails'][0]['customer_notes']; ?>
</textarea>
								</div>	
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
<?php echo '
    <script type="text/javascript">
    </script>
'; ?>
	