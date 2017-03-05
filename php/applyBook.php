<?php
	$B_ID = $_POST['B_ID'];
	$U_ID = $_SESSION['U_ID'];
	
	// $B_ID = $_GET['B_ID'];
	// $U_ID = $_GET['U_ID'];
	$B_ID = iconv("utf-8", "gbk", $B_ID);
	//$U_ID = iconv("utf-8", "gbk", $B_ID);
	
	$num = 0;
	$sql = "select count(U_ID) as num FROM user_book where u_id='$U_ID' AND real_return_date is NULL group by u_id";
	
	$stmt = sqlsrv_query($conn, $sql);
	if($stmt == false)
	{
		$Msg = '申请图书失败';
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else
	{
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$num = $num+1;
			//$sql1 = "update users set count_not_return_book=$num where u_id=$U_ID";
		}

	}
	if($num<6) //上限为5本
	{
		$now=date('Y-m-d',time());//获取时间

		$timestamp=strtotime($now);
    	$arr=getdate($timestamp);

		if($arr['mon'] == 12){
	        $year=$arr['year'] +1;
	        $month=$arr['mon'] -11;
	        $firstday=$year.'-0'.$month.'-01';
	        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
    	}else{
	        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)+1).'-01'));
	        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
    	}

		$sql = "insert into user_book (b_no,u_id,borrow_date,return_date) values('$B_ID','$U_ID','$firstday','$lastday')";
		$sql3 = "update book set where_is=$U_ID where b_no='$B_ID'";
		
		//echo $sql;
		//echo $sql1;
		$stmt = sqlsrv_query($conn, $sql);
		$stmt3 = sqlsrv_query($conn, $sql3);
		//$stmt1 = sqlsrv_query($conn, $sql1);

		$array;
		if($stmt == false || $stmt3 == false)
		{
			$Msg = '图书申请失败';
			$array['Msg'] = $Msg;
			$array['Code'] = 0;
		}
		else
		{
			$Msg = "申请图书成功";
			$array['Msg'] = $Msg;
			$array['Code'] = 1;
		}
	}
	else
	{
		
		$Msg = '借阅超过n本书';
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	$returnStr = JSON($array);
	echo $returnStr;
	
?>