// JavaScript Document

var TYPE = new Array("学生信息","教师信息");

var Stu = new Array("入学年份","学号","姓名","英文姓名","类别","导师");
var Tea = new Array("工号","姓名","英文姓名","类别","职称","导师资格","职务");

$(document).ready(function() {

	$.post(BASE_URL + "tsinfo", {}, function(data) {//！！！！！！！！！！！
		var t=data.type;
		var i;
		if(t=="0")//学生信息
		{
			// alert("error0");
			//$("title").text(TYPE[t]);
			for (i = 0; i < Stu.length; i++) {
				var th = $("<th>" + Stu[i] + "</th>");
				$("#thead").append(th);
			}
			for (i = 0; i < data['array'].length; i++) 
			{
				var tr = $("<tr></tr>"); 

				var td = $("<td></td>");
				td.text(data['array'][i].I_SGrade);
				tr.append(td);
			
				var td = $("<td></td>");
				td.text(data['array'][i].I_SNum);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_SName);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_SEnName);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_SType);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_STeacher);
				tr.append(td);
			}
	
			$("#table").append(tr);
		}
		else if(t=="1")//教师信息
		{
			// var i;
			//alert("error1");
			// alert(data['array'][0].I_TNum);
			// alert(data['array'][0].I_TName);
			// alert(data['array'][0].I_TEnName);
			// alert(data['array'][0].I_TType);
			// alert(data['array'][0].I_TTitle);
			// alert(data['array'][0].I_TAdmin);
			//$("#title").text(TYPE[t]);
			for (i = 0; i < Tea.length; i++) 
			{
				var th = $("<th>" + Tea[i] + "</th>");
				$("#thead").append(th);
			}
			for (i = 0; i < data['array'].length; i++) 
			{
				var tr = $("<tr></tr>"); 
			
				var td = $("<td></td>");
				td.text(data['array'][i].I_TNum);
				tr.append(td);
			
				var td = $("<td></td>");
				td.text(data['array'][i].I_TName);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_TEnName);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_TType);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_TTitle);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_TTutor);
				tr.append(td);
				
				var td = $("<td></td>");
				td.text(data['array'][i].I_TAdmin);
				tr.append(td);
			}
	
			$("#table").append(tr);
		}
		else {
			alert("error3");
		}
		
	});
});
