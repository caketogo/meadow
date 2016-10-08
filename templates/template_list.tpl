{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function editTemplateDetails(template_id){
	loading('Processing');
	if(template_id > 0) {
		window.location.href = "edittemplate.php?template_id="+template_id;
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
        	url: "ajaxformdata.php?action=tempstatus&id="+id+"&status="+status,
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

function DeleteTemplateDetails(Id) {
	
  document.getElementById('hdAction').value = 2;
  document.getElementById('templid').value = Id;
  
  if(Id > 0) {
    var result=confirm('Are you sure want to delete?');
    if(result) {
	//loading('Processing');
	$("#delb"+Id).hide();
	$("#loadingdel"+Id).show();
	
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deletetemplate&templid="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
				$('#row'+Id).remove();
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
		<h1>Email Template List <small>list of template in sendgrid</small></h1>
		<ol class="breadcrumb">
			<li><a href="{$siteadmin_globalpath}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data tables</li>
		</ol>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form name="templatelist" id="templatelist" method="post" action="template_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="templid" id="templid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				
				<div class="box">
				 <div class="box-header">
                  <h3 class="box-title">Template List</h3>
                </div>
				<div class="box-body table-responsive">
					<table class="table table-striped table-bordered" id="openTemplate">
						<thead>
							<tr>
								<th width="16%">Title</th>
								<th width="28%">Send Grid Email Template Id</th>
								<th width="14%">Schedule</th>
								<th width="28%">Triggers</th>
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th width="16%">Title</th>
								<th width="28%">Send Grid Email Template Id</th>
								<th width="14%">Schedule</th>
								<th width="28%">Triggers</th>
								<th style="text-align:center">Action</th>
							</tr>
						</tfoot>
						
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
         dataTable = $('#openTemplate').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 4, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=templatelist", // json datasource
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
	</style>
{/literal}	