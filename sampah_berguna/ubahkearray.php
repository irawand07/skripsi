<?php
//data dr database
$data = "id,idbuku,nama,nama_buku,th,tahun,stok,stok_buku";
//ubah ke array
$arr = explode(",", $data);
//hitung jumlah data
$jum = count($arr);
echo $jum;
echo "<pre>";
print_r($arr);

$tabel =array();
$no=1;
for ($i=0; $i<$jum ; $i++) {
  echo $i;
  echo $no;
  echo "<br/>";
  $no = $no + 2;
  $i++;
}
//print_r($tabel);
 ?>
