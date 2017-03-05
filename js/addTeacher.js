// JavaScript Document

function addTeacher(){
	var t_no = $("#new_no").val().trim();
	var t_chName = $("#new_chName").val().trim();
	var t_type = $("#new_type").val().trim();
	var t_title = $("#new_title").val().trim();
	var t_tutor = $("#new_tutor").val().trim();
	var t_duty = $("#new_duty").val().trim();
	
	// t_no = "6120108888";
	// t_chName = "朴成哲";
	// t_type = "兼职";
	// t_title = "讲师";
	// t_tutor = "硕士生导师";
	// t_duty = "学委";

	if(t_no == "" || t_chName == "" || t_type == "" || t_title == "" || t_tutor == "" || t_duty == "")
		alert("请输入完整信息");
	else {
		$.post(BASE_URL + "addTeacher", {t_no:t_no,t_chName:t_chName,t_type:t_type,t_title:t_title,t_tutor:t_tutor,t_duty:t_duty}, function(data) {
			alert(data.Msg);
		});
	}
}