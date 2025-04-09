<?php session_start();?>
<?php
//SELECT * FROM fcu.user WHERE id = 1
//SELECT * FROM fcu.user WHERE id = %d ;
include("../comlib.php");		//使用資料庫的呼叫程式
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
    //	Connection() ;
$link=Connection();		//產生mySQL連線物件
$sel1str = "select * from fcu.diplomatype where 1 order by id asc " ;   //學歷檔的外來鍵 的SQL
$sel1option1 = "<option value=%s selected>%s/%s</option>" ;
$sel1option2 = "<option value=%s>%s/%s</option>" ;

$sid = $_GET["sid"] ;

$result1 = mysqli_query($link,$sel1str);		//將dhtdata的資料找出來(只找最後5
$qry1 = "select * from fcu.membera where id = %d ;" ;		//SQL填空
$qrystr = sprintf($qry1,$sid) ;		// 組立要執行的SQL語法
//echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
$row = mysqli_fetch_array($result) ;
      
//mysqli_close($link);		// 關閉連線
?>
<!DOCTYPE html>
<html>

<head>
    <title>網路使用者編修</title>

</head>

<body>
    <?php include '../title.php' ; ?>
    <input type ="button" onclick="history.back()" value="BACK(回到上一頁)">
</input>   
    <form action="memberedtdb.php?sid=<?php echo $sid;?>" method="POST">

    <table align="center">
            <tr>
                <td width="24%">帳號名稱<input type="hidden" name="sid"  value="<?php echo $sid;?>" /></td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="usr" id="usr" value="<?php echo $row["username"];?>" />
                </td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="usrname" id="usrname" value="<?php echo $row["name"];?>"/></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <select name="sex">
                        <option value=1 <?php if ($row["sex"]==1) echo "selected";?>>男生</option>
                        <option value=0 <?php if ($row["sex"]!=1) echo "selected";?>>女生</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>學歷</td>
                <td>
                    <select name="diploma">
                        <?php
                         if($result1!==FALSE)	//判斷是否有資料
                            {
                                while($row1 = mysqli_fetch_array($result1)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
                                {
                                    if ($row["diploma"] == $row1["id"])
                                    {
                                        //sel1option1
                                        echo sprintf($sel1option1,$row1["id"],$row1["degree"], $row1["degreeename"]) ;
                                    }
                                    else
                                     {
                                         //sel1option2
                                         echo sprintf($sel1option2,$row1["id"],$row1["degree"], $row1["degreeename"]) ;
                                        
                                        
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