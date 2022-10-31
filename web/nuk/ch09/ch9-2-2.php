<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ch9-2-2.php</title>
</head>
<body>
<?php 
$file = 'mybook1.txt';    // 檔案名稱
$content = "PHP與MySQL網頁設計範例教本\r\n";
$cc = "在《DC超級寵物軍團》中，「超級狗氪普托」與超人是形影不離的好朋友，擁有相同的超能力，肩並肩在城市裡打擊犯罪。當超人和其他正義聯盟的成員遭到綁架後，「超級狗氪普托」必須說服一群看似兩光的收容所夥伴，包含：「蝙蝠狗王牌」、「大肚豬小碧」、「莫特龜」和「松鼠奇比」，大家要精通各自新發現的力量，幫助「超級狗氪普托」拯救這些超級英雄。" ;
$fp = fopen($file, "w")  // 開啟檔案
      or exit("檔案 $file 開啟錯誤<br/>");
if (fwrite($fp, $content))   // 寫入檔案
{
   for($i=0; $i <10; $i++)
   {
      fwrite($fp, $cc."\n") ;
   }
   print "寫入檔案 $file 成功<br/>";
}
   else
   print "寫入檔案 $file 錯誤<br/>";
fclose($fp); // 關閉檔案
?>
</body>
</html>