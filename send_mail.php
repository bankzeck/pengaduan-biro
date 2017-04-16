<?php
	include 'config/koneksi.php';
	$username = isset($_POST['username']) ? $_POST['username']:"";
	$judul_permasalahan = isset($_POST['judul_permasalahan']) ? $_POST['judul_permasalahan']:"";
	$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi']:"";
	$email = isset($_POST['email']) ? $_POST['email']:"";
	$tujuan = isset($_POST['tujuan']) ? $_POST['tujuan']:"";
	$status = "UnSolved";
	$tanggal_pengajuan = date("Y-m-d");

  $sql1 = mysqli_query($koneksi, "SELECT * FROM
                                  `bagian`
                                  JOIN pic USING (`kd_pic`)
                                  WHERE kd_bagian = '$tujuan'");
  $result1 = mysqli_fetch_array($sql1);
  $kd_pic = $result1['kd_pic'];


	$query = mysqli_query($koneksi,"INSERT INTO `pengaduan`
            (`username`,
             `judul_permasalahan`,
             `deskripsi`,
             `tanggal_pengajuan`,
             `kd_bagian`,
             `status`)
	VALUES ('$username',
        '$judul_permasalahan',
        '$deskripsi',
        '$tanggal_pengajuan',
        '$tujuan',
        '$status');");
	if ($query) {
		     $sql = mysqli_query($koneksi, "SELECT * FROM
                                        `pic`
                                        JOIN `user` USING(`username`)
                                        JOIN `bagian` ON (`pic`.`kd_pic` = `bagian`.`kd_pic`)
                                        WHERE `pic`.`kd_pic` = '$kd_pic'");
	       $result=mysqli_fetch_array($sql);
         $email_pic = $result['email'];
         $nama_bagian = $result['nama_bagian'];

         $to = "$email_pic";
         $subject = "FORGOT PASSWORD";
         $message = "Forgot Password Anda";
         $message .= "Ini Adalah Password Anda, jangan sampai lupa ya !!!";
         $message .= "Your New password : '.$rand;";
         $message .= "Klik Link dibawah ini untuk mengganti : <a href='http://mncgroup.hol.es/Login/ganti_password.php'> Ganti Password </a>'";


         $header = "From: $email  \r\n";

         $header .= "Forgot assword MNC Biro";
         
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
		?>
		  <script type="text/javascript">
		  alert("Berhasil Mengirim Keluhan")
		  document.location = "user.php"

		  </script>
  <?php  
}else {
	echo "gagal";
}
?>