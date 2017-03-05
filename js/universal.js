// JavaScript Document

var BASE_URL = "http://localhost:8088/CNSR/php/receive.php?PostType=";

var U_ID;
var U_Type;

$.post = function(a, b, c) {
	$.ajax({
		url: a,
		type: 'post',
		data: typeof(b) == 'object' ? b : {},
		dataType: 'json',
		cache: false,
		traditional: true,
		success: typeof(b) == 'function' ? b :
				typeof(c) == 'function' ? c : function() {}
	});
};

$_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();

$(document).ready(function() {
	$("#header").load("header.html");
	$("#menu").load("menu.html");
	$("#footer").load("footer.html");
	
	$.post(BASE_URL + "session", {}, function(data) {
		var code = data.Code;
		
		if (code == 1) {
			U_ID = data.User.U_ID;
			U_Type = data.User.U_Type;
			$("#logout h5").text(U_ID);
			$("#login").css("display", "none");
			$("#logout").css("display", "block");
			$(".hidden_menu").css("visibility","visible")
			$(".manager_menu").css("visibility","hidden")
			
			if(U_Type == "admin"){ //系统管理
				$(".manager_menu").css("visibility","visible")
				$(".book_menu").css("visibility", "collapse")
				$(".director_menu").css("visibility","collapse")
				$(".teacher_menu").css("visibility","visible")
			}
			else if(U_Type == "book"){ //图书管理
				$(".manager_menu").css("visibility","hidden")
				$(".book_menu").css("visibility", "visible")
				$(".director_menu").css("display", "none")
				$(".teacher_menu").css("visibility","visible")
			} 
			else if(U_Type == "director"){ //主任管理
				$(".manager_menu").css("visibility","hidden")
				$(".book_menu").css("visibility", "hidden")
				$(".director_menu").css("visibility","visible")
				$(".teacher_menu").css("visibility","visible")
			} 
			else if(U_Type == "teacher"){ //普通教师
				$(".manager_menu").css("visibility","hidden")
				$(".book_menu").css("visibility", "hidden")
				$(".director_menu").css("visibility","hidden")
				$(".teacher_menu").css("visibility","visible")
			}else if(U_Type == "user"){ //普通学生
				$(".hidden_menu").css("visibility","visible")
				$(".manager_menu").css("visibility","hidden")
				$(".book_menu").css("visibility", "hidden")
				$(".director_menu").css("visibility","hidden")
				$(".teacher_menu").css("visibility","hidden")
			}
		}
		
		else if (code == 0) {
			$("#login").css("display", "block");
			$("#logout").css("display", "none");
			$(".hidden_menu").css("visibility","hidden")
		}
	});
	//更新新闻
	NEW_BASE_URL = "http://localhost:8088/CNSR/news.html?news=";
	$.post(BASE_URL + "Nmessage", {}, function(data) {
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>");
			var td = $("<td></td>");
			var a = $("<a></a>");
			var a_href = NEW_BASE_URL+data[i].M_id;
			a.attr("href", a_href);
			a.text(data[i].M_title);
			td.append(a);
			tr.append(td);
			$("#N_table").append(tr);
		}
	});
	//通知公告
	$.post(BASE_URL + "Amessage", {}, function(data) {
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>");
			var td = $("<td></td>");
			var a = $("<a></a>");
			var a_href = NEW_BASE_URL+data[i].M_id;
			a.attr("href", a_href);
			a.text(data[i].M_title);
			td.append(a);
			tr.append(td);
			$("#A_table").append(tr);
		}
	});
	//学术活动
	$.post(BASE_URL + "Smessage", {}, function(data) {
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>");
			var td = $("<td></td>");
			var a = $("<a></a>");
			var a_href = NEW_BASE_URL+data[i].M_id;
			a.attr("href", a_href);
			a.text(data[i].M_title);
			td.append(a);
			tr.append(td);
			$("#S_table").append(tr);
		}
	});
});

function goHome() {
	window.location.href = "home.html";
}

function goHomeRoot() {
	window.location.href = "homeRoot.html";
}

function goLogin() {
	window.location.href = "login.html";
}

function goLogout() {
	$.post(BASE_URL + "loginOut", {}, function(data) {
		goHome();
	});
}