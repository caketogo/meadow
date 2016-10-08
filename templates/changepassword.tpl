{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Change Password</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				{if $password_status neq ''}
				<div class="box box-primary">
						<span class="success_new">{$password_status}</span>
				</div>
				{/if}
			
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmchpassword" id="frmchpassword" role="form" method="post">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">New Password :</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="NewPassword" value="" required/>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Confirm Password :</label>
								<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="ConformPassword" value="" required/>
							</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary" id="conform">Submit</button>
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
{literal}
<script type="text/javascript">
	var password = document.getElementById("password");
	var confirm_password = document.getElementById("confirmpassword");
	
	function validatePassword(){
	  if(password.value != confirm_password.value) {
		confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
		confirm_password.setCustomValidity('');
	  }
	}
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
{/literal}
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}
