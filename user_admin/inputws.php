<?php include "../__atas.php"; ?>
<?php include_once "../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("admin")) {
		header ("location: login.php");
	}
?>
<!--
<script type="text/javascript">
  $(document).ready(function(){
    $('#formws').submit(function(eve){
      eve.preventDefault();
      $.ajax({
        url: "proses/simpan_ws.php",
        type:"POST",
        dataType: "html",
        data: $(this).serialize(),
          beforeSend: function(){
            $('#waiting').text('Mohon Tunggu Sebentar').fadeIn('slow');
          },
          success: function(html){
            $('#waiting').fadeOut('slow');
            $('#result').text(html).fadeIn('slow').fadeOut('slow').fadeIn('slow');
          }
        });
      });
    });
</script>
-->
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
					 <li><a class="scroll" href="verifikasi.php">VERIFIKASI</a></li>
					 <li class="active"><a class="scroll" href="webservice.php">WEB SERVICE</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="rooms ">
  <div class="col-md-8 booking-form">
		<h2>Input Web Service</h2> <hr/>
    <form action="proses/simpan_ws.php" method="post" id="formws">
			<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
			<input type="hidden" name="apikey" value="dfgdfgd"/>
      <h5>Apikey Web Service <span style="color:red"> </span></h5>
			<h5>URL Web Service <span style="color:red"> *</span></h5>
			<input type="text" name="url" />
			<h5>Nama Tabel <span style="color:red"> *</span></h5>
			<input type="text" name="nama_tabel" /><button name="test" type="submit" class="btn btn-info" type="button"> Test WS</button>
			<div id="waiting"></div>
			<div id="result"></div>
			<h5>Struktur Tabel <span style="color:red"> *</span></h5>
			<button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>

      <table border="0" width="74%">
        <tr>
          <th>Kolom</th>
          <th>Nama Kolom</th>
          <th>Aksi</th>
        </tr>
        <tr>
          <td><input type="text" name="kolom[]" value="idbuku" readonly></td>
          <td><input type="text" name="kolom[]"  ></td>
          <td><span style="color:red"> *</span></td>
        </tr>
				<tr>
          <td><input type="text" name="kolom[]" value="isbn" readonly></td>
          <td><input type="text" name="kolom[]"  ></td>
          <td><span style="color:red"> *</span></td>
        </tr>
				<tr>
          <td><input type="text" name="kolom[]" value="judul" readonly></td>
          <td><input type="text" name="kolom[]"  ></td>
          <td><span style="color:red"> *</span></td>
        </tr>
				<tr>
          <td><input type="text" name="kolom[]" value="pengarang" readonly></td>
          <td><input type="text" name="kolom[]"  ></td>
          <td><span style="color:red"> *</span></td>
        </tr>
				<tr>
          <td><input type="text" name="kolom[]" value="penerbit" readonly></td>
          <td><input type="text" name="kolom[]"  ></td>
          <td><span style="color:red"> *</span></td>
        </tr>
      </table>

      <div class="after-add-more"></div>

			<h5> ( <span style="color:red">* </span>) Harus Diisi</h5>
			<input type="submit" name="simpan" value="SIMPAN">
		</form>
		<!-- Copy Fields -->
		<div class="copy hide">
			<div class="rr">
				<table border="0" width="83%">
				<tr>
					<td><input type="text" name="kolom[]"  ></td>
					<td><input type="text" name="kolom[]"  ></td>
					<td><button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button></td>
				</tr>
			</table>
			</div>
		</div>

  </div>
	<div class="col-md-4 booking-form">
		<b>Detail Perpustakaan</b> <br/>
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
	<div class="clearfix"></div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".rr").remove();
      });
    });
</script>

<?php include "../__bawah.php"; ?>
