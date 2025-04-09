<!DOCTYPE html>
<html>

<head>
    <title>APP Developer 全端開發工程師養成班</title>

</head>

<body>
    <?php include '../title.php' ; ?>
    <input type="button" onclick="history.back()" value="BACK(回到上一頁)">
    </input>
    <form action="memberadd.php" method="POST" name="form1" target="_self" id="form1">
        <table align="center">
            <tr>
                <td width="24%">帳號名稱</td>
                <td width="76%"><label for="textfield"></label>
                    <input type="text" name="textfield" id="textfield" />
                </td>
            </tr>
            <tr>
                <td>姓名</td>
                <td><input type="text" name="textfield2" id="textfield2" /></td>
            </tr>
            <tr>
                <td>性別</td>
                <td>
                    <select name="select1">
                        <option value=-1>請選擇你的性別</option>
                        <option value=1 selected>男生</option>
                        <option value=0>女生</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>學歷</td>
                <td>&nbsp;</td>
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