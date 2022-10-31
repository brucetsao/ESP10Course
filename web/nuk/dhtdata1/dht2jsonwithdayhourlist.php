<?php     
   //http://140.134.25.43:8088/fcu/dhtdata/dht2jsonwithdayhourlist.php?MAC=CC50E3B5BB20&start=20210101&end=20211231
//http://140.134.25.43:8088/fcu/dhtdata/dht2jsonwithdayhourlist.php?MAC=CC50E3B5BB20&start=20210101&end=20210201

	   //http://140.134.25.43:8088/ Host URL
	 //Restful API 的程式：：/fcu/dhtdata/dht2jsonwithdayhourlist.php?MAC=3C71BFFD882C&start=20210101&end=20211231  
	 //傳入的參數：?MAC=CC50E3B5BB20&start=20210101&end=20211231
	 class maindata{
		 public $Device ; 
		 public $Datalist ; 
	  }
	  class subdata{
		 public $Datetime  ; 
		 public $Temperature ; 
		 public $Humidity ; 
	  }
	  class Temperature{
		public $Temperature ;
	  }
	  class Humidity{
		public $Humidity ;
	  }
	  $t = array();
	  $h = array();
	  
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
		//select MAC,left(systime,8) as systime, avg(temperature) as temperature, avg(humidity) as humidity FROM fcu.dhtData where MAC = 'CC50E3B5BB20' and systime >= '20210101' and systime <= '20211231' group by left(systime,8)  order by systime asc;
		//select MAC,left(systime,8) as systime, avg(temperature) as temperature, avg(humidity) as humidity FROM fcu.dhtData where MAC = '%s' and systime >= '%s' and systime <= '%s' group by left(systime,8) order by systime asc;

	 $qry1 = "select MAC,left(systime,10) as systime FROM fcu.dhtData where MAC = '%s' and systime >= '%s' and systime <= '%s' group by left(systime,10)  order by systime asc;" ;		//將dhtdata的資料找出來
	 $qrystr = sprintf($qry1 , $sid, $s1, $s2) ;		//將dhtdata的資料找出來
 
	//echo $qrystr."<br>" ;
	 $result= mysqli_query($link,$qrystr);		//找出多少筆
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
			 //select * from fcu.dhtData where MAC='CC50E3B5BB20' and left(systime,8) = '20210619' order by systime asc;
			 $subqry="select temperature, humidity from fcu.dhtData where MAC='%s' and left(systime,10) = '%s' order by systime asc;";
			 $subqrystr = sprintf($subqry,$row["MAC"],$row["systime"]) ;
             //echo  $subqrystr."<br>";
			 $result2= mysqli_query($link,$subqrystr);	
			 $t = array();
			 $h = array();
			 while($row2 = mysqli_fetch_array($result2)) 
			 {
				//$Temperature = new Temperature() ;
				//$Humidity = new Humidity() ;
			//	$Temperature->Temperature = (double)sprintf("%8.3f",(double)$row2["temperature"]) ;
			//	$Humidity->Humidity = (double)sprintf("%8.3f",(double)$row2["humidity"]) ;
				array_push($t, (double)sprintf("%8.3f",(double)$row2["temperature"]));	
				array_push($h, (double)sprintf("%8.3f",(double)$row2["humidity"]));	
				
			 }
			 $subdata->Temperature = $t  ;
			 $subdata->Humidity =  $h ;
 
			 array_push($dd , $subdata) ;
 
		 }
		 //echo "<br>=======================================<br><br>";
		 $maindata->Device = $sid ;
		    
		 //$user = utf8_encode($user) ;
		 echo json_encode($maindata, JSON_UNESCAPED_UNICODE);
	 }
	 
	  mysqli_free_result($result);	// 關閉資料集
  
	  mysqli_close($link);		// 關閉連線
	 ?>