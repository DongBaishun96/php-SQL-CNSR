<?php
	$U_ID = $_SESSION['U_ID'];
	$r_id = $_SESSION['r_id'];
	//$U_ID = "1";
	//echo "<br/>" + $U_ID;
	
	$array['Msg'] = "登出成功";
	$array['Code'] = 1;
	
	//签出记录	
	$nowIP =  getIP(); 	// 获取IP 
	//$sql = "INSERT INTO Sign (U_ID,S_Type, S_IP) values ('$U_ID', 0, '$nowIP');";
	$now=date('Y-m-d H:i:s',time());
	//$sql = "SET IDENTITY_INSERT registration ON;";
	$sql = "update registration set check_out_time='$now' where r_id=$r_id;";
	//$sql .= "SET IDENTITY_INSERT registration OFF;";
	//echo $sql;

	$stmt = sqlsrv_query($conn, $sql);
	
	if(isset($_SESSION['U_ID']))
	{	
		unset($_SESSION['U_ID']);
		unset($_SESSION['r_id']);
	}

	$sqlErrStr = JSON($array);

	echo $sqlErrStr;
?>