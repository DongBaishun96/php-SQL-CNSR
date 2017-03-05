<?php
	// require 'connSQL.php';
	// require 'jsonHelper.php';
//echo "11";
	if($sqlConn)
	{
		// $U_ID = $_GET["U_ID"];
		// $U_Password = $_GET['U_Password'];

		$U_ID = $_POST["U_ID"];
		$U_Password = $_POST['U_Password'];
		
		// $U_ID = "1";
		// $U_Password = "123456";

		$sql = "select * from users where u_id='$U_ID'";
		//echo $sql;
		$stmt = sqlsrv_query($conn, $sql);
		
		if( $stmt == false)
		{
			 $returnStr = ERROR(500);
			 echo $returnStr;
		}
		else
		{
			//echo $password;
			$password="";
			//echo "jh"+$password+"hh";
			while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
			{
				$password = $row['u_password'];
				$U_Type = $row['u_type'];
			}

			if($password=="")
			{
				// $Msg = iconv('UTF-8', 'GBK', '登录失败');

				$Msg = "登录失败";
				$array['Msg'] = $Msg;
				$array['Code'] = 0;
				$returnStr = JSON($array);
				
				echo $returnStr;
			}
			else
			{
				if($U_Password==$password)
				{
				$row['U_ID'] = $U_ID;
				$row['U_Type'] = $U_Type;
				
				$array['User'] = $row;
				$Msg = "登录成功";
				$array['Msg'] = $Msg;
				$array['Code'] = 1;
				
				// 获取IP 
				$nowIP =  getIP(); 
				
				//session记录
				$_SESSION["U_ID"] = $U_ID;
				// echo $_SESSION['U_ID'];
				// echo "<br/>hh12<br/>";

				$now=date('Y-m-d H:i:s',time());

				$r_id=0;
				$sql = "select MAX(r_id) 'num' from registration";
				$stmt = sqlsrv_query($conn, $sql);
				
				while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)){
					$r_id = iconv('gbk', 'utf-8//IGNORE',$row['num']);
				}
				$r_id = $r_id+1;

				$sql = "insert into registration (r_id,check_in_time) values ($r_id,'$now') ";
				$stmt = sqlsrv_query($conn, $sql);
				$_SESSION["r_id"] = $r_id;//记录成session
				$sql = "insert user_registration(u_id,r_id) values('$U_ID','$r_id')";
				$stmt = sqlsrv_query($conn, $sql);
				
				$returnStr = JSON($array);
				
				echo $returnStr;
				}
			}
		}
	}
	else{
		$array['Msg'] = "连接失败";
		$array['Code'] = 0;
		$returnStr = JSON($array);
		echo $returnStr;
	}
?>