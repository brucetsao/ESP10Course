
<?php
 //http://140.134.25.43:8088/fcu/JsonData/GetAllTownbyID.php?sid=13

  // 	include("comlib.php");		//使用資料庫的呼叫程式
  class maindata{
	public $DataName  ; 
	public $Amount ; 
	public $Datalist ; 
 }
  class rowdata{
	public $TownID  ; 
	public $TownName ; 
 }

 $mid = $_GET["sid"] ;
 $maindata = new maindata() ;
 

  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	$qry="select * from fcu.towntbl where cid = '%s' order by tname ;" ;		//將dhtdata的資料找出來
	$qrystr= sprintf($qry,$mid)  ;		//將dhtdata的資料找出來
	//SELECT * FROM HAuser as a  WHERE 1 order by userid asc
//	echo $qrystr."<br>" ;
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
	$maindata->DataName = "Town" ;
	$maindata->Amount = $count ;
	
	
	if ($count >0)
	{
		$dd = array() ;
	while($row = mysqli_fetch_array($result)) 
		{
			$rowdata = new rowdata() ;

			$rowdata->TownID = $row["tid"] ;
			$rowdata->TownName = $row["tname"] ;
			array_push($dd , $rowdata) ;
			
		}
		 $maindata->Datalist = $dd ;
		echo json_encode($maindata, JSON_UNESCAPED_UNICODE);
				//加入 "JSON_UNESCAPED_UNICODE" 參數，可以避免轉成  unicode 編碼
	}
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>

