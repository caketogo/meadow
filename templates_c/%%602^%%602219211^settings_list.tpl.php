<?php /* Smarty version 2.6.2, created on 2016-06-20 03:36:15
         compiled from settings_list.tpl */ ?>
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
	
  document.getElementById(\'hdAction\').value = 2;
  document.getElementById(\'settingid\').value = Id;
 
  if(Id > 0) {
    var result=confirm(\'Are you sure want to delete?\');
    if(result) {
      $("#templatelist").attr("method", "post");
      document.templatelist.submit();
    } else {
      return false;
    }
  } 
}
</script>
'; ?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Settings List </h1>
		<!-- <ol class="breadcrumb">
			<li><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
"><i class="fa fa-dashboard"></i> Home</a></li>
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
							<?php if (isset($this->_sections['settings'])) unset($this->_sections['settings']);
$this->_sections['settings']['name'] = 'settings';
$this->_sections['settings']['loop'] = is_array($_loop=$this->_tpl_vars['SettingsList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['settings']['show'] = true;
$this->_sections['settings']['max'] = $this->_sections['settings']['loop'];
$this->_sections['settings']['step'] = 1;
$this->_sections['settings']['start'] = $this->_sections['settings']['step'] > 0 ? 0 : $this->_sections['settings']['loop']-1;
if ($this->_sections['settings']['show']) {
    $this->_sections['settings']['total'] = $this->_sections['settings']['loop'];
    if ($this->_sections['settings']['total'] == 0)
        $this->_sections['settings']['show'] = false;
} else
    $this->_sections['settings']['total'] = 0;
if ($this->_sections['settings']['show']):

            for ($this->_sections['settings']['index'] = $this->_sections['settings']['start'], $this->_sections['settings']['iteration'] = 1;
                 $this->_sections['settings']['iteration'] <= $this->_sections['settings']['total'];
                 $this->_sections['settings']['index'] += $this->_sections['settings']['step'], $this->_sections['settings']['iteration']++):
$this->_sections['settings']['rownum'] = $this->_sections['settings']['iteration'];
$this->_sections['settings']['index_prev'] = $this->_sections['settings']['index'] - $this->_sections['settings']['step'];
$this->_sections['settings']['index_next'] = $this->_sections['settings']['index'] + $this->_sections['settings']['step'];
$this->_sections['settings']['first']      = ($this->_sections['settings']['iteration'] == 1);
$this->_sections['settings']['last']       = ($this->_sections['settings']['iteration'] == $this->_sections['settings']['total']);
?>
								<tr>
									<td width="35%"><?php echo $this->_tpl_vars['SettingsList'][$this->_sections['settings']['index']]['field']; ?>
</td>
									<td width="35%"><?php echo $this->_tpl_vars['SettingsList'][$this->_sections['settings']['index']]['value']; ?>
</td>
									<td width="17%" style="text-align:center">
										<i class="fa fa-pencil-square-o" onclick="editSettingsDetails('<?php echo $this->_tpl_vars['SettingsList'][$this->_sections['settings']['index']]['id']; ?>
');" style="color:#00CC00; font-size:16px; cursor:pointer;"></i> &nbsp;
										<i class="fa fa-trash-o" onclick="DeleteSettingsDetails('<?php echo $this->_tpl_vars['SettingsList'][$this->_sections['settings']['index']]['id']; ?>
');" style="color:#FF0000; font-size:16px; cursor:pointer;"></i>
									</td>
								</tr>
							<?php endfor; endif; ?>
						</tbody>
					</table>
					<?php if ($this->_tpl_vars['intSearchPerPage']): ?>
						<table border="0" width="100%">
							<tr>
								<td class="odd-list-bg"><?php echo $this->_tpl_vars['intSearchPerPage']; ?>
</td>
							</tr>
						</table>
					<?php endif; ?>
				</div>
			</form>
		</div>
	</div>
</section>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>