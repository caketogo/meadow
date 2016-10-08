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

/* function mapfields() {
 	var id = $('#field1').val();
	loading('Processing');
	$("#loadingimg").show();
	$(".query").html('');
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace('class="col', 'onchange="selectvalue(this)" class="col');
			$(".query").html('');
			$("#loadingimg").hide();
			rootflag=0;
			addqueryroot('.query', true);
			$.fancybox.close();
    }});
 }
 
 function mapfields1() {
 	var id = $('#field1').val();
	loading('Processing');
	
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace('class="col', 'onchange="selectvalue(this)" class="col');
			
			addqueryroot1('.query', false);
			$.fancybox.close();
			
    }});
 }
 
  function mappingtemplate(thisselect) {
 	var sh = $('option:selected', thisselect).attr('data-sh');
	var sid = $('option:selected', thisselect).attr('data-sid');
	var sf = $('option:selected', thisselect).attr('data-sf');
	var tid = $('option:selected', thisselect).attr('data-id');
	$("#sh").html(sh);
	$("#sf").html(sf);
	$("#tsh").val(sh);
	$("#tsid").val(sid);
	$("#tid").val(tid);
	$("#tsf").val(sf);
 }	 */
</script>
{/literal}	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Container</h1>
		
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-12">
			<!-- general form elements -->
				<div class="box box-primary">
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmsettings" id="frmsettings" role="form" method="post">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						
						<input type="hidden" name="container_file_name" id="container_file_name"  value="{$ContainerEditDetails[0].file_name}"/>	
						<input type="hidden" name="container_admin_id" id="container_admin_id"  value="{$ContainerEditDetails[0].admin_id}"/>	
						
						<div class="box-body">
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Container Number : </label>
								</div>	
								<div class="col-md-12">
								<input type="text" name="name" id="name" class="form-control" value="{$ContainerEditDetails[0].name}" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	
							</div>
							
							<div class="form-group">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Container Category : </label>
								</div>	
								<!--<div class="col-md-12">
								<input type="text" name="container_category" id="container_category" class="form-control" value="{$ContainerEditDetails[0].container_category}" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
								</div>	-->
								
								<div class="col-md-12">
								<select name="container_category" id="container_category" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									<option value="0" {if $ContainerEditDetails[0].container_category eq ''} selected="selected" {/if}> Select your Container Type</option>
									<option value="10ft" {if $ContainerEditDetails[0].container_category eq '10ft'} selected="selected" {/if}>10ft</option>
									<option value="20ft" {if $ContainerEditDetails[0].container_category eq '20ft'} selected="selected" {/if}>20ft</option>
									<option value="40ft" {if $ContainerEditDetails[0].container_category eq '40ft'} selected="selected" {/if}>40ft</option>	
																	
								</select>
							</div>	
								
								
								
							</div>
							
							<!--<div class="form-group">
							
								<div class="col-md-12">
								
								
								
								<input type="hidden" name="tsid" id="tsid"  value=""/>	
								<input type="hidden" name="tsh" id="tsh"  value=""/>	
								<input type="hidden" name="tsf" id="tsf"  value=""/>
								<input type="hidden" name="thtml" id="thtml"  value=""/>	
								<input type="hidden" name="tvalue" id="tvalue"  value=""/>
								<input type="hidden" name="tid" id="tid"  value=""/>	
								</div>
							</div>-->
							<div class="col-md-12">
								<label for="exampleInputEmail1">Status : </label>
							</div>	
								<div class="col-md-12">
									<select name="txt_status" id="txt_status" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
										<option value="0"  {if $ContainerEditDetails[0].status eq 0} selected="selected" {/if}>Inactive</option>
										<option value="1"  {if $ContainerEditDetails[0].status eq 1} selected="selected" {/if}>Active</option>
								</select>
							</div>	
							
							</div>
							
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
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
	
        $(document).ready(function () {
		rootflag =1;
            $('#btnCondition').click(function () {
                var query = {};
                query = getCondition('.query > table');
                //var l = JSON.stringify(query,null,4);
                var l = JSON.stringify(query);
                alert(l);
            });

            $('.btn-primary').click(function () {
				k1='';
				loading('Processing');
				$('.query >table').each(function(){
				var selectval = ($(this).prev('select').val());
				var con = getCondition(this);
					var k = getQuery(con);
					if (selectval) {
						k1 = k1 + " " + selectval + k; 
						
					} else {
						k1 = k;
					}	
					$("#tvalue").val(k1);
					$("#thtml").val($(".query").html());
				});
           });
		   $("#field1").val('{/literal}{$TriggerEditDetails[0].tablename}{literal}')
			mapfields1();
		   $("#target").val('{/literal}{$TriggerEditDetails[0].temp_title}{literal}') 
		   mappingtemplate($("#target"))
        });
		function addrule(){
			 addqueryroot('.query', true);
		}
    </script>
{/literal}	