  <style type="text/css">
  #tengah{
    text-align: center;
  }
  </style>
    <div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
  <!-- modal bagian-->
  <?php 
  include "config/koneksi.php";
  
   ?>
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
        <h4 class="modal-title">
          TAMBAH BAGIAN
        </h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="pengolahan_bagian/simpan_bagian.php" method="post">
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">KODE BAGIAN </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode Bagian" name="kd_bagian" required>
              </div>
          </div>

          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">NAMA BAGIAN </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama Bagian" name="nama_bagian" required>
              </div>
          </div >

          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">NAMA BAGIAN </label>
              <div class="col-lg-8">
              <select class="form-control" name="kd_pic" value="Pilih PIC"> PILIH PIC

                     <?php 
                        $query1 = "SELECT * FROM `pic`;";
                        $sql1 = mysqli_query($koneksi,$query1);
                        while ( $baris = mysqli_fetch_array($sql1)) {
                            if ($kd_jabatan == $baris['kd_pic']){
                                echo "<option value=$baris[kd_pic] selected>$baris[nama_pic]</option>";
                            }else {
                                echo "<option value=$baris[kd_pic]>$baris[nama_pic]</option>";
                            }
                        }
                     ?>
            </select>
            </div>
          </div >

      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">TAMBAH BAGIAN</button>
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
          <i class="icon-table"></i>DAFTAR BAGIAN i-NewsTV<a class="btn btn-sm btn-primary-outline pull-right" data-toggle="modal" href="#myModal" id="add-row"><i class="icon-plus"></i>Tambah Bagian</a>
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th></th>  
            <th width="100px">
              KODE
            </th>
            <th align="center">
              NAMA BAGIAN
            </th>
            <th class="hidden-xs" id="tengah">
              DIPEGANG OLEH
            </th>
            <th class="sorting">
              AKSI
            </th>
          </thead>
          <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT kd_bagian, nama_bagian, nama_pic FROM bagian
                                  LEFT JOIN pic ON bagian.`kd_pic` = pic.`kd_pic`
                                  UNION
                                  SELECT kd_bagian, nama_bagian, nama_pic FROM bagian
                                  RIGHT JOIN pic ON bagian.`kd_pic` = pic.`kd_pic`");
          if ($query != null) {
          while ($result = mysqli_fetch_array($query)) {
           ?>
            <tr>
              <td></td>
              <td>
                <?php echo $result['kd_bagian']; ?>
              </td>
              <td>
                <?php echo $result['nama_bagian']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['nama_pic']; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="media.php?page=edit_bagian&id=<?php echo $result['kd_bagian']; ?>"><i class="icon-pencil"></i></a> | 
                  <a class="table-actions" href="pengolahan_bagian/hapus_bagian.php?page=hapus_bagian&id=<?php echo $result['kd_bagian'];?>"onclick="return confirm('Apakah yakin menghapus <?php echo $result['nama_bagian'].' dari Bagian'; ?> ?')" ><i class="icon-trash"></i></a>
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