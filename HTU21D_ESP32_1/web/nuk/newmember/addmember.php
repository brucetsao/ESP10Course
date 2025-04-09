<?php


include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
//	Connection() ;
  //建立資料連接
$link=Connection();		//產生mySQL連線物件

  
  //取得表單資料
  $account = $_POST["account"];
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


			
  //檢查帳號是否有人申請
  $qrystr = "SELECT * FROM fcu.users Where account = '$account'";
  $result=mysqli_query($link,$qrystr);		//執行sql語法 
  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
		
    //顯示訊息要求使用者更換帳號名稱
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號沒人使用
  else
  {
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //執行 SQL 命令，新增此帳號
    /*
    $sql = "INSERT INTO users (account, password, name, sex, 
            year, month, day, telephone, cellphone, address,
            email, url, comment) VALUES ('$account', '$password', 
            '$name', '$sex', $year, $month, $day, '$telephone', 
            '$cellphone', '$address', '$email', '$url', '$comment')";
    */
    $sql = "insert into fcu.users (account, password, name, sex,birthday, telephone, cellphone, address,email, url, comment) values ('%s', '%s', '%s', '%s', '%d-%d-%d', '%s', '%s', '%s', '%s', '%s', '%s')";
    $qrystr = sprintf($sql,$account,$password,$name,$sex,$year, $month, $day,$telephone,$cellphone, $address, $email, $url, $comment) ;

    $result=mysqli_query($link,$qrystr);		//執行sql語法 
  }
	
  //關閉資料連接	
  mysqli_close($link);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>新增帳號成功</title>
  </head>
  <body bgcolor="#FFFFFF">
  <div align="center"><img src="/fcu/images/titlelogo.jpg" width="1000" height="157" /></div>    
     
    <p align="center"><img src="Success.jpg">       
    <p align="center">恭喜您已經註冊成功了，您的資料如下：（請勿按重新整理鈕）<br>
      帳號：<font color="#FF0000"><?php echo $account ?></font><br>
      密碼：<font color="#FF0000"><?php echo $password ?></font><br>       
      請記下您的帳號及密碼，然後<a href="index.php">登入網站</a>。
    </p>
    <div align="center"><img src="/fcu/images/footer_LOGOS.jpg" width="1000" height="100%" /></div>    

  </body>
</html>