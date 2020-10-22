<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href=”path/to/css/style.css” rel=’stylesheet’ type=’text/css’ />
<script src=”path/to/js/jquery-1.11.1.min.js“></script>
<script src=”path/to/js/Chart.js“></script>
<link href=’//fonts.googleapis.com/css?family=Montserrat:400,700′ rel=’stylesheet’ type=’text/css’>
    <script src="assets/js/highcharts.js"></script>
  
  <script src="assets/js/jquery-1.10.1.min.js"></script>
</head>
<body class=" bg-olive">
  <div class="container">
    <div class="login-box">

      <center>

        <h2>Sistem Informasi Oranger Berbasis Web</h2>
        
        <br/>

        <?php 
		include 'koneksi.php';
        if(isset($_GET['alert'])){
		  
		  if(isset($_GET['pin'])){
		  $lupaid = $_GET['pin'];
		  } else {
		  $lupaid = '';	  
		  }
		  
          if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger'>LOGIN GAGAL! PIN SALAH!</div>";
          }else if($_GET['alert'] == "logout"){
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          }else if($_GET['alert'] == "belum_login"){
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGGUNAKAN APLIKASI</div>";
          }else if($_GET['alert'] == "gagalregister"){
            echo "<div class='alert alert-danger'>REGISTER GAGAL! DATA SUDAH TERDAFTAR!</div>";
          }else if($_GET['alert'] == "okregister"){
			echo "<div class='alert alert-success'>ANDA TELAH BERHASIL REGISTRASI</div>";  
		  }else if($_GET['alert'] == "okpin"){
			if(isset($_GET['pin'])){  
			  echo "<div class='alert alert-danger'><button id='pinbaru-btn' type='button' class='btn btn-warning'>Pin Baru</button></div>";  
			}
		  }else if($_GET['alert'] == "gagalpin"){
			  echo "<div class='alert alert-danger'>DATA YANG MASUKAN TIDAK SESUAI</div>";  
			
		  }else if($_GET['alert'] == "okpinbaru"){
			  echo "<div class='alert alert-success'>PIN BARU BERHASIL DIBUAT</div>";

		  }else if($_GET['alert'] == "tdksamapinbaru"){
			  echo "<div class='alert alert-success'>PIN BARU TIDAK SAMA</div>";   
			
		  }else if($_GET['alert'] == "gagalpinbaru"){
			  echo "<div class='alert alert-danger'>PIN BARU SUDAH DIGUNAKAN</div>";  
		  }					
        }
        ?>
      </center>

      <div class="login-box-body">

       

      <form action="periksa_login.php" class="login-form" method="POST">
	    <center>
          <i class="fa fa-address-card-o" style="font-size: 130px"></i>
        </center>
        <p class="login-box-msg text-bold">LOGIN</p>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="PIN M-LOKET" name="pin" required="required" maxlength="6" autocomplete="off">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        
        <div class="row">
		  
          <div class="col-xs-offset-8 col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
        </div>
		<div class="create-account">
			<p>
				 
				<a href="javascript:;" id="register-btn" class="btn btn-success">
					 Registrasi
				</a>
				<a href="javascript:;" id="lupapin-btn" class="btn btn-danger">
					 Lupa Pin?
				</a>
				
			</p>
		</div>
		
      </form>
	  
	  <form class="register-form" action="register.php" method="post">
		<h3>Registrasi</h3>
		<p>
			 Lengkapi informasi di bawah ini:
		</p>
		<div class="form-group">
                <label>KPRK</label>
                <select class="form-control" name="kprk" required="required">
				  <option value="">-- Pilih KPRK --</option>
                  <?php 
                      $ref_kantor = mysqli_query($koneksi,"SELECT * FROM ref_kantor ORDER BY kodekantor ASC");
                      while($k = mysqli_fetch_array($ref_kantor)){
                        ?>
                        <option value="<?php echo $k['kodekantor']?>"><?php echo $k['nama_kantor']; ?></option>
                        <?php 
                      }
                      ?>
                </select>
        </div>
		
		<div class="form-group">
			<label>No. Rekening GIRO Pos</label>
			<input type="text" class="form-control" placeholder="tidak perlu diisi" name="norek" >
        </div>
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control" name="nama" required>
        </div>
		<div class="form-group">
			<label>Alamat</label>
			<input type="text" class="form-control" name="alamat" >
        </div>
		<div class="form-group">
			<label>Nomor Ponsel/HP</label>
			<input type="text" class="form-control" name="nohp" required>
        </div>
		<div class="form-group">
			<label>Alamat Email</label>
			<input type="text" class="form-control" name="email" required>
        </div>
		<div class="form-group">
			<label>N P W P</label>
			<input type="text" class="form-control" name="npwp" required>
        </div>
		<div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="kelamin" required="required">
				  <option value="">-- Pilih Kelamin --</option>
                  <option value="L">Laki-Laki</option>
				  <option value="P">Perempuan</option>
                </select>
        </div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" class="form-control" name="tgllahir" >
        </div>
		<div class="form-group">
                <label>Agama</label>
                <select class="form-control" name="agama" required="required">
				  <option value="">-- Pilih Agama --</option>
                  <option value="Islam">Islam</option>
				  <option value="Kristen">Kristen</option>
				  <option value="Protestan">Protestan</option>
				  <option value="Hindu">Hindu</option>
				  <option value="Budha">Budha</option>
                </select>
        </div>
		<div class="form-group">
			<label>PIN</label>
			<input type="text" class="form-control" placeholder="PIN LOKET (6 Digit)" name="pin" maxlength="6" required>
        </div>
		
		
		<div class="form-actions">
			<button id="register-back-btn" type="button" class="btn btn-success">
			<i class="m-icon-swapleft"></i> Kembali </button>
			<button type="submit" id="register-submit-btn" class="btn btn-warning pull-right">
			Simpan <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	
	<form class="lupapin-form" action="lupapin.php" method="post">
		<h3>Lupa Pin</h3>
		<p>
			 Lengkapi informasi di bawah ini:
		</p>
		
		
		<div class="form-group">
			<label>User ID</label>
			<input type="number" class="form-control" name="lupa_id" id="lupa_id" required maxlength="6">
        </div>
		<!-- <div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" class="form-control" name="lupa_nama" required>
		        </div>
		
		<div class="form-group">
			<label>No. Handphone</label>
			<input type="text" class="form-control" name="lupa_nohp" required>
		        </div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" name="lupa_email" required>
		        </div> -->
		
		<div class="form-actions">
			<button id="lupapin-back-btn" type="button" class="btn btn-success">
			<i class="m-icon-swapleft"></i> Kembali </button>
			<button type="submit" id="lupapin-submit-btn" class="btn btn-warning pull-right">
			Simpan <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	
	<form class="pinbaru-form" action="pinbaru.php" method="post">
		<h3>Pin Baru</h3>
		<p>
			 Lengkapi informasi di bawah ini:
		</p>
		
		
		<div class="form-group">
			<label>User ID</label>
			<input type="number" class="form-control" value="<?php echo $lupaid;?>" id="baru_id" name="baru_id" required readonly>
        </div>
		<div class="form-group">
			<label>Pin Baru</label>
			<input type="text" class="form-control" name="baru_pin" required maxlength="6">
        </div>
		<div class="form-group">
			<label>Retype Pin Baru</label>
			<input type="text" class="form-control" name="baru_piin" required maxlength="6">
        </div>
		
		<div class="form-actions">
			<button id="pinbaru-back-btn" type="button" class="btn btn-success">
			<i class="m-icon-swapleft"></i> Kembali </button>
			<button type="submit" id="pinbaru-submit-btn" class="btn btn-warning pull-right">
			Simpan <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>

    </div>
  </div>
</div>


<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>

jQuery(document).ready(function() {
jQuery('.register-form').hide();
jQuery('.lupapin-form').hide();
jQuery('.pinbaru-form').hide();
});	
		
jQuery('#register-btn').click(function () {
jQuery('.login-form').hide();
jQuery('.register-form').show();
jQuery('.lupapin-form').hide();
jQuery('.pinbaru-form').hide();
});

jQuery('#register-back-btn').click(function () {
jQuery('.login-form').show();
jQuery('.register-form').hide();
jQuery('.lupapin-form').hide();
jQuery('.pinbaru-form').hide();
});

jQuery('#lupapin-btn').click(function () {
jQuery('.login-form').hide();
jQuery('.register-form').hide();
jQuery('.pinbaru-form').hide();
jQuery('.lupapin-form').show();
});

jQuery('#lupapin-back-btn').click(function () {
jQuery('.login-form').show();
jQuery('.register-form').hide();
jQuery('.lupapin-form').hide();
jQuery('.pinbaru-form').hide();
});

jQuery('#pinbaru-btn').click(function () {
jQuery('.login-form').hide();
jQuery('.register-form').hide();
jQuery('.pinbaru-form').show();
jQuery('.lupapin-form').hide();
});


jQuery('#pinbaru-back-btn').click(function () {
jQuery('.login-form').show();
jQuery('.register-form').hide();
jQuery('.lupapin-form').hide();
jQuery('.pinbaru-form').hide();
});
</script>

</body>
</html>
