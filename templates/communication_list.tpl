{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function editNotesDetails(id){
	//alert('Processing on this section..will get back to you soon.'+id);
	//return false;
	if(id > 0) {
	//loading('Processing');
		window.location.href = "edit_notes.php?id="+id;
	}
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

function DeleteNotesDetails(Id) {
	
  document.getElementById('hdAction').value = 2;
  document.getElementById('triggerid').value = Id;
 
  if(Id > 0) {
    var result=confirm('Are you sure want to delete?');
    if(result) {
	//loading('Processing');
	$("#delb"+Id).hide();
	$("#loadingdel"+Id).show();
	var current_customer_id = $("#current_customer_id").val();
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deleteNotes&id="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
				$('#row'+Id).remove();
					window.location = "notes_list.php?msgcode=3&customer_id="+current_customer_id;
					//&current_customer_id="+current_customer_id,
				}
    }});
	  
    } else {
      return false;
    }
  } 
}

</script>
{/literal}
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>View Customer - {$Customer_full_name} </h1>
	</section>
<section class="content">

		<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('customer_details');">Customer Details</button>
				<button type="button" class="btn bg-navy btn-navy margin" onclick="customer_tab_form_section('payment_history');">Payment History</button>
				<button type="button" class="btn bg-primary btn-primary margin active">Communication</button>
				<button type="button" class="btn bg-navy btn-primary margin" onclick="customer_tab_form_section('notes');">Notes</button>													

			</div>	
		</div>	
		<form name="customer_tab_form" id="customer_tab_form" role="form" action="" method="post">
			<input type="hidden" name="hdaction" id="hdaction" value="5" />
			<input type="hidden" name="page_type" id="page_type" value="notes" />						
			<input type="hidden" name="current_user_id" id="current_user_id" value="{$current_user_id}"  /> 
			<input type="hidden" name="current_customer_id" id="current_customer_id" value="{$current_customer_id}"  /> 			
			
		</form>
		
	<div class="row" >
		<div class="col-md-12">
			{if $update_msg neq ''}
				{if $msgcode eq '3'}
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
				{else}	
					<div class="box box-primary">
							<span class="success_new">{$update_msg}</span>
					</div>
				{/if}		
			{/if}
		
			<form name="templatelist" id="templatelist" method="post" action="">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
					
					<div class="row" >
				
					<div class="col-md-12 ">
						<div class="col-md-6">
						<h2 class="box-title">Communication History</h2>
						</div>	
						<div class="col-md-4">
						<!--<a class="new_admin_class" href="{$siteadmin_globalpath}create_notes.php?customer_id={$current_customer_id}" title="Create Container Price"><i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i></a>-->
						</div>	
						</div>
					</div>
						

				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="13%">Date sent</th>
								<th width="23%">Message</th>								
								<!--<th width="13%">Created By</th>
								<th width="2%" style="text-align:center">Action</th>-->
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
    <script type="text/javascript">
	
		function customer_tab_form_section(action_type){
			
			var customer_id = document.getElementById("current_customer_id").value;
			
			if(action_type == 'customer_details'){
				document.getElementById("customer_tab_form").action = "view_customer.php?id=" + customer_id + "";	
			}else if(action_type == 'notes'){
				document.getElementById("customer_tab_form").action = "notes_list.php?customer_id=" + customer_id + "";	
			}else if(action_type == 'payment_history'){
				document.getElementById("customer_tab_form").action = "payment_history.php?customer_id=" + customer_id + "";	
			}else if(action_type == 'communication_history'){
				document.getElementById("customer_tab_form").action = "communication_list.php?customer_id=" + customer_id + "";	
			}
			
			document.getElementById('customer_tab_form').submit();
			
		} 
	
/*		function gotoNotessection(){
		//alert(pagename);
		document.getElementById('customer_page').submit();
		
		} 
*/    </script>
	
	<script type="text/javascript" language="javascript" >
	var dataTable
    $(document).ready(function() {
		var current_customer_id = $("#current_customer_id").val();
         dataTable = $('#openTrigger').DataTable( {
            "processing": true,
			"searching": false,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=customercummunicationlist&current_customer_id="+current_customer_id, // json datasource
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
