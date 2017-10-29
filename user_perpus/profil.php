<?php include "../__atas.php"; ?>
<?php include "../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("perpustakaan")) {
		header ("location: login.php");
	}
?>

<script>
  $('#myTab a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  })
</script>

<div class="header">
	 <div class="top-header">
		 <div class="container">
			 <div class="logo">
				 	<a href="<?php echo BASE_URL; ?>"><!--<img src="images/logo.png"/>--> <h1 style="color: white; font-weight: bold;">CARI BUKU</h1></a>
			 </div>
			 <span class="menu"> </span>
			 <div class="m-clear"></div>
			 <div class="top-menu">
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li class="active"><a class="scroll" href="profil.php">PROFIL</a></li>
					<li><a class="scroll" href="syarat.php">SYARAT PENDAFTRAN</a></li>
					<li><a class="scroll" href="aturan.php">ATURAN</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="rooms ">
  <div class="col-md-8 booking-form">
		<table class="">
      <?php
      $ambil = new AksesDB();
  		$hasil=$ambil->ambilDataTertentu("perpustakaan","id_perpustakaan", $_SESSION['id']);
  		$row=mysqli_fetch_assoc($hasil);
      echo "<tr><td><b>Nama Perpustakaan </b> <td> <td> : ".$row['nama_perpustakaan']."</td></tr>";
      echo "<tr><td><b>Telepon Perpustakaan</b> <td> <td> : ".$row['tlp']."</td></tr>";
      echo "<tr><td><b>Email Perpustakaan</b> <td> <td> : ".$row['email']."</td></tr>";
      echo "<tr><td><b>Alamat Perpustakaan</b> <td> <td> : ".$row['alamat']."</td></tr>";
      echo "</table>";
      $status = "";
      if ($row['status_verifikasi'] == NULL) {
        $status = "Belum Terverifikasi";
        echo "<hr/>Perpustakaan Anda <b> belum terverifikasi </b> Silahkan Verifikasi <a href='verifikasi.php'> Disini</a>";
      }elseif ($row['status_verifikasi'] == 'Ditolak') {
        $status = "Ditolak";
        echo "<hr/>Pengajuan Verifikasi Perpustakaan <b> Ditolak </b> Silahkan Verifikasi Ulang <a href='verifikasi.php'> Disini</a>";
      }elseif ($row['status_verifikasi'] == 'Menunggu') {
        $status = "Menunggu Verifikasi";
        echo "<hr/>Pengajuan Verifikasi sedang ditanggani. ";
      }else {
        $status = "Terverifikasi";
        echo "<table>";
        echo "<tr><td colspan='2'><hr/></td><tr/>";
        echo "<tr align='center'><th colspan='2'>Profil Perpustakaan</th><tr>";
        echo "<tr><td>URL  <td> <td> ".$row['url_perpustakaan']."</td></tr>";
        echo "<tr><td>Profil  <td> <td> ".$row['profil_perpustakaan']."</td></tr>";
        echo "<tr><td>Fasilitas  <td> <td> ".$row['fasilitas_perpustakaan']."</td></tr>";

        echo "<tr><td colspan='2'><hr/></td><tr/>";
        echo "<tr align='center'><th colspan='2'>Prosedur Perpustakaan</th><tr>";

        echo "<tr><td>Pendaftaran <td> <td> ".$row['prosedur_pendaftaran_anggota']."</td></tr>";
        echo "<tr><td>Peminjaman Buku <td> <td> ".$row['prosedur_peminjaman']."</td></tr>";
        echo "<tr><td>Pengembalian <td> <td> ".$row['prosedur_pengembalian']."</td></tr>";

        echo "<tr><td colspan='2'><hr/></td><tr/>";
        echo "<tr align='center'><th colspan='2'>Lokasi Perpustakaan</th><tr>";
        echo "<tr><td>Latitude <td> <td> ".$row['latitude']."</td></tr>";
        echo "<tr><td>Longitude <td> <td> ".$row['longitude']."</td></tr>";
        echo "<tr><td colspan='2'><hr/></td><tr/>";

        echo "<tr><td>Tanggal Daftar <td> <td> ".$row['tgl_daftar']."</td></tr>";
        echo "<tr><td>Logo Perpustakaan <td> <td> ".$row['logo_perpustakaan']."</td></tr>";
      }

      ?>
    </table>
  </div>
  <div class="col-md-3 booking-form">
		<b>Status Perpustakaan</b> <br/>
		<?php echo $status; ?>

	</div>
</div>

<?php include "../__bawah.php"; ?>
