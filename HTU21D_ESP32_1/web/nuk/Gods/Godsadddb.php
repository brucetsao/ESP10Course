<?php


//insert into fcu.user (user, username, pwd, email) values ( 'abc', '李大德', '123456789', 'lee@gmail.com');
//insert into fcu.user (user, username, pwd, email) values ( '%s', '%s', '%s', '%s');
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $t1 = $_POST["t1"]  ;

	  $s1 = $_POST["s1"]  ;


if (isset($_FILES["file"])) 
{
	$t2 = $_FILES["file"]["name"] ;
   echo "上傳檔案資訊: <hr/>";
   echo "檔案名稱: ".$_FILES["file"]["name"]."<br/>";
   echo "暫存檔名: ".$_FILES["file"]["tmp_name"]."<br/>";
   echo "檔案尺寸: ".$_FILES["file"]["size"]."<br/>";
   echo "檔案種類: ".$_FILES["file"]["type"]."<hr/>";
   // 儲存上傳的檔案
   echo "tmpname:".$_FILES["file"]["tmp_name"]."<br>";
   echo "original filename:".$_FILES["file"]["name"]."<br>";
   
   if ( copy($_FILES["file"]["tmp_name"],
             "../images/god/".$_FILES["file"]["name"])) {
      echo "檔案上傳成功<br/>";
      unlink($_FILES["file"]["tmp_name"]);
   }
   else echo "檔案上傳失敗<br/>";
}


//insert into  fcu.gods (name,pic,location) values ('%s', '%s', '%s');


$qry1 = "insert into  fcu.gods (name,pic,location) values ('%s', '%s', '%s');" ; 
$qrystr = sprintf($qry1,$t1,$t2,$s1) ;		// 組立要執行的SQL語法
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
	//window.location = '/fcu/movie/movielist.php'
</script>";
