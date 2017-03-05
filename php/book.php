<?php
	$B_Name = $_POST['B_Name'];	
	$B_Author = $_POST['B_Author'];

	$sql = "select * from book";

	$B_Name = iconv('utf-8', 'gbk', $B_Name);

	if($B_Name != null)
	{
		$sql = $sql." where b_name like '%$B_Name%'";
	}
	
	if($B_Author != null)
	{
		$B_Author = $B_Author;
		$sql = $sql." and author like '%$B_Author%'";
	}
	
	$stmt = sqlsrv_query($conn, $sql);
	
	if( $stmt == false)
	{
		 $returnStr = ERROR(500);
		// echo $returnStr;
	}
	else
	{
		$Book;
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$Book[$i]['B_ID'] = iconv('gbk', 'utf-8//IGNORE',$row['b_no']);
			$Book[$i]['B_Name'] = iconv('gbk', 'utf-8//IGNORE',$row['b_name']);
			$Book[$i]['B_Author'] = iconv('gbk', 'utf-8//IGNORE',$row['author']);
			$Book[$i]['B_Time'] = iconv('gbk', 'utf-8//IGNORE',$row['publication_year']);
			$Book[$i]['B_Status'] = iconv('gbk', 'utf-8//IGNORE',$row['where_is']);
			$i++;
		}
		if($i>0)
		{
			$array['Book'] = $Book;
			$Msg = "获取图书信息成功";
			$array['Msg'] = $Msg;
			$array['Code'] = 1;
			$returnStr = JSON($array);
			echo $returnStr;
		}
		else
		{
			$Msg = "没有相应的图书信息";
			$array['Msg'] = $Msg;
			$array['Code'] = 0;
			$returnStr = JSON($array);
			echo $returnStr;
		}
	}
?>