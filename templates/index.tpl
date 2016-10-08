<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
    <title>{$pgnametitle} | Container Rental </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{$siteadmin_stylespath}bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{$siteadmin_stylespath}AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{$siteadmin_globalpath}plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{$siteadmin_globalpath}"><img class="img-responsive" src="{$siteadmin_imagepath}logo.PNG"></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <!--<p class="login-box-msg">Sign in to start your session</p>-->
        <form name="loginfrm" id="loginfrm" method="post" onSubmit="return validatelogin();">
					<input type="hidden" name="hdaction" id="hdaction" value="" />
          <div class="form-group has-feedback">
						{if $logerrmsg ne ''}
						<label for="inputError" class="control-label" style="color:#FF0000;" ><i class="fa fa-times-circle-o"></i> {$logerrmsg}</label>
						{/if}
            <input type="text" class="form-control" placeholder="User Name" name="txt_loginemailid" id="txt_loginemailid" />
            <span class="glyphicon glyphicon-user  form-control-feedback"></span>

          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="txt_loginpassword" id="txt_loginpassword" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
				  <!--<a class="fancybox btn btn-primary btn-block btn-flat" href="#forgot_password" title="Forgot Password">Forgot Password?</a>-->
				  <a href="#" class="btn btn-primary btn-block btn-flat" data-target="#pwdModal" data-toggle="modal">Forgot password?</a>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
       
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
	</div>


<!--modal-->
<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Forgot Password?</h1>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          
                          <p id="email_meg">
						  If you have forgotten your password then please enter your email here.
						  </p>
                            <div class="panel-body">
								<form class="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control input-lg" id="emailInput" placeholder="E-mail Address" name="email" type="email">
                                    </div>
                                    <input class="btn btn-lg btn-primary btn-block" onClick="sendforgotPassword();" id="send_password" value="Send My Password" type="button">
                                </fieldset>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>

		<!--<div class="panel panel-default" id="forgot_password" style="display:none; ">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="text-center">
				  <h3><i class="fa fa-lock fa-4x"></i></h3>
				  <h2 class="text-center">Forgot Password?</h2>
				  <p>You can reset your password here.</p>
					<div class="panel-body" id="main_forgot_password">
					  
					  <form class="form" onSubmit="return sendforgotPassword();">
						<fieldset>
						  <div class="form-group">
							<div class="input-group">
							  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
							  
							  <input id="emailInput" placeholder="email address" class="form-control" type="email" required="">
							</div>
						  </div>
						  <div class="form-group">
							<input class="btn btn-lg btn-primary btn-block" id="send_password" value="Send My Password" type="submit">
						  </div>
						</fieldset>
					  </form>
					  
					</div>
				</div>
			</div>
			</div>
	</div>	-->

	<!--<ul>
		<li><a class="fancybox" href="#inline1" title="Lorem ipsum dolor sit amet">Inline</a></li>
	</ul>-->

    <!-- jQuery 2.1.4 -->
    <script src="{$siteadmin_globalpath}plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{$siteadmin_scriptpath}bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{$siteadmin_globalpath}plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	<script src="{$siteadmin_scriptpath}common.js" type="text/javascript"></script>
	
	

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="{$siteadmin_scriptpath}source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="{$siteadmin_scriptpath}source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="{$siteadmin_scriptpath}source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="{$siteadmin_scriptpath}source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="{$siteadmin_scriptpath}source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="{$siteadmin_scriptpath}source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="{$siteadmin_scriptpath}source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
		
		
		{literal}
    <script>
	
		function sendforgotPassword(){
			var email_val = $("#emailInput").val();
			if(email_val == '' || email_val == 'undefined'){
				alert('Enter your email');
			}else{
			   $.ajax({
					type: "POST",
					url: "ajaxformdata.php?action=checkforgotPasswordEmail&email="+email_val,
					success:function(data){
						if(data == 'fail'){
							//$("#emailInput").css('border', '1px solid #d2d6de');							
							//$("#email_meg").html('<h3> Email does not match.</h3>').fadeOut("slow").css('color', 'red');
							$("#email_meg").html('<h3> Email does not match.</h3>').css('color', 'red');							
							$("#emailInput").val('');				
							//$('#pwdModal').modal('toggle');	
						}
						if(data == 'success'){
							//$("#emailInput").css('border', '1px solid #d2d6de');							
							//$("#email_meg").html('<h3> New password has been sent to your email.</h3>').fadeOut("slow").css('color', 'green');
							$("#email_meg").html('<h3> New password has been sent to your email.</h3>').css('color', 'green');
							$("#emailInput").val('');			
							//$('#pwdModal').modal('toggle');	
						}
						
					}
				});
				//return false;
			}	
			
		}
		
    /*  $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
		
			//
			$('.fancybox').fancybox();
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,
				width : '500px',
				openEffect : 'none',
				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});
      });*/
    </script>

	{/literal}
  </body>
</html>
