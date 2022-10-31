<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
?>
<!DOCTYPE html>
<html>
  <head>
    <title>網站使用者列示</title>
  
</head>
  <body>
<?php include '../title.php' ; ?>
<?php

	


	$qrystr="SELECT * FROM fcu.user WHERE 1 order by user asc " ;		//將dhtdata的資料找出來

	$d01 = array();		// declare blank array of d00
	$d02 = array();	// declare blank array of d01
	$d03 = array();	// declare blank array of d01
	$d04 = array();	// declare blank array of d01
	$d05 = array();	// declare blank array of d01
	$d06 = array();	// declare blank array of d01
	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5

  if($result!==FALSE){
	 while($row = mysqli_fetch_array($result)) 
	 {
			array_push($d01, $row["id"]);		// $row[欄位名稱] 就可以取出該欄位資料
			array_push($d02, $row["user"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d03, $row["username"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d04, $row["pwd"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d05, $row["email"]);	// array_push(某個陣列名稱,加入的陣列的內容
			array_push($d06, $row["crtdatetime"]);	// array_push(某個陣列名稱,加入的陣列的內容

		}// 會跳下一列資料

  }
			
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>


  <div align="center">
   <table border="1" align = center cellspacing="1" cellpadding="1">		
		<tr>
			<td align ="centered">ID<br>(編號)</td>
			<td>User Account<br>(帳號名稱)</td>
			<td>User Name<br>(使用者名稱)</td>
			<td>email<br>(電子郵件)</td>
			<td>DataTime<br>(資料創立時間)</td>
			<td>Operation<br>(管理功能)</td>
			</tr>

      <?php 
	  	$row1 = "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>" ;
		  $op1="<a href='memberadd.php'>新增</a>/<a href='memberedt.php?sid=%d'>修改</a>/<a href='dbdel.php?sid=%d'>刪除</a>" ;
		  if(count($d01) >0)
		  {
				for($i=count($d01)-1;$i >=0  ;$i=$i-1)
					{
						$op = sprintf($op1,$d01[$i],$d01[$i]) ;
						echo sprintf($row1, $d01[$i], $d02[$i], $d03[$i], $d05[$i], $d06[$i], $op);
					 }
		 }
      ?>

   </table>

</div>

</form>
<?php
//include '../footer.php';
?>

<?php include '../footer.php' ; ?>	
  </body>
</html>
