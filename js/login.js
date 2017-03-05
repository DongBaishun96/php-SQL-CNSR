// JavaScript Document

function login() {
	var account = $("#account").val();
	var password = $("#password").val();
	
	$.post(BASE_URL + "login", {U_ID:account, U_Password:password}, function(data) {
		var code = data.Code;
		if (code == 1) {
				goHome();
		} 
		else alert(data.Msg);
	});
}