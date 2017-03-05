// JavaScript Document

function book(){
	
	var B_Name = $("#B_Name").val().trim();
	var B_Author = $("#B_Author").val().trim();
	
	$.post(BASE_URL + "book", {B_Name:B_Name,B_Author:B_Author}, function(data) {
		
		//$("tr:not(:first)").empty("");
				
		if(data.Code == 1){			
			// var elem=document.getElementById('#table'); // 按 id 获取要删除的元素
			// elem.parentNode.removeChild(elem);
			$("#table table").remove();

			for (i = 0; i < data.Book.length; i++) {

			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data.Book[i].B_ID);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.Book[i].B_Name);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.Book[i].B_Author);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.Book[i].B_Time);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.Book[i].B_Status);
			if(data.Book[i].B_Status == "0") td.text("可借");
			else td.text("已借出");
			tr.append(td);						
									
			$("#table").append(tr);
			}	
		}
		else alert(data.Msg);
				
	});
}