<!DOCTYPE html>
<html>

<head>
    <title>登錄網站</title>

</head>

<body>
    <?php include 'title.php' ; ?>
        <form action="checkpass.php" method="POST">
            <table align="center">
                <tr>
                    <td>
                        名字
                    </td>
                    <td>
                        <input type="text" name="fname">
                    </td>
                </tr>
                <tr>
                    <td>
                        密碼
                    </td>
                    <td>
                        <input type="password" name="pwd">
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
        <div align="center">
            <a href="./member/memberadd.php">註冊帳號</a>
        </div>
        <?php include 'footer.php' ; ?>
</body>

</html>