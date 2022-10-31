<?php
//http://140.134.25.43:8088/fcu/town/GetTowndatajson.php?sel=[01,01,03]
//http://140.134.25.43:8088/fcu/town/GetTowndatajson.php?sel=[11,14,13]
$rdata = $_GET["sel"] ;
//echo $rdata."<br>";
//$dd=array() ;
$dd = explode(",",$rdata) ;
sort($dd);
//echo typeof($dd)."<br>";
/*
if (count($dd) >0)
{
    for($i=0; $i < count($dd);$i=$i+1)
    {
        echo "---".$dd[$i]."---<br>";

    }
            
}
*/

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
        for($i=0; $i < count($dd);$i=$i+1)      //迴圈抓到的資料
        {
            $qrystr = sprintf($qry,trim($dd[$i])) ;     //產生查詢資料的sql語法
            //echo $qrystr."<br>" ;
            $result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
            $cnt= 1 ;   //建立迴圈指標
            $count = mysqli_num_rows($result) ; //取得回傳的recordset
            if ($count >0)
            {

                while($row = mysqli_fetch_array($result))   //迴圈回傳的recordset
                    {
                        $towndata = new towndata() ;    //產生一筆空白的jsondata
                        $towndata->cityid = $row["cid"] ;
                        $towndata->cityname = $row["cname"] ;
                        $towndata->townid = $row["tid"] ;
                        $towndata->townname = $row["tname"] ;
                        array_push($ddd , $towndata) ;  //把已存在存在內容的jsondata存入jsonarray
                            //把已存在存在內容的jsondata存入jsonarray
                    }
            
            }


        }        
		//echo "<br>=======================================<br><br>";
		//$user = utf8_encode($user) ;
		echo json_encode($ddd, JSON_UNESCAPED_UNICODE);
        //產生 json document
	}


?>