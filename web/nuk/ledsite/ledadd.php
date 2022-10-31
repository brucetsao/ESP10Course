<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	$sid = $_GET["sid"] ;
      $qry = "select * from fcu.VLedsite where id = %d " ;   //學歷檔的外來鍵 的SQL
      $qrystr = sprintf($qry,$sid ) ;
      $result0 = mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
	  $row0 = mysqli_fetch_array($result0) ;
      //抓到movie的資料一筆，並把資料丟到$row0[".....] ;丟到$row0[".....] ;
      ?>
<!DOCTYPE html>
<html>

<head>
    <title>編修電影基本資料</title>

</head>

<body>
    <?php include '../title.php' ; ?>
    <input type="button" onclick="history.back()" value="BACK(回到上一頁)">
    </input>
    <form action="genlightdata.php" method="POST" name="form1" target="_self" id="form1">
        <table align="center">
            <tr>
                <td width="24%">編號</td>
                <td width="76%"><label for="textfield"></label>
                    <?php echo $row0["id"]; ?>
                    <input type="hidden" name="sid" id="sid" value="<?php echo $sid;?>"/>
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
            <tr>
                <td width="24%">層數</td>
                <td width="76%"><label for="textfield"></label>
                <?php echo $row0["level"]; ?>
                </td>
            </tr>   
            <tr>
                <td width="24%">數量</td></td>
                <td width="76%"><label for="textfield"></label>
                <?php echo $row0["amount"]; ?>
                </td>
            </tr>                                 
            <tr>
                <td width="24%">產生開始號碼</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t1" id="t1" value="1"/>
                </td>
            </tr> 
            <tr>
                <td width="24%">產生結束號碼</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t2" id="t2" value="<?php echo $row0["amount"];?>"/>
                </td>
            </tr> 

            <tr>
                <td colspan="2" align="center"><input type="reset" name="button" id="button" value="重設" />
                    <input type="submit" name="button2" id="button2" value="產生光明燈" />
                </td>
            </tr>
        </table>

    </form>

    <?php include '../footer.php' ; ?>
</body>

</html>