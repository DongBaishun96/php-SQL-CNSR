// JavaScript Document

function addBook(){
	var B_ID = $("#B_ID").val().trim();
	var B_Name = $("#B_Name").val().trim();
	var B_Author = $("#B_Author").val().trim();
	var B_Time = $("#B_Time").val().trim();
	
	if(B_ID == ""|| B_Name == ""|| B_Author == ""||B_Time == "")
		alert("请输入完整信息");
	else {
		$.post(BASE_URL + "addBook", {B_ID:B_ID, B_Name:B_Name,B_Author:B_Author,B_Time:B_Time}, function(data) {
			alert(data.Msg);
		});
		// $.get("data.php",$("$("#B_ID").val()","$("#B_Name").val()","$("#B_Author").val()","$("#B_Time").val()"),function(data){
		// $("#getResponse").html(data); }//返回的data是字符串类型
		// );

	}
}