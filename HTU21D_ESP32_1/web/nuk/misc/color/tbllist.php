<?php session_start();?>
<!DOCTYPE html>
<html>
  <head>
    <title>顏色代碼列示</title>
  
</head>
  <body>
  <?php include '../../title.php' ; ?>
  //目錄不同要改
<?php
   	include("../../comlib.php");		//使用資料庫的呼叫程式
	//目錄不同要改
	include("../../Connections/iotcnn.php");		//使用資料庫的呼叫程式
	//目錄不同要改
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	


	$qrystr="SELECT * FROM fcu.colortbl WHERE 1 order by id asc " ;		//將dhtdata的資料找出來
	//請用新的資料表 的select敘述句去改

	$d01 = array();		// declare blank array of d00
	$d02 = array();	// declare blank array of d01
	$d03 = array();	// declare blank array of d01
	$d04 = array();	// declare blank array of d01
	//跟去 欄位個數去修正
	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5

  if($result!==FALSE){
	 while($row = mysqli_fetch_array($result)) 
	 {
			array_push($d01, $row["id"]);		// $row[欄位名稱] 就可以取出該欄位資料
			array_push($d02, $row["colorname"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d03, $row["colorindex"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d04, $row["colorimg"]);	// array_push(某個陣列名稱,加入的陣列的內容
			//跟去 欄位個數去修正，並且 $row["id"] 要更正為對應的欄位名稱
		}// 會跳下一列資料

  }
			
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>


  <div align="center">
   <table border="1" align = center cellspacing="1" cellpadding="1">		
		<tr>
			<td align ="centered">Color ID<br>(顏色代碼	)</td>
			<td>Color Name<br>(顏色名稱	)</td>
			<td>Color Index<br>(色卡)</td>
			<td>Color Image<br>(色卡圖片)</td>
			<td>Managemant<br>(管理功能)</td>
			</tr>

      <?php 
	  	$row1 = "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>" ;
			//根據欄位數去修正<td>.....</td>的個數
		  $op1="<a href='tbladd.php'>新增</a>/<a href='tbledt.php?sid=%d'>修改</a>/<a href='dbdel.php?sid=%d'>刪除</a>" ;
		  if(count($d01) >0)
		  {
				for($i=0;$i < count($d01) ;$i=$i+1)
					{
						$op = sprintf($op1,$d01[$i],$d01[$i]) ;
						//根據欄位數與對應欄位名稱與對應變數，進行修正
						echo sprintf($row1, $d01[$i], $d02[$i], $d03[$i], $d04[$i], $op);
					 }
		 }
      ?>

   </table>

</div>

</form>
<?php
//include '../footer.php';
?>

<?php include '../../footer.php' ; ?>	
  </body>
</html>
