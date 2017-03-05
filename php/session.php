<?php
	if(isset($_SESSION['U_ID']))
	{
		$U_ID = $_SESSION['U_ID'];
		$sql = "select U_ID, U_Type from [users] where u_id='$U_ID'";
		
		$stmt = sqlsrv_query($conn, $sql);
		
		while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
		{
			$U_Type = $row['U_Type'];
		}
		
		$User['U_ID'] = $U_ID;
		$User['U_Type'] = $U_Type;
		
		$array['User'] = $User;
		
		$Msg = iconv('UTF-8', 'GBK', '已登录');
		$array['Msg'] = $Msg;
		$array['Code'] = 1;
		
		$returnStr = JSON($array);
		
		echo $returnStr; 
	}
	else
	{
		$Msg = iconv('UTF-8', 'GBK', '未登录');
		$array['Msg'] = $Msg;
		$array['Code'] = 0;
		
		$returnStr = JSON($array);
		
		echo $returnStr; 
	}
	
?>