
<?php
   
 // 	include("comlib.php");		//使用資料庫的呼叫程式

  include("../Connections/iotcnn.php");		//使用資料庫的呼叫程式
		//	Connection() ;
  	$link=Connection();		//產生mySQL連線物件
      $d00 = array() ;
      $d01 = array() ;
    

      $qrystr="select * from fcu.coutytbl where 1 order by cname " ;		//將dhtdata的資料找出來
      //城市檔案的檔案的SQL QUERY
      $subqry="select * from  fcu.towntbl WHERE cid = '%s' order by tname; " ;		//將dhtdata的資料找出來
        //城鎮檔的 SQL QUERY
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;   //索引值
	$count = mysqli_num_rows($result) ;
    //取得總筆數
	//echo $count."<br>";
	
	if ($count >0)  //有query到資料
	{

       while($row = mysqli_fetch_array($result)) //用 fetch方法取出資料
		{
            array_push($d00,$row["cid"]) ;      //將cid欄位資料存入陣列
            array_push($d01,$row["cname"]) ;    //將cname欄位資料存入陣列
    	}   

	}

    //SELECT * FROM HAuser as a  WHERE 1 order by userid asc
//	echo $qrystr."<br>" ;

	
	// mysqli_free_result($result);	// 關閉資料集
 
	// mysqli_close($link);		// 關閉連線





?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 標準網頁抬頭</title>
<link href="../mycss.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	$result=mysqli_query($link , $qrystr);		//將dhtdata的資料找出來(只找最後5
	$cnt= 1 ;
	$count = mysqli_num_rows($result) ;
	//echo $count."<br>";
    echo "<div id='top'>" ;
	$linkdata = "<a href='#a%d'>%s</a>/" ;

	if ($count >0)
	{
        for( $i=0; $i < count($d00) ; $i=$i +1 )
        {
            $linkstr =  sprintf($linkdata,$i+1,$d01[$i]) ;
            echo  $linkstr  ;

        }

    }
    echo "</div>"  ;

	if ($count >0)      //有資料
	{
       echo  "<table width='100%' border='1'>" ;    //印出表格框架
       echo "<tr bgcolor='green'><td>序</td><td>城市代碼</td><td>城市名稱</td></tr>" ;  
       //印出表格抬頭
       //$row0 = "<tr><td>1</td><td>01</td><td>南投縣</td></tr>" ;
       $rowdata = "<tr bgcolor='yellow'><td>%s</td><td><div id = 'a%d'>%s</div></td><td>%s<a href='#top'><img src = '../images/sstop.png'></a></td></tr>" ;
        //第一階 城市資料的列格式套表字串
       $subrowdata = "<tr><td></td><td>%s</td><td>%s</td></tr>" ;
               //第二階 鄉鎮資料的列格式套表字串
       for( $i=0; $i < count($d00) ; $i=$i +1 )
       		{
            $rowstr =  sprintf($rowdata,$i+1,$i+1,$d00[$i],$d01[$i]) ;
            // 產生城市資料區之列資料
            echo  $rowstr  ;    //  送出城市資料區之列資料
            $subqrystr = sprintf($subqry,$d00[$i]) ;
            //產生鄉鎮之SQL
            $result2=mysqli_query($link , $subqrystr);		//將dhtdata的資料找出來(只找最後5
            // 取得箱資料之sql
            $count2 = mysqli_num_rows($result2) ;
            //取得資料
            //echo $count."<br>";
            
            if ($count2 >0)
            {
        
               while($row2 = mysqli_fetch_array($result2)) //取出鄉鎮資造
                {

                    $rowstr =  sprintf($subrowdata,$row2["tid"],$row2["tname"]) ;
                    //填入鄉鎮資料之列 html
                    echo  $rowstr  ;
                }
        
            }
            
		}
       echo "</table>" ;
	}

?>
</body>
</html>