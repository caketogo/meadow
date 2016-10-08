var siteadminglobalpath = 'http://sns-centos/listedo/siteadmin/';
function loadcountryvalue(id) {
	document.frmassignlang.country_id.value = id;
	document.frmassignlang.submit();
}
function validate_countries(pageact) {
	if(document.getElementById("txt_country_name_en").value == "") {
		$("#div_country_name_en").addClass("has-error");
		document.getElementById("lbl_country_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in english is mandatory.';
		document.getElementById("lbl_country_name_en").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_country_name_en").removeClass("has-error");
		document.getElementById("lbl_country_name_en").innerHTML='';
		document.getElementById("lbl_country_name_en").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_country_name_fr").value == "") {
		$("#div_country_name_fr").addClass("has-error");
		document.getElementById("lbl_country_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in french is mandatory.';
		document.getElementById("lbl_country_name_fr").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_country_name_fr").removeClass("has-error");
		document.getElementById("lbl_country_name_fr").innerHTML='';
		document.getElementById("lbl_country_name_fr").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_country_name_gr").value == "") {
		$("#div_country_name_gr").addClass("has-error");
		document.getElementById("lbl_country_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in german is mandatory.';
		document.getElementById("lbl_country_name_gr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_country_name_gr").removeClass("has-error");
		document.getElementById("lbl_country_name_gr").innerHTML='';
		document.getElementById("lbl_country_name_gr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_country_name_rs").value == "") {
		$("#div_country_name_rs").addClass("has-error");
		document.getElementById("lbl_country_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in russian is mandatory.';
		document.getElementById("lbl_country_name_rs").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_country_name_rs").removeClass("has-error");
		document.getElementById("lbl_country_name_rs").innerHTML='';
		document.getElementById("lbl_country_name_rs").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_country_name_sp").value == "") {
		$("#div_country_name_sp").addClass("has-error");
		document.getElementById("lbl_country_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in spanish is mandatory.';
		document.getElementById("lbl_country_name_sp").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_country_name_sp").removeClass("has-error");
		document.getElementById("lbl_country_name_sp").innerHTML='';
		document.getElementById("lbl_country_name_sp").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_country_name_ar").value == "") {
		$("#div_country_name_ar").addClass("has-error");
		document.getElementById("lbl_country_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in arabic is mandatory.';
		document.getElementById("lbl_country_name_ar").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_country_name_ar").removeClass("has-error");
		document.getElementById("lbl_country_name_ar").innerHTML='';
		document.getElementById("lbl_country_name_ar").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_country_name_ur").value == "") {
		$("#div_country_name_ur").addClass("has-error");
		document.getElementById("lbl_country_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Country name in urdu is mandatory.';
		document.getElementById("lbl_country_name_ur").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_country_name_ur").removeClass("has-error");
		document.getElementById("lbl_country_name_ur").innerHTML='';
		document.getElementById("lbl_country_name_ur").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_country_urlslug").value == "") {
		$("#div_country_urlslug").addClass("has-error");
		document.getElementById("lbl_country_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Country slug is mandatory.';
		document.getElementById("lbl_country_urlslug").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_country_urlslug").removeClass("has-error");
		document.getElementById("lbl_country_urlslug").innerHTML='';
		document.getElementById("lbl_country_urlslug").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_en").value == "") {
		$("#div_cntrycap_name_en").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in english is mandatory.';
		document.getElementById("lbl_cntrycap_name_en").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_cntrycap_name_en").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_en").innerHTML='';
		document.getElementById("lbl_cntrycap_name_en").style.display="none";
		var err9 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_fr").value == "") {
		$("#div_cntrycap_name_fr").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in french is mandatory.';
		document.getElementById("lbl_cntrycap_name_fr").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_cntrycap_name_fr").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_fr").innerHTML='';
		document.getElementById("lbl_cntrycap_name_fr").style.display="none";
		var err10 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_gr").value == "") {
		$("#div_cntrycap_name_gr").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in german is mandatory.';
		document.getElementById("lbl_cntrycap_name_gr").style.display="block";
		var err11 = 1;
	}
	else {
		$("#div_cntrycap_name_gr").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_gr").innerHTML='';
		document.getElementById("lbl_cntrycap_name_gr").style.display="none";
		var err11 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_rs").value == "") {
		$("#div_cntrycap_name_rs").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in russian is mandatory.';
		document.getElementById("lbl_cntrycap_name_rs").style.display="block";
		var err12 = 1;
	}
	else {
		$("#div_cntrycap_name_rs").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_rs").innerHTML='';
		document.getElementById("lbl_cntrycap_name_rs").style.display="none";
		var err12 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_sp").value == "") {
		$("#div_cntrycap_name_sp").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in spanish is mandatory.';
		document.getElementById("lbl_cntrycap_name_sp").style.display="block";
		var err13 = 1;
	}
	else {
		$("#div_cntrycap_name_sp").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_sp").innerHTML='';
		document.getElementById("lbl_cntrycap_name_sp").style.display="none";
		var err13 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_ar").value == "") {
		$("#div_cntrycap_name_ar").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in arabic is mandatory.';
		document.getElementById("lbl_cntrycap_name_ar").style.display="block";
		var err14 = 1;
	}
	else {
		$("#div_cntrycap_name_ar").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_ar").innerHTML='';
		document.getElementById("lbl_cntrycap_name_ar").style.display="none";
		var err14 = 0;
	}
	if(document.getElementById("txt_cntrycap_name_ur").value == "") {
		$("#div_cntrycap_name_ur").addClass("has-error");
		document.getElementById("lbl_cntrycap_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in urdu is mandatory.';
		document.getElementById("lbl_cntrycap_name_ur").style.display="block";
		var err15 = 1;
	}
	else {
		$("#div_cntrycap_name_ur").removeClass("has-error");
		document.getElementById("lbl_cntrycap_name_ur").innerHTML='';
		document.getElementById("lbl_cntrycap_name_ur").style.display="none";
		var err15 = 0;
	}
	if(document.getElementById("txt_cntryxaxis").value == "") {
		$("#div_cntryxaxis").addClass("has-error");
		document.getElementById("lbl_cntryxaxis").innerHTML='<i class="fa fa-times-circle-o"></i> Country X AXIS value is mandatory.';
		document.getElementById("lbl_cntryxaxis").style.display="block";
		var err16 = 1;
	}
	else {
		$("#div_cntryxaxis").removeClass("has-error");
		document.getElementById("lbl_cntryxaxis").innerHTML='';
		document.getElementById("lbl_cntryxaxis").style.display="none";
		var err16 = 0;
	}
	if(document.getElementById("txt_cntryyaxis").value == "") {
		$("#div_cntryyaxis").addClass("has-error");
		document.getElementById("lbl_cntryyaxis").innerHTML='<i class="fa fa-times-circle-o"></i> Country capital in urdu is mandatory.';
		document.getElementById("lbl_cntryyaxis").style.display="block";
		var err17 = 1;
	}
	else {
		$("#div_cntryyaxis").removeClass("has-error");
		document.getElementById("lbl_cntryyaxis").innerHTML='';
		document.getElementById("lbl_cntryyaxis").style.display="none";
		var err17 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0") && (err11 == "0") && (err12 == "0") && (err13 == "0") && (err14 == "0") && (err15 == "0") && (err16 == "0") && (err17 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editcountry";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addcountry";
		}
		return true;
	}
	else {
		return false;
	}
}

function validate_maincategories() {
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err7 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0"))	{
		document.getElementById("hdaction").value = "editmaincate";
		return true;
	}
	else {
		return false;
	}
}
function validate_motorcategories(pageact) {
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Category name in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_urlslug").value == "") {
		$("#div_category_urlslug").addClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Category url slug is mandatory.';
		document.getElementById("lbl_category_urlslug").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_urlslug").removeClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='';
		document.getElementById("lbl_category_urlslug").style.display="none";
		var err8 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editmotorcate";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addmotorcate";
		}
		return true;
	}
	else {
		return false;
	}
}
function deletemotorcategory(id) {
	if(id != "") {
		document.getElementById("hdaction").value = "deletemotorcate";
		document.getElementById("category_id").value = id;
		document.frmmotorcategories.submit();
	}
}
function deletemotormake(id) {
	if(id != "") {
		document.getElementById("hdaction").value = "deletemotormake";
		document.getElementById("make_id").value = id;
		document.frmmotormakes.submit();
	}
}


function deletelanguage(id) {
	if(id != "") {
		document.getElementById("hdaction").value = "deletelanguage";
		document.getElementById("language_id").value = id;
		document.frmlanguage.submit();
	}
}

function deletecity(id) {
	if(id != "") {
		document.getElementById("hdaction").value = "deletecity";
		document.getElementById("city_id").value = id;
		document.frmcity.submit();
	}
}

function validate_motormakes(pageact) {
	if(document.getElementById("txt_motor_make_catid").value == "") {
		$("#div_motor_make_catid").addClass("has-error");
		document.getElementById("lbl_motor_make_catid").innerHTML='<i class="fa fa-times-circle-o"></i> Motor category is mandatory.';
		document.getElementById("lbl_motor_make_catid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_motor_make_catid").removeClass("has-error");
		document.getElementById("lbl_motor_make_catid").innerHTML='';
		document.getElementById("lbl_motor_make_catid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_motor_make_name_en").value == "") {
		$("#div_motor_make_name_en").addClass("has-error");
		document.getElementById("lbl_motor_make_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in english is mandatory.';
		document.getElementById("lbl_motor_make_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_motor_make_name_en").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_en").innerHTML='';
		document.getElementById("lbl_motor_make_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_motor_make_name_fr").value == "") {
		$("#div_motor_make_name_fr").addClass("has-error");
		document.getElementById("lbl_motor_make_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in french is mandatory.';
		document.getElementById("lbl_motor_make_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_motor_make_name_fr").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_fr").innerHTML='';
		document.getElementById("lbl_motor_make_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_motor_make_name_gr").value == "") {
		$("#div_motor_make_name_gr").addClass("has-error");
		document.getElementById("lbl_motor_make_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in german is mandatory.';
		document.getElementById("lbl_motor_make_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_motor_make_name_gr").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_gr").innerHTML='';
		document.getElementById("lbl_motor_make_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_motor_make_name_rs").value == "") {
		$("#div_motor_make_name_rs").addClass("has-error");
		document.getElementById("lbl_motor_make_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in russian is mandatory.';
		document.getElementById("lbl_motor_make_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_motor_make_name_rs").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_rs").innerHTML='';
		document.getElementById("lbl_motor_make_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_motor_make_name_sp").value == "") {
		$("#div_motor_make_name_sp").addClass("has-error");
		document.getElementById("lbl_motor_make_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in spanish is mandatory.';
		document.getElementById("lbl_motor_make_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_motor_make_name_sp").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_sp").innerHTML='';
		document.getElementById("lbl_motor_make_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_motor_make_name_ar").value == "") {
		$("#div_motor_make_name_ar").addClass("has-error");
		document.getElementById("lbl_motor_make_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in arabic is mandatory.';
		document.getElementById("lbl_motor_make_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_motor_make_name_ar").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_ar").innerHTML='';
		document.getElementById("lbl_motor_make_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_motor_make_name_ur").value == "") {
		$("#div_motor_make_name_ur").addClass("has-error");
		document.getElementById("lbl_motor_make_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make in urdu is mandatory.';
		document.getElementById("lbl_motor_make_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_motor_make_name_ur").removeClass("has-error");
		document.getElementById("lbl_motor_make_name_ur").innerHTML='';
		document.getElementById("lbl_motor_make_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_motor_make_urlslug").value == "") {
		$("#div_motor_make_urlslug").addClass("has-error");
		document.getElementById("lbl_motor_make_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make url slug is mandatory.';
		document.getElementById("lbl_motor_make_urlslug").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_motor_make_urlslug").removeClass("has-error");
		document.getElementById("lbl_motor_make_urlslug").innerHTML='';
		document.getElementById("lbl_motor_make_urlslug").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editmotormake";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addmotormake";
		}
		return true;
	}
	else {
		return false;
	}
}

function validate_motormmodels(pageact) {
	if(document.getElementById("txt_motor_mmodel_catid").value == "") {
		$("#div_motor_mmodel_catid").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_catid").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make is mandatory.';
		document.getElementById("lbl_motor_mmodel_catid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_motor_mmodel_catid").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_catid").innerHTML='';
		document.getElementById("lbl_motor_mmodel_catid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_en").value == "") {
		$("#div_motor_mmodel_name_en").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in english is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_motor_mmodel_name_en").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_en").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_fr").value == "") {
		$("#div_motor_mmodel_name_fr").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in french is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_motor_mmodel_name_fr").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_fr").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_gr").value == "") {
		$("#div_motor_mmodel_name_gr").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in german is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_motor_mmodel_name_gr").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_gr").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_rs").value == "") {
		$("#div_motor_mmodel_name_rs").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in russian is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_motor_mmodel_name_rs").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_rs").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_sp").value == "") {
		$("#div_motor_mmodel_name_sp").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in spanish is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_motor_mmodel_name_sp").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_sp").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_ar").value == "") {
		$("#div_motor_mmodel_name_ar").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in arabic is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_motor_mmodel_name_ar").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_ar").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_name_ur").value == "") {
		$("#div_motor_mmodel_name_ur").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model in urdu is mandatory.';
		document.getElementById("lbl_motor_mmodel_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_motor_mmodel_name_ur").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_name_ur").innerHTML='';
		document.getElementById("lbl_motor_mmodel_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_motor_mmodel_urlslug").value == "") {
		$("#div_motor_mmodel_urlslug").addClass("has-error");
		document.getElementById("lbl_motor_mmodel_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Motor make model url slug is mandatory.';
		document.getElementById("lbl_motor_mmodel_urlslug").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_motor_mmodel_urlslug").removeClass("has-error");
		document.getElementById("lbl_motor_mmodel_urlslug").innerHTML='';
		document.getElementById("lbl_motor_mmodel_urlslug").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editmotormmodel";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addmotormmodel";
		}
		return true;
	}
	else {
		return false;
	}
}
function fetchchildjobcats(id) {
		if(id != "") {
			$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getjobcategories.php',
				dataType: 'text',
				data:'act=getjobcat_sub1&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('jobcat1').innerHTML = data;
					}
					else {
						document.getElementById('jobcat1').innerHTML = "";
					}
				}
			});
		}
	
}
function validate_jobscategories(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_urlslug").value == "") {
		$("#div_category_urlslug").addClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category url slug is mandatory.';
		document.getElementById("lbl_category_urlslug").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_urlslug").removeClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='';
		document.getElementById("lbl_category_urlslug").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editjobscat";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addjobscat";
		}
		return true;
	}
	else {
		return false;
	}
}

function validate_classifiedscategories(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_urlslug").value == "") {
		$("#div_category_urlslug").addClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category url slug is mandatory.';
		document.getElementById("lbl_category_urlslug").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_urlslug").removeClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='';
		document.getElementById("lbl_category_urlslug").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editclassifiedscat";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addclassifiedscat";
		}
		return true;
	}
	else {
		return false;
	}
}

function validate_userlists(pageact) {
	if(document.getElementById("txt_users_firstname").value == "") {
		$("#div_users_firstname").addClass("has-error");
		document.getElementById("lbl_users_firstname").innerHTML='<i class="fa fa-times-circle-o"></i> User Firstname is mandatory.';
		document.getElementById("lbl_users_firstname").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_users_firstname").removeClass("has-error");
		document.getElementById("lbl_users_firstname").innerHTML='';
		document.getElementById("lbl_users_firstname").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_users_lastname").value == "") {
		$("#div_users_lastname").addClass("has-error");
		document.getElementById("lbl_users_lastname").innerHTML='<i class="fa fa-times-circle-o"></i> User Lastname is mandatory.';
		document.getElementById("lbl_users_lastname").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_users_lastname").removeClass("has-error");
		document.getElementById("lbl_users_lastname").innerHTML='';
		document.getElementById("lbl_users_lastname").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_users_emailid").value == "") {
		$("#div_users_emailid").addClass("has-error");
		document.getElementById("lbl_users_emailid").innerHTML='<i class="fa fa-times-circle-o"></i> User Email Address is mandatory.';
		document.getElementById("lbl_users_emailid").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_users_emailid").removeClass("has-error");
		document.getElementById("lbl_users_emailid").innerHTML='';
		document.getElementById("lbl_users_emailid").style.display="none";
		var err3 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "edituserdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "adduserdet";
		}
		return true;
	}
	else {
		return false;
	}
}
function validate_adminuserlists(pageact) {
	if(document.getElementById("txt_users_firstname").value == "") {
		$("#div_users_firstname").addClass("has-error");
		document.getElementById("lbl_users_firstname").innerHTML='<i class="fa fa-times-circle-o"></i> Admin User Firstname is mandatory.';
		document.getElementById("lbl_users_firstname").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_users_firstname").removeClass("has-error");
		document.getElementById("lbl_users_firstname").innerHTML='';
		document.getElementById("lbl_users_firstname").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_users_lastname").value == "") {
		$("#div_users_lastname").addClass("has-error");
		document.getElementById("lbl_users_lastname").innerHTML='<i class="fa fa-times-circle-o"></i> Admin User Lastname is mandatory.';
		document.getElementById("lbl_users_lastname").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_users_lastname").removeClass("has-error");
		document.getElementById("lbl_users_lastname").innerHTML='';
		document.getElementById("lbl_users_lastname").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_users_emailid").value == "") {
		$("#div_users_emailid").addClass("has-error");
		document.getElementById("lbl_users_emailid").innerHTML='<i class="fa fa-times-circle-o"></i> Admin User Email Address is mandatory.';
		document.getElementById("lbl_users_emailid").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_users_emailid").removeClass("has-error");
		document.getElementById("lbl_users_emailid").innerHTML='';
		document.getElementById("lbl_users_emailid").style.display="none";
		var err3 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editadmuserdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addadmuserdet";
		}
		return true;
	}
	else {
		return false;
	}
}
function loadcatfeatures(id) {
	document.frmclscatdet.hdaction.value	=	'getpacatdet';
	document.frmclscatdet.pcat_id.value		=	id;
	document.frmclscatdet.submit();
}
function loadmotorseloptvalues(id) {
	document.frmmotorselectopt.hdaction.value	=	'getpaseldet';
	document.frmmotorselectopt.pmsel_id.value		=	id;
	document.frmmotorselectopt.submit();
}
function loadpropertyseloptvalues(id) {
	document.frmpropertyselectopt.hdaction.value	=	'getpaseldet';
	document.frmpropertyselectopt.pmsel_id.value		=	id;
	document.frmpropertyselectopt.submit();
}
function loadmotorsseloptvalues(id) {
	document.frmmotorsselectopt.hdaction.value	=	'getpaseldet';
	document.frmmotorsselectopt.pmsel_id.value		=	id;
	document.frmmotorsselectopt.submit();
}
function loadjobsseloptvalues(id) {
	document.frmjobsselectopt.hdaction.value	=	'getpaseldet';
	document.frmjobsselectopt.pmsel_id.value		=	id;
	document.frmjobsselectopt.submit();
}
function loadclassifiedsseloptvalues(id) {
	document.frmclassifiedsselectopt.hdaction.value	=	'getpaseldet';
	document.frmclassifiedsselectopt.pmsel_id.value		=	id;
	document.frmclassifiedsselectopt.submit();
}
function loadcommunityseloptvalues(id) {
	document.frmcommunityselectopt.hdaction.value	=	'getpaseldet';
	document.frmcommunityselectopt.pmsel_id.value		=	id;
	document.frmcommunityselectopt.submit();
}

function validate_classifiedscatdetails(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_classifieds_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Category.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_classifieds_inptype").value == "") {
		$("#div_classifieds_inptype").addClass("has-error");
		document.getElementById("lbl_classifieds_inptype").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds input type is mandatory.';
		document.getElementById("lbl_classifieds_inptype").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_classifieds_inptype").removeClass("has-error");
		document.getElementById("lbl_classifieds_inptype").innerHTML='';
		document.getElementById("lbl_classifieds_inptype").style.display="none";
		var err9 = 0;
	}
	if(document.getElementById("txt_classifieds_cattype").value == "") {
		$("#div_classifieds_cattype").addClass("has-error");
		document.getElementById("lbl_classifieds_cattype").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category type is mandatory.';
		document.getElementById("lbl_classifieds_cattype").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_classifieds_cattype").removeClass("has-error");
		document.getElementById("lbl_classifieds_cattype").innerHTML='';
		document.getElementById("lbl_classifieds_cattype").style.display="none";
		var err10 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editclassifiedscatdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addclassifiedscatdet";
		}
		return true;
	}
	else {
		return false;
	}
}
function loadcatfeatures(id) {
	document.frmclscatdet.hdaction.value	=	'getpacatdet';
	document.frmclscatdet.pcat_id.value		=	id;
	document.frmclscatdet.submit();
}

function deleteclassifiedscategorydetails(id) {
	if(id != "") {
		document.frmclscatdet.hdaction.value	=	'delcatdet';
		document.frmclscatdet.delcatd_id.value		=	id;
		document.frmclscatdet.submit();
	}
}
function deletepropertycategorydetails(id) {
	if(id != "") {
		document.frmclscatdet.hdaction.value	=	'delcatdet';
		document.frmclscatdet.delcatd_id.value		=	id;
		document.frmclscatdet.submit();
	}
}
function deletemotorscategorydetails(id) {
	if(id != "") {
		document.frmclscatdet.hdaction.value	=	'delcatdet';
		document.frmclscatdet.delcatd_id.value		=	id;
		document.frmclscatdet.submit();
	}
}
function deletejobscategorydetails(id) {
	if(id != "") {
		document.frmclscatdet.hdaction.value	=	'delcatdet';
		document.frmclscatdet.delcatd_id.value		=	id;
		document.frmclscatdet.submit();
	}
}

function deletecommunitycategorydetails(id) {
	if(id != "") {
		document.frmclscatdet.hdaction.value	=	'delcatdet';
		document.frmclscatdet.delcatd_id.value		=	id;
		document.frmclscatdet.submit();
	}
}

function fetchchildclassifiedcats_one(id) {
	document.getElementById('classifiedcat1').innerHTML = "";
	document.getElementById('classifiedcat2').innerHTML = "";
	document.getElementById('classifiedcat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getclasscategories.php',
				dataType: 'text',
				data:'act=getclasscat_sub1&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('classifiedcat1').innerHTML = data;
					}
					else {
						document.getElementById('classifiedcat1').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildclassifiedcats_two(id) {
	document.getElementById('classifiedcat2').innerHTML = "";
	document.getElementById('classifiedcat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getclasscategories.php',
				dataType: 'text',
				data:'act=getclasscat_sub2&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('classifiedcat2').innerHTML = data;
					}
					else {
						document.getElementById('classifiedcat2').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildclassifiedcats_three(id) {
	document.getElementById('classifiedcat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getclasscategories.php',
				dataType: 'text',
				data:'act=getclasscat_sub3&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('classifiedcat3').innerHTML = data;
					}
					else {
						document.getElementById('classifiedcat3').innerHTML = "";
					}
				}
			});
		}

}
function deleteclassifiedscategory(id) {
	if(id != "") {
		document.frmclassifiedscategories.hdaction.value	=	'delcateg';
		document.frmclassifiedscategories.category_id.value		=	id;
		document.frmclassifiedscategories.submit();
	}
}
function deletepropertycategory(id) {
	if(id != "") {
		document.frmpropertycategories.hdaction.value	=	'delcateg';
		document.frmpropertycategories.category_id.value		=	id;
		document.frmpropertycategories.submit();
	}
}
function deletepropertycatseloptval(id) {
	if(id != "") {
		document.frmpropertyselectopt.hdaction.value	=	'delcatseloptval';
		document.frmpropertyselectopt.delsel_id.value		=	id;
		document.frmpropertyselectopt.submit();
	}
}
function deletemotorscatseloptval(id) {
	if(id != "") {
		document.frmmotorsselectopt.hdaction.value	=	'delcatseloptval';
		document.frmmotorsselectopt.delsel_id.value		=	id;
		document.frmmotorsselectopt.submit();
	}
}
function deletejobscatseloptval(id) {
	if(id != "") {
		document.frmjobsselectopt.hdaction.value	=	'delcatseloptval';
		document.frmjobsselectopt.delsel_id.value		=	id;
		document.frmjobsselectopt.submit();
	}
}
function deletecommunitycatseloptval(id) {
	if(id != "") {
		document.frmcommunityselectopt.hdaction.value	=	'delcatseloptval';
		document.frmcommunityselectopt.delsel_id.value		=	id;
		document.frmcommunityselectopt.submit();
	}
}
function deleteclassifiedscatseloptval(id) {
	if(id != "") {
		document.frmclassifiedsselectopt.hdaction.value	=	'delcatseloptval';
		document.frmclassifiedsselectopt.delsel_id.value		=	id;
		document.frmclassifiedsselectopt.submit();
	}
}

function deletecommunitycategory(id) {
	if(id != "") {
		document.frmcommunitycategories.hdaction.value	=	'delcateg';
		document.frmcommunitycategories.category_id.value		=	id;
		document.frmcommunitycategories.submit();
	}
}

function validate_propertycategories(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_urlslug").value == "") {
		$("#div_category_urlslug").addClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category url slug is mandatory.';
		document.getElementById("lbl_category_urlslug").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_urlslug").removeClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='';
		document.getElementById("lbl_category_urlslug").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editpropertycat";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addpropertycat";
		}
		return true;
	}
	else {
		return false;
	}
}
 function validate_propertycatdetails(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_property_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Category.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_property_inptype").value == "") {
		$("#div_property_inptype").addClass("has-error");
		document.getElementById("lbl_property_inptype").innerHTML='<i class="fa fa-times-circle-o"></i> Property input type is mandatory.';
		document.getElementById("lbl_property_inptype").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_property_inptype").removeClass("has-error");
		document.getElementById("lbl_property_inptype").innerHTML='';
		document.getElementById("lbl_property_inptype").style.display="none";
		var err9 = 0;
	}
	if(document.getElementById("txt_property_cattype").value == "") {
		$("#div_property_cattype").addClass("has-error");
		document.getElementById("lbl_property_cattype").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category type is mandatory.';
		document.getElementById("lbl_property_cattype").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_property_cattype").removeClass("has-error");
		document.getElementById("lbl_property_cattype").innerHTML='';
		document.getElementById("lbl_property_cattype").style.display="none";
		var err10 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editpropertycatdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addpropertycatdet";
		}
		return true;
	}
	else {
		return false;
	}
}

function fetchchildcommunitycats_one(id) {
	document.getElementById('communitycat1').innerHTML = "";
	document.getElementById('communitycat2').innerHTML = "";
	document.getElementById('communitycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getcommunitycategories.php',
				dataType: 'text',
				data:'act=getcommunitycat_sub1&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('communitycat1').innerHTML = data;
					}
					else {
						document.getElementById('communitycat1').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildcommunitycats_two(id) {
	document.getElementById('communitycat2').innerHTML = "";
	document.getElementById('communitycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getcommunitycategories.php',
				dataType: 'text',
				data:'act=getcommunitycat_sub2&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('communitycat2').innerHTML = data;
					}
					else {
						document.getElementById('communitycat2').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildcommunitycats_three(id) {
	document.getElementById('communitycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getcommunitycategories.php',
				dataType: 'text',
				data:'act=getcommunitycat_sub3&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('communitycat3').innerHTML = data;
					}
					else {
						document.getElementById('communitycat3').innerHTML = "";
					}
				}
			});
		}

}

function validate_communitycategories(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_urlslug").value == "") {
		$("#div_category_urlslug").addClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category url slug is mandatory.';
		document.getElementById("lbl_category_urlslug").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_urlslug").removeClass("has-error");
		document.getElementById("lbl_category_urlslug").innerHTML='';
		document.getElementById("lbl_category_urlslug").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editcommunitycat";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addcommunitycat";
		}
		return true;
	}
	else {
		return false;
	}
}

 function validate_communitycatdetails(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_community_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Category.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_community_inptype").value == "") {
		$("#div_community_inptype").addClass("has-error");
		document.getElementById("lbl_community_inptype").innerHTML='<i class="fa fa-times-circle-o"></i> Community input type is mandatory.';
		document.getElementById("lbl_community_inptype").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_community_inptype").removeClass("has-error");
		document.getElementById("lbl_community_inptype").innerHTML='';
		document.getElementById("lbl_community_inptype").style.display="none";
		var err9 = 0;
	}
	if(document.getElementById("txt_community_cattype").value == "") {
		$("#div_community_cattype").addClass("has-error");
		document.getElementById("lbl_community_cattype").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category type is mandatory.';
		document.getElementById("lbl_community_cattype").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_community_cattype").removeClass("has-error");
		document.getElementById("lbl_community_cattype").innerHTML='';
		document.getElementById("lbl_community_cattype").style.display="none";
		var err10 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editcommunitycatdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addcommunitycatdet";
		}
		return true;
	}
	else {
		return false;
	}
}
 function validate_motorscatdetails(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_motors_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Category.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_motors_inptype").value == "") {
		$("#div_motors_inptype").addClass("has-error");
		document.getElementById("lbl_motors_inptype").innerHTML='<i class="fa fa-times-circle-o"></i> Motors input type is mandatory.';
		document.getElementById("lbl_motors_inptype").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_motors_inptype").removeClass("has-error");
		document.getElementById("lbl_motors_inptype").innerHTML='';
		document.getElementById("lbl_motors_inptype").style.display="none";
		var err9 = 0;
	}
	if(document.getElementById("txt_motors_cattype").value == "") {
		$("#div_motors_cattype").addClass("has-error");
		document.getElementById("lbl_motors_cattype").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category type is mandatory.';
		document.getElementById("lbl_motors_cattype").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_motors_cattype").removeClass("has-error");
		document.getElementById("lbl_motors_cattype").innerHTML='';
		document.getElementById("lbl_motors_cattype").style.display="none";
		var err10 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editmotorscatdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addmotorscatdet";
		}
		return true;
	}
	else {
		return false;
	}
}
 function validate_jobscatdetails(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_jobs_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Category.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_jobs_inptype").value == "") {
		$("#div_jobs_inptype").addClass("has-error");
		document.getElementById("lbl_jobs_inptype").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs input type is mandatory.';
		document.getElementById("lbl_jobs_inptype").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_jobs_inptype").removeClass("has-error");
		document.getElementById("lbl_jobs_inptype").innerHTML='';
		document.getElementById("lbl_jobs_inptype").style.display="none";
		var err9 = 0;
	}
	if(document.getElementById("txt_jobs_cattype").value == "") {
		$("#div_jobs_cattype").addClass("has-error");
		document.getElementById("lbl_jobs_cattype").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category type is mandatory.';
		document.getElementById("lbl_jobs_cattype").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_jobs_cattype").removeClass("has-error");
		document.getElementById("lbl_jobs_cattype").innerHTML='';
		document.getElementById("lbl_jobs_cattype").style.display="none";
		var err10 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editjobscatdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addjobscatdet";
		}
		return true;
	}
	else {
		return false;
	}
}

function fetchchildmotorcats_one(id) {
	document.getElementById('motorcat1').innerHTML = "";
	document.getElementById('motorcat2').innerHTML = "";
	document.getElementById('motorcat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getmotorcategories.php',
				dataType: 'text',
				data:'act=getmotorcat_sub1&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('motorcat1').innerHTML = data;
					}
					else {
						document.getElementById('motorcat1').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildmotorcats_two(id) {
	document.getElementById('motorcat2').innerHTML = "";
	document.getElementById('motorcat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getmotorcategories.php',
				dataType: 'text',
				data:'act=getmotorcat_sub2&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('motorcat2').innerHTML = data;
					}
					else {
						document.getElementById('motorcat2').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildmotorcats_three(id) {
	document.getElementById('motorcat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getmotorcategories.php',
				dataType: 'text',
				data:'act=getmotorcat_sub3&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('motorcat3').innerHTML = data;
					}
					else {
						document.getElementById('motorcat3').innerHTML = "";
					}
				}
			});
		}

}



function fetchchildpropertycats_one(id) {
	document.getElementById('propertycat1').innerHTML = "";
	document.getElementById('propertycat2').innerHTML = "";
	document.getElementById('propertycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getpropertycategories.php',
				dataType: 'text',
				data:'act=getpropertycat_sub1&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('propertycat1').innerHTML = data;
					}
					else {
						document.getElementById('propertycat1').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildpropertycats_two(id) {
	document.getElementById('propertycat2').innerHTML = "";
	document.getElementById('propertycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getpropertycategories.php',
				dataType: 'text',
				data:'act=getpropertycat_sub2&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('propertycat2').innerHTML = data;
					}
					else {
						document.getElementById('propertycat2').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildpropertycats_three(id) {
	document.getElementById('propertycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getpropertycategories.php',
				dataType: 'text',
				data:'act=getpropertycat_sub3&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('propertycat3').innerHTML = data;
					}
					else {
						document.getElementById('propertycat3').innerHTML = "";
					}
				}
			});
		}

}

function validate_propertycatselopt(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_property_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Property Category Detail.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_values").value == "") {
		$("#div_category_values").addClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='<i class="fa fa-times-circle-o"></i> Property Category Select Value is mandatory.';
		document.getElementById("lbl_category_values").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_values").removeClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='';
		document.getElementById("lbl_category_values").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editpropertycatselval";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addpropertycatselval";
		}
		return true;
	}
	else {
		return false;
	}
}

function validate_motorscatselopt(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_motors_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Motors Category Detail.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_values").value == "") {
		$("#div_category_values").addClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='<i class="fa fa-times-circle-o"></i> Motors Category Select Value is mandatory.';
		document.getElementById("lbl_category_values").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_values").removeClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='';
		document.getElementById("lbl_category_values").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editmotorscatselval";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addmotorscatselval";
		}
		return true;
	}
	else {
		return false;
	}
}
function validate_jobscatselopt(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_jobs_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Jobs Category Detail.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_values").value == "") {
		$("#div_category_values").addClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='<i class="fa fa-times-circle-o"></i> Jobs Category Select Value is mandatory.';
		document.getElementById("lbl_category_values").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_values").removeClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='';
		document.getElementById("lbl_category_values").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editjobscatselval";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addjobscatselval";
		}
		return true;
	}
	else {
		return false;
	}
}
function validate_classifiedscatselopt(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_classifieds_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Classifieds Category Detail.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_values").value == "") {
		$("#div_category_values").addClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='<i class="fa fa-times-circle-o"></i> Classifieds Category Select Value is mandatory.';
		document.getElementById("lbl_category_values").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_values").removeClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='';
		document.getElementById("lbl_category_values").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editclassifiedscatselval";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addclassifiedscatselval";
		}
		return true;
	}
	else {
		return false;
	}
}
function validate_communitycatselopt(pageact) {
	var err1 = 0;
	if(document.getElementById("txt_community_catid").value == "") {
		$("#div_category_pid").addClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Community Category Detail.';
		document.getElementById("lbl_category_pid").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_category_pid").removeClass("has-error");
		document.getElementById("lbl_category_pid").innerHTML='';
		document.getElementById("lbl_category_pid").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_category_name_en").value == "") {
		$("#div_category_name_en").addClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in english is mandatory.';
		document.getElementById("lbl_category_name_en").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_category_name_en").removeClass("has-error");
		document.getElementById("lbl_category_name_en").innerHTML='';
		document.getElementById("lbl_category_name_en").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_category_name_fr").value == "") {
		$("#div_category_name_fr").addClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in french is mandatory.';
		document.getElementById("lbl_category_name_fr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_category_name_fr").removeClass("has-error");
		document.getElementById("lbl_category_name_fr").innerHTML='';
		document.getElementById("lbl_category_name_fr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_category_name_gr").value == "") {
		$("#div_category_name_gr").addClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in german is mandatory.';
		document.getElementById("lbl_category_name_gr").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_category_name_gr").removeClass("has-error");
		document.getElementById("lbl_category_name_gr").innerHTML='';
		document.getElementById("lbl_category_name_gr").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_category_name_rs").value == "") {
		$("#div_category_name_rs").addClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in russian is mandatory.';
		document.getElementById("lbl_category_name_rs").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_category_name_rs").removeClass("has-error");
		document.getElementById("lbl_category_name_rs").innerHTML='';
		document.getElementById("lbl_category_name_rs").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_category_name_sp").value == "") {
		$("#div_category_name_sp").addClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in spanish is mandatory.';
		document.getElementById("lbl_category_name_sp").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_category_name_sp").removeClass("has-error");
		document.getElementById("lbl_category_name_sp").innerHTML='';
		document.getElementById("lbl_category_name_sp").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_category_name_ar").value == "") {
		$("#div_category_name_ar").addClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in arabic is mandatory.';
		document.getElementById("lbl_category_name_ar").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_category_name_ar").removeClass("has-error");
		document.getElementById("lbl_category_name_ar").innerHTML='';
		document.getElementById("lbl_category_name_ar").style.display="none";
		var err7 = 0;

	}
	if(document.getElementById("txt_category_name_ur").value == "") {
		$("#div_category_name_ur").addClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value in urdu is mandatory.';
		document.getElementById("lbl_category_name_ur").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_category_name_ur").removeClass("has-error");
		document.getElementById("lbl_category_name_ur").innerHTML='';
		document.getElementById("lbl_category_name_ur").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_category_values").value == "") {
		$("#div_category_values").addClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='<i class="fa fa-times-circle-o"></i> Community Category Select Value is mandatory.';
		document.getElementById("lbl_category_values").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_category_values").removeClass("has-error");
		document.getElementById("lbl_category_values").innerHTML='';
		document.getElementById("lbl_category_values").style.display="none";
		var err9 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editcommunitycatselval";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addcommunitycatselval";
		}
		return true;
	}
	else {
		return false;
	}
}


function deleteadvmgnt(id) {
	if(id != "") {
		document.getElementById("hdaction").value = "deletadvmgmt";
		document.getElementById("id").value = id;
		document.frmadvmgmt.submit();
	}
}

function validate_adlists(pageact) {
	if(document.getElementById("txt_ad_name").value == "") {
		$("#div_ad_name").addClass("has-error");
		document.getElementById("lbl_ad_name").innerHTML='<i class="fa fa-times-circle-o"></i> Ad Name is mandatory.';
		document.getElementById("lbl_ad_name").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_ad_name").removeClass("has-error");
		document.getElementById("lbl_ad_name").innerHTML='';
		document.getElementById("lbl_ad_name").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_ad_code").value == "") {
		$("#div_ad_code").addClass("has-error");
		document.getElementById("lbl_ad_code").innerHTML='<i class="fa fa-times-circle-o"></i> Ad Code is mandatory.';
		document.getElementById("lbl_ad_code").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_ad_code").removeClass("has-error");
		document.getElementById("lbl_ad_code").innerHTML='';
		document.getElementById("lbl_ad_code").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_ad_position").value == "") {
		$("#div_ad_position").addClass("has-error");
		document.getElementById("lbl_ad_position").innerHTML='<i class="fa fa-times-circle-o"></i> Ad Position is mandatory.';
		document.getElementById("lbl_ad_position").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_ad_position").removeClass("has-error");
		document.getElementById("lbl_ad_position").innerHTML='';
		document.getElementById("lbl_ad_position").style.display="none";
		var err3 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editadvmgmtdet";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addadvmgmtdet";
		}
		return true;
	}
	else {
		return false;
	}
}

function deletemotorscategorydetails(id) {
	if(id != "") {
		document.frmadvmgmt.hdaction.value	=	'delcatdet';
		document.frmadvmgmt.delcatd_id.value		=	id;
		document.frmadvmgmt.submit();
	}
}

function deleteadvmgmtdetails(id) {  /* delete advertistment details */
	if(id != "") {
		document.frmadvmgmt.hdaction.value	=	'deladvmgmtdet';
		document.frmadvmgmt.deladvmgmt_id.value		=	id;
		document.frmadvmgmt.submit();
	}
}

function validate_manage_package(pageact) {
	//alert(pageact);
	
	if(document.getElementById("txt_fea_ads").value == "") {
		//alert('feature_error');
		$("#div_fea_ads").addClass("has-error");
		document.getElementById("lbl_fea_ads").innerHTML='<i class="fa fa-times-circle-o"></i> Feature Ads is mandatory.';
		document.getElementById("lbl_fea_ads").style.display="block";
		var err1 = 1;
	}
	else {
		//alert('feature');
		$("#div_fea_ads").removeClass("has-error");
		document.getElementById("lbl_fea_ads").innerHTML='';
		document.getElementById("lbl_fea_ads").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_urg_ads").value == "") {
		//alert('urgernt error');
		$("#div_urg_ads").addClass("has-error");
		document.getElementById("lbl_urg_ads").innerHTML='<i class="fa fa-times-circle-o"></i> Urgent Ads is mandatory.';
		document.getElementById("lbl_urg_ads").style.display="block";
		var err2 = 1;
	}
	else {
		//alert('urgeent');
		$("#div_urg_ads").removeClass("has-error");
		document.getElementById("lbl_urg_ads").innerHTML='';
		document.getElementById("lbl_urg_ads").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_spot_ads").value == "") {
		//alert('spot error');
		$("#div_spot_ads").addClass("has-error");
		document.getElementById("lbl_spot_ads").innerHTML='<i class="fa fa-times-circle-o"></i> Spotlight Ads is mandatory.';
		document.getElementById("lbl_spot_ads").style.display="block";
		var err3 = 1;
	}
	else {
		//alert('spot');
		$("#div_spot_ads").removeClass("has-error");
		document.getElementById("lbl_spot_ads").innerHTML='';
		document.getElementById("lbl_spot_ads").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_edit_ads").value == "") {
		//alert('editiores errro');
		$("#div_edit_ads").addClass("has-error");
		document.getElementById("lbl_edit_ads").innerHTML='<i class="fa fa-times-circle-o"></i> Editorchoice Ads is mandatory.';
		document.getElementById("lbl_edit_ads").style.display="block";
		var err4 = 1;
	}
	else {
		//alert('editiores');
		$("#div_edit_ads").removeClass("has-error");
		document.getElementById("lbl_edit_ads").innerHTML='';
		document.getElementById("lbl_edit_ads").style.display="none";
		var err4 = 0;
	}
	
	if(document.getElementById("txt_spons_ads").value == "") {
		//alert('sponser error')
		$("#div_spons_ads").addClass("has-error");
		document.getElementById("lbl_spons_ads").innerHTML='<i class="fa fa-times-circle-o"></i> Sponser Ads is mandatory.';
		document.getElementById("lbl_spons_ads").style.display="block";
		var err5 = 1;
	}
	else {
	//	alert('sponser')
		$("#div_spons_ads").removeClass("has-error");
		document.getElementById("lbl_spons_ads").innerHTML='';
		document.getElementById("lbl_spons_ads").style.display="none";
		var err5 = 0;
	}
	
	if((err1 == 0) && (err2 == 0) && (err3 == 0) && (err4 == 0) && (err5 == 0))	{
		if(pageact == 'edit') {
		//	alert('sdfsdf');
			document.getElementById("hdaction").value = "editmanagedet";
		}
		if(pageact == 'add') {
			
			document.getElementById("hdaction").value = "addmanagedet";
			//$("#frmmanagedetails").submit();
		}
		return true;
	}
	else {
		return false;
	}
}

function validate_language(pageact) {
	alert(pageact);
	if(document.getElementById("txt_language_name_en").value == "") {
		$("#div_language_name_en").addClass("has-error");
		document.getElementById("lbl_language_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in english is mandatory.';
		document.getElementById("lbl_language_name_en").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_language_name_en").removeClass("has-error");
		document.getElementById("lbl_language_name_en").innerHTML='';
		document.getElementById("lbl_language_name_en").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_language_name_fr").value == "") {
		$("#div_language_name_fr").addClass("has-error");
		document.getElementById("lbl_language_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in french is mandatory.';
		document.getElementById("lbl_language_name_fr").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_language_name_fr").removeClass("has-error");
		document.getElementById("lbl_language_name_fr").innerHTML='';
		document.getElementById("lbl_language_name_fr").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_language_name_gr").value == "") {
		$("#div_language_name_gr").addClass("has-error");
		document.getElementById("lbl_language_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in german is mandatory.';
		document.getElementById("lbl_language_name_gr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_language_name_gr").removeClass("has-error");
		document.getElementById("lbl_language_name_gr").innerHTML='';
		document.getElementById("lbl_language_name_gr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_language_name_rs").value == "") {
		$("#div_language_name_rs").addClass("has-error");
		document.getElementById("lbl_language_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in russian is mandatory.';
		document.getElementById("lbl_language_name_rs").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_language_name_rs").removeClass("has-error");
		document.getElementById("lbl_language_name_rs").innerHTML='';
		document.getElementById("lbl_language_name_rs").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_language_name_sp").value == "") {
		$("#div_language_name_sp").addClass("has-error");
		document.getElementById("lbl_language_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in spanish is mandatory.';
		document.getElementById("lbl_language_name_sp").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_language_name_sp").removeClass("has-error");
		document.getElementById("lbl_language_name_sp").innerHTML='';
		document.getElementById("lbl_language_name_sp").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_language_name_ar").value == "") {
		$("#div_language_name_ar").addClass("has-error");
		document.getElementById("lbl_language_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in arabic is mandatory.';
		document.getElementById("lbl_language_name_ar").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_language_name_ar").removeClass("has-error");
		document.getElementById("lbl_language_name_ar").innerHTML='';
		document.getElementById("lbl_language_name_ar").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_language_name_ur").value == "") {
		$("#div_language_name_ur").addClass("has-error");
		document.getElementById("lbl_language_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> Language name in urdu is mandatory.';
		document.getElementById("lbl_language_name_ur").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_language_name_ur").removeClass("has-error");
		document.getElementById("lbl_language_name_ur").innerHTML='';
		document.getElementById("lbl_language_name_ur").style.display="none";
		var err7 = 0;
	}
	if(document.getElementById("txt_language_urlslug").value == "") {
		$("#div_language_urlslug").addClass("has-error");
		document.getElementById("lbl_language_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Language slug is mandatory.';
		document.getElementById("lbl_language_urlslug").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_language_urlslug").removeClass("has-error");
		document.getElementById("lbl_language_urlslug").innerHTML='';
		document.getElementById("lbl_language_urlslug").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_language_urlslug").value == "") {
		$("#div_language_urlslug").addClass("has-error");
		document.getElementById("lbl_language_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> Language slug is mandatory.';
		document.getElementById("lbl_language_urlslug").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_language_urlslug").removeClass("has-error");
		document.getElementById("lbl_language_urlslug").innerHTML='';
		document.getElementById("lbl_language_urlslug").style.display="none";
		var err8 = 0;
	}
	if(document.getElementById("txt_language_filename").value == "") {
		$("#div_language_filename").addClass("has-error");
		document.getElementById("lbl_language_filename").innerHTML='<i class="fa fa-times-circle-o"></i> Language Filename is mandatory.';
		document.getElementById("lbl_language_filename").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_language_filename").removeClass("has-error");
		document.getElementById("lbl_language_filename").innerHTML='';
		document.getElementById("lbl_language_filename").style.display="none";
		var err9 = 0;
	}

	if(document.getElementById("txt_language_pref").value == "") {
		$("#div_language_pref").addClass("has-error");
		document.getElementById("lbl_language_pref").innerHTML='<i class="fa fa-times-circle-o"></i> Language Prefix is mandatory.';
		document.getElementById("lbl_language_pref").style.display="block";
		var err10 = 1;
	}
	else {
		$("#div_language_pref").removeClass("has-error");
		document.getElementById("lbl_language_pref").innerHTML='';
		document.getElementById("lbl_language_pref").style.display="none";
		var err10 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0") && (err10 == "0"))	{
		if(pageact == 'edit') {
			document.getElementById("hdaction").value = "editlanguage";
		}
		if(pageact == 'add') {
			document.getElementById("hdaction").value = "addlanguage";
			//$("#frmmanagedetails").submit();
		}
		return true;
	}
	else {
		return false;
	}
}
	 
function validate_city(pageact)	{

	if(document.getElementById("txt_country_id").value == "") {
		$("#div_country_id").addClass("has-error");
		document.getElementById("lbl_country_id").innerHTML='<i class="fa fa-times-circle-o"></i> Select a Category.';
		document.getElementById("lbl_country_id").style.display="block";
		var err9 = 1;
	}
	else {
		$("#div_country_id").removeClass("has-error");
		document.getElementById("lbl_country_id").innerHTML='';
		document.getElementById("lbl_country_id").style.display="none";
		var err9 = 0;
	}

	if(document.getElementById("txt_city_name_en").value == "") {
		$("#div_city_name_en").addClass("has-error");
		document.getElementById("lbl_city_name_en").innerHTML='<i class="fa fa-times-circle-o"></i> City name in english is mandatory.';
		document.getElementById("lbl_city_name_en").style.display="block";
		var err1 = 1;
	}
	else {
		$("#div_city_name_en").removeClass("has-error");
		document.getElementById("lbl_city_name_en").innerHTML='';
		document.getElementById("lbl_city_name_en").style.display="none";
		var err1 = 0;
	}
	if(document.getElementById("txt_city_name_fr").value == "") {
		$("#div_city_name_fr").addClass("has-error");
		document.getElementById("lbl_city_name_fr").innerHTML='<i class="fa fa-times-circle-o"></i> City name in french is mandatory.';
		document.getElementById("lbl_city_name_fr").style.display="block";
		var err2 = 1;
	}
	else {
		$("#div_city_name_fr").removeClass("has-error");
		document.getElementById("lbl_city_name_fr").innerHTML='';
		document.getElementById("lbl_city_name_fr").style.display="none";
		var err2 = 0;
	}
	if(document.getElementById("txt_city_name_gr").value == "") {
		$("#div_city_name_gr").addClass("has-error");
		document.getElementById("lbl_city_name_gr").innerHTML='<i class="fa fa-times-circle-o"></i> City name in german is mandatory.';
		document.getElementById("lbl_city_name_gr").style.display="block";
		var err3 = 1;
	}
	else {
		$("#div_city_name_gr").removeClass("has-error");
		document.getElementById("lbl_city_name_gr").innerHTML='';
		document.getElementById("lbl_city_name_gr").style.display="none";
		var err3 = 0;
	}
	if(document.getElementById("txt_city_name_rs").value == "") {
		$("#div_city_name_rs").addClass("has-error");
		document.getElementById("lbl_city_name_rs").innerHTML='<i class="fa fa-times-circle-o"></i> City name in russian is mandatory.';
		document.getElementById("lbl_city_name_rs").style.display="block";
		var err4 = 1;
	}
	else {
		$("#div_city_name_rs").removeClass("has-error");
		document.getElementById("lbl_city_name_rs").innerHTML='';
		document.getElementById("lbl_city_name_rs").style.display="none";
		var err4 = 0;
	}
	if(document.getElementById("txt_city_name_sp").value == "") {
		$("#div_city_name_sp").addClass("has-error");
		document.getElementById("lbl_city_name_sp").innerHTML='<i class="fa fa-times-circle-o"></i> City name in spanish is mandatory.';
		document.getElementById("lbl_city_name_sp").style.display="block";
		var err5 = 1;
	}
	else {
		$("#div_city_name_sp").removeClass("has-error");
		document.getElementById("lbl_city_name_sp").innerHTML='';
		document.getElementById("lbl_city_name_sp").style.display="none";
		var err5 = 0;
	}
	if(document.getElementById("txt_city_name_ar").value == "") {
		$("#div_city_name_ar").addClass("has-error");
		document.getElementById("lbl_city_name_ar").innerHTML='<i class="fa fa-times-circle-o"></i> City name in arabic is mandatory.';
		document.getElementById("lbl_city_name_ar").style.display="block";
		var err6 = 1;
	}
	else {
		$("#div_city_name_ar").removeClass("has-error");
		document.getElementById("lbl_city_name_ar").innerHTML='';
		document.getElementById("lbl_city_name_ar").style.display="none";
		var err6 = 0;
	}
	if(document.getElementById("txt_city_name_ur").value == "") {
		$("#div_city_name_ur").addClass("has-error");
		document.getElementById("lbl_city_name_ur").innerHTML='<i class="fa fa-times-circle-o"></i> City name in urdu is mandatory.';
		document.getElementById("lbl_city_name_ur").style.display="block";
		var err7 = 1;
	}
	else {
		$("#div_city_name_ur").removeClass("has-error");
		document.getElementById("lbl_city_name_ur").innerHTML='';
		document.getElementById("lbl_city_name_ur").style.display="none";
		var err7 = 0;
	}

	if(document.getElementById("txt_city_urlslug").value == "") {
		$("#div_city_urlslug").addClass("has-error");
		document.getElementById("lbl_city_urlslug").innerHTML='<i class="fa fa-times-circle-o"></i> City slug is mandatory.';
		document.getElementById("lbl_city_urlslug").style.display="block";
		var err8 = 1;
	}
	else {
		$("#div_city_urlslug").removeClass("has-error");
		document.getElementById("lbl_city_urlslug").innerHTML='';
		document.getElementById("lbl_city_urlslug").style.display="none";
		var err8 = 0;
	}
	if((err1 == "0") && (err2 == "0") && (err3 == "0") && (err4 == "0") && (err5 == "0") && (err6 == "0") && (err7 == "0") && (err8 == "0") && (err9 == "0"))	{
	if(pageact == 'edit') {
		document.getElementById("hdaction").value = "editcity";
	}
	if(pageact == 'add')	{
		document.getElementById("hdaction").value = "addcity";
		//$("#frmmanagedetails").submit();
	}
		return true;
	}
	else {
		return false;
	}
}
function deletecountry(id) {
	if(id != "") {
		document.getElementById("hdaction").value = "deletecountry";
		document.getElementById("country_id").value = id;
		document.frmcountry.submit();
	}
}
	
/*
function fetchchildcats_one(id, catname)	{
	document.getElementById(catname+'cat1').innerHTML = "";
	document.getElementById(catname+'cat2').innerHTML = "";
	document.getElementById(catname+'cat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'get'+catname+'categories.php',
				dataType: 'text',
				data:'act=get'+catname+'cat_sub1&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById(document.getElementById(catname+'propertycat1').innerHTML = data;
					}
					else {
						document.getElementById('propertycat1').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildpropertycats_two(id) {
	document.getElementById('propertycat2').innerHTML = "";
	document.getElementById('propertycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getpropertycategories.php',
				dataType: 'text',
				data:'act=getpropertycat_sub2&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('propertycat2').innerHTML = data;
					}
					else {
						document.getElementById('propertycat2').innerHTML = "";
					}
				}
			});
		}

}
function fetchchildpropertycats_three(id) {
	document.getElementById('propertycat3').innerHTML = "";
	if(id != "")	{
		$.ajax({
				type: 'POST',
				url: siteadminglobalpath+'getpropertycategories.php',
				dataType: 'text',
				data:'act=getpropertycat_sub3&cid='+id,
				success: function(data)	{
					if(data != "") {
						document.getElementById('propertycat3').innerHTML = data;
					}
					else {
						document.getElementById('propertycat3').innerHTML = "";
					}
				}
			});
		}

}
*/
function validate_language_c(){
	var count = $("[type='checkbox']:checked").length;
	//alert(count);
	if(document.getElementById('txt_country_id').value==''){
		alert("please select");
		return false;
	}else if(count==0){
		alert("please select one");
		return false;
	}else{
		document.getElementById('country_id').value = document.getElementById('txt_country_id').value;
		document.frmassignlang.hdaction.value="addlang";
		return true;
	}
}