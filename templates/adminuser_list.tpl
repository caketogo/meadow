{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function editTriggerDetails(id){

	if(id > 0) {
	//loading('Processing');
		window.location.href = "edit_adminuser.php?id="+id;
	}
}
function ShiftPage(Page,Display) {
	loading('Processing');
	if(document.getElementById("modelbx")){
		document.forms[1].Page.value=Page;
		document.forms[1].submit();
	}	
	document.forms[document.forms.length-1].Page.value=Page;
	document.forms[document.forms.length-1].submit();
}

function statuschage(id,status) {
	//loading('Processing');
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

function DeleteTriggerDetails(Id) {
	
  document.getElementById('hdAction').value = 2;
  document.getElementById('triggerid').value = Id;
 
  if(Id > 0) {
    var result=confirm('Are you sure want to delete?');
    if(result) {
	//loading('Processing');
	$("#delb"+Id).hide();
	$("#loadingdel"+Id).show();
	
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deleteadminuser&uid="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
				$('#row'+Id).remove();
				window.location = "adminuser_list.php?msgcode=3";
				}
    }});
	  
    } else {
      return false;
    }
  } 
}

function downloadXls(id) {
loading('Processing');
$("#loadingview"+id).hide();
$("#loadingrec"+id).show();
document.location.href = "downloadrecpicent.php?id="+id;
setTimeout(function(){ $("#loadingview"+id).show(); $("#loadingrec"+id).hide(); }, 4000);
}
</script>
{/literal}
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	
		<!-- <ol class="breadcrumb">
			<li><a href="{$siteadmin_globalpath}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data tables</li>
		</ol> -->
	</section>

<section class="content">
		
		<div class="row" >
		<div class="col-md-12">
			
			{if $update_msg neq ''}
			<div class="box box-primary">
					<span class="success_new">{$update_msg}</span>
			</div>
			{/if}
		
			<form name="templatelist" id="templatelist" method="post" action="adminuser_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
					<div class="row" >
				
					<div class="col-md-12 ">
						<div class="col-md-6">
						<h2 class="box-title">Admin User List</h2>
						</div>	
						<div class="col-md-4">
						<a  href="{$siteadmin_globalpath}add_adminuser.php" title="Add Admin User"  class="btn bg-primary btn-primary margin">
									Add Admin User
						</a>
						<!--<a class="new_admin_class" href="{$siteadmin_globalpath}add_adminuser.php" title="Add Admin User"><i class="glyphicon glyphicon-user" style="font-size:28px;color:green;"></i></a>
						<a class="new_admin_class" href="{$siteadmin_globalpath}add_adminuser.php" title="Import Container"><i class="glyphicon glyphicon-import" style="font-size:28px;color:green;"></i></a>-->
						</div>	
						</div>
					</div>		
					
					<!-- <div class="box-header">
    	               <h3 class="box-title">Admin User List</h3>
	                </div>-->
				 
				<!-- <div class="box-header">
					<div class="col-md-6">
    	               <h3 class="box-title">Admin User List</h3>
				   	</div>
					
					<div class="col-md-6">
					   <a href="{$siteadmin_globalpath}add_adminuser.php" title="Add Admin User"><button class="btn btn-success"><i class="fa fa-plus"></i></button></a>
                	</div>
                </div>-->
				
				
				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="20%">First Name</th>
								<th width="20%">Last Name</th>								
								<th width="20%">User Name</th>								
								<th width="20%">Email</th>
								<th width="20%">Status</th>								
								<th width="10%" style="text-align:center">Action</th>
							</tr>
						</thead>
					
					<!--	<tfoot>
							<tr>
								<th width="20%">First Name</th>
								<th width="20%">Last Name</th>								
								<th width="40%">Email</th>
								<th width="20%">Status</th>																
								<th width="10%" style="text-align:center">Action</th>
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
{include file="includes/footer.tpl"}

{literal}
    <script type="text/javascript">
      
    </script>
	
	<script type="text/javascript" language="javascript" >
	var dataTable
    $(document).ready(function() {
         dataTable = $('#openTrigger').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=adminuserlist", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html('<tr><th colspan="3">No data found in the server</th></tr>');
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
{/literal}	
