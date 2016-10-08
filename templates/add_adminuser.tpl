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
		#email_exits {
			bottom: 40px;
			left: 400px;
			position: absolute;
			top: 162px;
		}
		#email_exits label{
			border: 1px solid #d2d6de;
			color: #ff0000;
			margin-left: 0;
			padding: 7px 20px;
			width: auto;
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
		<h1>Create Admin User</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post" onsubmit="return onSubmitEmailNew();">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="user_type" id="user_type" value="admin" />						
						
						<div class="box-body">
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">First Name : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="first_name" id="first_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Last Name : </label>
								</div>	
								<div class="col-md-12">
									<input type="text" name="last_name" id="last_name" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Email: </label>
								</div>	
								<div class="col-md-12">
									<input type="email" name="username" id="username" onkeyup="checkEmail();" value="" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />							
									<span id="email_status"></span>
									</div>	

								<div class="col-md-12" id="email_exits" style="display:none; margin-left:5px; ">
									<input type="hidden" id="status_Email_val" name="status_Email_val" value=""  />
									<label for="exampleInputEmail1">Email already exists. try another one. </label>
								</div>	
	
							</div>
							
							
							
							<div class="col-md-12">
								<label for="exampleInputEmail1">Status : </label>
							</div>	
							<div class="col-md-12">
								<select name="txt_status" id="txt_status" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									<option value="0">Inactive</option>
									<option value="1" selected="selected">Active</option>
								</select>
							</div>	

							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1"> </label>
								</div>
								<div class="col-md-12">
									<label for="exampleInputEmail1">User Privileges: </label>
								</div>	
							</div>
							
							
							<div class="form-group" style="display:none">
								<div class="col-md-12">
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" name="user_management" id="user_management">Users Management</label>
									</div>
								</div>
							</div>		
									
							<div class="form-group">
								<div class="col-md-12">		
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" name="category_management" id="category_management">Category Management</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-md-12">		
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" name="container_management" id="container_management">Container Management</label>
									</div>
								</div>
							</div>		
								
							<div class="form-group">
								<div class="col-md-12">	
									<div class="checkbox checkbox-new">
										<label><input type="checkbox" value="" name="customer_management" id="customer_management">Customer Management</label>
									</div>
								</div>
							</div>	
							
							
							<div class="form-group">
								<div class="col-md-12">
								<!--<input type="hidden" name="tid" id="tid"  value=""/>-->	
								</div>
							</div>
							
						
							</div>
							
							<div class="form-group">
								
								

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

		function onSubmitEmailNew(){
			var emailVal = $("#status_Email_val").val();
			if(emailVal ==1){
				$("#email_exits").show().slideUp(5000);
				return false;	
			}else{
				return true;			
			}
		}
		
		function checkEmail(){
			var User_Email = $("#username").val();
			var statusEmailResult = $("#status_Email_val").val();
			
			var re = /\S+@\S+\.\S+/;
			var Email_formart = re.test(User_Email);
			
			if(Email_formart == true){
			
			var statusEmail ='no';
				$.ajax({
				type: "POST",
				url: "ajaxformdata.php?action=checkEmail&useremail="+User_Email,
					success:function(data){
						checkEmail1(data);
					}
				});
			
			}else{
				return false;
			}	
		}
		
		function checkEmail1(data){
			if(data =='exits'){
				$("#status_Email_val").show();				
				$("#status_Email_val").val('1');
				$("#email_exits").show().slideUp(5000);
			}else{
				$("#status_Email_val").show();							
				$("#status_Email_val").val('0');			
				$("#email_exits").hide();
			}	
		}
    </script>
{/literal}	