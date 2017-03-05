// JavaScript Document

var TYPE = new Array("文件下载");

var Stu = new Array("文件列表");

$(document).ready(function() {
	$.post(BASE_URL + "showdown", {}, function(data) {//！！！！！！！！！！！
		var i;
		// alert("error0");
		//$("title").text(TYPE[t]);
		for (i = 0; i < Stu.length; i++) {
			var th = $("<th>" + Stu[i] + "</th>");
			$("#thead").append(th);
		}
		//alert(data.length);
		var tr = $("<tr></tr>"); 
		for (i = 0; i < data.length; i++) 
		{
			var td="";
			td+="<p>";
			td+="<a href="+"http://localhost:8088/CNSR/upload/"+data[i].F_Dir+"/"+data[i].F_Name+">";
			td+=data[i].F_Name;
			td+="</a>";
			td+="</p>";
			tr.append(td);
		}
	
		$("#table").append(tr);
		
	});
});
