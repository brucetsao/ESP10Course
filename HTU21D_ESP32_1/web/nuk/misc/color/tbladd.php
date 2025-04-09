<!DOCTYPE html>
<html>

<head>
    <title>APP Developer 全端開發工程師養成班</title>

</head>

<body>
    <?php include '../../title.php' ; ?>
    <input type ="button" onclick="history.back()" value="BACK(回到上一頁)">
</input>    
    <form action="dbadd.php" method="POST">
        <table align="center">
            <tr>
                <td>
                    顏色代碼
                </td>
                <td>
                    <input type="text" name="f0" size="20">
                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    顏色名稱
                </td>
                <td>
                    <input type="text" name="f1"  size="40">
                </td>
            </tr>
            <tr>
                <td>
                    色卡
                </td>
                <td>
                    <input type="text" name="f2"  size="20">
                </td>
            </tr>
            <tr>
                <td>
                    色卡圖片
                </td>
                <td>
                    <input type="text" name="f3"  size="20">
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

    <?php include '../../footer.php' ; ?>
</body>

</html>