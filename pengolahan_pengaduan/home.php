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
<div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
<div class="row">
<div class="col-lg-4">
  <div class="widget-container scrollable list task-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>LIST PENGADUAN BIRO<i class="icon-refresh pull-right"></i>
    </div>
    <div class="widget-content">
      <ul>
      <?php 
        include "config/koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) ORDER BY `tanggal_pengajuan` DESC;");
        while ($hasil=mysqli_fetch_array($sql)) {

        if ($hasil['status']=="Solved") {
          $color = "success";
        } else {
          $color = "warning";
        } 
       ?>
        <ul>
        <a href="media.php?page=home&id=<?php echo $hasil['kd_pengaduan']; ?>">
        <li>
          <label><?php echo $tanggal = date("d/m/Y", strtotime($hasil['tanggal_pengajuan'])); ?><span>|</span>
            <div class="label label-<?php echo $color; ?> pull-right">
              <?php echo $hasil['status'];?>
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
                   <br>&nbsp;&nbsp;<?php echo $baris['biro'];?>
                </p>
                <p>
                 
                </p>
              </div>
            </div>
            <div class="biro">
            Judul Pengaduan : <a href="#" class="user-name"><?php echo $baris['judul_permasalahan']; ?></a>
            </div>
            <br>
            <div class="biro">Deskripsi Keluhan :</div>
            <p class="content">
              <?php echo $baris['deskripsi']; ?>
            </p>
            <hr>
            <div class="biro">Solved By :</div>
            <p class="content">
              <?php echo $baris['solved_by']; ?>
            </p>
          </div>
        </div>

        <!-- akhir accordion tanggapan  -->
        <div class="panel-group" id="accordion">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
                  <div class="caret pull-right"></div>
                  <div class="btn btn-sm btn-default-outline">
                    <i class="icon-mail-forward"> Note PIC</i>
                  </div></a>
              </div>
            </div>
            <div class="panel-collapse collapse" id="collapseOne">
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12">
                      <?php echo $baris['note_pic']; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- tanggapan teknisi -->
            <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                  <div class="caret pull-right"></div>
                  <div class="btn btn-sm btn-default-outline">
                    <i class="icon-mail-forward"> SOLVED PROBLEM</i>
                  </div></a>
              </div>
            </div>
            <form method="post" action="pengolahan_pengaduan/kirim_tanggapan.php">
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <textarea class="form-control" rows="3" name="tanggapan" readonly=""><?php echo $baris['tanggapan']; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
            </form>
          </div>
          <!-- end kirim tanggapan -->

        </div>
        <!-- akhir accordion tanggapan  -->
    </div>
  </div>
</div>
</div>