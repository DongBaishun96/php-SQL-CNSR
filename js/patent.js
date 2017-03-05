// JavaScript Document

$(document).ready(function() {
	$.post(BASE_URL + "patent", {}, function(data) {       
		for (i = 0; i < data.length; i++) {
			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data[i].P_ApplyNum);
			tr.append(td);
			
			// var td = $("<td></td>");
			// td.text(data[i].P_ApplyAuthor);
			// tr.append(td);
			
			var td = $("<td></td>");
			td.text(data[i].P_Name);
			tr.append(td);
			var td = $("<td></td>");
			td.text(data[i].P_ApplyAuthor);
			tr.append(td);
			
			$("#table").append(tr);
		}
	});
});			