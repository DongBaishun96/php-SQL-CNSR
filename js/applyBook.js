// JavaScript Document

function applyBook(){
	
	var B_ID = $("#B_ID").val();
	
	if(B_ID == "")
		alert("请输入图书ID");
	else{	
		$.post(BASE_URL + "applyBook", {B_ID:B_ID}, function(data) {
			alert(data.Msg);
		});
	}
}