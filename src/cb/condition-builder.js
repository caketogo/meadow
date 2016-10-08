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



var rootcondition = '<table><tr><td class="seperator" ><img src="res/remove.png" alt="Remove" class="remove" /><select><option value="and">And</option><option value="or">Or</option></select></td>';
rootcondition += '<td><div class="querystmts"></div><div><img class="add" src="res/add.png" alt="Add" /> <button class="addroot">+()</button></div>';
rootcondition += '</td></tr></table>';

var statement = '<div><img src="res/remove.png" alt="Remove" class="remove" />'
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
statement2 += '<select class="op">';
statement2 += '<option value="contains">contains</option>';
statement2 += '<option value="startswith">starts with</option>';
statement2 += '<option value="endswith">ends with</option>';
statement2 += '<option value="doesnotcontain">does not contain</option>';
statement2 += '<option value="doesnotstartwith">does not start with</option>';
statement2 += '<option value="national">does not end with</option>';
statement2 += '<option value="area">equals</option>';
statement2 += '<option value="pop">not equal</option>';
statement2 += '<option value="gdp">less than</option>';
statement2 += '<option value="g8">greater than</option>';
statement2 += '<option value="g8">less than or equal to</option>';
statement2 += '<option value="g8">greater than or equal to</option>';
statement2 += '<option value="g8">between</option>';
statement2 += '<option value="g8">is null</option>';
statement2 += '<option value="g8">is not null</option>';
statement2 += '<option value="g8">matches other field</option>';
statement2 += '<option value="g8">differs from field</option>';
statement2 += '</select>'

statement2 += '<input type="text" /></div>';

var addqueryroot = function (sel, isroot) {
    $(sel).append(rootcondition);
    var q = $(sel).find('table');
    var l = q.length;
    var elem = q;
    if (l > 1) {
        elem = $(q[l - 1]);
    }

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


//Recursive method to parse the condition and generate the query. Takes the selector for the root condition
var getCondition = function (rootsel) {
    //Get the columns from table (to find a clean way to do it later) //tbody>tr>td
    var elem = $(rootsel).children().children().children();
    //elem 0 is for operator, elem 1 is for expressions

    var q = {};
    var expressions = [];
    var nestedexpressions = [];

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
        e.push(expr.colval + " " + expr.opval + " " + expr.val);
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

