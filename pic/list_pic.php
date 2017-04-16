
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
// if (isset($_GET['id'])){
//   $kd_bagian1 = $_GET['id'];
// }else{
//   die ('error');
// }

// $kd_bagian_user = $kd_bagian1;
// $query_bagian1 = mysqli_query($koneksi,"SELECT * FROM `bagian` WHERE `kd_bagian`='$kd_bagian_user';");
// $hasil_bagian1 = mysqli_fetch_array($query_bagian1);


 ?>
<div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
<div class="row">
<div class="col-lg-4">
  <div class="widget-container scrollable list task-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>LIST SELURUH PENGADUAN
    </div>
    <div class="widget-content">
      <ul>
      <?php 
        include "config/koneksi.php";
        $kd_pic = $_SESSION['kd_pic'];
        $sql = mysqli_query($koneksi, "SELECT * 
                                       FROM pic JOIN bagian USING(`kd_pic`)
                                           JOIN pengaduan p USING(`kd_bagian`) 
                                           JOIN USER u ON p.`username`=u.`username`
                                           JOIN biro b ON u.`kd_biro`=b.`kd_biro`
                                           WHERE`kd_pic`='$kd_pic' AND `acc_kabiro`='accept';" );

        while ($hasil=mysqli_fetch_array($sql)) {
        if ($hasil['acc_pic']=="accept") {
          $color = "success";
        } elseif($hasil['acc_pic']==NULL) {
          $color = "warning";
        }else{
          $color = "danger";
        } 

        if ($hasil['acc_pic']== NULL){
          $hasil['acc_pic'] = "Pending";
          $color = "info";
        }
       ?>
        <ul>
        <a href="pic.php?page=list_pic&id=<?php echo $hasil['kd_bagian']; ?>&id1=<?php echo $hasil['kd_pengaduan']; ?>">
        <li>
          <label><?php echo $tanggal = date("d/m/Y", strtotime($hasil['tanggal_pengajuan'])); ?><span>|</span>
            <div class="label label-<?php echo $color; ?> pull-right">
              <?php echo $hasil['acc_pic'];?>
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

<!-- detail pengaduan -->
<?php 
if (!isset($_GET['id1'])) {
  $kd_pengaduan1 = isset($_GET['id1']);
  $sql2 = mysqli_query($koneksi, "SELECT * FROM pengaduan JOIN `user` USING (`username`) JOIN biro USING(`kd_biro`) WHERE `kd_pengaduan`='$kd_pengaduan1' ORDER BY `tanggal_pengajuan` LIMIT 1;");
  $baris1=mysqli_fetch_array($sql2);
  $kd_pengaduan = $baris1['kd_pengaduan'];
} else {
    $kd_pengaduan = $_GET['id1'];
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
    <?php 
    if (isset($_GET['id1'])) {
      ?>
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

          if (($baris['acc_pic'] =="accept") || ($baris['acc_pic'] =="reject") || ($baris['deskripsi'] ==NULL)) {
            // jika sudah solved menampilkan komentar solved
            ?>

            <div class="panel">
            <div class="panel-heading">
              <div class="panel-title">
                <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">
                  <div class="caret pull-right"></div>
                  <div class="btn btn-sm btn-default-outline">
                    <i class="icon-mail-forward"> Note PIC</i>
                  </div></a>
              </div>
            </div>
            <form method="post" action="pic/kirim_pic.php">
            <div class="panel-collapse collapse" id="collapseTwo">
              <div class="panel-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <?php if ($baris['deskripsi'] != NULL) {
                      # code...
                    ?>
                    <textarea class="form-control" rows="3" name="note_pic" readonly=""><?php echo $baris['note_pic']; ?></textarea>
                    <?php 
                  } else{
                    ?>
                    <textarea class="form-control" rows="3" name="note_pic" readonly="">Note Kosong</textarea>
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
                <a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapseone">
                  <div class="caret pull-right"></div>
                  <div class="btn btn-sm btn-default-outline">
                    <i class="icon-mail-forward"> Note & Solved PIC</i>
                  </div></a>
              </div>
            </div>
            
            <form method="post" action="pic/kirim_pic.php">
            <div class="panel-collapse collapse" id="collapseone">
              <div class="panel-body">
                <div class="form-group">
                <div class="title"> Verivikasi Keluhan dari PIC</div>
                  <label class="radio">
                  <input type="radio" name="acc_pic" value="accept" checked><span>accept</span>
                  </label>
                  <label class="radio">
                  <input type="radio" name="acc_pic" value="reject"><span>reject</span>
                  </label>
                  <hr>
                  <div class="col-md-12">
                    <div class="biro"> Note PIC</div>
                    <textarea class="form-control" rows="3" name="note_pic" required></textarea>
                    <div class="biro"> Solve By PIC</div>
                    <textarea class="form-control" rows="3" name="tanggapan"></textarea>
                    <input type="hidden" name="kd_pengaduan" value="<?php echo $baris['kd_pengaduan']; ?>">
                    <input type="hidden" name="kd_bagian" value="<?php echo $baris['kd_bagian']; ?>">
                    <input type="hidden" name="solved_by" value="pic">
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
        }
     ?>
    </div>
        <!-- akhir accordion tanggapan  -->
    </div>
  </div>
</div>
</div>
