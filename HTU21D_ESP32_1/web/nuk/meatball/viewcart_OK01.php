<?php
	session_start();		//必須要用這段，方能使用session的所有功能

//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

?>
<!DOCTYPE html>
      <html>
        <head>
          <title>檢視購物車</title>
       <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
      </head>
        <body>
		<?php include '../title.php' ; ?>
<table border="1"  align = center cellspacing="1" cellpadding="1">		
	<tr><td align ="center">序號</td><td align ="center">產品名稱</td><td align ="center">產品圖片</td><td align ="center">價格</td><td align ="center">數量</td></tr>

<?php
$qry = "select * from fcu.Vitems where id = %d ;" ;		//SQL填空

//$result=mysqli_query($link,$qrystr);	


//$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
//執行抓資料的SQL敘述
?>
<?php	
$cnt = 1 ;
//$goddata = "<tr><td>%s</td><td>%s</td><form id='form1' name='form1' method='post' action='balling.php?sid=%s'  target = '_self'><p><div align = 'center'><img src='/fcu/images/meatball/%s' width='300' height='300' /></div></p><div align = 'center'><p>肉圓名稱:%s</p></div><div align = 'center'><p>價格:%s</p></div><div align = 'center'><p><input type='number' id='num' name='num' value='0' min='0' max='100'></p></div><div align = 'center'><input type='submit' name='button' id='button' value='加入購物車' /></div></p></form></td></tr>\n" ;
$goddata = "<tr><td>%s</td><td>%s</td><td><div align = 'center'><img src='/fcu/images/meatball/%s' width='80' height='80' /></div></td><td>%s</td><td><input type='number' name='n1' value='%s'></td></tr>\n" ;


foreach($_SESSION['itemlist'] as $x)
{
 //   foreach($x as $y)
 //   {
		$qrystr = sprintf($qry,$x[1]) ;
		$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
		$row = mysqli_fetch_array($result) ;
		$goddatastr = sprintf($goddata,$x[0],$row["name"],$row["pic"],$row["price"],$x[2]) ;
        echo $goddatastr;
 //   }
  //  echo "---------------<br>" ;

}



 mysqli_free_result($result);	// 關閉資料集

 mysqli_close($link);		// 關閉連線
?>
	</table>
	<?php include '../footer.php' ; ?>	
	</body>
</html>

<script>
// 這一區
// php would run before javascript
// better solution to catch error
// ajax request in led.php request for this lamp.php than handle alert() based on callback
//window.location = '/fcu/movie/movielist.php'
</script>";