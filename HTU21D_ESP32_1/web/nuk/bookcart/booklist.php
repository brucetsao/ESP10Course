<?php 
session_start();
include '../util.php' ; 
include("../comlib.php");  //使用資料庫的呼叫程式
$dt= getdataorder() ;
$ip = $_SERVER["REMOTE_ADDR"];

$subrow = "<tr bgcolor='white' height='30' align='center'><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>進行訂購</td></tr>" ;	
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
	//	Connection() ;
$link=Connection();		//產生mySQL連線物件
$qry1 = "select * from fcu.product_list WHERE 1 " ;		//SQL填空
$qrystr = sprintf($qry1) ;		// 組立要執行的SQL語法
echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
$count = mysqli_num_rows($result) ;		//是否有ㄗ是否有資料

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>	
  <body bgcolor="lightyellow">
    <table border="0" align="center" width="800" cellspacing="2"> 
      <tr bgcolor="#BABA76" height="30" align="center">
        <td>書號</td>
        <td>書名</td>
        <td>定價</td>
        <td>輸入數量</td>
        <td>進行訂購</td>																
      </tr>
        <?php
		if ($count >=1) 
		{
			//有會員資料
			//列出所有產品資料
      while($row = mysqli_fetch_array($result)) 		// 迴圈讀取會員資料
				{
										
					//顯示產品各欄位的資料
          $subrowdata = sprintf($subrow,$row["book_no"],$row["book_name"],$row["price"],"1") ;
					echo $subrowdata ;
			  }
			}						
          //釋放資源及關閉資料連接
          mysqli_free_result($result);
          mysqli_close($link);
        ?>
    </table>
  </body>                                                                                 
</html>