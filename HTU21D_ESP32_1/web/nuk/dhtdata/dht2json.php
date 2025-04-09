<?php     
  //http://ncnu.arduino.org.tw:9999/dhtdata/dht2json.php?MAC=3C71BFFD882C&start=20210101&end=20211231  
  
    //include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
  	$link=Connection();		//產生mySQL連線物件
	/*
	{
		"Device":"3C71BFFD882C",
		"Temperature":[12,33,45,34,34],
		"Humidity":[12,33,45,34,34]
	}
	
	*/
	$jsonarray= "{\"Device\":\"%s\",\"Temperature\":[%s],\"Humidity\":[%s]}" ;

	$sid=$_GET["MAC"];		//取得POST參數 : field1
	$s1=$_GET["start"];		//取得POST參數 : field1
	$s2=$_GET["end"];		//取得POST參數 : field1
	//select * FROM ncnuiot.dhtData where mac = '3C71BFFD882C' and systime > "20210101" and systime < "20211231" order by systime asc 
	//select * FROM ncnuiot.dhtData where mac = '%s' and systime > '%s' and systime < '%s'
	
	$qry1 = "select * from ncnuiot.dhtData where mac = '%s' and systime > '%s' and systime < '%s' order by systime asc " ;		//將dhtdata的資料找出來
	$qrystr = sprintf($qry1 , $sid, $s1, $s2) ;		//將dhtdata的資料找出來

	//echo $qrystr."<br>" ;
	$result= mysql_query($qrystr , $link );		//找出多少筆
	$cnt= 1 ;
	$count = mysql_num_rows($result) ;
	//echo $count."<br>";
	
	if ($count >0)
	{
		$t1="" ;
		$t2="" ;
	while($row = mysql_fetch_array($result)) 
		{
	//$jsonrow = "{\"stockno\":\"%s\",\"companyname\":\"%s\"}" ;

			$tmp1 = sprintf("%6.2f",$row['temperature'])  ;	
			$tmp2 = sprintf("%6.2f",$row['humidity'])  ;	
		//	echo $tmp."<br>";
			
			$t1 = $t1.$tmp1;
			$t2 = $t2.$tmp2;
			if ($cnt < $count)
			{
				$t1 = $t1."," ;
				$t2 = $t2."," ;
			}
			$cnt=$cnt+1 ;
			//echo $t1."<br>";
		}
		//echo "<br>=======================================<br><br>";
		$tmpp = sprintf($jsonarray,$sid,$t1,$t2) ;
		echo $tmpp ;
	}
	
	 mysql_free_result($result);	// 關閉資料集
 
	 mysql_close($link);		// 關閉連線
    ?>