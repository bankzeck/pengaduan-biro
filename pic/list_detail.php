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
            <th width="100px">
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
            <th class="hidden-xs" id="tengah">
              NOTE PIC
            </th>
            <th class="hidden-xs" id="tengah" width="80px">
              BAGIAN
            </th>
          </thead>
          <tbody>
          <?php 
          $kd_pic = $_SESSION['kd_pic'];
          $query = mysqli_query($koneksi,"SELECT *
										FROM 
										`pengaduan` 
										 JOIN `bagian` USING(`kd_bagian`)
										 JOIN `user` USING (`username`) 
										 JOIN `pic` USING(`kd_pic`)
										 JOIN biro USING(`kd_biro`)
										 WHERE pic.`kd_pic` = '$kd_pic'
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
            $time_solved = $result['acc_pic'];
            if($result['acc_pic'] == NULL){
              $result['acc_pic'] = "Pending";
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
                <?php echo $result['acc_pic'];?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['note_pic'];?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['nama_bagian']; ?>
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