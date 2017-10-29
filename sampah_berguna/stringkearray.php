<?php

$kalimat = "satu;dua tiga;empat;lima;";
$kalimat = substr($kalimat, 0, -1);
echo $kalimat;
$arr_kalimat = explode (";",$kalimat);
var_dump ($arr_kalimat);

// array(5) {
// [0]=> string(4) "satu" [1]=> string(3) "dua"
// [2]=> string(4) "tiga" [3]=> string(5) "empat"
// [4]=> string(4) "lima"
// }
?>
