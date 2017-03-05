// JavaScript Document

function delTeacher(){
	var t_id = $("#del_no").val().trim();
	var t_chName = $("#del_chName").val().trim();

	if(t_id == "" || t_chName == "")
		alert("请输入完整信息");
	else {
		$.post(BASE_URL + "delTeacher", {t_id:t_id,t_chName:t_chName}, function(data) {
			alert(data.Msg);
		});
	}
}