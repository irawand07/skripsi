<?php include "../__atas.php"; ?>
<?php include "../koneksi.php"; ?>

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
					 <li class="active"><a href="index.php">HOME</a></li>
					 <li><a class="scroll" href="perpustakaan.php">PERPUSTAKAAN</a></li>
					 <li><a class="scroll" href="verifikasi.php">VERIFIKASI</a></li>
					 <li><a class="scroll" href="webservice.php">WEB SERVICE</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="logout.php"><?php echo $_SESSION['nama']; ?> | Logout</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
</div>
<div class="rooms text-center">
</div>

<?php include "../__bawah.php"; ?>
