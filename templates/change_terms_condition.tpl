{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">


function editTermsConditions(id){

	if(id > 0) {
	//loading('Processing');
		window.location.href = "edit_termscondition.php?id="+id;
	}
}


function DeleteTermsConditions(Id) {
	
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
        	url: "ajaxformdata.php?action=deletetermscondition&id="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
					$('#row'+Id).remove();
					window.location = "change_terms_condition.php?msgcode=3";
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

	<section class="content">
		<div class="row" >
		<div class="col-md-12">
			{if $update_msg neq ''}
				
					{if $msgcode eq '5'}
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							{$update_msg}
						</div>
					{elseif $msgcode eq '1'}
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								{$update_msg}
						  	</div>
					{elseif $msgcode eq '2'}
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								{$update_msg}
						  	</div>		
					{elseif $msgcode eq '3'}
							<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							{$update_msg}
						</div>
					 {else}		
						<div class="box box-primary">
							<span class="success_new">{$update_msg}</span>
						</div>
					{/if}		
				
			{/if}
			
			<form name="templatelist" id="templatelist" method="post" action="container_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
					<div class="row" >
				
					<div class="col-md-12 ">
						<div class="col-md-6">
						<h2 class="box-title">Terms Condition</h2>
						</div>	
						<div class="col-md-4">
						<a class="new_admin_class btn-primary" href="{$siteadmin_globalpath}create_change_terms_condition.php" title="Add New Terms Condition" style="padding:8px 10px;">
						Add New Terms Condition
						</a>
						</div>	
						</div>
					</div>
					
				
				<div class="box-body table-responsive">
					 	
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th class="no-sort" width="50%">Terms and Conditions</th>
								<th class="no-sort" width="20%">Create Date</th>																
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
{include file="includes/footer.tpl"}
{literal}
	<script type="text/javascript" language="javascript" >
		var dataTable
		$(document).ready(function() {
			 dataTable = $('#openTrigger').DataTable( {
				"processing": true,
				"serverSide": true,
				"order": [[ 0, "desc" ]],
				"ajax":{
					url :"ajaxformdata.php?action=termsconditionlist", // json datasource
					type: "post",  // method  , by default get
					error: function(){  // error handling
						$(".employee-grid-error").html("");
						$("#openTrigger > tbody").html('<tr><th colspan="3">No data found in the server</th></tr>');
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
{/literal}	
