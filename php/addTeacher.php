<?php

	$t_no = $_POST['t_no'];
	$t_chName = $_POST['t_chName'];
	$t_type = $_POST['t_type'];
	$t_title = $_POST['t_title'];
	$t_tutor = $_POST['t_tutor'];
	$t_duty = $_POST['t_duty'];

	// $t_no = "6120108888";
	// $t_chName = "朴成哲";
	// $t_type = "兼职";
	// $t_title = "讲师";
	// $t_tutor = "硕士生导师";
	// $t_duty = "学委";

	$t_no = iconv("utf-8", "gbk", $t_no);
	$t_chName = iconv("utf-8", "gbk", $t_chName);
	$t_type = iconv("utf-8", "gbk", $t_type);
	$t_title = iconv("utf-8", "gbk", $t_title);
	$t_tutor = iconv("utf-8", "gbk", $t_tutor);
	$t_duty = iconv("utf-8", "gbk", $t_duty);

	$array;

	$sql = "insert into teacher (t_no,ch_name,type,title,tutor_qualification,admin_duty) values('$t_no','$t_chName','$t_type','$t_title','$t_tutor','$t_duty')";
	$stmt = sqlsrv_query($conn, $sql);
	
	if($stmt == false)
	{
		$Msg = "添加教师失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else
	{
		$Msg = "添加教师成功";
		$array['Msg'] = $Msg;
		$array['Code'] = 1;
	}

	echo JSON($array);
?>