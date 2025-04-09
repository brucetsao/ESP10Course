<!DOCTYPE html>
<html>
  <head>
    <title>加入會員</title>
    <meta charset="utf-8">
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.account.value.length == 0)
        {
          alert("「使用者帳號」一定要填寫哦...");
          return false;
        }
        if (document.myForm.account.value.length > 10)
        {
          alert("「使用者帳號」不可以超過 10 個字元哦...");
          return false;
        }
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
    <p align="center"><img src="join.jpg"></p>
    <form action="addmember.php" method="post" name="myForm">
      <table border="2" align="center" bordercolor="#6666FF">
        <tr> 
          <td colspan="2" bgcolor="#6666FF" align="center"> 
            <font color="#FFFFFF">請填入下列資料 (標示「*」欄位請務必填寫)</font>
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*使用者帳號：</td>
          <td><input name="account" type="text" size="15">
          (請使用英文或數字鍵)</td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*使用者密碼：</td>
          <td><input name="password" type="password" size="15">
          (請使用英文或數字鍵)</td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">*密碼確認：</td>
          <td><input name="re_password" type="password" size="15">
          (再輸入一次密碼)</td>
        </tr>
        <tr bgcolor="#99FF99">
          <td align="right">*姓名：</td>
          <td><input name="name" type="text" size="8"></td>
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
            <input name="year" type="TEXT" size="3">年 
            <input name="month" type="TEXT" size="2">月 
            <input name="day" type="TEXT" size="2">日
          </td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">電話：</td>
          <td><input name="telephone" type="text" size="20"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">行動電話：</td>
          <td><input name="cellphone" type="text" size="20"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">地址：</td>
          <td><input name="address" type="text" size="45"></td>
        </tr>
        <tr bgcolor="#99FF99">
          <td align="right">E-mail 帳號：</td>
          <td><input name="email" type="text" size="30"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">個人網站：</td>
          <td><input name="url" type="text" value="http://" size="40"></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="right">備註：</td>
          <td><textarea name="comment" cols="45" rows="4" ></textarea></td>
        </tr>
        <tr bgcolor="#99FF99"> 
          <td align="center" colspan="2"> 
            <input type="button" value="加入會員" onClick="check_data()">
            <input type="reset" value="重新填寫">
          </td>
        </tr>
      </table>
    </form>
    <div align="center"><img src="/fcu/images/footer_LOGOS.jpg" width="1000" height="100%" /></div>    

  </body>
</html>