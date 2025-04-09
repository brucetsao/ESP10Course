<?php

echo is_file("./abc.txt")."----1--<br>" ;
echo filetype("./abc.txt")."----2--<br>" ;
echo fileatime("./abc.txt")."---3---<br>" ;
$currentTime = DateTime::createFromFormat( 'U', fileatime("./abc.txt"));
echo $currentTime->format( 'c' )."---4---<br>" ;
echo filesize(string("./abc.txt")."---5---<br>" ;




?>