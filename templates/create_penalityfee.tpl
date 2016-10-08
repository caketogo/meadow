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
		<h1>Create Penality Fees</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post" onsubmit="return checkValidation();">
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="file_type" id="file_type" value="" />
						<div class="box-body">
								
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Number of Days overdue : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="days_overdue" id="days_overdue" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Penality Fee Amount : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="penality_fee" id="penality_fee" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>	
							
							
							
									
						</div>
							
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
							<!--<input type="submit" name="submit" id="submit-form" value="Submit"  /> -->
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
			
		
		function checkValidation(){
			
			var days_overdue = $('#days_overdue').val();
			var penality_fee = $('#penality_fee').val();			
			if(days_overdue ==0){
				alert('Please Enter the Days Overdue');
				$('#days_overdue').focus();
				return false;
			}
			if(penality_fee ==0){
				alert('Please Select the Penality Fee');
				$('#penality_fee').focus();				
				return false;
			}
		}
		
    </script>
{/literal}	