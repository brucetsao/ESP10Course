<?php
echo strzero(1,3) ;



		function strzero($no,$len)
		{
			$tmp = (string)$no ;
			$l = strlen($tmp) ;
			if ($len > $l)
			{
				return str_repeat("0",$len-$l).$tmp ;
			}
			else
			{
				return $tmp ;
			}
		}


?>