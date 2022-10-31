<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>convert data into database</title>
</head>

<body>
    <?php
$sqlstrf ="insert into stock (datatime, storedstock, stockholder, personavg, overfour, overfourpercent, overfourstockholder, fourfive, sixeight, eightten, overthousand, overthousandstockholderp,closingprice) VALUES ('%s', '%d', '%d', '%f', '%d', '%f', '%d', '%d', '%d', '%d', '%d', '%f', '%f')" ;

// 建立MySQL的資料庫連接 
$link = mysqli_connect("localhost","fcu",
                       "12345678","fcu")
        or die("無法開啟MySQL資料庫連接!<br/>");
echo "資料庫myschool開啟成功!<br/>";
$myfile = fopen("./dataset/2882chip.csv", "r") or die("Unable to open file!");
while(!feof($myfile)) 
{
    $tmp =  fgets($myfile);
    echo  $tmp ;
   echo "<br>" ;
   $rowdata = explode(" ",$tmp); 
   echo $rowdata[0]."<br>" ;
   echo $rowdata[1]."<br>" ;
   echo $rowdata[2]."<br>" ;
   echo $rowdata[3]."<br>" ;
   echo $rowdata[4]."<br>" ;
   echo $rowdata[5]."<br>" ;
   echo $rowdata[6]."<br>" ;
   echo $rowdata[7]."<br>" ;
   echo $rowdata[8]."<br>" ;
   echo $rowdata[9]."<br>" ;
   echo $rowdata[10]."<br>" ;
   echo $rowdata[11]."<br>" ;
   echo $rowdata[12]."<br>" ;
   $sqlstr = sprintf($sqlstrf,$rowdata[0],$rowdata[1],$rowdata[2],$rowdata[3],$rowdata[4],$rowdata[5],$rowdata[6],$rowdata[7],$rowdata[8],$rowdata[9],$rowdata[10],$rowdata[11],$rowdata[12]) ;
   if ( $result = mysqli_query($link, $sqlstr ) ) 
   { 
      echo "<b插入資料成功</b><br/>";  // 顯示查詢結果
   }
   
   // $tmpline = str_split(" ", $tmp); 
    echo $sqlstr."<br>";
}
  fclose($myfile);
// 送出查詢的SQL指令
/*
for($i=0;$i<10;$i++)
{
   if ( $result = mysqli_query($link, $sqlstr ) ) 
   { 
      echo "<b插入資料成功</b><br/>";  // 顯示查詢結果
   }
}
  
   mysqli_free_result($result); // 釋放佔用記憶體
   mysqli_close($link);  // 關閉資料庫連接
*/
   ?>
</body>

</html>