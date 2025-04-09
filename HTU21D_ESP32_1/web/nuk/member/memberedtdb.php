<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>新增使用者</title>
  
</head>
  <body>
  <?php include '../title.php' ; ?>
<?php
//update fcu.member set  username = 'eeee', name = 'eeee', sex = 1, diploma = '61' where id = 1
//update fcu.member set  username = '%s', name = '%s', sex = %d, diploma = '%s' where id = %d
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

 $sid = $_POST["sid"]  ;
 $usrname = $_POST["usrname"]  ;
$name = $_POST["name"] ;
$sex = $_POST["sex"] ;
$diploma = $_POST["diploma"] ;


$qry1 = "update fcu.member set  username = '%s', name = '%s', sex = %d, diploma = '%s' where id = %d" ;		//SQL填空
$qrystr = sprintf($qry1,$usrname,$name,$sex,$diploma,$sid) ;		// 組立要執行的SQL語法
echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
if($result!==FALSE)
{
	echo "Insert success <br>" ;
}
else {
	{
		echo "Insert fail <br>" ;
	}
		# code...
}
//mysqli_free_result($result);	// 關閉資料集
 
mysqli_close($link);		// 關閉連線
?>
  <?php include '../footer.php' ; ?>	
  </body>
</html>
<script>
// 這一區
	// php would run before javascript
	// better solution to catch error
	// ajax request in led.php request for this lamp.php than handle alert() based on callback
	window.location = '/fcu/member/memberlist.php'
</script>";
