<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>電影資料編修</title>
  
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
$t2 = $_POST["t2"]  ;
$t3 = $_POST["t3"]  ;
$t4 = $_POST["t4"]  ;
$t5 = $_POST["t5"]  ;
$t6 = $_POST["t6"]  ;
$t7 = $_POST["t7"]  ;
$s1 = $_POST["s1"]  ;
$s2 = $_POST["s2"]  ;
$s3 = $_POST["s3"]  ;
$s4 = $_POST["s4"]  ;


//UPDATE fcu.movie SET schedule = '01', director = 'bbbb', duration = 100, actor = 'ccccc' ,lang = 1 ,mName = 'dddd', movietype = 1, introduction = 'gggggg' , playstartdate = '2022-07-26' , grading = '01' where movie.mid = '101';

$qry1 = " UPDATE fcu.movie SET schedule = '%s',  director = '%s',  duration = %d, actor = '%s' ,lang = %d ,mName = '%s', movietype = %d, introduction = '%s' , playstartdate = '%s' , grading = '%s'  where movie.mid = '%s';" ;
$qrystr = sprintf($qry1,$s1,$t2,$t3,$t4,$s2,$t5,$s3,$t6,$t7,$s4,$sid) ;		// 組立要執行的SQL語法
echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
if($result!==FALSE)
{
	echo "update success <br>" ;
}
else {
	{
		echo "update fail <br>" ;
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
	window.location = '/fcu/movie/movielist.php'
</script>";
