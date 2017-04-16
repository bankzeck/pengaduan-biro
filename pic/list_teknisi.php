  <div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
  <style type="text/css">
  #tengah{
    text-align: center;
  }
  </style>
  <!-- modal user-->
  <?php 
  include "config/koneksi.php";
  
   ?>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
         <!--  <i class="icon-table"></i>DAFTAR USER<a class="btn btn-sm btn-primary-outline pull-right" data-toggle="modal" href="#myModal" id="add-row"><i class="icon-plus"></i>Tambah User</a> -->
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th></th>  
            <th id="tengah">
              NAMA
            </th>
            <th id="tengah">
              NAMA PIC
            </th>
            <th id="tengah">
              NAMA BAGIAN
            </th>
          </thead>
          <tbody>
          <?php 
          // session_start();
          $kd_pic = $_SESSION['kd_pic'];
          
          $query = mysqli_query($koneksi,"SELECT `kd_bagian`,`nama_bagian`,`user`.`username`,`nama`,kd_pic,`nama_pic`
FROM `user` JOIN `bagian` USING(`kd_bagian`) JOIN `pic` USING(`kd_pic`) WHERE `kd_pic` = '$kd_pic' AND `level` = 'teknisi' AND `status_akun` = 'Approved';");
          if ($query != null) {
          $no = 0;
          while ($result = mysqli_fetch_array($query)) {
           ?>
            <tr>
              <td></td>
              <td>
                <?php echo $result['nama']; ?>
              </td>
              <td>
                <?php echo $result['nama_pic']; ?>
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