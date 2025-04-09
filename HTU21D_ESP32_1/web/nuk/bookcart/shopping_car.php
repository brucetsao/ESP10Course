<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>	
  <body bgcolor="LightYellow">
    <p align="center"><img src='fig1.jpg'></p>
    <table border="0" align="center" width="800">
      <tr bgcolor="#ACACFF" height="30" align="center">
        <td>書號</td>
        <td>書名</td>
        <td>定價</td>
        <td>數量</td>		
        <td>小計</td>
        <td>變更數量</td>		
      </tr>				
        <?php
          //若購物車是空的，就顯示 "目前購物車內沒有任何產品及數量" 訊息
          if (empty($_COOKIE["book_no_list"]))
          {
            echo "<tr align='center'>";
            echo "<td colspan='6'>目前購物車內沒有任何產品及數量！</td>";	
            echo "</tr>";
          }
          else
          {
            //取得購物車資料
            $book_no_array = explode(",", $_COOKIE["book_no_list"]);
            $book_name_array = explode(",", $_COOKIE["book_name_list"]);
            $price_array = explode(",", $_COOKIE["price_list"]);		
            $quantity_array = explode(",", $_COOKIE["quantity_list"]);		
					
            //顯示購物車內容
            $total = 0;			
            for ($i = 0; $i < count($book_no_array); $i++)
            {
              //計算小計
              $sub_total = $price_array[$i] * $quantity_array[$i];
						
              //計算總計
              $total += $sub_total;
						
              //顯示各欄位資料
              echo "<form method='post' action='change.php?book_no=" . 
                $book_no_array[$i] . "'>";						
              echo "<tr bgcolor='#EDEAB1'>";
              echo "<td align='center'>" . $book_no_array[$i] . "</td>";		
              echo "<td align='center'>" . $book_name_array[$i] . "</td>";			
              echo "<td align='center'>$" . $price_array[$i] . "</td>";
              echo "<td align='center'><input type='text' name='quantity' value='" . 
                $quantity_array[$i] . "' size='5'></td>";			
              echo "<td align='center'>$" . $sub_total . "</td>";
              echo "<td align='center'><input type='submit' value='修改'></td>";					
              echo "</tr>";
              echo "</form>";						
            }
					
            echo "<tr align='right' bgcolor='#EDEAB1'>";
            echo "<td colspan='6'>總金額 = " . $total . "</td>";	
            echo "</tr>";	
            echo "<tr align='center'>";
            echo "<td colspan='6'>" . "<br><input type='button' value='退回所有產品'
              onClick=\"javascript:window.open('delete_order.php','_self')\">";
            echo "</td>";	
            echo "</tr>";	
          }
      ?>
    </table>
  </body>                                                                                 
</html>