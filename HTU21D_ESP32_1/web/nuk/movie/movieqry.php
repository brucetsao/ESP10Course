<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	$sid = $_GET["sid"] ;
      $qry = "select * from fcu.Vmovie where mid = '%s' " ;   //學歷檔的外來鍵 的SQL
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
    <form action="movieedtdb.php" method="POST" name="form1" target="_self" id="form1">
        <table align="center" border='1'>
            <tr>
                <td width="24%">電影編號</td>
                <td width="76%"><label for="textfield"></label>
                  <?php echo $row0["mid"]; ?>
                </td>
            </tr>
            <tr>
                <td>檔期</td>
                <td>
                <?php echo $row0["name"]; ?>
                
                </td>
            </tr>
            <tr>
                <td width="24%">導演</td>
                <td width="76%"><label for="textfield"></label>
                <?php echo $row0["director"]; ?>
                </td>
            </tr>
            <tr>
                <td width="24%">播映時間長度</td>
                <td width="76%"><label for="textfield"></label>
                <?php echo $row0["duration"]; ?>
                </td>
            </tr>            
            <tr>
                <td width="24%">演員</td>
                <td width="76%"><label for="textfield"></label>
                <?php echo $row0["actor"]; ?>
                </td>
            </tr> 
            <tr>
                <td>語言</td>
                <td>
                <?php echo $row0["language"]; ?>
                </td>
            </tr>            
            <tr>
                <td>電影名稱</td>
                <td>
                <?php echo $row0["mName"]; ?>                 
                </td>
            </tr>
            <tr>
                <td>電影類型</td>
                <td>
                <?php echo $row0["mtype"]; ?>
                </td>
            </tr>             
            <tr>
                <td>電影介紹</td>
                <td>
                <?php echo str_replace("\n","<br>",$row0["introduction"]); ?>
                </td>
            </tr>
            <tr>
                <td>播映日期</td>
                <td>
                <?php echo $row0["playstartdate"]; ?>
                </td>
            </tr>            
            <tr>
                <td>分級</td>
                <td>
                <?php echo $row0["grading"]; ?>
                </td>
            </tr>

        </table>

    </form>
    <input type="button" onclick="history.back()" value="BACK(回到上一頁)">
    <?php include '../footer.php' ; ?>
</body>

</html>