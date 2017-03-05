// JavaScript Document

var TYPE = new Array("全职","兼职");
var FULL = new Array("编号","姓名","职称");
var PART = new Array("编号","姓名","职称");

$(document).ready(function() {
	var t = $_GET["t"];
	var type = TYPE[t];
	$("title").text(type + "教师");
	$("#title").text(type + "教师");
	
	if (t == 0) {
		for (i = 0; i < FULL.length; i++) {
			var th = $("<th>" + FULL[i] + "</th>");
			$("#thead").append(th);
		}
	}
	
	else if (t == 1) {
		for (i = 0; i < PART.length; i++) {
			var th = $("<th>" + PART[i] + "</th>");
			$("#thead").append(th);
		}
	}
	
	$.post(BASE_URL + "teacher", {type:type}, function(data) {
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>"); 

			var td = $("<td></td>");
			td.text(data[i].U_ID);
			tr.append(td);
			
			if(t == 1){
				var td = $("<td></td>");
				td.text(data[i].T_ChName);
				tr.append(td);

				var td = $("<td></td>");
				td.text(data[i].T_Title);
				tr.append(td);
			}
			else if (t == 0) {
				// var td = $("<td></td>");
				// td.text(data[i].T_No);
				// tr.append(td);

				var td = $("<td></td>");
				td.text(data[i].T_ChName);
				tr.append(td);
				
				// var td = $("<td></td>");
				// td.text(data[i].T_Type);
				// tr.append(td);
				
				var td = $("<td></td>");
				td.text(data[i].T_Title);
				tr.append(td);

				// var td = $("<td></td>");
				// td.text(data[i].T_qualification);
				// tr.append(td);

				// var td = $("<td></td>");
				// td.text(data[i].T_duty);
				// tr.append(td);
			}
			
			$("#table").append(tr);
		}
	});
});