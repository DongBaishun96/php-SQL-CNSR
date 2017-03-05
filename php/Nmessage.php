<?php
	$D_Type = '新闻动态';
	$D_Type = iconv('utf-8', 'gbk', $D_Type);
	$sql = "select * from dynamicMsg where D_Type='$D_Type'";
	$stmt = sqlsrv_query($conn, $sql);
	
	if( $stmt == false)
	{
		 $returnStr = ERROR(500);
		 echo $returnStr;
	}
	else
	{
		$array;
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$array[$i]['M_id'] =iconv('gbk','utf-8',$row['id']);
			$array[$i]['M_author'] =iconv('gbk','utf-8//IGNORE',$row['D_Author']);
			$array[$i]['M_title'] =iconv('gbk','utf-8//IGNORE',$row['D_Title']);
			$array[$i]['M_Content'] = iconv('gbk','utf-8//IGNORE',$row['D_Content']);
			$array[$i]['M_date'] = iconv('gbk','utf-8//IGNORE',$row['date']->format('Y-m-d'));
			$i++;
		}
		echo JSON($array);
	}
?>
