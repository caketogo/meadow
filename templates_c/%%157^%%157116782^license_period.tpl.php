<?php /* Smarty version 2.6.2, created on 2016-10-07 09:49:09
         compiled from license_period.tpl */ ?>
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


function editlicenseperiod (id){

	if(id > 0) {
	//loading(\'Processing\');
		window.location.href = "edit_license_period.php?id="+id;
	}
}
</script>
'; ?>

<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php if ($this->_tpl_vars['update_msg'] != ''): ?>
				
					<?php if ($this->_tpl_vars['msgcode'] == '5'): ?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $this->_tpl_vars['update_msg']; ?>

						</div>
					<?php elseif ($this->_tpl_vars['msgcode'] == '1'): ?>
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								<?php echo $this->_tpl_vars['update_msg']; ?>

						  	</div>
					<?php elseif ($this->_tpl_vars['msgcode'] == '2'): ?>
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								<?php echo $this->_tpl_vars['update_msg']; ?>

						  	</div>
					<?php elseif ($this->_tpl_vars['msgcode'] == '3'): ?>
							<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							<?php echo $this->_tpl_vars['update_msg']; ?>

						</div>
					 <?php else: ?>		
						<div class="box box-primary">
							<span class="success_new"><?php echo $this->_tpl_vars['update_msg']; ?>
</span>
						</div>
					<?php endif; ?>		
				
			<?php endif; ?>
			
			<form name="templatelist" id="templatelist" method="post" class="form-horizontal" >
				<input type="hidden" name="Page" id="Page" />
				<input type="hidden" name="Display" id="Display" />
				<input type="hidden" name="hdAction" id="hdAction" value=""/>
		<div class="box box-primary">
			<div class="row" >
				<div class="col-md-12 ">
					<div class="col-md-6">
						<h2 class="box-title">License Period Length</h2>
					</div>	
				</div>
			</div>			
		</div>
			<input type="hidden" name="id" id="id"  value="<?php echo $this->_tpl_vars['LicensePeriod'][$this->_sections['length']['index']]['id']; ?>
"/>
			<?php if (isset($this->_sections['length'])) unset($this->_sections['length']);
$this->_sections['length']['name'] = 'length';
$this->_sections['length']['loop'] = is_array($_loop=$this->_tpl_vars['LicensePeriod']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['length']['show'] = true;
$this->_sections['length']['max'] = $this->_sections['length']['loop'];
$this->_sections['length']['step'] = 1;
$this->_sections['length']['start'] = $this->_sections['length']['step'] > 0 ? 0 : $this->_sections['length']['loop']-1;
if ($this->_sections['length']['show']) {
    $this->_sections['length']['total'] = $this->_sections['length']['loop'];
    if ($this->_sections['length']['total'] == 0)
        $this->_sections['length']['show'] = false;
} else
    $this->_sections['length']['total'] = 0;
if ($this->_sections['length']['show']):

            for ($this->_sections['length']['index'] = $this->_sections['length']['start'], $this->_sections['length']['iteration'] = 1;
                 $this->_sections['length']['iteration'] <= $this->_sections['length']['total'];
                 $this->_sections['length']['index'] += $this->_sections['length']['step'], $this->_sections['length']['iteration']++):
$this->_sections['length']['rownum'] = $this->_sections['length']['iteration'];
$this->_sections['length']['index_prev'] = $this->_sections['length']['index'] - $this->_sections['length']['step'];
$this->_sections['length']['index_next'] = $this->_sections['length']['index'] + $this->_sections['length']['step'];
$this->_sections['length']['first']      = ($this->_sections['length']['iteration'] == 1);
$this->_sections['length']['last']       = ($this->_sections['length']['iteration'] == $this->_sections['length']['total']);
?>
			<div class="form-group">
				  <label class="control-label col-sm-2 col-xs-5" for="email">License Period Length(days):</label>
				  <div class="col-sm-5 col-xs-5">
						<input type="text" class="form-control" id="period_length_date" name="period_length_date" value="<?php echo $this->_tpl_vars['LicensePeriod'][$this->_sections['length']['index']]['period_length_date']; ?>
" readonly="readonly" />
				  </div>
				  <div class="col-sm-3">
				  		<i style="color:#00CC00; font-size:16px; cursor:pointer;" onclick="editlicenseperiod('<?php echo $this->_tpl_vars['LicensePeriod'][$this->_sections['length']['index']]['id']; ?>
');" class="fa fa-pencil-square-o"></i>
				  </div>
				</div>
					 <?php endfor; endif; ?>
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