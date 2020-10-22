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
      
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
     
	 <div class="col-lg-3 col-xs-6">
	    
        <div class="small-box bg-blue">
          <a href="pospay1.php" class="small-box-footer"><img src="../gambar/user/topup1.png" class="img-circle" height="100"></a>  
          <a href="pospay1.php" class="small-box-footer">Pulsa HP</a>
        </div>
      </div>

	  <div class="col-lg-3 col-xs-6">
	    
        <div class="small-box bg-red">
          <a href="pospay2.php" class="small-box-footer"><img src="../gambar/user/topup2.png" class="img-circle" height="100"></a>  
          <a href="pospay2.php" class="small-box-footer">Paket Data</a>
        </div>
      </div>
	 
	  <div class="col-lg-3 col-xs-6">

	   <div class="small-box bg-yellow">
          <a href="pospay3.php" class="small-box-footer"><img src="../gambar/user/topup2.png" class="img-circle" height="100"></a>  
          <a href="pospay3.php" class="small-box-footer">PLN</a>
        </div>
      </div>

  </section>

</div>
<?php include 'footer.php'; ?>