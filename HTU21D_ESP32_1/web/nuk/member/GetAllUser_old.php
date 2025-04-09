
<?php
 
  // 	include("comlib.php");		//使用資料庫的呼叫程式
  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	$jsonarray= "{\"user\":[ %s ]}" ;
	$jsonrow = "{\"uid\":\"%s\",\"userid\":\"%s\",\"username\":\"%s\",\"password\":\"%s\",\"birthday\":\"%s\"}" ;


	$qrystr="select * from fcu.users WHERE 1 order by account asc;" ;		//將dhtdata的資料找出來
	//SELECT * FROM HAuser as a  WHERE 1 order by userid asc
//	echo $qrystr."<br>" ;
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
	
	if ($count >0)
	{
		$t1="" ;
	while($row = mysqli_fetch_array($result)) 
		{
	//$jsonrow = "{\"uid\":\"%s\",\"userid\":\"%s\",\"username\":\"%s\",\"password\":\"%s\",\"birthday\":\"%s\"}" ;

			$tmp = sprintf($jsonrow,$row['id'],$row['account'],$row['name'],$row['password'],$row['birthday'])  ;	
		//	echo $tmp."<br>";
			
			$t1 = $t1.$tmp;
			if ($cnt < $count)
			{
				$t1 = $t1."," ;
			}
			$cnt=$cnt+1 ;
			//echo $t1."<br>";
		}
		//echo "<br>=======================================<br><br>";
		$tmpp = sprintf($jsonarray,$t1) ;
		echo $tmpp ;
	}
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>

