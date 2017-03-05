<?php
	
	$sql = "select * from student_registration_view where 1=1";
	
	$stmt = sqlsrv_query($conn, $sql);

	if($stmt == null){
		echo "error";
	}
	$array;
	$i=0;
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
		$array[$i]['R_UId']=iconv('gbk','utf-8//IGNORE',$row['u_id']);
		$array[$i]['R_Num']=iconv('gbk','utf-8//IGNORE',$row['t_no']);
		$array[$i]['R_Name']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
		$array[$i]['R_CKIn']=iconv('gbk','utf-8//IGNORE',$row['check_in_time']->format('Y-m-d,H:i:s'));
		if(!empty($row['check_out_time'])){ 
			$array[$i]['R_CKOut'] = iconv('gbk','utf-8//IGNORE',$row['check_out_time']->format('Y-m-d,H:i:s'));
			} else{
				$array[$i]['R_CKOut'] = "未签出";
			}
		$i++;
	}
	$sql = "select * from teacher_registration_view where 1=1";
	
	$stmt = sqlsrv_query($conn, $sql);

	if($stmt == null){
		echo "error";
	}
	$array;
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
		$array[$i]['R_UId']=iconv('gbk','utf-8//IGNORE',$row['u_id']);
		$array[$i]['R_Num']=iconv('gbk','utf-8//IGNORE',$row['t_no']);
		$array[$i]['R_Name']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
		$array[$i]['R_CKIn']=iconv('gbk','utf-8//IGNORE',$row['check_in_time']->format('Y-m-d,H:i:s'));
		// $array[$i]['R_CKOut']=iconv('gbk','utf-8//IGNORE',$row['check_out_time']->format('Y-m-d,H:i:s'));
		if(!empty($row['check_out_time'])){ 
			$array[$i]['R_CKOut'] = iconv('gbk','utf-8//IGNORE',$row['check_out_time']->format('Y-m-d,H:i:s'));
			} else{
				$array[$i]['R_CKOut'] = "未签出";
			}
		$i++;
	}
	echo JSON($array);

?>