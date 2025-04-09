<?php


//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $t1 = $_POST["t1"]  ;
	  $t2 = $_POST["t2"]  ;
	  $sid = $_POST["sid"]  ;
	  $tt1 = (int)$t1  ;
	  $tt2 = (int)$t2  ;

$qry1 = "insert into fcu.Ledsitelist (siteid, no) values ('%s', '%s');" ;		//SQL填空

//$result=mysqli_query($link,$qrystr);	
for($i = $tt1; $i <= $tt2; $i=$i+1)	//執行sql語法
{

	$qrystr = sprintf($qry1,$sid,strzero($i, 3)) ;		// 組立要執行的SQL語法
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
window.location = '/fcu/ledsite/ledlist.php'
</script>";