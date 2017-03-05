<?php
	$U_ID = $_SESSION['U_ID'];
	if(strlen($U_ID)!=10){
		$sql = "select * from teacher_student_registration_view where u_id=$U_ID";
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
			$array[$i]['SR_Num']=iconv('gbk','utf-8//IGNORE',$row['s_no']);
			$array[$i]['SR_Name']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
			$array[$i]['SR_CKIn']=iconv('gbk','utf-8//IGNORE',$row['check_in_time']->format('Y-m-d,H:i:s'));
			$array[$i]['SR_CKOut']=iconv('gbk','utf-8//IGNORE',$row['check_out_time']->format('Y-m-d,H:i:s'));
			$i++;
		}
		if($i>0){
			$arrayRes['array'] = $array;
			$Msg = "查询成功";
		}
		
		echo JSON($array);
		
	}
?>