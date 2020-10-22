<?php
    include '../koneksi.php';
   
    $jenis = $_GET['jenis'];
    $id    = $_GET['id'];
  
	$query = mysqli_query($koneksi, "SELECT * FROM ref_produk_pospay WHERE id_produk='$id' and jenis= '$jenis'");
	$data  = mysqli_fetch_assoc($query);
	$admin = $data['admin'];
	echo $admin;
  
  
  

?>