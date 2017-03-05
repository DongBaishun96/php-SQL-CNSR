<?php
	// include 'jsonHelper.php';
	// include 'connSQL.php';

	$st_no= $_POST['st_no'];

	//$st_no = iconv("utf-8", "gbk", $st_no);
	$array;

	$st_type=0;
	if(strlen($st_no)!=10){
		$sql = "select count(*) 'num' from teacher where t_id=$st_no ";
		$st_type=1;
	}else {
		$sql = "select count(*) 'num' from student where s_no='$st_no' ";
	}
	$stmt = sqlsrv_query($conn, $sql);
	$num=0;
	while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
		$num=$row['num'];
		//$num = iconv('gbk', 'utf-8//IGNORE',$row['num']);
	}
	if($num==0){
		//echo "fuck0";
		$Msg = "添加用户失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else { //存在这个老师或者学生
		//echo "cun zai";
		$u_type='user';
		if($st_type==0){
			$u_type = "user";
		}else {
			$u_type = "teacher";
		}
		$sql = "insert into users (u_id,u_password,count_not_return_book,u_type) values('$st_no','$st_no',0,'$u_type')";
		$stmt = sqlsrv_query($conn, $sql);

	
		if($stmt == false)
		{
			$Msg = "添加用户失败";
			$array['Msg'] = $Msg;
			$array['Code'] = 0;
		}
		else
		{
			//echo "into user_teacher";
			$Msg = "添加用户成功";
			$array['Msg'] = $Msg;
			$array['Code'] = 1;
		
			if($st_type==1){
				//echo "fuck1";
				$sql = "insert into user_teacher values($st_no,'$st_no')";
				$stmt = sqlsrv_query($conn, $sql);
			}
			else {
				$sql = "insert into user_student values($st_no,'$st_no')";
				$stmt = sqlsrv_query($conn, $sql);
			}
		}
	}

	echo JSON($array);
?>