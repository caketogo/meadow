<select name="field2" id="field2" class="col form-control" style='width: 30%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;'>
	<option value="">Select field</option>
	{section name='fields' loop=$MapFields}
		<option value="{$MapFields[fields].Field}">{$MapFields[fields].Field|ucfirst}</option>
	{/section}
</select>