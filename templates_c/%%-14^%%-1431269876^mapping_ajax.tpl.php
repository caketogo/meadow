<?php /* Smarty version 2.6.2, created on 2016-06-20 03:36:32
         compiled from templates/ajax/mapping_ajax.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'templates/ajax/mapping_ajax.tpl', 14, false),)), $this); ?>
<div class="box table-responsive">
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