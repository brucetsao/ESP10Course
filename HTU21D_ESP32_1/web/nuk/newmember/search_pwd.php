<!DOCTYPE html> 
<html>
  <head>
    <meta charset="utf-8">
    <title>查詢密碼</title>
  </head>
  <body>
    <p align="center"><img src="inquire.jpg"></p>
    <p>請輸入您的姓名及 E-mail 帳號，並選擇一種顯示方式，然後按 [查詢] 鈕。</p>
    <form method="post" action="search.php" >
      <table align="center">
        <tr><td>帳號：</td>
          <td><input type="text" name="account" size="10"></td>
        </tr>
        <tr><td>電子郵件帳號：</td>
          <td><input type="text" name="email" size="30"></td>
        </tr>
        <tr><td>顯示方式：</td>
          <td>
            <select name="show_method">
              <option value="網頁顯示">網頁顯示</option>
              <option value="E-mail 傳送">E-mail 傳送</option>
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center"> 
            <input type="submit" value="查詢">　
            <input type="reset" value="重填">
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>