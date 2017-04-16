<?php
session_start();
if($_SESSION){
  // ganti
  header("Location: media.php");
}
?>

<!DOCTYPE html>
<html>
  
<head>
    <title>
      I-News Biro Login
    </title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>

  <body class="login2">
    <!-- Login Screen -->
    <div class="login-wrapper">
      <a href="#"><img width="100" height="30" src="images/inews.png" /></a>
      <!-- Sql -->
      <?php
        $msg = '';
        if(isset($_POST['login']) && ($_POST['username'] != '') && ($_POST['password'] != ''))
            {
            require_once "config/koneksi.php";
            $name = cleanInput($_POST['username']);
            $pass = md5(cleanInput($_POST['password']));

            $check_email = Is_email($name);
            if($check_email)
            {
              // email & password combination
              $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `email` = '$name' AND `password` = '$pass'");
            } else {
              // username & password combination
              $query = mysqli_query($koneksi, "SELECT * FROM `user` WHERE `username` = '$name' AND `password` = '$pass'");
            }
              $rows = mysqli_num_rows($query);
              if($rows > 0)
              {
                $row = mysqli_fetch_assoc($query);
                if($row['level'] == "administrator" && $row['status_akun'] == "Approved"){
                  $_SESSION['username']=$name;
                  $_SESSION['email']= $row['email'];
                  $_SESSION['level']='administrator';
                  header("Location: media.php");
                }else if($row['level'] == "teknisi" && $row['status_akun'] == "Approved"){
                  $_SESSION['username']=$name;
                  $_SESSION['email']= $row['email'];
                  $_SESSION['level'] ='teknisi';
                  $_SESSION['kd_bagian']= $row['kd_bagian'];
                  header("Location: teknisi.php ");
                }else if($row['level'] == "user" && $row['status_akun'] == "Approved"){
                  $_SESSION['username']=$name;
                  $_SESSION['email']= $row['email'];
                  $_SESSION['level']='user';
                  $_SESSION['kd_biro'] = $row['kd_biro'];
                  header("Location: user.php");
                }else if($row['level'] == "pic" && $row['status_akun'] == "Approved"){
                  $_SESSION['username']=$name;
                  $_SESSION['email']= $row['email'];
                  $_SESSION['level']='pic';
                  $_SESSION['kd_bagian']= $row['kd_bagian'];
                  $_SESSION['kd_biro'] = $row['kd_biro'];
                  $query1 = mysqli_query($koneksi, "SELECT * FROM pic WHERE username='$name'");
                  $result = mysqli_fetch_array($query1);
                  $_SESSION['kd_pic'] = $result['kd_pic'];
                  header("Location: pic.php");
                }else if($row['level'] == "kabiro" && $row['status_akun'] == "Approved"){
                  $_SESSION['username']=$name;
                  $_SESSION['email']= $row['email'];
                  $_SESSION['level']='kabiro';
                  $_SESSION['kd_bagian']= $row['kd_bagian'];
                  $_SESSION['kd_biro'] = $row['kd_biro'];
                  header("Location: kabiro.php");
                }else{
                  echo '<div class="alert alert-danger"> Maaf...! Account Belum di konfirmasi oleh Administrator</div>';
                }
              }else {
                echo '<div class="alert alert-danger"> Data Yang dimasukan Salah.</div>';
              }
            }
        ?>

      <form action="#" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" name="username" placeholder="Username or Email" type="text">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" placeholder="Password" name="password" type="password">
          </div>
        </div>
        <a class="pull-right" href="Login/forgotpassword.php">Forgot password?</a>
        <div class="text-left">
          <label class="checkbox"><input type="checkbox"><span>Keep me logged in</span></label>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Log in">
      </form>
      <p>
        Don't have an account yet?
      </p>
      <a class="btn btn-default-outline btn-block" href="Signup/signup.php">Sign up now</a>
    </div>
    <!-- End Login Screen -->
  </body>
   <!-- JS -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="javascripts/main.js" type="text/javascript"></script>

</html>