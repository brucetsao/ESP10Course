<?php session_start();
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
      $sel1option = "<option value=%s>%s</option>" ;	
	$sel1str1 = "select * from fcu.temple where 1 order by name asc ;";
    $result1 = mysqli_query($link,$sel1str1);		//將dhtdata的資料找出來(只找最後5     
	
	
      ?>
<!DOCTYPE html>
<html>

<head>
    <title>神明基本資料</title>

</head>

<body>
    <?php include '../title.php' ; ?>
    <input type="button" onclick="history.back()" value="BACK(回到上一頁)">
    </input>
	<form action="Godsadddb.php" method="post" enctype="multipart/form-data">
        <table align="center">
            <tr>
                <td width="24%">名字</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="t1" id="t1" />
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

                                   
                                    echo sprintf($sel1option,$row1["id"],$row1["name"]) ;

                                    }// 會跳下一列資料

                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="24%">選擇圖檔上傳</td>
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