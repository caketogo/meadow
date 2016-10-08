<?php /* Smarty version 2.6.2, created on 2016-06-20 05:46:01
         compiled from mapping.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'mapping.tpl', 144, false),)), $this); ?>
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
function ShiftPage(Page,Display) {
	loading(\'Processing\');
	if(document.getElementById("modelbx")){
		document.forms[1].Page.value=Page;
		document.forms[1].submit();
	}	
	document.forms[document.forms.length-1].Page.value=Page;
	document.forms[document.forms.length-1].submit();
}

 function addmappings(){
 	var target = document.getElementById(\'target\').value;
 	var TemplateId =document.getElementById(\'gridtemplate\').value;
	var PTemplateId =document.getElementById(\'gridtemplateid\').value;
 	var string = document.getElementById(\'txt_string\').value;
 	var field1 = document.getElementById(\'field1\').value;
 	var field2 = document.getElementById(\'field2\').value;
	if (string != \'\' && field1!=\'\' && field2!=\'\'){
	$("#loadingimg").show();
	 $("#addmapping").hide();
	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=addmapping&target="+target+"&templateid="+TemplateId+"&string="+string+"&replace_field1="+field1+"&replace_field2="+field2+"&PTemplateId="+PTemplateId,
        	success:function(){
        	var MappingDetails = Res.responseText;
        	$(\'#map\').hide();
      		$("#addmap").html(MappingDetails);
			$("#loadingimg").hide();
			$("#addmapping").show();
    }});
	} else {
		alert(\'Please enter the all the datas\');
		document.getElementById(\'txt_string\').focus();
	}
 } 

 function mapfields() {
 	var id = $(\'#field1\').val();
	 //loading(\'Processing\');
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
 	document.getElementById(\'id\').value = id;
 	if(id > 0) {
 		var result=confirm(\'Are you sure you want to delete ?\');
 		 if(result) {
		 loading(\'Processing\');
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
 	var sid = $(\'option:selected\', thissid).attr(\'data-sid\');
	var tid = $(\'option:selected\', thissid).attr(\'data-id\');
 	$(\'#gridtemplate\').val(sid);
	$(\'#gridtemplateid\').val(tid);
 }	 
</script>
'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Mapping Fields </h1>
		<!-- <ol class="breadcrumb">
			<li><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
"><i class="fa fa-dashboard"></i> Home</a></li>
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
							<?php if (isset($this->_sections['template'])) unset($this->_sections['template']);
$this->_sections['template']['name'] = 'template';
$this->_sections['template']['loop'] = is_array($_loop=$this->_tpl_vars['TemplateDetails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['template']['show'] = true;
$this->_sections['template']['max'] = $this->_sections['template']['loop'];
$this->_sections['template']['step'] = 1;
$this->_sections['template']['start'] = $this->_sections['template']['step'] > 0 ? 0 : $this->_sections['template']['loop']-1;
if ($this->_sections['template']['show']) {
    $this->_sections['template']['total'] = $this->_sections['template']['loop'];
    if ($this->_sections['template']['total'] == 0)
        $this->_sections['template']['show'] = false;
} else
    $this->_sections['template']['total'] = 0;
if ($this->_sections['template']['show']):

            for ($this->_sections['template']['index'] = $this->_sections['template']['start'], $this->_sections['template']['iteration'] = 1;
                 $this->_sections['template']['iteration'] <= $this->_sections['template']['total'];
                 $this->_sections['template']['index'] += $this->_sections['template']['step'], $this->_sections['template']['iteration']++):
$this->_sections['template']['rownum'] = $this->_sections['template']['iteration'];
$this->_sections['template']['index_prev'] = $this->_sections['template']['index'] - $this->_sections['template']['step'];
$this->_sections['template']['index_next'] = $this->_sections['template']['index'] + $this->_sections['template']['step'];
$this->_sections['template']['first']      = ($this->_sections['template']['iteration'] == 1);
$this->_sections['template']['last']       = ($this->_sections['template']['iteration'] == $this->_sections['template']['total']);
?>
								<option value="<?php echo $this->_tpl_vars['TemplateDetails'][$this->_sections['template']['index']]['title']; ?>
" data-id="<?php echo $this->_tpl_vars['TemplateDetails'][$this->_sections['template']['index']]['template_id']; ?>
" data-sid="<?php echo $this->_tpl_vars['TemplateDetails'][$this->_sections['template']['index']]['send_grid_email']; ?>
"><?php echo $this->_tpl_vars['TemplateDetails'][$this->_sections['template']['index']]['title']; ?>
</option>
							<?php endfor; endif; ?>
						</select>
						<input type="hidden" name="gridtemplate" id="gridtemplate" value=""/>
						<input type="hidden" name="gridtemplateid" id="gridtemplateid" value=""/>
						<input type="text" class="form-control" name="txt_string" id="txt_string" placeholder="Sendgrid Section value" value="" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required/>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Replace Field :</label><br/>
						<select name="field1" id="field1" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;' onchange="mapfields();" required>
							<option value="">Select table  </option>
							<?php if (isset($this->_sections['map'])) unset($this->_sections['map']);
$this->_sections['map']['name'] = 'map';
$this->_sections['map']['loop'] = is_array($_loop=$this->_tpl_vars['Map']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['map']['show'] = true;
$this->_sections['map']['max'] = $this->_sections['map']['loop'];
$this->_sections['map']['step'] = 1;
$this->_sections['map']['start'] = $this->_sections['map']['step'] > 0 ? 0 : $this->_sections['map']['loop']-1;
if ($this->_sections['map']['show']) {
    $this->_sections['map']['total'] = $this->_sections['map']['loop'];
    if ($this->_sections['map']['total'] == 0)
        $this->_sections['map']['show'] = false;
} else
    $this->_sections['map']['total'] = 0;
if ($this->_sections['map']['show']):

            for ($this->_sections['map']['index'] = $this->_sections['map']['start'], $this->_sections['map']['iteration'] = 1;
                 $this->_sections['map']['iteration'] <= $this->_sections['map']['total'];
                 $this->_sections['map']['index'] += $this->_sections['map']['step'], $this->_sections['map']['iteration']++):
$this->_sections['map']['rownum'] = $this->_sections['map']['iteration'];
$this->_sections['map']['index_prev'] = $this->_sections['map']['index'] - $this->_sections['map']['step'];
$this->_sections['map']['index_next'] = $this->_sections['map']['index'] + $this->_sections['map']['step'];
$this->_sections['map']['first']      = ($this->_sections['map']['iteration'] == 1);
$this->_sections['map']['last']       = ($this->_sections['map']['iteration'] == $this->_sections['map']['total']);
?>
							<option value="<?php echo $this->_tpl_vars['Map'][$this->_sections['map']['index']]; ?>
"><?php echo $this->_tpl_vars['Map'][$this->_sections['map']['index']]; ?>
</option>
							<?php endfor; endif; ?>
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
							<?php if (isset($this->_sections['mapping'])) unset($this->_sections['mapping']);
$this->_sections['mapping']['name'] = 'mapping';
$this->_sections['mapping']['loop'] = is_array($_loop=$this->_tpl_vars['MappingDetails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['mapping']['show'] = true;
$this->_sections['mapping']['max'] = $this->_sections['mapping']['loop'];
$this->_sections['mapping']['step'] = 1;
$this->_sections['mapping']['start'] = $this->_sections['mapping']['step'] > 0 ? 0 : $this->_sections['mapping']['loop']-1;
if ($this->_sections['mapping']['show']) {
    $this->_sections['mapping']['total'] = $this->_sections['mapping']['loop'];
    if ($this->_sections['mapping']['total'] == 0)
        $this->_sections['mapping']['show'] = false;
} else
    $this->_sections['mapping']['total'] = 0;
if ($this->_sections['mapping']['show']):

            for ($this->_sections['mapping']['index'] = $this->_sections['mapping']['start'], $this->_sections['mapping']['iteration'] = 1;
                 $this->_sections['mapping']['iteration'] <= $this->_sections['mapping']['total'];
                 $this->_sections['mapping']['index'] += $this->_sections['mapping']['step'], $this->_sections['mapping']['iteration']++):
$this->_sections['mapping']['rownum'] = $this->_sections['mapping']['iteration'];
$this->_sections['mapping']['index_prev'] = $this->_sections['mapping']['index'] - $this->_sections['mapping']['step'];
$this->_sections['mapping']['index_next'] = $this->_sections['mapping']['index'] + $this->_sections['mapping']['step'];
$this->_sections['mapping']['first']      = ($this->_sections['mapping']['iteration'] == 1);
$this->_sections['mapping']['last']       = ($this->_sections['mapping']['iteration'] == $this->_sections['mapping']['total']);
?>
								<tr>
									<td width="25%"><?php echo ((is_array($_tmp=$this->_tpl_vars['MappingDetails'][$this->_sections['mapping']['index']]['templatetitle'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</td>
									<td width="35%"><?php echo ((is_array($_tmp=$this->_tpl_vars['MappingDetails'][$this->_sections['mapping']['index']]['target_string'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</td>
									<td width="35%"><?php echo ((is_array($_tmp=$this->_tpl_vars['MappingDetails'][$this->_sections['mapping']['index']]['replace_field1'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['MappingDetails'][$this->_sections['mapping']['index']]['replace_field2'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</td>
									<td width="17%" style="text-align:center">
										<i class="fa fa-trash-o" onclick="DeleteMappingDetails('<?php echo $this->_tpl_vars['MappingDetails'][$this->_sections['mapping']['index']]['id']; ?>
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
				<!-- div for displaying addtional mappings-->
				<div id="addmap"></div>
			</form>
		</div>
	</div>
</section>
</div>
<!-- /.content-wrapper -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>