<?php
//使用foreach迴圈顯示伺服器的所有變數值，如下所示：
echo "<table border='1'>" ;
foreach ($_SERVER as $key=>$value) {
   echo "<tr><td>" . $key . "</td>";
   echo "<td>" . $value . "</td></tr>";
}

echo "</table>" ;

?>