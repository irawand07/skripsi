<?php
$str="'status' => '-1','level1' => '1', 'level2' => '1', 'level9' => '1', 'level10' => '1', 'start' => '2013-12-13', 'stop' => '2013-12-13'";
echo $str='$arr='.'array('.$str.');';
eval($str);
echo "<pre>";
print_r($arr);
?>
