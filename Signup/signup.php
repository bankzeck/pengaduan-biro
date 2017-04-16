<?php

  include ("../config/koneksi.php"); 

  $msg = "";
  if(isset($_POST["submit"]))
  {
    $kd_biro = $_POST["kd_biro"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $ulang_email = $_POST["ulang_email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ulang_password = $_POST["ulang_password"];
    $no_telp = $_POST["n_telp"];
    $level = "User";
    $status_akun = "Pending";
    $tanggal_register = date("Y-m-d");


    // Anti Encryt dan md5
    $username = mysqli_real_escape_string($koneksi, $username);
    $email = mysqli_real_escape_string($koneksi, $email);
    $ulang_email = mysqli_real_escape_string($koneksi, $ulang_email);
    $password = mysqli_real_escape_string($koneksi, $password);
    $password = md5($password);
    $ulang_password = mysqli_real_escape_string($koneksi, $ulang_password);
    $ulang_password = md5($ulang_password);
    
    // Validasi Email yang sama
    $sql="SELECT email FROM user WHERE email='$email'";
    $result=mysqli_query($koneksi,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
      $msg = "Maaf... Email Sudah digunakan";
    }
    // Validasi username sudah ada
    $sql="SELECT  username FROM user WHERE username='$username'";
    $result=mysqli_query($koneksi,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if(mysqli_num_rows($result) == 1)
    {
      $msg = "Maaf... username Sudah digunakan";
    }
    // validasi jika email tidak sesuai ulang email
    elseif ($email != $ulang_email) {
      $msg = "Email yang di masukan tidak sama dengan ulangi email";
    }
     // validasi jika password tidak sesuai ulang password
    elseif ($password != $ulang_password) {
      $msg = "password yang di masukan tidak sama dengan ulangi password";
    }else {
      $query = mysqli_query($koneksi, "INSERT INTO `user`
            (`username`,
             `password`,
             `level`,
             `nama`,
             `kd_biro`,
             `email`,
             `no_telp`,
             `status_akun`,
             `tanggal_register`)
      VALUES ('$username',
              '$password',
              '$level',
              '$nama',
              '$kd_biro',
              '$email',
              '$no_telp',
              '$status_akun',
              '$tanggal_register');");
      if($query)
      {
        $msg = "Terimakasih Sudah mendaftarkan biro anda, tunggu konfirmasi administrator.";
      }
    }
  }
?>
<html>
<head>
    <title>
      I-News Biro Pengajuan
    </title>
    <!-- CSS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
        .error
    {
      color:red;
      font-family:Consolas, "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", Monaco, "Courier New", monospace;
      font-size:16px;
    }
</style>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body class="login2">
    <!-- Signup Screen -->
    <div class="login-wrapper">
      <a href="#"><img width="100" height="30" src="../images/inews.png" /></a>
      <form method="post" action="#">
      <!-- Message -->
      <div class="form-group">
        <div class="error"><?php echo $msg;?></div>
        </div>

      <!-- Daerah Biro -->
      <div class="form-group">
          <div class="input-group">
             <span class="input-group-addon"><i class="icon-home"></i></span>
                <?php  
                  $result = mysqli_query($koneksi, "SELECT * FROM biro ORDER BY biro");  
                  $jsArray = "var kd_biro = new Array();\n";  
                  echo '<select name="kd_biro" class="form-control" onchange="changeValue(this.value)">';  
                  echo '<option>Pilih Wiliayah Biro</option>';  
                  while ($row = mysqli_fetch_array($result)) {  
                      echo '<option value="' . $row['kd_biro'] . '">' . $row['biro'] . '</option>';  
                      $jsArray .= "kd_biro['" . $row['kd_biro'] . "'] = {alamat:'" . addslashes($row['alamat']) . "'};\n";    
                  }  
                  echo '</select>';  
                ?>          
          </div>
        </div>
      

      <!-- Alamat Biro -->
      <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-road"></i></span><textarea class="form-control" type="text" id="alamat" value="alamat" readonly> </textarea>
          </div>
        </div>

        <!-- Script Tampil Alamat Biro -->
      <script type="text/javascript">  
          <?php echo $jsArray; ?>
            function changeValue(id){
            document.getElementById('alamat').value = kd_biro[id].alamat;
          };
      </script>

      <!--  Nama Lengkap -->
      <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-credit-card"></i></span><input class="form-control" type="text" placeholder="Masukan Nama Lengkap Anda" name="nama" required>
          </div>
        </div>

      <!--  Email -->
      <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="email" placeholder="ex :biro@email.com" name="email" required>
          </div>
      </div>

      <!-- Confirm Email Address -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-ok"></i></span><input class="form-control" type="email" placeholder="ex :biro@email.com" name="ulang_email" required>
          </div>
        </div>

        <!-- Username -->
      <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-user"></i></span><input class="form-control" type="text" placeholder="Masukan Username Anda" name="username" required>
          </div>
        </div>

        <!-- password -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" type="password" placeholder="Masukan password Anda" name="password">
          </div>
        </div>

        <!-- Ulang password -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-ok"></i></span><input class="form-control" type="password" placeholder="Masukan Ulang password Anda" name="ulang_password">
          </div>
        </div>

        <!-- Mobile -->
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="icon-phone"></i></span><input class="form-control" type="text" placeholder="Masukan No Telepon Biro " name="n_telp" required>
          </div>
        </div>

        <!-- Setujui / centang -->
        <div class="form-group">
          <label class="checkbox text-left"><input type="checkbox" required><span>I agree to the terms and conditions.</span></label>
        </div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign up">
        <p>
          Already have an account?
        </p>
        <a class="btn btn-default-outline btn-block" href="../index.php">Login now</a>
      </form>
    </div>
    <!-- End Signup Screen -->

  </body>
  <!-- JS -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="../javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="../javascripts/main.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.inputmask.js"></script>
</html>