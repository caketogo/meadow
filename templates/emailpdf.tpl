{literal}
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
{/literal}
<div><img src="{$globalpath}images/logo.PNG" border="0" /></div>
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
					{section name="emails" loop=$EmailList}
						<tr>
							<td class="pdftd" width="10%">{$EmailList[emails].customers_id}</td>
							<td class="pdftd" width="30%">{$EmailList[emails].customers_email_address}</td>
							<td  class="pdftd" width="10%">{$EmailList[emails].orders_id}
							</td>
							<td class="pdftd" width="30%" style="text-align:center;">{$EmailList[emails].temp_name}</td>
							<td class="pdftd" width="20%" style="text-align:center; border-right:0px;">{$EmailList[emails].Schedule_date}</td>
						</tr>
					{sectionelse}
						<tr>
							<td colspan="3" align="center">No Factory's Found</td>
						</tr>
					{/section}
				</tbody>
			</table>
		
