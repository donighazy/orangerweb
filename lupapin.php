<?php 
include 'koneksi.php';
$id      = $_POST['lupa_id'];
/*$nama    = $_POST['lupa_nama'];
$email   = $_POST['lupa_email'];
$hp      = $_POST['lupa_nohp'];*/
$tanggal = date('Y-m-d');
$query   = mysqli_query($koneksi, "SELECT * FROM loket WHERE id='$id' ");
$cek     = mysqli_num_rows($query);

//AND nama='$nama' and email='$email' and nohp='$hp'

if($cek > 0){
  $data  = mysqli_fetch_assoc($query);
  $pin   = $data['id'];	
  
  mysqli_query($koneksi, "insert into approval(pegawai_id, jenis_approval, status, tgl_req) 
  values('$id', 'Lupa PIN','Request','$tanggal')");
  
  mysqli_query($koneksi, "update loket set status = 'Blokir' where id = '$id'");

  /*
  mysqli_query($koneksi, "insert into approval(pegawai_id, jenis_approval, pegawai_nama, pegawai_no_hp, pegawai_email, 
  status, tgl_req) 
  values('$id', 'Lupa PIN','$nama', '$hp','$email','Request','$tanggal')");
  */
/*
  mysqli_query($koneksi, "update loket set status = 'Blokir' where id = '$id'");
*/  

  header("location:index.php?alert=okpin&pin=".$pin."");	
} else {
  header("location:index.php?alert=gagalpin");
}


