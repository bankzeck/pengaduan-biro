  <style type="text/css">
  #tengah{
    text-align: center;
  }
  </style>
    <div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
  <!-- modal biro-->
  <?php 
  include "config/koneksi.php";
  $kd_bagian_user = $_SESSION['kd_bagian'];
   ?>
    <!-- DataTables Example -->
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
          <i class="icon-table"></i>DAFTAR PENGADUAN iNewsTV BIRO
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th width="25px"> NO</th>  
            <th width="150px">
              TANGGAL KIRIM
            </th>
            <th class="hidden-xs" id="tengah">
              JUDUL PENGADUAN
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              BIRO
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              TANGGAL SOLVE
            </th>
            <th class="hidden-xs" id="tengah" width="80px">
              TIME SOLVE
            </th>
            <th class="sorting" width="150px" id="tengah">
              AKSI
            </th>
          </thead>
          <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT `pengaduan`.`username`,
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
                                        DATEDIFF(`tanggal_solved`, `tanggal_pengajuan`) AS time_solved
                                        FROM 
                                        `pengaduan` JOIN `user` ON(`pengaduan`.`username`= `user`.`username`) 
                                        JOIN `biro` ON(`user`.`kd_biro` = `biro`.`kd_biro`)
                                        JOIN `bagian` ON(`pengaduan`.`kd_bagian` =`bagian`.`kd_bagian`)  
                                        WHERE `pengaduan`.`kd_bagian` = '$kd_bagian_user' AND acc_kabiro='accept' AND acc_pic='accept'");
          
          $i = 0 ;
          if ($query != null) {
          while ($result = mysqli_fetch_array($query)) {
          $i++;

            // Convert Tanggal
            $originalDate = $result['tanggal_pengajuan'];
            $newDate = date("d-M-Y", strtotime($originalDate));

            $originalDate1 = $result['tanggal_solved'];
            $newDate1 = date("d-M-Y", strtotime($originalDate1));
            $time_solved = $result['time_solved'];
            if($originalDate1 == '0000-00-00' || $originalDate1 == NULL){
              $newDate1 = "Belum Solved";
            } 

           ?>
            <tr>
              <td><?php echo $i;?></td>
              <td>
                <?php echo $newDate;?>
              </td>
              <td>
                <?php echo $result['judul_permasalahan']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['biro']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $newDate1;?>
              </td>
              <td class="hidden-xs">
                <?php echo $time_solved . "  Hari"; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="teknisi.php?page=detail_pengaduan&id=<?php echo $result['kd_pengaduan']; ?>"><i class="icon-external-link"> Detail Pengaduan</i></a> 
                </div>
              </td>
            </tr>
            <?php     
              }
            } else {
                echo "Data Kosong";
              }
             ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end DataTables Example -->