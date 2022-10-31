
<?php

 class userdata{
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

  
 // 	include("comlib.php");		//使用資料庫的呼叫程式

  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	

	$qrystr="select * from fcu.users WHERE 1 order by account asc;" ;		//將dhtdata的資料找出來
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
			$userdata = new userdata() ; 
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
			array_push($dd , $userdata) ;

		}
		//echo "<br>=======================================<br><br>";
	
		//$user = utf8_encode($user) ;
		echo json_encode($dd , JSON_UNESCAPED_UNICODE);
	}
	
	 mysqli_free_result($result);	// 關閉資料集
 
	 mysqli_close($link);		// 關閉連線





?>

