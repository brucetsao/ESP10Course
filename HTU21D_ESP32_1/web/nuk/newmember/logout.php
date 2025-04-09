<?php
 session_start();
 //檢查 cookie 中的 passed 變數是否等於 "1"
 //檢查 session 中的 loginok 變數是否等於 1 
 $_SESSION['loginok'] = "0";
 //登錄成功與否  0=fail, 1= success

$_SESSION['usr']= "";		//取出使用者帳號
$_SESSION['username']="";		//取出使用者名稱
$_SESSION['usrid']=  "";		//取出使用者ID
	
  //將使用者導回主網頁
  header("location:index.php");
  exit();
?>