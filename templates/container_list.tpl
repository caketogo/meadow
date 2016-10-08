{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">

function checkAll(val1){}

function editContainerDetails(id){

	if(id > 0) {
	//loading('Processing');
		window.location.href = "edit_container.php?id="+id;
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

function DeleteContainerDetails(Id) {
	
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
        	url: "ajaxformdata.php?action=deletecontainer&id="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
					$('#row'+Id).remove();
					window.location = "container_list.php?msgcode=3";
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
			
			   <form name="exportCSVContainerForm" id="exportCSVContainerForm" method="post">
					<input type="hidden" name="exporstCSVcon" id="exporstCSVcon" value="" />
				</form>	
				
			<form name="templatelist" id="templatelist" method="post" action="container_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
					<div class="row" >
				
					<div class="col-md-12 ">
						<div class="col-md-6">
						<h2 class="box-title">Container List</h2>
						</div>	
						<div class="col-md-6">
						
						<a  href="{$siteadmin_globalpath}create_container.php" title="Create Manual Container"  class="btn bg-primary btn-primary margin">
									Add a Container	
						</a>
						<a  href="{$siteadmin_globalpath}import_container.php" title="Import CSV Container"  class="btn bg-primary btn-primary margin">
									Import Containers
						</a>
						
						<a  href="javascript:void(0);" onclick="exportCSVContainerlist();" title="Download all" class="btn bg-primary btn-primary margin">
									Export as CSV
						</a>
						
						<!--<a class="new_admin_class" href="{$siteadmin_globalpath}create_container.php" title="Create Manual Container"><i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i></a>
						<a class="new_admin_class" href="{$siteadmin_globalpath}import_container.php" title="Import CSV Container"><i class="glyphicon glyphicon-import" style="font-size:28px;color:green;"></i></a>-->
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
								<th width="5%">
									<div class="checkbox">
										<!--<label class="btn btn-block btn-primary">&nbsp; <input type="checkbox" name="selectall" id="selectall"  onclick="checkAll(this.checked)"/>&nbsp; Select All</label>-->
										<label class="btn btn-block btn-primary">&nbsp; <input type="checkbox" name="selectall" id="selectall" />&nbsp; Select All</label>	
														
									</div>
								</th>
								
								<th width="5%">
									<div class="checkbox">
										<label class="btn btn-block btn-primary">&nbsp; <input type="checkbox" name="deleteall" id="deleteall" />&nbsp; Delete</label>				
									</div>
								</th>
							</tr>
							<tr>
								<th class="no-sort" width="1%">&nbsp;</th>
								<th class="no-sort" width="5%">Name</th>
								<th class="no-sort" width="15%">Container Category</th>
								
								<th class="no-sort" width="8%">First Name</th>
								<th class="no-sort" width="8%">Surname</th>
								<th class="no-sort" width="8%">Mobile Number</th>
								<th class="no-sort" width="15%">Next Due Date</th>
								<th class="no-sort" width="15%">Days Overdue</th>								
								
								<th class="no-sort" width="5%">Status</th>								
								<th class="no-sort" width="10%">Create Date</th>																
								<th class="no-sort" width="5%" style="text-align:center">Action</th>
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
	
	function validate_selete()
		{
/*		var count_checked = checkValues.length;
		alert(count_checked);
		if(count_checked !=''){
			$('input[name=checkboxlist]').attr("checked=checked");
			alert('Total No of boxes '+ count_checked);
				var result=confirm('Are you sure want to delete?');
				if(result) {	
					$.ajax({
						url: "ajaxformdata.php?action=delecteMultiplecontainerlist",
						type: 'post',
						data: { ids: checkValues },
						success:function(data){
							console.log(data);
							window.location.href = "container_list.php?msgcode=3";
						}
					});
				}	
			
		}else{
			alert('Please select any checkboxes');
		}
*/				
		/*var chks = document.getElementsByName("checkbox[]");
		var hasChecked = false;
		for (var i = 0; i < chks.length; i++)
		{
		if (chks[i].checked)
		{
		hasChecked = true;
		if(msg == false) {
		return false;
		}
		break;
		}
		}
		if (hasChecked == false)
		{
		alert("Please select at least one.");
		return false;
		}
		return true;*/
	}


		/*----------------------------------- */
		$(document).ready(function() {
			$('#selectall').click(function(){
		 		
			if(this.checked) { // check select status
				$('input[name=checkboxlist]').each(function() { //loop through each checkbox
					  this.checked = true;  //select all checkboxes with class "checkbox1"              
				});
				}else{
				$('input[name=checkboxlist]').each(function() { //loop through each checkbox
						 this.checked = false; //deselect all checkboxes with class "checkbox1"                      
				});        
				}
        });
		
		
				/*var count_checked = checkValues.length;
				if(count_checked !=''){
					$('input[name=checkboxlist]').attr("checked=checked");
					alert('Total No of boxes '+ count_checked);
						var result=confirm('Are you sure want to delete?');
						if(result) {	
							$.ajax({
								url: "ajaxformdata.php?action=delecteMultiplecontainerlist",
								type: 'post',
								data: { ids: checkValues },
								success:function(data){
									console.log(data);
									window.location.href = "container_list.php?msgcode=3";
								}
							});
						}	
					
				}else{
					alert('Please select any checkboxes');
				}*/
				
			
		});	
		/*-------------------------------------*/



		var dataTable
		$(document).ready(function() {
		
		 	$('#deleteall').click(function(){
				var checkValues = $('input[name=checkboxlist]:checked').map(function()
				{
					//alert($(this).val());
					return $(this).val();
				}).get();
				
				var count_checked = checkValues.length;
				if(count_checked !=''){
					//alert('Total No of boxes '+ count_checked);
					var result=confirm('Are you sure want to delete?');
				    if(result) {	
						$.ajax({
							url: "ajaxformdata.php?action=delecteMultiplecontainerlist",
							type: 'post',
							data: { ids: checkValues },
							success:function(data){
								//console.log(data);
								window.location.href = "container_list.php?msgcode=3";
							}
						});
					}	
					
				}else{
					alert('Please select any checkboxes');
				}
				
				
				
			});
			
			//$('#openTrigger_wrapper').prepand('<button type="button" class="btn btn-block btn-primary">Dancer saran</button>>');
			//$( "#openTrigger_wrapper" ).insertBefore( '<button type="button" class="btn btn-block btn-primary">Dancer saran</button>>' );
		
		
			 dataTable = $('#openTrigger').DataTable( {
				"processing": true,
				"serverSide": true,
				"order": [[ 0, "desc" ]],
				"ajax":{
					url :"ajaxformdata.php?action=containerlist", // json datasource
					type: "post",  // method  , by default get
					error: function(){  // error handling
						$(".employee-grid-error").html("");
						$("#openTrigger > tbody").html('<tr><th colspan="3">No data found in the server</th></tr>');
						$("#openTrigger_processing").css("display","none");
					},
				}
			});
		});
		
	
		function exportCSVContainerlist(){
			$("#exporstCSVcon").val('yes');
			$("#exportCSVContainerForm").submit();
		}
		
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
