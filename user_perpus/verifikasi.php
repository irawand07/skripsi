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
					<li class="active"><a class="scroll" href="verifikasi.php">VERIFIKASI</a></li>
					<li><a class="scroll" href="syarat.php">SYARAT PENDAFTRAN</a></li>
					<li><a class="scroll" href="aturan.php">ATURAN</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="package text-left">
  <div class="col-md-10 booking-form">
  <div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#langkah1" aria-controls="langkah1" role="tab" data-toggle="tab">Langkah 1</a></li>
      <li role="presentation"><a href="#langkah2" aria-controls="langkah2" role="tab" data-toggle="tab">Langkah 2</a></li>
      <li role="presentation"><a href="#langkah3" aria-controls="langkah3" role="tab" data-toggle="tab">Langkah 3</a></li>
    </ul>
    <form action="proses/simpan_verifikasi.php" method="post">
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="langkah1">
          <br/>

          <h4 style="color: black;">Mengisi data perpustakaan</h4>
          <h5>Alamat Url Perpustakaan <span style="color:red"> *</span></h5>
          <input name="url" type="text" value="">
          <h5>Logo Perpustakaan <span style="color:red"> *</span></h5>
          <input name="logo" type="file" value="">
          <h5>Profil Perpustakaan <span style="color:red"> *</span></h5>
          <input name="profil" type="text" value="" >
          <h5>Fasilitas Perpustakaan </h5>
          <input name="fasilitas['1']" type="checkbox" value="Wifi"/> Wifi <br/>
          <input name="fasilitas['2']" type="checkbox" value="Ruang Baca"/> Ruang Baca <br/>
          <input name="fasilitas['3']" type="checkbox" value="AC"/> AC <br/>
          <input name="fasilitas['4']" type="checkbox" value="Foto Copy"/> Foto Copy <br/>
          <h5> ( <span style="color:red">* </span>) Harus Diisi</h5>

        </div>
        <div role="tabpanel" class="tab-pane" id="langkah2">
          <br/>
          <h4 style="color: black;">Mengisi prosedur perpustakaan</h4>
          <h5>Prosedur Pendaftaran Anggota <span style="color:red"> *</span></h5>
          <textarea name="pendaftaran" ></textarea>
          <h5>Prosedur Peminjaman Buku <span style="color:red"> *</span></h5>
          <textarea name="peminjaman" ></textarea>
          <h5>Prosedur Pengembalian Buku <span style="color:red"> *</span></h5>
          <textarea name="pengembalian" ></textarea>
          <h5> ( <span style="color:red">* </span>) Harus Diisi</h5>
        </div>
        <div role="tabpanel" class="tab-pane" id="langkah3">
          <br/>
          <h4 style="color: black;">Koordinat lokasi perpustakaan</h4>
					<h5>Longitude <span style="color:red"> *</span></h5>
          <input name="longitude" type="text" value="">
					<h5>Latitude <span style="color:red"> *</span></h5>
          <input name="latitude" type="text" value="">
          <input type="submit" name="simpan" value="SIMPAN">
        </div>

    </div>
    </form>
  </div>
  </div>
  <div class="clearfix"></div>
</div>

<?php include "../__bawah.php"; ?>
