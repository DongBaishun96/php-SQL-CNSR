<?php
	$Old_Password = $_POST['Old_Password'];
	$New_Password = $_POST['New_Password'];
	$U_ID = $_SESSION['U_ID'];
	
	$Old_Password = iconv('UTF-8', 'GBK', $Old_Password);
	$New_Password = iconv('UTF-8', 'GBK', $New_Password);

	$sql = "select u_password from users where u_id='$U_ID'";
	
	$stmt = sqlsrv_query($conn, $sql);
	
	if($stmt == false)
	{
		$Msg = "修改密码失败";
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
	}
	else
	{
		$password;
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$password = $row['u_password'];
		}
		
		if($password == $Old_Password)
		{
			$sql = "update users set u_password='$New_Password' where u_id='$U_ID'";
			$stmt = sqlsrv_query($conn, $sql);
			
			if($stmt == false)
			{
				$Msg = "修改密码失败";
				$array['Msg'] = $Msg;
				$array['Code'] = 0;
			}
			else
			{
				$Msg = "修改密码成功";
				$array['Msg'] = $Msg;
				$array['Code'] = 1;				
			}
		}
		else
		{
			$Msg = "修改密码失败";
			$array['Msg'] = $Msg;
			$array['Code'] = 0;			
		}
		$returnStr = JSON($array);
		echo $returnStr;
	}
	
?>