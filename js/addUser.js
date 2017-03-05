// JavaScript Document

function addUser(){
	var st_no = $("#new_st_no").val().trim();
	
	if(st_no == "")
		alert("请输入完整信息");
	else {
		$.post(BASE_URL + "addUser", {st_no:st_no}, function(data) {
			alert(data.Msg);
		});
		// $.get("data.php",$("$("#B_ID").val()","$("#B_Name").val()","$("#B_Author").val()","$("#B_Time").val()"),function(data){
		// $("#getResponse").html(data); }//返回的data是字符串类型
		// );

	}
}