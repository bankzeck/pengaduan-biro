<?php 
include "config/koneksi.php";

if (isset($_GET['id'])) {
	$username = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query1 =  "SELECT  `nama`,`username`,`password`,`email`,`no_telp`,`level`,`status_akun`,`kd_biro`,`biro`,`tanggal_register` 
FROM `user` JOIN `biro` USING(`kd_biro`) WHERE `username`='$username'";

$sql = mysqli_query($koneksi,$query1);
$hasil = mysqli_fetch_array($sql);
$nama = $hasil['nama'];
$username = $hasil['username'];
$password = $hasil['password'];
$email = $hasil['email'];
$no_telp = $hasil['no_telp'];
$level = $hasil['level'];
$status_akun = $hasil['status_akun'];
$kd_biro = $hasil['kd_biro'];
$biro = $hasil['biro'];
$tanggal_register = $hasil['tanggal_register'];
$tanggal = date("d-m-Y", strtotime($tanggal_register));

// proses edit
if(isset($_POST['edit'])){
$username1 = $_POST['username1'];
$nama1 = $_POST['nama1'];
$level1 = $_POST['level1'];
$email1 = $_POST['email1'];
$no_telp1 = $_POST['no_telp1'];
$kd_biro1 = $_POST['kd_biro1'];
$status_akun1 = $_POST['status_akun1'];

// update data
$query = "UPDATE `user`
SET `username` = '$username1', 
  `level` = '$level1',
  `nama` = '$nama1',
  `email` = '$email1',
  `no_telp` = '$no_telp1',
  `status_akun` = '$status_akun1',
  `kd_biro` = '$kd_biro1'
WHERE `username` = '$username';";
$sql = mysqli_query($koneksi,$query);
if ($sql) {
  $_SESSION['username'] = $username1 ;
  // proses mengirim email jika user sudah di Approve
  if ($hasil['status_akun'] == "Approved") {
    echo "<meta http-equiv='refresh' content='0; url=media.php?page=list_user&status_akun=$status_akun1'>";
  }elseif ($status_akun1 == "Approved" ) {
    $to = "$email";
     $subject = "[NO-REPLY]Confirmation Account Pengaduan Keluhan I-news Tv";
     

     $header = "From: inewsit@mncgroup.hol.es  \r\n";

     $header .= "Akun Information MNC Biro";

     $headers .= "MIME-Version: 1.0\r\n";
     $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

     $message = "<!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                  </head>
                  <body>
                  <h1>Selamat Akun Anda Sudah Aktif</h1>
                  <p>Detail Account Username :</p>
                  <br>Your username :  $hasil[username]
                  <br> Your Full Name :  $hasil[nama] 
                  <br> Your Email Address : $hasil[email]
                  <br> Your Status Akun :  $status_akun1
                  <br> Your Lever authentication : $hasil[level]
                  <br> Your Register Date : $hasil[tanggal_register]
                  <br>Login sekarang ke : <a href='http://mncgroup.hol.es'><i>http://mncgroup.hol.es</i></a>
                  </body>
                  </html>";
     
     $retval = mail ($to,$subject,$message,$header);
     
     if( $retval == true ) {
        ?>
        <div class="alert alert-success alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">x</a>
            <center>Silahkan Cek <strong>Email</strong> Anda</center>
        </div>
     <?php

  } else {
  ?>
        <div class="alert alert-danger alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">x</a>
            <center>Maaf <strong>Email</strong> Tidak terkirim</center>
        </div>
     <?php
       
    }
  }
	echo "<meta http-equiv='refresh' content='0; url=media.php?page=list_user&status_akun=$status_akun1'>";
} else {
	?>
    <div class="widget-content padded">
    <div class="alert alert-danger">
      <button class="close" data-dismiss="alert" type="button">&times;</button>Gagal Mengubah Data Biro
    </div>
    </div>
    <?php
	}
}	
 ?>
 <div class="page-title">
  <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
          <i class="icon-table"></i>EDIT USER</i>
        </div>
        <div class="widget-content padded clearfix">
            <form class="form-horizontal" action="" method="post" enctype="multypart/form-data" name="edit" id="edit">     
            <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">USERNAME </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Username" name="username1" value="<?php echo $username; ?>">
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
              <label for = "contact-msg" class="col-lg-3 control-label">BIRO </label>
              <div class="col-lg-8">
                  <select class="form-control" name="kd_biro1"> 
                    <?php
                    $biro = mysqli_query($koneksi,"SELECT kd_biro,biro FROM biro");
                    while ( $baris = mysqli_fetch_array($biro)) {
                        if ($kd_biro == $baris['kd_biro']){
                            echo "<option value=$baris[kd_biro] selected>$baris[biro]</option>";
                        }else {
                            echo "<option value=$baris[kd_biro]>$baris[biro]</option>";
                        }
                    }
                     ?>
                </select>
              </div>
          </div >
          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">LEVEL USER </label>
              <div class="col-lg-8">
                  <select class="form-control" name="level1">
                  <?php 
                    if ($level == "administrator") {
                    echo "<option value='administrator' selected>Administrator</option>
                    <option value='user'>User</option>
                    <option value='teknisi'>Teknisi</option>
                    <option value='pic'>PIC</option>";
                    } elseif ($level == "user") {
                    echo "<option value='administrator'>Administrator</option>
                    <option value='user' selected>User</option>
                    <option value='teknisi'>Teknisi</option>
                    <option value='pic'>PIC</option>";
                    } elseif ($level = "teknisi") {
                    echo "<option value='administrator'>Administrator</option>
                    <option value='user'>User</option>
                    <option value='teknisi' selected>Teknisi</option>
                    <option value='pic'>PIC</option>";
                    } else {
                        echo "<option value='administrator'>Administrator</option>
                    <option value='user'>User</option>
                    <option value='teknisi'>Teknisi</option>
                    <option value='pic' selected>PIC</option>";
                    }
                   ?>
                    
                  </select>
              </div>
          </div >

          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">NO TLEP </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" name="no_telp1" value="<?php echo $no_telp; ?>">
              </div>
          </div>

          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">STATUS AKUN </label>
              <div class="col-lg-8">
              <?php 
                if ($status_akun=="Approved") {
                    echo "
                    <label class='radio-inline'><input checked='' name='status_akun1' type='radio' value='Approved'><span>APPROVED</span></label>
                    <label class='radio-inline'><input name='status_akun1' type='radio' value='Pending'><span>PENDING</span></label>";
                }else{
                    echo "
                    <label class='radio-inline'><input name='status_akun1' type='radio' value='Approved'><span>APPROVED</span></label>
                    <label class='radio-inline'><input checked='' name='status_akun1' type='radio' value='pending'><span>PENDING</span></label>";
                }
               ?>
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
            <a href="media.php?page=list_user" class="btn btn-primary">Keluar</a>
            </div>
        </form>
    </div>
    </div>
</div>
