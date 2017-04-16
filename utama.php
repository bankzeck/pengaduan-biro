<style type="text/css">
  p{
    text-align: justify;
  }
  .biro{
    color: #FF9D45;
    font-weight: bold;
    top: auto;
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
        $sql = mysqli_query($koneksi, "SELECT `kd_pengaduan`,`username`,`judul_permasalahan`,`deskripsi`,`tanggal_pengajuan`,`status`,`nama`,biro
                                              FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) ORDER BY `tanggal_pengajuan` DESC;");
        while ($hasil=mysqli_fetch_array($sql)) { 
       ?>
        <ul>
        <a href="#">
        <li>
          <label><span></span>
            <div class="label label-success pull-right">
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

<!-- katagori (panel kanan) -->
<div class="col-lg-8">
  <div class="widget-container scrollable list rating-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>DETAIL PENGADUAN BIRO<i class="icon-refresh pull-right"></i>
    </div>
    <div class="widget-content">
        <!-- Text Post -->
        <div class="item widget-container fluid-height social-entry">
          <div class="widget-content padded">
            <div class="profile-info clearfix">
              <img width="50" height="50" class="social-avatar pull-left" src="images/avatar-female2.png" />
              <div class="profile-details">
                <a class="user-name" href="#"> &nbsp;&nbsp;<?php echo $hasil['nama']; ?></a>
                <p>
                  <em>&nbsp;<?php echo $tanggal = date("l, d-m-Y", strtotime($hasil['tanggal_pengajuan']));?></em>
                   <br>&nbsp;<?php echo $hasil['biro'];?>
                </p>
                <p>
                 
                </p>
              </div>
            </div>
            <div class="biro">
            Pengaduan : <a href="#" class="user-name"><?php echo $hasil['judul_permasalahan']; ?></a>
            </div>
            <p class="content">
              <?php echo $hasil['deskripsi']; ?>
            </p>
            <div class="btn btn-sm btn-default-outline">
              <i class="icon-thumbs-up-alt"></i>
            </div>
            <div class="btn btn-sm btn-default-outline">
              <i class="icon-mail-forward"></i>
            </div>
          </div>
        </div>
        <hr>
        <!-- end Text Post -->
    </div>
  </div>
</div>
</div>