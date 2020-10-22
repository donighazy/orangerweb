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
      <small>Pengiriman Dalam Negeri</small>
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
		    if(isset($_GET['id_kurir'])){
		    $id_kurir = $_GET['id_kurir'];
			}
			if(isset($_GET['alert'])){
			  if($_GET['alert'] == "gagal"){
				echo "<div class='alert alert-danger'>TRANSAKSI GAGAL SALDO ANDA KURANG ...!</div>";
			  }else if($_GET['alert'] == "ok"){
				echo "<div class='alert alert-success'>TRANSAKSI KURIR DALAM NEGERI BERHASIL
				<a href='kurir_print.php?id_kurir=".$id_kurir."' target='_blank' class='btn btn-sm btn-primary'><i class='fa fa-print'></i> &nbsp PRINT</a>
				
				</div>";
			  }	
			}
			?>

          <div class="box-header">
            <h3 class="box-title">Pengiriman Dalam Negeri</h3>
            <a href="kurir1.php" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp Kembali</a> 
          </div>
          <div class="box-body">
            <form action="kurir1_act.php" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="idloket" value="<?php echo $id ?>">
			  
			  <label><font color="red">Kiriman</font></label>
			
              <div class="form-group" >
			    <div class="col-lg-3 col-xs-0">
                <label>Jenis Kiriman</label>
                <select class="form-control" name="kiriman_jenis" required="required">
				  <option value="">-- Pilih Jenis Kiriman --</option>
                  <option value="surat">Surat/Dokumen</option>
				  <option value="paket">Paket</option>
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
				  <label>Berat Kiriman</label>
                  <input type="text" class="form-control" name="kiriman_berat" required="required">
				</div>
				<div class="col-lg-6 col-xs-0">
				  <label>Isi Kiriman</label>
                  <input type="text" class="form-control" name="kiriman_isi" required="required">
				</div>
				
				
				
              </div>
			  
			  <label><font color="red">Tujuan Kiriman</font></label>
			
              <div class="form-group" >
			    <div class="col-lg-3 col-xs-0">
				  <label>Kode Pos</label>
                  <input type="text" class="form-control" name="tujuan_kodepos" required="required">
				</div>
				
			    <div class="col-lg-3 col-xs-0">
                <label>Provinsi</label>
                <select class="form-control" name="tujuan_provinsi" required="required">
				  <option value="">-- Pilih Provinsi --</option>
				  <?php
				   $qprov = mysqli_query($koneksi, "select * from ref_provinsi order by nama_provinsi");
				   while($k = mysqli_fetch_array($qprov)){
                        ?>
                        <option value="<?php echo $k['id_provinsi']?>"><?php echo $k['nama_provinsi']; ?></option>
                        <?php 
                   }
                   ?>
                  
				  
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
                <label>Kota/Kabupaten</label>
                <select class="form-control" name="tujuan_kota" required="required">
				  <option value="">-- Pilih Kota/Kabupaten --</option>
                  <?php
				   $qkota = mysqli_query($koneksi, "select * from ref_kota order by nama_kota");
				   while($k = mysqli_fetch_array($qkota)){
                        ?>
                        <option value="<?php echo $k['id_kota']?>"><?php echo $k['nama_kota']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
                <label>Kecamatan</label>
                <select class="form-control" name="tujuan_kecamatan" required="required">
				  <option value="">-- Pilih Kecamatan --</option>
                  <?php
				   $qkec = mysqli_query($koneksi, "select * from ref_kecamatan order by nama_kecamatan");
				   while($k = mysqli_fetch_array($qkec)){
                        ?>
                        <option value="<?php echo $k['id_kecamatan']?>"><?php echo $k['nama_kecamatan']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				
              </div>
			  

			  <div class="form-group" >
			    
				
				
				<div class="col-lg-12 col-xs-0">
                <label>Kelurahan</label>
                <select class="form-control" name="tujuan_kelurahan" required="required">
				  <option value="">-- Pilih Kelurahan --</option>
                  <?php
				   $qkel= mysqli_query($koneksi, "select * from ref_kelurahan order by nama_kelurahan");
				   while($k = mysqli_fetch_array($qkel)){
                        ?>
                        <option value="<?php echo $k['id_kelurahan']?>"><?php echo $k['nama_kelurahan']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				
				
				
              </div>
			  
			  <label><font color="red">Tarif Kiriman</font></label>
			
              <div class="form-group" >
			    <div class="col-lg-9 col-xs-0">
                <label>Jenis Layanan</label>
                <select class="form-control" name="tarif_jenis" required="required">
				  <option value="">-- Pilih Jenis Layanan --</option>
                  <?php
				   $qdata = mysqli_query($koneksi, "select * from tarif_paket where jenis=1 order by nama");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_tarif']?>"><?php echo $k['nama']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
				  <label>Total Ongkir</label>
                  <input type="text" class="form-control" name="tarif_ongkir" required="required">
				</div>
				
				
				
              </div>
			  
			  <label><font color="red">Pengirim</font></label>
			
              <div class="form-group" >
			    <div class="col-lg-3 col-xs-0">
				  <label>Nama</label>
                  <input type="text" class="form-control" name="pengirim_nama" required="required">
				</div>
				
				<div class="col-lg-6 col-xs-0">
				  <label>Alamat</label>
                  <input type="text" class="form-control" name="pengirim_alamat" required="required">
				</div>
				
				<div class="col-lg-3 col-xs-0">
                <label>Kelurahan</label>
                <select class="form-control" name="pengirim_kelurahan" required="required">
				  <option value="">-- Pilih Kelurahan --</option>
                  <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_kelurahan order by nama_kelurahan");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_kelurahan']?>"><?php echo $k['nama_kelurahan']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				
			    
				
				
				
				
				
				
              </div>
			  
			  <div class="form-group" >
			    <div class="col-lg-3 col-xs-0">
                <label>Kecamatan</label>
                <select class="form-control" name="pengirim_kecamatan" required="required">
				  <option value="">-- Pilih Kecamatan --</option>
                   <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_kecamatan order by nama_kecamatan");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_kecamatan']?>"><?php echo $k['nama_kecamatan']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				
				
			    
				
				<div class="col-lg-3 col-xs-0">
                <label>Kota/Kabupaten</label>
                <select class="form-control" name="pengirim_kota" required="required">
				  <option value="">-- Pilih Kota/Kabupaten --</option>
                   <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_kota order by nama_kota");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_kota']?>"><?php echo $k['nama_kota']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
				  <label>Kode Pos</label>
                  <input type="text" class="form-control" name="pengirim_kodepos" required="required">
				</div>
				
				<div class="col-lg-3 col-xs-0">
				  <label>No. HP</label>
                  <input type="text" class="form-control" name="pengirim_hp" required="required">
				</div>
				
				
              </div>
			  
			  <label><font color="red">Penerima</font></label>
			
              <div class="form-group" >
			    <div class="col-lg-3 col-xs-0">
				  <label>Nama</label>
                  <input type="text" class="form-control" name="penerima_nama" required="required">
				</div>
				
				<div class="col-lg-6 col-xs-0">
				  <label>Alamat</label>
                  <input type="text" class="form-control" name="penerima_alamat" required="required">
				</div>
				
				<div class="col-lg-3 col-xs-0">
                <label>Kelurahan</label>
                <select class="form-control" name="penerima_kelurahan" required="required">
				  <option value="">-- Pilih Kelurahan --</option>
                   <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_kelurahan order by nama_kelurahan");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_kelurahan']?>"><?php echo $k['nama_kelurahan']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				
			    
				
				
				
				
				
				
              </div>
			  
			  <div class="form-group" >
			    <div class="col-lg-3 col-xs-0">
                <label>Kecamatan</label>
                <select class="form-control" name="penerima_kecamatan" required="required">
				  <option value="">-- Pilih Kecamatan --</option>
                   <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_kecamatan order by nama_kecamatan");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_kecamatan']?>"><?php echo $k['nama_kecamatan']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				
				
			    
				
				<div class="col-lg-3 col-xs-0">
                <label>Kota/Kabupaten</label>
                <select class="form-control" name="penerima_kota" required="required">
				  <option value="">-- Pilih Kota/Kabupaten --</option>
                   <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_kota order by nama_kota");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_kota']?>"><?php echo $k['nama_kota']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
                <label>Provinsi</label>
                <select class="form-control" name="penerima_provinsi" required="required">
				  <option value="">-- Pilih Provinsi --</option>
                   <?php
				   $qdata = mysqli_query($koneksi, "select * from ref_provinsi order by nama_provinsi");
				   while($k = mysqli_fetch_array($qdata)){
                        ?>
                        <option value="<?php echo $k['id_provinsi']?>"><?php echo $k['nama_provinsi']; ?></option>
                        <?php 
                   }
                   ?>
			
                </select>
				</div>
				
				<div class="col-lg-3 col-xs-0">
				  <label>Kode Pos</label>
                  <input type="text" class="form-control" name="penerima_kodepos" required="required">
				</div>
				
				
				
              </div>
			  
			  <div class="form-group" >
			    
				<div class="col-lg-3 col-xs-0">
				  <label>No. HP</label>
                  <input type="text" class="form-control" name="penerima_hp" required="required">
				</div>
				
				<div class="col-lg-9 col-xs-0">
				  <label>Pesan Kiriman</label>
                  <input type="text" class="form-control" name="penerima_pesan" required="required">
				</div>
				
				
              </div>
			  
              
			  
			  <h3>&nbsp;</h3>
			  <div class="form-group box-header"">
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