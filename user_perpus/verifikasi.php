<?php include "../__atas.php"; ?>
<?php include "../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("perpustakaan")) {
		header ("location: login.php");
	}
?>

<script>
		function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
				var gb = gambar.files;

//                loop untuk merender gambar
				for (var i = 0; i < gb.length; i++){
//                    bikin variabel
						var gbPreview = gb[i];
						var imageType = /image.*/;
						var preview=document.getElementById(idpreview);
						var reader = new FileReader();

						if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
								preview.file = gbPreview;
								reader.onload = (function(element) {
										return function(e) {
												element.src = e.target.result;
										};
								})(preview);

//                    membaca data URL gambar
								reader.readAsDataURL(gbPreview);
						}else{
//                        jika tipe data tidak sesuai
								document.getElementById("file").value = "";
								alert("Type file tidak sesuai. Khusus image.");

						}

				}
		}
</script>


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
<div class="package text-left">
  <div class="col-md-10 booking-form">
  <div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#langkah1" aria-controls="langkah1" role="tab" data-toggle="tab">Langkah 1</a></li>
      <li role="presentation"><a href="#langkah2" aria-controls="langkah2" role="tab" data-toggle="tab">Langkah 2</a></li>
      <li role="presentation"><a href="#langkah3" aria-controls="langkah3" role="tab" data-toggle="tab">Langkah 3</a></li>
    </ul>
    <form id="myForm" action="proses/simpan_verifikasi.php" method="post" enctype ="multipart/form-data">
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="langkah1">
          <br/>

          <h4 style="color: black;">Mengisi data perpustakaan</h4>
          <h5>Alamat Url Perpustakaan <span style="color:red"> *</span></h5>
          <input name="url" type="text" value="">
          <h5>Logo Perpustakaan <span style="color:red"> *</span></h5>
          <input id="file" name="file" type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" value="">
					<img id="preview" src="" alt="" width="320px"/>
          <h5>Profil Perpustakaan <span style="color:red"> *</span></h5>
          <input name="profil" type="text" value="" >
          <h5>Fasilitas Perpustakaan </h5>
          <input name="list_fasilitas[]" type="checkbox" value="Wifi"/> Wifi <br/>
          <input name="list_fasilitas[]" type="checkbox" value="Ruang Baca"/> Ruang Baca <br/>
          <input name="list_fasilitas[]" type="checkbox" value="AC"/> AC <br/>
          <input name="list_fasilitas[]" type="checkbox" value="Foto Copy"/> Foto Copy <br/>
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
