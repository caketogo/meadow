{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<style type="text/css">
        .head
        {
            /* for IE */
            filter: alpha(opacity=50);
            /* CSS 3 standard */
            opacity: 0.5;
        }
        .seperator
        {
            border-right: 2px solid brown;
			
        }
    </style>

<script type="text/javascript">
</script>
{/literal}	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Edit Notes - {$Customer_full_name} </h1>
	</section>
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="create_date" id="create_date" value="{$NotesEditDetails[0].create_date}" />												
						<input type="hidden" name="notes_id" id="notes_id" value="{$NotesEditDetails[0].id}" />						
						<input type="hidden" name="created_by" id="created_by" value="{$NotesEditDetails[0].created_by}" />
						<input type="hidden" name="customer_id" id="customer_id" value="{$NotesEditDetails[0].customer_id}" />
						<div class="box-body">
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Add Comments (about the customer): </label>
								</div>	
								<div class="col-md-6">
									<textarea class="form-control" rows="8" id="customer_notes" name="customer_notes">{$NotesEditDetails[0].customer_notes}</textarea>
								</div>	
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.box -->
			</div>
			<!--/.col (left) -->
		</div>
		<!-- /.row -->
	</section>
	
</div>
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}

<script src="{$siteadmin_globalpath}js/res/json2.js" type="text/javascript"></script>
<script src="{$siteadmin_globalpath}js/condition-builder.js" type="text/javascript"></script>
{literal}
    <script type="text/javascript">
    </script>
{/literal}	