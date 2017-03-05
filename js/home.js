// JavaScript Document

$(document).ready(function() {
	
	$.post(BASE_URL + "dynamicList", {D_Type:"通知通告"}, function(data) { 
		for (i = 0; i < data.dynamic.length; i++) {
			var li = $("<li class='my_li'></li>");
			var a = $("<a></a>");
			a.text(data.dynamic[i].D_Title);
			a.attr("href", "dynamic.html?id=" + data.dynamic[i].D_ID);
			li.append(a);
			$("#info1").append(li);
		}
	});
	
	$.post(BASE_URL + "dynamicList", {D_Type:"新闻动态"}, function(data) { 
		for (i = 0; i < data.dynamic.length; i++) {
			var li = $("<li class='my_li'></li>");
			var a = $("<a></a>");
			a.text(data.dynamic[i].D_Title);
			a.attr("href", "dynamic.html?id=" + data.dynamic[i].D_ID);
			li.append(a);
			$("#info2").append(li);
		}
	});
	
	$.post(BASE_URL + "dynamicList", {D_Type:"学术活动"}, function(data) { 
		for (i = 0; i < data.dynamic.length; i++) {
			var li = $("<li class='my_li'></li>");
			var a = $("<a></a>");
			a.text(data.dynamic[i].D_Title);
			a.attr("href", "dynamic.html?id=" + data.dynamic[i].D_ID);
			li.append(a);
			$("#info3").append(li);
		}
	});
});