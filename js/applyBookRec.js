// JavaScript Document
//alert("!2");
$(document).ready(function() {
	//alert("2323");
	$.post(BASE_URL + "applyBookRec", {}, function(data) {
		//alert(data.Code);
		if(data.Code == 1){
		for (i = 0; i < data.ApplyRec.length; i++) {
			var tr = $("<tr></tr>"); 
			
			var td = $("<td></td>");
			td.text(data.ApplyRec[i].U_ID);
			tr.append(td);

			var td = $("<td></td>");
			td.text(data.ApplyRec[i].B_ID);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.ApplyRec[i].Author);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.ApplyRec[i].borrow_date);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.ApplyRec[i].return_date);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.ApplyRec[i].real_return_date);
			tr.append(td);
			
			$("#table").append(tr);
		}
		}
		else{
			alert(data.Msg);
		}
	});
});