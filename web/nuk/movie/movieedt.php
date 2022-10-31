<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	$sid = $_GET["sid"] ;
      $qry = "select * from fcu.movie where mid = '%s' " ;   //學歷檔的外來鍵 的SQL
      $sel1str1 = "select * from fcu.schedule where 1 order by id asc " ;   //學歷檔的外來鍵 的SQL
      $sel1str2 = "select * from fcu.language where 1 order by id asc " ;   //學歷檔的外來鍵 的SQL
      $sel1str3 = "select * from fcu.movietype where 1 order by mtype asc " ;   //學歷檔的外來鍵 的SQL
      $sel1str4 = "select * from fcu.gradetype where 1 order by gid asc " ;   //學歷檔的外來鍵 的SQL
      $sel1option = "<option value=%s>%s</option>" ;
      $seled1option = "<option value=%s selected>%s</option>" ;
      $result1 = mysqli_query($link,$sel1str1);		//將dhtdata的資料找出來(只找最後5
      $result2 = mysqli_query($link,$sel1str2);		//將dhtdata的資料找出來(只找最後5
      $result3 = mysqli_query($link,$sel1str3);		//將dhtdata的資料找出來(只找最後5
      $result4 = mysqli_query($link,$sel1str4);		//將dhtdata的資料找出來(只找最後5
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
        <table align="center">
            <tr>
                <td width="24%">電影編號</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="hidden" name="sid" value="<?php echo $sid;?>" />
                    <?php echo $row0["mid"]; ?>
                </td>
            </tr>
            <tr>
                <td>檔期</td>
                <td>
                    <select name="s1">
                        <?php
                         if($result1!==FALSE)	//判斷是否有資料
                            {
                                while($row1 = mysqli_fetch_array($result1)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
                                {

                                   if ($row0["schedule"]==$row1["id"])
                                   {
                                        echo sprintf($seled1option,$row1["id"],$row1["name"]) ;
                                   
                                   }
                                   else
                                   {
                                    echo sprintf($sel1option,$row1["id"],$row1["name"]) ;

                                   }

                                }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="24%">導演</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t2" id="t2" value="<?php echo $row0["director"];?>"/>
                </td>
            </tr>
            <tr>
                <td width="24%">播映時間長度</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t3" id="t3" value="<?php echo $row0["duration"];?>"/>
                </td>
            </tr>            
            <tr>
                <td width="24%">導演</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t4" id="t4" value="<?php echo $row0["actor"];?>"/>
                </td>
            </tr> 
            <tr>
                <td>語言</td>
                <td>
                    <select name="s2">
                        <?php
                         if($result2!==FALSE)	//判斷是否有資料
                            {
                                while($row2 = mysqli_fetch_array($result2)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
                                {

                                    if ($row0["schedule"]==$row2["id"])
                                    {
                                        echo sprintf($seled1option,$row2["id"],$row2["language"]) ;
                                    
                                    }
                                    else
                                    {
                                        echo sprintf($sel1option,$row2["id"],$row2["language"]) ;
 
                                    }                                   

                                    }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>            
            <tr>
                <td>電影名稱</td>
                <td><input type="text" name="t5" id="t5" value="<?php echo $row0["mName"];?>"/></td>
            </tr>
            <tr>
                <td>電影類型</td>
                <td>
                    <select name="s3">
                        <?php
                         if($result3!==FALSE)	//判斷是否有資料
                            {
                                while($row3 = mysqli_fetch_array($result3)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
                                {

                                    if ($row0["schedule"]==$row3["id"])
                                    {
                                        echo sprintf($seled1option,$row3["id"],$row3["mtype"]) ;
                                    
                                    }
                                    else
                                    {
                                        echo sprintf($sel1option,$row3["id"],$row3["mtype"]) ;
 
                                    }                                       

                                    }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>             
            <tr>
                <td>電影介紹</td>
                <td>
                <textarea name="t6" rows="5" cols="80"  form="form1"><?php echo $row0["introduction"];?></textarea>
                </td>
            </tr>
            <tr>
                <td>播映日期</td>
                <td><input type="text" name="t7" id="t7"  value="<?php echo $row0["playstartdate"];?>"/></td>
            </tr>            
            <tr>
                <td>分級</td>
                <td>
                    <select name="s4">
                        <?php
                         if($result4!==FALSE)	//判斷是否有資料
                            {
                                while($row4 = mysqli_fetch_array($result4)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
                                {

                                    if ($row0["schedule"]==$row4["gid"])
                                    {
                                        echo sprintf($seled1option,$row4["gid"],$row4["gname"]) ;
                                    
                                    }
                                    else
                                    {
                                        echo sprintf($sel1option,$row4["gid"],$row4["gname"]) ;
 
                                    }                                      

                                }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="reset" name="button" id="button" value="重設" />
                    <input type="submit" name="button2" id="button2" value="送出" />
                </td>
            </tr>
        </table>

    </form>

    <?php include '../footer.php' ; ?>
</body>

</html>