<?php include "__atas.php"; ?>
<?php include_once "koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if (!$login->cekSession("pengguna")) {
		$info['ket'] = "MASUK / DAFTAR" ;
		$info['link'] = "login.php";
	}else{
		$info['ket'] =$_SESSION['nama']." | Logout";
		$info['link'] = "logout.php";
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
          <li class="active"><a class="scroll" href="perpustakaan.php">PERPUSTAKAAN</a></li>
          <li><a class="scroll" href="fasilitas.php">FASILITAS</a></li>
          <li><a class="scroll" href="favorit.php">FAVORIT</a></li>
          <li><a style="color: #FFD700" class="scroll" href="<?php echo $info['link'] ?>"><?php echo $info['ket'] ?></a></li>
       </ul>

      </div>
      <div class="clearfix"></div>
     </div>
   </div>
</div>
<!---->
<div class="main_bg">
	 <div class="container">
		 <div class="main">
       <ul class="service_list">
       <?php
          $ambilPerpus = new AksesDB();
          $hasil=$ambilPerpus->userAmbilPerpustakaan();
          $no=1;
  	  		while ($row=mysqli_fetch_assoc($hasil)){
  	  			echo "<li>";
  	  			echo "<div class='ser_img'><a href='detailperpus.php?id=".$row['id_perpustakaan']."'><img height='150px' width='100px' src='assets/images/perpus_logo/".$row['logo_perpustakaan']."' alt='' /></a></div>";

  	  			echo "<a href='detailperpus.php?id=".$row['id_perpustakaan']."'><h3>".$row['nama_perpustakaan']."</h3></a>";
  	  			echo "<p class='para'>".$row['alamat']."</p>";
  	  			echo "<h4>Terdaftar = ".$row['tgl_daftar']."</h4>";
            echo "</li>";
            if ($no % 4 == 0) {
              echo "</ul>	  <ul class='service_list top'>";
            }
            $no++;
  	  		}
        ?>
			 <div class="clear"></div>
		   </div>
	  </div>
</div>
<!---->
<?php include "__bawah.php"; ?>
