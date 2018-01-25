(function($) {
  "use strict"; // Start of use strict


searchUserInfo(true);

//Search function
$("#searchButton").on("click",function(){
    searchUserInfo(false);
});

//search all users
function searchUserInfo(isFirstLoad){
    var searchText = $("#searchText").val();
    $.ajax({
        method: "POST",
        url: "server.php",
        data: { "searchText": searchText,action:"search"}
    })
    .done(function( response ) {
        var trList = "";
        $.each( response, function( index, obj ){

            trList += "<tr id='tr"+obj['id']+"'>"+generateUserInfoTD(obj)+"</tr>";
        });
        $("#userListTable tbody").empty().html(trList);

        if(isFirstLoad){
            var userCountData = filterUserCountByGender(response);
            display3DPie(userCountData);
        }
    });
}

//chart gender
function filterUserCountByGender(response) {
    var array = [];
    var genderMap = {}; // {1:maleCount.2:femaleCount}

    var totalCount = response.length;
    $.each( response, function( index, obj ){
        var gender = obj['gender'];
        if(genderMap[gender]){
            genderMap[gender] += 1;
        }else {
            genderMap[gender] = 1;
        }
    });

    for(var gender in genderMap){
        var genderStr =  gender == '1' ? 'male' : 'female';
        array.push([genderStr,genderMap[gender]/totalCount*100]);
    }
    return array;
}


$(document).keypress(function(e) {
    if(e.which == 13) {
        $("#searchButton").click();
    }
});

//line desgin 
function generateUserInfoTD(obj){
    var genderStr =  obj['gender'] == '1' ? 'male' : 'female';
    return "<td>"+ obj['name'] + "</td>"+
     "<td>"+ obj['email'] + "</td>" +
    "<td>"+ obj['age'] + "</td>" +
    "<td>"+ genderStr + "</td>" +
    "<td><i data-id="+obj['id']+" class='fa fa-pencil-square-o editIcon' aria-hidden='true'></i></td>";
}

//edit 7 update
$(document).on("click",".editIcon",function () {
    var id = $(this).attr("data-id");
    $.ajax({
        method: "POST",
        url: "server.php",
        data: { id: id,action:"searchById"}
    }).done(function( response ) {
        $("#ageEditInput").val(response.age);
        $("#userNameEditInput").val(response.name);
        $("#emailEditInput").val(response.email);
        $("#genderEditSelect").val(response.gender);
        $("#eventEditSelect").val(response.event);
        $("#contactEditInput").val(response.contact);
        $("#addressEditInput").val(response.address);
        $("#industryEditSelect").val(response.industry);


        $("#hiddenUserId").val(response.id);

        $('#userModal').modal('show');
    });
});

//save 
$(document).on("click","#saveButton",function () {
    var userId =  $("#hiddenUserId").val();
    var dataObj = { id: userId,
        name:$("#userNameEditInput").val(),
        age:$("#ageEditInput").val(),
        gender:$("#genderEditSelect").val(),
        email:$("#emailEditInput").val(),
        contact:$("#contactEditInput").val(),
        address:$("#addressEditInput").val(),
        industry:$("#industryEditSelect").val(),
        event:$("#eventEditSelect").val(),
        action:"edit"};
    $.ajax({
        method: "POST",
        url: "server.php",
        data: dataObj
    }).done(function( response ) {
       if(response == "successful"){
           $('#userModal').modal('hide');
           $("#tr"+ userId).empty().html(generateUserInfoTD(dataObj));
       }else {
            alert("Fail ! Please try again.");
       }
    });
});




/*
var csvArray;
  $.ajax({
        type: "GET",
        url: "chart.csv",
        dataType: "text",
        success: function(data) {

        	csvArray = CSV2JSON(data);
            var locationAmountData = filterAmountByLocation(csvArray);


            display3DPie(locationAmountData);

        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert("Status: " + xhr.status + " Error: " + thrownError);
        }
    });


$( document ).on( "", function( event, arg1, arg2 ) {
    chart.series[0].setData(filterAmountByLocation(csvArray),true);
});


function filterAmountByLocation(csvDataArray){
	
	var locationMap = {};
	var totalAmount = 0;
	for(var i=0;i<=csvDataArray.length-1;i++){
		var amount = parseInt(csvDataArray[i].amount);
		totalAmount += amount;
		var location = csvDataArray[i].location;
		if(locationMap[location]){
			locationMap[location] += amount;
		}else {
			locationMap[location] = amount;
		}
	}

	//Calculatge storage
	if (localStorage.donateRecord) {
		var recordArray = JSON.parse(localStorage.donateRecord);
		for(var i=0;i<=recordArray.length-1;i++){
			var amount = parseInt(recordArray[i].amount);
			totalAmount += amount;
			var location = recordArray[i].location;
			if(locationMap[location]){
				locationMap[location] += amount;
			}else {
				locationMap[location] = amount;
			}
		}
	}

	var array = [];
	for(var location in locationMap){
		array.push([location,locationMap[location]/totalAmount *100]);
	}

	return array;
}

*/
var chart;
function display3DPie(userCountData){

	chart = Highcharts.chart('container', {
	    chart: {
	        type: 'pie',
	        options3d: {
	            enabled: true,
	            alpha: 45,
	            beta: 0
	        }
	    },
	    title: {
	        text: 'Users in system who registered participant'
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            depth: 35,
	            dataLabels: {
	                enabled: true,
	                format: '{point.name}'
	            }
	        }
	    },
	    series: [{
	        type: 'pie',
	        name: 'count in %',
	        data: userCountData
	    }]
	});
}
// Source: http://www.bennadel.com/blog/1504-Ask-Ben-Parsing-CSV-Strings-With-Javascript-Exec-Regular-Expression-Command.htm
// This will parse a delimited string into an array of
// arrays. The default delimiter is the comma, but this
// can be overriden in the second argument.

/*
function CSVToArray(strData, strDelimiter) {
    // Check to see if the delimiter is defined. If not,
    // then default to comma.
    strDelimiter = (strDelimiter || ",");
    // Create a regular expression to parse the CSV values.
    var objPattern = new RegExp((
    // Delimiters.
    "(\\" + strDelimiter + "|\\r?\\n|\\r|^)" +
    // Quoted fields.
    "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" +
    // Standard fields.
    "([^\"\\" + strDelimiter + "\\r\\n]*))"), "gi");
    // Create an array to hold our data. Give the array
    // a default empty first row.
    var arrData = [[]];
    // Create an array to hold our individual pattern
    // matching groups.
    var arrMatches = null;
    // Keep looping over the regular expression matches
    // until we can no longer find a match.
    while (arrMatches = objPattern.exec(strData)) {
        // Get the delimiter that was found.
        var strMatchedDelimiter = arrMatches[1];
        // Check to see if the given delimiter has a length
        // (is not the start of string) and if it matches
        // field delimiter. If id does not, then we know
        // that this delimiter is a row delimiter.
        if (strMatchedDelimiter.length && (strMatchedDelimiter != strDelimiter)) {
            // Since we have reached a new row of data,
            // add an empty row to our data array.
            arrData.push([]);
        }
        // Now that we have our delimiter out of the way,
        // let's check to see which kind of value we
        // captured (quoted or unquoted).
        if (arrMatches[2]) {
            // We found a quoted value. When we capture
            // this value, unescape any double quotes.
            var strMatchedValue = arrMatches[2].replace(
            new RegExp("\"\"", "g"), "\"");
        } else {
            // We found a non-quoted value.
            var strMatchedValue = arrMatches[3];
        }
        // Now that we have our value string, let's add
        // it to the data array.
        arrData[arrData.length - 1].push(strMatchedValue);
    }
    // Return the parsed data.
    return (arrData);
}

function CSV2JSON(csv) {
    var array = CSVToArray(csv);
    var objArray = [];
    for (var i = 1; i < array.length; i++) {
        objArray[i - 1] = {};
        for (var k = 0; k < array[0].length && k < array[i].length; k++) {
            var key = array[0][k];
            objArray[i - 1][key] = array[i][k]
        }
    }

    //var json = JSON.stringify(objArray);
    //var str = json.replace(/},/g, "},\r\n");

    return objArray;
}
*/
})(jQuery); // End of use strict