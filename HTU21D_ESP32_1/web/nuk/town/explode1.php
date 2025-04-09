
<?php
$str = 'one,two,three,four';

// 零 limit
print_r(explode(',',$str,0));

// 正的 limit
print_r(explode(',',$str,2));

// 负的 limit
print_r(explode(',',$str,-1));
?>