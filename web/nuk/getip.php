<?php
$ip = $_SERVER["REMOTE_ADDR"];
$path = $_SERVER["SCRIPT_NAME"];
$server = $_SERVER["SERVER_SOFTWARE"];
echo $ip."<br>" ;
echo $path."<br>" ;
echo $server."<br>" ;

?>