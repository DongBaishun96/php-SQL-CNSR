<?php
	$sql = "select * from course";
	$stmt = sqlsrv_query($conn, $sql);
	if( $stmt == false){
			 $returnStr = ERROR(500);
			 echo $returnStr;
	}
	
	else{
		$array;
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
			$as1=$row['c_no'];
			$sql1="select ch_name from teacher_course,teacher where teacher_course.c_no='$as1' AND teacher_course.t_id=teacher.t_id";
			$stmt1 = sqlsrv_query($conn, $sql1);
			$row2 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC);

			$array[$i]['C_Name']=iconv('gbk','utf-8//IGNORE',$row['name']);
			$array[$i]['C_Type']=iconv('gbk','utf-8//IGNORE',$row['type']);
			$array[$i]['C_Student']=iconv('gbk','utf-8//IGNORE',$row['target_student_class']);
			$array[$i]['C_Time']=iconv('gbk','utf-8//IGNORE',$row['time']);
			$array[$i]['C_Teacher']=iconv('gbk','utf-8//IGNORE',$row2['ch_name']);
			$array[$i]['C_ID']=iconv('gbk','utf-8//IGNORE',$row['c_no']);
			//$array[$i]['C_Remark']=$row['C_Remark'];
			$i++;
		}
		echo JSON($array);
	}
?>