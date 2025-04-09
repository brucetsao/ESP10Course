<?php
		//session_start();
	function Connection() 
	{

		$server="127.0.0.1";
		$user="nukiot";
		$pass="12345678";
		$db="nukiot";
		$dbport = 3306 ;
   		//echo "cnn is ok 01"."<br>" ;	   	
		$connection = new mysqli($server,$user,$pass,$db , $dbport);
		//$connection = mysqli_connect($server, $user, $pass, $db ) ;
   		//echo "cnn is ok 02"."<br>" ;	   	

		if ($connection -> connect_errno) 
		{
		  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		  exit();
		}
		
   		//echo "cnn is ok 03"."<br>" ;	   	
		mysqli_select_db($connection,$db); 
   		//echo "cnn is ok 04"."<br>" ;	   	
		$connection -> query("SET NAMES UTF8");
   		//echo "cnn is ok 05"."<br>" ;	   	

   		//echo "cnn is ok 06"."<br>" ;	   	
	
		return $connection  ;	
	}
	
?>