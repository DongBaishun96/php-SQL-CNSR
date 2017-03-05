// JavaScript Document

function exceptBook(){
	var B_No = $("#B_No").val().trim();
	
	if(B_No == "")
		alert("请输入完整信息");
	else {
		$.post(BASE_URL + "exceptBook", {B_No:B_No}, function(data) {
			alert(data.Msg);
		});
		// $.get("data.php",$("$("#B_ID").val()","$("#B_Name").val()","$("#B_Author").val()","$("#B_Time").val()"),function(data){
		// $("#getResponse").html(data); }//返回的data是字符串类型
		// );

	}
}