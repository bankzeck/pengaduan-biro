<?php
  session_start();
  $username = $_SESSION['username'];
  include ("../config/koneksi.php"); 

  $msg = "";
  if(isset($_POST["submit"]))
  {
    $kd_bagian1 = $_POST["kd_bagian1"];

    $query = mysqli_query($koneksi, "UPDATE `user` SET `kd_bagian` = '$kd_bagian1' WHERE `username` = '$username'; ");
    if ($query) {
      $_SESSION['kd_bagian'] = $kd_bagian1;
      ?>
      <script type="text/javascript">
      alert("Bagian kerja telah terpilih");
      document.location = "../teknisi.php";
      </script>
      <?php
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
        .header_bagian{
          font-weight: bold;
          font-size: 18px;
        }
        .catatan{
          background: #D2D2D2;
          padding: 5px;
          text-align: center;
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
      <div class="form-group">
        <div class="col-lg-12 header_bagian">
            PILIH BAGIAN
        </div>
      </div>

      <div class="form-group">
      <div class="catatan">
            <p><b>CATATAN:</b><br>
            * Pilih bagian yang sesuai dengan bagian kerja anda.<br>
            * Jika anda telah memilih bagian maka anda tidak dapat mengganti bagian kerja.<br>
            * Jika anda salah memilih dan berniat mengganti bagian kerja hubungi Administrator.</p>
      </div>
      </div>

      <div class="form-group">
          <div class="col-lg-12">
            <select class="form-control" name="kd_bagian1"> 
                <?php
                $bagian = mysqli_query($koneksi,"SELECT kd_bagian,nama_bagian FROM bagian");
                while ( $baris = mysqli_fetch_array($bagian)) {
                    echo "<option value=$baris[kd_bagian]>$baris[nama_bagian]</option>";
                }
                 ?>
            </select>
          </div>
        </div>
        <div>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="PILIH BAGIAN">
        </div>
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