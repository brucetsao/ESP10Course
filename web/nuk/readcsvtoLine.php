<?php
$myfile = fopen("./dataset/2882chip.csv", "r") or die("Unable to open file!");
while(!feof($myfile)) 
{
    echo fgets($myfile);
    echo "<br>" ;
  }
  fclose($myfile);
?>