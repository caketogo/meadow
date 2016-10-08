{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<!--<link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">-->
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

		.add_more img{
			cursor:pointer;
		}
		
		.pad {
			border: 1px solid;
			padding: 10px;
		}
		.clearButton {
			list-style: outside none none;
		}
		.clearButton a{
			color: red !important;
			cursor: pointer;
			float: right;
			margin-right: 10%;
		}
		
		.pound-symbol {
			display:none;
			font-size: 24px;
			font-weight: bold;
			left: 40px;
			position: relative;
		}
    </style>

<script type="text/javascript">
</script>
{/literal}	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Assign a Container - {$Customer_full_name}</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
		<form name="frmsettings" id="frmsettings" role="form" method="post"  onsubmit="return checkUpload();">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="user_type" id="user_type" value="admin" />						
						
						<div class="box-body">	
					<!-- /.box-header -->
					
									<div class="form-group">
										<a href="{$siteadmin_globalpath}payment_history.php?customer_id={$current_customer_id}" class="btn bg-primary btn-primary margin" type="button">Back to Payment History</a>
										
										<div class="col-md-12">
												<div class="col-md-12">
													<h1>Assign Container</h1>
												</div>	
										</div>			
									</div>	  

									<div class="col-md-12">
											<br />
										<span id="lblError2" style="color: red; padding-top: 10px;"></span>
									</div>
												
									<div class="form-group field_wrapper">	
									
									<div id="new_container_content_0" class="new_container_content_class"> <!-- Parent div 0 Start -->
										<div class="col-md-12" >		
											<div class="col-md-4">
												<label for="exampleInputEmail1">Select Container Type: </label>
											</div>	
											<div class="col-md-6">
												<select name="container_name[]" id="container_name" class="form-control container_type_customer" onchange="getActiveContainers(this.value, '0');" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
														<option value="0">Select Container Type</option>
														<option value="10ft">10ft</option>
														<option value="20ft">20ft</option>
														<option value="40ft">40ft</option>									
													</select>
											</div>
											
											
											<!--<div class="col-md-2">
												 <span class="add_more"> <img class="add_cont_category" src="images/plus.png" /></span>
											</div>-->
											
											<div class="col-md-4">
													<label for="exampleInputEmail1">Select Container Number: </label>
											</div>	
											<div class="col-md-6">
												<select name="container_number[]" id="container_number" class="form-control container_number_customer" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
														<option value="0">Select Container Number</option>
													</select>
											</div>
											
											<div class="col-md-4">
													<label for="exampleInputEmail1">Contract start date : </label>
												</div>	
											<div class="col-md-6">
												<input type="text" name="contract_start_date[]" id="contract_start_date" class="form-control contract_start_date" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
											</div>
											
											
										</div>	
										
										<div class="col-md-12">
												<div class="col-md-12">
													<label for="exampleInputEmail1"><h2><a class="btn btn-block btn-primary">Payment Details</a></h2></label>
												</div>											
												
												<div class="col-md-4">
													<label for="exampleInputEmail1">Licence Fee (Incl VAT): </label>
													<span class="pound-symbol">  &pound; </span>	
												</div>	
												
												<div class="col-md-6">
													 <input type="text" name="licence_vat_amount[]" readonly="" id="licence_vat_amount" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
												</div>
												
												<div class="col-md-4">
													<label for="exampleInputEmail1">Deposit Fee: </label>
												</div>	
												
												<div class="col-md-6">
												 <input type="text" name="deposit_amount[]" readonly="" id="deposit_amount" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
												</div>
												
												<div class="col-md-4">
													<label for="exampleInputEmail1">Miscellaneous: </label>
												</div>	
												
												<div class="col-md-6">
												 <input type="text" name="miscellaneous[]" id="miscellaneous" value="0" onblur="allownumericwithoutdecimal(this.value, '0')" class="form-control payment_miscellaneous" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
												</div>
												
												<div class="col-md-4">
													<label for="exampleInputEmail1">Total Payment Due: </label>
												</div>	
												
												<div class="col-md-6">
												 <input type="text" name="total_payment_due[]" readonly="" id="total_payment_due" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
												</div>
												
											</div>	
										</div>	<!-- Parent div 0 End -->

									</div>			
									
							
									<div class="form-group">
										<!--<div class="col-md-12 col-md-offset-3">
												<label for="exampleInputEmail1"><h2><button type="button" class="btn btn-block btn-primary">Print and Continue</button></h2></label>
										</div>-->
											<div class="col-md-12">
												<label for="exampleInputEmail1">&nbsp;</label>
											</div>	

											<div class="col-md-6">
												<button class="btn btn-primary btn-block btn-flat">Print Receipt</button>
											</div>

											<div class="col-md-6">
												<button type="submit" class="btn btn-primary btn-block btn-flat">Assign Container</button>
											</div>
											
<!--											<div class="col-md-8 col-md-offset-2">
												<button type="submit" class="btn btn-primary btn-block btn-flat">Print and Continue</button>
											</div>
-->											<div class="col-md-12">
												<label for="exampleInputEmail1">&nbsp;</label>
											</div>	
									</div>
						</div>
				</div>
				<!-- /.box -->
			</div>
			<!--/.col (left) -->
			
			</form>
			
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

		function getActiveContainers(containerCategory, contentDiv_id){
			if(containerCategory !=0 || containerCategory !=''){
				$.ajax({
					type: "POST",
					dataType: "json",
					url: "ajaxformdata.php?action=getcontainerCategory&containerCategoryType="+containerCategory,
						success:function(data){
							$('#new_container_content_'+ contentDiv_id +' select#container_number').html(data.optioin_value);
							$('#new_container_content_'+ contentDiv_id +' #deposit_amount').val(data.deposit_amount);
							$('#new_container_content_'+ contentDiv_id +' #licence_vat_amount').val(data.licence_amount_vat);
							
							var deposit_amount = (isNaN(parseInt(data.deposit_amount))) ? 0 : parseInt(data.deposit_amount);
							var licence_amount_vat = (isNaN(parseInt(data.licence_amount_vat))) ? 0 : parseInt(data.licence_amount_vat);
							//input3.val(deposit_amount + licence_amount_vat);
							var total_due_amount = deposit_amount + licence_amount_vat;
							
							$('#new_container_content_'+ contentDiv_id +' #total_payment_due').val(total_due_amount);
						}
				});	
			}	
		}
			// Get the ACtive container list End			
		
		function allownumericwithoutdecimal(val, id){
			var licence_vat_amount = $("#new_container_content_"+ id +" #licence_vat_amount").val();				
			var deposit_amount = $("#new_container_content_"+ id +" #deposit_amount").val();				
			
			if(licence_vat_amount !='' && deposit_amount !=''){
				var miscellaneous_amount = parseInt(licence_vat_amount) + parseInt(deposit_amount) + parseInt(val);
				$("#new_container_content_"+ id +" #total_payment_due").val(miscellaneous_amount);
			}	
		 }
		  
			
		$(document).ready(function () {
			initdatepicker();
        });
	
		function initdatepicker(){
			var currentDate = $( ".contract_start_date" ).datepicker( "setDate", new Date() );
		}	
		
		function checkUpload(){
		
			var container_type_customer = $( "select.container_type_customer" ).val();
			var $this = $( "select.container_type_customer" );
					
			if(container_type_customer =="0" ){
				$this.css('border', '1px solid red');
				alert('Please select the container type');
				$this.focus();
				return false;
			}else{
				$this.css('border', '1px solid #d2d6de');			
			}
			
			var container_number_customer = $( "select.container_number_customer" ).val();
			var $this1 = $( "select.container_number_customer" );
			if(container_number_customer =="0" || container_number_customer =="" || container_number_customer == null){
				$this1.css('border', '1px solid red');
				alert('Please select the container number');				
				$this1.focus();
				return false;
			}else{
				$this.css('border', '1px solid #d2d6de');			
			}
			
			
			var contract_start_date = $( "input.contract_start_date" ).val();
			var $this2 = $( "input.contract_start_date" );
					
			if(contract_start_date =="0" ){
				$this2.css('border', '1px solid red');
				alert('Please select the Contract date');				
				$this2.focus();
				return false;
			}else{
				$this.css('border', '1px solid #d2d6de');			
			}
			
			var payment_miscellaneous = $( "input.payment_miscellaneous" ).val();
			var $this3 = $( "input.payment_miscellaneous" );
					
			if(payment_miscellaneous =="" ){
				$this3.css('border', '1px solid red');
				$this3.focus();
				return false;
			}else{
				$this.css('border', '1px solid #d2d6de');			
			}
			
			
			/* $( "select.container_type_customer" ).each(function( index ) {
				 if($(this).val() =="0" )
				 {
				 	$(this).css('border', '1px solid red');
					$(this).focus();
					return false;
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });
			  
			 
			 $( "select.container_number_customer" ).each(function( index ) {
			 	
				 if($(this).val() =="0" || $(this).val() == null)
				 {
				 	alert('Please select the Container Number');
				 	$(this).css('border', '1px solid red');
					$(this).focus();
					return false;
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  }); 
			
			 $( "input.contract_start_date" ).each(function( index ) {

				 if($(this).val() =="" )
				 {
				 	$(this).css('border', '1px solid red');
				 	//alert('Please fill the required information.');
					$(this).focus();
					return false;
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });*/
		
			
			
			/* $( "input.payment_miscellaneous" ).each(function( index ) {
				 if($(this).val() =="" )
				 {
				 	$(this).css('border', '1px solid red');
				 	//alert('Please fill the required information.');
					$(this).focus();
					return false;
				 }else{
				 	alert('11');
				 	//return true;
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });*/
			
			//document.getElementById("frmsettings").submit();// Form submission
			//return false;
		}
    </script>
	<script src="signature/assets/json2.min.js"></script>
{/literal}	