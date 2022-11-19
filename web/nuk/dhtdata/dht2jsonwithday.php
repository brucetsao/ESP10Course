<?php     
//http://ncnu.arduino.org.tw:9999/dhtdata/dht2jsonwithday.php?MAC=CC50E3B5BB20&start=20220101&end=20221231  
//http://nuk.arduino.org.tw:8888/dhtdata/dht2jsonwithday.php?MAC=E89F6DE8F3BC&start=20200101&end=20221231

//include("../comlib.php");		//使用資料庫的呼叫程式
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
$link=Connection();		//產生mySQL連線物件
/*
{
	"Device":"CC50E3B5BB20",
	"Datalist":[
	{"Datetime":"20220101",
	"Temperature":"23",
	"Humidity":"23"
	}]
}

*/
$jsonarray= "{\"Device\":\"%s\",\"Datalist\":[%s]}" ;
$jsonrow= "{\"Datetime\":\"%s\",\"Temperature\":\"%s\",\"Humidity\":\"%s\"}" ;
$sid=$_GET["MAC"];		//取得POST參數 : field1
$s1=$_GET["start"];		//取得POST參數 : field1
$s2=$_GET["end"];		//取得POST參數 : field1
//select * FROM dhtData where mac = 'CC50E3B5BB20' and systime >= "20210101" and systime <= "20211231" order by systime asc 
//select * FROM dhtData where mac = 'CC50E3B5BB20' and systime >= "20210101" and systime <= "20211231" group by left(systime,8) order by systime asc
//select MAC,left(systime,8) as day, average(temperature) as temp, average(humidity) as humid   FROM dhtData where mac = 'CC50E3B5BB20' and systime >= "20210101" and systime <= "20211231" group by left(systime,8) order by systime asc
//select MAC,left(systime,8) as day, avg(temperature) as temp, avg(humidity) as humid FROM dhtData where mac = 'CC50E3B5BB20' and systime >= '20210101' and systime <= '20211231' group by left(systime,8) order by systime asc;	
//select MAC,left(systime,8) as day, avg(temperature) as temp, avg(humidity) as humid FROM dhtData where mac = '%s' and systime >= '%s' and systime <= '%s' group by left(systime,8) order by systime asc;

$qry1 = "select MAC,left(systime,8) as day, avg(temperature) as temp, avg(humidity) as humid FROM nukiot.dhtData where mac = '%s' and systime >= '%s' and systime <= '%s' group by left(systime,8) order by systime asc" ;		//將dhtdata的資料找出來
$qrystr = sprintf($qry1 , $sid, $s1, $s2) ;		//將dhtdata的資料找出來

//echo $qrystr."<br>" ;

$result= mysqli_query($link ,$qrystr);		//找出多少筆
$cnt= 1 ;
$count = mysqli_num_rows($result) ;
//echo $count."<br>";

if ($count >0)
{
	$t1="" ;

while($row = mysqli_fetch_array($result)) 
	{


		$tmp1 = sprintf($jsonrow,$row['day'],$row['temp'],$row['humid'])  ;	

	//	echo $tmp."<br>";
		
		$t1 = $t1.$tmp1;

		if ($cnt < $count)
		{
			$t1 = $t1."," ;

		}
		$cnt=$cnt+1 ;
		//echo "-----".$cnt."<br>" ;
		//echo $t1."<br>";
	}		//end of while($row = mysql_fetch_array($result)) 
	//echo "<br>=======================================<br><br>";
	$tmpp = sprintf($jsonarray,$sid,$t1) ;
	echo $tmpp ;
}

 mysqli_free_result($result);	// 關閉資料集

 mysqli_close($link);		// 關閉連線


?>