<?php
 
	$s_no = $_POST['s_no'];
	$s_chName = $_POST['s_chName'];
	$s_type = $_POST['s_type'];
	$s_gender = $_POST['s_gender'];

	// $t_no = "6120108888";
	// $t_chName = "朴成哲";
	// $t_type = "兼职";
	// $t_title = "讲师";
	// $t_tutor = "硕士生导师";
	// $t_duty = "学委";

	$s_no = iconv("utf-8", "gbk", $s_no);
	$s_chName = iconv("utf-8", "gbk", $s_chName);
	$s_type = iconv("utf-8", "gbk", $s_type);
	$s_gender = iconv("utf-8", "gbk", $s_gender);

	$array;

	$sql = "insert into student (s_no,ch_name,type,gender) values('$s_no','$chName','$type','$s_gender')";
	$stmt = sqlsrv_query($conn, $sql);
	
	if($stmt == false)
	{
		$Msg = "添加学生失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else
	{
		$Msg = "添加学生成功";
		$array['Msg'] = $Msg;
		$array['Code'] = 1;
	}

	echo JSON($array);
?>