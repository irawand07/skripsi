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
					 <li><a class="scroll" href="webservice.php">WEB SERVICE</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="rooms ">
  <div class="col-md-10 booking-form">
    <table class="table table-striped table-bordered">
      <tr>
        <th>No</th>
        <th>Nama Perpustakaan</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Tgl Daftar</th>
        <th>Pilihan</th>
      </tr>

      <?php
      $ambil = new AksesDB();
  		$hasil=$ambil->adminAmbilVerifikasi();
  		$no = 1;
  		while ($row=mysqli_fetch_assoc($hasil)){
  			echo "<tr>";
  			echo "<td>".$no."</td>";
  			echo "<td> ".$row['nama_perpustakaan']."</td>";
  			echo "<td> ".$row['tlp']."</td>";
  			echo "<td> ".$row['email']."</td>";
  			echo "<td> ".$row['alamat']."</td>";
  			echo "<td> ".$row['tgl_daftar']."</td>";
  			echo "<td> <a href='verifikasidetail.php?id=".$row['id_perpustakaan']."'> Detail</a>
  			  </td>";
  			echo "</tr>";
  			$no++;
  		}
      ?>
    </table>
  </div>
</div>

<?php include "../__bawah.php"; ?>
