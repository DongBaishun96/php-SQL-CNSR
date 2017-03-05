// JavaScript Document

var TYPE = new Array("在读学生","毕业学生");
var NOW = new Array("学号","姓名","性别","类别","导师");
var GRA = new Array("学号","姓名","性别","类别");

//var GRA = new Array("学号","姓名","性别","类别","入学时间","毕业时间");

$(document).ready(function() {
	var type = $_GET["t"];
	$("title").text(TYPE[type]);
	$("#title").text(TYPE[type]);
	
	if (type == 0) { //在读学生信息列表
		for (i = 0; i < NOW.length; i++) {
			var th = $("<th>" + NOW[i] + "</th>");
			$("#thead").append(th);
		}
	}
	
	else if (type == 1) { //毕业学生信息列表
		for (i = 0; i < GRA.length; i++) {
			var th = $("<th>" + GRA[i] + "</th>");
			$("#thead").append(th);
		}
	}
	
	$.post(BASE_URL + "student", {type:type}, function(data) {
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data[i].U_ID);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].U_ChName);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].U_Sex);
			tr.append(td);
				
			var td = $("<td></td>");
			td.text(data[i].S_Type);
			tr.append(td);
			
			if (type == 0) {
				var td = $("<td></td>");
				td.text(data[i].S_Tutor);
				tr.append(td);
			}
			
			else if (type == 1) { //TODO
				// var td = $("<td></td>");
				// td.text(data[i].S_Ent);
				// tr.append(td);
				
				// var td = $("<td></td>");
				// td.text(data[i].S_Gra);
				// tr.append(td);
			}
			
			$("#table").append(tr);
		}
	});
});