<!DOCTYPE html>
<html>
  
<head>
    <title>
      I-News Biro Ganti Password
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
      <a href="index.html"><img width="100" height="30" src="../images/inews.png" /></a>
      <!-- Sql -->
       <?php
          include "../config/koneksi.php";

          if(isset($_POST['submit'])){

              $email        = $_POST['email'];
              $pass         = $_POST['password'];
              $ulangi       = $_POST['ulang_password'];
              $password     = md5($pass);
              $dulu         = $_POST['dulu'];
              $passworddulu = md5($dulu);

              $query = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email';");
              $data = mysqli_fetch_array($query);
              if ($passworddulu == $data['password'])
              {
                  if($pass == $ulangi)
                      {
                          $pwd = mysqli_query($koneksi,"UPDATE user set password='$password' where email='$email'")
                                          or die(mysql_error());
                          if ($pwd) {
                              ?>
                            <div class="alert alert-success alert-dismissable">
                                  <a class="panel-close close" data-dismiss="alert"></a>
                                <strong>Password</strong> Berhasil di Ubah
                            </div>

                            <?php
                            session_start();
                            session_destroy();
                            header("location: ../index.php");
                          }
                      }
                      else 
                          {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                  <a class="panel-close close" data-dismiss="alert"></a>
                                <strong>Password baru</strong> tidak cocok
                            </div>
                            <?php
                      }
              } else {
                  ?>
                    <div class="alert alert-danger alert-dismissable">
                          <a class="panel-close close" data-dismiss="alert"></a>
                        <strong>Password Lama</strong> Tidak Sesuai
                    </div>
                    <?php
              }         
          }
      ?>
      <form action="#" method="post">
      <!-- Email -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" name="email" placeholder="Email Biro" type="email">
          </div>
        </div>
      <!-- Password Lama -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" name="dulu" placeholder="Password lama" type="password">
          </div>
        </div>
        <!-- Password Baru -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" placeholder="Password baru" name="password" type="password">
          </div>
        </div>
        <!-- Password Ulangi Baru -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-ok"></i></span><input class="form-control" placeholder="Password baru Ulangi" name="ulang_password" type="password">
          </div>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Create Password">
      </form>
       <p>
        Sudah Reset Password ?
      </p>
      <a class="btn btn-default-outline btn-block" href="../index.php">Kembali Ke Login</a>
    </div>
    <!-- End Login Screen -->
  </body>
   <!-- JS -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="../javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="../javascripts/main.js" type="text/javascript"></script>

</html>