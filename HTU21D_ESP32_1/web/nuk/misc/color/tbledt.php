<?php session_start();?>
<?php
//SELECT * FROM fcu.user WHERE id = 1
//SELECT * FROM fcu.user WHERE id = %d ;
include("../comlib.php");		//使用資料庫的呼叫程式
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
    //	Connection() ;
$link=Connection();		//產生mySQL連線物件

$sid = $_GET["sid"] ;

$qry1 = "select * from fcu.user where id = %d ;" ;		//SQL填空
$qrystr = sprintf($qry1,$sid) ;		// 組立要執行的SQL語法
//echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
if($result!==FALSE)
{
    while($row = mysqli_fetch_array($result)) 
    {
        $f1 = $row["id"] ;
        $f2 = $row["user"] ;
        $f3 = $row["username"] ;
        $f4 = $row["pwd"] ;
        $f5 = $row["email"] ;
    }
}         
mysqli_close($link);		// 關閉連線
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
    <form action="dbedt.php" method="POST">
        <table align="center">
            <tr>
                <td>
                    帳號
                </td>
                <td>
                    <input type="hidden" name="sid"  value = <?php echo $sid ; ?>>
                    <input type="text" name="usr" size="20" value = <?php echo $f2; ?>>
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    名字
                </td>
                <td>
                    <input type="text" name="usrname"  size="40"value = <?php echo $f3; ?> >
                </td>
            </tr>
            <tr>
                <td>
                    密碼
                </td>
                <td>
                    <input type="text" name="pwd"  size="20" value = <?php echo $f4; ?>>
                </td>
            </tr>
            <tr>
                <td>
                    密碼(重複輸入)
                </td>
                <td>
                    <input type="text" name="pwd1"  size="20" value = <?php echo $f4; ?>>
                </td>
            </tr>
            <tr>
                <td>
                    電子郵件
                </td>
                <td>
                    <input type="text" name="mail"  size="120" value = <?php echo $f5; ?>>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="reset" name="清除">
                </td>
                <td align="center">
                    <input type="submit" name="送出">
                </td>
            </tr>

        </table>

    </form>

    <?php include '../footer.php' ; ?>
</body>

</html>