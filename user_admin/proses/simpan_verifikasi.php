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
    $status = $_POST['verifikasi'];
    $ket = $_POST['ket'];

    $simpan = new AksesDB();
    if($simpan->adminSimpanVerifikasi($id,$status,$ket)){
      header ("location: ../verifikasi.php?status=simpanok");
    }else {
      echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
	    echo "<input type='button' value='kembali' onClick='self.history.back()'>";
    }


    print_r($fasilitas);
  }else {
    header ("location: ../login.php");
  }

?>
