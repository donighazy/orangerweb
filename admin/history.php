<?php include 'header.php'; 
 $id = $_SESSION['id'];
 $query = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id_loket='$id'");
 $data  = mysqli_fetch_assoc($query);
 $saldo = $data['saldo'];
 
  if(isset($_POST['tanggal'])){
	$tanggal =  $_POST['tanggal'];
  } else {
	$tanggal =  date('Y-m-d');  
  }
	  
	
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Riwayat Transaksi
      <small>&nbsp;</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12 col-lg-offset-0">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">&nbsp;</h3>
            <a href="index.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="history.php" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="idloket" value="<?php echo $id ?>">
              
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d', strtotime($tanggal));?>" required="required">
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="View">
              </div>
			  <table class="table">
			     <tr>
			     <?php
				   if(isset($_POST['tanggal'])){
					 $dd = date('d',strtotime($tanggal));
					 $mm = date('n',strtotime($tanggal));
					 $tt = date('Y',strtotime($tanggal));
				     $query = 
                     "
					   select * from
							(
							select noref, tanggal,'PULSA HP' as ket from pospay where id_jenis=1
							union all 
							select noref, tanggal,'PAKET DATA' as ket from pospay where id_jenis=2
							union all
							select noref, tanggal,'PLN' as ket from pospay where id_jenis=3
							union all 
							select noref, tanggal,'KURIR DOKUMEN/PAKET DLM. NEGERI' as ket from kurir where id_jenis=1
							union all 
							select noref, tanggal,'KURIR DOKUMEN/PAKET LUAR NEGERI' as ket from kurir where id_jenis=2
							) t
						    WHERE day(tanggal) = '$dd' and month(tanggal) = '$mm' and year(tanggal) = '$tt'
							
							order by tanggal
					 ";					 
				   
				   $hasil = mysqli_query($koneksi, $query);
				   while($data  = mysqli_fetch_array($hasil)){
					   ?>
				         <tr>
						   <td>
						      <p><strong><font color="blue"><?php echo $data['tanggal'];?></font><strong></p>
							  <p><?php echo $data['noref'];?></p>
							  <p><?php echo $data['ket'];?></p>
						   </td>
                         </tr>						 
					   <?php
				   }
                   }
				   
				 ?>
			     
				
			  </table>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>