<?php     
//http://nuk.arduino.org.tw:8888/dhtdata/dht2jsonwithdate.php?MAC=E89F6DE8F3BC&start=20200101&end=20221231

//include("../comlib.php");		//使用資料庫的呼叫程式
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
$link=Connection();		//產生mySQL連線物件
 class maindata{
	 public $Device ; 
	 public $Datalist ; 
  }
  class subdata{
	 public $Datetime  ; 
	 public $Temperature ; 
	 public $Humidity ; 
  }

/*
{
	"Device":"E89F6DE8F3BC",
	"Datalist":[
	{"Datetime":"20220101",
	"Temperature":"23",
	"Humidity":"23"
	}
	]
}

*/
$jsonarray= "{\"Device\":\"%s\",\"Datalist\":[%s]}" ;
$jsonrow= "{\"Datetime\":\"%s\",\"Temperature\":\"%s\",\"Humidity\":\"%s\"}" ;
$sid=$_GET["MAC"];		//取得GET參數 : MAC
$s1=$_GET["start"];		//取得GET參數 : start
$s2=$_GET["end"];		//取得GET參數 : end
//select * FROM dhtData where mac = '3C71BFFD882C' and systime >= "20210101" and systime <= "20211231" order by systime asc 
//select * FROM dhtData where mac = '%s' and systime > '%s' and systime < '%s'

$qry1 = "select * from nukiot.dhtData where mac = '%s' and systime >= '%s' and systime <= '%s' order by systime asc " ;		//將dhtdata的資料找出來
$qrystr = sprintf($qry1 , $sid, $s1, $s2) ;		//將dhtdata的資料找出來

//echo $qrystr."<br>" ;
$result= mysqli_query($link ,$qrystr );		//找出多少筆
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
 $subdata->Temperature = $row["temperature"]  ;
 $subdata->Humidity =  $row["humidity"] ;
		//將上面一筆的資料集json資料，加到陣列$dd	
		 array_push($dd , $subdata) ;

	 }
	 //echo "<br>=======================================<br><br>";
$maindata->Device = $sid ;
$maindata->Datalist = $dd;	
	 //$user = utf8_encode($user) ;
	 echo json_encode($maindata, JSON_UNESCAPED_UNICODE);
 }
 


 mysqli_free_result($result);	// 關閉資料集

 mysqli_close($link);		// 關閉連線
 

?>