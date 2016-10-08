<?php /* Smarty version 2.6.2, created on 2016-06-20 00:10:09
         compiled from edittemplate.tpl */ ?>
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
<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css?v=1.1" media="screen" />
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Add Template</h1>
		<ol class="breadcrumb">
			<li class="active">Dashboard</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<!-- left column -->
			<div class="col-md-6">
			<!-- general form elements -->
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Add New Template</h3></div>
					<!-- /.box-header -->
					<!-- form start -->
					<form name="frmtemplate" id="frmtemplate" role="form" method="post" action="edittemplate.php"  onsubmit="return triggervalue()">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						<input type="hidden" name="template_id" id="template_id" value="<?php echo $this->_tpl_vars['TemplateEditDetails'][0]['template_id']; ?>
">
						<input type="hidden" name="triggerid" id="triggerid" value="">
          				  <input type="hidden" name="triggername" id="triggername" value="">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Title :</label>
								<input type="text" class="form-control" name="txt_title" id="txt_title" placeholder="Title" value="<?php echo $this->_tpl_vars['TemplateEditDetails'][0]['title']; ?>
" required/>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Send Grid Email Template Id :</label>
									<select name="txt_tempid" id="txt_tempid" class="form-control" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="">Select Template</option>
							<?php if (isset($this->_sections['template'])) unset($this->_sections['template']);
$this->_sections['template']['name'] = 'template';
$this->_sections['template']['loop'] = is_array($_loop=$this->_tpl_vars['template_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<option value="<?php echo $this->_tpl_vars['template_list'][$this->_sections['template']['index']]['id']; ?>
" data-sid="<?php echo $this->_tpl_vars['template_list'][$this->_sections['template']['index']]['name']; ?>
" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['send_grid_email'] == $this->_tpl_vars['template_list'][$this->_sections['template']['index']]['id']): ?> selected <?php endif; ?>><?php echo $this->_tpl_vars['template_list'][$this->_sections['template']['index']]['name']; ?>
 - <?php echo $this->_tpl_vars['template_list'][$this->_sections['template']['index']]['id']; ?>
</option>
							<?php endfor; endif; ?>
						</select>

								
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Schedule :</label>
								<select name="schedule1" id="schedule1" class="form-control" style='width: 160px;overflow: hidden; margin-bottom: 5px;display: inline-block;' required>
									<option value="">Select . . .</option>
									<option value="1" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 1): ?> selected="selected" <?php endif; ?>>1</option>
									<option value="2" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 2): ?> selected="selected" <?php endif; ?>>2</option>
									<option value="3" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 3): ?> selected="selected" <?php endif; ?>>3</option>
									<option value="4" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 4): ?> selected="selected" <?php endif; ?>>4</option>
									<option value="5" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 5): ?> selected="selected" <?php endif; ?>>5</option>
									<option value="6" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 6): ?> selected="selected" <?php endif; ?>>6</option>
									<option value="7" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 7): ?> selected="selected" <?php endif; ?>>7</option>
									<option value="8" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 8): ?> selected="selected" <?php endif; ?>>8</option>
									<option value="9" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 9): ?> selected="selected" <?php endif; ?>>9</option>
									<option value="10" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 10): ?> selected="selected" <?php endif; ?>>10</option>
									<option value="11" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 11): ?> selected="selected" <?php endif; ?>>11</option>
									<option value="12" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 12): ?> selected="selected" <?php endif; ?>>12</option>
									<option value="13" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 13): ?> selected="selected" <?php endif; ?>>13</option>
									<option value="14" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 14): ?> selected="selected" <?php endif; ?>>14</option>
									<option value="15" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 15): ?> selected="selected" <?php endif; ?>>15</option>
									<option value="16" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 16): ?> selected="selected" <?php endif; ?>>16</option>
									<option value="17" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 17): ?> selected="selected" <?php endif; ?>>17</option>
									<option value="18" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 18): ?> selected="selected" <?php endif; ?>>18</option>
									<option value="19" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 19): ?> selected="selected" <?php endif; ?>>19</option>
									<option value="20" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 20): ?> selected="selected" <?php endif; ?>>20</option>
									<option value="21" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 21): ?> selected="selected" <?php endif; ?>>21</option>
									<option value="22" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 22): ?> selected="selected" <?php endif; ?>>22</option>
									<option value="23" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 23): ?> selected="selected" <?php endif; ?>>23</option>
									<option value="24" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 24): ?> selected="selected" <?php endif; ?>>24</option>
									<option value="25" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 25): ?> selected="selected" <?php endif; ?>>25</option>
									<option value="26" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 26): ?> selected="selected" <?php endif; ?>>26</option>
									<option value="27" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 27): ?> selected="selected" <?php endif; ?>>27</option>
									<option value="28" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 28): ?> selected="selected" <?php endif; ?>>28</option>
									<option value="29" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 29): ?> selected="selected" <?php endif; ?>>29</option>
									<option value="30" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 30): ?> selected="selected" <?php endif; ?>>30</option>
									<option value="31" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 31): ?> selected="selected" <?php endif; ?>>31</option>
									<option value="32" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 32): ?> selected="selected" <?php endif; ?>>32</option>
									<option value="33" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 33): ?> selected="selected" <?php endif; ?>>33</option>
									<option value="34" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 34): ?> selected="selected" <?php endif; ?>>34</option>
									<option value="35" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 35): ?> selected="selected" <?php endif; ?>>35</option>
									<option value="36" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 36): ?> selected="selected" <?php endif; ?>>36</option>
									<option value="37" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 37): ?> selected="selected" <?php endif; ?>>37</option>
									<option value="38" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 38): ?> selected="selected" <?php endif; ?>>38</option>
									<option value="39" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 39): ?> selected="selected" <?php endif; ?>>39</option>
									<option value="40" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 40): ?> selected="selected" <?php endif; ?>>40</option>
									<option value="41" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 41): ?> selected="selected" <?php endif; ?>>41</option>
									<option value="42" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 42): ?> selected="selected" <?php endif; ?>>42</option>
									<option value="43" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 43): ?> selected="selected" <?php endif; ?>>43</option>
									<option value="44" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 44): ?> selected="selected" <?php endif; ?>>44</option>
									<option value="45" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 45): ?> selected="selected" <?php endif; ?>>45</option>
									<option value="46" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 46): ?> selected="selected" <?php endif; ?>>46</option>
									<option value="47" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 47): ?> selected="selected" <?php endif; ?>>47</option>
									<option value="48" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 48): ?> selected="selected" <?php endif; ?>>48</option>
									<option value="49" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 49): ?> selected="selected" <?php endif; ?>>49</option>
									<option value="50" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 50): ?> selected="selected" <?php endif; ?>>50</option>
									<option value="51" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 51): ?> selected="selected" <?php endif; ?>>51</option>
									<option value="52" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 52): ?> selected="selected" <?php endif; ?>>52</option>
									<option value="53" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 53): ?> selected="selected" <?php endif; ?>>53</option>
									<option value="54" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 54): ?> selected="selected" <?php endif; ?>>54</option>
									<option value="55" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 55): ?> selected="selected" <?php endif; ?>>55</option>
									<option value="56" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 56): ?> selected="selected" <?php endif; ?>>56</option>
									<option value="57" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 57): ?> selected="selected" <?php endif; ?>>57</option>
									<option value="58" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 58): ?> selected="selected" <?php endif; ?>>58</option>
									<option value="59" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 59): ?> selected="selected" <?php endif; ?>>59</option>
									<option value="60" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_hour'] == 60): ?> selected="selected" <?php endif; ?>>60</option>
								</select><select name="schedule2" id="schedule2" class="form-control" style='width: 160px;overflow: hidden; margin-bottom: 5px;display: inline-block;' required>
									<option value="">Select . . .</option>
									<option value="min" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_format'] == 'min'): ?> selected="selected" <?php endif; ?>>Min</option>
									<option value="hour" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_format'] == 'hour'): ?> selected="selected" <?php endif; ?>>Hour</option>
									<option value="day" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_format'] == 'day'): ?> selected="selected" <?php endif; ?>>Day</option>
									<option value="week" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_format'] == 'week'): ?> selected="selected" <?php endif; ?>>Week</option>
									<option value="month" <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['schedule_format'] == 'month'): ?> selected="selected" <?php endif; ?>>Month</option>
							</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Trigger : </label>
								<select name="txt_trigger" id="txt_trigger" class="form-control" multiple="multiple" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									<?php if (isset($this->_sections['TriggerAll'])) unset($this->_sections['TriggerAll']);
$this->_sections['TriggerAll']['name'] = 'TriggerAll';
$this->_sections['TriggerAll']['loop'] = is_array($_loop=$this->_tpl_vars['TriggerAll']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['TriggerAll']['show'] = true;
$this->_sections['TriggerAll']['max'] = $this->_sections['TriggerAll']['loop'];
$this->_sections['TriggerAll']['step'] = 1;
$this->_sections['TriggerAll']['start'] = $this->_sections['TriggerAll']['step'] > 0 ? 0 : $this->_sections['TriggerAll']['loop']-1;
if ($this->_sections['TriggerAll']['show']) {
    $this->_sections['TriggerAll']['total'] = $this->_sections['TriggerAll']['loop'];
    if ($this->_sections['TriggerAll']['total'] == 0)
        $this->_sections['TriggerAll']['show'] = false;
} else
    $this->_sections['TriggerAll']['total'] = 0;
if ($this->_sections['TriggerAll']['show']):

            for ($this->_sections['TriggerAll']['index'] = $this->_sections['TriggerAll']['start'], $this->_sections['TriggerAll']['iteration'] = 1;
                 $this->_sections['TriggerAll']['iteration'] <= $this->_sections['TriggerAll']['total'];
                 $this->_sections['TriggerAll']['index'] += $this->_sections['TriggerAll']['step'], $this->_sections['TriggerAll']['iteration']++):
$this->_sections['TriggerAll']['rownum'] = $this->_sections['TriggerAll']['iteration'];
$this->_sections['TriggerAll']['index_prev'] = $this->_sections['TriggerAll']['index'] - $this->_sections['TriggerAll']['step'];
$this->_sections['TriggerAll']['index_next'] = $this->_sections['TriggerAll']['index'] + $this->_sections['TriggerAll']['step'];
$this->_sections['TriggerAll']['first']      = ($this->_sections['TriggerAll']['iteration'] == 1);
$this->_sections['TriggerAll']['last']       = ($this->_sections['TriggerAll']['iteration'] == $this->_sections['TriggerAll']['total']);
?>
										<option  value="<?php echo $this->_tpl_vars['TriggerAll'][$this->_sections['TriggerAll']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['TriggerAll'][$this->_sections['TriggerAll']['index']]['temp_title']; ?>
</option>
									<?php endfor; endif; ?>
						</select>

							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Status</label>
								<select name="txt_status" id="txt_status" class="form-control" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="0"  <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['status'] == 0): ?> selected="selected" <?php endif; ?>>Inactive</option>
							<option value="1"  <?php if ($this->_tpl_vars['TemplateEditDetails'][0]['status'] == 1): ?> selected="selected" <?php endif; ?>>Active</option>
						</select>

							</div>
						<!-- /.box-body -->
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="js/jquery.multiselect.js"></script>
<?php echo '
<script type="text/javascript">	
$("#txt_trigger").val([';  echo $this->_tpl_vars['TemplateEditDetails'][0]['trigger_id'];  echo '])
$(\'#txt_trigger\').multiselect({
		columns: 2,
		placeholder: \'Select Trigger\',
		selectAll: true,
		search: true
	});
	
function triggervalue(){
$("#triggerid").val($("#txt_trigger").val());
		 var val = [];
		
        $("#txt_trigger option:selected").each(function () {
            val.push(this.text);
		
        });
		$("#triggername").val(val.join(\',\'));
		 $( "#frmtemplate" ).submit();
			return true;
}	
</script>	
'; ?>