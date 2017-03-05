// JavaScript Document


$(document).ready(function() {
	
	$.post(BASE_URL + "expiredBook", {}, function(data) {
		//alert(data);
		if(data.Code == 1)
		{
		for (i = 0; i < data.expire.length; i++) {
			var tr = $("<tr></tr>");
			
			var td = $("<td></td>");
			td.text(data.expire[i].B_NO);
			tr.append(td);

			var td = $("<td></td>");
			td.text(data.expire[i].B_ID);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.expire[i].Author);
			tr.append(td);
			
			var td = $("<td></td>");
			td.text(data.expire[i].borrow_date);
			tr.append(td);

			var td = $("<td></td>");
			td.text(data.expire[i].return_date);
			tr.append(td);

			var td = $("<td></td>");
			td.text(data.expire[i].real_return_date);
			tr.append(td);

			$("#table").append(tr);
		}
		}
		else alert(data.Msg);
	});
});