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

 function mapfields() {
 	//alert('mapfields');
 	/*var id = $('#field1').val();
	loading('Processing');
	$("#loadingimg").show();
	$(".query").html('');
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace('class="col', 'onchange="selectvalue(this)" class="col');
			$("#loadingimg").hide();
			$(".query").html('');
			rootflag=0;
			addqueryroot('.query', true);
			$.fancybox.close();
    }});*/
 }
 
  function mappingtemplate(thisselect) {
  	//alert('mappingtemplate'+ thisselect);
 	/*var sh = $('option:selected', thisselect).attr('data-sh');
	var sid = $('option:selected', thisselect).attr('data-sid');
	var sf = $('option:selected', thisselect).attr('data-sf');
	var tid = $('option:selected', thisselect).attr('data-id');
	$("#sh").html(sh);
	$("#sf").html(sf);
	$("#tsh").val(sh);
	$("#tsid").val(sid);
	$("#tsf").val(sf);
	$("#tid").val(tid);*/
	

	
 }	 
</script>
{/literal}	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Container prices </h1>
		
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

						<div class="box-body">
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Container Category : </label>
								</div>	
								
								<div class="col-md-12">
								<select name="category_name" id="category_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									<option value="0">Select your Container Type</option>
									<option value="10ft">10ft</option>
									<option value="20ft">20ft</option>
									<option value="40ft">40ft</option>									
								</select>
							</div>	
									
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Deposit Amount: </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="deposit_amount" id="deposit_amount" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Licence Amount: (excl VAT)</label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="licence_amount" id="licence_amount" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">VAT Amount: </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="vat_amount" id="vat_amount" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Licence Amount:  (Incl VAT)</label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="licence_amount_vat" id="licence_amount_vat" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
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
			//var container_name = $('#container_name').val();
			var category_name = $('#category_name').val();			
			
			var deposit_amount 		= $('#deposit_amount').val();
			var licence_amount 		= $('#licence_amount').val();			
			var vat_amount 			= $('#vat_amount').val();						
			var licence_amount_vat 	= $('#licence_amount_vat').val();									
						
			if(category_name ==0){
				alert('Please Enter the Container Number');
				return false;
			}
			if(deposit_amount ==0){
				alert('Please Select the Deposit Amount');
				return false;
			}
			
			if(licence_amount ==0){
				alert('Please Select the Licence Amount');
				return false;
			}
			
			if(vat_amount ==0){
				alert('Please Select the VAT Amount');
				return false;
			}
			
			if(licence_amount_vat ==0){
				alert('Please Select the Licence VAT Amount');
				return false;
			}
			
			
		}
		
    </script>
{/literal}	