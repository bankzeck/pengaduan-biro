<?php
if(empty($_SESSION)){
  header("Location: index.php");
}
?>
<?php 
include "config/koneksi.php";

if (isset($_GET['id'])) {
	$username = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query1 =  "SELECT  `nama`,user.username,`password`,`email`,`no_telp`,`tanggal_register` 
FROM `user` JOIN `biro` USING(`kd_biro`) WHERE user.username='$username'";

$sql = mysqli_query($koneksi,$query1);
$hasil = mysqli_fetch_array($sql);
$nama = $hasil['nama'];
$username = $hasil['username'];
$password = $hasil['password'];
$email = $hasil['email'];
$no_telp = $hasil['no_telp'];
$tanggal_register = $hasil['tanggal_register'];
$tanggal = date("d-m-Y", strtotime($tanggal_register));

// proses edit
if(isset($_POST['edit'])){
$nama1 = $_POST['nama1'];
$email1 = $_POST['email1'];
$no_telp1 = $_POST['no_telp1'];
$username1 = $_POST['username1'];

// update data
$query = "UPDATE `user`
SET `username` = '$username1',
  `nama` = '$nama1',
  `email` = '$email1',
  `no_telp` = '$no_telp1'
WHERE `username` = '$username';";
$sql = mysqli_query($koneksi,$query);
if ($sql) {
  ?>
  <div class="widget-content padded">
    <div class="alert alert-success">
      <button class="close" data-dismiss="alert" type="button">&times;</button>Berhasil Edit Data
    </div></div>

  <script type="text/javascript">
  setTimeout(function () {
       window.location.href = "user.php?page=edit_user&id=<?php echo $username1; ?>"; //will redirect to your blog page (an ex: blog.html)
    }, 1000);

  </script>
  
  <?php

  $_SESSION['username'] = $username1 ;
} else {
	?>
    <div class="widget-content padded">
    <div class="alert alert-danger">
      <button class="close" data-dismiss="alert" type="button">&times;</button>Username Sudah digunakan !!!
    </div></div>
    <?php
  }
    
}	
 ?>
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
        </div>
        <div class="widget-content padded clearfix">
            <form class="form-horizontal" action="" method="post" enctype="multypart/form-data" name="edit" id="edit">     
            <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">USERNAME </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Username" name="username1" value="<?php echo $username; ?>" >
              </div>
          </div>
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">NAMA </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" name="nama1" value="<?php echo $nama; ?>" required>
              </div>
          </div>
          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">EMAIL </label>
              <div class="col-lg-8">
                  <input type="email" class="form-control" id="contract-name" placeholder="Masukan Email" name="email1" value="<?php echo $email; ?>" required>
              </div>
          </div >
          

          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">NO TLEP </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" name="no_telp1" value="<?php echo $no_telp; ?>">
              </div>
          </div>

          
            <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">TGL REGISTRASI </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" value="<?php echo $tanggal; ?>" readonly="">
              </div>
          </div>
                
            <div class="form-action no-margin-bottom" style="margin-left:40%">
            <input class="btn btn-primary" type="submit" name="edit" id="edit" value="Edit">
            <a href="user.php" class="btn btn-primary">Keluar</a>
            </div>
        </form>
    </div>
    </div>
</div>
