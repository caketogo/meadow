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
		<h1>Edit License Period</h1>
		
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
						
						<input type="hidden" name="id" id="id"  value="{$LicensePeriodLength[0].id}"/>	
						<div class="box-body">
								<div class="form-group">
									<div class="col-md-12">
										<label for="exampleInputEmail1">License Period Length(days): </label>
									</div>	
									<div class="col-md-12">
									<input type="text" name="period_length_date" id="period_length_date" class="form-control" value="{$LicensePeriodLength[0].period_length_date}" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
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