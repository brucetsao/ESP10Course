
<?php
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	


	$qrystr="select MAC , count(*) as cnt  from fcu.dhtData where 1 group by MAC " ;		//將dhtdata的資料找出來

	$d01 = array();		// declare blank array of d00
	$d02 = array();	// declare blank array of d01

	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5

  if($result!==FALSE){
	 while($row = mysqli_fetch_array($result)) 
	 {
			array_push($d01, $row["MAC"]);		// $row[欄位名稱] 就可以取出該欄位資料
			array_push($d02, $row["cnt"]);	// array_push(某個陣列名稱,加入的陣列的內容

		}// 會跳下一列資料

  }
			
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Temperature and Humidity Device(Modbus) List</title>
<link href="webcss.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
//include '../title.php';
?>
<input type ="button" onclick="history.back()" value="BACK(回到上一頁)">
</input>
  <div align="center">
   <table border="1" align = center cellspacing="1" cellpadding="1">		
		<tr>
			<td align ="centered">MAC Adress<br>(網路卡號)</td>
			<td>Record Amount<br>(筆數)</td>
			</tr>

      <?php 
		  if(count($d01) >0)
		  {
				for($i=count($d01)-1;$i >=0  ;$i=$i-1)
					{
						echo sprintf("<tr><td>%s</td><td>%s</td></tr>", $d01[$i], $d02[$i]);
					 }
		 }
      ?>

   </table>

</div>

</form>
<?php
//include '../footer.php';
?>

</body>
</html>
