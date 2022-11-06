
<?php
   
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
	$qrystr="select * from product01;" ;		//將dhtdata的資料找出來
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
  if($result!==FALSE)
  {
while($row = mysqli_fetch_array($result)) 
{
	echo $row["id"]."/".$row["name"]."/".$row["classification"]."/".$row["price"]."/".$row["cost"]."/".$row["keyindate"]."<br>" ;

}// 會跳下一列資料

  }
 mysqli_free_result($result);	// 關閉資料集
 mysqli_close($link);		// 關閉連線
?>
