<?php /* Smarty version 2.6.2, created on 2016-04-25 05:08:42
         compiled from templates/ajax/mapping_fields.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'ucfirst', 'templates/ajax/mapping_fields.tpl', 4, false),)), $this); ?>
<select name="field2" id="field2" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
	<option value="">Select field</option>
	<?php if (isset($this->_sections['fields'])) unset($this->_sections['fields']);
$this->_sections['fields']['name'] = 'fields';
$this->_sections['fields']['loop'] = is_array($_loop=$this->_tpl_vars['MapFields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['fields']['show'] = true;
$this->_sections['fields']['max'] = $this->_sections['fields']['loop'];
$this->_sections['fields']['step'] = 1;
$this->_sections['fields']['start'] = $this->_sections['fields']['step'] > 0 ? 0 : $this->_sections['fields']['loop']-1;
if ($this->_sections['fields']['show']) {
    $this->_sections['fields']['total'] = $this->_sections['fields']['loop'];
    if ($this->_sections['fields']['total'] == 0)
        $this->_sections['fields']['show'] = false;
} else
    $this->_sections['fields']['total'] = 0;
if ($this->_sections['fields']['show']):

            for ($this->_sections['fields']['index'] = $this->_sections['fields']['start'], $this->_sections['fields']['iteration'] = 1;
                 $this->_sections['fields']['iteration'] <= $this->_sections['fields']['total'];
                 $this->_sections['fields']['index'] += $this->_sections['fields']['step'], $this->_sections['fields']['iteration']++):
$this->_sections['fields']['rownum'] = $this->_sections['fields']['iteration'];
$this->_sections['fields']['index_prev'] = $this->_sections['fields']['index'] - $this->_sections['fields']['step'];
$this->_sections['fields']['index_next'] = $this->_sections['fields']['index'] + $this->_sections['fields']['step'];
$this->_sections['fields']['first']      = ($this->_sections['fields']['iteration'] == 1);
$this->_sections['fields']['last']       = ($this->_sections['fields']['iteration'] == $this->_sections['fields']['total']);
?>
		<option value="<?php echo $this->_tpl_vars['MapFields'][$this->_sections['fields']['index']]['Field']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['MapFields'][$this->_sections['fields']['index']]['Field'])) ? $this->_run_mod_handler('ucfirst', true, $_tmp) : ucfirst($_tmp)); ?>
</option>
	<?php endfor; endif; ?>
</select>