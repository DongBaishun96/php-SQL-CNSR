//JavaScript

$(document).ready(function() {
	//var str="adsfadsfdasf";
	var new_id = $_GET["news"];
	//alert(new_id);
	$.post(BASE_URL + "news", {new_id:new_id}, function(data) {
		//alert(data[0].M_title);
		$("#news_title").text(data[0].M_title);
			$("#news_author").text(data[0].M_author);
			$("#news_date").text(data[0].date);
			$("#news_content").text(data[0].M_content);
		//if(data.length == 1) {
			
			//$("#href").attr("href","http://www.baidu.com?news=id");
		//}
		// for (i = 0; i < data.length; i++) {
		// 	var tr = $("<tr></tr>");
		// 	var td = $("<td></td>");
		// 	var a = $("<a></a>");
		// 	var a_href = NEW_BASE_URL+data[i].M_id;
		// 	a.attr("href", a_href);
		// 	a.text(data[i].M_title);
		// 	td.append(a);
		// 	tr.append(td);
		// 	$("#table").append(tr);
		// }
	});	
});