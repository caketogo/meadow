{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Settings</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Field :</label>
								<input type="text" class="form-control" name="txt_field" id="txt_field" placeholder="Field" value="" required/>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Value :</label>
								<input type="text" class="form-control" name="txt_value" id="txt_value" placeholder="Value" value="" required/>
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