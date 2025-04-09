
<?php
   
 // 	include("comlib.php");		//使用資料庫的呼叫程式

  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件


	$qrystr="select * from fcu.coutytbl where 1 order by cname " ;		//將dhtdata的資料找出來
	//SELECT * FROM HAuser as a  WHERE 1 order by userid asc
//	echo $qrystr."<br>" ;

	
	// mysqli_free_result($result);	// 關閉資料集
 
	// mysqli_close($link);		// 關閉連線





?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 標準網頁抬頭</title>
</head>
<body>
<?php
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
	
	if ($count >0)
	{
       echo  "<table width='100%' border='1'>" ;
       echo "<tr><td>序</td><td>城市代碼</td><td>城市名稱</td></tr>" ;
       //$row0 = "<tr><td>1</td><td>01</td><td>南投縣</td></tr>" ;
       $rowdata = "<tr><td>%s</td><td>%s</td><td>%s</td></tr>" ;
       while($row = mysqli_fetch_array($result)) 
		{
            $rowstr =  sprintf($rowdata,$cnt,$row["cid"],$row["cname"]) ;
            echo  $rowstr  ;
            $cnt=  $cnt + 1 ;
		}
       echo "</table>" ;
	}

?>
</body>
</html>