<?php
$a = "大家好" ;
$img01 = "%d<img src='/fcu/images/%d.jpg' ><br>" ;

for($i=0; $i<10;$i=$i+1)
{
    $img02 = sprintf($img01,$i+1,$i)   ;
  echo $img02 ;  
}

?>