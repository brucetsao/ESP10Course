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
          <title>神明基本資料列示</title>
       <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
      </head>
        <body>
      <?php include '../title.php' ; ?>
      <div align="center">
   <table border="1" align = center cellspacing="1" cellpadding="1">		
		<tr>
			<td align ="centered">ID<br>(編號)</td>
			<td align ="centered">Name<br>(神明名稱)</td>
			<td align ="centered">Location<br>(神明位置)</td>
			<td align ="centered">Figure<br>(神明圖片)</td>
			<td align ="centered">Operation<a href='movieadd.php'>(新增)</a><br>(管理功能)</td>
			</tr>

      <?php
    $rowqry = "<tr><td>%s</td><td>%s</td><td>%s</td><td><img src='%s' alt='%s' width='150' ></td><td>%s</td></tr>\n" ;
        //$row1 是每一列資料的table row的套表格式
        
        //<a href="memberadd.php">新增</a> / <a href="memberedt.php">修改</a> / <a href="memberdel.php">刪除</a>
        $op="<a href='Godsadd.php'>新增</a> / <a href='Godsedt.php?sid=%s'>修改</a> / <a href='Godsdel.php?sid=%s'>刪除</a>" ;
            //產生每一列資料後面的hyper link 連結程式碼的套表格式	
  
      
	$qrystr="select * from fcu.Vgods  where 1 order by Name asc  " ;		//將dhtdata的資料找出來
	//產生抓資料的SQL於這
	
	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
	//執行抓資料的SQL敘述
	
  if($result!==FALSE)	//判斷是否有資料
  {
	 while($row = mysqli_fetch_array($result)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
	 {

        $opstr = sprintf($op,$row["id"],$row["id"]) ;
		$rowstr = sprintf($rowqry,$row["id"],$row["name"], $row["locationname"],"../images/god/".$row["pic"],$row["name"],$opstr) ;
        echo $rowstr ;

        }// 會跳下一列資料

  }
			
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線



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
