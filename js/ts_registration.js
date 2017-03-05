// JavaScript Document

var TYPE = new Array("签到信息");

var ti = new Array("账号","学/工号","姓名","签入时间","签出时间");


$(document).ready(function() {
	$.post(BASE_URL + "ts_registration", {}, function(data) {//！！！！！！！！！！！
		//alert("34");
		var i;
		
		for (i = 0; i < ti.length; i++) {
			var th = $("<th>" + ti[i] + "</th>");
			$("#thead").append(th);
		}
		for (i = 0; i < data.length; i++) 
		{
			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data[i].R_UId);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].R_Num);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].R_Name);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].R_CKIn);
			tr.append(td);
				
			var td = $("<td></td>");
			td.text(data[i].R_CKOut);
			tr.append(td);
			
			$("#table").append(tr);
		}
	
		
	});
});
