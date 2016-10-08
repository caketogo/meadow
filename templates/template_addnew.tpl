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
					<form name="frmtemplate" id="frmtemplate" role="form" method="post"  onsubmit="return triggervalue()">
						<input type="hidden" name="hdaction" id="hdaction" value="1" />
						 <input type="hidden" name="triggerid" id="triggerid" value="">
          				  <input type="hidden" name="triggername" id="triggername" value="">
						<div class="box-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Title :</label>
								<input type="text" class="form-control" name="txt_title" id="txt_title" placeholder="Title" value="" required/>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Send Grid Email Template Id :</label>
								<select name="txt_tempid" id="txt_tempid" class="form-control" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="">Select Template</option>
							{section name="template" loop=$template_list}
								<option value="{$template_list[template].id}" data-sid="{$template_list[template].name}">{$template_list[template].name} - {$template_list[template].id}</option>
							{/section}
						</select>

							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Schedule :</label>
								<select name="schedule1" id="schedule1" class="form-control" style='width: 160px;overflow: hidden; margin-bottom: 5px;display: inline-block;' required>
									<option value="">Select . . .</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
									<option value="60">60</option>
								</select><select name="schedule2" id="schedule2" class="form-control" style='width: 160px;overflow: hidden; margin-bottom: 5px;display: inline-block;' required>
									<option value="">Select . . .</option>
									<option value="min">Min</option>
									<option value="hour">Hour</option>
									<option value="day">Day</option>
									<option value="week">Week</option>
									<option value="month">Month</option>
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
								<label for="exampleInputEmail1">Status : </label>
								<select name="txt_status" id="txt_status" class="form-control" style='width: 98%;overflow: hidden; margin-bottom: 5px;display: inline-block;margin-left: 5px;' required>
							<option value="0">Inactive</option>
							<option value="1">Active</option>
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