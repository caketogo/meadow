<?php /* Smarty version 2.6.2, created on 2016-09-08 01:36:34
         compiled from import_container.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/left_nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
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
		#container_file
		{
		float:left;
		position:relative;
		width:250px;
		}
    </style>

<script type="text/javascript">

 function mapfields() {
 	//alert(\'mapfields\');
 	/*var id = $(\'#field1\').val();
	loading(\'Processing\');
	$("#loadingimg").show();
	$(".query").html(\'\');
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace(\'class="col\', \'onchange="selectvalue(this)" class="col\');
			$("#loadingimg").hide();
			$(".query").html(\'\');
			rootflag=0;
			addqueryroot(\'.query\', true);
			$.fancybox.close();
    }});*/
 }
 
  function mappingtemplate(thisselect) {
  	//alert(\'mappingtemplate\'+ thisselect);
 	/*var sh = $(\'option:selected\', thisselect).attr(\'data-sh\');
	var sid = $(\'option:selected\', thisselect).attr(\'data-sid\');
	var sf = $(\'option:selected\', thisselect).attr(\'data-sf\');
	var tid = $(\'option:selected\', thisselect).attr(\'data-id\');
	$("#sh").html(sh);
	$("#sf").html(sf);
	$("#tsh").val(sh);
	$("#tsid").val(sid);
	$("#tsf").val(sf);
	$("#tid").val(tid);*/
	

	
 }	 
</script>
'; ?>
	


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
					<form name="frmsettings" id="frmsettings" role="form" method="post" enctype="multipart/form-data" onsubmit="return checkUpload();">
					
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="container_type" id="container_type" value="import_csv" />
						<input type="hidden" name="user_type" id="user_type" value="admin" />						
						<input type="hidden" name="file_type" id="file_type" value="" />
						<div class="box-body">
							
							<div class="form-group">
								<div class="col-md-12">
									<input type="file" name="container_file" class="btn btn-default btn-file" id="container_file" required />
									<!--<div class="fileinput fileinput-new" data-provides="fileinput">
										<span class="btn btn-default btn-file"><span>Choose file</span><input type="file" name="container_file" id="container_file" required /></span>
										<span class="fileinput-filename"></span><span class="fileinput-new">No file chosen</span>
									</div>-->
								</div>
								<div class="col-md-12">
									<br />
									<span id="lblError_new" style="padding-top: 10px; color:#666666"><a style="color: #999999" href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
sample-csv.csv" title="Sample CSV">Sample CSV file [Comma separated...]</a></span>
									
									<span id="lblError" style="color: red; padding-top: 10px;"></span>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/res/json2.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/condition-builder.js" type="text/javascript"></script>
<?php echo '
    <script type="text/javascript">
			
	 	$(document).ready(function () {	
			 $(\'#container_file\').change(function() {
				var file = $(\'#container_file\').val();
				var exts = [\'csv\'];
				var lblError = $("#lblError");
				lblError.html(\'\');
			  // first check if file field has any value
			  if ( file ) {
				// split file name at dot
				var get_ext = file.split(\'.\');
				// reverse name to check extension
				get_ext = get_ext.reverse();
				// check file type is valid as given in \'exts\' array
				if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
					$("#lblError").hide();
					$(\'#file_type\').val(\'1\');					
				} else {
					$(\'#file_type\').val(\'0\');
					lblError.html("Please upload files having extensions: <b>" + exts.join(\', \') + "</b> only.");
					$("#lblError").show().fadeOut(7000);				
				}
			  }
			});
		});			
	
		
		function checkUpload(){
			var file_type = $(\'#file_type\').val();
			if(file_type ==0){
				var lblError = $("#lblError");
				lblError.html(\'\');
				lblError.html("Please upload files having extensions: <b> csv, xls </b> only.");
				$("#lblError").show().fadeOut(7000);				
				return false;
			}
			
			if(file_type ==1){
				return true;
			}
		}
		
    </script>
'; ?>
	