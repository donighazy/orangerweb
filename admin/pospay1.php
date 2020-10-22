<?php include 'header.php'; 
 $id = $_SESSION['id'];
 $query = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id_loket='$id'");
 $data  = mysqli_fetch_assoc($query);
 $saldo = $data['saldo'];
	
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pospay
      <small>Pulsa HP</small>
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

		  <?php 
		    if(isset($_GET['id_pospay'])){
		    $id_pospay = $_GET['id_pospay'];
			}
			if(isset($_GET['alert'])){
			  if($_GET['alert'] == "gagal"){
				echo "<div class='alert alert-danger'>TRANSAKSI GAGAL SALDO ANDA KURANG ...!</div>";
			  }else if($_GET['alert'] == "ok"){
				echo "<div class='alert alert-success'>PEMBELIAN PULSA BERHASIL
				<a href='pospay_print.php?id_pospay=".$id_pospay."' target='_blank' class='btn btn-sm btn-primary'><i class='fa fa-print'></i> &nbsp PRINT</a>
				
				</div>";
			  }	
			}
			?>
		
          <div class="box-header">
            <h3 class="box-title">Pulsa HP</h3>
            <a href="pospay.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="pospay1_act.php" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="idloket" value="<?php echo $id ?>">
              <div class="form-group">
                <label>Jenis Produk</label>
                <select class="form-control" name="jenisproduk" required="required" id="jenisproduk" >
				  <option value="">-- Pilih Produk --</option>
                  <?php
				   $qprov = mysqli_query($koneksi, "select * from ref_produk_pospay where jenis=1");
				   while($k = mysqli_fetch_array($qprov)){
                        ?>
                        <option value="<?php echo $k['id_produk']?>"><?php echo $k['nama_produk']; ?></option>
                        <?php 
                   }
                   ?>
                </select>
              </div>
              <div class="form-group">
                <label>No. HP</label>
                <input type="text" class="form-control" name="nohp" required="required">
              </div>
			  <div class="form-group">
                <label>Jumlah Voucher</label>
                <select class="form-control"  id="voucher" name="voucher" required="required">
				  <option value="">-- Pilih Jumlah Voucher --</option>
                  <option value="25000">Rp 25.000</option>
				  <option value="50000">Rp 50.000</option>
				  <option value="100000">Rp 100.000</option>
                </select>
              </div>
			  <div class="form-group">
                <label>Admin POS</label>
                <input type="number" class="form-control" name="adminpos" id="adminpos" required="required">
              </div>
			  <div class="form-group">
                <label>Total Bayar</label>
                <input type="number" class="form-control" id="total" name="total">
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
              </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>



<?php include 'footer.php'; ?>

