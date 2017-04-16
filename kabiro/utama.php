<style type="text/css">
  p{
    text-align: justify;
  }
  .biro{
    color: #FF9D45;
    font-weight: bold;
    top: auto;
    font-size: 16px;
    vertical-align: top;
  }
</style>
<?php 
$query_biro = mysqli_query($koneksi,"SELECT  `nama`, user.username,`password`,`email`,`no_telp`,`level`,`status_akun`,`biro`,`tanggal_register`,`alamat`, `kd_biro` FROM `user` JOIN `biro` USING(`kd_biro`) WHERE user.username='$username'");
$biro = mysqli_fetch_array($query_biro);
$kd_biro = $biro['kd_biro'];

 ?>
<div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
<div class="row">
<div class="col-lg-4">
  <div class="widget-container scrollable list task-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>LIST PENGADUAN USER BIRO <?php echo "(".$biro['biro'].")"; ?><i class="icon-refresh pull-right"></i>
    </div>
    <div class="widget-content">
      <ul>
      <?php 
        include "config/koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) WHERE kd_biro='$kd_biro' ORDER BY `tanggal_pengajuan` DESC;");

        
        while ($hasil=mysqli_fetch_array($sql)) {
        if ($hasil['acc_kabiro']=="accept") {
          $color = "success";
        } elseif($hasil['acc_kabiro']==NULL) {
          $color = "warning";
        }else{
          $color = "danger";
        } 

        if ($hasil['acc_kabiro']== NULL){
          $hasil['acc_kabiro'] = "Pending";
          $color = "info";
        }
       ?>
        <ul>
        <a href="kabiro.php?page=home&id=<?php echo $hasil['kd_pengaduan']; ?>">
        <li>
          <label><?php echo $tanggal = date("d/m/Y", strtotime($hasil['tanggal_pengajuan'])); ?><span>|</span>
            <div class="label label-<?php echo $color; ?> pull-right">
              <?php echo $hasil['acc_kabiro'];?>
            </div>
            <?php echo $hasil['judul_permasalahan']."&nbsp;(".$hasil['biro'].")"; ?></label>
        </li>
        </a>
      </ul>
        <!-- end Media Post -->
        <?php 
        }
         ?>
      </ul>
    </div>
  </div>
</div>
<!-- end pengaduan -->

<?php 
if (!isset($_GET['id'])) {
  $sql2 = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) ORDER BY `tanggal_pengajuan` DESC LIMIT 1;");
  $baris1=mysqli_fetch_array($sql2);
  $kd_pengaduan = $baris1['kd_pengaduan'];
} else {
    $kd_pengaduan = $_GET['id'];
}
    $sql1 = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) WHERE `kd_pengaduan`='$kd_pengaduan'");
    $baris=mysqli_fetch_array($sql1);
 ?>


<!-- katagori (panel kiri) -->
<div class="col-lg-8">
  <div class="widget-container scrollable list rating-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i><?php echo $baris['judul_permasalahan']; ?><i class="icon-check pull-right"><?php echo $baris['status']; ?></i>
    </div>
    <div class="widget-content">
        <!-- Text Post -->
        <div class="item widget-container fluid-height social-entry">
          <div class="widget-content padded">
            <div class="profile-info clearfix">
              <img width="50" height="50" class="social-avatar pull-left" src="images/avatar-female2.png" />
              <div class="profile-details">
                <a class="user-name" href="#"> &nbsp;&nbsp;<?php echo $baris['nama']; ?></a>
                <p>
                  <em>&nbsp;<?php echo $tanggal = date("l, d-m-Y", strtotime($baris['tanggal_pengajuan']));?></em>
                   <br>&nbsp;&nbsp; Biro (<?php echo $baris['biro'];?>)
                </p>
                <p>
                 
                </p>
              </div>
            </div>
            <div class="biro">
            Pengaduan : <a href="#" class="user-name"><?php echo $baris['judul_permasalahan']; ?></a>
            </div>
            <br>
            <p class="content">
              <?php echo $baris['deskripsi']; ?>
            </p>
          </div>
        </div>
        <!-- akhir accordion tanggapan  -->

          <?php 

          if (($baris['acc_kabiro'] =="accept") || ($baris['acc_kabiro'] =="reject") || ($baris['deskripsi'] ==NULL)) {
            // jika sudah solved menampilkan komentar solved
            ?>

            <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                  <div class="caret pull-right"></div>
                  <div class="btn btn-sm btn-default-outline">
                    <i class="icon-mail-forward"> Note Kabiro</i>
                  </div></a>
              </div>
            </div>
            <form method="post" action="kabiro/kirim_kabiro.php">
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <?php if ($baris['deskripsi'] != NULL) {
                      # code...
                    ?>
                    <textarea class="form-control" rows="3" name="note_kabiro" readonly=""><?php echo $baris['note_kabiro']; ?></textarea>
                    <?php 
                  } else{
                    ?>
                    <textarea class="form-control" rows="3" name="note_kabiro" readonly="">Note Kosong</textarea>
                  <?php
                }
                     ?>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
          <!-- end kirim tanggapan -->
            <?php  
          } else {
           ?>
          <!-- kirim tanggapan -->
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                  <div class="caret pull-right"></div>
                  <div class="btn btn-sm btn-default-outline">
                    <i class="icon-mail-forward"> Note Kabiro</i>
                  </div></a>
              </div>
            </div>
            <form method="post" action="kabiro/kirim_kabiro.php">
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <div class="form-group">

                  <label class="radio">
                  <input type="radio" name="acc_kabiro" value="accept" checked><span>accept</span>
                  </label>
                  <label class="radio">
                  <input type="radio" name="acc_kabiro" value="reject"><span>reject</span>
                  </label>
                  <div class="col-md-12">
                    <textarea class="form-control" rows="3" name="note_kabiro" required></textarea>
                    <input type="hidden" name="kd_pengaduan" value="<?php echo $baris['kd_pengaduan']; ?>">
                    <input type="hidden" name="kd_bagian" value="<?php echo $baris['kd_bagian']; ?>">
                    
                    <br>
                    <div class="pull-right">
                    <input type="submit" class="btn btn-success" value="KIRIM JAWABAN">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
          <!-- end kirim tanggapan -->
          <?php 
          }
           ?>
        </div>
        <!-- akhir accordion tanggapan  -->
    </div>
  </div>
</div>
</div>