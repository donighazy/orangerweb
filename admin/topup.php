<?php include 'header.php'; 
 $id = $_SESSION['id'];
 $query = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id='$id'");
 $data  = mysqli_fetch_assoc($query);
 $saldo = $data['saldo'];
	
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Top Up
      <small>Tambah Saldo Loket</small>
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
            <h3 class="box-title">Saldo Loket</h3>
            <a href="index.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="topup_act.php" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="idloket" value="<?php echo $id ?>">
              <div class="form-group">
                <label>Saldo Saat ini : </label>
                <input type="text" class="form-control" name="saldo" value="<?php echo 'Rp '.number_format($saldo,0,',','.') ?>" readonly>
              </div>
              <div class="form-group">
                <label>Jumlah Top Up</label>
                <input type="number" class="form-control" name="jumlah" required="required">
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