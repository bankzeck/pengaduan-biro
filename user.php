<?php
session_start();
if(empty($_SESSION)){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>I-News Biro </title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
	<link href="stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
    <script src="javascripts/jquery.dataTables.min.js" type="text/javascript"></script>	


    <style type="text/css">
    /*css untuk navbar*/
        nav.navbar-findcond { background: #fff; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
		nav.navbar-findcond a { color: #f14444; }
		nav.navbar-findcond ul.navbar-nav a { color: #f14444; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
		nav.navbar-findcond ul.navbar-nav a:hover,
		nav.navbar-findcond ul.navbar-nav a:visited,
		nav.navbar-findcond ul.navbar-nav a:focus,
		nav.navbar-findcond ul.navbar-nav a:active { background: #fff; }
		nav.navbar-findcond ul.navbar-nav a:hover { border-color: #f14444; }
		nav.navbar-findcond li.divider { background: #ccc; }
		nav.navbar-findcond button.navbar-toggle { background: #f14444; border-radius: 2px; }
		nav.navbar-findcond button.navbar-toggle:hover { background: #999; }
		nav.navbar-findcond button.navbar-toggle > span.icon-bar { background: #fff; }
		nav.navbar-findcond ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
		nav.navbar-findcond ul.dropdown-menu > li > a { color: #444; }
		nav.navbar-findcond ul.dropdown-menu > li > a:hover { background: #f14444; color: #fff; }
		nav.navbar-findcond span.badge { background: #f14444; font-weight: normal; font-size: 11px; margin: 0 4px; }
		nav.navbar-findcond span.badge.new { background: rgba(255, 0, 0, 0.8); color: #fff; }

		/*css form keluhan*/
	.mail{
		width: 730px;
		margin: 10px auto;
		border: 1px solid #ddd;
		padding: 10px;
	}
	.mail div{
		padding: 5px 0;
		border-bottom: 1px solid #ddd;
	}
	label{
		width: 100px;
		display: inline-block;
	}
	.bottom{
		font-size: 12px;
		text-align: right;
	}
    </style>

    
</head>
<body>
<!-- Account Detail -->
<?php
	$username = $_SESSION['username'];
	include "config/koneksi.php";
	$query = mysqli_query($koneksi,"SELECT  `nama`,user.username,`password`,`email`,`no_telp`,`level`,`status_akun`,`biro`,`tanggal_register`,`alamat` FROM `user` JOIN `biro` USING(`kd_biro`) WHERE user.username='$username'");
	$res = mysqli_fetch_array($query);
	$nama_user = $res['nama'];
	$biro = $res['biro'];

	// mengambil jumlah keluhan user
    $query2 = mysqli_query($koneksi,"SELECT COUNT(`kd_pengaduan`) AS jumlah_keluhan FROM pengaduan WHERE `username`='$username';");
    $hasil = mysqli_fetch_array($query2);

    // Mengambil Judul Keluhan
    $query3 = mysqli_query($koneksi,"SELECT kd_pengaduan, SUBSTRING(judul_permasalahan,1,15) AS judul_permasalahan  FROM pengaduan WHERE `username`='$username' LIMIT 5;");


    // mengambil jumlah tanggapan user
    $query5 = mysqli_query($koneksi,"SELECT COUNT(`tanggapan`) AS jumlah_tanggapan FROM pengaduan WHERE `username`='$username';");
    $hasil2 = mysqli_fetch_array($query5);




    // Mengambil Judul Keluhan tanggapan
    $query4 = mysqli_query($koneksi,"SELECT kd_pengaduan, SUBSTRING(judul_permasalahan,1,15) AS judul_permasalahan, `tanggapan`  
									 FROM pengaduan 
									 WHERE `username`='$username' AND `tanggapan` IS NOT NULL
									 LIMIT 5;");
 ?>

 <nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><img width="100" height="30" src="images/inews.png" /></a>
			
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
			<!-- Tanggapan -->
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-bullhorn"></i> <span class="badge"><?php echo $hasil2['jumlah_tanggapan']; ?></span></a>
					<ul class="dropdown-menu" role="menu">
					<?php  
						 while ( $baris = mysqli_fetch_array($query4)) {
					?>
						
						<li><a href="user.php?page=detail_tanggapan&id=<?php echo $baris['kd_pengaduan']; ?>"><i class="fa fa-fw fa-tag"></i> <span class="badge">Tanggapan dari judul</span><?php echo $baris['judul_permasalahan'].'...'; ?></a></li>
						
					<?php 
					}
					 ?>
					</ul>
				</li>
			<!-- Kotak Masuk -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="icon-envelope"></i> <span class="badge"><?php echo $hasil['jumlah_keluhan']; ?></span></a>
					<ul class="dropdown-menu" role="menu">
					<?php  
						 while ( $baris = mysqli_fetch_array($query3)) {
					?>
						
						<li><a href="user.php?page=detail_keluhan&id=<?php echo $baris['kd_pengaduan']; ?>"><i class="fa fa-fw fa-tag"></i> <span class="badge">Judul Keluhan</span><?php echo $baris['judul_permasalahan'].'...'; ?></a></li>
						
					<?php 
					}
					 ?>
					</ul>
				</li>
				<li class="active"><a href="user.php?page=histori_keluhan&id=<?php echo $baris['kd_pengaduan']; ?>"> History Keluhan & Tanggapan <span class="sr-only">(current)</span></a></li>
				<li class="active"><a href="#"><?php echo 'Biro '. $res['biro']; ?> <span class="sr-only"></span></a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $username;?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" data-toggle="modal" data-target="#myModal">Account Detail</a></li>
						<li><a href="#" data-toggle="modal" data-target="#myModal1">Ganti Password</a></li>
						<li class="divider"></li>

						<li><a href="Login/logout.php">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
</div>
</nav>
<br>
<br>
<br>

 <?php 
 // GANTI PASSWORD
	if(isset($_POST['ganti'])){

              
              $pass         = $_POST['password'];
              $ulangi       = $_POST['ulang_password'];
              $password     = md5($pass);
              $dulu         = $_POST['dulu'];
              $passworddulu = md5($dulu);

              $msg ="";
              $query1 = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username';");
              $hasil1 = mysqli_fetch_array($query1);
              if ($passworddulu == $hasil1['password'])
              {
                  if($pass == $ulangi)
                      {
                          $pwd = mysqli_query($koneksi,"UPDATE user set password='$password' where username='$username'")
                                          or die(mysql_error());
                          if ($pwd) {
                          	  ?>
	                          	  	<div class='alert alert-success alert-dismissable'>
			                               <a class='panel-close close' data-dismiss='alert'></a>
			                               <strong>Password</strong> Berhasil di Ubah
	                            	</div>
	                            	<script type="text/javascript">
	                            		document.Location = 'user.php?page=edit_user&id=<?php echo $username; ?>';
	                            	</script>
                            	<?php 
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

 
<div class="container-fluid main-content">
<?php  $msg; ?>
<!-- <START CONTENT> -->
        <?php 
        $page = (isset($_GET['page']))? $_GET['page'] : "main";
        switch ($page) {
          // Edit user Account
            case 'edit_user': include "edit_user.php"; break;
            case 'detail_keluhan' : include 'detail_keluhan.php'; break;
            case 'detail_tanggapan' : include 'detail_tanggapan.php'; break;
            case 'histori_keluhan' : include 'histori_keluhan.php'; break;
            case 'detail_histori_keluhan' : include 'detail_histori_keluhan.php'; break;
            case 'detail_histori_tanggapan' : include 'detail_histori_tanggapan.php';break;
            default : include "kirim_keluhan.php"; 
        }
        ?>
        <!-- END CONTENT -->

</div>
<!-- Modal Account Detail -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Account User</h4>
        </div>
        <div class="modal-body">

        <form  action="user.php?page=edit_user&id=<?php echo $username; ?>" method="post">

        	<!--  Wilayah Biro-->
	       <div class="form-group">
	       <label class="title">Biro :</label>
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-home"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $biro;?>">
	          </div>
	       </div>

	       <!--  Wilayah Biro-->
	       <div class="form-group">
	       <label class="title">Alamat Biro :</label>
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-road"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $res['alamat']; ?>">
	          </div>
	       </div>

          	<!--  Nama Lengkap -->
	       <div class="form-group">
	       <label class="title">Nama :</label>
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-credit-card"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $res['nama']; ?>">
	          </div>
	       </div>

	       <!-- Username -->
	       <div class="form-group">
	       <label class="title">Username :</label>
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-user"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $res['username']; ?>">
	          </div>
	        </div>
         
	        <!--  Email -->
	       <div class="form-group">
	        <label class="title">Email :</label>
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="email" readonly="" value="<?php echo $res['email']; ?>">
	          </div>
	       </div>

	       <!-- Mobile -->
	        <div class="form-group">
	        <label class="title">No Telepon :</label>
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-phone"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $res['no_telp']; ?>">
	          </div>
	        </div>

	    </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Edit Account">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

 

  <!-- Modal Ganti Password -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ganti Password Account</h4>
        </div>
        <div class="modal-body">

        <form  action="" method="post">

	        	<!-- Password Lama -->
	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" name="dulu" placeholder="Password lama" type="password" required>
	          </div>
	        </div>
	        <!-- Password Baru -->
	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-lock"></i></span><input class="form-control" placeholder="Password baru" name="password" type="password" required>
	          </div>
	        </div>
	        <!-- Password Ulangi Baru -->
	        <div class="form-group">
	          <div class="input-group">
	            <span class="input-group-addon"><i class="icon-ok"></i></span><input class="form-control" placeholder="Password baru Ulangi" name="ulang_password" type="password" required>
	          </div>
	        </div>

	    </div>
        <div class="modal-footer">
          <input type="submit" name="ganti" class="btn btn-primary" value="Ganti Password">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- End Modal -->
<!-- JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</body>
</html>