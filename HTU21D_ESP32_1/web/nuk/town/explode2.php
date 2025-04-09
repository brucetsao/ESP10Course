
<?php
$str = 'one,two,three,four';
$dd = explode(",",$str) ;
//echo typeof($dd)."<br>";
foreach($dd  as $d)
{
    echo $d."------<br>";
}
?>