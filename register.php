<?php 
include 'koneksi.php';
$kprk      = $_POST['kprk'];
$norek     = $_POST['norek'];
$nama      = $_POST['nama'];
$alamat    = $_POST['alamat'];
$nohp      = $_POST['nohp'];
$email     = $_POST['email'];
$npwp      = $_POST['npwp'];
$kelamin   = $_POST['kelamin'];
$agama     = $_POST['agama'];
$tgllahir  = date('Y-m-d',strtotime($_POST['tgllahir']));
$tanggalreg= date('Y-m-d H:i:s');
$pin       = $_POST['pin'];
$pos       = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

$reg = mysqli_query($koneksi, "SELECT * FROM loket WHERE pin='$pin'");
$cek = mysqli_num_rows($reg);

if($cek > 0){
  header("location:index.php?alert=gagalregister");	
} else {
  $nopin = $pin;	
  mysqli_query($koneksi, "insert into loket(pin, kprk, norek, nama, alamat, nohp, email, npwp, kelamin, tgllahir, agama, tglreg, status) 
  values('$nopin', '$kprk', '$norek','$nama','$alamat','$nohp','$email','$npwp','$kelamin','$tgllahir','$agama','$tanggalreg','Tidak Aktif')");
  
  $id_insert = mysqli_insert_id($koneksi);
  
  
  
  mysqli_query($koneksi, "insert into t_pegawailoket(pegawai_id, pegawai_nama, kprk, pegawai_no_hp, pegawai_email, pegawai_pos) 
  values('$id_insert', '$nama', '$kprk','$nohp','$email', '$pos')");
  
  mysqli_query($koneksi, "insert into validasi(pegawai_id, pegawai_nama, kprk, no_rek_giro, pegawai_no_hp, pegawai_email, pegawai_level) 
  values('$id_insert', '$nama', '$kprk','$norek','$nohp','$email','Tidak Aktif')");
  
  
  header("location:index.php?alert=okregister");
}


