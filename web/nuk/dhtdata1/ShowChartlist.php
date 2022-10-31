<?php
 //http://140.134.25.43:8088//fcu/dhtdata/ShowChartlist.php?MAC=CC50E3B5BB20&dt1=20220101&dt2=20220201
 //http://140.134.25.43:8088//fcu/dhtdata/ShowChartlist.php?MAC=CC50E3B5BB20&dt1=20220101&dt2=20220201
 
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

    $mid=$_GET["MAC"];		//取得POST參數 : MAC address
    $dd1 = $_GET["dt1"] ;	
    $dd2 = $_GET["dt2"] ;	
	
    //select * from fcu.dhtData where MAC = 'CC50E3B5BB20' and systime >= '20220101' and systime <= '20220103';
	$qry ="select * from fcu.dhtData where MAC = '%s' and systime >= '%s' and systime <= '%s' order by systime desc " ;		//將dhtdata的資料找出來
	$qrystr=sprintf($qry,$mid,$dd1,$dd2) ;		//將dhtdata的資料找出來
			
	//echo $qrystr."<br>" ;
//	int aa[] = {1,3,45,6,7} ;  == 	$aa = array(4,5,6,7,8,9);
//	int bb[] = {} ;  ==  $bb = array();
	$d00 = array();		// declare blank array of d00
	$d01 = array();	// declare blank array of d01
	$d02 = array();	// declare blank array of d02
	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
//	echo "step 02 . <br>" ;
  if($result!==FALSE)
  {
	 while($row = mysqli_fetch_array($result)) 
	 {
			array_push($d00,  trandatetime3($row["systime"]));		// $row[欄位名稱] 就可以取出該欄位資料
			array_push($d01, (double)$row["temperature"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d02, (double)$row["humidity"]);
		}// 會跳下一列資料

  }
/*		
 $dd = "[123,345,6,8,9,00,006,34,34]" ;

$bb = "%s" ;
$data ="[" ;
$cc = count($d01) ;
$ci = 1 ;
for ($i=0 ;$i < count($d01) ; $i=$i+1)
{
	$data = $data.sprintf($bb ,$d01[$i]) ;
	if ($ci <= $cc)
	{
		$data = $data." , " ;	
	}
	$ci = $ci + 1 ;
}
$data = $data."]" ;
echo $data ;
echo "-----------1111-------" ;
echo json_encode($d01, JSON_UNESCAPED_UNICODE);
echo "-----------22222-------" ;
echo json_encode($d03, JSON_UNESCAPED_UNICODE);

*/
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display Temperature and Humidity Curve Chart by MAC</title>
<link href="webcss.css" rel="stylesheet" type="text/css" />
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

  </style>
</head>
<body>
<?php
include '../title.php';
?>

</form>
<div id="container1" style="min-width: 95%; height: 600px; margin: 0 auto"></div>
<p>
<div id="container2" style="min-width: 95%; height: 600px; margin: 0 auto"></div>
<p>


<script type="text/javascript">
//-----------particle--------------

Highcharts.chart('container1', {
    chart: {
        zoomType: 'x'
    },
    title: {
        text: 'Temperature °C by MAC:<? echo $mid."  interval:(".$dd1."~".$dd2.")";  ?>',
		fontsize: 30
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: <?php echo json_encode($d00, JSON_UNESCAPED_UNICODE); ?> 
    },
    yAxis: {
        title: {
            text: '°C'
        }
    },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 0.1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
    series: [{
        name: 'Temperaturte',
        data:<?php echo json_encode($d01, JSON_UNESCAPED_UNICODE); ?> 
			} ]
});
 //---------Color Temperaturte----------------
Highcharts.chart('container2', {
    chart: {
            zoomType: 'x'
    },
    title: {
		text: 'Temperature °C by MAC:<? echo $mid."  interval:(".$dd1."~".$dd2.")";  ?>',
		fontsize: 30
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: <?php echo json_encode($d00, JSON_UNESCAPED_UNICODE); ?>
    },
    yAxis: {
        title: {
            text: 'Percent(%)'
        }
    },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 0.1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

    series: [{
        name: 'Percent',
        data:<?php echo json_encode($d02, JSON_UNESCAPED_UNICODE); ?> 
			} ]
});
		</script>

<?php
include '../footer.php';
?>      
</body>
</html>