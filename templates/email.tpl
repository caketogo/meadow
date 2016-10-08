{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">
function ShiftPage(Page,Display)  {
loading('Processing');
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
loading('Processing');
  document.getElementById("sort").value = name;
  document.getElementById("Page").value = "{/literal}{$Page}{literal}";
  document.getElementById("Display").value = "{/literal}{$Display}{literal}";
  if(order == '' || order == "DESC") {
    document.getElementById("order").value = "ASC";
  } else {
    document.getElementById("order").value = "DESC";
  }
  document.overview.submit();
}
function SearchVal() {
loading('Processing');
  $( '#alpha' ).val('');
  document.overview.submit();
}
function ResetAll() {
	loading('Processing');
  $( '#customers_id' ).val('');
  $( '#customers_email_address' ).val('');
  $( '#orders_id' ).val('');
  $( '#temp_id' ).val('');
  $( '#temp_name' ).val('');
  $( '#schedule_from_date' ).val('');
  $( '#schedule_to_date' ).val('');
  $( '#assign_from_date' ).val('');
  $( '#assign_tp_date' ).val('');
	 
  $( '#alpha' ).val('');
  document.overview.submit();
}
function SearchAlpha(val) {
  $( '#customers_id' ).val('');
  $( '#customers_email_address' ).val('');
  $( '#orders_id' ).val('');
  $( '#temp_id' ).val('');
  $( '#temp_name' ).val('');
  $( '#schedule_from_date' ).val('');
  $( '#schedule_to_date' ).val('');
  $( '#assign_from_date' ).val('');
  $( '#assign_tp_date' ).val('');
  document.getElementById('alpha').value = val;
  document.overview.submit();
}

function downloadPdf() {
loading('Processing');
  var Page = "{/literal}{$Page}{literal}";
  var Display = "{/literal}{$Display}{literal}";
  var customers_id = "{/literal}{$customers_id}{literal}";
  var customers_email_address = "{/literal}{$customers_email_address}{literal}";
  var orders_id = "{/literal}{$orders_id}{literal}";
  var temp_id = "{/literal}{$temp_id}{literal}";
  var temp_name = "{/literal}{$temp_name}{literal}";
  var assign_from_date = "{/literal}{$assign_from_date}{literal}";
  var assign_to_date = "{/literal}{$assign_to_date}{literal}";
  var schedule_to_date = "{/literal}{$schedule_to_date}{literal}";
  var schedule_from_date = "{/literal}{$schedule_from_date}{literal}";

  var alpha = "{/literal}{$alpha}{literal}";
  document.location.href = "pdfemail.php?Page="+Page+"&Display="+Display+"&pdffile=1&customers_id="+customers_id+"&customers_email_address="+customers_email_address+"&temp_id="+temp_id+"&temp_name="+temp_name+"&assign_from_date="+assign_from_date+"&assign_to_date="+assign_to_date+"&schedule_to_date="+schedule_to_date+"&schedule_from_date="+schedule_from_date;
setTimeout(function(){ $.fancybox.close() }, 4000);
}

function downloadXls() {
loading('Processing');
  var Page = "{/literal}{$Page}{literal}";
  var Display = "{/literal}{$Display}{literal}";
  var customers_id = "{/literal}{$customers_id}{literal}";
  var customers_email_address = "{/literal}{$customers_email_address}{literal}";
  var orders_id = "{/literal}{$orders_id}{literal}";
  var temp_id = "{/literal}{$temp_id}{literal}";
  var temp_name = "{/literal}{$temp_name}{literal}";
  var assign_from_date = "{/literal}{$assign_from_date}{literal}";
  var assign_to_date = "{/literal}{$assign_to_date}{literal}";
  var schedule_to_date = "{/literal}{$schedule_to_date}{literal}";
  var schedule_from_date = "{/literal}{$schedule_from_date}{literal}";
  
  var alpha = "{/literal}{$alpha}{literal}";
  document.location.href = "xlsemail.php?Page="+Page+"&Display="+Display+"&pdffile=1&customers_id="+customers_id+"&customers_email_address="+customers_email_address+"&temp_id="+temp_id+"&temp_name="+temp_name+"&assign_from_date="+assign_from_date+"&assign_to_date="+assign_to_date+"&schedule_to_date="+schedule_to_date+"&schedule_from_date="+schedule_from_date;
  setTimeout(function(){ $.fancybox.close() }, 4000);
}
function printProject() {
  document.getElementById("printproject").style.display = 'block';
  var DocumentContainer = document.getElementById("printproject");
  var WindowObject = window.open("", "PrintWindow", "width=750,height=650,top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
  WindowObject.document.writeln(DocumentContainer.innerHTML);
  WindowObject.document.close();
  WindowObject.focus();
  WindowObject.print();
  document.getElementById("printproject").style.display = 'none';
}

 
</script>
{/literal}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Schedule Email List </h1>
		<!-- <ol class="breadcrumb">
			<li><a href="{$siteadmin_globalpath}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <input type="hidden" name="hdsort_ord" id="hdsort_ord" value="{$sort}" />
                <input type="hidden" name="hdorder" id="hdorder" value="{$order}" />
                <input type="hidden" name="alpha" id="alpha" value="{$alpha}" />
                <div class="table-responsive" style="border-radius:4px; border:1px solid #ccc;">
                  <div class="col-lg-12 voffset3"></div>
                  <div class="col-lg-12" >
                    <div class="col-lg-12 voffset3"></div>
                    <div class="col-lg-12" style="padding:0px;">
                      <div class="col-lg-12"  style="padding:0px;">
                        
                          <div class="col-lg-6">
                            <label>ID</label>
                            <input type="text" name="customers_id" id="customers_id" class="form-control" value="{$customers_id}"/>
                        
                          </div>
                          <div class="col-lg-6">
                            <label>Email</label>
                            <input type="text" name="customers_email_address" id="customers_email_address" class="form-control" value="{$customers_email_address}" />
                          </div>
                        
                          <div class="col-lg-6">
                            <label>Orders</label>
                            <input type="text" name="orders_id" id="orders_id" class="form-control" value="{$orders_id}" />
                          </div>
						  
						   <div class="col-lg-6">
                            <label>Template id</label>
                            <input type="text" name="temp_id" id="temp_id" class="form-control" value="{$temp_id}" />
                          </div>
						  
						  <div class="col-lg-6">
                            <label>Template Name</label>
                            <input type="text" name="temp_name" id="temp_name" class="form-control" value="{$temp_name}" />
                          </div>
						  
						 
						  
                          
						  
						  
						  
						  
						  

                  
					  
					  
						  
						  <div class="col-lg-6">
                            <div class="pull-left" style="width:100%">
                              <label>Date</label>
                            </div>
                            <div class="pull-left">
                              <div class='input-group date' id='datetimepicker1' style="width:120px">
                                <input type='text' class="form-control" name="assign_from_date" id="assign_from_date" value="{$assign_from_date}" />
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
                                <input type='text' class="form-control" name="assign_to_date" id="assign_to_date" value="{$assign_to_date}" />
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
                                <input type='text' class="form-control" name="schedule_from_date" id="schedule_from_date" value="{$schedule_from_date}" />
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
                                <input type='text' class="form-control" name="schedule_to_date" id="schedule_to_date" value="{$schedule_to_date}" />
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
                              <a onClick="Sort('customers_id','{$customers_idsort}');" style="cursor:pointer"> 
                                {if $customers_idsort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $customers_idsort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
                          <th width="20%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left" style="padding:0px;">Email</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('customers_email_address','{$customers_email_addresssort}');" style="cursor:pointer"> 
                                {if $customers_email_addresssort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $customers_email_addresssort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
                          <th width="10%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left " style="padding:0px;">Orders</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('orders_id','{$orders_idsort}');" style="cursor:pointer"> 
                                {if $orders_idsort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $orders_idsort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
                          <th width="20%">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 text-left" style="padding:0px;">Template id</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('temp_id','{$temp_idsort}');" style="cursor:pointer"> 
                                {if $temp_idsort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $temp_idsort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
                          <th width="20%">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7 text-left" style="padding:0px;">Template Name</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('temp_name','{$temp_namesort}');" style="cursor:pointer"> 
                                {if $temp_namesort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $temp_namesort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
						  <th width="10%">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7 text-left" style="padding:0px;">Date</a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('assign_date','{$assign_datesort}');" style="cursor:pointer"> 
                                {if $tassign_datesort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $assign_datesort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
						  
						    <th width="10%">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-7 text-left" style="padding:0px;">Schedule </a></div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right" style="padding:0px;">
                              <a onClick="Sort('Schedule_date','{$Schedule_datesort}');" style="cursor:pointer"> 
                                {if $Schedule_datesort eq "ASC"}
                                  <img src="images/sort_asc.png" id="orderimg">
                                {elseif $Schedule_datesort eq "DESC"}
                                  <img src="images/sort_desc.png" id="orderimg">                                          
                                {else}
                                  <img src="images/sort_both.png" id="orderimg">
                                {/if}
                              </a>
                            </div>
                          </th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        {section name="emails" loop=$EmailList}

                          <tr>
                            <!--<td width="1%"  class="text-center"><input type="checkbox" class="case" name="select_{$ProjectList[project].project_id}" id="select_{$ProjectList[project].project_id}" value="{$ProjectList[project].project_id}" /></td>-->
                            <td width="10%">{$EmailList[emails].customers_id}</td>
							<td width="20%">{$EmailList[emails].customers_email_address}</td>
							<td width="10%">{$EmailList[emails].orders_id}</td>
							<td width="10%">{$EmailList[emails].temp_id}</td>
							<td width="30%">{$EmailList[emails].temp_name}</td>
							<td width="10%">{$EmailList[emails].assign_date}</td>
							<td width="10%">{$EmailList[emails].Schedule_date}</td>
							                          
                          </tr>
                        {sectionelse}
                          <tr>
                            <td colspan="7" align="center">No Email Found</td>
                          </tr>
                        {/section}
                      </tbody>
                    </table>
					
					{if $intEmailPerPage}
                    <table border="0" width="100%">
                      <tr>
                        <td class="odd-list-bg">{$intEmailPerPage}</td>
                      </tr>
                    </table>
                  {/if}
					</div>
                 
                </div>
              </form>
			  
			
		</div>
	</div>
</section>
</div>
<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}