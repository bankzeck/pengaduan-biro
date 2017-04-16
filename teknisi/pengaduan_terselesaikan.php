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
<div class="col-lg-12">
  <div class="widget-container scrollable list rating-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>PENGADUAN BIRO<i class="icon-refresh pull-right"></i>
    </div>
    <div class="widget-content">
      <ul>
      <?php 
        include "config/koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT `kd_pengaduan`,`username`,`judul_permasalahan`,`deskripsi`,`tanggal_pengajuan`,`status`,`nama`,biro
                                              FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) WHERE status ='Solved' ORDER BY `tanggal_pengajuan` DESC;");
        while ($hasil=mysqli_fetch_array($sql)) { 
       ?>
        <li>
          <div class="reviewer-info">
            <div class="star-rating pull-right">
              <?php 
                if ($hasil['status']=="Solved") {
                  $color = "success";
                  $status = "Solved";
                  $icon = "icon-check-sign";
                  $status_dropdwon = "UnSolved";
                } else {
                  $color = "warning";
                  $status = "UnSolved";
                  $icon = "icon-warning-sign";
                  $status_dropdwon = "Solved";
                }

               ?>
               <div class="btn-group">
                      <button class="btn btn-xs btn-<?php echo $color; ?> dropdown-toggle" data-toggle="dropdown"><span class="<?php echo $icon; ?>"></span><?php echo $status; ?><span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="teknisi.php?page=edit_pengaduan&id=<?php echo $hasil['kd_pengaduan']; ?>&ket=selesai"><i class="icon-check-sign"></i><?php echo $status_dropdwon; ?></a>
                        </li>
                      </ul>
                    </div>
            </div>
            <img width="40" height="40" src="images/inews_avatar.jpg" /><b><u><a href="#"><?php echo $hasil['nama']; ?></a></u> (<?php echo $hasil['biro']; ?>)</b><em><?php echo $tanggal = date("l, d-m-Y", strtotime($hasil['tanggal_pengajuan']));  ?></em>
            <div class="biro">Judul : <?php echo $hasil['judul_permasalahan']; ?></div>
          </div>

          <div class="review-text">
            <p>
                <?php echo $hasil['deskripsi']; ?>
            </p>
          </div>
        </li>
        <?php 
        }
         ?>

      </ul>
    </div>
  </div>
</div>
          <!-- End Ratings -->