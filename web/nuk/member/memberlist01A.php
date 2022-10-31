<?php 
	session_start();		//必須要用這段，方能使用session的所有功能
   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	$qrystr="select * from fcu.membera  where 1 order by username asc  " ;		//將dhtdata的資料找出來
	//產生抓資料的SQL於這
	
	
	$result=mysqli_query($link,$qrystr);		//將dhtdata的資料找出來(只找最後5
	//執行抓資料的SQL敘述
	
  if($result!==FALSE)	//判斷是否有資料
  {
	 while($row = mysqli_fetch_array($result)) //每次抓一筆資料，有抓到資料傳回true， 沒有傳回false
	 {
			echo $row["id"];		// $row[欄位名稱] 就可以取出該欄位資料
			echo  $row["username"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo  $row["name"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo  sextype($row["sex"]);	// array_push(某個陣列名稱,加入的陣列的內容
			echo  $row["degree"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo  $row["degreeename"];	// array_push(某個陣列名稱,加入的陣列的內容
			echo "<br>" ;
		}// 會跳下一列資料

  }
			
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線


function sextype($ss)
{
	if ($ss == 1)
	{
		return "男生" ;

	}
	else
	 {
		return "女生" ;
	}

}


?>
