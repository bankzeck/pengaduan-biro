<?php
  include "config/koneksi.php";
  $username = isset($_POST['username']) ? $_POST['username']:"";
  $pass = isset($_POST['password']) ? $_POST['password']:"";
  $ulangi = isset($_POST['ulang_password']) ? $_POST['ulang_password']:"";
  $dulu = isset($_POST['dulu']) ? $_POST['dulu']:"";
  $password     = md5($pass);
  $passworddulu = md5($dulu);

  $msg ="";
  $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username';");
  $data = mysqli_fetch_array($query);
  if ($passworddulu == $data['password'])
  {
      if($pass == $ulangi)
          {
              $pwd = mysqli_query($koneksi,"UPDATE user set password='$password' where username='$username'")
                              or die(mysql_error());
              if ($pwd) {
              	  ?>
                	  <script type="text/javascript">
                        alert("Berhasil Merubah Password");
                        document.location='media.php';
                    </script>
                	<?php 
              }
          }
          else 
              {
                ?>
                <script type="text/javascript">
                    alert("Password Baru Tidak Cocok");
                    document.location='media.php';
                </script>
                <?php
          }
  } else {
      ?>
        <script type="text/javascript">
            alert("Password Lama Tidak Sesuai");
            document.location='media.php';
        </script>
        <?php
  }         
?>