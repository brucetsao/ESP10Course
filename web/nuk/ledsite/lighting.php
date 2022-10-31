<?php


  	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $t1 = $_POST["t1"]  ;
	  $t2 = $_POST["t2"]  ;
	  $sid = $_GET["sid"]  ;
	  $gid = $_GET["gid"]  ;


$qry1 = "update fcu.Ledsitelist SET donater = '%s',dbirthday = '%s'  WHERE Ledsitelist.id = %d;	" ;		//SQL填空

//$result=mysqli_query($link,$qrystr);	
	$qrystr = sprintf($qry1,$t1,$t2,$sid,);		// 組立要執行的SQL語法
	echo $qrystr."<br>" ;
		try 
		{
			$result=mysqli_query($link,$qrystr);	
			echo "Insert success <br>" ;
		}
		catch (exception $e) {
			echo "Insert fail <br>" ;
		}
		finally 
		{
			//optional code that always runs
		}



//mysqli_free_result($result);	// 關閉資料集
 
mysqli_close($link);		// 關閉連線
?>

<script>
// 這一區
// php would run before javascript
// better solution to catch error
// ajax request in led.php request for this lamp.php than handle alert() based on callback
window.location = '/fcu/ledsite/godlighting.php?sid=<?php echo $gid;?>'
</script>";