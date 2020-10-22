<?php include 'header.php'; 
 $id = $_SESSION['id'];
 $query = mysqli_query($koneksi, "SELECT * FROM loket  WHERE id='$id'");
 $data  = mysqli_fetch_assoc($query);
 	
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Profil
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

		  <?php 
		    
			if(isset($_GET['alert'])){
			  if($_GET['alert'] == "gagal"){
				echo "<div class='alert alert-danger'>PIN SUDAH DIGUNAKAN ...!</div>";
			  }else if($_GET['alert'] == "ok"){
				echo "<div class='alert alert-success'>PERUBAHAN PROFIL BERHASIL</div>";
			  }	
			}
			?>
		
          <div class="box-header">
            <h3 class="box-title">Akun ID</h3>
			<a href="index.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="profil_act.php" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="idloket" value="<?php echo $id ?>">
              
              <div class="form-group">
                <label>User ID</label>
                <input type="number" class="form-control" name="userid" required="required" value="<?php echo $data['id']?>" readonly>
              </div>
			  
			  <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $data['nama']?>">
              </div>
			  
			  <div class="form-group">
                <label>Nomor Handphone</label>
                <input type="text" class="form-control" name="nohp" required="required" value="<?php echo $data['nohp']?>">
              </div>
			  <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" required="required" value="<?php echo $data['email']?>">
              </div>
			  <div class="form-group">
                <label>KPRK</label>
                <input type="text" class="form-control" name="kprk" required="required" value="<?php echo $data['kprk']?>" readonly>
              </div>
			  <div class="form-group">
                <label>No. Rekening GIROPOS</label>
                <input type="text" class="form-control" name="norek" required="required" value="<?php echo $data['norek']?>">
              </div>
			  <div class="form-group">
                <label>PIN Login</label>
                <input type="text" class="form-control" name="pin" required="required" value="<?php echo $data['pin']?>" readonly>
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

