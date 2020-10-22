<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$pin = $_POST['pin'];
 
$login = mysqli_query($koneksi, "SELECT * FROM loket WHERE pin='$pin' and status='Aktif'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	
	$_SESSION['id'] = $data['id'];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['kprk'] = $data['kprk'];
	$_SESSION['nphp'] = $data['nohp'];
	header("location:admin/");
	
}else{
	header("location:index.php?alert=gagal");
}