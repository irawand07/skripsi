<?php include "../__atas.php"; ?>
<?php include_once "../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("admin")) {
		header ("location: login.php");
	}
?>

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
					 <li><a class="scroll" href="perpustakaan.php">PERPUSTAKAAN</a></li>
					 <li class="active"><a class="scroll" href="verifikasi.php">VERIFIKASI</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="rooms ">
  <div class="col-md-8 booking-form">
		<h2>Detail Perpustakaan</h2> <hr/>
		<table class="">
      <?php
      $ambil = new AksesDB();
  		$hasil=$ambil->ambilDataTertentu("perpustakaan","id_perpustakaan", $_GET['id']);
  		$row=mysqli_fetch_assoc($hasil);
  			echo "<tr><td>ID  <td> <td> ".$row['id_perpustakaan']."</td></tr>";
				echo "<tr><td>Nama  <td> <td> ".$row['nama_perpustakaan']."</td></tr>";
				echo "<tr><td>URL  <td> <td> ".$row['url_perpustakaan']."</td></tr>";
				echo "<tr><td>Telepon  <td> <td> ".$row['tlp']."</td></tr>";
				echo "<tr><td>Email  <td> <td> ".$row['email']."</td></tr>";
				echo "<tr><td>Alamat  <td> <td> ".$row['alamat']."</td></tr>";
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
				echo "<tr><td>Status Verifikasi <td> <td> ".$row['status_verifikasi']."</td></tr>";
      ?>
    </table>
		<hr/>
		<a href="#spesifik" data-toggle="collapse" style="color: #FFD700;"><u>Histori Verifikasi</u> </a>
		<div id="spesifik" class="collapse">
				<?php
				$hasilHistori=$ambil->adminAmbilVerifikasiAdmin($_SESSION['id']);
				while ($rowHistori=mysqli_fetch_assoc($hasilHistori)) {

					echo "<span style='color:blue'>".$rowHistori['tgl_verifikasi']."  ".$rowHistori['status_verifikasi']."</span><br/>";
					echo "<p> ".$rowHistori['keterangan']." <i>(".$rowHistori['nama_admin'].")</i></p> <br/>";
				}

				?>
		</div>
  </div>
	<div class="col-md-3 booking-form">
		<b>Logo Perpustakaan</b> <br/>
		<img src="<?php echo BASE_URL."assets/images/perpus_logo/".$row['logo_perpustakaan']; ?>" height="200px" width="200px" alt="logo perpustakaan">
		<br/>
		<form action="proses/simpan_verifikasi.php" method="post">
			<input type="hidden" name="id" value="<?php echo $row['id_perpustakaan'] ?>"/>
			<h5>Status Verifikasi <span style="color:red"> *</span></h5>
			<select name="verifikasi">
				<option value=""></option>
				<option value="Diterima">Diterima</option>
				<option value="Ditolak">Ditolak</option>
			</select>
			<h5>Keterangan <span style="color:red"> *</span></h5>
			<textarea name="ket"></textarea>
			<h5> ( <span style="color:red">* </span>) Harus Diisi</h5>
			<input type="submit" name="simpan" value="SIMPAN">
		</form>
	</div>
	<div class="clearfix"></div>

</div>

<?php include "../__bawah.php"; ?>
