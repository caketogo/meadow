<?php /* Smarty version 2.6.2, created on 2016-09-22 06:11:10
         compiled from expenses_list.tpl */ ?>
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
function editNotesDetails(id){
	//alert(\'Processing on this section..will get back to you soon.\'+id);
	//return false;
	if(id > 0) {
	//loading(\'Processing\');
		window.location.href = "edit_notes.php?id="+id;
	}
}

function statuschage(id,status) {
	//loading(\'Processing\');
	$("#active"+id).hide();
	$("#deactive"+id).hide();
	$("#loadingactive"+id).show();

	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=adminuserstatus&id="+id+"&status="+status,
        	success:function(){
			$("#loadingactive"+id).hide();
			if (status == 0){
				$("#active"+id).hide();
				$("#deactive"+id).show();
				
			} else {
  				$("#active"+id).show();
				$("#deactive"+id).hide();
				
			}
			
			//$.fancybox.close();
    }});
}

function DeleteNotesDetails(Id) {
	
  document.getElementById(\'hdAction\').value = 2;
  document.getElementById(\'triggerid\').value = Id;
 
  if(Id > 0) {
    var result=confirm(\'Are you sure want to delete?\');
    if(result) {
	//loading(\'Processing\');
	$("#delb"+Id).hide();
	$("#loadingdel"+Id).show();
	
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deleteNotes&id="+Id,
        	success:function(){
				var anSelected = dataTable.$(\'#row\'+Id);
				if ( anSelected.length !== 0 ) {
				$(\'#row\'+Id).remove();
					window.location = "notes_list.php?msgcode=3";
				}
    }});
	  
    } else {
      return false;
    }
  } 
}

</script>
'; ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	</section>

<section class="content">
		
	<div class="row" >
		<div class="col-md-12">
			<?php if ($this->_tpl_vars['update_msg'] != ''): ?>
				<?php if ($this->_tpl_vars['msgcode'] == '3'): ?>
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
				<?php else: ?>	
					<div class="box box-primary">
							<span class="success_new"><?php echo $this->_tpl_vars['update_msg']; ?>
</span>
					</div>
				<?php endif; ?>		
			<?php endif; ?>
		
			 <form name="exportCSVexpenseForm" id="exportCSVexpenseForm" method="post">
				  <input type="hidden" name="exporstCSVexp" id="exporstCSVexp" value="" />
			</form>	

			 <form name="downloadzipexpenseForm" id="downloadzipexpenseForm" method="post">
				  <input type="hidden" name="downloadzipexp" id="downloadzipexp" value="" />
			</form>	
				
			<form name="templatelist" id="templatelist" method="post" action="">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<input type="hidden" name="siteadmin_globalpath" id="siteadmin_globalpath" value="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
"/>
				
				<div class="box box-primary">
					
					<div class="row" >
						<div class="col-md-12 ">
								<div class="col-md-4">
									<h2 class="box-title">Expenses Management</h2>
								</div>	
								<div class="col-md-6" style="margin:10px 0 0 0">
									<a  href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_expenses.php" title="Create Expenses" class="btn bg-primary btn-primary margin">
											Create Expenses
									</a>
									<a  href="javascript:void(0);" onclick="exportCSVExpenselist();" title="Download all" class="btn bg-primary btn-primary margin">
									     Export as CSV
					                </a>
									<a  href="javascript:void(0);" onclick="downloadzipExpenselist();" title="Download all as Zip file" class="btn bg-primary btn-primary margin">
									     Download as Zip file
					                </a>
									<!--<a class="new_admin_class" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
create_expenses.php" title="Create Expenses"><i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i></a>-->
								</div>	
							
						</div>
				</div>
				
				
				<div class="row" >
					<div class="col-md-12 " style="margin:10px 0 0 0">
								<div class="col-md-3">
										<label for="exampleInputEmail1">Download Attachment Between </label>
									</div>	
								<div class="col-md-3">
									<input type="text" name="expenses_start_date" id="expenses_start_date" class="form-control expenses_start_date" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>
								
								<div class="col-md-3">
								<input type="text" name="expenses_end_date" id="expenses_end_date" class="form-control expenses_end_date" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>
								<div class="col-md-3" style="display:none;">
									<a style="margin:0px;"  href="javascript:void(0);" onclick="searchExpenselist();" title="Download all as Zip file" class="btn bg-primary btn-primary margin">
									     Search
					                </a>
								</div>	
					</div>
				</div>	
				
					
					
						

				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="5%">Date</th>
								<th width="25%">Description</th>								
								<th width="15%">Payment Method</th>
								<th width="20%">Amount Excluding VAT</th>
								<th width="10%">VAT</th>																								
								<th width="20%">Amount including VAT</th>																																
								<th width="10%">Attachments</th>
								<!--<th width="2%" style="text-align:center">Action</th>-->
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

<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			   <img id="imagepreview" style="width: 600px;"  src="" />
			</div>
		  </div>
		</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
    <script type="text/javascript">
	
	
	
      function gotoNotessection(){
			//alert(pagename);
			document.getElementById(\'customer_page\').submit();
			
		} 
    </script>
	
	<script type="text/javascript" language="javascript" >
	
	/*	function viewmodel(imgsrc){
		var myLink = imgsrc.getAttribute(\'title\');
		//alert(this.title);
		imgsrc.wrap(\'<a href="\' + myLink + \'" download />\')
	}*/
		
	var dataTable


	$(document).on(\'click\', \'img.downloadable\', function(e) { 
		var $this = $(this);
		$this.wrap(\'<a href="\' + $this.attr(\'title\') + \'" download />\')
	});
	
    $(document).ready(function() {
         dataTable = $(\'#openTrigger\').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=expenseslist", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html(\'<tr><th colspan="3">No data found in the server</th></tr>\');
                    $("#openTrigger_processing").css("display","none");
 
                },
				
	
            }
        } );
    } );
	
	function exportCSVExpenselist(){
		  $("#exporstCSVexp").val(\'yes\');
		  $("#exportCSVexpenseForm").submit();
	}

	function downloadzipExpenselist(){
		  $("#downloadzipexp").val(\'yes\');
		  $("#downloadzipexpenseForm").submit();
	}	
	
	function searchExpenselist(){
	var startdate = $("#expenses_start_date").val();
	var enddate = $("#expenses_end_date").val();
	}
	
	function initdatepicker(){
			$(".expenses_start_date").datepicker({ dateFormat: \'dd/mm/yyyy\' }).datepicker("setDate", new Date());
			$(".expenses_end_date").datepicker({ dateFormat: \'dd/mm/yyyy\' }).datepicker("setDate", new Date());
	}	
	initdatepicker();
	
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
	.modal-dialog {
		margin: 30px auto;
		width: 40%;
	}
	</style>
'; ?>
	