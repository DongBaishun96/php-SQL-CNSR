// JavaScript Document

$(document).ready(function() {
	$.post(BASE_URL + "course", {}, function(data) {
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data[i].C_ID);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].C_Name);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].C_Type);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].C_Student);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].C_Time);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].C_Teacher);
			tr.append(td);
			
			$("#table").append(tr);
		}
	});
});