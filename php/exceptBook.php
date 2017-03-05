<?php
	// include 'jsonHelper.php';
	// include 'connSQL.php';

	$B_No = $_POST['B_No'];
	// $U_ID = $_SESSION['U_ID'];
	
	//$B_Name = iconv("utf-8", "gbk", $B_Name);
	//echo $B_No;
	$now = date('Y-m-d',time());
	$sql = "update user_book set real_return_date='$now' where b_no='$B_No'";
	$stmt = sqlsrv_query($conn, $sql);
	$sql1 = "update book set where_is=0 where b_no='$B_No'";
	$stmt1 = sqlsrv_query($conn, $sql1);
	//echo $sql;
	$array;
	if($stmt == false || $stmt1 == false)
	{
		$Msg = "还书失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else
	{
		$Msg = "还书成功";
		$array['Msg'] = $Msg;
		$array['Code'] = 1;
	}
	//$returnStr = JSON($array);
	echo JSON($array);
?>