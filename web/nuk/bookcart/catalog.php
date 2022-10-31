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
          require_once("dbtools.inc.php");
		  
          //建立資料連接
          $link = create_connection();
							
          //篩選出所有產品資料
          $sql = "SELECT * FROM product_list";
          $result = execute_sql($link, "store", $sql);
						
          //計算總記錄數
          $total_records = mysqli_num_rows($result);
									
          //列出所有產品資料
          for ($i = 0; $i < $total_records; $i++)
          {
            //取得產品資料
            $row = mysqli_fetch_assoc($result);
									
            //顯示產品各欄位的資料
            echo "<form method='post' action='add_to_car.php?book_no=" . 
              $row["book_no"] . "&book_name=" . urlencode($row["book_name"]) . 
              "&price=" . $row["price"] . "'>";
            echo "<tr align='center' bgcolor='#EDEAB1'>";
            echo "<td>" . $row["book_no"] . "</td>";
            echo "<td>" . $row["book_name"] . "</td>";			
            echo "<td>$" . $row["price"] . "</td>";
            echo "<td><input type='text' name='quantity' size='5' value='1'></td>";
            echo "<td><input type='submit' value='放入購物車'></td>";
            echo "</tr>";
            echo "</form>";
          }
									
          //釋放資源及關閉資料連接
          mysqli_free_result($result);
          mysqli_close($link);
        ?>
    </table>
  </body>                                                                                 
</html>