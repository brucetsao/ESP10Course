<?php
session_start();
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
//	Connection() ;
  //建立資料連接
$link=Connection();		//產生mySQL連線物件

  
  header("Content-type: text/html; charset=utf-8");
	
  //取得表單資料
  $account = $_POST["account"]; 	
  $password = $_POST["password"];


					
  //檢查帳號密碼是否正確
  $sql = "select * from fcu.users Where account = '%s' AND password = '%s'";
    // 上面放標準SQL語法的命令 ，並把要比較的內容，用%s，%d...方法填入
  $qrystr = sprintf($sql,$account,$password) ;
  echo $qrystr."<br>";
   //把要比較的內容，用sprintf()，用變數方法填入
  $result=mysqli_query($link,$qrystr);		//執行sql語法 
  //如果帳號密碼錯誤
  if (mysqli_num_rows($result) == 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
	
    //關閉資料連接	
    mysqli_close($link);
		
    //顯示訊息要求使用者輸入正確的帳號密碼
    echo "<script type='text/javascript'>";
    echo "alert('帳號密碼錯誤，請查明後再登入');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號密碼正確
  else
  {
    //取得 id 欄位
    while($row = mysqli_fetch_array($result)) 
    {
      $id = $row["id"] ;
      $account = $row["account"] ;
      $pwd = $row["password"] ;
      $name = $row["name"] ;
      // $account = mysqli_fetch_object($result)->account;
      //  $pwd = mysqli_fetch_object($result)->password;
      //  $name = mysqli_fetch_object($result)->name;
    }
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //關閉資料連接	
    mysqli_close($link);

    //將使用者資料加入 cookies
    $_SESSION['loginok'] = "1";
    $_SESSION['usrid'] = $id; 
    $_SESSION['usr'] = $account ;
    $_SESSION['username'] = $name ;
    //header("location:main.php");		
  }
?>

<script>
// 這一區
	// php would run before javascript
	// better solution to catch error
	window.location = 'main.php'
</script>";
