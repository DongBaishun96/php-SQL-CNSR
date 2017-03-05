// JavaScript Document
// 所有学生论文信息

var TYPE = new Array("论文");

var ti = new Array("年级","学号","姓名","论文题目");

$(document).ready(function() {
	$.post(BASE_URL + "s_dissertation", {}, function(data) {//！！！！！！！！！！！
		
		var i;

		for (i = 0; i < ti.length; i++) {
			var th = $("<th>" + ti[i] + "</th>");
			$("#thead").append(th);
		}
		for (i = 0; i < data.length; i++) 
		{
			var tr = $("<tr></tr>");
			
			var td = $("<td></td>");
			td.text(data[i].D_UId);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].D_Num);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].D_Name);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].D_Title);
			tr.append(td);
			
			$("#table").append(tr);
		}
	
		
		
		
	});
});
