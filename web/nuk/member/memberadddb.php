<?php


//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

$usr = $_POST["usr"]  ;
$usrname = $_POST["usrname"] ;
$sex = $_POST["sex"] ;
$diploma = $_POST["diploma"] ;

//找出insert 那個資料表的新增資料的sql找出來，把原來sql填入個欄位的值，改成格式化字串%s等用法
//INSERT INTO member (`id`, `username`, `name`, `sex`, `diploma`) VALUES (NULL, 'mary', '瑪莉姊', '2', '22');
//insert into fcu.member (username, name, sex, diploma) values ('%s', '%s', %d, '%s');
$qry1 = "insert into fcu.member (username, name, sex, diploma) values ('%s', '%s', %d, '%s');" ;		//SQL填空
$qrystr = sprintf($qry1,$usr,$usrname,$sex,$diploma) ;		// 組立要執行的SQL語法
echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
if($result!==FALSE)
{
	echo "Insert success <br>" ;
}
else 
{

		echo "Insert fail <br>" ;

		# code...
}
//mysqli_free_result($result);	// 關閉資料集
 
mysqli_close($link);		// 關閉連線
?>

<script>
// 這一區
	// php would run before javascript
	// better solution to catch error
	// ajax request in led.php request for this lamp.php than handle alert() based on callback
	window.location = '/fcu/member/memberlist.php'
</script>";
