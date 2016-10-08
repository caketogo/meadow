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
	
	   $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=deleteNotes&id="+Id,
        	success:function(){
				var anSelected = dataTable.$('#row'+Id);
				if ( anSelected.length !== 0 ) {
				$('#row'+Id).remove();
					window.location = "notes_list.php?msgcode=3";
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
	</section>

<section class="content">
		
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
		
		         <form name="exportCSVexpenseForm" id="exportCSVexpenseForm" method="post">
					  <input type="hidden" name="exporstCSVexp" id="exporstCSVexp" value="" />
				</form>	
				
			<form name="templatelist" id="templatelist" method="post" action="">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="triggerid" id="triggerid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<input type="hidden" name="siteadmin_globalpath" id="siteadmin_globalpath" value="{$siteadmin_globalpath}"/>
				
				<div class="box box-primary">
					
					<div class="row" >
						<div class="col-md-12 ">
								<div class="col-md-6">
									<h2 class="box-title">Removals Management</h2>
								</div>	
								<div class="col-md-4">
									
									<a  href="{$siteadmin_globalpath}create_removals.php" title="Add Job" class="btn bg-primary btn-primary margin">
											Add Job
									</a>

									<a  href="javascript:void(0);" onclick="exportCSVRemovals();" title="Download all" class="btn bg-primary btn-primary margin">
									     Export as CSV
					                </a>
							 
								</div>	
							
						</div>
					</div>
						

				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="10%">Job date</th>
								<th width="25%">Description</th>								
								<th width="15%">Payment Method</th>
								<th width="20%">Amount Excluding VAT</th>
								<th width="10%">VAT</th>																								
								<th width="20%">Amount including VAT</th>																																
								<!--<th width="10%">Attachments</th>
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

{include file="includes/footer.tpl"}

{literal}
    <script type="text/javascript">
	
	
	
      function gotoNotessection(){
			//alert(pagename);
			document.getElementById('customer_page').submit();
			
		} 
    </script>
	
	<script type="text/javascript" language="javascript" >
	
/*	function viewmodel(imgsrc){
		var myLink = imgsrc.getAttribute('title');
		//alert(this.title);
		imgsrc.wrap('<a href="' + myLink + '" download />')
	}*/
		
		
		
	var dataTable
	//function viewmodel(imgsrc){
//			$(function(){
//				var $this = $(this);	
//				$this.wrap('<a href="' + imgsrc + '" download />')	
//			});	
//			alert(imgsrc);
//			var siteadmin_globalpath = $("#siteadmin_globalpath").val();
//			var final_imgsrc = siteadmin_globalpath + "uploads/expenses/" + imgsrc;
//			$('#imagepreview').attr('src', final_imgsrc); // here asign the image to the modal when the user click the enlarge link
//			$('#myModal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
//	}

	$(document).on('click', 'img.downloadable', function(e) { 
		var $this = $(this);
		$this.wrap('<a href="' + $this.attr('title') + '" download />')
	});
	
    $(document).ready(function() {
	
	
         dataTable = $('#openTrigger').DataTable( {
            "processing": true,
            "serverSide": true,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=removalslist", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".employee-grid-error").html("");
                    $("#openTrigger > tbody").html('<tr><th colspan="3">No data found in the server</th></tr>');
                    $("#openTrigger_processing").css("display","none");
 
                },
				
	
            }
        } );
    } );
	
	function exportCSVRemovals(){
		  $("#exporstCSVexp").val('yes');
		  $("#exportCSVexpenseForm").submit();
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
	.modal-dialog {
		margin: 30px auto;
		width: 40%;
	}
	</style>
{/literal}	
