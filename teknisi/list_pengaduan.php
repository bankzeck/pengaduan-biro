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
$kd_bagian_user = $_SESSION['kd_bagian'];
$query_bagian = mysqli_query($koneksi,"SELECT * FROM `user` JOIN `bagian` USING(`kd_bagian`) WHERE `kd_bagian`='$kd_bagian_user' LIMIT 1;");
$hasil_bagian = mysqli_fetch_array($query_bagian);
 ?>
<div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
<div class="row">
<div class="col-lg-4">
  <div class="widget-container scrollable list task-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>LIST PENGADUAN - BAGIAN <?php echo strtoupper($hasil_bagian['nama_bagian']); ?><i class="icon-refresh pull-right"></i>
    </div>
    <div class="widget-content">
      <ul>
      <?php 
        include "config/koneksi.php";
        $sql = mysqli_query($koneksi, "SELECT `pengaduan`.`username`,
                                        user.`kd_biro`,
                                        `biro`.`biro`,
                                        `kd_pengaduan`,
                                        `judul_permasalahan`,
                                        `deskripsi`,
                                        `tanggal_pengajuan`,
                                        `pengaduan`.`kd_bagian`,
                                        `bagian`.`nama_bagian`,
                                        `status`,
                                        `note_pic`,
                                        `acc_pic`,
                                        `tanggal_pengajuan`,
                                        `tanggal_solved`,
                                        `time_solving`
                                        FROM 
                                        `pengaduan` JOIN `user` ON(`pengaduan`.`username`= `user`.`username`) 
                                        JOIN `biro` ON(`user`.`kd_biro` = `biro`.`kd_biro`)
                                        JOIN `bagian` ON(`pengaduan`.`kd_bagian` =`bagian`.`kd_bagian`)  
                                        WHERE `pengaduan`.`kd_bagian` = '$kd_bagian_user' AND pengaduan.`acc_pic` ='accept'");

        while ($hasil=mysqli_fetch_array($sql)) {

        if ($hasil['status']=="Solved") {
          $color = "success";
        } else {
          $color = "warning";
        } 
       ?>
        <ul>
        <a href="teknisi.php?page=list_pengaduan&id=<?php echo $hasil['kd_pengaduan']; ?>">
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
  $sql2 = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) WHERE `pengaduan`.`kd_bagian`='$kd_bagian_user' ORDER BY `tanggal_pengajuan` LIMIT 1;");
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
            Pengaduan : <a href="#" class="user-name"><?php echo $baris['judul_permasalahan']; ?></a>
            </div>
            <br>
            <div class="biro">Deskripsi Keluhan :</div>
            <p class="content">
              <?php echo $baris['deskripsi']; ?>
            </p>
            <div class="biro">Solved Oleh :</div>
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
          <?php 
          if ($baris['status']=="Solved") {
            // jika sudah solved menampilkan komentar solved
            ?>
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
                    <i class="icon-mail-forward"> SOLVE PROBLEM</i>
                  </div></a>
              </div>
            </div>
            <form method="post" action="teknisi/kirim_tanggapan.php">
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <textarea class="form-control" rows="3" name="tanggapan"></textarea>
                    <input type="hidden" name="kd_pengaduan" value="<?php echo $baris['kd_pengaduan']; ?>">
                    <input type="hidden" name="tanggal_pengajuan" value="<?php echo $baris['tanggal_pengajuan']; ?>">
                    <input type="hidden" name="solved_by" value="teknisi">
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