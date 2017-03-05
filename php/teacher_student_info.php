<?php
	$U_ID = $_SESSION['U_ID'];
	if(strlen($U_ID)!=10){
		$sql = "select * from teacher_info_view where u_id=$U_ID";
	} else {
		$sql = "select * from student_info_view where u_id=$U_ID";
	}
	$stmt = sqlsrv_query($conn, $sql);
	if( $stmt == false){
			 $returnStr = "error";
			 //$returnStr = ERROR(500);
			 echo $returnStr;
	}
	
	else{
		if(strlen($U_ID)!=10){
			$array;
			$i=0;
			while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
				$array[$i]['I_TNum']=iconv('gbk','utf-8//IGNORE',$row['t_no']);
				$array[$i]['I_TName']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
				$array[$i]['I_TEnName']=iconv('gbk','utf-8//IGNORE',$row['en_name']);
				$array[$i]['I_TType']=iconv('gbk','utf-8//IGNORE',$row['type']);
				$array[$i]['I_TTitle']=iconv('gbk','utf-8//IGNORE',$row['title']);
				$array[$i]['I_TTutor']=iconv('gbk','utf-8//IGNORE',$row['tutor_qualification']);
				$array[$i]['I_TAdmin']=iconv('gbk','utf-8//IGNORE',$row['admin_duty']);
				$i++;
			}
			$usertype=1; //1 is teacher;
			$arrayRes['array'] = $array;
			$arrayRes['type'] = $usertype;
			echo JSON($arrayRes);
		}
		else{
			$array;
			$i=0;
			while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
				$array[$i]['I_SGrade']=iconv('gbk','utf-8//IGNORE',$row['grade']);
				$array[$i]['I_SNum']=iconv('gbk','utf-8//IGNORE',$row['s_no']);
				$array[$i]['I_SName']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
				$array[$i]['I_SEnName']=iconv('gbk','utf-8//IGNORE',$row['en_name']);
				$array[$i]['I_SType']=iconv('gbk','utf-8//IGNORE',$row['type']);
				$array[$i]['I_STeacher']=iconv('gbk','utf-8//IGNORE',$row['teacher_ch_name']);
				$i++;
			}
			$usertype=0; //0 is student;
			$arrayRes['array'] = $array;
			$arrayRes['type'] = $usertype;
			echo JSON($arrayRes);
		}
		
	}
?>