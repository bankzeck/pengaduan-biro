<?php
session_start();
if(empty($_SESSION)){
  header("Location: index.php");
}
if($_SESSION['level']=="teknisi"){
  header("Location: teknisi.php");
}
if($_SESSION['level']=="user"){
  header("Location: user.php");
}
if($_SESSION['level']=="pic"){
  header("Location: pic.php"); 
}
?>
<!DOCTYPE html>
<html>
  
<head>
    <title>
      PENGADUAN BIRO
    </title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
    <link href="stylesheets/color/yellow.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
    <link href="stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
    <link href="stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
    <link href="stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascripts/raphael.min.js" type="text/javascript"></script>
    <script src="javascripts/selectivizr-min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="javascripts/fullcalendar.min.js" type="text/javascript"></script>
    <script src="javascripts/gcal.js" type="text/javascript"></script>
    <script src="javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="javascripts/excanvas.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="javascripts/isotope_extras.js" type="text/javascript"></script>
    <script src="javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="javascripts/select2.js" type="text/javascript"></script>
    <script src="javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="javascripts/summernote.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="javascripts/typeahead.js" type="text/javascript"></script>
    <script src="javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="javascripts/date.js" type="text/javascript"></script>
    <script src="javascripts/morris.min.js" type="text/javascript"></script>
    <script src="javascripts/skycons.js" type="text/javascript"></script>
    <script src="javascripts/fitvids.js" type="text/javascript"></script>
    <script src="javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="javascripts/main.js" type="text/javascript"></script>
    <script src="javascripts/respond.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body>
    <div class="modal-shiftfix">
    <?php 
    include "config/koneksi.php";
    $username = $_SESSION['username'];
    $query_akun = mysqli_query($koneksi,"SELECT  `nama`, user.username,`password`,`email`,`no_telp`,`level`,`status_akun`,`biro`,`tanggal_register`,`alamat` FROM `user` JOIN `biro` USING(`kd_biro`) WHERE user.username='$username'");
    $account = mysqli_fetch_array($query_akun);

    // mengambil banyaknya user yang belum dikonfirmasi
    $count_pending = mysqli_query($koneksi,"SELECT COUNT(`username`) AS `jml` FROM `user` WHERE `status_akun`='Pending';");
    $result =  mysqli_fetch_array($count_pending);
    $user_pending = $result['jml'];
    //mengambil nama user yang belum di konfirmasi
    $pending = mysqli_query($koneksi,"SELECT `username`,`nama` FROM `user` WHERE `status_akun`='Pending' LIMIT 5;");
    

     ?>
      <!-- Navigation -->

      <div class="navbar navbar-fixed-top scroll-hide">
        <div class="container-fluid top-bar">
          <div class="pull-right">
            <ul class="nav navbar-nav pull-right">
              <li class="dropdown notifications hidden-xs">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span aria-hidden="true" class="icon-user"></span>
                  <div class="sr-only">
                    Notifications
                  </div>
                  <!-- untuk menampilkan pemberitahuan jika ada user baru -->
                  <?php 
                    if ($result['jml']>0) {
                      echo "<p class='counter'>
                        $user_pending
                      </p>";
                    }
                   ?>
                </a>
                <ul class="dropdown-menu">
                <?php
                    while ($kolom = mysqli_fetch_array($pending)) {
                 ?>
                  <li><a href="media.php?page=edit_user&id=<?php echo $kolom['username']; ?>">
                    <div class="notifications label label-info">
                      Baru
                    </div>
                    <p>
                      <?php echo substr($kolom['nama'],0,15)."...";
                       ?>
                    </p></a>
                  </li>
                  <?php 
                  }
                   ?>
                  
                </ul>
              </li>
              
              <li class="dropdown settings hidden-xs">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span aria-hidden="true" class="se7en-gear"></span>
                  <div class="sr-only">
                    Settings
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="settings-link gray" href="javascript:chooseStyle('gray-theme', 30)"><span></span>Black</a>
                  </li>
                  <li>
                  <li>
                    <a class="settings-link orange" href="javascript:chooseStyle('orange-theme', 30)"><span></span>Orange</a>
                  </li>
      
                  
                </ul>
              </li>
              <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img width="34" height="34" src="images/inews_avatar.jpg" /><?php echo $account['nama'];?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-toggle="modal" data-target="#myAkun">
                    <i class="icon-user"></i>Akun Saya</a>
                  </li>
                  <li><a href="#" data-toggle="modal" data-target="#gantiPassword">
                    <i class="icon-lock"></i>Ganti Password</a>
                  </li>
                  <li><a href="Login/logout.php">
                    <i class="icon-signout"></i>Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <button class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="logo" href="media.php?page=home"></a>
          
        </div>
        <?php
        $a = "";
        $b = "";
        $c = "";
        $d = "";
        $e = "";
        $g = "";
        $page = isset($_GET['page']) ? $_GET['page']:"";
        switch (substr($page, 5,4)) {
        case 'biro': $b = "current";break;
        case 'user': $c = "current";break;
        case 'peng': $d = "current";break;
        case 'bagi' : $e = "current"; break;
        case 'pica' : $f = "current"; break;
        case 'rang' : $g = "current"; break;
        default: $a = "current";break;
          break;
        }
        
         ?>
        <div class="container-fluid main-nav clearfix">
          <div class="nav-collapse">
            <ul class="nav">
              <li>
                <a class="<?php echo $a; ?>" href="media.php"><span aria-hidden="true" class="icon icon-home"></span>HOME</a>
              </li>
              <li><a class="<?php echo $b; ?>" href="media.php?page=list_biro">
                <span aria-hidden="true" class="icon icon-map-marker"></span>LIST BIRO</a>
              </li>
              <li><a class="<?php echo $e; ?>" href="media.php?page=list_bagian">
                <span aria-hidden="true" class="icon icon-sitemap"></span>LIST BAGIAN</a>
              </li>
              <li><a class="<?php echo $f; ?>" href="media.php?page=list_pica">
                <span aria-hidden="true" class="icon icon-building"></span>LIST PIC</a>
              </li>
              <li><a class="<?php echo $c; ?>" href="media.php?page=list_user">
                <span aria-hidden="true" class="icon icon-group"></span>USER</a>
              </li>
              <li><a class="<?php echo $d; ?>" href="media.php?page=list_pengaduan">
                <span aria-hidden="true" class="icon icon-file-text"></span>PENGADUAN</a>
              </li>
              <li><a class="<?php echo $g; ?>" href="media.php?page=list_rangkuman">
                <span aria-hidden="true" class="icon icon-file-text"></span>RANGKUMAN PENGADUAN</a>
              </li>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Navigation -->
      <div class="container-fluid main-content">
        <!-- <START CONTENT> -->
        <?php 
        $page = (isset($_GET['page']))? $_GET['page'] : "main";
        switch ($page) {
          // PROFI;
            case 'edit_profil': include "edit_profil.php"; break;
          // BIRO
            case 'list_biro': include "pengolahan_biro/list_biro.php"; break;
            case 'hapus_biro': include "pengolahan_biro/hapus_biro.php"; break;
            case 'edit_biro': include "pengolahan_biro/edit_biro.php"; break;
          // USER
            case 'list_user': include "pengolahan_user/list_user.php"; break;
            case 'hapus_user': include "pengolahan_user/hapus_user.php"; break;
            case 'edit_user': include "pengolahan_user/edit_user.php"; break;
          // PENGADUAN
            case 'list_pengaduan': include "pengolahan_pengaduan/list_pengaduan.php"; break;
            case 'detail_pengaduan': include "pengolahan_pengaduan/detail_pengaduan.php"; break;
          // BAGIAN
            case 'list_bagian': include "pengolahan_bagian/list_bagian.php"; break;
            case 'hapus_bagian': include "pengolahan_bagian/hapus_bagian.php"; break;
            case 'edit_bagian': include "pengolahan_bagian/edit_bagian.php"; break;
          // PIC
            case 'list_pica': include "pengolahan_pic/list_pic.php"; break;
            case 'hapus_pic': include "pengolahan_pic/hapus_pic.php"; break;
            case 'edit_pic': include "pengolahan_pic/edit_pic.php"; break;
          // RANGKUMAN PENGADUAN
            case 'list_rangkuman': include "pengolahan_rangkuman/list_pengaduan.php"; break;
            case 'detail_rangkuman' : include "pengolahan_rangkuman/detail_pengaduan.php"; break; 
            case 'main':
            default: include 'pengolahan_pengaduan/home.php';
        }
        ?>
        <!-- END CONTENT -->

      </div>
    </div>

<!-- Modal -->
    <?php 
    $nama_user = $account['nama'];
    $biro = $account['biro'];
     ?>
    <div class="modal fade" id="myAkun" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Detail Account User</h4>
        </div>
        <div class="modal-body">

        <form  action="media.php?page=edit_profil&id=<?php echo $username; ?>" method="post">
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
              <span class="input-group-addon"><i class="icon-road"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $account['alamat']; ?>">
            </div>
         </div>

            <!--  Nama Lengkap -->
         <div class="form-group">
         <label class="title">Nama :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-credit-card"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $account['nama']; ?>">
            </div>
         </div>

         <!-- Username -->
         <div class="form-group">
         <label class="title">Username :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-user"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $account['username']; ?>">
            </div>
          </div>
         
          <!--  Email -->
         <div class="form-group">
          <label class="title">Email :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="email" readonly="" value="<?php echo $account['email']; ?>">
            </div>
         </div>

         <!-- Mobile -->
          <div class="form-group">
          <label class="title">No Telepon :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-phone"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $account['no_telp']; ?>">
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
  <!-- end modal detail user -->

  <!-- Modal Ganti Password -->
  <div class="modal fade" id="gantiPassword" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ganti Password Account</h4>
        </div>
        <div class="modal-body">

        <form action="proses_ganti_password.php" method="post">

            <!-- Password Lama -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <input class="form-control" name="dulu" placeholder="Password lama" type="password" required>
              <input type="hidden" value="<?php echo $username; ?>" name="username">
            </div>
          </div>
          <!-- Password Baru -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <input class="form-control" placeholder="Password baru" name="password" type="password" required>
            </div>
          </div>
          <!-- Password Ulangi Baru -->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-ok"></i></span>
              <input class="form-control" placeholder="Password baru Ulangi" name="ulang_password" type="password" required>
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

  </body>

</html>