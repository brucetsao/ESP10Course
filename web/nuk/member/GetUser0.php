
<?php
 //http://140.134.25.43:8088//fcu/member/GetUser.php?userid=bruce
  // 	include("comlib.php");		//使用資料庫的呼叫程式
  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
    $usrid = $_GET["userid"] ;
	$jsonrow = "{\"uid\":\"%s\",\"userid\":\"%s\",\"username\":\"%s\",\"password\":\"%s\",\"birthday\":\"%s\",\"sex\":\"%s\",\"telephone\":\"%s\",\"cellphone\":\"%s\",\"address\":\"%s\",\"email\":\"%s\",\"url\":\"%s\",\"comment\":\"%s\"}" ;


	$qry="select * from fcu.users WHERE account = '%s' order by account asc;" ;		//將dhtdata的資料找出來
	$qrystr= sprintf($qry,$usrid)  ;		//將dhtdata的資料找出來
	//SELECT * FROM HAuser as a  WHERE 1 order by userid asc
//	echo $qrystr."<br>" ;
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
	
	if ($count >0)
	{
	while($row = mysqli_fetch_array($result)) 
		{
	//$jsonrow = "{\"uid\":\"%s\",\"userid\":\"%s\",\"username\":\"%s\",\"password\":\"%s\",\"birthday\":\"%s\"}" ;

			$tmp = sprintf($jsonrow,$row['id'],$row['account'],$row['name'],$row['password'],$row['birthday'],$row['sex'],$row['telephone'],$row['cellphone'],$row['address'],$row['email'],$row['url'],$row['comment'])  ;	
		//	echo $tmp."<br>";
			
			$cnt=$cnt+1 ;
			//echo $t1."<br>";
		}
		//echo "<br>=======================================<br><br>";

		echo $tmp ;
	}
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>

