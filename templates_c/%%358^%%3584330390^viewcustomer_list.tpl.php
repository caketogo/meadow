<?php /* Smarty version 2.6.2, created on 2016-09-25 23:21:14
         compiled from viewcustomer_list.tpl */ ?>
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

'; ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>View Notes List</h1>
	</section>
<section class="content">

				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="20%">Customer_notes</th>
								<th width="20%">Create_date</th>
							</tr>

						</thead>
					</table>
				</div>
</section>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
   	<script type="text/javascript" language="javascript" >
	var dataTable;
    $(document).ready(function() {
         dataTable = $(\'#openTrigger\').DataTable( {
            "processing": true,
            "serverSide": true,
			"searching": false,
			"bLengthChange": false,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=ViewCustomerlist", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html(\'<tr><th colspan="3">No data found in the server</th></tr>\');
                    $("#openTrigger_processing").css("display","none");
 
                },
				
	
            }
        } );
    } );
	</script>
	<style>
	.row{
		margin :0 !important;
	}
	.new_admin_class{
		display: inline-block;
		margin-top: 20px;
		margin-right:15px;
	}
	</style>
'; ?>
	