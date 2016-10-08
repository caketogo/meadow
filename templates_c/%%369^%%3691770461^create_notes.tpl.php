<?php /* Smarty version 2.6.2, created on 2016-10-07 16:44:15
         compiled from create_notes.tpl */ ?>
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
<!--<link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">-->
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

		.add_more img{
			cursor:pointer;
		}
		
		.pad {
			border: 1px solid;
			padding: 10px;
		}
		.clearButton {
			list-style: outside none none;
		}
		.clearButton a{
			color: red !important;
			cursor: pointer;
			float: right;
			margin-right: 10%;
		}
    </style>

<script type="text/javascript">

</script>
'; ?>
	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Create Notes - <?php echo $this->_tpl_vars['Customer_full_name']; ?>
 </h1>
		
	</section>
	
	<section class="content">
		<!--<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn bg-navy btn-navy margin">Customer Details</button>
				<button type="button" class="btn bg-navy btn-navy margin">Payment History</button>
				<button type="button" class="btn bg-navy btn-navy margin">Communication</button>
				<button type="button" class="btn bg-primary btn-primary margin">Notes</button>												

			</div>	
		</div>-->	
		
		<div class="row">
			<div class="col-md-12">
				<!--<button type="button" class="btn bg-navy btn-navy margin" onclick="gotoNotessection('customer');">Customer Details</button>
				<button type="button" class="btn bg-navy btn-navy margin">Payment History</button>
				<button type="button" class="btn bg-navy btn-navy margin">Communication</button>
				<button type="button" class="btn bg-primary btn-primary margin">Notes</button>	-->	
				
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('customer_details');">Customer Details</button>
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('payment_history');">Payment History</button>
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('communication_history');">Communication</button>
				<button type="button" class="btn bg-primary btn-primary margin" onclick="customer_tab_form_section('notes');">Notes</button>													

			</div>	
		</div>	
		<form name="customer_tab_form" id="customer_tab_form" role="form" action="" method="post">
			<input type="hidden" name="hdaction" id="hdaction" value="5" />
			<input type="hidden" name="page_type" id="page_type" value="notes" />						
			<input type="hidden" name="current_customer_id" id="current_customer_id" value="<?php echo $this->_tpl_vars['customer_id']; ?>
"  /> 
			<input type="hidden" name="current_customer_id" id="current_customer_id" value="<?php echo $this->_tpl_vars['current_customer_id']; ?>
"  /> 			
			
		</form>
		
		
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post" onsubmit="return checkValidation();">
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $this->_tpl_vars['customer_id']; ?>
" />
						<div class="box-body">
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Add Comments (about the customer): </label>
								</div>	
								<div class="col-md-6">
									<textarea class="form-control" rows="8" id="customer_notes" name="customer_notes"></textarea>
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
    <script type="text/javascript">
			
			function customer_tab_form_section(action_type){
			
			var customer_id = document.getElementById("current_customer_id").value;
			
			if(action_type == \'customer_details\'){
				document.getElementById("customer_tab_form").action = "view_customer.php?id=" + customer_id + "";	
			}else if(action_type == \'notes\'){
				document.getElementById("customer_tab_form").action = "notes_list.php?customer_id=" + customer_id + "";	
			}else if(action_type == \'payment_history\'){
				document.getElementById("customer_tab_form").action = "payment_history.php?customer_id=" + customer_id + "";	
			}else if(action_type == \'communication_history\'){
				document.getElementById("customer_tab_form").action = "communication_list.php?customer_id=" + customer_id + "";	
			}
			
			document.getElementById(\'customer_tab_form\').submit();
			
		} 		
		
		function checkValidation(){
			var customer_notes = $(\'#customer_notes\').val();
			//var category_name = $(\'#category_name\').val();			
			if(customer_notes ==0){
				alert(\'Please Enter the Customer Notes\');
				return false;
			}
			/*if(category_name ==0){
				alert(\'Please Select the Container Type\');
				return false;
			}*/
		}
		
    </script>
'; ?>
	