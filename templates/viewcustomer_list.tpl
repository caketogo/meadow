{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}

{/literal}
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>View Notes List</h1>
	</section>
<section class="content">

				<div class="box-body table-responsive">
				
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="20%">Customer_notes</th>
								<th width="20%">Create_date</th>
							</tr>

						</thead>
					</table>
				</div>
</section>
</div>
{include file="includes/footer.tpl"}

{literal}
   	<script type="text/javascript" language="javascript" >
	var dataTable;
    $(document).ready(function() {
         dataTable = $('#openTrigger').DataTable( {
            "processing": true,
            "serverSide": true,
			"searching": false,
			"bLengthChange": false,
			"order": [[ 0, "desc" ]],
            "ajax":{
                url :"ajaxformdata.php?action=ViewCustomerlist", // json datasource
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
