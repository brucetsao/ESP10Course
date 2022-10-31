<?php 
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>登錄網站</title>

</head>

<body>
    <?php include 'title.php' ; ?>
    <input type ="button" onclick="history.back()" value="BACK(回到上一頁)">
      
	  <form action="logouted.php" method="POST">
            <table align="center">
                <tr>
                    <td>
                        帳號
                    </td>
                    <td>
                        <input type="hidden" name="userid" values = <?php echo $_SESSION['usrid']; ?>>
                        <?php echo $_SESSION['usr']; ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        名字
                    </td>
                    <td>
                        <?php echo $_SESSION['username']; ?> 
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        
                    </td>
                    <td align="center">
                        <input type="submit" name="登出">
                    </td>
                </tr>

            </table>

        </form>

        <?php include 'footer.php' ; ?>
</body>

</html>