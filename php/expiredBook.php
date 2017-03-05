<?php
	$U_ID = $_SESSION['U_ID'];
	$sql = "select * from user_book_view where u_id='$U_ID'";
	//$sql = "select * from user_book_view where u_id=$U_ID";
	
	$stmt = sqlsrv_query($conn, $sql);
	if( $stmt == false){
		$returnStr = "error";
		//$returnStr = ERROR(500);
		echo $returnStr;
	}
	
	else{
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$expire[$i]['B_NO'] = iconv('gbk', 'utf-8//IGNORE',$row['b_no']);
			$expire[$i]['B_ID'] =iconv('gbk','utf-8//IGNORE',$row['b_name']);
			$expire[$i]['Author'] =iconv('gbk','utf-8//IGNORE',$row['author']);
			$expire[$i]['borrow_date'] = iconv('gbk','utf-8//IGNORE',$row['borrow_date']->format('Y-m-d'));
			$expire[$i]['return_date'] = iconv('gbk','utf-8//IGNORE',$row['return_date']->format('Y-m-d'));
			if(!empty($row['real_return_date'])){ 
			$expire[$i]['real_return_date'] = iconv('gbk','utf-8//IGNORE',$row['real_return_date']->format('Y-m-d'));
			} else{
				$expire[$i]['real_return_date'] = "未还";
			}
			$i++;
		}

		if($i>0)
		{
			$array['expire'] = $expire;
			$Msg = "查询图书信息成功";
			$array['Msg'] = $Msg;
			$array['Code'] = 1;
		}
		else
		{
			$Msg = "当前没有借阅图书";
			$array['Msg'] = $Msg;
			$array['Code'] = 0;	
		}
		
		$returnStr = JSON($array);
		echo $returnStr;
	}
?>