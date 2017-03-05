<?php

	$t_id = $_POST['t_id'];
	$t_chName = $_POST['t_chName'];

	$t_id = iconv("utf-8", "gbk", $t_id);
	$t_chName = iconv("utf-8", "gbk", $t_chName);
	
	$array;
	

	$sql = "select count(*) 'c1' from student where t_id=$t_id and ch_name='$t_chName' ";
	$stmt0 = sqlsrv_query($conn, $sql);
	$c1=0;
	while($row0 = sqlsrv_fetch_array( $stmt0, SQLSRV_FETCH_ASSOC))
	{
		$c1=$row0['c1'];
	}

	$sql1 = "delete from student where t_id=$t_id and ch_name='$t_chName' ";
	$stmt1 = sqlsrv_query($conn, $sql1);

	if($stmt1 == false || $c1==0)
	{
		$Msg = "删除失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else 
	{
		$Msg = "删除成功";
		$array['Msg'] = $Msg;
		$array['Code'] = 1;
	}

	echo JSON($array);
?>