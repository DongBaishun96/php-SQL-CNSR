<?php
	$sql = "select * from user_book_view where 1=1";
	$stmt = sqlsrv_query($conn, $sql);
	
	if( $stmt == false)
	{
		 $returnStr = ERROR(500);
		 echo $returnStr;
	}
	else
	{
		$Book;
		$i=0;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$ApplyRec[$i]['U_ID'] =iconv('gbk','utf-8',$row['u_id']);
			$ApplyRec[$i]['B_ID'] =iconv('gbk','utf-8//IGNORE',$row['b_name']);
			$ApplyRec[$i]['Author'] =iconv('gbk','utf-8//IGNORE',$row['author']);
			$ApplyRec[$i]['borrow_date'] = iconv('gbk','utf-8//IGNORE',$row['borrow_date']->format('Y-m-d'));
			$ApplyRec[$i]['return_date'] = iconv('gbk','utf-8//IGNORE',$row['return_date']->format('Y-m-d'));
			if(!empty($row['real_return_date'])){ 
			$ApplyRec[$i]['real_return_date'] = iconv('gbk','utf-8//IGNORE',$row['real_return_date']->format('Y-m-d'));
			} else{
				$ApplyRec[$i]['real_return_date'] = "未还";
			}
			$i++;
		}
		if($i>0)
		{
			$array['ApplyRec'] = $ApplyRec;
			$Msg = "获取申请图书信息成功";
			$array['Msg'] = $Msg;
			$array['Code'] = 1;
			$returnStr = JSON($array);
			echo $returnStr;
		}
		else
		{
			$Msg = "没有申请图书信息";
			$array['Msg'] = $Msg;
			$array['Code'] = 0;
			$returnStr = JSON($array);
			echo $returnStr;
		}
	}
?>
