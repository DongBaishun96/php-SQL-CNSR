<?php
	header("Content-type: text/html;charset=utf8;");
	error_reporting(E_ALL);

	function ERROR($errorCode) {
		
		$array['Code'] = $errorCode;
		
		$returnStr = JSON($array);
		
		return $returnStr;
		
	}
	
	// 定义一个函数getIP() 
	function getIP() 
	{ 
		global $ip; 
					
		if (getenv("HTTP_CLIENT_IP")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
		else if(getenv("HTTP_X_FORWARDED_FOR")) 
			$ip = getenv("HTTP_X_FORWARDED_FOR"); 
		else if(getenv("REMOTE_ADDR")) 
			$ip = getenv("REMOTE_ADDR"); 
		else 
			$ip = "Unknow"; 
						
		return $ip; 
	}	

	//本地测试的服务名
	$serverName = "localhost";
	//使用sql server身份验证，参数使用数组的形式，一次是用户名，密码，数据库名
	//如果你使用的是windows身份验证，那么可以去掉用户名和密码
	$connectionInfo = array( "UID"=>"sa","PWD"=>"123456","Database"=>"CNSRDB");		//连接数据库 ，第一个用户名，第二个密码，第三个数据库名
	$sqlConn = true;
	
	$conn = sqlsrv_connect($serverName,$connectionInfo);
	sqlsrv_query($conn, "set names utf8");
	
	if(!$conn)
	{
		$sqlErrStr = ERROR(500);
		echo $sqlErrStr;
	}
?>