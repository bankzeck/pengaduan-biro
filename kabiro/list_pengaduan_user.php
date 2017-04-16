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
  $kd_biro = $_SESSION['kd_biro'];
   ?>
    <!-- DataTables Example -->
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
          <i class="icon-table"></i>DAFTAR PENGADUAN USER iNewsTV BIRO
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
              TUJUAN
            </th>
            <th class="hidden-xs" id="tengah" width="80px">
              NAMA PENGIRIM
            </th>
            <th class="sorting" width="150px" id="tengah">
              AKSI
            </th>
          </thead>
          <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT * 
                                          FROM `pengaduan` 
                                          JOIN `bagian` USING (`kd_bagian`)
                                          JOIN `user` USING (`username`)
                                          JOIN `biro` USING(`kd_biro`) 
                                          WHERE kd_biro = '$kd_biro' AND `level` = 'user' AND `status_akun` = 'Approved';");
          
          $i = 0 ;
          if ($query != null) {
          while ($result = mysqli_fetch_array($query)) {
          $i++;

            // Convert Tanggal
            $originalDate = $result['tanggal_pengajuan'];
            $newDate = date("d-M-Y", strtotime($originalDate));

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
                <?php echo $result['nama_bagian']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['nama']; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="kabiro.php?page=detail_pengaduan&id=<?php echo $result['kd_pengaduan']; ?>"><i class="icon-external-link"> Detail Pengaduan</i></a> 
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