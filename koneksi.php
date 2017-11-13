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

		function ambilData($table){
			$query=mysqli_query($this->konek,"select * from $table ");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;

		}

		function ambilDataTertentu($table, $field, $id){
			$query=mysqli_query($this->konek,"select * from $table where $field = $id ");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;

		}

		function ubahStatusVerifikasiPerpustakaan($id,$status){
			$query=mysqli_query($this->konek," UPDATE perpustakaan SET status_verifikasi = '$status'
				WHERE id_perpustakaan = $id ");
			if ($query)
				return true;
			else
				return false;
		}

		function gabungString($string){
				// Loop to store and display values of individual checked checkbox.
				foreach($string as $selected){
					$hasil .= $selected.";";
				}
				//Menghapus karakter terakhir
				$hasil = substr($hasil, 0, -1);
				return $hasil;
		}

		function simpanGambar($gambar,$lokasi){
			$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
			$nama = $gambar['name'];
			$x = explode('.', $nama); //untuk mengambil nama file gambarnya saja tanpa format gambarnya
			$ekstensi = strtolower(end($x));
			$ukuran	= $gambar['size'];
			$file_tmp = $gambar['tmp_name'];

			$nama_baru = $_SESSION['id'] . '.' . end($x);//fungsi untuk membuat nama baru

			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 1044070){
						move_uploaded_file($file_tmp, $lokasi.$nama_baru);
						return $nama_baru;
					}else{
						return "gagal";
					}
			}else{
					return "gagal";
			}
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
				$tgl=date('Y-m-d');
				$query=mysqli_query($this->konek,"INSERT INTO perpustakaan (`nama_perpustakaan`, `email`, `password`, `tlp`, `alamat`, `tgl_daftar`,`status_verifikasi`)
					VALUES ('$nama', '$email', '$password', '$tlp', '$alamat', '$tgl', 'Belum Verifikasi') ");
				if ($query)
					return true;
				else
					return false;
		}

		function perpustakaanVerifikasi($id,$url,$logo,$profil,$fasilitas,$pendaftaran,$peminjaman,$pengembalian,$longitude,$latitude){
				$query=mysqli_query($this->konek," UPDATE perpustakaan SET url_perpustakaan = '$url', logo_perpustakaan = '$logo',
					profil_perpustakaan = '$profil', fasilitas_perpustakaan = '$fasilitas', prosedur_pendaftaran_anggota = '$pendaftaran',
					prosedur_peminjaman = '$peminjaman',prosedur_pengembalian = '$pengembalian',longitude = '$longitude',latitude = '$latitude',
					status_verifikasi = 'Menunggu'
					WHERE id_perpustakaan = $id");
				if ($query)
					return true;
				else
					return false;

		}

		function adminAmbilVerifikasi(){
			$query=mysqli_query($this->konek,"select id_perpustakaan, nama_perpustakaan, tlp, email, alamat, tgl_daftar from perpustakaan
			 	where status_verifikasi = 'Menunggu' ");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;

		}

		function adminAmbilVerifikasiAdmin($id){
			$query=mysqli_query($this->konek,"select v.id_perpustakaan, v.tgl_verifikasi, v.status_verifikasi, v.keterangan, a.nama_admin  from verifikasi v, admin a where v.id_admin = a.id_admin and v.id_admin = $id ");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;
		}

		function adminSimpanVerifikasi($id,$status,$ket){
			$tgl=date('Y-m-d');
			$query=mysqli_query($this->konek,"INSERT into verifikasi (`id_perpustakaan`, `tgl_verifikasi`, `status_verifikasi`, `keterangan`, `id_admin`) VALUES
				($id,'$tgl','$status','$ket',{$_SESSION['id']} ) ");
				if ($query){
					$ubahStatus = $this->ubahStatusVerifikasiPerpustakaan($id,$status);
					if ($ubahStatus)
						return true;
				}
				return false;

		}

		function adminSimpanWS($id,$url,$apikey,$nama_tabel,$tabel){
			$query=mysqli_query($this->konek,"INSERT into ws_perpustakaan (`id_perpustakaan`, `url_webservice`, `apikey`,`nama_tabel`, `struktur_tabel`, `status_server`, `id_admin`) VALUES
				($id,'$url','$apikey','$nama_tabel','$tabel','Aktif',{$_SESSION['id']} ) ");
			if ($query)
					return true;
			else
					die ("Gagal melihat produk".mysqli_error($this->konek));

		}

		function adminAmbilPerpustakaan(){
			$query=mysqli_query($this->konek," SELECT p.id_perpustakaan , p.nama_perpustakaan, p.alamat, p.tlp, p.email, p.url_perpustakaan, p.tgl_daftar,
				p.status_verifikasi, status_server FROM perpustakaan p LEFT OUTER JOIN ws_perpustakaan USING(id_perpustakaan) ");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;
		}

		function adminAmbilWebservice(){
			$query=mysqli_query($this->konek,"SELECT id_perpustakaan, nama_perpustakaan, tlp, email, alamat, tgl_daftar, status_verifikasi from perpustakaan
				where status_verifikasi = 'Diterima' AND id_perpustakaan NOT IN (SELECT id_perpustakaan FROM ws_perpustakaan) ");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;

		}

		function userAmbilPerpustakaan(){
			$query=mysqli_query($this->konek," SELECT p.id_perpustakaan , p.nama_perpustakaan, p.alamat, p.tlp, p.email,p.logo_perpustakaan, p.url_perpustakaan, p.tgl_daftar,
				 ws.id_perpustakaan, ws.status_server FROM perpustakaan p, ws_perpustakaan ws WHERE p.id_perpustakaan = ws.id_perpustakaan");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;
		}

		function userAmbilPerpustakaanAktif(){
			$query=mysqli_query($this->konek," SELECT p.id_perpustakaan , p.nama_perpustakaan,
				 ws.id_perpustakaan, ws.status_server FROM perpustakaan p, ws_perpustakaan ws WHERE p.id_perpustakaan = ws.id_perpustakaan AND ws.status_server='Aktif'");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;
		}

		function userAmbilPerpusTerdekat(){
			$query=mysqli_query($this->konek," SELECT p.id_perpustakaan , p.nama_perpustakaan,
				 ws.id_perpustakaan, ws.url_webservice, ws.apikey, ws.nama_tabel, ws.struktur_tabel, ws.status_server FROM perpustakaan p, ws_perpustakaan ws WHERE p.id_perpustakaan = ws.id_perpustakaan AND ws.status_server='Aktif'");
			if (!$query)
				die ("Gagal melihat produk".mysqli_error($this->konek));
			return $query;
		}


		function userCariBuku($keyword, $dasar, $url, $apikey, $nama_tabel, $struktur_tabel){
			$arr = explode(",", $struktur_tabel);
			$jum = count($arr);
			//print_r($arr);
			$tabel =array();
			$no=1;
			for ($i=0; $i <$jum-1 ; $i++) {
				 $tabel[$arr[$i]] = $arr[$no];
				 $no = $no + 2;
				 $i++;
			}

			if ($dasar=='semua') {
				$url = $url."?keyword=".$keyword."&aksi=carisemua&tabel=".$nama_tabel."&isbn=".$tabel['isbn']."&judul=".$tabel['judul']."&pengarang=".$tabel['pengarang']."&penerbit=".$tabel['penerbit']."&key=".$apikey;
				$json = file_get_contents($url);
				$data = json_decode($json,true);
				return $data;

			}else {

			}
		}




  }

?>
