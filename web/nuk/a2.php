<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta http-equiv="refresh" content="1" />
<title>溫溼度家居系統</title>
</head>
<body>
<?php 
	$dt = getdate() ;
	$yyyy =  str_pad($dt['year'],4,"0",STR_PAD_LEFT);
	$mm  =  str_pad($dt['mon'] ,2,"0",STR_PAD_LEFT);
	$dd  =  str_pad($dt['mday'] ,2,"0",STR_PAD_LEFT);
	$hh  =  str_pad($dt['hours'] ,2,"0",STR_PAD_LEFT);
	$min  =  str_pad($dt['minutes'] ,2,"0",STR_PAD_LEFT);
	$sec  =  str_pad($dt['seconds'] ,2,"0",STR_PAD_LEFT);
	echo $yyyy."/".$mm."/".$dd."   ".$hh.":".$min.":".$sec;
	
?>
</body>
</html>
