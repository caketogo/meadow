{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function ShiftPage(Page,Display) {
	loading('Processing');
	if(document.getElementById("modelbx")){
		document.forms[1].Page.value=Page;
		document.forms[1].submit();
	}	
	document.forms[document.forms.length-1].Page.value=Page;
	document.forms[document.forms.length-1].submit();
}

 function addmappings(){
 	var target = document.getElementById('target').value;
 	var TemplateId =document.getElementById('gridtemplate').value;
	var PTemplateId =document.getElementById('gridtemplateid').value;
 	var string = document.getElementById('txt_string').value;
 	var field1 = document.getElementById('field1').value;
 	var field2 = document.getElementById('field2').value;
	if (string != '' && field1!='' && field2!=''){
	$("#loadingimg").show();
	 $("#addmapping").hide();
	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=addmapping&target="+target+"&templateid="+TemplateId+"&string="+string+"&replace_field1="+field1+"&replace_field2="+field2+"&PTemplateId="+PTemplateId,
        	success:function(){
        	var MappingDetails = Res.responseText;
        	$('#map').hide();
      		$("#addmap").html(MappingDetails);
			$("#loadingimg").hide();
			$("#addmapping").show();
    }});
	} else {
		alert('Please enter the all the datas');
		document.getElementById('txt_string').focus();
	}
 } 

 function mapfields() {
 	var id = $('#field1').val();
	 //loading('Processing');
	 $("#loadingimg").show();
	 $("#field2").hide();
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		$("#field2").html(MappingFields);
			 $("#loadingimg").hide();
			 $("#field2").show();
			//$.fancybox.close();
    }});
 }

 function DeleteMappingDetails(id) {
 	document.getElementById('id').value = id;
 	if(id > 0) {
 		var result=confirm('Are you sure you want to delete ?');
 		 if(result) {
		 loading('Processing');
		    var Res = $.ajax({
				type: "POST",
	        	url: "ajaxformdata.php?action=deletemapping&id="+id,
	        	success:function(){
	        		 setTimeout(function(){
          			 location.reload(); 
      					}, 1000); 
    		}});
	    } else {
	      return false;
	    }
 	}
 }

 function mappingtemplate(thissid) {
 	var sid = $('option:selected', thissid).attr('data-sid');
	var tid = $('option:selected', thissid).attr('data-id');
 	$('#gridtemplate').val(sid);
	$('#gridtemplateid').val(tid);
 }	 
</script>
{/literal}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Mapping Fields </h1>
		<!-- <ol class="breadcrumb">
			<li><a href="{$siteadmin_globalpath}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data tables</li>
		</ol> -->
	</section>

<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<form name="mappinglist" id="mappinglist" method="post">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="id" id="id" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Target String :</label><br/>
						<select name="target" id="target" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' onchange="mappingtemplate(this);" required>
							<option value="">Select Template</option>
							{section name="template" loop=$TemplateDetails}
								<option value="{$TemplateDetails[template].title}" data-id="{$TemplateDetails[template].template_id}" data-sid="{$TemplateDetails[template].send_grid_email}">{$TemplateDetails[template].title}</option>
							{/section}
						</select>
						<input type="hidden" name="gridtemplate" id="gridtemplate" value=""/>
						<input type="hidden" name="gridtemplateid" id="gridtemplateid" value=""/>
						<input type="text" class="form-control" name="txt_string" id="txt_string" placeholder="Sendgrid Section value" value="" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required/>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Replace Field :</label><br/>
						<select name="field1" id="field1" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;' onchange="mapfields();" required>
							<option value="">Select table  </option>
							{section name="map" loop=$Map}
							<option value="{$Map[map]}">{$Map[map]}</option>
							{/section}
						</select>
						<select  name="field2" id="field2" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="">Select field</option>
						</select> <img src="/images/loading.gif" width="30" style="display:none" id="loadingimg" /> <button type="button" class="btn btn-primary" style='width: 100px;overflow: hidden; margin-bottom: 5px;display: inline-block;float:right;margin-right: 315px;' id="addmapping" name="addmapping" onclick="addmappings();">Add</button>
					</div>
				</div>
				<div class="box table-responsive" id="map">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="25%">Template</th>
								<th width="35%">Target String</th>
								<th width="35%">Replace Field</th>
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tbody>
							{section name="mapping" loop=$MappingDetails}
								<tr>
									<td width="25%">{$MappingDetails[mapping].templatetitle|ucfirst}</td>
									<td width="35%">{$MappingDetails[mapping].target_string|ucfirst}</td>
									<td width="35%">{$MappingDetails[mapping].replace_field1|ucfirst} - {$MappingDetails[mapping].replace_field2|ucfirst}</td>
									<td width="17%" style="text-align:center">
										<i class="fa fa-trash-o" onclick="DeleteMappingDetails('{$MappingDetails[mapping].id}');" style="color:#FF0000; font-size:16px; cursor:pointer;"></i>
									</td>
								</tr>
							{/section}
						</tbody> 
					</table>
					{if $intSearchPerPage}
						<table border="0" width="100%">
							<tr>
								<td class="odd-list-bg">{$intSearchPerPage}</td>
							</tr>
						</table>
					{/if}
				</div>
				<!-- div for displaying addtional mappings-->
				<div id="addmap"></div>
			</form>
		</div>
	</div>
</section>
</div>
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}