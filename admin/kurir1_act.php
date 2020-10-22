<?php 
include '../koneksi.php';
$id              = $_POST['idloket'];
$kiriman_jenis   = $_POST['kiriman_jenis'];
$kiriman_berat   = $_POST['kiriman_berat'];
$kiriman_isi     = $_POST['kiriman_isi'];

$tujuan_kodepos  = $_POST['tujuan_kodepos'];
$tujuan_prov     = $_POST['tujuan_provinsi'];
$tujuan_kota     = $_POST['tujuan_kota'];
$tujuan_kec      = $_POST['tujuan_kecamatan'];
$tujuan_kel      = $_POST['tujuan_kelurahan'];

$tarif_jenis     = $_POST['tarif_jenis'];
$tarif_ongkir    = $_POST['tarif_ongkir'];

$pengirim_nama   = $_POST['pengirim_nama'];
$pengirim_alamat = $_POST['pengirim_alamat'];
$pengirim_kel    = $_POST['pengirim_kelurahan'];
$pengirim_kota   = $_POST['pengirim_kota'];
$pengirim_kec    = $_POST['pengirim_kecamatan'];
$pengirim_hp     = $_POST['pengirim_hp'];
$pengirim_kodepos= $_POST['pengirim_kodepos'];

$penerima_nama   = $_POST['penerima_nama'];
$penerima_alamat = $_POST['penerima_alamat'];
$penerima_kel    = $_POST['penerima_kelurahan'];
$penerima_kota   = $_POST['penerima_kota'];
$penerima_prov   = $_POST['penerima_provinsi'];
$penerima_kec    = $_POST['penerima_kecamatan'];
$penerima_hp     = $_POST['penerima_hp'];
$penerima_kodepos= $_POST['penerima_kodepos'];
$penerima_pesan  = $_POST['penerima_pesan'];

$total       = $tarif_ongkir;
$tanggal     = date('Y-m-d H:i:s');
$noref       = date('yy').'ORG'.str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

$query = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id_loket='$id'");
$data  = mysqli_fetch_assoc($query);
$saldo = $data['saldo'];

if($saldo>$total){
	//update saldo
	mysqli_query($koneksi,"update loket_saldo set saldo= saldo - $total where id_loket = $id ");	
	
	mysqli_query($koneksi, "insert into kurir(id_jenis, id_loket, tanggal, noref, 
	kiriman_jenis, kiriman_berat, kiriman_isi,
	tujuan_kodepos, tujuan_prov, tujuan_kota, tujuan_kec, tujuan_kel, 
	tarif_jenis, tarif_ongkir,
	pengirim_nama, pengirim_alamat, pengirim_kel, pengirim_kec, pengirim_kota, pengirim_kodepos, pengirim_hp,
	penerima_nama, penerima_alamat, penerima_kel, penerima_kec, penerima_kota, penerima_prov, penerima_kodepos, penerima_hp,penerima_pesan	
	)
	values(1, '$id', '$tanggal','$noref', 
	'$kiriman_jenis', '$kiriman_berat', '$kiriman_isi',
	'$tujuan_kodepos', '$tujuan_prov', '$tujuan_kota', '$tujuan_kec', '$tujuan_kel', 
	'$tarif_jenis', '$tarif_ongkir',
	'$pengirim_nama', '$pengirim_alamat', '$pengirim_kel', '$pengirim_kec', '$pengirim_kota', '$pengirim_kodepos', '$pengirim_hp',
	'$penerima_nama', '$penerima_alamat', '$penerima_kel', '$penerima_kec', '$penerima_kota', '$penerima_prov', '$penerima_kodepos', '$penerima_hp','$penerima_pesan')		
	");

	
	$id_insert = mysqli_insert_id($koneksi);
	
	$query      = mysqli_query($koneksi, "SELECT * FROM loket  WHERE id='$id'");
    $data       = mysqli_fetch_assoc($query);
    $kprk       = $data['kprk'];
	
	$regional   = $kprk;
	$jenis      = 'Dalam Negeri';
	$jenisid    = '10';
	$billnumber = date('Y').str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);;
	$paycode    = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);;
	$resi       = 'KR'.str_pad(mt_rand(0, 999999), 10, '0', STR_PAD_LEFT);;
	
	mysqli_query($koneksi, "insert into transaksi(pegawai_id, ref_regional, transaksi_tanggal, transaksi_jenis, 
	jenis_id, billnumber, no_transaksi, jmllembar, nominal_tagihan, payment_code, jmltrx, no_resi) 
	values('$id', '$regional', '$tanggal', '$jenis','$jenisid', '$billnumber','$noref', 1, '$total', '$paycode', 1, '$resi')");
	
	
	
    header("location:kurir1.php?alert=ok&id_kurir=".$id_insert);
} else {
    header("location:kurir1.php?alert=gagal");	
}