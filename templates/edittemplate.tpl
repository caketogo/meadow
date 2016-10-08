{include file="includes/header.tpl"}
{include file="includes/left_nav.tpl"}
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
						<input type="hidden" name="template_id" id="template_id" value="{$TemplateEditDetails[0].template_id}">
						<input type="hidden" name="triggerid" id="triggerid" value="">
          				  <input type="hidden" name="triggername" id="triggername" value="">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Title :</label>
								<input type="text" class="form-control" name="txt_title" id="txt_title" placeholder="Title" value="{$TemplateEditDetails[0].title}" required/>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Send Grid Email Template Id :</label>
									<select name="txt_tempid" id="txt_tempid" class="form-control" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="">Select Template</option>
							{section name="template" loop=$template_list}
								<option value="{$template_list[template].id}" data-sid="{$template_list[template].name}" {if $TemplateEditDetails[0].send_grid_email eq $template_list[template].id } selected {/if}>{$template_list[template].name} - {$template_list[template].id}</option>
							{/section}
						</select>

								
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Schedule :</label>
								<select name="schedule1" id="schedule1" class="form-control" style='width: 160px;overflow: hidden; margin-bottom: 5px;display: inline-block;' required>
									<option value="">Select . . .</option>
									<option value="1" {if $TemplateEditDetails[0].schedule_hour eq 1} selected="selected" {/if}>1</option>
									<option value="2" {if $TemplateEditDetails[0].schedule_hour eq 2} selected="selected" {/if}>2</option>
									<option value="3" {if $TemplateEditDetails[0].schedule_hour eq 3} selected="selected" {/if}>3</option>
									<option value="4" {if $TemplateEditDetails[0].schedule_hour eq 4} selected="selected" {/if}>4</option>
									<option value="5" {if $TemplateEditDetails[0].schedule_hour eq 5} selected="selected" {/if}>5</option>
									<option value="6" {if $TemplateEditDetails[0].schedule_hour eq 6} selected="selected" {/if}>6</option>
									<option value="7" {if $TemplateEditDetails[0].schedule_hour eq 7} selected="selected" {/if}>7</option>
									<option value="8" {if $TemplateEditDetails[0].schedule_hour eq 8} selected="selected" {/if}>8</option>
									<option value="9" {if $TemplateEditDetails[0].schedule_hour eq 9} selected="selected" {/if}>9</option>
									<option value="10" {if $TemplateEditDetails[0].schedule_hour eq 10} selected="selected" {/if}>10</option>
									<option value="11" {if $TemplateEditDetails[0].schedule_hour eq 11} selected="selected" {/if}>11</option>
									<option value="12" {if $TemplateEditDetails[0].schedule_hour eq 12} selected="selected" {/if}>12</option>
									<option value="13" {if $TemplateEditDetails[0].schedule_hour eq 13} selected="selected" {/if}>13</option>
									<option value="14" {if $TemplateEditDetails[0].schedule_hour eq 14} selected="selected" {/if}>14</option>
									<option value="15" {if $TemplateEditDetails[0].schedule_hour eq 15} selected="selected" {/if}>15</option>
									<option value="16" {if $TemplateEditDetails[0].schedule_hour eq 16} selected="selected" {/if}>16</option>
									<option value="17" {if $TemplateEditDetails[0].schedule_hour eq 17} selected="selected" {/if}>17</option>
									<option value="18" {if $TemplateEditDetails[0].schedule_hour eq 18} selected="selected" {/if}>18</option>
									<option value="19" {if $TemplateEditDetails[0].schedule_hour eq 19} selected="selected" {/if}>19</option>
									<option value="20" {if $TemplateEditDetails[0].schedule_hour eq 20} selected="selected" {/if}>20</option>
									<option value="21" {if $TemplateEditDetails[0].schedule_hour eq 21} selected="selected" {/if}>21</option>
									<option value="22" {if $TemplateEditDetails[0].schedule_hour eq 22} selected="selected" {/if}>22</option>
									<option value="23" {if $TemplateEditDetails[0].schedule_hour eq 23} selected="selected" {/if}>23</option>
									<option value="24" {if $TemplateEditDetails[0].schedule_hour eq 24} selected="selected" {/if}>24</option>
									<option value="25" {if $TemplateEditDetails[0].schedule_hour eq 25} selected="selected" {/if}>25</option>
									<option value="26" {if $TemplateEditDetails[0].schedule_hour eq 26} selected="selected" {/if}>26</option>
									<option value="27" {if $TemplateEditDetails[0].schedule_hour eq 27} selected="selected" {/if}>27</option>
									<option value="28" {if $TemplateEditDetails[0].schedule_hour eq 28} selected="selected" {/if}>28</option>
									<option value="29" {if $TemplateEditDetails[0].schedule_hour eq 29} selected="selected" {/if}>29</option>
									<option value="30" {if $TemplateEditDetails[0].schedule_hour eq 30} selected="selected" {/if}>30</option>
									<option value="31" {if $TemplateEditDetails[0].schedule_hour eq 31} selected="selected" {/if}>31</option>
									<option value="32" {if $TemplateEditDetails[0].schedule_hour eq 32} selected="selected" {/if}>32</option>
									<option value="33" {if $TemplateEditDetails[0].schedule_hour eq 33} selected="selected" {/if}>33</option>
									<option value="34" {if $TemplateEditDetails[0].schedule_hour eq 34} selected="selected" {/if}>34</option>
									<option value="35" {if $TemplateEditDetails[0].schedule_hour eq 35} selected="selected" {/if}>35</option>
									<option value="36" {if $TemplateEditDetails[0].schedule_hour eq 36} selected="selected" {/if}>36</option>
									<option value="37" {if $TemplateEditDetails[0].schedule_hour eq 37} selected="selected" {/if}>37</option>
									<option value="38" {if $TemplateEditDetails[0].schedule_hour eq 38} selected="selected" {/if}>38</option>
									<option value="39" {if $TemplateEditDetails[0].schedule_hour eq 39} selected="selected" {/if}>39</option>
									<option value="40" {if $TemplateEditDetails[0].schedule_hour eq 40} selected="selected" {/if}>40</option>
									<option value="41" {if $TemplateEditDetails[0].schedule_hour eq 41} selected="selected" {/if}>41</option>
									<option value="42" {if $TemplateEditDetails[0].schedule_hour eq 42} selected="selected" {/if}>42</option>
									<option value="43" {if $TemplateEditDetails[0].schedule_hour eq 43} selected="selected" {/if}>43</option>
									<option value="44" {if $TemplateEditDetails[0].schedule_hour eq 44} selected="selected" {/if}>44</option>
									<option value="45" {if $TemplateEditDetails[0].schedule_hour eq 45} selected="selected" {/if}>45</option>
									<option value="46" {if $TemplateEditDetails[0].schedule_hour eq 46} selected="selected" {/if}>46</option>
									<option value="47" {if $TemplateEditDetails[0].schedule_hour eq 47} selected="selected" {/if}>47</option>
									<option value="48" {if $TemplateEditDetails[0].schedule_hour eq 48} selected="selected" {/if}>48</option>
									<option value="49" {if $TemplateEditDetails[0].schedule_hour eq 49} selected="selected" {/if}>49</option>
									<option value="50" {if $TemplateEditDetails[0].schedule_hour eq 50} selected="selected" {/if}>50</option>
									<option value="51" {if $TemplateEditDetails[0].schedule_hour eq 51} selected="selected" {/if}>51</option>
									<option value="52" {if $TemplateEditDetails[0].schedule_hour eq 52} selected="selected" {/if}>52</option>
									<option value="53" {if $TemplateEditDetails[0].schedule_hour eq 53} selected="selected" {/if}>53</option>
									<option value="54" {if $TemplateEditDetails[0].schedule_hour eq 54} selected="selected" {/if}>54</option>
									<option value="55" {if $TemplateEditDetails[0].schedule_hour eq 55} selected="selected" {/if}>55</option>
									<option value="56" {if $TemplateEditDetails[0].schedule_hour eq 56} selected="selected" {/if}>56</option>
									<option value="57" {if $TemplateEditDetails[0].schedule_hour eq 57} selected="selected" {/if}>57</option>
									<option value="58" {if $TemplateEditDetails[0].schedule_hour eq 58} selected="selected" {/if}>58</option>
									<option value="59" {if $TemplateEditDetails[0].schedule_hour eq 59} selected="selected" {/if}>59</option>
									<option value="60" {if $TemplateEditDetails[0].schedule_hour eq 60} selected="selected" {/if}>60</option>
								</select><select name="schedule2" id="schedule2" class="form-control" style='width: 160px;overflow: hidden; margin-bottom: 5px;display: inline-block;' required>
									<option value="">Select . . .</option>
									<option value="min" {if $TemplateEditDetails[0].schedule_format eq 'min'} selected="selected" {/if}>Min</option>
									<option value="hour" {if $TemplateEditDetails[0].schedule_format eq 'hour'} selected="selected" {/if}>Hour</option>
									<option value="day" {if $TemplateEditDetails[0].schedule_format eq 'day'} selected="selected" {/if}>Day</option>
									<option value="week" {if $TemplateEditDetails[0].schedule_format eq 'week'} selected="selected" {/if}>Week</option>
									<option value="month" {if $TemplateEditDetails[0].schedule_format eq 'month'} selected="selected" {/if}>Month</option>
							</select>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Trigger : </label>
								<select name="txt_trigger" id="txt_trigger" class="form-control" multiple="multiple" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
									{section name="TriggerAll" loop=$TriggerAll}
										<option  value="{$TriggerAll[TriggerAll].id}">{$TriggerAll[TriggerAll].temp_title}</option>
									{/section}
						</select>

							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Status</label>
								<select name="txt_status" id="txt_status" class="form-control" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="0"  {if $TemplateEditDetails[0].status eq 0} selected="selected" {/if}>Inactive</option>
							<option value="1"  {if $TemplateEditDetails[0].status eq 1} selected="selected" {/if}>Active</option>
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
{include file="includes/footer.tpl"}

<script src="js/jquery.multiselect.js"></script>
{literal}
<script type="text/javascript">	
$("#txt_trigger").val([{/literal}{$TemplateEditDetails[0].trigger_id}{literal}])
$('#txt_trigger').multiselect({
		columns: 2,
		placeholder: 'Select Trigger',
		selectAll: true,
		search: true
	});
	
function triggervalue(){
$("#triggerid").val($("#txt_trigger").val());
		 var val = [];
		
        $("#txt_trigger option:selected").each(function () {
            val.push(this.text);
		
        });
		$("#triggername").val(val.join(','));
		 $( "#frmtemplate" ).submit();
			return true;
}	
</script>	
{/literal}