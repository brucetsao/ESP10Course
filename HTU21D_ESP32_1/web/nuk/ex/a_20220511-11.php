<?php
$a = "大家好" ;
$img01 = "<img src='/fcu/images/%d.png' with='80' heigh='80'>" ;
$tt = "<tr><td>%d</td><td>%s</td></tr>" ;
?>
<table  border="1" width = "90%">
<?php
for($i=30; $i<40;$i=$i+1)
{
   
    $img02 = sprintf($img01,(int)$i/10)   ;
    $img03 = sprintf($img01,$i % 10)   ;
    $imagez = sprintf($tt,$i,$img02.$img03)  ;
    echo $imagez  ;  
}
?>
</table>
