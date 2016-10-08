<?php /* Smarty version 2.6.2, created on 2016-10-07 09:52:09
         compiled from penalityfee.tpl */ ?>
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
<script type="text/javascript">


function editPenalityfees (id){

	if(id > 0) {
	//loading(\'Processing\');
		window.location.href = "edit_penalityfees.php?id="+id;
	}
}


function DeletePenalityfees(Id) {
	
  document.getElementById(\'hdAction\').value = 2;
  //document.getElementById(\'triggerid\').value = Id;
 
  if(Id > 0) {
    var result=confirm(\'Are you sure want to delete?\');
    if(result) {
	//loading(\'Processing\');
	$("#delb"+Id).hide();
	$("#loadingdel"+Id).show();
	
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deletepenality&id="+Id,
        	success:function(){
				var anSelected = dataTable.$(\'#row\'+Id);
				if ( anSelected.length !== 0 ) {
					$(\'#row\'+Id).remove();
					window.location = "penalityfee.php?msgcode=3";
				}
    }});
	  
    } else {
      return false;
    }
  } 
}

function downloadXls(id) {
loading(\'Processing\');
$("#loadingview"+id).hide();
$("#loadingrec"+id).show();
document.location.href = "downloadrecpicent.php?id="+id;
setTimeout(function(){ $("#loadingview"+id).show(); $("#loadingrec"+id).hide(); }, 4000);
}
</script>
'; ?>

<div class="content-wrapper">

<section class="content">
	<div class="row" >
		<div class="col-md-12">
			<?php if ($this->_tpl_vars['update_msg'] != ''): ?>
				
					<?php if ($this->_tpl_vars['msgcode'] == '5'): ?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $this->_tpl_vars['update_msg']; ?>

						</div>
					<?php elseif ($this->_tpl_vars['msgcode'] == '1'): ?>
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								<?php echo $this->_tpl_vars['update_msg']; ?>

						  	</div>
					<?php elseif ($this->_tpl_vars['msgcode'] == '2'): ?>
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								<?php echo $this->_tpl_vars['update_msg']; ?>

						  	</div>
					<?php elseif ($this->_tpl_vars['msgcode'] == '3'): ?>
							<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $this->_tpl_vars['update_msg']; ?>

						</div>
					 <?php else: ?>		
						<div class="box box-primary">
							<span class="success_new"><?php echo $this->_tpl_vars['update_msg']; ?>
</span>
						</div>
					<?php endif; ?>		
				
			<?php endif; ?>
			
			<form name="templatelist" id="templatelist" method="post">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
					<div class="row" >
				
					<div class="col-md-12 ">
						<div class="col-md-6">
						<h2 class="box-title">Penality Fees</h2>
						</div>	
							<div class="col-md-4">
							<a class="new_admin_class btn-primary" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_penalityfee.php" title="Edit Terms Condition" style="padding:8px 10px;">
							Create Penality Fee
							</a>
							</div>	
						</div>
					</div>
					
				
				
				<div class="box-body table-responsive">
					<!--<table id="openTrigger1" class="table table-striped table-bordered">
						<thead>
							<tr>
								 userType == super_admin  	
								<span id="checkboxsd"><input type="checkbox" name="selectall" id="selectall"  onclick="checkAll(this.checked)"/>Remove All</span>
							</tr>
						</thead>	 	
					</table>
						-->
						
					 	
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="no-sort" width="20%">Days overdue</th>
								<th class="no-sort" width="20%">Penality Fee Amount</th>																
								<th class="no-sort" width="10%" style="text-align:center">Action</th>
							</tr>
						</thead>

					</table>
							
				</div>
				</div>
			</form>
		</div>
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

		var dataTable
		$(document).ready(function() {
		
		 	$(\'#deleteall\').click(function(){
				var checkValues = $(\'input[name=checkboxlist]:checked\').map(function()
				{
					//alert($(this).val());
					return $(this).val();
				}).get();
				
				var count_checked = checkValues.length;
				if(count_checked !=\'\'){
					//alert(\'Total No of boxes \'+ count_checked);
					var result=confirm(\'Are you sure want to delete?\');
				    if(result) {	
						$.ajax({
							url: "ajaxformdata.php?action=delecteMultiplecontainerlist",
							type: \'post\',
							data: { ids: checkValues },
							success:function(data){
								//console.log(data);
								window.location.href = "container_list.php?msgcode=3";
							}
						});
					}	
					
				}else{
					alert(\'Please select any checkboxes\');
				}
				
				
				
			});
			
			//$(\'#openTrigger_wrapper\').prepand(\'<button type="button" class="btn btn-block btn-primary">Dancer saran</button>>\');
			//$( "#openTrigger_wrapper" ).insertBefore( \'<button type="button" class="btn btn-block btn-primary">Dancer saran</button>>\' );
		
		
			 dataTable = $(\'#openTrigger\').DataTable( {
				"processing": true,
				"serverSide": true,
				"order": [[ 0, "desc" ]],
				"ajax":{
					url :"ajaxformdata.php?action=penalityfees", // json datasource
					type: "post",  // method  , by default get
					error: function(){  // error handling
						$(".employee-grid-error").html("");
						$("#openTrigger > tbody").html(\'<tr><th colspan="3">No data found in the server</th></tr>\');
						$("#openTrigger_processing").css("display","none");
					},
				}
			});
		});
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
	