<?php
	define('DB_SERVER', 'localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','skripsi');
	session_start();

	class AksesDB{
		var $konek;
		function __construct(){
			$this->konek = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) OR die("Gagal Koneksi");
		}

    function login($user,$password,$akses){
      switch ($akses) {
        case 'admin':
          $id = "id_admin";
          $nama = "nama_admin";
          $query="select $id, $nama from $akses where username='$user' and password = '$password'";
          break;
        case 'pengguna':
          $id = "id_pengguna";
          $nama = "nama_pengguna";
          $query="select $id, $nama from $akses where email_pengguna='$user' and password_pengguna = '$password'";
          break;
        case 'perpustakaan':
          $id = "id_perpustakaan";
          $nama = "nama_perpustakaan";
          $query="select $id, $nama from $akses where email='$user' and password = '$password'";
          break;
      }
      if($hasil = mysqli_query($this->konek,$query)){
		      $row = mysqli_fetch_assoc($hasil);
		      $baris=mysqli_num_rows($hasil);
		          if ($baris==1){
		              $_SESSION['id']=$row[$id];
		              $_SESSION['nama']=$row[$nama];
									$_SESSION['akses']= $akses;
		              return true;
		          }else {
		              return false;
		          }
			 }else {
					return false;
			 }
		}

		function logout(){
				session_destroy();
		}

		function cekSession($akses){
				if (isset($_SESSION['akses'])){
					if ($_SESSION['akses'] == $akses){
						return true;
					}
				}
				return false;
		}

		function penggunaDaftar($nama,$jk,$email,$password,$tlp,$alamat){
				$query=mysqli_query($this->konek,"INSERT INTO pengguna (`nama_pengguna`, `jk_pengguna`, `email_pengguna`, `password_pengguna`, `tlp_pengguna`, `alamat_pengguna`)
					VALUES ('$nama', '$jk', '$email', '$password', '$tlp', '$alamat')");
				if ($query)
					return true;
				else
					return false;
		}

		function perpustakaanDaftar($nama,$email,$password,$tlp,$alamat){
				$query=mysqli_query($this->konek,"INSERT INTO perpustakaan (`nama_perpustakaan`, `email`, `password`, `tlp`, `alamat`)
					VALUES ('$nama', '$email', '$password', '$tlp', '$alamat')");
				if ($query)
					return true;
				else
					return false;
		}

		function perpustakaanVerifikasi($id,$url,$logo,$profil,$fasilitas,$pendaftaran,$peminjaman,$pengembalian,$longitude,$latitude){
				$query=mysqli_query($this->konek," UPDATE perpustakaan SET url_perpustakaan = '$url', logo_perpustakaan = '$logo',
					profil_perpustakaan = '$profil', fasilitas_perpustakaan = '$fasilitas', prosedur_pendaftaran_anggota = '$pendaftaran',
					prosedur_peminjaman = '$peminjaman',prosedur_pengembalian = '$pengembalian',longitude = '$longitude',latitude = '$latitude'
					WHERE id_perpustakaan = $id");
				if ($query)
					return true;
				else
					return false;

		}




  }

?>
