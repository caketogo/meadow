<?php /* Smarty version 2.6.2, created on 2016-06-02 03:08:58
         compiled from edittrigger.tpl */ ?>
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

 function mapfields() {
 	var id = $(\'#field1\').val();
	loading(\'Processing\');
	$("#loadingimg").show();
	$(".query").html(\'\');
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace(\'class="col\', \'onchange="selectvalue(this)" class="col\');
			$(".query").html(\'\');
			$("#loadingimg").hide();
			rootflag=0;
			addqueryroot(\'.query\', true);
			$.fancybox.close();
    }});
 }
 
 function mapfields1() {
 	var id = $(\'#field1\').val();
	loading(\'Processing\');
	
 	var Res = $.ajax({
			type: "POST",
        	url: "ajaxformdata.php?action=getmapping&replacefield="+id,
        	success:function(){
        	var MappingFields = Res.responseText;
      		statement1 = MappingFields.replace(\'class="col\', \'onchange="selectvalue(this)" class="col\');
			
			addqueryroot1(\'.query\', false);
			$.fancybox.close();
			
    }});
 }
 
  function mappingtemplate(thisselect) {
 	var sh = $(\'option:selected\', thisselect).attr(\'data-sh\');
	var sid = $(\'option:selected\', thisselect).attr(\'data-sid\');
	var sf = $(\'option:selected\', thisselect).attr(\'data-sf\');
	var tid = $(\'option:selected\', thisselect).attr(\'data-id\');
	$("#sh").html(sh);
	$("#sf").html(sf);
	$("#tsh").val(sh);
	$("#tsid").val(sid);
	$("#tid").val(tid);
	$("#tsf").val(sf);
	

	
 }	 
</script>
'; ?>
	


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Trigger</h1>
		
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
						<div class="box-body">
							<div class="form-group">
								
								<div class="col-md-12">
								<label for="exampleInputEmail1">Name : </label>
							</div>	
								<div class="col-md-12">
								<input type="text" name="target" id="target" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required />
							
							</div>	
							
								<div class="col-md-12">
								<label for="exampleInputEmail1">Table: </label>
							</div>	
								
								<div class="col-md-12">
								
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
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1">Conditions:  <a href="javascript:void(0)" onclick="addrule()"><img class="add" src="js/res/add.png" alt="Add" /></a> </label>
								<img src="/images/loading.gif" width="40" style="display:none" id="loadingimg" /> 	
							</div>	
							
								<div class="query col-md-12">
								<?php echo $this->_tpl_vars['TriggerEditDetails'][0]['condition_html']; ?>

   								</div>
   
							
							</div>
							<div class="form-group">
							
								<div class="col-md-12">
								
								
								
								<input type="hidden" name="tsid" id="tsid"  value=""/>	
								<input type="hidden" name="tsh" id="tsh"  value=""/>	
								<input type="hidden" name="tsf" id="tsf"  value=""/>
								<input type="hidden" name="thtml" id="thtml"  value=""/>	
								<input type="hidden" name="tvalue" id="tvalue"  value=""/>
								<input type="hidden" name="tid" id="tid"  value=""/>	
								</div>
							</div>
							<div class="col-md-12">
								<label for="exampleInputEmail1">Status : </label>
							</div>	
								<div class="col-md-12">
									<select name="txt_status" id="txt_status" class="form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
										<option value="0"  <?php if ($this->_tpl_vars['TriggerEditDetails'][0]['status'] == 0): ?> selected="selected" <?php endif; ?>>Inactive</option>
										<option value="1"  <?php if ($this->_tpl_vars['TriggerEditDetails'][0]['status'] == 1): ?> selected="selected" <?php endif; ?>>Active</option>
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
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "includes/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/res/json2.js" type="text/javascript"></script>
<script src="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
js/condition-builder.js" type="text/javascript"></script>
<?php echo '
    <script type="text/javascript">
	
        $(document).ready(function () {
		rootflag =1;
            $(\'#btnCondition\').click(function () {
                var query = {};
                query = getCondition(\'.query > table\');
                //var l = JSON.stringify(query,null,4);
                var l = JSON.stringify(query);
                alert(l);
            });

            $(\'.btn-primary\').click(function () {
				k1=\'\';
				loading(\'Processing\');
				$(\'.query >table\').each(function(){
				var selectval = ($(this).prev(\'select\').val());
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
		   $("#field1").val(\'';  echo $this->_tpl_vars['TriggerEditDetails'][0]['tablename'];  echo '\')
			mapfields1();
		   $("#target").val(\'';  echo $this->_tpl_vars['TriggerEditDetails'][0]['temp_title'];  echo '\') 
		   mappingtemplate($("#target"))
        });
		function addrule(){
			 addqueryroot(\'.query\', true);
		}
    </script>
'; ?>
	