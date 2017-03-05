<?php
	//error_reporting(E_ALL);
	$U_ID = $_SESSION['U_ID'];
	//echo $U_ID;
	$D_Type = $_POST['D_Type'];
	$D_Title = $_POST['D_Title'];
	$D_Content = $_POST['D_Content'];
	
	$D_Type = iconv('utf-8', 'gbk', $D_Type);
	$D_Title = iconv('utf-8', 'gbk', $D_Title);
	$D_Content = iconv('utf-8', 'gbk', $D_Content);

	$sql = "select ch_name from teacher where t_id='$U_ID'";
	$stmt = sqlsrv_query($conn, $sql);
	//http://localhost:8088/CNSR/php/receive.php?PostType=addDynamic&D_Type=新闻动态&D_Title=这是第二条新闻动态&D_Content=这是第二条新闻动态内容
	$array;
	if( $stmt == false)
	{
		//$Msg = iconv('UTF-8', 'GBK', '动态信息添加失败');
		$Msg = "动态信息添加失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;	
	}
	else
	{
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$U_ChName = $row['ch_name'];
		}
		// $D_Type = iconv('UTF-8', 'GBK', $D_Type);
		// $D_Title = iconv('UTF-8', 'GBK', $D_Title);
		// $D_Content = iconv('UTF-8', 'GBK', $D_Content);
		$now = date('Y-m-d',time());
		$sql = "insert into dynamicMsg (D_Type,D_Title,D_Author,D_Content,date) values('$D_Type','$D_Title','$U_ChName','$D_Content','$now')";
		//echo $sql;
		$stmt = sqlsrv_query($conn, $sql);
		
		if( $stmt == false)
		{
			$Msg = "动态信息添加失败";
			$array['Msg'] = $Msg;
			//$array['U_ID'] = $U_ID;
			$array['Code'] = 0;	
		}
		else
		{
			$Msg = "动态信息添加成功";
			$array['Msg'] = $Msg;
			//$array['U_ID'] = $U_ID;
			$array['Code'] = 1;				
		}
	}
	$returnStr = JSON($array);
	echo $returnStr;
?>