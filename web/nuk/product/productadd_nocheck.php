﻿<?php
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
       //	Connection() ;
     $link=Connection();		//產生mySQL連線物件
     $qrystr2 = "select * from unittbl  where 1 order by unitname asc " ;
     $qrystr3 = "select * from packagetbl  where 1 order by packagename asc " ;
     $result2=mysqli_query($link,$qrystr2);	
     $result3=mysqli_query($link,$qrystr3);	


?>

<!DOCTYPE html>
<html>
  <head>
    <title>產品新增</title>
    <meta charset="utf-8">

  </head>
  <body>
  <div align="center"><img src="/fcu/images/titlelogo.jpg" width="1000" height="157" /></div>    
    <form action="addproduct.php" method="POST" name="myForm">
      <table border="2" align="center" bordercolor="#6666FF">
        <tr> 
          <td colspan="2" bgcolor="#6666FF" align="center"> 
            <font color="#FFFFFF">請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">產品料號：</td>
          <td><input name="t1" type="text" size="16">
          (請使用英文或數字鍵)</td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*產品名稱：</td>
          <td><input name="t2" type="text" size="ˊ60">
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*產品英文名稱：</td>
          <td><input name="t3" type="text" size="15">
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*製造商(供應商)：</td>
          <td><input name="t4" type="text" size="15">
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*產品價格：</td>
          <td><input name="t5" type="text" size="15">
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*產品重量：</td>
          <td><input name="t6" type="text" size="15">
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*產品單位：</td>
          <td>
            <select name="s1">
            <?php 
                if($result2 !==FALSE)
                {
                    while($row2 = mysqli_fetch_array($result2)) {
                        echo sprintf("<option value='%s'>%s</option>",$row2["unitid"], $row2["unitname"]);
                    }
                    mysqli_free_result($result2);
                }
            ?>
            </select>
            </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*產品包裝：</td>
          <td>
            <select name="s2">
            <?php 
                if($result3 !==FALSE)
                {
                    while($row3 = mysqli_fetch_array($result3)) {
                        echo sprintf("<option value='%s'>%s</option>",$row3["packageid"], $row3["packagename"]);
                    }
                    mysqli_free_result($result3);
                }
            ?>
            </select>
            </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">備註：</td>
          <td><textarea name="comment" cols="45" rows="4" ></textarea></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="center" colspan="2"> 
            <input type="submit" name="送出" >
            <input type="reset" value="重新填寫">
          </td>
        </tr>
      </table>
    </form>
    <div align="center"><img src="/fcu/images/footer_LOGOS.jpg" width="1000" height="100%" /></div>    

  </body>
</html>