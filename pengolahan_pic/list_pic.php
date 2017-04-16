  <style type="text/css">
  #tengah{
    text-align: center;
  }
  </style>
    <div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
  <!-- modal PIC-->
  <?php 
  include "config/koneksi.php";
  
   ?>
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
        <h4 class="modal-title">
          TAMBAH PIC
        </h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="pengolahan_pic/simpan_pic.php" method="post">
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">KODE PIC </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode Pic" name="kd_pic" required>
              </div>
          </div>

          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">NAMA PIC </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama PIC" name="nama_pic" required>
              </div>
          </div >
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">TAMBAH PIC</button>
        <button class="btn btn-default-outline" data-dismiss="modal" type="button">KELUAR</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <!-- DataTables Example -->
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
          <i class="icon-table"></i>DAFTAR PIC i-NewsTV<a class="btn btn-sm btn-primary-outline pull-right" data-toggle="modal" href="#myModal" id="add-row"><i class="icon-plus"></i>Tambah PIC</a>
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th width="3%"></th>  
            <th width="100px">
              KODE PIC
            </th>
            <th align="center">
              NAMA PIC
            </th>
            <th class="hidden-xs" id="tengah">
              NAMA
            </th>
            <th class="hidden-xs" id="tengah">
              EMAIL PIC
            </th>
            <th class="sorting" width="100px">
              AKSI
            </th>
          </thead>
          <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT `kd_pic`,`nama_pic`,`nama`,email FROM `pic` JOIN `user` USING(`username`);");
          if ($query != null) {
          while ($result = mysqli_fetch_array($query)) {
           ?>
            <tr>
              <td></td>
              <td>
                <?php echo $result['kd_pic']; ?>
              </td>
              <td>
                <?php echo $result['nama_pic']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['nama']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['email']; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="media.php?page=edit_pic&id=<?php echo $result['kd_pic']; ?>"><i class="icon-pencil"></i></a> | 
                  <a class="table-actions" href="pengolahan_pic/hapus_pic.php?page=hapus_pic&id=<?php echo $result['kd_pic'];?>"onclick="return confirm('Apakah yakin menghapus <?php echo $result['nama_pic'].' dari PIC'; ?> ?')" ><i class="icon-trash"></i></a>
                </div>
              </td>
            </tr>
            <?php     
              }
            $query12 = mysqli_query($koneksi,"SELECT *FROM pic WHERE `username` IS NULL");
            while ($result12 = mysqli_fetch_array($query12)) {
           ?>
            <tr>
              <td></td>
              <td>
                <?php echo $result12['kd_pic']; ?>
              </td>
              <td>
                <?php echo $result12['nama_pic']; ?>
              </td>
              <td class="hidden-xs">
                
              </td>
              <td class="hidden-xs">
                
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="media.php?page=edit_pic&id=<?php echo $result12['kd_pic']; ?>"><i class="icon-pencil"></i></a> | 
                  <a class="table-actions" href="pengolahan_pic/hapus_pic.php?page=hapus_pic&id=<?php echo $result12['kd_pic'];?>"onclick="return confirm('Apakah yakin menghapus <?php echo $result12['nama_pic'].' dari PIC'; ?> ?')" ><i class="icon-trash"></i></a>
                </div>
              </td>
            </tr>
            <?php     
              }
            // batas bawah
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