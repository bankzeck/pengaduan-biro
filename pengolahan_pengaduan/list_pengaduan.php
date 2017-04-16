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
            <th width="120px">
              TANGGAL KIRIM
            </th>
            <th class="hidden-xs" id="tengah">
              JUDUL PENGADUAN
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              BIRO
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              STATUS
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
          $query = mysqli_query($koneksi,"SELECT *, SUBSTRING(judul_permasalahan,1,100) AS judul_permasalahan,
                                          DATEDIFF(`tanggal_solved`, `tanggal_pengajuan`) AS time_solved
                                          FROM pengaduan 
                                          JOIN `user` USING (`username`) 
                                          JOIN biro USING(`kd_biro`)  
                                          ORDER BY `tanggal_pengajuan` DESC;");
          
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
                <?php echo $result['status'];?>
              </td>
              <td class="hidden-xs">
                <?php echo $newDate1;?>
              </td>
              <td class="hidden-xs">
                <?php echo $time_solved . "  Hari"; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="media.php?page=detail_pengaduan&id=<?php echo $result['kd_pengaduan']; ?>"><i class="icon-external-link"> Detail Pengaduan</i></a> 
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