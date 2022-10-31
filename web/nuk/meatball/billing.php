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
	  $price = $_POST["price"] ;
	  $number = $_POST["number"] ;




$qrystr1 = "select id from fcu.orders where 1 order by id desc limit 0,1;" ;
//$qrystr1 = sprintf($qry1,$_SESSION['usrid']) ;
echo $qrystr1."<br>";
$result1=mysqli_query($link,$qrystr1,);		//將dhtdata的資料找出來(只找最後5
$num=mysqli_num_rows($result1);
if ($num > 0)
{
	$row1 = mysqli_fetch_array($result1) ;
	$newid  = (int)$row1["id"] +1 ;
}
else
{
	$newid = 1 ;
} 

//insert into fcu.orders 
//(id, orderdate, mid, rname, rphone, raddress, pay, state, total, tax) values 
//(%d, '%s', %d, '%s', '%s', '%s', '%s', 1, %d, %d);

$qry2 = "insert into fcu.orders (id, orderdate, cusid, rname, rphone, raddress, pay, state, total, tax) values (%s, '%s', %s, '%s', '%s', '%s', '%s', 1, %s, %s);" ;
$qrtstr2 = sprintf($qry2 , $newid,getThisToday(),$_POST["mmeberid"],$_POST["mmebername"],$_POST["tel"],$_POST["address"],$_POST["payway"],$_POST["amount"],$_POST["tax"]) ;
$result2=mysqli_query($link,$qrtstr2,);		//將dhtdata的資料找出來(只找最後5
echo $qrtstr2."<br>";


$qry3 = "insert into fcu.orderlist ( mid, sn, itemid, price, qty, subtotal) values (%s , '%s', %s, %s, %s, %s);" ;		//SQL填空

//$result=mysqli_query($link,$qrystr);	


//$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
//執行抓資料的SQL敘述
?>
<?php	
/*
	  $sn = $_POST["sn"] ;
	  $mid = $_POST["mid"] ;
	  $price = $_POST["price"] ;
	  $number = $_POST["number"] ;

*/

echo "-------------------------------------------------------------<br>";

$cnt = 1 ;
$amount = 0 ;
$count = 0 ;
foreach($sn as $x)
{

		$qrystr3 = sprintf($qry3,$newid,$x, $mid[$count],$price[$count],$number[$count],$price[$count]*$number[$count]) ;
		$result3=mysqli_query($link,$qrystr3);		//將dhtdata的資料找出來(只找最後5
		echo $qrystr3."<br>";
		$count  = $count  +1 ;
}


echo "-------------------------------------------------------------<br>";

 mysqli_close($link);		// 關閉連線

 unset($_SESSION['itemamount']);
 unset($_SESSION['itemcount']);
 unset($_SESSION['itemlist']);

?>


<script>
// 這一區
// php would run before javascript
// better solution to catch error
// ajax request in led.php request for this lamp.php than handle alert() based on callback
window.location = '/fcu/meatball/balllist.php'
</script>"