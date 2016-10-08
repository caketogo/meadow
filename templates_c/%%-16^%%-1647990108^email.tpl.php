<?php /* Smarty version 2.6.2, created on 2016-06-20 03:36:30
         compiled from email.tpl */ ?>
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
function ShiftPage(Page,Display)  {
loading(\'Processing\');
  if(document.getElementById("sort") && document.getElementById("hdsort_ord")) {
    document.getElementById("sort").value = document.getElementById("hdsort_ord").value;
    document.getElementById("order").value = document.getElementById("hdorder").value;
  }
  if(document.getElementById("modelbx")){
    document.forms[1].Page.value=Page;
    document.forms[1].submit();
  } 
  document.forms[document.forms.length-1].Page.value=Page;
  document.forms[document.forms.length-1].submit();
}

function Sort(name,order) {
loading(\'Processing\');
  document.getElementById("sort").value = name;
  document.getElementById("Page").value = "';  echo $this->_tpl_vars['Page'];  echo '";
  document.getElementById("Display").value = "';  echo $this->_tpl_vars['Display'];  echo '";
  if(order == \'\' || order == "DESC") {
    document.getElementById("order").value = "ASC";
  } else {
    document.getElementById("order").value = "DESC";
  }
  document.overview.submit();
}
function SearchVal() {
loading(\'Processing\');
  $( \'#alpha\' ).val(\'\');
  document.overview.submit();
}
function ResetAll() {
	loading(\'Processing\');
  $( \'#customers_id\' ).val(\'\');
  $( \'#customers_email_address\' ).val(\'\');
  $( \'#orders_id\' ).val(\'\');
  $( \'#temp_id\' ).val(\'\');
  $( \'#temp_name\' ).val(\'\');
  $( \'#schedule_from_date\' ).val(\'\');
  $( \'#schedule_to_date\' ).val(\'\');
  $( \'#assign_from_date\' ).val(\'\');
  $( \'#assign_tp_date\' ).val(\'\');
	 
  $( \'#alpha\' ).val(\'\');
  document.overview.submit();
}
function SearchAlpha(val) {
  $( \'#customers_id\' ).val(\'\');
  $( \'#customers_email_address\' ).val(\'\');
  $( \'#orders_id\' ).val(\'\');
  $( \'#temp_id\' ).val(\'\');
  $( \'#temp_name\' ).val(\'\');
  $( \'#schedule_from_date\' ).val(\'\');
  $( \'#schedule_to_date\' ).val(\'\');
  $( \'#assign_from_date\' ).val(\'\');
  $( \'#assign_tp_date\' ).val(\'\');
  document.getElementById(\'alpha\').value = val;
  document.overview.submit();
}

function downloadPdf() {
loading(\'Processing\');
  var Page = "';  echo $this->_tpl_vars['Page'];  echo '";
  var Display = "';  echo $this->_tpl_vars['Display'];  echo '";
  var customers_id = "';  echo $this->_tpl_vars['customers_id'];  echo '";
  var customers_email_address = "';  echo $this->_tpl_vars['customers_email_address'];  echo '";
  var orders_id = "';  echo $this->_tpl_vars['orders_id'];  echo '";
  var temp_id = "';  echo $this->_tpl_vars['temp_id'];  echo '";
  var temp_name = "';  echo $this->_tpl_vars['temp_name'];  echo '";
  var assign_from_date = "';  echo $this->_tpl_vars['assign_from_date'];  echo '";
  var assign_to_date = "';  echo $this->_tpl_vars['assign_to_date'];  echo '";
  var schedule_to_date = "';  echo $this->_tpl_vars['schedule_to_date'];  echo '";
  var schedule_from_date = "';  echo $this->_tpl_vars['schedule_from_date'];  echo '";

  var alpha = "';  echo $this->_tpl_vars['alpha'];  echo '";
  document.location.href = "pdfemail.php?Page="+Page+"&Display="+Display+"&pdffile=1&customers_id="+customers_id+"&customers_email_address="+customers_email_address+"&temp_id="+temp_id+"&temp_name="+temp_name+"&assign_from_date="+assign_from_date+"&assign_to_date="+assign_to_date+"&schedule_to_date="+schedule_to_date+"&schedule_from_date="+schedule_from_date;
setTimeout(function(){ $.fancybox.close() }, 4000);
}

function downloadXls() {
loading(\'Processing\');
  var Page = "';  echo $this->_tpl_vars['Page'];  echo '";
  var Display = "';  echo $this->_tpl_vars['Display'];  echo '";
  var customers_id = "';  echo $this->_tpl_vars['customers_id'];  echo '";
  var customers_email_address = "';  echo $this->_tpl_vars['customers_email_address'];  echo '";
  var orders_id = "';  echo $this->_tpl_vars['orders_id'];  echo '";
  var temp_id = "';  echo $this->_tpl_vars['temp_id'];  echo '";
  var temp_name = "';  echo $this->_tpl_vars['temp_name'];  echo '";
  var assign_from_date = "';  echo $this->_tpl_vars['assign_from_date'];  echo '";
  var assign_to_date = "';  echo $this->_tpl_vars['assign_to_date'];  echo '";
  var schedule_to_date = "';  echo $this->_tpl_vars['schedule_to_date'];  echo '";
  var schedule_from_date = "';  echo $this->_tpl_vars['schedule_from_date'];  echo '";
  
  var alpha = "';  echo $this->_tpl_vars['alpha'];  echo '";
  document.location.href = "xlsemail.php?Page="+Page+"&Display="+Display+"&pdffile=1&customers_id="+customers_id+"&customers_email_address="+customers_email_address+"&temp_id="+temp_id+"&temp_name="+temp_name+"&assign_from_date="+assign_from_date+"&assign_to_date="+assign_to_date+"&schedule_to_date="+schedule_to_date+"&schedule_from_date="+schedule_from_date;
  setTimeout(function(){ $.fancybox.close() }, 4000);
}
function printProject() {
  document.getElementById("printproject").style.display = \'block\';
  var DocumentContainer = document.getElementById("printproject");
  var WindowObject = window.open("", "PrintWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
  WindowObject.document.writeln(DocumentContainer.innerHTML);
  WindowObject.document.close();
  WindowObject.focus();
  WindowObject.print();
  document.getElementById("printproject").style.display = \'none\';
}

 
</script>
'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Schedule Email List </h1>
		<!-- <ol class="breadcrumb">
			<li><a href="<?php echo $this->_tpl_vars['siteadmin_globalpath']; ?>
"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Data tables</li>
		</ol> -->
	</section>

<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="text-right pull-right col-lg-12">
                <img width="16" height="16" border="0" id="cursor_hide" onclick="downloadXls();" style="cursor:pointer" src="images/excel-icon.png">&nbsp;
                <img width="16" height="16" border="0" id="cursor_hide" onclick="downloadPdf();" style="cursor:pointer" src="images/pdf-icons.png">&nbsp;
               
                
              </div>
		  
	
              <form name="overview" id="overview" method="get">
                <input type="hidden" name="hdAction" id="hdAction" />
                <input type="hidden" name="field_id" id="field_id" />
                <input type="hidden" name="delete_pid" id="delete_pid" />
                <input type="hidden" name="delete_accountid" id="delete_accountid" />
                <input type="hidden" name="Page" id="Page" />
                <input type="hidden" name="Display" id="Display" />
                <input type="hidden" name="sort" id="sort" value="" />
                <input type="hidden" name="order" id="order" />
                <input type="hidden" name="hdsort_ord" id="hdsort_ord" value="<?php echo $this->_tpl_vars['sort']; ?>
" />
                <input type="hidden" name="hdorder" id="hdorder" value="<?php echo $this->_tpl_vars['order']; ?>
" />
                <input type="hidden" name="alpha" id="alpha" value="<?php echo $this->_tpl_vars['alpha']; ?>
" />
                <div class="table-responsive" style="border-radius:4px; border:1px solid #ccc;">
                  <div class="col-lg-12 voffset3"></div>
                  <div class="col-lg-12" >
                    <div class="col-lg-12 voffset3"></div>
                    <div class="col-lg-12" style="padding:0px;">
                      <div class="col-lg-12"  style="padding:0px;">
                        
                          <div class="col-lg-6">
                            <label>ID</label>
                            <input type="text" name="customers_id" id="customers_id" class="form-control" value="<?php echo $this->_tpl_vars['customers_id']; ?>
"/>
                        
                          </div>
                          <div class="col-lg-6">
                            <label>Email</label>
                            <input type="text" name="customers_email_address" id="customers_email_address" class="form-control" value="<?php echo $this->_tpl_vars['customers_email_address']; ?>
" />
                          </div>
                        
                          <div class="col-lg-6">
                            <label>Orders</label>
                            <input type="text" name="orders_id" id="orders_id" class="form-control" value="<?php echo $this->_tpl_vars['orders_id']; ?>
" />
                          </div>
						  
						   <div class="col-lg-6">
                            <label>Template id</label>
                            <input type="text" name="temp_id" id="temp_id" class="form-control" value="<?php echo $this->_tpl_vars['temp_id']; ?>
" />
                          </div>
						  
						  <div class="col-lg-6">
                            <label>Template Name</label>
                            <input type="text" name="temp_name" id="temp_name" class="form-control" value="<?php echo $this->_tpl_vars['temp_name']; ?>
" />
                          </div>
						  
						 
						  
                          
						  
						  
						  
						  
						  

                  
					  
					  
						  
						  <div class="col-lg-6">
                            <div class="pull-left" style="width:100%">
                              <label>Date</label>
                            </div>
                            <div class="pull-left">
                              <div class='input-group date' id='datetimepicker1' style="width:120px">
                                <input type='text' class="form-control" name="assign_from_date" id="assign_from_date" value="<?php echo $this->_tpl_vars['assign_from_date']; ?>
" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div> 
                            <div class="pull-left">
                              &nbsp;To&nbsp; 
                            </div>
                            <div class="pull-left">
                              <div class='input-group date' id='datetimepicker1' style="width:120px">
                                <input type='text' class="form-control" name="assign_to_date" id="assign_to_date" value="<?php echo $this->_tpl_vars['assign_to_date']; ?>
" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
						  
						  <div class="col-lg-6">
                            <div class="pull-left" style="width:100%">
                              <label>Schedule</label>
                            </div>
                            <div class="pull-left">
                              <div class='input-group date' id='datetimepicker1' style="width:120px">
                                <input type='text' class="form-control" name="schedule_from_date" id="schedule_from_date" value="<?php echo $this->_tpl_vars['schedule_from_date']; ?>
" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div> 
                            <div class="pull-left">
                              &nbsp;To&nbsp; 
                            </div>
                            <div class="pull-left">
                              <div class='input-group date' id='datetimepicker1' style="width:120px">
                                <input type='text' class="form-control" name="schedule_to_date" id="schedule_to_date" value="<?php echo $this->_tpl_vars['schedule_to_date']; ?>
" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                      
                      
                        
                      
                      </div>
                      <div class="col-lg-12 voffset3"></div>
                      <div class="col-lg-12" style="padding:0px;">
                      
                      <div class="col-lg-5 pull-right text-right" style="padding-top:15px;">
                        <button class="btn btn-primary" type="submit" onclick="SearchVal();">Search</button>
                        <button class="btn btn-primary" type="button" onclick="ResetAll();">Reset</button>
                      </div>
                    </div>
              
                  </div>
                  <div class="col-lg-12 voffset3"></div>
				  <div class="box table-responsive" id="map">
                      <table id="myTable" class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <!--<th class="no-sort" width="1%"><input type="checkbox" name="selectall" id="selectall" /></th>-->
                          <th width="10%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left" style="padding:0px;">ID</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('customers_id','<?php echo $this->_tpl_vars['customers_idsort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['customers_idsort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['customers_idsort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
                          <th width="20%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left" style="padding:0px;">Email</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('customers_email_address','<?php echo $this->_tpl_vars['customers_email_addresssort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['customers_email_addresssort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['customers_email_addresssort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
                          <th width="10%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left " style="padding:0px;">Orders</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('orders_id','<?php echo $this->_tpl_vars['orders_idsort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['orders_idsort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['orders_idsort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
                          <th width="20%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left" style="padding:0px;">Template id</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('temp_id','<?php echo $this->_tpl_vars['temp_idsort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['temp_idsort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['temp_idsort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
                          <th width="20%">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7 text-left" style="padding:0px;">Template Name</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('temp_name','<?php echo $this->_tpl_vars['temp_namesort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['temp_namesort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['temp_namesort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
						  <th width="10%">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7 text-left" style="padding:0px;">Date</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('assign_date','<?php echo $this->_tpl_vars['assign_datesort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['tassign_datesort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['assign_datesort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
						  
						    <th width="10%">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7 text-left" style="padding:0px;">Schedule </a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('Schedule_date','<?php echo $this->_tpl_vars['Schedule_datesort']; ?>
');" style="cursor:pointer"> 
                                <?php if ($this->_tpl_vars['Schedule_datesort'] == 'ASC'): ?>
                                  <img src="images/sort_asc.png" id="orderimg">
                                <?php elseif ($this->_tpl_vars['Schedule_datesort'] == 'DESC'): ?>
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                <?php else: ?>
                                  <img src="images/sort_both.png" id="orderimg">
                                <?php endif; ?>
                              </a>
                            </div>
                          </th>
                         
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
                            <!--<td width="1%"  class="text-center"><input type="checkbox" class="case" name="select_<?php echo $this->_tpl_vars['ProjectList'][$this->_sections['project']['index']]['project_id']; ?>
" id="select_<?php echo $this->_tpl_vars['ProjectList'][$this->_sections['project']['index']]['project_id']; ?>
" value="<?php echo $this->_tpl_vars['ProjectList'][$this->_sections['project']['index']]['project_id']; ?>
" /></td>-->
                            <td width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['customers_id']; ?>
</td>
							<td width="20%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['customers_email_address']; ?>
</td>
							<td width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['orders_id']; ?>
</td>
							<td width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['temp_id']; ?>
</td>
							<td width="30%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['temp_name']; ?>
</td>
							<td width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['assign_date']; ?>
</td>
							<td width="10%"><?php echo $this->_tpl_vars['EmailList'][$this->_sections['emails']['index']]['Schedule_date']; ?>
</td>
							                          
                          </tr>
                        <?php endfor; else: ?>
                          <tr>
                            <td colspan="7" align="center">No Email Found</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
					
					<?php if ($this->_tpl_vars['intEmailPerPage']): ?>
                    <table border="0" width="100%">
                      <tr>
                        <td class="odd-list-bg"><?php echo $this->_tpl_vars['intEmailPerPage']; ?>
</td>
                      </tr>
                    </table>
                  <?php endif; ?>
					</div>
                 
                </div>
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