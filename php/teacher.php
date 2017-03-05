<?php
	$as=$_POST["type"];
	// if($as==0) { //全职教师
	// 	$sql = "select * from teacher where type='全职' and ch_name='单纯'";
	// } else if($as==1) { //兼职教师
	// 	$sql = "select * from teacher where type='兼职'";
	// }
	if($as == "全职"){
		$condition = "全职";
	}
	else{
		$condition = "兼职";
	}
	$condition = iconv('utf-8', 'gbk', $condition);
	$sql = "select * from teacher where type='$condition'";

	$stmt = sqlsrv_query($conn, $sql);
	//echo $sql;
	if( $stmt == false){
		$returnStr = ERROR(500);
		echo $returnStr;
	}
	else{
		//echo "else";
		$array;
		$i=0;
		//echo "i";
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
			//echo "while";
		// 	//if($as==0){
		// 	// $array[$i]['U_ID']=iconv('gbk','utf-8//IGNORE',$row['t_id']);
		// 	// $array[$i]['T_No']=iconv('gbk','utf-8//IGNORE',$row['t_no']);
		// 	// $array[$i]['T_ChName']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
		// 	// $array[$i]['T_Type']=iconv('gbk','utf-8//IGNORE',$row['type']);
		// 	// $array[$i]['T_Title']=iconv('gbk','utf-8//IGNORE',$row['title']);
		// 	// $array[$i]['T_qualification']=iconv('gbk','utf-8//IGNORE',$row['tutor_qualification']);
			$array[$i]['U_ID']=iconv('gbk','utf-8//IGNORE',$row['t_id']);
				//$array[$i]['T_No']=iconv('gbk','utf-8//IGNORE',$row['t_no']);
				$array[$i]['T_ChName']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
				$array[$i]['T_Type']=iconv('gbk','utf-8//IGNORE',$row['type']);
				$array[$i]['T_Title']=iconv('gbk','utf-8//IGNORE',$row['title']);
				$array[$i]['T_qualification']=iconv('gbk','utf-8//IGNORE',$row['tutor_qualification']);
				//$array[$i]['I_TAdmin']=iconv('gbk','utf-8//IGNORE',$row['admin_duty']);
		// 	//}
		// 	// else if{
		// 	// 	$array[$i]['U_ID']=iconv('gbk','utf-8//IGNORE',$row['t_id']);
		// 	// 	$array[$i]['T_ChName']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
		// 	// 	$array[$i]['T_Title']=iconv('gbk','utf-8//IGNORE',$row['title']);
		// 	// }
			$i++;
		}
		//echo "end";
		echo JSON($array);
	}
?>