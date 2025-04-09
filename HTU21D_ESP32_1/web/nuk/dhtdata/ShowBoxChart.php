
<?php
	//http://ncnu.arduino.org.tw:9999/dhtdata/ShowChartlistday.php?MAC=CC50E3B5BB20
	
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	//$mid=$_GET["mac"];		//取得POST參數 : mac address
	if  (!isset($_GET["MAC"])) 
	{
		$mid=$_POST["MAC"];		//取得POST參數 : MAC address
	}
	else
	{
		$mid=$_GET["MAC"];		//取得POST參數 : MAC address
	}
		
	if (!isset($_POST["dt1"])) 
	{
		$sd1 = getshiftdayorder(-7); 
		$dd1 = $sd1 ;	
	}
	else
	{
		$dd1 = $_POST["dt1"] ;	
		$sd1 = $_POST["dt1"] ;
	}

	
	if (!isset($_POST["dt2"])) 
	{
		$sd2 = getdayorder();    
		$dd2 = $sd2 ;	

	}	
	else
	{
		$dd2 = $_POST["dt2"] ;	
		$sd2 =  $_POST["dt2"] ;
	}
			
			
	//$qry ="select MAC, left(systime,8) as systime, avg(temperature) as temp, avg(temperature) as humid from ncnuiot.dhtData where MAC = '%s' and systime >= '%s' and systime <= '%s' group by left(systime,8) order by systime desc " ;		//將dhtdata的資料找出來
	$qry ="select left(systime,8) as systime from ncnuiot.dhtData where MAC = '%s' and systime >= '%s' and systime <= '%s' group by left(systime,8) order by systime asc " ;		//將dhtdata的資料找出來
	$qrystr=sprintf($qry,$mid,$dd1,$dd2) ;		//將dhtdata的資料找出來
	$qry2 ="select temperature, humidity from ncnuiot.dhtData where MAC = '%s' and left(systime,8) = '%s' order by systime desc " ;		//將dhtdata的資料找出來
	//$qrystr2=sprintf($qry2,$mid,$dd1,$dd2) ;		//將dhtdata的資料找出來
			
//	echo $qrystr."<br>" ;
//	int aa[] = {1,3,45,6,7} ;  == 	$aa = array(4,5,6,7,8,9);
//	int bb[] = {} ;  ==  $bb = array();
	$d00 = array();		// declare blank array of d00
	$d01 = array();	// declare blank array of d01
	$d02 = array();	// declare blank array of d02
	$d03 = array();	// declare blank array of d03
	
	$result=mysql_query($qrystr,$link);		//將dhtdata的資料找出來(只找最後5
//	echo "step 02 . <br>" ;
	$cn = 0 ;
  if($result!==FALSE)
  {
	 while($row = mysql_fetch_array($result)) 
	 {		
			//echo "----".$row["systime"]."<br>" ;
			array_push($d00, $row["systime"]);		// $row[欄位名稱] 就可以取出該欄位資料
		/*
			array_push($d01, $cn);
			array_push($d02, $cn);
			array_push($d03, $row["MAC"]);
			$qrystr2=sprintf($qry2,$mid,$row["systime"]) ;
			//echo $qrystr2."<br>" ; 
			$result2=mysql_query($qrystr2,$link);
			while($row2 = mysql_fetch_array($result2)) 
				{
					array_push($d01[$cn], $row2["temperature"]) ;
					array_push($d02[$cn], $row2["humidity"]) ;
					//echo "-1---".$row2["temperature"]."<br>" ;
					//echo "-2---".$row2["humidity"]."<br>" ;

					}
			$cn = $cn + 1;
		*/
	}// 會跳下一列資料

  }
			
//	echo "step 03 . <br>" ;		
	 mysql_free_result($result);	// 關閉資料集
//	echo "step 04 . <br>" ;	 
	// mysql_close($link);		// 關閉連線
//	echo "step 05 . <br>" ;	 	




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display Temperature and Humidity Data as Curve Chart by MAC</title>
<link href="webcss.css" rel="stylesheet" type="text/css" />

	<script src="/code/highcharts.js"></script>
    <script src="/code/highcharts-more.js"></script>
    <script src="/code/modules/exporting.js"></script>
    <script src="/code/modules/export-data.js"></script>
    <script src="/code/modules/accessibility.js"></script>	
	
	
</head>
<body>
<?php
include '../title.php';
?>
<input type ="button" onclick="history.back()" value="BACK(回到上一頁)">
</input>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1">
    <tr>
      <td width="220">開始日期時間(YYYYMMDD)
         <input name="MAC" type="hidden" id="MAC" value="<?php echo $mid ?>" />

	  </td>
      <td width="200"><label for="strdt"></label>
      <input type="text" name="dt1" id="dt1" size="8" maxlength="8" value = <? echo $sd1; ?> /></td>
      <td width="220">結束日期時間(YYYYMMDD)</td>
      <td width="200"><input type="text" name="dt2" id="dt2" size="8" maxlength="8" value = <? echo $sd2; ?> /></td>
      <td width="200"><input type="submit" name="button" id="button" value="送出" /></a></td>
      </tr>
  </table>

</form>

<div id="container1" style="min-width: 95%; height: 600px; margin: 0 auto"></div>
<p>
<div id="container2" style="min-width: 95%; height: 600px; margin: 0 auto"></div>
<p>


<script type="text/javascript">

 //-----------particle--------------

Highcharts.chart('container1', {
    chart: {
        type: 'boxplot'
    },
    title: {
        text: 'Temperature °C by MAC:<? echo $mid?>',
		fontsize: 30
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
		<?php
		$cn = 1 ;
	for($i= 0 ;$i < count($d00);$i=$i+1)
		{
			echo "'";
			echo $d00[$i] ;
			echo "'";
			if ($cn  <  count($d00))
				{
					echo ",\n";
				}
			$cn = $cn  +1 ;				
		}
		?>
        ]
    },
    yAxis: {
        title: {
            text: '°C'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Temperaturte',
        data: [
		<?php
		$cn = 1 ;
	for($i= 0 ;$i < count($d00);$i=$i+1)
			{
				
			$qrystr2=sprintf($qry2,$mid,$d00[$i]) ;
			//echo $qrystr2."<br>" ; 
			$result2=mysql_query($qrystr2,$link);
			$cnt2 = mysql_num_rows($result2) ;
			if ($cnt2 >0)
			{
				$cn2 = 1 ;
				echo "[" ;
			while($row2 = mysql_fetch_array($result2)) 
				{
					echo $row2["temperature"] ;
					if ($cn2 < $cnt2)
					{
						echo ",";
					}
					$cn2 = $cn2 +1 ;
				}
				
				echo "]" ;
			}
				if ($cn  <  count($d00))
					{
						echo ",\n";
					}
				$cn = $cn  +1 ;	
			}
		?>
        ]} ]
});
 //---------Color Temperaturte----------------
Highcharts.chart('container2', {
    chart: {
        type: 'boxplot'
    },
    title: {
        text: 'Humidity % by MAC:<? echo $mid?>',
		fontsize: 30
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
		<?php
		$cn = 1 ;
	for($i= 0 ;$i < count($d00);$i=$i+1)
		{
			echo "'";
			echo $d00[$i] ;
			echo "'";
			if ($cn  <  count($d00))
				{
					echo ",\n";
				}
			$cn = $cn  +1 ;				
		}
		?>
        ]
    },
    yAxis: {
        title: {
            text: '%'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Humidity',
        data: [
		<?php
		$cn = 1 ;
	for($i= 0 ;$i < count($d00);$i=$i+1)
			{
				
			$qrystr2=sprintf($qry2,$mid,$d00[$i]) ;
			//echo $qrystr2."<br>" ; 
			$result2=mysql_query($qrystr2,$link);
			$cnt2 = mysql_num_rows($result2) ;
			if ($cnt2 >0)
			{
				$cn2 = 1 ;
				echo "[" ;
			while($row2 = mysql_fetch_array($result2)) 
				{
					echo $row2["humidity"] ;
					if ($cn2 < $cnt2)
					{
						echo ",";
					}
					$cn2 = $cn2 +1 ;
				}
				
				echo "]" ;
			}
				if ($cn  <  count($d00))
					{
						echo ",\n";
					}
				$cn = $cn  +1 ;	
			}
		?>
        ]} ]
});
		</script>
 
<?php
include '../footer.php';
mysql_close($link);	
?>      
</body>
</html>
