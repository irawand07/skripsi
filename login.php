<?php include "__atas.php"; ?>
<?php include "koneksi.php"; ?>

<?php
	$login = new AksesDB();
	if ($login->cekSession("pengguna")) {
		header ("location: index.php");
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
					 <li><a class="scroll" href="fasilitas.php">FASILITAS</a></li>
					 <li><a class="scroll" href="favorit.php">FAVORIT</a></li>
					 <li class="active"><a style="color: #FFD700" class="scroll" href="login.php">MASUK / DAFTAR</a></li>
				</ul>

			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>

<div class="contact-bg2">
	<div class="container">
		<div class="booking">
			<div class="col-md-7 booking-form">
				<h4 style="color: black;">Daftar Sebagai Pengguna</h4>
				<form action="#" method="post">
					 <h5>Nama <span style="color:red"> *</span></h5>
					 <input name="nama" type="text" value="">
	 				 <h5>Gender <span style="color:red"> *</span></h5>
	 				 <input name="jk" type="radio" value="Pria">Pria
					 <input name="jk" type="radio" value="Wanita">Wanita
					 <h5>Email <span style="color:red"> *</span></h5>
					 <input name="email" type="text" value="">
					 <h5>Masukkan Password <span style="color:red"> *</span></h5>
					 <input name="password" type="password" value="">
					 <h5>Ulangi Password <span style="color:red"> *</span></h5>
					 <input type="password" value="">
					 <h5>Np Telepon/HP</h5>
					 <input name="tlp" type="text" value="" placeholder="(opsional)">
					 <h5>Alamat</h5>
					 <textarea name="alamat" placeholder="(opsional)" ></textarea>
					 <h5> ( <span style="color:red">* </span>) Harus Diisi</h5>
					 <input type="submit" name="daftar" value="DAFTAR">
				 </form>
			</div>
			<div class="col-md-4 member">
				<br/><br/>
				<h4 style="color: black;">Masuk Sebagai Pengguna</h4>
				<form action="#" method="post">
					<p style="color: black;">Email</p>
					<input type="text" name="email" placeholder="" required/>
					<p style="color: black;">Password</p>
					<input type="password" name="password" placeholder="" required/>
					<input type="hidden" name="akses" value="pengguna"/>
					<input type="submit" name="login" value="LOGIN"/>
					<br/><br/>
				</form>
			</div>

		</div>
	</div>
</div>

<?php
	if (isset($_POST["login"])){
			$username = $_POST['email'];
			$password = md5($_POST['password']);
			$akses = $_POST['akses'];
			$login = new AksesDB();
			if($login->login($username,$password,$akses)){
				header ("location: index.php");
			}else {
				echo "<script>alert('Username atau password salah')</script>";
			}
	}elseif (isset($_POST["daftar"])) {
			$nama = $_POST['nama'];
			$jk = $_POST['jk'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$tlp = $_POST['tlp'];
			$alamat = $_POST['alamat'];

			$daftar = new AksesDB();
			if($daftar->penggunaDaftar($nama,$jk,$email,$password,$tlp,$alamat)){
				echo "<script>alert('Pendaftaran sukses, Silahkan login')</script>";
			}else {
				echo "<script>alert('Mohon Maaf ada keselahan silahkan ulangi beberapa saat lagi')</script>";
			}
	}

?>

<?php include "__bawah.php"; ?>
