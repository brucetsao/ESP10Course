<?php
$myfile = fopen("./dataset/2882chip.csv", "r") or die("Unable to open file!");
while(!feof($myfile)) 
{
    $tmp =  fgets($myfile);
    echo  $tmp ;
   echo "<br>" ;
   print_r (explode(" ",$tmp)); 
   $rowdata = explode(" ",$tmp); 
   echo $rowdata[0]."<br>" ;
   echo $rowdata[1]."<br>" ;
   echo $rowdata[2]."<br>" ;
   echo $rowdata[3]."<br>" ;
   echo $rowdata[4]."<br>" ;
   echo $rowdata[5]."<br>" ;
   echo $rowdata[6]."<br>" ;
   echo $rowdata[7]."<br>" ;
   echo $rowdata[8]."<br>" ;
   echo $rowdata[9]."<br>" ;
   echo $rowdata[10]."<br>" ;
   echo $rowdata[11]."<br>" ;
   echo $rowdata[12]."<br>" ;
   echo "======================================================<br>" ;
  // $tmpline = str_split(" ", $tmp); 
  }
  fclose($myfile);
?>