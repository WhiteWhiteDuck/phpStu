<?php
function getNextNum(&$my_short_url,$n,$sys) {
	$bit = array('a','b','c','d','e','f','g','h','i','j','k','l',
		'm','n','o','p','q','r','s','t','u','v','w','x','y','z');   //26进制 
	if ($n == 0) {
		return;
	}
	getNextNum($my_short_url,floor($n/$sys),$sys);                  //递归取余
	$my_short_url .=  $bit[$n%$sys];
}

$flurl = $_GET["temp_url"];						//通过Get[name]提交表单传值到服务器端
$lurl = htmlspecialchars($flurl, ENT_QUOTES);				//htmlspecialchars（）防止xss注入
									//定义header
$myheader = "														
<?php  
	header('HTTP/1.1 301 Moved Permanently');  
	header('Location:".$lurl."');  
?>";													
$my_id = "root";
$my_password ="root";
$my_server = "bian.com";
$my_short_url = "";													
$my_database_name = "urlstore";

$con = mysql_connect("$my_server","$my_id","$my_password");			//访问数据库
if (!$con){
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("$my_database_name", $con);
										//查询是否已经存在该url
										//输出其映射关系
$sql_if_exist = "select * from src_aim where long_url = '".$lurl."'";
$result = mysql_query($sql_if_exist);
if($row = mysql_fetch_array($result)){
	echo "http://bian.com/" . $row['short_url']. ".php";
}else{
	$sql_get_maxid = "select max(Id) from src_aim";				//发号器原理：通过数据库的自增id 
	$max_line = mysql_query($sql_get_maxid);				//取出这个值为其 发号，可避免重复
	if($row1 = mysql_fetch_row($max_line)){					//但可能会存在浪费or并发方面的问题
    	$max_id = $row1[0] + 1;
	}

	getNextNum($my_short_url,$max_id,26);                    		//发号器

	$sql_add_item = "
	insert into src_aim (short_url,long_url) 
	values ('" . $my_short_url . "', '" . $lurl . "')
	";									//插入新的映射关系
	
	mysql_query($sql_add_item);
	$sql_if_success = " select * from src_aim where long_url = '".$lurl."' ";
	$rs = mysql_query($sql_if_success,$con);						
	if (!$rs) {
		die('Failed Insert : ' . mysql_error());						
	}																
	$myfile = fopen ("$my_short_url.php", "w");  				//使用w打开创建文件
	if (!$myfile) {
		echo " Init failed  \n";
		exit;
	}else{
		fwrite ($myfile, $myheader);
		fclose ($myfile);
	}
	echo  "http://bian.com/" . $my_short_url . ".php";
}	

mysql_close($con);




?>





