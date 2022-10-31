<?php     
  //http://140.134.25.43:8088/fcu/dhtdata/dht2json.php?MAC=3C71BFFD882C&start=20210101&end=20211231  
  	//http://140.134.25.43:8088/ Host URL
	//Restful API 的程式：：/fcu/dhtdata/dht2json.php?MAC=3C71BFFD882C&start=20210101&end=20211231  
	//傳入的參數：?MAC=3C71BFFD882C&start=20210101&end=20211231  
	class maindata{
		public $Device ; 
		public $Datalist ; 
	 }
	 class subdata{
		public $Datetime  ; 
		public $Temperature ; 
		public $Humidity ; 
	 }

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
	
	$maindata = new maindata() ;

	$sid=$_GET["MAC"];		//取得POST參數 : 裝置的MAC 網路卡編號
	$s1=$_GET["start"];		//取得POST參數 : 開始日期  YYYYMMDDHHMMSS
	$s2=$_GET["end"];		//取得POST參數 : 結束日期  YYYYMMDDHHMMSS
	//select * FROM fcu.dhtData where mac = '3C71BFFD882C' and systime > "20210101" and systime < "20211231" order by systime asc 
	//select * FROM fcu.dhtData where mac = '%s' and systime > '%s' and systime < '%s'
	
	$qry1 = "select * from fcu.dhtData where mac = '%s' and systime > '%s' and systime < '%s' order by systime asc " ;		//將dhtdata的資料找出來
	$qrystr = sprintf($qry1 , $sid, $s1, $s2) ;		//將dhtdata的資料找出來

	//echo $qrystr."<br>" ;
	$result= mysqli_query($link,$qrystr );		//找出多少筆
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
	
	if ($count >0)
	{
		$dd = array() ;
	while($row = mysqli_fetch_array($result)) 
		{
			$subdata = new subdata() ;
			$subdata->Datetime = $row["systime"] ;
			$subdata->Temperature = (double)$row["temperature"] ;
			$subdata->Humidity = (double)$row["humidity"] ;

			array_push($dd , $subdata) ;

		}
		//echo "<br>=======================================<br><br>";
		$maindata->Device = $sid ;
		$maindata->Datalist = $dd ;
		//$user = utf8_encode($user) ;
		echo json_encode($maindata, JSON_UNESCAPED_UNICODE);
	}
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線
    ?>