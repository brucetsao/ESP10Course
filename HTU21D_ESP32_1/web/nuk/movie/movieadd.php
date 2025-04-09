<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
      $sel1str1 = "select * from fcu.schedule where 1 order by id asc " ;   //學歷檔的外來鍵 的SQL
      $sel1str2 = "select * from fcu.language where 1 order by id asc " ;   //學歷檔的外來鍵 的SQL
      $sel1str3 = "select * from fcu.movietype where 1 order by mtype asc " ;   //學歷檔的外來鍵 的SQL
      $sel1str4 = "select * from fcu.gradetype where 1 order by gid asc " ;   //學歷檔的外來鍵 的SQL
      $sel1option = "<option value=%s>%s</option>" ;
      $result1 = mysqli_query($link,$sel1str1);		//將dhtdata的資料找出來(只找最後5
      $result2 = mysqli_query($link,$sel1str2);		//將dhtdata的資料找出來(只找最後5
      $result3 = mysqli_query($link,$sel1str3);		//將dhtdata的資料找出來(只找最後5
      $result4 = mysqli_query($link,$sel1str4);		//將dhtdata的資料找出來(只找最後5
      
      ?>
<!DOCTYPE html>
<html>

<head>
    <title>新增電影基本資料</title>

</head>

<body>
    <?php include '../title.php' ; ?>
    <input type="button" onclick="history.back()" value="BACK(回到上一頁)">
    </input>
    <form action="movieadddb.php" method="POST" name="form1" target="_self" id="form1">
        <table align="center">
            <tr>
                <td width="24%">電影編號</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t1" id="t1" />
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

                                   
                                    echo sprintf($sel1option,$row1["id"],$row1["name"]) ;

                                    }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="24%">導演</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t2" id="t2" />
                </td>
            </tr>
            <tr>
                <td width="24%">播映時間長度</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t3" id="t3" />
                </td>
            </tr>            
            <tr>
                <td width="24%">播映時間長度</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t4" id="t4" />
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

                                   
                                    echo sprintf($sel1option,$row2["id"],$row2["language"]) ;

                                    }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>            
            <tr>
                <td>電影名稱</td>
                <td><input type="text" name="t5" id="t5" /></td>
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

                                   
                                    echo sprintf($sel1option,$row3["id"],$row3["mtype"]) ;

                                    }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>             
            <tr>
                <td>電影介紹</td>
                <td>
                <textarea name="t6" rows="5" cols="80"  form="form1"></textarea>
                </td>
            </tr>
            <tr>
                <td>播映日期</td>
                <td><input type="text" name="t7" id="t7" /></td>
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

                                   
                                    echo sprintf($sel1option,$row4["gid"],$row4["gname"]) ;

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