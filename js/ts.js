// JavaScript Document
//teachermingxiayouduoshao xuesheng

var TYPE = new Array("学生信息");

var Stu = new Array("学号","姓名","入学年份");


$(document).ready(function() {

	$.post(BASE_URL + "ts", {}, function(data) {//！！！！！！！！！！！
	
		var i;
		// alert("error0");
		//$("title").text(TYPE[t]);
		for (i = 0; i < Stu.length; i++) {
			var th = $("<th>" + Stu[i] + "</th>");
			$("#thead").append(th);
		}
		//alert(data.length);
		for (i = 0; i < data.length; i++) 
		{
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text(data[i].TS_Num);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].TS_Name);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].TS_Grade);
			tr.append(td);
			$("#table").append(tr);
		}
	
		
	});
});
