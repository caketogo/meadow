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
			{section name="mapping" loop=$MappingDetails}
				<tr>
					<td width="25%">{$MappingDetails[mapping].templatetitle|ucfirst}</td>
					<td width="35%">{$MappingDetails[mapping].target_string|ucfirst}</td>
					<td width="35%">{$MappingDetails[mapping].replace_field1|ucfirst} - {$MappingDetails[mapping].replace_field2|ucfirst}</td>
					<td width="17%" style="text-align:center">
						<i class="fa fa-trash-o" onclick="DeleteMappingDetails('{$MappingDetails[mapping].id}');" style="color:#FF0000; font-size:16px; cursor:pointer;"></i>
					</td>
				</tr>
			{/section}
		</tbody> 
	</table>
	{if $intSearchPerPage}
		<table border="0" width="100%">
			<tr>
				<td class="odd-list-bg">{$intSearchPerPage}</td>
			</tr>
		</table>
	{/if}
</div>