//Helps in creating a structure will help later.
function makeStruct(names) {
    var names = names.split(' ');
    var count = names.length;
    function constructor() {
        for (var i = 0; i < count; i++) {
            this[names[i]] = arguments[i];
        }
    }
    return constructor;
}

function textvalue(this1){
		this1.value = this1.value;
		this1.type = 'hidden';
		this1.type = 'text';

}
function removetable(this1){
	
	$(this1).parent().parent().parent().parent().remove();

	
}
function selectvalue(this1){
	this2 = this1.value;
	$(this1).find('option').removeAttr("selected");
	option =  $(this1).find("option[value='" + this2 + "']").attr('selected','selected');
	this1.value=this2;
	
	
	
}
var rootflag = 0;
var rootcondition = '<table><tr><td class="seperator" ><img src="js/res/remove.png" alt="Remove" class="remove" /><select onchange="selectvalue(this)"><option value="and">And</option><option value="or">Or</option></select></td>';
rootcondition += '<td><div class="querystmts"></div><div class="col-md-12"><img class="add" src="js/res/add.png" alt="Add" /> <input type="button" class="addroot" value="+()"></div>';
rootcondition += '</td></tr></table>';
var rootcondition1a = '<select onchange="selectvalue(this)"><option value="and">And</option><option value="or">Or</option><option value="xor">xor</option><</select>';
var rootcondition1 = '<table><tr><td class="seperator" ><img src="js/res/remove.png" alt="Remove" class="remove"  onclick="removetable(this)" /><select onchange="selectvalue(this)"><option value="and">And</option><option value="or">Or</option></select></td>';
rootcondition1 += '<td><div class="querystmts"></div><div class="col-md-12"><img class="add" src="js/res/add.png" alt="Add" /> <input type="button" class="addroot" value="+()"></div>';
rootcondition1 += '</td></tr></table>';



var statement = '<div class="col-md-12 "><img src="js/res/remove.png" alt="Remove" class="remove" />'
var statement1 = '';
statement1 += '<select class="col">';
statement1 += '<option value="code">Code</option>';
statement1 += '<option value="country">Country</option>';
statement1 += '<option value="capital">Capital</option>';
statement1 += '<option value="govt">Government</option>';
statement1 += '<option value="cont">Continent</option>';
statement1 += '<option value="national">Nationalhood</option>';
statement1 += '<option value="area">Area(km2)</option>';
statement1 += '<option value="pop">Population</option>';
statement1 += '<option value="gdp">GDP($M)</option>';
statement1 += '<option value="g8">G8</option>';
statement1 += '</select>';
var statement2 = '';
statement2 += '<select class="op" onchange="selectvalue(this)">';
statement2 += '<option value="contains">contains</option>';
statement2 += '<option value="startswith">starts with</option>';
statement2 += '<option value="endswith">ends with</option>';
statement2 += '<option value="doesnotcontain">does not contain</option>';
statement2 += '<option value="doesnotstartwith">does not start with</option>';
statement2 += '<option value="doesnotendswith">does not end with</option>';
statement2 += '<option value="=">equals</option>';
statement2 += '<option value="!=">not equal</option>';
statement2 += '<option value="<">less than</option>';
statement2 += '<option value=">">greater than</option>';
statement2 += '<option value="<=">less than or equal to</option>';
statement2 += '<option value=">=">greater than or equal to</option>';
statement2 += '<option value="between">between</option>';
statement2 += '<option value="IS NULL">is null</option>';
statement2 += '<option value="IS NOT NULL">is not null</option>';
statement2 += '<option value="PURCHASED">PURCHASED</option>';
statement2 += '<option value="NOT PURCHASED">NOT PURCHASED</option>';
/*statement2 += '<option value="g8">matches other field</option>';
statement2 += '<option value="g8">differs from field</option>';*/
statement2 += '</select>'

statement2 += '<input type="text" value="" onchange="textvalue(this)" /></div>';

var addqueryroot = function (sel, isroot) {
	if (rootflag == 0) {
    $(sel).append(rootcondition);
	} else {
		if (isroot){
			$(sel).append(rootcondition1a+rootcondition1);	
		} else {
			$(sel).append(rootcondition1);	
		}
	}
	
    var q = $(sel).find('table');
    var l = q.length;
    var elem = q;
    if (l > 1) {
        elem = $(q[l - 1]);
    }

    //If root element remove the close image
    if (isroot) {
		if (rootflag == 0) {
        	elem.find('.remove').detach();
		} else {
			elem.find('td >.remove').removeClass('seperator');
		}
    }
    else {
        elem.find('td >.remove').click(function () {
            // td>tr>tbody>table
            $(this).parent().parent().parent().parent().detach();
        });
    }
	
	rootflag =1;

    // Add the default staement segment to the root condition
    elem.find('td >.querystmts').append(statement+statement1+statement2);

    // Add the head class to the first statement
    elem.find('td >.querystmts div >.remove').addClass('head');

    // Handle click for adding new statement segment
    // When a new statement is added add a condition to handle remove click.
    elem.find('td div >.add').click(function () {
        $(this).parent().siblings('.querystmts').append(statement + statement1 + statement2 );
        var stmts = $(this).parent().siblings('.querystmts').find('div >.remove').filter(':not(.head)');
        stmts.unbind('click');
        stmts.click(function () {
            $(this).parent().detach();
        });
    });

    // Handle click to add new root condition
    elem.find('td div > .addroot').click(function () {
        addqueryroot($(this).parent(), false);
    });
};


var addqueryroot1 = function (sel, isroot) {
    //$(sel).append(rootcondition);
    var q = $(sel).find('table');
    var l = q.length;
    var elem = q;
	
	for(i=1; i<=l; i++){
    if (l > 1) {
        elem = $(q[l - i]);
    }
	elem.find('td >.querystmts div >.remove').removeClass('head');
    //If root element remove the close image
    if (isroot) {
        elem.find('td >.remove').detach();
    }
    else {
        elem.find('td >.remove').click(function () {
            // td>tr>tbody>table
            $(this).parent().parent().parent().parent().detach();
        });
    }

    // Add the default staement segment to the root condition
    //elem.find('td >.querystmts').append(statement+statement1+statement2);

    // Add the head class to the first statement
    elem.find('td >.querystmts div >.remove').addClass('head');

    // Handle click for adding new statement segment
    // When a new statement is added add a condition to handle remove click.
    elem.find('td div >.add').click(function () {
        $(this).parent().siblings('.querystmts').append(statement + statement1 + statement2 );
        var stmts = $(this).parent().siblings('.querystmts').find('div >.remove').filter(':not(.head)');
        stmts.unbind('click');
        stmts.click(function () {
            $(this).parent().detach();
        });
    });

    // Handle click to add new root condition
    elem.find('td div > .addroot').click(function () {
        addqueryroot($(this).parent(), false);
    });
	}
};



//Recursive method to parse the condition and generate the query. Takes the selector for the root condition
var getCondition = function (rootsel) {
    //Get the columns from table (to find a clean way to do it later) //tbody>tr>td
	

	

							  
	  var q = {};
    var expressions = [];
    var nestedexpressions = [];
	 
    var elem = $(rootsel).children().children().children();
    //elem 0 is for operator, elem 1 is for expressions

   

    var operator = $(elem[0]).find(':selected').val();
    q.operator = operator;

    // Get all the expressions in a condition
    var expressionelem = $(elem[1]).find('> .querystmts div');
    for (var i = 0; i < expressionelem.length; i++) {
		
        expressions[i] = {};
        var col = $(expressionelem[i]).find('.col :selected');
        var op = $(expressionelem[i]).find('.op :selected');
        expressions[i].colval = col.val();
        expressions[i].coldisp = col.text();
        expressions[i].opval = op.val();
        expressions[i].opdisp = op.text();
        expressions[i].val = $(expressionelem[i]).find(':text').val();
    }
    q.expressions = expressions;

    // Get all the nested expressions
	 if ($(elem[1]).find('> div > table').length != 0) {
       var len = $(elem[1]).find('> div > table').length;

        for (var k = 0; k < len; k++) {
           nestedexpressions[k] = getCondition($(elem[1]).find('> div > table')[k]);
        }
    }
    q.nestedexpressions = nestedexpressions;
	
	
	
	return q;
};

//Recursive method to iterate over the condition tree and generate the query
var getQuery = function (condition) {
	
	 

	
    var op = [' ', condition.operator, ' '].join('');

    var e = [];
    var elen = condition.expressions.length;
    for (var i = 0; i < elen; i++) {
        var expr = condition.expressions[i];
		if (expr.opval == 'contains'){
        	e.push(expr.colval + "  Like  '%" + expr.val + "%'");
		} else if (expr.opval ==  'startswith'){
        	e.push(expr.colval + "  Like  '" + expr.val + "%'");
		} else if (expr.opval ==  'endswith'){
        	e.push(expr.colval + "  Like  '%" + expr.val + "'");
		} else if (expr.opval ==  'doesnotcontain'){
        	e.push(expr.colval + " NOT Like  '%" + expr.val + "%'");
		} else if (expr.opval ==  'doesnotstartwith'){
        	e.push(expr.colval + " NOT Like  '" + expr.val + "%'");
		} else if (expr.opval ==  'doesnotendswith'){
        	e.push(expr.colval + " NOT Like  '%" + expr.val + "'");
		} else if (expr.opval ==  'IS NULL'){
        	e.push(expr.colval + " IS NULL ");
		} else if (expr.opval ==  'IS NOT NULL'){
        	e.push(expr.colval + " IS NOT NULL ");
		} else {
			e.push(expr.colval + " " + expr.opval + " '" + expr.val+"' ");	
		}
    }
	var n = [];
    var nlen = condition.nestedexpressions.length;
    for (var k = 0; k < nlen; k++) {
        var nestexpr = condition.nestedexpressions[k];
        var result = getQuery(nestexpr);
        n.push(result);
    }
	
    var q = [];
    if (e.length > 0)
        q.push(e.join(op));
		
    if (n.length > 0)
        q.push(n.join(op));
		
	
	
    return ['(', q.join(op), ')'].join(' ');
};

