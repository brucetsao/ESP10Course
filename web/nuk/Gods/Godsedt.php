<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	$sid = $_GET["sid"] ;
      $seloption = "<option value=%s>%s</option>" ;	
      $seledoption = "<option selected value=%s>%s</option>" ;	
	$qry0 = "select * from fcu.Vgods where id = %d order by name asc ;" ;  
	$sel1str1 = "select * from fcu.temple where 1 order by name asc ;";
    $result1 = mysqli_query($link,$sel1str1);		//將dhtdata的資料找出來(只找最後5     
      $qrystr0 = sprintf($qry0,$sid ) ;
      $result0 = mysqli_query($link,$qrystr0);		//將dhtdata的資料找出來(只找最後5	
	  $row0 = mysqli_fetch_array($result0) ;

	  
      ?>
<!DOCTYPE html>
<html>

<head>
    <title>編修神明基本資料</title>

</head>

<body>
    <?php include '../title.php' ; ?>
    <input type="button" onclick="history.back()" value="BACK(回到上一頁)">
    </input>
	<form action="Godsedtdb.php" method="post" enctype="multipart/form-data">
        <table align="center">
            <tr>
                <td width="24%">名字<input type="hidden" name="sid" id="sid" value='<?php echo $sid;?>' /></td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t1" id="t1" value='<?php echo $row0["name"];?>' />
                </td>
            </tr>
            <tr>
                <td>位置</td>
                <td>
                    <select name="s1">
                        <?php
                         if($result1!==FALSE)	//判斷是否有資料
                            {
                                while($row1 = mysqli_fetch_array($result1)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
                                {
									if ($row1["id"] == $row0["location"])
									{
										echo sprintf($seledoption,$row1["id"],$row1["name"]) ;
									}
									else
									{
										
										echo sprintf($seloption,$row1["id"],$row1["name"]) ;

                                    }// 會跳下一列資料
								}
                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="24%"><img src='../images/god/<?php echo $row0["pic"];?>' alt='%s' width='150' ></td>
                <td width="76%"><label for="textfield"></label>
                    <input type="file" name="file"/><hr/>
                </td>
            </tr>
                <td colspan="2" align="center"><input type="reset" name="button" id="button" value="重設" />
                    <input type="submit" name="button2" id="button2" value="送出" />
                </td>
            </tr>
        </table>

    </form>

    <?php include '../footer.php' ; ?>
</body>

</html>