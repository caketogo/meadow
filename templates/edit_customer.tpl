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
    </style>

<script type="text/javascript">
</script>
{/literal}	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Edit Customer</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
		<form name="frmsettings" action="" id="frmsettings" role="form" method="post" enctype="multipart/form-data" onsubmit="return checkUpload();">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="user_type" id="user_type" value="admin" />						
						
						<input type="hidden" name="address_proof_file_type" id="address_proof_file_type" value="" />
						<input type="hidden" name="id_proof_file_type" id="id_proof_file_type" value="" />
						
						
						<div class="box-body">
						
							<div class="form-group col-lg-6">
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<label for="exampleInputEmail1">First name : </label>
								</div>	
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<input type="text" name="first_name" id="first_name" class="form-control" value="{$CustomerDetails[0].first_name}"  style='overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
							<div class="form-group col-lg-6">
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<label for="exampleInputEmail1">Surname : </label>
								</div>	
								<div class="col-lg-12 col-md-12" style="padding-left:0px; padding-right:0px;">
									<input type="text" name="sur_name" id="sur_name" class="form-control" value="{$CustomerDetails[0].sur_name}"  style='overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
						
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Address Line 1 : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="address_line1" id="address_line1" value="{$CustomerDetails[0].address1}"  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
						
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Address Line 2 : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="address_line2" id="address_line2" value="{$CustomerDetails[0].address2}"  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Address Line 3 : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="address_line3" id="address_line3" value="{$CustomerDetails[0].address3}"  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
													
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Postcode : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="postcode" id="postcode" value="{$CustomerDetails[0].post_code}"  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">		
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" {if $CustomerDetails[0].invoice_status eq 'yes'} checked="checked" {/if} id="invoice_address"  value="{$CustomerDetails[0].post_code}" name="invoice_address">Invoice address different from above address :</label>
									</div>
								</div>
							</div>
							
							
							<div class="form-group" id="invoice_address_section" style="display:none">			
									<div class="col-md-12">
										<label for="exampleInputEmail1">Address Line 1 : </label>
									</div>	
									<div class="col-md-12">
										<input type="text" name="invoice_address_line1" id="invoice_address_line1"  value="{$CustomerDetails[0].invoice_address_line1}" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
									</div>	
									
									<div class="col-md-12">
										<label for="exampleInputEmail1">Address Line 2 : </label>
									</div>	
									<div class="col-md-12">
										<input type="text" name="invoice_address_line2" id="invoice_address_line2"  value="{$CustomerDetails[0].invoice_address_line2}" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
									</div>										
									
									<div class="col-md-12">
										<label for="exampleInputEmail1">Address Line 3 : </label>
									</div>	
									<div class="col-md-12">
										<input type="text" name="invoice_address_line3" id="invoice_address_line3"  value="{$CustomerDetails[0].invoice_address_line3}" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
									</div>		
									
									<div class="form-group">
										<div class="col-md-12">
											<label for="exampleInputEmail1">Postcode : </label>
										</div>	
										<div class="col-md-12">
											<input type="text" name="invoice_postcode" id="invoice_postcode"  value="{$CustomerDetails[0].invoice_postcode}" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
										</div>	
									</div>																	
							</div>
							
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Mobile number : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="mobile_number" id="mobile_number" value="{$CustomerDetails[0].mobile_number}"  class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Telephone Number : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="telephone_number" id="telephone_number" value="{$CustomerDetails[0].phone_number}" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
								</div>	
							</div>
							
							
							<div class="form-group">
										<div class="col-md-12">
										 	<h1>Attachments</h1>
										 </div>
										<div class="col-md-12" style="padding: 0;">
											<div class="col-md-12">
												<label for="exampleInputEmail1">Proof of Address: </label>
											</div>	
												
											<div class="col-md-12">
												<a href="javascript:void(0)" title="{$get_address_proof_res}">Passport Proof</a>
												<input type="file" name="addrss_proof" class="btn btn-default btn-file "  id="addrss_proof"  />
											</div>
												
											<div class="col-md-12">
												<br />
												<span id="lblError" style="color: red; padding-top: 10px;"></span>
											</div>
											
											<div class="col-md-12">
												<label for="exampleInputEmail1">Proof of ID: </label>
											</div>	

											<div class="col-md-12">											
												<div class="btn-group" data-toggle="buttons">
													  <label class="btn btn-primary {if $id_proof_type eq 'passport'} active {/if}">
														<input type="radio" name="options" id="option1" autocomplete="off" {if $id_proof_type eq 'passport'} checked="checked" {/if} > Passport
													  </label>
													  <label class="btn btn-primary {if $id_proof_type eq 'driving'} active {/if}">
														<input type="radio" name="options" id="option2" autocomplete="off" {if $id_proof_type eq 'driving'} checked="checked" {/if}> Drivers Licence
													  </label>
												</div>
											</div>	
													
											<div class="col-md-12">
												<br />
												<span id="lblError" style="color: red; padding-top: 10px;"></span>
											</div>
											
											<div class="col-md-12">
												<a href="javascript:void(0)" title="{$get_id_proof_res}">ID Proof</a>
												<input type="file" name="addrss_id" class="btn btn-default btn-file "  id="addrss_id"  />
											</div>
												
											<div class="col-md-12">
												<br />
												<span id="lblError2" style="color: red; padding-top: 10px;"></span>
											</div>
											
										</div>	
										
										
										
									</div>
							
						
							</div>
					<!--	<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>-->
				</div>
				<!-- /.box -->
			</div>
			<!--/.col (left) -->
			
			
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
				
				<div class="box-body">	
					<!-- /.box-header -->
					
									<div class="form-group">
										
										  <div class="col-md-12">
												<div class="col-md-12">
													<h1>Assigned Container (s)</h1>
												</div>	
										  </div>			
									</div>	  

									<div class="col-md-12">
											<br />
										<span id="lblError2" style="color: red; padding-top: 10px;"></span>
									</div>
												
									<div class="form-group field_wrapper">	
										{*$CustomerContainerdetails|@print_r*}
										{section name=cart start=0 loop=$CustomerContainerdetails}
											<div id="new_container_content_{$smarty.section.cart.index}" class="new_container_content_class"> <!-- Parent div 0 Start -->
												<div class="col-md-12" >		
													<div class="col-md-4">
														<label for="exampleInputEmail1">Select Container Type: </label>
													</div>	
													<div class="col-md-6">
														<select name="container_name[]" id="container_name" class="form-control container_type_customer" onchange="getActiveContainers(this.value, '0');" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
																<option value="0">Select Container Type</option>
																<option value="10ft" {if $CustomerContainerdetails[cart].container_type eq '10ft'} selected="selected"{/if}>10ft</option>
																<option value="20ft" {if $CustomerContainerdetails[cart].container_type eq '20ft'} selected="selected" {/if}>20ft</option>
																<option value="40ft" {if $CustomerContainerdetails[cart].container_type eq '40ft'} selected="selected" {/if}>40ft</option>									
															</select>
													</div>
													
													{if $smarty.section.cart.index eq 0}
														<div class="col-md-2">
														 <span class="add_more"> <img class="add_cont_category" src="images/plus.png" /></span>
														</div>
													{/if}	
													
													
													
													<div class="col-md-4">
															<label for="exampleInputEmail1">Select Container Number: </label>
													</div>	
													<div class="col-md-6">
														<select name="container_number[]" id="container_number" class="form-control container_number_customer" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
																<option value="0">Select Container Number</option>
																<option value="{$CustomerContainerdetails[cart].container_number}" selected="selected" >{$CustomerContainerdetails[cart].container_number}</option>
															</select>
													</div>
													
													<div class="col-md-4">
															<label for="exampleInputEmail1">Contract start date : </label>
														</div>	
													<div class="col-md-6">
														<input type="text" name="contract_start_date[]" id="contract_start_date" value="{$CustomerContainerdetails[0].contract_start_date}" class="form-control contract_start_date" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'  />
													</div>
													
													
												</div>	
												
												<div class="col-md-12">
														<div class="col-md-12">
															<label for="exampleInputEmail1"><h2><a class="btn btn-block btn-primary">Payment Details</a></h2></label>
														</div>											
														
														<div class="col-md-4">
															<label for="exampleInputEmail1">Licence Fee (Incl VAT): </label>
														</div>	
														
														<div class="col-md-6">
															 <input type="text" name="licence_vat_amount[]" readonly="" value="{$CustomerContainerdetails[0].licence_amount_vat}" id="licence_vat_amount" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
														</div>
														
														<div class="col-md-4">
															<label for="exampleInputEmail1">Deposit Fee: </label>
														</div>	
														
														<div class="col-md-6">
														 <input type="text" name="deposit_amount[]" readonly="" value="{$CustomerContainerdetails[0].deposit_amount}" id="deposit_amount" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
														</div>
														
														<div class="col-md-4">
															<label for="exampleInputEmail1">Miscellaneous: </label>
														</div>	
														
														<div class="col-md-6">
														 <input type="text" name="miscellaneous[]" id="miscellaneous" value="{$CustomerContainerdetails[0].miscellaneous}" onblur="allownumericwithoutdecimal(this.value, '0')" class="form-control payment_miscellaneous" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
														</div>
														
														<div class="col-md-4">
															<label for="exampleInputEmail1">Total Payment Due: </label>
														</div>	
														
														<div class="col-md-6">
														 <input type="text" name="total_payment_due[]" readonly="" value="{$CustomerContainerdetails[0].total_payment_due}" id="total_payment_due" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
														</div>
														
													</div>	
												</div>	<!-- Parent div 0 End -->
												<div class="col-md-12"><div class="col-md-12"><hr></div></div>
											{/section}	
									</div>			
									
											
									<div class="form-group field_wrapper_user">			
									
										{section name=author start=0 loop=$CustomerAuthordetails}
											<div class="col-md-12" id="new_author_user_content_{$smarty.section.author.index}">
												<div class="col-md-12">
													<label for="exampleInputEmail1"><h2><a class="btn btn-block btn-primary">Authorized User</a></h2></label>
												</div>											
												
												<div class="col-md-4">
													<label for="exampleInputEmail1">Name: </label>
												</div>	
												
												<div class="col-md-6">
													 <input type="text" name="author_user_name" id="author_user_name" value="{$CustomerAuthordetails[0].authorized_user_name}" class="form-control author_user_name_input" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
												</div>
												
												<div class="col-md-4">
													<label for="exampleInputEmail1">Mobile Number: </label>
												</div>	
												
												<div class="col-md-6">
													 <input type="text" name="author_user_mobile" id="author_user_mobile" value="{$CustomerAuthordetails[0].authorized_user_mobile_number}" class="form-control author_user_mobile_input"  style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
												</div>
												
												{if $smarty.section.author.index eq 0}
													<div class="col-md-2">
													 <span class="add_more"> <img class="add_author_user_category" src="images/plus.png" /></span>
													</div>
												{/if}	
											
											</div>	
											<div class="col-md-12"><div class="col-md-12"><hr></div></div>
										{/section}	
									</div>
									
							
									<div class="form-group" style="display:none">
										
											<div class="col-md-12">
												<div class="col-md-12 col-md-offset-3">
													<label for="exampleInputEmail1"><h2><button type="button" class="btn btn-block btn-primary">View Terms and Conditions</button></h2></label>
												</div>											
											</div>
									</div>
					
												
									<div class="form-group" style="display:none">
											<div class="col-md-12">
												<div class="col-md-6">	
														<div class="col-md-12">
															<label for="exampleInputEmail1">Customer Signature: </label>
														</div>	
														
														<div class="col-md-12">
															 <textarea class="form-control" rows="5" id="customer_signature" name="customer_signature"></textarea>
														</div>
												</div>
												
												<div class="col-md-6">														
														<div class="col-md-12">
															<label for="exampleInputEmail1">Employee Signature: </label>
														</div>	
														
														<div class="col-md-12">
															 <textarea class="form-control" rows="5" id="employee_signature" name="employee_signature"></textarea>
														</div>
												</div>
											</div>	
									</div>
							
							
									<div class="form-group">
										<!--<div class="col-md-12 col-md-offset-3">
												<label for="exampleInputEmail1"><h2><button type="button" class="btn btn-block btn-primary">Print and Continue</button></h2></label>
										</div>-->
											<div class="col-md-12">
												<label for="exampleInputEmail1">&nbsp;</label>
											</div>	
											<div class="col-md-8 col-md-offset-2">
												<button type="submit" class="btn btn-primary btn-block btn-flat">Update Customer</button>
											</div>
											<div class="col-md-12">
												<label for="exampleInputEmail1">&nbsp;</label>
											</div>	
									</div>
						</div>			
					
				</div>
				<!-- /.box -->
			</div>
			
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
		
		// Invoice address checked for the same address or different address	
		function checkInvoiceAddress(){
			if( $("#invoice_address").is(':checked')) {
				$("#invoice_address_section").show();
			} else {
				
				$("#invoice_address_section").hide();
			}
		}
		
		$('#invoice_address').click(function() {
			if( $(this).is(':checked')) {
				$("#invoice_address_section").show();
			} else {
				
				$("#invoice_address_section").hide();
			}
		});
		
		checkInvoiceAddress();
		// Invoice address checked for the same address or different address		
		
		
		//var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_cont_category'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var x = 1; //Initial field counter is 1
		$(addButton).click(function(){ //Once add button is clicked
				x++; //Increment field counter
				//$(wrapper).append(fieldHTML); // Add field html
				$(wrapper).append('<div id="new_container_content_' + x +'" class="new_container_content_class"><div class="col-md-12"><div class="col-md-12"><hr></div></div><div class="col-md-12"><div class="col-md-12"><h4 style="font-weight:bold">Assign Container (New)</h4></div></div><div class="col-md-12" ><div class="col-md-4"><label for="exampleInputEmail1">Select Container Type: </label></div><div class="col-md-6"><select name="container_name[]" id="container_name" class="form-control container_type_customer" onchange="getActiveContainers(this.value, '+ x +');" style=" overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" ><option value="0">Select Container Type</option><option value="10ft">10ft</option><option value="20ft">20ft</option><option value="40ft">40ft</option></select></div><div class="col-md-2"> <span class="add_more"> <img onclick="removeNewContent('+x+')" class="remove_button" src="images/minus.png" /></span></div><div class="col-md-4"><label for="exampleInputEmail1">Select Container Number: </label></div><div class="col-md-6"><select name="container_number[]" id="container_number" class="form-control container_number_customer" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" ><option value="0">Select Container Number</option></select></div><div class="col-md-4"><label for="exampleInputEmail1">Contract start date : </label></div><div class="col-md-6"><input type="text" name="contract_start_date[]" id="contract_start_date" class="form-control contract_start_date" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;"  /></div></div><div class="col-md-12"><div class="col-md-12"><label for="exampleInputEmail1"><h2><a class="btn btn-block btn-primary">Payment Details</a></h2></label></div><div class="col-md-4"><label for="exampleInputEmail1">Licence Fee (Incl VAT): </label></div><div class="col-md-6"> <input type="text" name="licence_vat_amount[]" readonly="" id="licence_vat_amount" class="form-control" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" /></div><div class="col-md-4"><label for="exampleInputEmail1">Deposit Fee: </label></div><div class="col-md-6"> <input type="text" name="deposit_amount[]" readonly="" id="deposit_amount" class="form-control" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" /></div><div class="col-md-4"><label for="exampleInputEmail1">Miscellaneous: </label></div><div class="col-md-6"> <input type="text" name="miscellaneous[]" id="miscellaneous" class="form-control payment_miscellaneous" onblur="allownumericwithoutdecimal(this.value, ' + x + ')" style=" overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" /></div><div class="col-md-4"><label for="exampleInputEmail1">Total Payment Due: </label></div><div class="col-md-6"> <input type="text" name="total_payment_due[]" readonly="" id="total_payment_due" class="form-control" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" /></div></div></div>'); // Add field html
				initdatepicker();
		});
		
		function removeNewContent(contenetId){
			//alert(contenetId);
			if(contenetId){
				$('#new_container_content_'+contenetId).remove(); //Remove field html
			}
		}
		
		// start Authorize User Start
		var addButton_user = $('.add_author_user_category'); //Add button selector
		var wrapper_user = $('.field_wrapper_user'); //Input field wrapper
		var x_user = 1; //Initial field counter is 1
		$(addButton_user).click(function(){ //Once add button is clicked
				x_user++; //Increment field counter
				//$(wrapper).append(fieldHTML); // Add field html
				$(wrapper_user).append('<div id="new_author_user_content_' + x_user +'" class="col-md-12"><div class="col-md-12"><div class="col-md-12"><hr></div></div><div class="col-md-12" ><div class="col-md-12" style=" margin: 0; padding:0; font-weight:bold"><h4 style="font-weight:bold">Authorized User (New)</h4></div></div><div class="col-md-4"><label for="exampleInputEmail1">Name: </label></div><div class="col-md-6"> <input type="text" name="author_user_name" id="author_user_name" class="form-control author_user_name_input" style="overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" /></div><div class="col-md-4"><label for="exampleInputEmail1">Mobile Number: </label></div><div class="col-md-6"> <input type="text" name="author_user_mobile"  id="author_user_mobile" class="form-control author_user_mobile_input" style=" overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;" /></div><div class="col-md-2"> <span class="add_more"> <img class="add_author_user_category" onclick="removeAuthorContent('+ x_user +')" src="images/minus.png" /></span></div></div>'); // Add field html
		});
		// start Authorize User End
		
		function removeAuthorContent(contenetId){
			//alert(contenetId);
			if(contenetId){
				$('#new_author_user_content_'+contenetId).remove(); //Remove field html
			}
		}
		
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
		  
		function initdatepicker(){
				$(".contract_start_date").datepicker({ dateFormat: 'dd/mm/yyyy' });	
		}	
			
		$(document).ready(function () {
			initdatepicker();
			$('#addrss_proof').change(function() {
			var file = $('#addrss_proof').val();
			var exts = ['png', 'gif', 'jpg', 'jpeg'];
			var lblError = $("#lblError");
			lblError.html('');
			// first check if file field has any value
				if ( file ) {
					// split file name at dot
					var get_ext = file.split('.');
					// reverse name to check extension
					get_ext = get_ext.reverse();
					// check file type is valid as given in 'exts' array
					if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
						$("#lblError").hide();
						$('#address_proof_file_type').val('1');					
					} else {
						$('#address_proof_file_type').val('0');
						lblError.html("Please upload files having extensions: <b>" + exts.join(', ') + "</b> only.");
						$("#lblError").show().fadeOut(7000);				
					}
				}
			});
			// ID Proof valiation
			$('#addrss_id').change(function() {
				var file = $('#addrss_id').val();
				var exts = ['png', 'gif', 'jpg', 'jpeg'];
				var lblError2 = $("#lblError2");
				lblError2.html('');
				// first check if file field has any value
				if ( file ) {
				// split file name at dot
				var get_ext = file.split('.');
				// reverse name to check extension
				get_ext = get_ext.reverse();
				// check file type is valid as given in 'exts' array
					if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
						$("#lblError2").hide();
						$('#id_proof_file_type').val('1');					
					} else {
						$('#id_proof_file_type').val('0');
						lblError2.html("Please upload files having extensions: <b>" + exts.join(', ') + "</b> only.");
						$("#lblError2").show().fadeOut(7000);				
					}
				}
			});
		
		});
	
		function checkUpload(){
			
		
		
			var file_type = $('#address_proof_file_type').val();
			
			if(file_type ==0){
				var lblError = $("#lblError");
				lblError.html('');
				lblError.html("Please upload files having extensions: <b> Png, Gif, Jpeg, Jpeg </b> only.");
				$("#lblError").show().fadeOut(7000);				
				return false;
			}
			
			var ID_proof_type = $('#id_proof_file_type').val();
			if(ID_proof_type ==0){
				var lblError2 = $("#lblError2");
				lblError2.html('');
				lblError2.html("Please upload files having extensions: <b> Png, Gif, Jpeg, Jpeg </b> only.");
				$("#lblError2").show().fadeOut(7000);				
				return false;
			}
			
			//validate email

			//validate Mobile
			var phone = $('#mobile_number').val();
				intRegex = /[0-9 -()+]+$/;
			if((phone.length < 11) || (!intRegex.test(phone)))
			{
				 alert('Please enter a valid Mobile number.');
				 $('#mobile_number').focus();
				 return false;
			}
			
			var author_user_mobile = $('#author_user_mobile').val();
				intRegex = /[0-9 -()+]+$/;
			if((author_user_mobile.length < 11) || (!intRegex.test(author_user_mobile)))
			{
				 alert('Please enter a valid Author User Mobile number.');
				  $('#author_user_mobile').focus();
				 return false;
			}
			
			
			
			if(ID_proof_type ==1 && file_type ==1){
				return true;
			}
		
			//return false;	
			
			
			
			 $( "select.container_type_customer" ).each(function( index ) {
				 if($(this).val() =="0" )
				 {
				 	//alert('Please select the Container Type information.');
				 	$(this).css('border', '1px solid red');
					$(this).focus();
					return false;
					 /*if(!this.id.contains('date')){
						alert('Please fill the required information.');
						 return false;
					 }*/
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });
			  
			 
			 $( "select.container_number_customer" ).each(function( index ) {
				 if($(this).val() =="0")
				 {
				 	//alert('Please select the Container Number information.');
				 	$(this).css('border', '1px solid red');
					$(this).focus();
					return false;
					 /*if(!this.id.contains('date')){
						alert('Please fill the required information.');
						 return false;
					 }*/
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
					 /*if(!this.id.contains('date')){
						alert('Please fill the required information.');
						 return false;
					 }*/
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });
		
			
			
			 $( "input.payment_miscellaneous" ).each(function( index ) {
				 if($(this).val() =="" )
				 {
				 	$(this).css('border', '1px solid red');
				 	//alert('Please fill the required information.');
					$(this).focus();
					//return false;
					 /*if(!this.id.contains('date')){
						alert('Please fill the required information.');
						 return false;
					 }*/
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });
			
			
		
			 $( "input.author_user_mobile_input" ).each(function( index ) {
				 if($(this).val() =="" )
				 {
				 	$(this).css('border', '1px solid red');
				 	//alert('Please fill the required information.');
					$(this).focus();
					//return false;
					 /*if(!this.id.contains('date')){
						alert('Please fill the required information.');
						 return false;
					 }*/
				 }else{
					 //$(this).css('border', '1px solid #d2d6de');
					 	var author_user_mobile = $(this).val();
						$(this).css('border', '1px solid #d2d6de');
					 	intRegex = /[0-9 -()+]+$/;
						if((author_user_mobile.length < 11) || (!intRegex.test(author_user_mobile)))
						{
							 alert('Please enter a valid Author User Mobile number.');
							  $('#author_user_mobile').focus();
							 //return false;
						}	
				 }
			  });
			  
			  
			   $( "input.author_user_name_input" ).each(function( index ) {
				 if($(this).val() =="" )
				 {
				 	$(this).css('border', '1px solid red');
				 	//alert('Please fill the required information.');
					$(this).focus();
					//return false;
					 /*if(!this.id.contains('date')){
						alert('Please fill the required information.');
						 return false;
					 }*/
				 }else{
					 $(this).css('border', '1px solid #d2d6de');
				 }
			  });
			//alert('test');
			
			return false;
			
		
		}
	
      
		
    </script>
{/literal}	