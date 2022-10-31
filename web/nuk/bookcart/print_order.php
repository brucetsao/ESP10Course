<?php
  //若購物車是空的，就顯示尚未選購產品
  if (empty($_COOKIE["book_no_list"]))
  {
    echo "<script type='text/javascript'>";
    echo "alert('您尚未選購任何產品');";
    echo "history.back();";		
    echo "</script>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body background="bg1.jpg">
    <h3>注意事項</h3>
    <ol type="1">
      <li>
        訂購方法一：請填妥信用卡專用訂購單後裝訂，免貼郵票，
        直接投郵即可，亦可放大傳真至 02-23695588。
      </li>
      <li>
        訂購方法二：請利用郵局劃撥單，填妥姓名、戶名、書名、數量、
        電話，直接至郵局劃撥付款。帳號：12345678戶名：快樂書城
      </li>
      <li>
        寄書與補書：您將於付款之後的3-5天收到書籍，若沒有收到，
        請來電洽詢 02-23695599。
      </li>
    </ol>
    <hr>
    <table border="1" bgcolor="white" rules="cols" align="center" cellpadding="5">
    <tr height="25">
				<td colspan="4" align="Center" bgcolor="#CCCC00">個人資料</td>
    </tr>
    <tr height="25">
      <td colspan="4">姓名：<u><?php echo $_COOKIE["name"] ?>
        <?php for ($i = 0; $i <= 100 - 2* strlen($_COOKIE["name"]); $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">電話：
        <u><?php for ($i = 0; $i <= 100; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">地址：
        <u><?php for ($i = 0; $i <= 100; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        郵寄方式：□國內限時&nbsp;&nbsp;&nbsp;&nbsp;□國內掛號 (另加20元郵資)
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        付款方式：□JCB CARD&nbsp;&nbsp;&nbsp;□VISA CARD&nbsp;&nbsp;&nbsp;□MASTER CARD
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        信用卡卡號：<u><?php for ($i = 0; $i <= 89; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        有效日期：<u>西元<?php for ($i = 0; $i <= 85; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        簽名(與信用卡簽名相同)：<u><?php for ($i = 0; $i <= 66; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        支付總金額：<u><?php for ($i = 0; $i <= 89; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        開立發票：□二聯式&nbsp;&nbsp;&nbsp;&nbsp;□三聯式
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        發票地址：<u><?php for ($i = 0; $i <= 93; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        統一編號：<u><?php for ($i = 0; $i <= 93; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4" align="center" bgcolor="#CCCC00">訂單細目</td>
    </tr>
    <tr height="25" align="center" bgcolor="FFFF99">
      <td>書名</td>
      <td>定價</td>
      <td>數量</td>
      <td>小計</td>																
    </tr>			
      <?php
        //取得購物車資料
        $book_name_array = explode(",", $_COOKIE["book_name_list"]);
        $price_array = explode(",", $_COOKIE["price_list"]);		
        $quantity_array = explode(",", $_COOKIE["quantity_list"]);		
					
        //顯示購物車內容
        $total = 0;		
        for ($i = 0; $i < count($book_name_array); $i++)
        {
          //計算小計
          $sub_total = $price_array[$i] * $quantity_array[$i];
					
          //計算總計
          $total += $sub_total;
					
          //顯示各欄位資料
          echo "<tr>";	
          echo "<td align='center'>" . $book_name_array[$i] . "</td>";			
          echo "<td align='center'>$" . $price_array[$i] . "</td>";
          echo "<td align='center'>" . $quantity_array[$i] . "</td>";
          echo "<td align='center'>$" . $sub_total . "</td>";
          echo "</tr>";
        }
        echo "<tr align='right' bgcolor='#CCCC00'>";
        echo "<td colspan='4'>總金額 = " . $total . "</td>";	
        echo "</tr>";	
      ?>
    </table>
  </body>
</html>