<?php include "../__atas.php"; ?>
<?php include "../koneksi.php"; ?>
<?php
	$login = new AksesDB();
	if ($login->cekSession("admin")) {
		header ("location: index.php");
	}
?>

<div class="rooms text-center">
	<div class="member text-center" >
		<h4 style="color: black;">Masuk Sebagai Admin</h4>
		<form action="#" method="post">
			<p style="color: black;">Username</p>
			<input type="text" name="username" placeholder="" required/>
			<p style="color: black;">Password</p>
			<input type="password" name="password" placeholder="" required/>
			<input type="hidden" name="akses" value="admin"/>
			<input type="submit" name="login" value="LOGIN"/>
		</form>
	</div>
</div>

<?php
	if (isset($_POST["login"])){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$akses = $_POST['akses'];
			$login = new AksesDB();
			if($login->login($username,$password,$akses)){
				header ("location: index.php");
			}else {
				echo "<script>alert('Username atau password salah')</script>";
			}

	}

?>

</body>
</html>
