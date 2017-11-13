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
          <li><a class="scroll" href="perpustakaan.php">PERPUSTAKAAN</a></li>
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
       <?php
        $keyword="";
        $dasar="";
        $perpus='';
        if(isset($_GET['search'])){
          $keyword= $_GET['keyword'];
          $dasar= $_GET['dasar'];
          $perpus= $_GET['perpus'];
          $cari = new AksesDB();
					$buku = array();
					if($perpus=='terdekat'){
						$buku = array();
						$hasil = $cari->userAmbilPerpusTerdekat();
						while ($row=mysqli_fetch_assoc($hasil)){
							 $caribuku = $cari->userCariBuku($keyword, $dasar, $row['url_webservice'], $row['apikey'], $row['nama_tabel'], $row['struktur_tabel']);

							 $buku['id'] = $caribuku[0]['id'];
							 $buku['judul'] = $caribuku[0]['judul'];
							 $buku['isbn'] = $caribuku[0]['isbn'];
							 $buku['pengarang'] = $caribuku[0]['pengarang'];
							 $buku['penerbit'] = $caribuku[0]['penerbit'];
							 $buku['perpus'] = $row['id_perpustakaan'];

							 /*
							 foreach ($caribuku as $key) {
							    if (is_array($key)) {
							        foreach ($key as $key => $value) {
							            echo $key . ' : ' . $value . '<br />';
							        }
							    }
									echo $key['jumlah'];
							}

							 echo "<pre>";
							 print_r($caribuku);
							 */
						}


					}

        }
       ?>
       <h4>Hasil Pencarian</h4>
       <form action="" method="get" class="form-inline">
         <div class="form-group">
           <label class="sr-only" for="exampleInputEmail3">keyword</label>
           <input name="keyword" type="text" class="form-control" placeholder="Keyword" value="<?php echo $keyword ?>"/>
         </div>
         <div class="form-group">
           <select name="dasar" id="dasar" >
             <option value="semua" <?php if($dasar=='semua') echo 'selected'; ?> >SEMUA</option>
             <option value="isbn" <?php if($dasar=='isbn') echo 'selected'; ?>>ISBN</option>
             <option value="judul" <?php if($dasar=='judul') echo 'selected'; ?> >JUDUL</option>
             <option value="pengarang" <?php if($dasar=='pengarang') echo 'selected'; ?> >PENGARANG</option>
             <option value="penerbit" <?php if($dasar=='penerbit') echo 'selected'; ?> >PENERBIT</option>
           </select>
         </div>
         <div class="form-group">
           <select name="perpus" class="frm-field required">
           <option value='0' <?php if($perpus=0) echo 'selected'; ?> >Terdekat</option>
           <?php
             $perpus = new AksesDB();
             $hasil = $perpus->userAmbilPerpustakaanAktif();
             while ($row=mysqli_fetch_assoc($hasil)){
               if($perpus = $row['id_perpustakaan']){
                 $select = "selected";
               }else{
                 $select = "";
               }
               echo "<option value='".$row['id_perpustakaan']."' " .$select.">".$row['nama_perpustakaan']."</option>";
             }
           ?>
           </select>
         </div>

         <button name="search" type="submit" class="btn btn-default">Search</button>
       </form>





       <table class="hover table table-striped table-bordered data">
         <thead>
           <tr>
             <td></td>
           </tr>
   			</thead>
   			<tbody>
   				<?php
   	  		$no = 1;
   	  		while ($buku){
   	  			echo "<tr><td>";
   	  			echo "".$buku['id']."";
   	  			echo "</td></tr>";

   	  			$no++;
   	  		}
   	      ?>

       </tbody>
       </table>
			 <div class="clear"></div>
		   </div>
	  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable({"searching":   false,
        "ordering": false});
	});
</script>
<!---->

<?php include "__bawah.php"; ?>
