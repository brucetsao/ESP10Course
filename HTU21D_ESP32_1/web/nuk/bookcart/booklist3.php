<?php 
session_start();
include '../util.php' ; 
include("../comlib.php");  //使用資料庫的呼叫程式
$dt= getdataorder() ;
$ip = $_SERVER["REMOTE_ADDR"];
//$subform = "<form method='post' action='addcart.php?book_no='%s'&book_name='%s'&price=%d'>\n";
$subform = "<form method='POST' action='addcart.php?book_no=%s&book_name=%s&price=%d'>\n";
$subrow = "<tr bgcolor='white' height='30' align='center'><td>%s</td><td>%s</td><td>%d</td><td><input type='number' name='quantity' size='5' %s ></td><td>%d</td><td><input type='submit' value='放入購物車'></td></tr>\n" ;	
$subformend = "</form>\n";
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
	//	Connection() ;
$link=Connection();		//產生mySQL連線物件
$qry1 = "select * from fcu.product_list WHERE 1 " ;		//SQL填空
$qrystr = sprintf($qry1) ;		// 組立要執行的SQL語法
//echo $qrystr."<br>" ;

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
        <td>可下訂量</td>
        <td>進行訂購</td>																
      </tr>
        <?php
		if ($count >=1) 
		{
			//有會員資料
			//列出所有產品資料
      while($row = mysqli_fetch_array($result)) 		// 迴圈讀取會員資料
				{
										
					
             
                    $subformdata = sprintf($subform,$row["book_no"],$row["book_name"],$row["price"]) ;
                    $subrowdata = sprintf($subrow,$row["book_no"],$row["book_name"],$row["price"],getqtyinfo((int)$row["stock"]),(int)$row["stock"]) ;
					echo $subformdata ;     //產生form執行程式主體
					echo $subrowdata ;      //表格列 的實體內容
					echo $subformend ;      //產生 form end 語句
			  }
			}						
          //釋放資源及關閉資料連接
          mysqli_free_result($result);
          mysqli_close($link);
        ?>
    </table>
  </body>                                                                                 
</html>