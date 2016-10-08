{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
{literal}
<script type="text/javascript">


function editlicenseperiod (id){

	if(id > 0) {
	//loading('Processing');
		window.location.href = "edit_license_period.php?id="+id;
	}
}
</script>
{/literal}
<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				{if $update_msg neq ''}
				
					{if $msgcode eq '5'}
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							{$update_msg}
						</div>
					{elseif $msgcode eq '1'}
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								{$update_msg}
						  	</div>
					{elseif $msgcode eq '2'}
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
								<h4><i class="icon fa fa-check"></i> Alert!</h4>
								{$update_msg}
						  	</div>
					{elseif $msgcode eq '3'}
							<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
							<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							{$update_msg}
						</div>
					 {else}		
						<div class="box box-primary">
							<span class="success_new">{$update_msg}</span>
						</div>
					{/if}		
				
			{/if}
			
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
			<input type="hidden" name="id" id="id"  value="{$LicensePeriod[length].id}"/>
			{section name="length" loop=$LicensePeriod}
			<div class="form-group">
				  <label class="control-label col-sm-2 col-xs-5" for="email">License Period Length(days):</label>
				  <div class="col-sm-5 col-xs-5">
						<input type="text" class="form-control" id="period_length_date" name="period_length_date" value="{$LicensePeriod[length].period_length_date}" readonly="readonly" />
				  </div>
				  <div class="col-sm-3">
				  		<i style="color:#00CC00; font-size:16px; cursor:pointer;" onclick="editlicenseperiod('{$LicensePeriod[length].id}');" class="fa fa-pencil-square-o"></i>
				  </div>
				</div>
					 {/section}
		</form>
		</div>
		</div>
	</section>
</div>
{include file="includes/footer.tpl"}