<?php
  if ($_POST['nama_tabel']) {
    $test = file_get_contents('http://www.localhost.com/xx/perpus/api.php?key=xxx&aksi=test');
    if ($test) {
      echo "string";
    }else {
      echo "ok";
    }
    $json = file_get_contents('http://www.server2.com/perpus/api.php?key=xxx&aksi=tampil&tabel=buku&kolom=id_admin&kunci=1');
    $data = json_decode($json);
    print_r($data);
  }
 ?>
