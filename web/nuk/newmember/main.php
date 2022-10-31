<?php
  session_start();
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_SESSION['loginok'];
	
  /*  如果 cookie 中的 passed 變數不等於 TRUE
      表示尚未登入網站，將使用者導向首頁 index.html	*/
  if ($passed != "1")
  {
    header("location:index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>會員管理</title>
    <meta charset="utf-8">
  </head>
  <body>
  <div align="center"><img src="/fcu/images/titlelogo.jpg" width="1000" height="100%" /></div>

    <p align="center"><img src="management.jpg"></p>
    <p align="center">
      <a href="modify.php">修改會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="delete.php">刪除會員資料</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="logout.php">登出網站</a>
    </p>
    <div align="center"><img src="/fcu/images/titlelogo.jpg" width="1000" height="100%" /></div>
  </body>
</html>