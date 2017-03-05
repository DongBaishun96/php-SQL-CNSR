// JavaScript Document

$(document).ready(function() {
	
	$.post(BASE_URL + "personInfo", {}, function(data) {
		
		if(data.Code == 1){
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("用户编号:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_ID);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("用户类型:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Type);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("中文姓名:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_ChName);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("英文名:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_EnFirName);
			tr.append(td);
			$("#table").append(tr);			
									
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("英文姓:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_EnLasName);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("性别:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Sex);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("国籍:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Nation);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("出生日期:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Birth);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("电邮:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Email);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("移动电话:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Mobile);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("备注:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Remark);
			tr.append(td);
			$("#table").append(tr);
			
			var tr = $("<tr></tr>"); 
			var td = $("<td></td>");
			td.text("违约次数:");
			tr.append(td);
			var td = $("<td></td>");
			td.text(data.User.U_Violation);
			tr.append(td);
			$("#table").append(tr);
			
			if(data.User.U_Type == "老师"){
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("教师类别:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Type);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("单位信息:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Depart);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("职称:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Title);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("职务:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Post);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("导师资格:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Tutor);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("办公电话:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Tel);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("实验室职位:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_LabPost);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("社会兼职:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.T_Social);
				tr.append(td);
				$("#table").append(tr);
			}
			else if(data.User.U_Type == "学生"){
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("年级:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Grade);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("学生类别:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Type);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("入学年份:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Ent);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("导师:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Tutor);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("副导师:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_ViceTutor);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("毕业/就读:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Status);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("毕业时间:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Gra);
				tr.append(td);
				$("#table").append(tr);
				
				var tr = $("<tr></tr>"); 
				var td = $("<td></td>");
				td.text("初次就业单位:");
				tr.append(td);
				var td = $("<td></td>");
				td.text(data.User.S_Company);
				tr.append(td);
				$("#table").append(tr);
				
			}
			
		}
		else {
			alert(data.Msg);
		}	
	});
});