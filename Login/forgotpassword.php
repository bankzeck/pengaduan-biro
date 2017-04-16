<html>
<head>
<head>
    <title>
      I-News Biro Forgot Password
    </title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
<body class="login2">
    <!-- Login Screen -->
    <div class="login-wrapper">
      <a href="#"><img width="100" height="30" src="../images/inews.png" /></a>
      <form action="#" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" name="email" placeholder="Masukan Email" type="text">
          </div>
        </div>
		<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Kirim Password">
	  </form>
	  <p>
        Sudah Menggunakan Forget Password ?
      </p>
      <a class="btn btn-default-outline btn-block" href="../index.php">Kembali Ke Login</a>
    </div>


<?php
	if(isset($_POST['submit']))
	{ 
	 include '../config/koneksi.php';
	 $email=$_POST['email'];
	 $rand = acakangkahuruf(9);
	 $random = md5($rand);
	 $sql=mysqli_query($koneksi,"select * from user where email='".$email."' ") or die(mysql_error());
	 $result=mysqli_affected_rows($koneksi);
	 if($result!=0) {
	 
	  $sql_update = mysqli_query($koneksi, "UPDATE `pengaduan_biro`.`user` SET `password` = '$random' 
	  				WHERE `email` = '$email';");
	  $res=mysqli_fetch_array($sql);
         $to = "$email";
         $subject = "FORGOT PASSWORD";
         
         $message = "Forgot Password Anda";
         $message .= "Ini Adalah Password Anda, jangan sampai lupa ya !!!";
         $message .= "Your New password : '.$rand;";
         $message .= "Klik Link dibawah ini untuk mengganti : <a href='http://mncgroup.hol.es/Login/ganti_password.php'> Ganti Password </a>'";


         $header = "From: <deny.masatau@mncgroup.com>  \r\n";

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
}
}
?>
<!-- JS -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="../javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="../javascripts/main.js" type="text/javascript"></script>

</body>

</html>