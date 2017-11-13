<?php include "../../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("admin")) {
		header ("location: ../login.php");
	}
?>

<?php
  if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $url = $_POST['url'];
		$nama_tabel = $_POST['nama_tabel'];
    $apikey = $_POST['apikey'];

    $tabel = "";
    if(!empty($_POST['kolom'])){
      $string = $_POST['kolom'];
      $no=1;
      foreach($string as $selected){
        $tabel .= $selected;
        $tabel .= ",";
				$no++;
      }
      //Menghapus karakter terakhir
      $tabel = substr($tabel, 0, -1);
    }
    echo $tabel;
    echo $id;
    echo $url;
    echo $apikey;

    $simpan = new AksesDB();
    if($simpan->adminSimpanWS($id,$url,$apikey,$nama_tabel,$tabel)){
      header ("location: ../webservice.php?status=simpanok");
    }else {
      echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
	    echo "<input type='button' value='kembali' onClick='self.history.back()'>";
    }
  }else {
    header ("location: ../login.php");
  }

?>
