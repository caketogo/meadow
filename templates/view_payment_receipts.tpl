{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<!--<link href="signature/assets/jquery.signaturepad.css" rel="stylesheet">-->
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

		.add_more img{
			cursor:pointer;
		}
		
		.pad {
			border: 1px solid;
			padding: 10px;
		}
		.clearButton {
			list-style: outside none none;
		}
		.clearButton a{
			color: red !important;
			cursor: pointer;
			float: right;
			margin-right: 10%;
		}
		
		.pound-symbol {
			display:none;
			font-size: 24px;
			font-weight: bold;
			left: 40px;
			position: relative;
		}
    </style>

<script type="text/javascript">

	
	function getResults(searchType)  {
		$("#exporstsend_new").val('no');
		document.forms[document.forms.length-1].submit();
	}

	function ShiftPage(Page,Display)  {
	//loading('Processing');
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

</script>
{/literal}	
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
<section class="content-header">
		<h1>Payment Receipts</h1>
	</section>

<section class="content">
	<div class="row" >
		<div class="col-md-12">
				<div class="box box-primary">
				<div class="box-body table-responsive">
				
				 <form name="exportCSVPaymentForm" id="exportCSVPaymentForm" method="post">
					<input type="hidden" name="exporstCSV" id="exporstCSV" value="" />
				</form>	
				
				<form name="exportCSVPaymentsendmail" id="exportCSVPaymentsendmail" method="post">
					<input type="hidden" name="exporstsend" id="exporstsend" value="" />
					<input type="hidden" name="ctmemails" id="ctmemails" value="" />
				</form>	
				
				 <form name="view_payment_receipts" id="view_payment_receipts" method="post">
				
					<input type="hidden" name="Page" id="Page" />
					<input type="hidden" name="Display" id="Display" />
					<input type="hidden" name="sort" id="sort" value="" />
					<input type="hidden" name="order" id="order" />
					  
					  <input type="hidden" name="exporstsend_new" id="exporstsend_new" value="" />
					  
					  <div class="col-md-8">
						<div class="col-md-4">
						   <label for="exampleInputEmail1">Select Date Range: </label>
						<select name="get_payments_date_range" id="get_payments_date_range" onchange="getResults(this.value)" class="form-control container_type_customer" style=' overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' >
								<option value="0" {if $daterange eq '0'} selected="selected"{/if}>Select Date Range</option>
								<option value="today"  {if $daterange eq 'today'} selected="selected"{/if}>Today</option>
								<option value="7" {if $daterange eq '7'} selected="selected"{/if}>7 Days</option>
								<option value="30" {if $daterange eq '30'} selected="selected"{/if}>30 Days</option>									
								<option value="all" {if $daterange eq 'all'} selected="selected"{/if}>All</option>									
							</select>
						</div>
				</div>
				       	<div class="col-md-4">
							<a  href="javascript:void(0);" onclick="exportCSVPaymentReceipts();" title="Download all" class="btn bg-primary btn-primary margin">
									Export as CSV
							</a>
							
							<a  href="javascript:void(0);" onclick="exportCSVPaymentReceiptsEmail();" title="Download all" class="btn bg-primary btn-primary margin">
									 Send via Email
							</a>

<!--							<a  href="{$siteadmin_globalpath}paylist_download.php" title="Download all" class="btn bg-primary btn-primary margin">
									Export as CSV
							</a>
-->							</div>
							
					<table id="openTrigger" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th width="8%">Container Type</th>
								<th width="8%">Container Number</th>
								<th width="9%">Payment Date</th>
								<th width="8%">Payment Method</th>								
								<th width="8%">License Fee Amount</th>
								<th width="8%">Deposit Fee Amount</th>																
								<th width="8%">Miscellaneous Fee Amount</th>								
								<th width="8%">Penality Fee Amount</th>
								<th width="8%">Number of months paid for</th>								
								<th width="5%">Total Receipt Amount</th>								
								<!--<th width="5%">User ID</th>-->																
							</tr>
						</thead>
						
						<tbody class="inner_table">
                        {section name="payment" loop=$ViewPaymentReceiptList}
                          <tr>
                            <td width="6%">{$ViewPaymentReceiptList[payment].container_type}</td>
							<td width="6%">{$ViewPaymentReceiptList[payment].containerName}</td>
							<td width="7%">{$ViewPaymentReceiptList[payment].create_date}</td>
							<td width="7%">{$ViewPaymentReceiptList[payment].payment_type}</td>
							<td width="8%">{$ViewPaymentReceiptList[payment].license}</td>
							<td width="8%">{$ViewPaymentReceiptList[payment].deposit}</td>
							<td width="8%">{$ViewPaymentReceiptList[payment].miscellaneous}</td>
                            <td width="8%">{$ViewPaymentReceiptList[payment].penality}</td>
							<td width="8%">{if $ViewPaymentReceiptList[payment].total_month_paid eq ''} &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; - {else} &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  {$ViewPaymentReceiptList[payment].total_month_paid} {/if}</td>
							<td width="6%">{$ViewPaymentReceiptList[payment].total_amount_due}</td>
							<!--<td width="2%">Super ID</td>-->
                          </tr>
                        {sectionelse}
                          <tr>
                            <td colspan="7" align="center">No Payment Receipt Found</td>
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

<!--mail popup content start-->
<div id="mailPopup" class="modal fade modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">X</span></button>
                <h1 class="modal-title">Payment Receipt</h1>
              </div>
              <div class="modal-body">
							<form action="" method="post">
               <center>Enter Your Email ID&nbsp;&nbsp;&nbsp;<input type="text" name="popup-mail" id="popup-mail" style="color:#000;padding-left:10px;width:50%;"></center>
							 </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right" onclick="gomailpaymentreceipt();">Send</button>
                <!--<button type="button" class="btn btn-outline">Save changes</button>-->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
</div>
<!--mail popup content end -->

<!-- /.content-wrapper -->
{include file="includes/footer.tpl"}

<script src="{$siteadmin_globalpath}js/res/json2.js" type="text/javascript"></script>
<script src="{$siteadmin_globalpath}js/condition-builder.js" type="text/javascript"></script>
{literal}
    <script type="text/javascript">
		function exportCSVPaymentReceipts(){
			$("#exporstsend_new").val('yes');
			$("#view_payment_receipts").submit();
		}
		
		function exportCSVPaymentReceiptsEmail(){
		$('#mailPopup').modal('show');	
		}
		
		function gomailpaymentreceipt(){
		if(($("#popup-mail").val) != ''){
			$("#exporstsend").val('yes');
			var popupmail = $("#popup-mail").val();
			$("#ctmemails").val(popupmail);
			$("#exportCSVPaymentsendmail").submit();
			}
		}
		
		
    </script>
	<script src="signature/assets/json2.min.js"></script>
{/literal}	