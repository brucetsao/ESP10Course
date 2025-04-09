<!DOCTYPE html>
<html>
<body>

<?php
$cars = array("Volvo", "BMW", "Toyota");
$cars2 = array(12, 34, 55);
$dd = array()  ;
for($i=10; $i<100;$i=$i+1)
{
	array_push($dd,$i) ;
}

echo json_encode($cars, JSON_UNESCAPED_UNICODE);
echo "<br>111";

echo json_encode($cars2, JSON_UNESCAPED_UNICODE);
echo "<br>222";

echo json_encode($dd, JSON_UNESCAPED_UNICODE);
?>

</body>
</html>