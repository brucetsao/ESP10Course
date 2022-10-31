<?php
session_start();
  //檢查 session 中的 loginok 變數是否等於 1 

  $passed = $_SESSION['loginok'] ;
	
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.html
  if ($passed != "1")
  {
    header("location:index.php");
    exit();
  }
	
  //如果 cookie 中的 passed 變數等於 TRUE
  //表示已經登入網站，取得使用者資料	
  else
  {
    include("../comlib.php");		//使用資料庫的呼叫程式
    include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
    //	Connection() ;
      //建立資料連接
    $link=Connection();		//產生mySQL連線物件
    
		
    $id = $_SESSION['usrid'] ;
		
  				
    //執行 SELECT 陳述式取得使用者資料
    $sql = "select * from fcu.users Where id = '%s'";
      // 上面放標準SQL語法的命令 ，並把要比較的內容，用%s，%d...方法填入
      $qrystr = sprintf($sql,$id) ;
      //把要比較的內容，用sprintf()，用變數方法填入
     $result=mysqli_query($link,$qrystr);		//執行sql語法       
      //執行sql語法  
		
    $row = mysqli_fetch_assoc($result);  
    //簡潔寫法，抓到第一筆的資料列並傳回
?>
<!DOCTYPE html>
<html>
  <head>
    <title>修改會員資料</title>
    <meta charset="utf-8">
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.password.value.length == 0)
        {
          alert("「使用者密碼」一定要填寫哦...");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("「使用者密碼」不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("「密碼確認」欄位忘了填哦...");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("您一定要留下真實姓名哦！");
          return false;
        }	
        if (document.myForm.year.value.length == 0)
        {
          alert("您忘了填「出生年」欄位了...");
          return false;
        }
        if (document.myForm.month.value.length == 0)
        {
          alert("您忘了填「出生月」欄位了...");
          return false;
        }	
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1)
        {
          alert("「出生月」應該介於 1-12 之間哦！");
          return false;
        }
        if (document.myForm.day.value.length == 0)
        {
          alert("您忘了填「出生日」欄位了...");
          return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29)
        {
          alert("二月只有 28 天，最多 29 天");
          return false;
        }	
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6
          | document.myForm.month.value == 9 | document.myForm.month.value == 11)
        {
          if (document.myForm.day.value > 30)
          {
            alert("4 月、6 月、9 月、11 月只有 30 天哦！");
            return false;					
          }
        }	
        else
        {
          if (document.myForm.day.value > 31)
          {
            alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
            return false;					
          }				
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1)
        {
          alert("出生日應該在 1-31 之間");
          return false;
        }	
        myForm.submit();					
      }
    </script>			
  </head>
  <body>
  <div align="center"><img src="/fcu/images/titlelogo.jpg" width="1000" height="157" /></div>    

  <p align="center"><img src="modify.jpg"></p>
    <form name="myForm" method="post" action="update.php" >
      <table border="2" align="center" bordercolor="#6666FF">
        <tr> 
          <td colspan="2" bgcolor="#6666FF" align="center"> 
            <font color="#FFFFFF">aaa請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*使用者帳號：</td>
          <td><?php echo $row["account"] ?></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*使用者密碼：</td>
          <td> 
            <input type="password" name="password" size="15" value="<?php echo $row["password"] ?>">
            (請使用英文或數字鍵，勿使用特殊字元)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*密碼確認：</td>
          <td>
            <input type="password" name="re_password" size="15" value="<?php echo $row["password"] ?>">
            (再輸入一次密碼，並記下您的使用者名稱與密碼)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*姓名：</td>
          <td><input type="text" name="name" size="8" value="<?php echo $row["name"] ?>"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*性別：</td>
          <td> 
            <input type="radio" name="sex" value="男" checked>男 
            <input type="radio" name="sex" value="女">女
          </td>
        </tr>   
        <tr bgcolor="#99FF99"> 
          <td align="right">*生日：</td>
          <td>公元
            <input type="text" name="year" size="4" value="<?php echo GetYear($row["birthday"]) ?>">年 
            <input type="text" name="month" size="2" value="<?php echo GetMonth($row["birthday"]) ?>">月 
            <input type="text" name="day" size="2" value="<?php echo GetDay($row["birthday"]) ?>">日
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">電話：</td>
          <td> 
            <input type="text" name="telephone" size="20" value="<?php echo $row["telephone"] ?>">
            (依照 (02) 2311-3836 格式 or (04) 657-4587)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">行動電話：</td>
          <td> 
            <input type="text" name="cellphone" size="20" value="<?php echo $row["cellphone"] ?>">
            (依照 (0922) 302-228 格式)
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">地址：</td>
          <td><input type="text" name="address" size="45" value="<?php echo $row["address"] ?>"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">E-mail 帳號：</td>
          <td><input type="text" name="email" size="30" value="<?php echo $row["email"] ?>"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">個人網站：</td>
          <td><input type="text" name="url" size="40" value="<?php echo $row["url"] ?>"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">備註：</td>
          <td><textarea name="comment" rows="4" cols="45"><?php echo $row["comment"] ?></textarea></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td colspan="2" align="CENTER"> 
            <input type="button" value="修改資料" onClick="check_data()">
            <input type="reset" value="重新填寫">
          </td>
        </tr>
      </table>
    </form>
    <div align="center"><img src="/fcu/images/footer_LOGOS.jpg" width="1000" height="100%" /></div>    

  </body>
</html>
<?php
    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
  }
?>