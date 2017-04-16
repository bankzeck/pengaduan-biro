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
              NAMA USER
            </th>
            <th id="tengah">
              NAMA BIRO
            </th>
            <th id="tengah">
              EMAIL USER
            </th>
          </thead>
          <tbody>
          <?php 
          // session_start();
          $kd_biro = $_SESSION['kd_biro'];
          
          $query = mysqli_query($koneksi,"SELECT *
                                          FROM `user` 
                                          JOIN `biro` USING(`kd_biro`) 
                                          WHERE kd_biro = '$kd_biro' AND `level` = 'user' AND `status_akun` = 'Approved';");
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
                <?php echo $result['biro']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['email']; ?>
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