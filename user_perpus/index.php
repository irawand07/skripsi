<?php include "../__atas.php"; ?>
<?php include "../koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("perpustakaan")) {
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
					<li class="active"><a href="index.php">HOME</a></li>
					<li><a class="scroll" href="profil.php">PROFIL</a></li>
					<li><a class="scroll" href="syarat.php">SYARAT PENDAFTRAN</a></li>
					<li><a class="scroll" href="aturan.php">ATURAN</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="package text-center">
	<?php
		if (isset($_GET['status'])) {
			$status = $_GET['status'];
			switch ($status) {
				case 'simpanok':
					echo '<div class="alert alert-success alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong>Sukses!</strong> Profil perpustakaan telah disimpan. </div>';
					break;
			}
		}
	?>
</div>

<?php include "../__bawah.php"; ?>
