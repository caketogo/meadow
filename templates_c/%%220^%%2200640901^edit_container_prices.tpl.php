<?php /* Smarty version 2.6.2, created on 2016-09-22 05:44:50
         compiled from edit_container_prices.tpl */ ?>
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
		<h1>Edit Container Prices</h1>
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post" onsubmit="return checkValidation();">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="created_by" id="created_by"  value="<?php echo $this->_tpl_vars['ContainerPricesDetails'][0]['created_by']; ?>
"/>


						<div class="box-body">
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Container Category : </label>
																	</div>	
								
								<div class="col-md-12">
								<select name="category_name" id="category_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									<option value="0">Select your Container Type</option>
									<option value="10ft" <?php if ($this->_tpl_vars['ContainerPricesDetails'][0]['container_category'] == '10ft'): ?> selected="selected" <?php endif; ?>>10ft</option>
									<option value="20ft" <?php if ($this->_tpl_vars['ContainerPricesDetails'][0]['container_category'] == '20ft'): ?> selected="selected" <?php endif; ?>>20ft</option>
									<option value="40ft" <?php if ($this->_tpl_vars['ContainerPricesDetails'][0]['container_category'] == '40ft'): ?> selected="selected" <?php endif; ?>>40ft</option>									
								</select>
							</div>	
									
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Deposit Amount: </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="deposit_amount" id="deposit_amount" value="<?php echo $this->_tpl_vars['ContainerPricesDetails'][0]['deposit_amount']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Licence Amount: (excl VAT)</label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="licence_amount" id="licence_amount" value="<?php echo $this->_tpl_vars['ContainerPricesDetails'][0]['licence_amount']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">VAT Amount: </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="vat_amount" id="vat_amount" value="<?php echo $this->_tpl_vars['ContainerPricesDetails'][0]['vat_amount']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Licence Amount:  (Incl VAT)</label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="licence_amount_vat" id="licence_amount_vat" value="<?php echo $this->_tpl_vars['ContainerPricesDetails'][0]['licence_amount_vat']; ?>
" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>						
							
							
									
						</div>
							
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<!--<input type="submit" name="submit" id="submit-form" value="Submit"  /> -->
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
    
'; ?>
	