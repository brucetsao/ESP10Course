<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>新增使用者</title>
  
</head>
  <body>
  <?php include '../../title.php' ; ?>
<?php
//INSERT INTO `colortbl` (`id`, `colorname`, `colorindex`, `colorimg`) VALUES ('00', '原色', '無卡', '');
//insert into fcu.colortbl (id, colorname, colorindex, colorimg) values ('%s', '%s', '%s', '%s');
   	include("../../comlib.php");		//使用資料庫的呼叫程式
   	include("../../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

$f0 = $_POST["f0"]  ;
$f1 = $_POST["f1"] ;
$f2 = $_POST["f2"] ;
$f3 = $_POST["f3"] ;


$qry1 = "insert into fcu.colortbl (id, colorname, colorindex, colorimg) values ('%s', '%s', '%s', '%s'); " ;		//SQL填空
$qrystr = sprintf($qry1,$f0,$f1,$f2,$f3) ;		// 組立要執行的SQL語法
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
  <?php include '../../footer.php' ; ?>	
  </body>
</html>
<script>
// 這一區
	// php would run before javascript
	// better solution to catch error
	// ajax request in led.php request for this lamp.php than handle alert() based on callback
	window.location = '/fcu/misc/color/tbllist.php'
</script>";
