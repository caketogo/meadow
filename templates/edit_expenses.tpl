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
    </style>

<script type="text/javascript">

</script>
{/literal}	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Edit Expenses</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post" onsubmit="return checkUpload();">
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="attachement_file_type" id="attachement_file_type" value="" />
						
						<div class="box-body">
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Date Incurred</label>
								</div>	
								<div class="col-md-6">
									<input type="text" name="date_incurred" id="date_incurred" class="form-control " style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
								</div>	
							</div>
							
						<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Description</label>
								</div>	
								<div class="col-md-6">
									<textarea class="form-control" rows="5" id="description" name="description"></textarea>
								</div>	
						</div>
						
						
						<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Payment Method</label>
								</div>	
								<div class="col-md-6">
									<select name="payment_method" id="payment_method" class="form-control" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
											<option value="0">Select Container Type</option>
											<option value="cash">Cash</option>
											<option value="card">Card</option>
											<option value="bank">Bank</option>									
									</select>
								</div>	
						</div>
						
			
						<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Amount excluding VAT</label>
								</div>	
								<div class="col-md-6">
									<input type="text" name="amount_excluding_vat" id="amount_excluding_vat" class="form-control " style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
								</div>	
						</div>
						

						<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">VAT</label>
								</div>	
								<div class="col-md-6">
									<input type="text" name="vat" id="vat" class="form-control " style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
								</div>	
						</div>

						<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Amount including VAT</label>
								</div>	
								<div class="col-md-6">
									<input type="text" name="amount_including_vat" id="amount_including_vat" class="form-control " style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' />
								</div>	
						</div>


						<div class="form-group">
									<div class="col-md-12">
										<h1>Attachments</h1>
									 </div>
									<div class="col-md-12" style="padding: 0;">
											
										<div class="col-md-12">
											<input type="file" name="expanes_attachements" class="btn btn-default btn-file "  id="expanes_attachements"  />
											
											<!--<p>Please upload images files having extensions: <b> Png, Jpeg, Jpeg, etc... </b>.</p>-->
										</div>
											
										<div class="col-md-12">
											<br />
											<span id="lblError" style="color: red; padding-top: 10px;"></span>
										</div>
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
		initdatepicker();
		function initdatepicker(){
				$("#date_incurred").datepicker({ dateFormat: 'dd/mm/yyyy' });	
		}		
		
		// Check file extenstion for attachments
		$('#expanes_attachements').change(function() {
				var file = $('#expanes_attachements').val();
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
					$('#attachement_file_type').val('1');					
				} else {
					$('#attachement_file_type').val('0');
					lblError.html("Please upload files having extensions: <b>" + exts.join(', ') + "</b> only.");
					$("#lblError").show().fadeOut(7000);				
				}
			  }
			});
		
		function checkUpload(){
		
			var date_incurred = $('#date_incurred').val();
			var description = $('#description').val();			
			var payment_method = $('#payment_method').val();
			var amount_excluding_vat = $('#amount_excluding_vat').val();						
			var vat = $('#vat').val();
			var amount_including_vat = $('#amount_including_vat').val();	
							
			if(date_incurred ==0){
				alert('Please Enter the Date Incurred');
				 $('#date_incurred').focus();
				return false;
			}
			
			if(description ==0){
				alert('Please Enter the Description');
				 $('#description').focus();
				return false;
			}
			
			if(payment_method ==0){
				alert('Please Select the Payment Method');
				 $('#payment_method').focus();
				return false;
			}
			
			if(amount_excluding_vat ==0){
				alert('Please Enter the Amount Excluding Vat');
				 $('#amount_excluding_vat').focus();
				return false;
			}
			
			if(vat ==0){
				alert('Please Enter the Vat');
				 $('#vat').focus();
				return false;
			}
			
			if(amount_including_vat ==0){
				alert('Please Enter the Amount Including Vat');
				 $('#amount_including_vat').focus();
				return false;
			}
			
			var file_type = $('#attachement_file_type').val();
			if(file_type ==0){
				var lblError = $("#lblError");
				lblError.html('');
				lblError.html("Please upload files having extensions: <b> Png, Gif, Jpeg, Jpeg </b> only.");
				$("#lblError").show().fadeOut(5000);				
				return false;
			}
			
			if(file_type ==1){
				return true;
			}
			
			return false;
		
		}	
	
    </script>
{/literal}	