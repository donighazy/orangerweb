<?php 
include '../koneksi.php';
$id          = $_POST['idloket'];
$jenisproduk = $_POST['jenisproduk'];
$nohp        = $_POST['nohp'];
$jumlah      = $_POST['voucher'];
$admin       = $_POST['adminpos'];
$total       = $_POST['total'];
$tanggal     = date('Y-m-d H:i:s');
$noref       = date('yy').'ORG'.str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

$query = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id_loket='$id'");
$data  = mysqli_fetch_assoc($query);
$saldo = $data['saldo'];

if($saldo>$total){
	mysqli_query($koneksi,"update loket_saldo set saldo= saldo - $total where id_loket = $id ");
	
	mysqli_query($koneksi, "insert into pospay(id_loket, id_jenis, id_produk, tanggal, nohp, nominal, admin, total, noref) 
	values('$id', 1, '$jenisproduk', '$tanggal','$nohp', '$jumlah', '$admin', '$total', '$noref')");
    $id_insert = mysqli_insert_id($koneksi);
	//update saldo
	
	$query      = mysqli_query($koneksi, "SELECT * FROM loket  WHERE id='$id'");
    $data       = mysqli_fetch_assoc($query);
    $kprk       = $data['kprk'];
	
	$regional   = $kprk;
	$jenis      = 'Pulsa HP';
	$jenisid    = '5';
	$billnumber = date('Y').str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);;
	$paycode    = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);;
	$resi       = 'PP'.str_pad(mt_rand(0, 999999), 10, '0', STR_PAD_LEFT);;
	
	mysqli_query($koneksi, "insert into transaksi(pegawai_id, ref_regional, transaksi_tanggal, transaksi_jenis, 
	jenis_id, billnumber, no_transaksi, jmllembar, nominal_tagihan, payment_code, jmltrx, no_resi) 
	values('$id', '$regional', '$tanggal', '$jenis','$jenisid', '$billnumber','$noref', 1, '$total', '$paycode', 1, '$resi')");
	
	
	header("location:pospay1.php?alert=ok&id_pospay=".$id_insert);
} else {
    header("location:pospay1.php?alert=gagal");	
}