<?php
	
	$sql = "select * from student_dissertaion_view where 1=1";
	$stmt = sqlsrv_query($conn, $sql);
	$array;
	$i=0;
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
		$array[$i]['D_UId']=iconv('gbk','utf-8//IGNORE',$row['grade']);
		$array[$i]['D_Num']=iconv('gbk','utf-8//IGNORE',$row['s_no']);
		$array[$i]['D_Name']=iconv('gbk','utf-8//IGNORE',$row['ch_name']);
		$array[$i]['D_Title']=iconv('gbk','utf-8//IGNORE',$row['title']);
		$i++;
	}
	
	echo JSON($array);

?>