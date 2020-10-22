 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>RESI KURIR</title>
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
 </head>
 <body>

 	<?php 
  include '../koneksi.php';	
  if(isset($_GET['id_kurir'])){
	$id_kurir =   $_GET['id_kurir'];
    $query = mysqli_query($koneksi, "SELECT * FROM kurir WHERE id_kurir='$id_kurir'");
	$data  = mysqli_fetch_assoc($query);
	$notrans= str_pad($data['id_kurir'], 6, '0', STR_PAD_LEFT);
	$idtarif= $data['tarif_jenis'];
	$idkotak= $data['pengirim_kota'];
	$idkotat= $data['penerima_kota'];
	
	
	$qdata = mysqli_query($koneksi, "SELECT * FROM tarif_paket WHERE id_tarif='$idtarif'");
	$vdata1 = mysqli_fetch_assoc($qdata);
	
	$jenis_kiriman = $vdata1['nama'];
	
	$qdata = mysqli_query($koneksi, "SELECT * FROM ref_kota WHERE id_kota='$idkotak'");
	$vdata2 = mysqli_fetch_assoc($qdata);
	$pengirim_kota = $vdata2['nama_kota'];
	
	$qdata = mysqli_query($koneksi, "SELECT * FROM ref_kota WHERE id_kota='$idkotat'");
	$vdata3 = mysqli_fetch_assoc($qdata);
	$penerima_kota = $vdata3['nama_kota'];
	
	
  ?>

 		<div class="row">
 			<div class="col-lg-6">
			    
				
 				<table class="table- table-bordered-">
				    <tr>
					   <th colspan="3">Authorized PT. POS Indonesia (PERSERO)</th>
					</tr>
					<tr>
					   <th colspan="3">ORANGER</th>
					</tr>
					<tr>
					   <td colspan="3">----------------------------------------------------------</td>
					</tr>
 					
 					
					<tr>
 						<th>Tanggal Posting</th>
 						<th>:</th>
 						<td><?php echo date('d-m-Y',strtotime($data['tanggal']))?></td>
 					</tr>
					<tr>
 						<th>Waktu Posting</th>
 						<th>:</th>
 						<td><?php echo date('H:i:s',strtotime($data['tanggal']))?></td>
 					</tr>
					<tr>
					   <td colspan="3">----------------------------------------------------------</td>
					</tr>
					<tr>
 						<th>Jenis Kiriman</th>
 						<th>:</th>
 						<td><?php echo $jenis_kiriman; ?></td>
 					</tr>
					<tr>
					   <td colspan="3">----------------------------------------------------------</td>
					</tr>
					<tr>
 						<th>PENERIMA</th>
 						<th>:</th>
 						<td></td>
 					</tr>
					<tr>
 						<td colspan="3"><?php echo $data['penerima_nama']?></td>
 					</tr>
					<tr>
 						<td colspan="3"><?php echo $data['penerima_alamat']?></td>
 					</tr>
					<tr>
 						<td colspan="3"><?php echo $data['penerima_hp']?></td>
 					</tr>
					<tr>
					   <th>&nbsp;</th>
					</tr>
					<tr>
					   <td colspan="3">======================================================</td>
					</tr>
					<tr>
 						<th>Tanggal Posting</th>
 						<th>:</th>
 						<td><?php echo date('d-m-Y',strtotime($data['tanggal']))?></td>
 					</tr>
					<tr>
 						<th>Waktu Posting</th>
 						<th>:</th>
 						<td><?php echo date('H:i:s',strtotime($data['tanggal']))?></td>
 					</tr>
					<tr>
					   <td colspan="3">----------------------------------------------------------</td>
					</tr>
					<tr>
 						<th>Jenis Kiriman</th>
 						<th>:</th>
 						<td><?php echo $jenis_kiriman?></td>
 					</tr>
					<tr>
					   <td colspan="3">----------------------------------------------------------</td>
					</tr>
					<tr>
 						<th>Pengirim</th>
 						<th>*</th>
 						<td>Penerima</td>
 					</tr>
					<tr>
 						<td><?php echo $data['pengirim_nama']?></td>
						<td>:</td>
						<td><?php echo $data['penerima_nama']?></td>
						
 					</tr>
					<tr>
 						<td><?php echo $pengirim_kota?></td>
						<td>:</td>
						<td><?php echo $penerima_kota?></td>
						
 					</tr>
					
 				</table>

 			</div>
 		</div>

 		

 		<?php 
 	}?>


 	<script>

 		window.print();
 		
 	</script>

 </body>
 </html>
