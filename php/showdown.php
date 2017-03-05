<?php
/*
function unicode2utf8($str){
	if(!$str) return $str;
	$decode = json_decode($str);
	if($decode) return $decode;
	$str = '["' . $str . '"]';
	$decode = json_decode($str);
	if(count($decode) == 1){
		return $decode[0];
	}
	return $str;
}*/
 

function listDir($dir)
{
	$array;
	$i=0;
	if(is_dir($dir))
   	{
     	 if ($dh = opendir($dir)) 
		 {
			
        	 while (($file = readdir($dh)) != false)
			 {
     			  if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
				  {
     				   listDir($dir."/".$file."/");
     			  }
				  else
				  {
         			  if($file!="." && $file!="..")
					  {
						    //$fileName=unicode2utf8('"'.$file.'"');
							//$fileName= iconv('gbk', 'utf-8', $fileName);//防止fopen语句失效
						    $array[$i]['F_Dir']=$dir;
         					$array[$i++]['F_Name']=$file;
      				  }
     		 	  }
     		 }
        	closedir($dh);
     	}
   	}
	
	echo JSON($array);
}
//开始运行
listDir("../upload");
?>
