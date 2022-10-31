
<?php
 //http://140.134.25.43:8088//fcu/member/GetUser.php?userid=bruce
 //http://localhost:8088//fcu/member/GetUser.php?userid=bruce
  // 	include("comlib.php");		//使用資料庫的呼叫程式
  class userdata{
	public $id  ; 
	public $userid ; 
	public $username ; 
	public $password ; 
	public $sex ; 
	public $birthday ; 
	public $telephone ; 
	public $cellphone ; 
	public $address ; 
	public $email ; 
	public $url ; 
	public $comment ; 
 }


  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
    $usrid = $_GET["userid"] ;
	$userdata = new userdata() ; 

	$qry="select * from fcu.users WHERE account = '%s' order by account asc;" ;		//將dhtdata的資料找出來
	$qrystr= sprintf($qry,$usrid)  ;		//將dhtdata的資料找出來
	//SELECT * FROM HAuser as a  WHERE 1 order by userid asc
//	echo $qrystr."<br>" ;
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
	
	if ($count >0)
	{
		$dd = array() ;
	while($row = mysqli_fetch_array($result)) 
		{
			$userdata->id = $row["id"] ;
			$userdata->userid = $row["account"] ;
			$userdata->username = $row["name"] ;
			$userdata->password = $row["password"] ;
			$userdata->sex = $row["sex"] ;
			$userdata->birthday = $row["birthday"] ;
			$userdata->telephone = $row["telephone"] ;
			$userdata->cellphone = $row["cellphone"] ;
			$userdata->address = $row["address"] ;
			$userdata->email = $row["email"] ;
			$userdata->url = $row["url"] ;
			$userdata->comment = $row["comment"] ;
			
		}
		echo json_encode($userdata, JSON_UNESCAPED_UNICODE);
				//加入 "JSON_UNESCAPED_UNICODE" 參數，可以避免轉成  unicode 編碼
	}
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>

