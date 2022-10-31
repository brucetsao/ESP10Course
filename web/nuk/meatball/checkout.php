<?php
	session_start();		//必須要用這段，方能使用session的所有功能

//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $sn = $_POST["sn"] ;
	  $mid = $_POST["mid"] ;
	  $name = $_POST["name"] ;
	  $price = $_POST["price"] ;
	  $number = $_POST["number"] ;




$qry1 = "select *  from fcu.members where id = %d;" ;
$qrystr1 = sprintf($qry1,$_SESSION['usrid']) ;
$result1=mysqli_query($link,$qrystr1);		//將dhtdata的資料找出來(只找最後5
$row1 = mysqli_fetch_array($result1) ;


?>
<!DOCTYPE html>
      <html>
        <head>
          <title>購物車付款</title>
       <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
      </head>
        <body>
		<?php include '../title.php' ; ?>

<form name='form1' method='post'  action='billing.php'>		
<table border="1"  align = 'center' cellspacing="1" cellpadding="1" width = "80%">		
<tr>
	<td>
		客戶名稱<input type='hidden' name='mmeberid' value='<?php echo $_SESSION['usrid'];?>'/>
	</td>
	<td>
		 <?php echo $_SESSION['username']."(".$_SESSION['usr'].")"; ?>
	</td>
</tr>
<tr>
	<td>
		收貨人名稱
	</td>
	<td>
		<input type='TEXT' name='mmebername' value = <?php echo $_SESSION['username'];?> />
	</td>
</tr>
<tr>
	<td>
		收貨人電話
	</td>
	<td>
		<input type='TEXT' name='tel' value = <?php echo $row1["phone"];?> />
	</td>
</tr>
<tr>
	<td>
		收貨人地址
	</td>
	<td>
		<input type='TEXT' name='address' value = <?php echo $row1["address"];?>  />
	</td>
</tr>
<tr>
	<td>
		付款方式
	</td>
	<td>
		<select name="payway" id="payway" >
			<option value="01" selected >現金</option>
			<option value="02">電子支付</option>
			<option value="03">信用卡</option>
			<option value="04">Line Pay</option>
		</select>
	</td>
</tr>

</table>
<table border="1"  align = 'center' cellspacing="1" cellpadding="1"  width = "80%">		
	<tr><td align ="center">序號</td><td align ="center">產品名稱</td><td align ="center">產品圖片</td><td align ="center">價格</td><td align ="center">數量</td><td align ="center">金額</td></tr>

<?php
$qry = "select * from fcu.Vitems where id = %d ;" ;		//SQL填空

//$result=mysqli_query($link,$qrystr);	


//$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
//執行抓資料的SQL敘述
?>
<?php	
/*
	  $sn = $_POST["sn"] ;
	  $mid = $_POST["mid"] ;
	  $name = $_POST["name"] ;
	  $price = $_POST["price"] ;
	  $number = $_POST["number"] ;
*/


$cnt = 1 ;
//$goddata = "<tr><td>%s</td><td>%s</td><form id='form1' name='form1' method='post' action='balling.php?sid=%s'  target = '_self'><p><div align = 'center'><img src='/fcu/images/meatball/%s' width='300' height='300' /></div></p><div align = 'center'><p>肉圓名稱:%s</p></div><div align = 'center'><p>價格:%s</p></div><div align = 'center'><p><input type='number' id='num' name='num' value='0' min='0' max='100'></p></div><div align = 'center'><input type='submit' name='button' id='button' value='加入購物車' /></div></p></form></td></tr>\n" ;
$goddata = "<tr><td>%s<input type='hidden' name='sn[]' value='%s'/></td><td>%s<input type='hidden' name='mid[]' value='%s'/></td><td><div align = 'center'><img src='/fcu/images/meatball/%s' width='80' height='80' /></div></td><td>%s<input type='hidden' name='price[]' value='%s'/></td><td><input type='hidden' name='number[]' value='%s'>%s</td><td>%s</td></tr>\n" ;
$amount = 0 ;
$count = 0 ;
foreach($sn as $x)
{
 //   foreach($x as $y)
 //   {
		$qrystr = sprintf($qry,$mid[$count]) ;
		$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
		$row = mysqli_fetch_array($result) ;
		$goddatastr = sprintf($goddata,$x,$x,$row["name"],$row["id"],$row["pic"],$price[$count],$price[$count],$number[$count],$number[$count],(int)$price[$count]*(int)$number[$count]) ;
        echo $goddatastr;
		$amount = $amount + (int)$price[$count]*(int)$number[$count] ;
		$count  = $count  +1 ;

 //   }
  //  echo "---------------<br>" ;

}



 mysqli_free_result($result);	// 關閉資料集

 mysqli_close($link);		// 關閉連線
?>
	</table>
<table border="1"  align = 'center' cellspacing="1" cellpadding="1"  width = "80%" >		
<tr>
	<td>
		未稅金額<input type='hidden' name='amount' value='<?php echo $amount;?>'/>
	</td>
	<td>
		<?php echo $amount; ?>
	</td>
</tr>
<tr>
	<td>
		稅金<input type='hidden' name='tax' value='<?php echo (int)$amount * 0.05;?>'/>
	</td>
	<td>
		<?php echo (int)($amount * 0.05); ?>
	</td>
</tr>
<tr>
	<td>
		總金額
	</td>
	<td><?php echo $amount+ (int)($amount * 0.05); ?>
	</td>
</tr>
</table>
<div align='center'><input type='submit' name='button' id='button' value='付款' /></div>
</form>	
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