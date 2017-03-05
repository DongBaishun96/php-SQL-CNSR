<?php
	$U_ID = $_SESSION['U_ID'];
	if(strlen($U_ID)!=10){
		$sql = "select * from user_teacher_patent_view where u_id=$U_ID";
	} else {
		$sql = "select * from user_student_patent_view where u_id=$U_ID";
	}
	$stmt = sqlsrv_query($conn, $sql);
	if( $stmt == false){
			 $returnStr = "error";
			 //$returnStr = ERROR(500);
			 echo $returnStr;
	}
	
	else{
		$array;
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
			$array[$i]['P_ApplyNum']=iconv('gbk','utf-8//IGNORE',$row['patent_no']);
			$array[$i]['P_Name']=iconv('gbk','utf-8//IGNORE',$row['invent_name']);
			$array[$i]['P_ApplyAuthor']=iconv('gbk','utf-8//IGNORE',$row['legal_status']); 
			$i++;
		}
		echo JSON($array);
	}
?>