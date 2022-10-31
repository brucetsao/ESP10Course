<?php
$rdata = $_POST["selectdata"] ;
$dd=array() ;
foreach ($rdata as $data)
{

   // echo $data."----<br>" ;
    array_push($dd,$data) ;
}

class towndata{
	public $cityid  ; 
	public $cityname ; 
	public $townid ; 
	public $townname ; 
 }
 include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件

	

	$qry="select * from fcu.towntbl WHERE cid = '%s' order by tname asc;" ;		//將dhtdata的資料找出來


	if (count($dd) >0)
	{
        $ddd = array() ;
        for($i=0; $i < count($dd);$i=$i+1)
        {
            $qrystr = sprintf($qry,$dd[$i]) ;    
            //echo $qrystr."<br>" ;
            $result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
            $cnt= 1 ;
            $count = mysqli_num_rows($result) ;
            if ($count >0)
            {

                while($row = mysqli_fetch_array($result)) 
                    {
                        $towndata = new towndata() ; 
                        $towndata->cityid = $row["cid"] ;
                        $towndata->cityname = $row["cname"] ;
                        $towndata->townid = $row["tid"] ;
                        $towndata->townname = $row["tname"] ;
                        array_push($ddd , $towndata) ;
            
                    }
            
            }


        }        
		//echo "<br>=======================================<br><br>";
		//$user = utf8_encode($user) ;
		echo json_encode($ddd, JSON_UNESCAPED_UNICODE);
	}


?>