<?php session_start();?>

<?php
//http://140.134.25.43:8088//fcu/member/logadd.php?usr=1&type=01&dt=2022/5/31%2010:17:00&fromip=10.21.12.89&op=login%20intoi%20system
//INSERT INTO `userlog` (`id`, `userid`, `logindatetime`, `fromip`, `op`, `crtdatetime`) VALUES (NULL, '1', '2022-05-31 02:08:02.000000', '10.21.12.89', '登錄系統', CURRENT_TIMESTAMP);

//insert into fcu.userlog (userid, type, logindatetime, fromip, op) values ('%d', '%s','%s', '%s', '%s');

include("../comlib.php");		//使用資料庫的呼叫程式
include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
$link=Connection();		//產生mySQL連線物件

$usr = $_GET["usr"]  ;
$dt = $_GET["dt"] ;
$typ = $_GET["type"] ;
$fip = $_GET["fromip"] ;
$job = $_GET["op"] ;

echo $usr."/".$dt."/".$typ."/".$fip."/".$job."<br>" ;

$qry1 = "insert into fcu.userlog (userid, type, logindatetime, fromip, op) values ('%d' , '%s' ,'%s', '%s', '%s');"		//SQL填空
$qrystr = sprintf($qry1,$usr,$typ,$dt,$fip,$job) ;		// 組立要執行的SQL語法
echo $qrystr."<br>" ;

$result=mysqli_query($link,$qrystr);		//執行sql語法
if($result!==FALSE)
{
	echo "Insert success <br>" ;
}
else {
	{
		echo "Insert fail <br>" ;
	}
		# code...
}
//mysqli_free_result($result);	// 關閉資料集
 
mysqli_close($link);		// 關閉連線
?>


