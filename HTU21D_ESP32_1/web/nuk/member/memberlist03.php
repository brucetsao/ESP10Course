<?php 
	session_start();		//必須要用這段，方能使用session的所有功能
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
      ?>
      <!DOCTYPE html>
      <html>
        <head>
          <title>網站使用者列示</title>
       <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
      </head>
        <body>
      <?php include '../title.php' ; ?>
      <div align="center">
   <table border="1" align = center cellspacing="1" cellpadding="1">		
		<tr>
			<td align ="centered">ID<br>(編號)</td>
			<td align ="centered">User Account<br>(帳號名稱)</td>
			<td align ="centered">User Name<br>(使用者名稱)</td>
			<td align ="centered">Sex<br>(性別)</td>
			<td align ="centered">Degree<br>(學歷)</td>
			<td align ="centered">Operation<br>(管理功能)</td>
			</tr>

      <?php
    $rowstr = "<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>" ;
        //$row1 是每一列資料的table row的套表格式
        
        //<a href="memberadd.php">新增</a> / <a href="memberedt.php">修改</a> / <a href="memberdel.php">刪除</a>
        $op="<a href='memberadd.php'>新增</a> / <a href='memberedt.php?sid=%d'>修改</a> / <a href='dbdel.php?sid=%d'>刪除</a>" ;
            //產生每一列資料後面的hyper link 連結程式碼的套表格式	
  
      
	$qrystr="select * from fcu.membera  where 1 order by username asc  " ;		//將dhtdata的資料找出來
	//產生抓資料的SQL於這
	
	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
	//執行抓資料的SQL敘述
	
  if($result!==FALSE)	//判斷是否有資料
  {
	 while($row = mysqli_fetch_array($result)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
	 {

        $opstr = sprintf($op,$row["id"],$row["id"]) ;
        echo sprintf($rowstr,$row["id"],$row["username"], $row["name"],sextype($row["sex"]),$row["degree"],$opstr) ;
        /*
            echo $row["id"];		// $row[欄位名稱] 就可以取出該欄位資料
			echo  $row["username"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo  $row["name"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo  sextype($row["sex"]);	// array_push(某個陣列名稱,加入的陣列的內容
			echo  $row["degree"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo  $row["degreeename"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo "<br>" ;
		*/
        }// 會跳下一列資料

  }
			
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線


function sextype($ss)
{
	if ($ss == 1)
	{
		return "男生" ;

	}
	else
	 {
		return "女生" ;
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
