<?php


//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $t1 = $_POST["t1"]  ;
	  $t2 = $_POST["t2"]  ;
	  $t3 = $_POST["t3"]  ;
	  $t4 = $_POST["t4"]  ;
	  $t5 = $_POST["t5"]  ;
	  $t6 = $_POST["t6"]  ;
	  $t7 = $_POST["t7"]  ;
	  $s1 = $_POST["s1"]  ;
	  $s2 = $_POST["s2"]  ;
	  $s3 = $_POST["s3"]  ;
	  $s4 = $_POST["s4"]  ;


/*
insert into fcu.movie 
(mid, schedule, director, duration, actor, lang, mName, movietype, introduction, playstartdate, grading`)
 VALUES 
('101', '01', 'aaaa', '100', 'bbbb', '1', 'cccc', '1', 'dddd', '2022/7/26', '01');

//-------------------------

insert into fcu.movie 
(mid, schedule, director, duration, actor, lang, mName, movietype, introduction, playstartdate, grading`)
 VALUES 
('%s', '%s', '%s', %d, '%s', %d, '%s', %d, '%s', '%s', '%s');

//-------------------------



*/

//insert into fcu.movie (mid, schedule, director, duration, actor, lang, mName, movietype, introduction, playstartdate, grading) VALUES ('%s', '%s', '%s', %d, '%s', %d, '%s', %d, '%s', '%s', '%s');

$qry1 = "insert into fcu.movie (mid, schedule, director, duration, actor, lang, mName, movietype, introduction, playstartdate, grading) VALUES ('%s', '%s', '%s', %d, '%s', %d, '%s', %d, '%s', '%s', '%s');" ;		//SQL填空
$qrystr = sprintf($qry1,$t1,$s1,$t2,$t3,$t4,$s2,$t5,$s3,$t6,$t7,$s4) ;		// 組立要執行的SQL語法
echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
if($result!==FALSE)
{
	echo "Insert success <br>" ;
}
else 
{

		echo "Insert fail <br>" ;

		# code...
}
//mysqli_free_result($result);	// 關閉資料集
 
mysqli_close($link);		// 關閉連線
?>

<script>
// 這一區
	// php would run before javascript
	// better solution to catch error
	// ajax request in led.php request for this lamp.php than handle alert() based on callback
	window.location = '/fcu/movie/movielist.php'
</script>";
