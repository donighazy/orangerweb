<?php 
include 'koneksi.php';
$id      = $_POST['baru_id'];
$pin     = $_POST['baru_pin'];
$piin     = $_POST['baru_piin'];
$tanggal = date('Y-m-d');
$query   = mysqli_query($koneksi, "SELECT * FROM loket WHERE pin='$pin'");
$cek     = mysqli_num_rows($query);


/*//asli
if($cek < 1){
	  mysqli_query($koneksi, "update loket set pin= '$pin' where id = '$id'");
	  
	  header("location:index.php?alert=okpinbaru");	
	} else {
	  header("location:index.php?alert=gagalpinbaru");
	}


//proto
if($cek < 1){
  mysqli_query($koneksi, "update loket set pin= '$pin' where id = '$id'");
  
  header("location:index.php?alert=okpinbaru");	
} else {
  header("location:index.php?alert=tdksamapinbaru")
} else {
  header("location:index.php?alert=gagalpinbaru");
}
}*/


//proto
if($pin==$piin){	

	if($cek < 1){
	  mysqli_query($koneksi, "update loket set pin= '$pin' where id = '$id'");
	  
	  header("location:index.php?alert=okpinbaru");	
	} else {
	  header("location:index.php?alert=gagalpinbaru");
	}

}
else {
  header("location:index.php?alert=tdksamapinbaru");
}
