<?php include 'header.php'; 
 $id = $_SESSION['id'];
 $query = mysqli_query($koneksi, "SELECT * FROM loket_saldo WHERE id_loket='$id'");
 $data  = mysqli_fetch_assoc($query);
 $saldo = $data['saldo'];
	
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Kurir
      
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
     
	 <div class="col-lg-3 col-xs-6">
	    
        <div class="small-box bg-blue">
          <a href="kurir1.php" class="small-box-footer"><img src="../gambar/user/kurir1.png" class="img-circle" height="100"></a>  
          <a href="kurir1.php" class="small-box-footer">Kiriman Dalam Negeri</a>
        </div>
      </div>
	  <div class="col-lg-3 col-xs-6">
	    
        <div class="small-box bg-red">
          <a href="kurir2.php" class="small-box-footer"><img src="../gambar/user/kurir2.png" class="img-circle" height="100"></a>  
          <a href="kurir2.php" class="small-box-footer">Kiriman Luar Negeri</a>
        </div>
      </div>
	 
	  

  </section>

</div>
<?php include 'footer.php'; ?>