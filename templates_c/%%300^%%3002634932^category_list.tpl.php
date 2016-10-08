<?php /* Smarty version 2.6.2, created on 2016-06-27 13:05:29
         compiled from category_list.tpl */ ?>
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
function editCategoryDetails(id){

	if(id > 0) {
	//loading(\'Processing\');
		window.location.href = "edit_category.php?id="+id;
	}
}
/*function ShiftPage(Page,Display) {
	loading(\'Processing\');
	if(document.getElementById("modelbx")){
		document.forms[1].Page.value=Page;
		document.forms[1].submit();
	}	
	document.forms[document.forms.length-1].Page.value=Page;
	document.forms[document.forms.length-1].submit();
}

function statuschage(id,status) {
	//loading(\'Processing\');
	$("#active"+id).hide();
	$("#deactive"+id).hide();
	$("#loadingactive"+id).show();

	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=triggerstatus&id="+id+"&status="+status,
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
*/
function DeleteCategoryDetails(Id) {
/*	alert(\'asdf\');
	return false;*/
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
        	url: "ajaxformdata.php?action=deletecategory&id="+Id,
        	success:function(){
				var anSelected = dataTable.$(\'#row\'+Id);
				if ( anSelected.length !== 0 ) {
				$(\'#row\'+Id).remove();
					window.location = "category_list.php?msgcode=3";
				}
    		}
		});
	  
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
	<!-- Content Header (Page header) -->
	<section class="content-header">
	
		<!-- <ol class="breadcrumb">
			<li><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data tables</li>
		</ol> -->
	</section>

<section class="content">
	<div class="row" >
		<div class="col-md-12">
			<?php if ($this->_tpl_vars['update_msg'] != ''): ?>
			<div class="box box-primary">
					<span class="success_new"><?php echo $this->_tpl_vars['update_msg']; ?>
</span>
			</div>
			<?php endif; ?>
			<form name="templatelist" id="templatelist" method="post" action="adminuser_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
				 <div class="box-header">
                   <h3 class="box-title">Category List</h3>
                </div>
				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="30%">Name</th>
								<th width="30%">Container Category</th>
								<th width="25%">Status</th>								
								<th width="25%">Created Date</th>
								<!--<th width="20%" style="text-align:center">Action</th>-->
								<!--<th width="20%">Category Name</th>
								<th width="20%">Status</th>
								<th width="20%">Created Date</th>								
								<th width="17%" style="text-align:center">Action</th>-->
							</tr>
						</thead>
					
						<!--<tfoot>
							<tr>
								<th width="35%">Category Name</th>
								<th width="30%">Status</th>								
								<th width="30%">Created Date</th>
								<th width="20%" style="text-align:center">Action</th>

								<th width="20%">Category Name</th>
								<th width="10%">Status</th>
								<th width="10%">Created Date</th>								
								<th width="17%" style="text-align:center">Action</th>
							</tr>
						</tfoot>-->
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
    <script type="text/javascript">
      
    </script>
	
	<script type="text/javascript" language="javascript" >
	var dataTable
    $(document).ready(function() {
         dataTable = $(\'#openTrigger\').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=categorylist", // json datasource
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
	</style>
'; ?>
	