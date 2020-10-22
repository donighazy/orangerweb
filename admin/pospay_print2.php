 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Pospay</title>
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
 </head>
 <body>

 	<?php 
  include '../koneksi.php';	
  if(isset($_GET['id_pospay'])){
	$id_pospay =   $_GET['id_pospay'];
    $query = mysqli_query($koneksi, "SELECT * FROM pospay WHERE id_pospay='$id_pospay'");
	$data  = mysqli_fetch_assoc($query);
	$notrans= str_pad($data['id_pospay'], 6, '0', STR_PAD_LEFT);
	
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
 					<!--tr>
 						<th>User</th>
 						<th>:</th>
                      	<td><?php echo $data['nohp']; ?></td>
 					</tr-->
 					<tr>
 						<th>No. Trans</th>
 						<th>:</th>
 						<td><?php echo $notrans; ?></td>
 					</tr>
					<tr>
 						<th>Waktu Transaksi</th>
 						<th>:</th>
 						<td><?php echo $data['tanggal']?></td>
 					</tr>
					<tr>
 						<th>No. Referensi</th>
 						<th>:</th>
 						<td><?php echo $data['noref']; ?></td>
 					</tr>
					
					<tr>
					   <th>&nbsp;</th>
					</tr>
					<tr>
					    <th colspan="3" style="text-align:center">PEMBAYARAN PAKET DATA</th>
					</tr>
					<tr>
					    <th>&nbsp;</th>
					</tr>
					<tr>
 						<th>NO. TELPON</th>
 						<th>:</th>
 						<td><?php echo $data['nohp']; ?></td>
 					</tr>
					<tr>
 						<th>TOTAL BAYAR</th>
 						<th>:</th>
 						<td>Rp <?php echo number_format($data['total'],0,',','.'); ?></td>
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
