{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function viewCustomerDetails(id){

	if(id > 0) {
	//loading('Processing');
		window.location.href = "view_customer.php?id="+id;
	}
}
function editCustomerDetails(id){

	if(id > 0) {
	//loading('Processing');
		window.location.href = "edit_customer.php?id="+id;
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

function DeleteCustomerDetails(Id) {
	
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
        	url: "ajaxformdata.php?action=deletecustomer&id="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
					$('#row'+Id).remove();
					window.location = "customer_list.php?msgcode=3";
				}
    }});
	  
    } else {
      return false;
    }
  } 
}

/*function downloadXls(id) {
loading('Processing');
$("#loadingview"+id).hide();
$("#loadingrec"+id).show();
document.location.href = "downloadrecpicent.php?id="+id;
setTimeout(function(){ $("#loadingview"+id).show(); $("#loadingrec"+id).hide(); }, 4000);
}*/
</script>
{/literal}
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	</section>

<section class="content">
	<div class="row" >
		<div class="col-md-12">
			<!--{if $update_msg neq ''}
			<div class="box box-primary">
					<span class="success_new">{$update_msg}</span>
			</div>
			{/if}-->
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
			
			   <form name="exportCSVCustomerForm" id="exportCSVCustomerForm" method="post">
					<input type="hidden" name="exporstCSVcus" id="exporstCSVcus" value="" />
				</form>	
				
			<form name="templatelist" id="templatelist" method="post" action="customer_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box box-primary">
					<div class="row" >
						<div class="col-md-12 ">
							<div class="col-md-6">
							<h2 class="box-title">Customer List</h2>
							</div>	
							<div class="col-md-4">
							<a  href="{$siteadmin_globalpath}create_customer.php" title="Create Customer" class="btn bg-primary btn-primary margin">
									Create Customer
							</a>
							
							<a  href="javascript:void(0);" onclick="exportCSVCustomerlist();" title="Download all" class="btn bg-primary btn-primary margin">
									Export as CSV
					         </a>
					 
							<!--<a class="new_admin_class" href="{$siteadmin_globalpath}create_customer.php" title="Create Customer"><i class="glyphicon glyphicon-plus" style="font-size:28px;color:green;"></i></a>-->
							</div>	
						</div>
					</div>
				
					<div class="box-body table-responsive">
						<table id="openTrigger" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th width="5%">View</th>
									<th width="10%">Name</th>
									<th width="25%">Surname</th>
									<th width="15%">Mobile Number</th>								
									<th width="15%">Container Number</th>																								
									<!--<th width="20%">Due Date</th>		-->														
									<th width="5%" style="text-align:center">Action</th>
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
      
    </script>
	
	<script type="text/javascript" language="javascript" >
	var dataTable
    $(document).ready(function() {
         dataTable = $('#openTrigger').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=customerlist", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html('<tr><th colspan="3">No data found in the server</th></tr>');
                    $("#openTrigger_processing").css("display","none");
 
                },
				
	
            }
        } );
    } );
	
	
	function exportCSVCustomerlist(){
		  $("#exporstCSVcus").val('yes');
		  $("#exportCSVCustomerForm").submit();
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
