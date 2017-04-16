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
  <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
        <h4 class="modal-title">
          TAMBAH USER
        </h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="pengolahan_user/simpan_user.php" method="post">
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">USERNAME </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Username" name="username" required>
              </div>
          </div>
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">PASSWORD </label>
              <div class="col-lg-8">
                  <input type="password" class="form-control" id="contract-name" placeholder="Masukan Password" name="password" required>
              </div>
          </div>
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">RE-PASSWORD </label>
              <div class="col-lg-8">
                  <input type="password" class="form-control" id="contract-name" placeholder="Masukan kembali password" name="re_password" required>
              </div>
          </div>
          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">NAMA </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" name="nama" required>
              </div>
          </div>
          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">EMAIL </label>
              <div class="col-lg-8">
                  <input type="email" class="form-control" id="contract-name" placeholder="Masukan Email" name="email" required>
              </div>
          </div >
          <?php
          $biro = mysqli_query($koneksi,"SELECT kd_biro,biro FROM biro");
           ?>
          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">BIRO </label>
              <div class="col-lg-8">
                  <select class="form-control" name="biro">
                    <?php 
                    while ($kolom = mysqli_fetch_array($biro)) {
                      echo "<option value='".$kolom['kd_biro']."'>".$kolom['biro']."</option>";
                    }
                     ?>
                  </select>
              </div>
          </div >
          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">LEVEL USER </label>
              <div class="col-lg-8">
                  <select class="form-control" name="level">
                    <option value="administrator">Administrator</option>
                    <option value="user">User</option>
                    <option value="teknisi">Teknisi</option>
                    <option value="pic">PIC</option>
                  </select>
              </div>
          </div >

          <div class="form-group">
              <label for="contact-name" class="col-lg-3 control-label">NO TLEP </label>
              <div class="col-lg-8">
                  <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama" name="no_telp">
              </div>
          </div>

          <div class="form-group">
              <label for = "contact-msg" class="col-lg-3 control-label">STATUS AKUN </label>
              <div class="col-lg-8">
                <label class="radio-inline"><input checked="" name="status_akun" type="radio" value="Approved"><span>APPROVED</span></label>
                <label class="radio-inline"><input name="status_akun" type="radio" value="Pending"><span>PENDING</span></label>
              </div>
          </div>

        </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">TAMBAH USER</button>
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
          <i class="icon-table"></i>DAFTAR USER i-NewsTV BIRO<a class="btn btn-sm btn-primary-outline pull-right" data-toggle="modal" href="#myModal" id="add-row"><i class="icon-plus"></i>Tambah User</a>
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th width="3%"></th>   
            <th id="tengah">
              NAMA
            </th>
            <th id="tengah">
              USERNAME
            </th>
            <th id="tengah">
              E-MAIL
            </th>
            <th id="tengah">
              NO_TLP
            </th>
            <th id="tengah">
              LEVEL
            </th>
            <th id="tengah">
              BIRO
            </th>
            <th id="tengah">
              TGL REG
            </th>
            <th id="tengah">
              STATUS
            </th>
            <th id="tengah">
              AKSI
            </th>
          </thead>
          <tbody>
          <?php 
          $query = mysqli_query($koneksi,"SELECT  `nama`,user.username,`password`,`email`,`no_telp`,`level`,`status_akun`,`biro`,`tanggal_register` FROM `user` JOIN `biro` USING(`kd_biro`)");
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
                <?php echo $result['username']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['email']; ?>
              </td>
              <td>
                <?php echo $result['no_telp']; ?>
              </td>
              <td>
                <?php echo $result['level']; ?>
              </td>
              <td>
                <?php echo $result['biro']; ?>
              </td>
              <td>
                <?php
                  echo $tanggal = date("d-m-Y", strtotime($result['tanggal_register'])); 
                ?>
              </td>
              <td>
                <?php 
                if ($result['status_akun']=="Approved") {
                    echo "<span class='label label-success'>".$result['status_akun']."</span>";
                  } elseif ($result['status_akun']=="Pending") {
                    echo "<span class='label label-warning'>".$result['status_akun']."</span>";
                  }
                 ?>
              </td>
              <td class="actions" id="tengah" >
                  <div class="action-buttons" >
                    <a class="table-actions" href="media.php?page=edit_user&id=<?php echo $result['username']; ?>"><i class="icon-pencil"></i></a> | 
                    <a class="table-actions" href="pengolahan_user/hapus_user.php?page=hapus_user&id=<?php echo $result['username'];?>"onclick="return confirm('Apakah yakin menghapus <?php echo $result['nama'].' sebagai User'; ?> ?')" ><i class="icon-trash"></i></a>
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