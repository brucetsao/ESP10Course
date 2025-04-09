<?php

function GetYear($dd)
{
    echo $dd."-----<br>" ;
    echo gettype($dd)."====<br>" ;
    $tmp = DateTime::createFromFormat('Y/m/d', $dd);

    return $tmp->format('Y');

}
function GetMonth($dd)
{
    echo $dd."-----<br>" ;
    $tmp = DateTime::createFromFormat('Y/m/d', $dd);

    return $tmp->format('m');

}
function GetDay($dd)
{
    echo $dd."-----<br>" ;
    $tmp = DateTime::createFromFormat('Y/m/d', $dd);

    return $tmp->format('d');

}


$a="2022/5/6" ;
echo GetYear($a)."<br>" ;
echo GetMonth($a)."<br>" ;
echo GetDay($a)."<br>" ;
/*
//$b = date($a) ;
$b = DateTime::createFromFormat('Y/m/d', $a);
///echo $b."<br>" ;
echo gettype($b)."<br>" ;
//echo $b."<br>" ;

//echo "----------"."<br>" ;
//echo $b."<br>" ;
echo "----------"."<br>" ;
echo gettype($b->format('Y'))."----------------<br>" ;
echo $b->format('Y')."<br>" ;
echo "----------"."<br>" ;
echo $b->format('m')."<br>" ;
echo "----------"."<br>" ;
echo $b->format('d')."<br>" ;
echo "----------"."<br>" ;

*/

?>