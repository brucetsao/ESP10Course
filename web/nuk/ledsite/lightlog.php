<?php


   	include("../comlib.php");		//使用資料庫的呼叫程式
   	include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	  $t1 = $_POST["t1"]  ;
	  $t2 = $_POST["t2"]  ;
	  $ck1 = $_POST["ck1"]  ;
	  $ck2 = $_POST["ck2"]  ;
	  $year = $_POST["year"]  ;
	  $sid = $_POST["sid"]  ;
	  $tt1 = (int)$t1  ;
	  $tt2 = (int)$t2  ;
	  echo "ck1:(".$ck1.")and type :(".gettype($ck1).")<br>";
	  echo "ck2:(".$ck2.")and type :(".gettype($ck2).")<br>";

	  $qry1 = "select * from fcu.Ledsitelist where siteid = %d  and no = '%s' order by no asc ;" ;		//SQL填空
	  $qry2 = "delete from fcu.Ledsitelist where id = %d ;" ;		//SQL填空
	  $qry3 = "select * from fcu.Ledsitelistlog where year = %d  and site = %d and no = '%s' order by no asc ;" ;		//SQL填空
	  $qry4 = "insert into fcu.Ledsitelistlog ( year, siteid, no, donater, dbirthday, dueday) values ('%s', %d, '%s', '%s', '%s', '%s');" ;		//SQL填空
	  $qry5 = "select * from fcu.Ledsitelistlog where year = %d  and siteid = %d and no = '%s' order by no asc ;" ;		//SQL填空
//	  $qry5a = "update fcu.Ledsitelistlog set donater = '%s' , dbirthday = '%s' , dueday = '%s' where year = %d  and siteid = %d and no = '%s' ;" ;		//SQL填空
//	  $qry5b = "insert into fcu.Ledsitelistlog  (year, siteid, no, donater, dbirthday ,dueday) values ('%s','%s','%s','%s','%s','%s') ;" ;		//SQL填空
	  $qry5a = "update fcu.Ledsitelistlog set donater = '%s' , dbirthday = '%s'  where year = %s  and siteid = %d and no = '%s' ;" ;		//SQL填空
	  $qry5b = "insert into fcu.Ledsitelistlog  (year, siteid, no, donater, dbirthday ) values ('%s','%s','%s','%s','%s') ;" ;		//SQL填空



//$result=mysqli_query($link,$qrystr);	
for($i = $tt1; $i <= $tt2; $i=$i+1)	//執行sql語法
{

	$qrystr = sprintf($qry1,$sid,strzero($i, 3)) ;		// 組立要執行的SQL語法
	echo $qrystr."<br>" ;
	$result=mysqli_query($link,$qrystr);	
	
	$num_rows = mysqli_num_rows($result);
	echo "Ledsitelistg 筆數:(".$num_rows.")<br>" ;
	echo "num_rows:(".$num_rows.")and type :(".gettype($num_rows).")<br>";
	if ($num_rows  >= 1)	// Ledsitelist 有資料
	{
		$row = mysqli_fetch_array($result) ;
		echo "data:".$row["id"].":".$row["donater"] ;

		if (!empty($row["donater"]))	//本光明燈有香客點燈
		{
			$qrystr1 = sprintf($qry5,$year,$sid,strzero($i, 3)) ;		// 組立要執行的SQL語法
			echo $qrystr1."<br>" ;
			$result1=mysqli_query($link,$qrystr1);		
			$num_rows1 = mysqli_num_rows($result1);
			echo "Ledsitelistlog 筆數:(".$num_rows1.")<br>" ;
			echo "num_rows1:(".$num_rows1.")and type :(".gettype($num_rows1).")<br>";			
			echo "有香客:".$row["donater"]."<br>" ;
			if ($num_rows1  >= 1)	// Ledsitelistlog 有資料
				{
					echo "Ledsitelistlog 有資料 <br>" ;
					if ($ck2 == "1")	//複寫光明燈歷史資料
					{
						echo "複寫光明燈歷史資料<br>" ;
		//				$qrystr2 = sprintf($qry5a,$row["donater"],$row["dbirthday"],$year,$sid,strzero($i, 3)) ;		// 組立要執行的SQL語法
						$qrystr2 = sprintf($qry5a,$row["donater"],$row["dbirthday"],$row["dueday"],$year,$sid,strzero($i, 3)) ;		// 組立要執行的SQL語法
						echo $qrystr2."<br>" ;
						$result12=mysqli_query($link,$qrystr2);		
						// update 複寫光明燈歷史資料
					} //end of if ($ck2 == "1")	//複寫光明燈歷史資料
				}	// end of if ($num_rows1  >= 1)	// Ledsitelistlog 有資料
				else
				{
					echo "Ledsitelistlog 無資料 <br>" ;	
					echo "新增光明燈歷史資料<br>" ;
	//				$qrystr3 = sprintf($qry5b,$year,$sid,strzero($i, 3),$row["donater"],$row["dbirthday"],$row["dueday"]) ;		// 組立要執行的SQL語法
					$qrystr3 = sprintf($qry5b,$year,$sid,strzero($i, 3),$row["donater"],$row["dbirthday"]) ;		// 組立要執行的SQL語法
					echo $qrystr3."<br>" ;
					$result13=mysqli_query($link,$qrystr3);		
					//新增光明燈歷史資料
				}	// end of if ($num_rows1  >= 1)	// Ledsitelistlog 有資料

		}	// end of if (!empty($row["donater"]))	//本光明燈沒有香客點燈
		if ($ck1 == "1" )	//刪除光明燈資料
		{
			$qrystr4 = sprintf($qry2,$row["id"]) ;		// 組立要執行的SQL語法
			echo $qrystr4."<br>" ;
			$result14=mysqli_query($link,$qrystr4);	
		}	// end of //刪除光明燈資料
	}	// end of if ($num_rows  >= 1)	// Ledsitelist 有資料
	else
	{
		echo "無點燈資料<br>" ;
	}	// end of if ($num_rows  >= 1)	// Ledsitelist 有資料






			# code...
}	// end of for($i = $tt1; $i <= $tt2; $i=$i+1)	//執行sql語法
		
//mysqli_free_result($result);	// 關閉資料集
 
mysqli_close($link);		// 關閉連線
?>

<script>
// 這一區
// php would run before javascript
// better solution to catch error
// ajax request in led.php request for this lamp.php than handle alert() based on callback
window.location = '/fcu/ledsite/ledlist.php'
</script>"