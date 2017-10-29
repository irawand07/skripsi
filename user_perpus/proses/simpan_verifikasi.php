<?php include "../../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("perpustakaan")) {
		header ("location: ../login.php");
	}
?>

<?php
  if(isset($_POST['simpan'])){
	    $id = $_SESSION['id'];
	    $url = $_POST['url'];
	    //$logo = $_POST['logo'];
	    $profil = $_POST['profil'];
	    $pendaftaran = $_POST['pendaftaran'];
	    $peminjaman = $_POST['peminjaman'];
	    $pengembalian = $_POST['pengembalian'];
	    $longitude = $_POST['longitude'];
	    $latitude = $_POST['latitude'];

			$simpan = new AksesDB();
			$fasilitas = "";
			if(!empty($_POST['list_fasilitas'])){
				$fasilitas = $simpan->gabungString($_POST['list_fasilitas']);
			}

			$nama_gambar = $simpan->simpanGambar($_FILES['file'],"../../assets/images/perpus_logo/");
			if($nama_gambar != "gagal"){
					$logo = $nama_gambar;
					if($simpan->perpustakaanVerifikasi($id,$url,$logo,$profil,$fasilitas,$pendaftaran,$peminjaman,$pengembalian,$longitude,$latitude)){
			      header ("location: ../index.php?status=simpanok");
					}else {
						echo "Masih ada kesalahan, Silahkan perbaiki!<br/>";
				    echo "<input type='button' value='kembali' onClick='self.history.back()'>";
					}
	    }else {
	      echo "Ukuran gambar terlalu besar / extensi tidak sesuai, Silahkan perbaiki!<br/>";
		    echo "<input type='button' value='kembali' onClick='self.history.back()'>";
	    }

  }else {
    header ("location: ../login.php");
  }

?>
