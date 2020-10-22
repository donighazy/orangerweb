<?php 
include '../koneksi.php';
$kprk      = $_POST['kprk'];
$norek     = $_POST['norek'];
$nama      = $_POST['nama'];
$nohp      = $_POST['nohp'];
$email     = $_POST['email'];
$npwp      = $_POST['npwp'];
$pin       = $_POST['pin'];
$id        = $_POST['userid'];


if($pin!=""){	
  mysqli_query($koneksi, 
  "update loket set kprk= '$kprk', norek='$norek', nama='$nama', nohp='$nohp', email='$email', npwp='$npwp'
   where id = '$id'");
  header("location:profil.php?alert=ok");	
}


