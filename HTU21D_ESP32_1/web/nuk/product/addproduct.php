<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>新增使用者</title>
  
</head>
  <body>
  <?php include '../title.php' ; ?>
<?php

//insert into fcu.product (productno, name, ename, maker, price, weight,unit, package) values ('%s', '%s', '%s', '%s', %f,  %d, '%s','%s');	

   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件



$qry1 = "insert into fcu.product (productno, name, ename, maker, price, weight, unit, package,ps) values ('%s', '%s', '%s', '%s', %f,  %d,'%s', '%s', '%s');" ;		//SQL填空
$qrystr = sprintf($qry1,$_POST["t1"],$_POST["t2"],$_POST["t3"],$_POST["t4"],$_POST["t5"],$_POST["t6"],$_POST["s1"],$_POST["s2"],$_POST["comment"]) ;		// 組立要執行的SQL語法
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
	window.location = '/fcu/product/productadd.php'
</script>";
