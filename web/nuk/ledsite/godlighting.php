
<?php


//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $sid = $_GET["sid"]  ;
?>

<!DOCTYPE html>
      <html>
        <head>
          <title>點燈作業</title>
       <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
      </head>
        <body>
		<?php include '../title.php' ; ?>
   <table border="1"  align = center cellspacing="1" cellpadding="1">		

<?php

$qry1 = "select * from fcu.VLedsite where id = %d ;" ;		//SQL填空
$qry2 = "select * from fcu.Ledsitelist where siteid = %d order by no asc ;" ;		//SQL填空

//$result=mysqli_query($link,$qrystr);	
$qrystr1 = sprintf($qry1,$sid) ;
$qrystr2 = sprintf($qry2,$sid) ;
$result0=mysqli_query($link,$qrystr1);		//將dhtdata的資料找出來(只找最後5
$row0 = mysqli_fetch_array($result0) ;
$result=mysqli_query($link,$qrystr2);		//將dhtdata的資料找出來(只找最後5
//執行抓資料的SQL敘述
?>
        <table align="center">
            <tr>
                <td width="24%">編號</td>
                <td width="76%"><label for="textfield"></label>
                    <?php echo $row0["id"]; ?>

                </td>
            </tr>
            <tr>
                <td>主神</td>
                <td>
                <?php echo $row0["gname"]; ?>
                </td>
            </tr>
            <tr>
                <td width="24%">光明燈種類</td>
                <td width="76%"><label for="textfield"></label>
                    <?php echo $row0["lname"]; ?>
                </td>
            </tr>            
            <tr>
                <td width="24%">光明燈名字</td>
                <td width="76%"><label for="textfield"></label>
                    <?php echo $row0["ledname"]; ?>
                </td>
            </tr>
            <tr>
                <td width="24%">價格</td>
                <td width="76%"><label for="textfield"></label>
                <?php echo $row0["price"]; ?>
                </td>
            </tr>      
		</table>
<table align="center" border = "1">
<?php	
$cnt = 1 ;
$goddata = "<td><form id='form1' name='form1' method='post' action='lighting.php?sid=%d&gid=%d'><p><div align = 'center'><img src='/fcu/images/god/%d.jpg' width='150' height='195' /></div></p><div align = 'center'><p>%s</p></div><p>香主名稱<label for='textfield'></label><input type='text' name='t1' id='t1' value='%s' /></p><p>香主生辰<input type='text' name='t2' id='t2' value='%s'/></p><p><div align = 'center'><input type='submit' name='button' id='button' value='點燈' /></div></p></form></td>\n" ;

if($result!==FALSE)	//判斷是否有資料
{
 while($row = mysqli_fetch_array($result)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
 {
	if (($cnt % 4)== 1)
	{
		echo "<tr>" ;
	}
	$goddatastr = sprintf($goddata,$row["id"],$sid,$row0["godtype"],$row["no"],$row["donater"],$row["dbirthday"]) ;
	echo $goddatastr  ;
		if (($cnt % 4)== 0)
		{
			echo "</tr>" ;
		}
		$cnt =$cnt +1 ;
	}// 會跳下一列資料

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