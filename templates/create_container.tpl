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
		<h1>Create Container </h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post" onsubmit="return checkValidation();">
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="user_type" id="user_type" value="admin" />
						<input type="hidden" name="container_type" id="container_type" value="manual_entry" />						
						<input type="hidden" name="file_type" id="file_type" value="" />
						<div class="box-body">
							


							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Container Number : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="container_name" id="container_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Container Type : </label>
								</div>	
								<!--<div class="col-md-12">
									<input type="text" name="category_name" id="category_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>-->
								
								<div class="col-md-12">
								<select name="category_name" id="category_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									<option value="0">Select your Container Type</option>
									<option value="10ft">10ft</option>
									<option value="20ft">20ft</option>
									<option value="40ft">40ft</option>									
								</select>
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
			var container_name = $('#container_name').val();
			var category_name = $('#category_name').val();			
			if(container_name ==0){
				alert('Please Enter the Container Number');
				return false;
			}
			if(category_name ==0){
				alert('Please Select the Container Type');
				return false;
			}
		}
		
    </script>
{/literal}	