<?php 
include '../koneksi.php';
$id      = $_POST['idloket'];
$jumlah  = $_POST['jumlah'];
$tanggal = date('Y-m-d H:i:s');

$topup = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id='$id'");
$cek = mysqli_num_rows($topup);
if($cek > 0){
  mysqli_query($koneksi, "update loket_saldo set saldo=saldo+ '$jumlah' where id='$id'");
} else {
  mysqli_query($koneksi, "insert into loket_saldo(id, saldo) values('$id', $jumlah)");	
}



header("location:topup.php");