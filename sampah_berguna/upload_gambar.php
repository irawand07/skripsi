<?php
error_reporting(0);
include "koneksi.php";

////////////////////////////////////////add atau input data////////////////////////////////
if (isset($_POST['add'])) {
$ket = $_POST['ket'];
///////////////////////////direktori untuk menyimpan gambar ////////////////////////////////
$lokasi_file = $_FILES['gambar']['tmp_name'];
$foto_file = $_FILES['gambar']['name'];
$tipe_file = $_FILES['gambar']['type'];
$ukuran_file = $_FILES['gambar']['size'];

$direktori = "upload/$foto_file";
$sql = null;
$MAX_FILE_SIZE = 1000000;
//100kb
if($ukuran_file > $MAX_FILE_SIZE) {
    header("Location:tambah.php");
    exit();
}
$sql = null;
if($ukuran_file > 0) {
    move_uploaded_file($lokasi_file, $direktori);
}

// perintah SQL
$query="INSERT INTO tabel_gambar (id,gambar,ket) VALUES ('','$foto_file' ,'$ket') " ;

$hasil=mysqli_query($query);

if ($hasil){
//header ('location:view.php');
echo " <center> <b> <font color = 'red' size = '4'> <p> Data Berhasil disimpan </p> </center> </b> </font> <br/>
 <meta http-equiv='refresh' content='2; url= index.php'/>  ";
} else { echo "Data gagal disimpan
 <meta http-equiv='refresh' content='2; url= tambah.php'/> ";
}
  }
?>
<html>
<head>
 <title> Tambah Data Gambar </title>
 <link href ="css_submit.css" rel="stylesheet" type="text/css">

</head>
<body width='900px' style = 'margin : 20px; font : 16px arial;'>
<center>
<h3> MEMBUAT UPLOAD IMAGE/GAMBAR</h3>  UpLoad gambar dengan Preview menggunakan PHP dan Javascript
<hr>
<br>
 <center>
 <p> Tambah Data Gambar</p>

 <form method = 'POST' action = ' ' enctype ="multipart/form-data" role="form">
 <table border = '1' cellspacing = '1' cellpadding = '10'
 style = 'border : #aaa; color: #101; font-family : arial; fot-size : 12px;'>
 <tr>
  <td> gambar </td>
  <td width = '5' align = 'center'> : </td>
  <td widht="5">
   <input type="file"   id="uploadImage1"  onchange="PreviewImage(1)" name='gambar'>
         <br>
         <br>
          <a class="cboxElement " > <?php echo " <img src='upload/". $data['gambar'] ."' id='uploadPreview1' width='100' height='120'/>"; ?> </a>

   </td>
  </tr>
 <tr>
  <td> Keterangan </td>
  <td align = 'center'> : </td>
  <td> <input type = 'text' placeholder='Keterangan' name = 'ket' /> </td>
  </tr>

 <tr>
 <td colspan = '3' align = 'center'>
 <input type = 'submit' name = 'add' value = 'Submit'/>
 <input type = 'reset' name = 'Reset' value = 'Reset' /> </td>
 </tr>
</table>
<a href = 'index.php'> Kembali </a>
</form>

    <!-- upload gambar dengan preview -->
    <script type="text/javascript">
    function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage"+no).files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
        };
    }
</script>
<!-- end upload gambar dengan preview -->
</body>
</html>
