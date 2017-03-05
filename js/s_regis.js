// JavaScript Document

var TYPE = new Array("学生信息");
var Stu = new Array("学号","姓名","签入时间","签出时间");

$(document).ready(function() {

	$.post(BASE_URL + "s_regis", {}, function(data) {//！！！！！！！！！！！
		
		var i;
	
		for (i = 0; i < Stu.length; i++) {
			var th = $("<th>" + Stu[i] + "</th>");
			$("#thead").append(th);
		}
		for (i = 0; i < data.length; i++) 
		{
			var tr = $("<tr></tr>"); 

			var td = $("<td></td>");
			td.text(data[i].SR_Num);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].SR_Name);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].SR_CKIn);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].SR_CKOut);
			tr.append(td);
			
			$("#table").append(tr);
		}

	});
});
