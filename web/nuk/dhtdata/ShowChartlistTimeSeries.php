<?php
 //http://140.134.25.43:8088//dhtdata/ShowChartlist.php?MAC=CC50E3B5BB20&dt1=20220101&dt2=20220201
 //http://140.134.25.43:8088//dhtdata/ShowChartlist.php?MAC=CC50E3B5BB20&dt1=20220101&dt2=20220201
 
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
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js">


    </head>
    <body>

    <?php
         include '../title.php';
     ?>


<div id="container1" style="min-width: 95%; height: 600px; margin: 0 auto"></div>
<p>
<div id="container2" style="min-width: 95%; height: 600px; margin: 0 auto"></div>
<p>


<script type="text/javascript">
//-----------particle--------------

Highcharts.getJSON(
    '<?php echo sprintf("http://140.134.25.43:8088/dhtdata/GetChartData.php?MAC=%s&dt1=%s&dt2=%s",$mid,$dd1,$dd2);?>',
    function (data) {

        Highcharts.chart('container1', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'USD to EUR exchange rate over time'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Exchange rate'
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
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'USD to EUR',
                data: data
            }]
        });
    }
);
 //---------Color Temperaturte----------------
 Highcharts.getJSON(
    'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/usdeur.json',
    function (data) {

        Highcharts.chart('container2', {
            chart: {
                zoomType: 'x'
            },
            title: {
                text: 'USD to EUR exchange rate over time'
            },
            subtitle: {
                text: document.ontouchstart === undefined ?
                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
            },
            xAxis: {
                type: 'datetime'
            },
            yAxis: {
                title: {
                    text: 'Exchange rate'
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
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },

            series: [{
                type: 'area',
                name: 'USD to EUR',
                data: data
            }]
        });
    }
);

</script>

<?php
include '../footer.php';
?>      
</body>
</html>