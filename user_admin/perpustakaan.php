<?php include "../__atas.php"; ?>
<?php include_once "../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("admin")) {
		header ("location: login.php");
	}
?>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/DataTables/media/css/dataTables.bootstrap.css">

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
					 <li class="active"><a class="scroll" href="perpustakaan.php">PERPUSTAKAAN</a></li>
					 <li><a class="scroll" href="verifikasi.php">VERIFIKASI</a></li>
					 <li><a class="scroll" href="webservice.php">WEB SERVICE</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="rooms ">
  <div class="col-md-12 booking-form">
    <table class="table table-striped table-bordered data">
      <thead>
				<tr>
          <th>No</th>
          <th>Nama</th>
          <th>Telepon</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Url</th>
          <th>Tgl Daftar</th>
          <th>Verifikasi</th>
          <th>Server</th>
				</tr>
			</thead>
			<tbody>
				<?php
	      $ambil = new AksesDB();
	  		$hasil=$ambil->adminAmbilPerpustakaan();
	  		$no = 1;
	  		while ($row=mysqli_fetch_assoc($hasil)){
	  			echo "<tr>";
	  			echo "<td>".$no."</td>";
	  			echo "<td> ".$row['nama_perpustakaan']."</td>";
	  			echo "<td> ".$row['tlp']."</td>";
	  			echo "<td> ".$row['email']."</td>";
	  			echo "<td> ".$row['alamat']."</td>";
					echo "<td> ".$row['url_perpustakaan']."</td>";
	  			echo "<td> ".$row['tgl_daftar']."</td>";
					echo "<td> ".$row['status_verifikasi']."</td>";
					if ($row['status_server']=="") {
						if ($row['status_verifikasi']=="Diterima")
							echo "<td> Belum Diinputkan</td>";
						else
							echo "<td> Belum Tersedia</td>";
					}else {
							echo "<td> ".$row['status_server']."</td>";
					}

	  			echo "</tr>";
	  			$no++;
	  		}
	      ?>

    </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>

<?php include "../__bawah.php"; ?>
