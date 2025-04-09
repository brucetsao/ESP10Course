<?php
session_start();
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  //檢查 session 中的 loginok 變數是否等於 1 

  $passed = $_SESSION['loginok'] ;
	
  /* 如果 cookie 中的 passed 變數不等於 TRUE，
     表示尚未登入網站，將使用者導向首頁 index.html */
     if ($passed != "1")
  {
    header("location:index.php");
    exit();
  }
	
  /* 如果 cookie 中的 passed 變數等於 TRUE，
     表示已經登入網站，則取得使用者資料 */
  else
  {
    include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
    //	Connection() ;
      //建立資料連接
    $link=Connection();		//產生mySQL連線物件
    
	
    //取得 modify.php 網頁的表單資料
    $id = $_SESSION['usrid'];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $telephone = $_POST["telephone"];
    $cellphone = $_POST["cellphone"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $url = $_POST["url"];
    $comment = $_POST["comment"];
		
  				
    //執行 UPDATE 陳述式來更新使用者資料
    /*
    $sql = "UPDATE users SET password = '$password', name = '$name', 
            sex = '$sex', year = $year, month = $month, day = $day, 
            telephone = '$telephone', cellphone = '$cellphone', 
            address = '$address', email = '$email', url = '$url', 
            comment = '$comment' WHERE id = $id";
  */
  $sql = "UPDATE users SET password = '%s', name = '%s', sex = '%s', birthday = '%d-%d-%d',  telephone = '%s', cellphone = '%s', address = '%s', email = '%s', url = '%s', comment = '%s' WHERE id = %d";
  // 上面放標準SQL語法的命令 ，並把要比較的內容，用%s，%d...方法填入
  $qrystr = sprintf($sql,$password,$name,$sex,$year,$month,$day,$telephone,$cellphone,$address,$email,$url,$comment,$id) ;
   //把要比較的內容，用sprintf()，用變數方法填入
    //echo $qrystr."<br>" ;
    //UPDATE users SET password = '12345678', name = '曹 永忠', sex = '男', birthday = '1990-1-1', telephone = '048123456', cellphone = '0912345678', address = '員林郵局第36號信箱', email = 'prgbruce@gmail.com', url = 'http://', comment = '' WHERE id = 1
  // $result=mysqli_query($link,$qrystr);		//執行sql語法 

    //關閉資料連接
    mysqli_close($link);
  }		
?>
<!DOCTYPE html>
<html>
  <head>
    <title>修改會員資料成功</title>
    <meta charset="utf-8">
  </head>
  <body>
    <center>
      <img src="revise.jpg"><br><br>
      <?php echo $name ?>，恭喜您已經修改資料成功了。
      <p><a href="main.php">回會員專屬網頁</a></p>
    </center>        
  </body>
</html>