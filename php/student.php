<?php
	$as=$_POST["type"];
	if($as==0) {
		$sql = "select * from student where graduation_date is null";
	} else if($as==1) {
		$sql = "select * from student where graduation_date is not null";
	}
	$stmt = sqlsrv_query($conn, $sql);
	if( $stmt == false){
		$returnStr = ERROR(500);
		echo $returnStr;
	}
	else{
		$array;
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
			$array[$i]['U_ID']=$row['s_no'];
			$as1=$row['s_no'];
			//$sql1="select ch_name,gender,U_Nation from [User] where U_ID='$as1'";
			$sql1="select ch_name from teacher_student,teacher where s_no='$as1' AND teacher_student.t_id=teacher.t_id";
			$stmt1 = sqlsrv_query($conn, $sql1);
			$row2 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC);
			$array[$i]['U_ChName']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
			$array[$i]['U_Sex']=iconv('gbk','utf-8//IGNORE',$row['gender']);
			$array[$i]['S_Type']=iconv('gbk','utf-8//IGNORE',$row['type']);
			//$array[$i]['U_Nation']=iconv('gbk','utf-8//IGNORE',$row['nationality']);
			$array[$i]['S_Tutor']=iconv('gbk','utf-8//IGNORE',$row2['ch_name']);
			// if($as==1){
			// 	$array[$i]['S_Ent']=iconv('gbk','utf-8//IGNORE',$row['entry_date']);
			// 	$array[$i]['S_Gra']=iconv('gbk','utf-8//IGNORE',$row['graduation_date']);
			// 	$array[$i]['S_Company']=iconv('gbk','utf-8//IGNORE',$row['employment']);
			// }
			$i++;
		}
		echo JSON($array);
	}
?>