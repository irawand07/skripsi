<?php include "../../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("perpustakaan")) {
		header ("location: login.php");
	}
?>

<?php
  if(isset($_POST['simpan'])){
    $id = $_SESSION['id'];
    $url = $_POST['url'];
    $logo = $_POST['logo'];
    $profil = $_POST['profil'];
    $fasilitas = "aaa";
    $pendaftaran = $_POST['pendaftaran'];
    $peminjaman = $_POST['peminjaman'];
    $pengembalian = $_POST['pengembalian'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];

    $simpan = new AksesDB();
    if($simpan->perpustakaanVerifikasi($id,$url,$logo,$profil,$fasilitas,$pendaftaran,$peminjaman,$pengembalian,$longitude,$latitude)){
      header ("location: ../index.php?status=simpanok");
    }else {
      echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
	    echo "<input type='button' value='kembali' onClick='self.history.back()'>";
    }


    print_r($fasilitas);
  }else {
    header ("location: login.php");
  }

?>
