<?php 
session_start();


$sid = $_GET["sid"];
$no = $_POST["num"];

if (!isset($_SESSION['itemamount']))
{
    $_SESSION['itemamount'] = 0 ;
    $_SESSION['itemcount'] = 1 ;
    $_SESSION['itemlist'] = array() ;
}
echo "item id:(".$sid.")===>QTY:(".$no.")<br>";
$itemone = array() ;
array_push($itemone, $_SESSION['itemcount']);
array_push($itemone, $sid);
array_push($itemone, $no);
/*
$itemone = array() ;
$itemlist = array() ;
array_push($itemone, $_SESSION['itemcount']);
array_push($itemone, $sid);
array_push($itemone, $no);
array_push($itemlist, $itemone);

// $_SESSION['name_here'] = $your_array;
$_SESSION['itemlist'] = $itemlist;
*/
array_push($_SESSION['itemlist'],$itemone );
foreach($_SESSION['itemlist'] as $x)
{
    foreach($x as $y)
    {
        echo "in:".$y."<br>" ;
    }
    echo "---------------<br>" ;

}

$_SESSION['itemamount'] = $_SESSION['itemamount'] + 1 ;
$_SESSION['itemcount'] = $_SESSION['itemcount']  + 1 ;

?>

<script>
// 這一區
// php would run before javascript
// better solution to catch error
// ajax request in led.php request for this lamp.php than handle alert() based on callback
window.location = '/fcu/meatball/balllist.php'
</script>";