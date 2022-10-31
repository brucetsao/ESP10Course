<?php
$a = "大家好" ;
$img01 = "<img src='/fcu/images/%d.jpg' >" ;

for($i=30; $i<40;$i=$i+1)
{
   
    $img02 = sprintf($img01,(int)$i/10)   ;
    $img03 = sprintf($img01,$i % 10)   ;
  echo $img02.$img03."<br>" ;  
}

?>