
<table width="100%" border="1">
  <tr>
    <td align="center">Head 01</td>
    <td align="center">Head 02</td>
    <td align="center">Head 03</td>
    <td align="center">Head 04</td>
    <td align="center">Head 05</td> 
  </tr> 
<?php

for ($i = 0 ; $i <10; $i++) //for迴圈。， for(開始化變數; 判斷是否進入迴圈之條件式;離開迴圈必定執行條件)
{//產生10次

//    echo "<tr><td align=\"center\">________</td><td align=\"center\">data2</td><td align=\"center\">data3</td><td align=\"center\">data4</td><td align=\"center\">data5</td></tr>" ;

    echo "<tr><td align=\"center\">" ;
    echo $i ;
    echo "</td><td align=\"center\">data2</td><td align=\"center\">data3</td><td align=\"center\">data4</td><td align=\"center\">data5</td></tr>" ;

}   //迴圈後的括弧

?>
</table>