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
					 <li class="active"><a href="index.php">HOME</a></li>
					 <li><a class="scroll" href="perpustakaan.php">PERPUSTAKAAN</a></li>
					 <li><a class="scroll" href="fasilitas.php">FASILITAS</a></li>
					 <li><a class="scroll" href="favorit.php">FAVORIT</a></li>
					 <li><a style="color: #FFD700" class="scroll" href="<?php echo $info['link'] ?>"><?php echo $info['ket'] ?></a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
	  <div class="banner">
			<div class="banner-info text-center">
				<h3><label>Satu </label> Pencarian ke Beberapa Perpustakaan</h3>
				<div class="cari">
					<form action="hasilcari.php" method="get" autocomplete="off">
						<h5>SILAHKAN CARI BUKU YANG ANDA INGINKAN :</h5>
						<div class="contact-form">
							<h5>
								<input name="keyword" type="text" class="form-control input-lg" placeholder="Masukkan isbn / judul / pengarang / penerbit" >
								<br/>
								<a href="#spesifik" data-toggle="collapse" style="color: black;"><u>Pencarian Spesifik</u></a>
							</h5>
								<div id="spesifik" class="collapse">
									 <br/>
									 <ul>
										 <li class="span1_of_1">
											 <h5>Berdasarkan</h5>
											 <div class="section_room">
											      <select name="dasar" id="dasar" >
														<option value="semua">SEMUA</option>
														<option value="isbn">ISBN</option>
														<option value="judul">JUDUL</option>
														<option value="pengarang">PENGARANG</option>
														<option value="penerbit">PENERBIT</option>
											      </select>
											 </div>
										 </li>
										 <li class="span1_of_1">
											 <h5>Perpustakaan</h5>
											 <div class="section_room">
											      <select name="perpus" class="frm-field required">
														<option value="terdekat">Terdekat</option>
														<?php
															$perpus = new AksesDB();
															$hasil = $perpus->userAmbilPerpustakaanAktif();
															while ($row=mysqli_fetch_assoc($hasil)){
																echo "<option value='".$row['id_perpustakaan']."'>".$row['nama_perpustakaan']."</option>";
															}
														?>
											      </select>
											 </div>
										 </li>

										 <div class="clearfix"></div>
									 </ul>
								</div>

							<h4><button name="search" type="submit" class="btn primary" >Search</button></h4>
						</div>


				 </form>
				 </div>
			</div>
	  </div>
</div>
<!--
<div class="online_reservation">
		   <div class="b_room">
			  <div class="booking_room">
				  <div class="reservation">
					<form action="index.php" method="get" autocomplete="off">
						<div class="form-group">
							<h5>SILAHKAN CARI BUKU YANG ANDA INGINKAN :</h5>
							<input type="text" class="form-control" placeholder="Masukkan nibn / judul / pengarang / penerbit">
						</div>
						<button type="submit" class="btn" >Search</button>
					</form>


				 </div>
			  </div>
				<div class="clearfix"></div>
		  </div>
</div>
-->
<div class="package text-center">
	 <div class="container">
		 <h3>Perpustakaan Terbaru</h3>
		 <p>Berikut merupakan perpustakaan yang baru saja bergabung ke dalam sistem pencarian buku dari beberapa perpustakaan.</p>

		  <div id="owl-demo" class="owl-carousel">
			  <div class="item text-center image-grid">
					<ul>
					 <li><img src="images/1.jpg" alt=""></li>
					 <li><img src="images/2.jpg" alt=""></li>
					 <li><img src="images/3.jpg" alt=""></li>
					 </ul>
			  </div>
			  <div class="item text-center image-grid">
					<ul>
					<li> <img src="images/3.jpg" alt=""></li>
					 <li><img src="images/4.jpg" alt=""></li>
					 <li><img src="images/5.jpg" alt=""></li>
					 </ul>
			  </div>
			  <div class="item text-center image-grid">
					<ul>
					<li> <img src="images/6.jpg" alt=""></li>
					 <li><img src="images/2.jpg" alt=""></li>
					 <li><img src="images/8.jpg" alt=""></li>
					 </ul>
			  </div>
		  </div>
	 </div>
</div>
<!---->
<!---->
<div class="rooms text-center">
	 <div class="container">
		 <h3>Koleksi Buku Terbaru</h3>
		 <div class="room-grids">
			 <div class="col-md-4 room-sec">
				 <img src="images/pic1.jpg" alt=""/>
				 <h4>Standard Double Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic2.jpg" alt=""/>
				 <h4>Supperior Double Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic3.jpg" alt=""/>
				 <h4>Family Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic4.jpg" alt=""/>
				 <h4>Standard Single Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic5.jpg" alt=""/>
				 <h4>Supperior Single Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic6.jpg" alt=""/>
				 <h4>VIP Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<?php include "__bawah.php"; ?>
