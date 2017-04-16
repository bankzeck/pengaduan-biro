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
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
        <h4 class="modal-title">
          TAMBAH BIRO
        </h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="pengolahan_biro/simpan_biro.php" method="post">
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">KODE BIRO </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode Biro" name="kd_biro" required>
              </div>
          </div>

          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">BIRO </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan biro" name="biro" required>
              </div>
          </div >

          <div class="form-group">
            <label for = "contact-msg" class="col-lg-3 control-label">ALAMAT </label>
            <div class="col-lg-8">
              <textarea class="form-control" rows="3" name="alamat" placeholder="Masukan alamat biro" required></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">TAMBAH BIRO</button>
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
          <i class="icon-table"></i>DAFTAR BIRO i-NewsTV<a class="btn btn-sm btn-primary-outline pull-right" data-toggle="modal" href="#myModal" id="add-row"><i class="icon-plus"></i>Tambah Biro</a>
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th></th>
            <th width="100px">
              KODE
            </th>
            <th align="center">
              BIRO
            </th>
            <th align="center">
              KEPALA BIRO
            </th>
            <th class="hidden-xs" id="tengah">
              ALAMAT
            </th>
            <th class="sorting">
              AKSI
            </th>
          </thead>
          <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT *FROM biro ORDER BY `biro`");
          if ($query != null) {
          while ($result = mysqli_fetch_array($query)) {
           ?>
            <tr>
              <td></td>
              <td>
                <?php echo $result['kd_biro']; ?>
              </td>
              <td>
                <?php echo $result['biro']; ?>
              </td>
              <td>
                <?php echo $result['username']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['alamat']; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="media.php?page=edit_biro&id=<?php echo $result['kd_biro']; ?>"><i class="icon-pencil"></i></a> | 
                  <a class="table-actions" href="pengolahan_biro/hapus_biro.php?page=hapus_biro&id=<?php echo $result['kd_biro'];?>"onclick="return confirm('Apakah yakin menghapus <?php echo $result['biro'].' dari Biro'; ?> ?')" ><i class="icon-trash"></i></a>
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