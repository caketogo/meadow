{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function editSettingsDetails(id){
	if(id > 0) {
		window.location.href = "editsettings.php?id="+id;
	}
}
function ShiftPage(Page,Display) {
	
	if(document.getElementById("modelbx")){
		document.forms[1].Page.value=Page;
		document.forms[1].submit();
	}	
	document.forms[document.forms.length-1].Page.value=Page;
	document.forms[document.forms.length-1].submit();
}

function DeleteSettingsDetails(Id) {
	
  document.getElementById('hdAction').value = 2;
  document.getElementById('settingid').value = Id;
 
  if(Id > 0) {
    var result=confirm('Are you sure want to delete?');
    if(result) {
      $("#templatelist").attr("method", "post");
      document.templatelist.submit();
    } else {
      return false;
    }
  } 
}
</script>
{/literal}
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Settings List </h1>
		<!-- <ol class="breadcrumb">
			<li><a href="{$siteadmin_globalpath}"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data tables</li>
		</ol> -->
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form name="templatelist" id="templatelist" method="post" action="settings_list.php">
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="settingid" id="settingid" value=""/>
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
				<div class="box table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="35%">Field</th>
								<th width="35%">Values</th>
								<th style="text-align:center">Action</th>
							</tr>
						</thead>
						<tbody>
							{section name="settings" loop=$SettingsList}
								<tr>
									<td width="35%">{$SettingsList[settings].field}</td>
									<td width="35%">{$SettingsList[settings].value}</td>
									<td width="17%" style="text-align:center">
										<i class="fa fa-pencil-square-o" onclick="editSettingsDetails('{$SettingsList[settings].id}');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
										<i class="fa fa-trash-o" onclick="DeleteSettingsDetails('{$SettingsList[settings].id}');" style="color:#FF0000; font-size:16px; cursor:pointer;"></i>
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
			</form>
		</div>
	</div>
</section>
</div>
{include file="includes/footer.tpl"}