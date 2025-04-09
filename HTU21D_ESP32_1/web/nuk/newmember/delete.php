<?php
session_start();
//檢查 cookie 中的 passed 變數是否等於 TRUE
//檢查 session 中的 loginok 變數是否等於 1 

  $passed =  $_SESSION['loginok'] ;
	
  /*  如果 cookie 中的 passed 變數不等於 TRUE，
      表示尚未登入網站，將使用者導向首頁 index.html */
  if ($passed != "1")
  {
    header("location:index.html");
    exit();
  }
	
  /*  如果 cookie 中的 passed 變數等於 TRUE，
      表示已經登入網站，將使用者的帳號刪除 */	
  else
  {
    include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
    //	Connection() ;
      //建立資料連接
    $link=Connection();		//產生mySQL連線物件
    
		
    $id = $_SESSION['usrid']
		
  
				
    //刪除帳號
     $sql = "delete from fcu.users Where id = %d";
      // 上面放標準SQL語法的命令 ，並把要比較的內容，用%s，%d...方法填入
      $qrystr = sprintf($sql,$id) ;
      //把要比較的內容，用sprintf()，用變數方法填入
     $result=mysqli_query($link,$qrystr);		//執行sql語法       
      //執行sql語法  
		
    //簡潔寫法，抓到第一筆的資料列並傳回
    //關閉資料連接
    mysqli_close($link);
    $_SESSION['loginok']  = "0" ;
    //將session設為登出
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>刪除會員資料成功</title>
  </head>
  <body bgcolor="#FFFFFF">
    <p align="center"><img src="erase.jpg"></p>
    <p align="center">
      您的資料已從本站中刪除，若要再次使用本站台服務，請重新申請，謝謝。
    </p>
    <p align="center"><a href="index.php">回首頁</a></p>
  </body>
</html>