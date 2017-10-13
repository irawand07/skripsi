<?php
  include "../koneksi.php"; 
  $logout = new AksesDB();
  $logout->logout();
  header ("location: login.php");
?>
