// JavaScript Document

function addDynamic(){
	
	var D_Type = $("#D_Type").val();
	var D_Title = $("#D_Title").val();
	var D_Content = $("#D_Content").val();
	
	if(D_Type == ""|| D_Title == ""|| D_Content == ""){
		alert("请输入完整信息");
	}
	else {
		//alert("begin");
		$.post(BASE_URL + "addDynamic", {D_Type:D_Type, D_Title:D_Title,D_Content:D_Content}, function(data) {
			//alert("end");
			alert(data.Msg);
		});
	}
}