<?php
	$U_ID = $_SESSION['U_ID'];
	if(strlen($U_ID)!=10){
		$sql = "select * from teacher_student_view where u_id=$U_ID order by grade DESC";
	} else {
		$returnStr = "error";
		//$returnStr = ERROR(500);
		echo $returnStr;
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
			$array[$i]['TS_Num']=iconv('gbk','utf-8//IGNORE',$row['s_no']);
			$array[$i]['TS_Name']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
			$array[$i]['TS_Grade']=iconv('gbk','utf-8//IGNORE',$row['grade']);
			$i++;
		}
		
		echo JSON($array);
		
		
	}
?>