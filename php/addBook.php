<?php
	// include 'jsonHelper.php';
	// include 'connSQL.php';

	$B_ID = $_POST['B_ID'];
	$B_Name = $_POST['B_Name'];
	$B_Author = $_POST['B_Author'];
	$B_Time = $_POST['B_Time'];

	$B_ID = iconv("utf-8", "gbk", $B_ID);
	$B_Name = iconv("utf-8", "gbk", $B_Name);
	$B_Author = iconv("utf-8", "gbk", $B_Author);
	$B_Time = iconv("utf-8", "gbk", $B_Time);
	
	$sql = "insert into book (b_no,b_name,author,publication_year) values('$B_ID','$B_Name','$B_Author','$B_Time')";
	$stmt = sqlsrv_query($conn, $sql);
	//echo $sql;
	$array;
	if($stmt == false)
	{
		$Msg = "添加图书失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else
	{
		$Msg = "添加图书成功";
		$array['Msg'] = $Msg;
		$array['Code'] = 1;
	}
	//$returnStr = JSON($array);
	echo JSON($array);
?>