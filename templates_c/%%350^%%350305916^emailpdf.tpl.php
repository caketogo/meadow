<?php /* Smarty version 2.6.2, created on 2016-05-09 04:32:11
         compiled from templates/emailpdf.tpl */ ?>
<?php echo '
<style>
	.pdfth{
		border: 1px solid #000; 
		border-top-width: 0px !important; 
		border-left-width: 0px !important; 
/*		border-right-width: 0px !important; 
*/		border-bottom-width: 0px !important;
	}
	.pdftd{
		border: 1px solid #000; 
		border-left-width: 0px !important; 
		border-bottom-width: 0px !important;
		padding:2px 5px;
 	}
</style>
'; ?>

<div><img src="<?php echo $this->_tpl_vars['globalpath']; ?>
images/logo.png" border="0" /></div>
	<div>&nbsp;</div>
			<table cellpadding="0" cellspacing="0" style="border:1px solid #000;" width="100%">
				<thead>
					<tr bgcolor="#f7941f">
						<th class="pdfth" width="10%">Customer ID</th>
						<th class="pdfth" width="30%">Email</th>
						<th class="pdfth" width="10%">Order Id</th>
						<th class="pdfth" width="30%">Temp Name</th>
						<th class="pdfth" width="20%" style="text-align:center; border-right:0px;">Date</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($this->_sections['emails'])) unset($this->_sections['emails']);
$this->_sections['emails']['name'] = 'emails';
$this->_sections['emails']['loop'] = is_array($_loop=$this->_tpl_vars['EmailList']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['emails']['show'] = true;
$this->_sections['emails']['max'] = $this->_sections['emails']['loop'];
$this->_sections['emails']['step'] = 1;
$this->_sections['emails']['start'] = $this->_sections['emails']['step'] > 0 ? 0 : $this->_sections['emails']['loop']-1;
if ($this->_sections['emails']['show']) {
    $this->_sections['emails']['total'] = $this->_sections['emails']['loop'];
    if ($this->_sections['emails']['total'] == 0)
        $this->_sections['emails']['show'] = false;
} else
    $this->_sections['emails']['total'] = 0;
if ($this->_sections['emails']['show']):

            for ($this->_sections['emails']['index'] = $this->_sections['emails']['start'], $this->_sections['emails']['iteration'] = 1;
                 $this->_sections['emails']['iteration'] <= $this->_sections['emails']['total'];
                 $this->_sections['emails']['index'] += $this->_sections['emails']['step'], $this->_sections['emails']['iteration']++):
$this->_sections['emails']['rownum'] = $this->_sections['emails']['iteration'];
$this->_sections['emails']['index_prev'] = $this->_sections['emails']['index'] - $this->_sections['emails']['step'];
$this->_sections['emails']['index_next'] = $this->_sections['emails']['index'] + $this->_sections['emails']['step'];
$this->_sections['emails']['first']      = ($this->_sections['emails']['iteration'] == 1);
$this->_sections['emails']['last']       = ($this->_sections['emails']['iteration'] == $this->_sections['emails']['total']);
?>
						<tr>
							<td class="pdftd" width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['customers_id']; ?>
</td>
							<td class="pdftd" width="30%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['customers_email_address']; ?>
</td>
							<td  class="pdftd" width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['orders_id']; ?>

							</td>
							<td class="pdftd" width="30%" style="text-align:center;"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['temp_name']; ?>
</td>
							<td class="pdftd" width="20%" style="text-align:center; border-right:0px;"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['Schedule_date']; ?>
</td>
						</tr>
					<?php endfor; else: ?>
						<tr>
							<td colspan="3" align="center">No Factory's Found</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		
