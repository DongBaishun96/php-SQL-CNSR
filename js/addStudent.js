// JavaScript Document

function addStudent(){
	var s_no = $("#new_no").val().trim();
	var s_chName = $("#new_chName").val().trim();
	var s_gender = $("#new_gender").val().trim();
	var s_type = $("#new_type").val().trim();
	
	// t_no = "6120108888";
	// t_chName = "朴成哲";
	// t_type = "兼职";
	// t_title = "讲师";
	// t_tutor = "硕士生导师";
	// t_duty = "学委";

	if(s_no == "" || s_chName == "" || s_type == "" || s_gender == "" )
		alert("请输入完整信息");
	else {
		$.post(BASE_URL + "addStudent", {s_no:s_no,s_chName:s_chName,s_type:s_type,s_gender:s_gender}, function(data) {
			alert(data.Msg);
		});
	}
}