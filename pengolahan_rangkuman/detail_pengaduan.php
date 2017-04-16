<?php 
include "config/koneksi.php";
if (isset($_GET['id'])) {
  $kd_pengaduan = $_GET['id'];
} else {
  die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query2 =  "SELECT *
            FROM pengaduan 
            JOIN `user` USING (`username`) 
            JOIN biro USING(`kd_biro`) 
            JOIN `bagian` ON `bagian`.`kd_bagian` = `pengaduan`.`kd_bagian`
            WHERE `kd_pengaduan` = '$kd_pengaduan'
            ORDER BY `tanggal_pengajuan` DESC;";

$sql = mysqli_query($koneksi,$query2);
$hasil1 = mysqli_fetch_array($sql);
 // Convert Tanggal
$originalDate = $hasil1['tanggal_pengajuan'];
$newDate = date("d-M-Y", strtotime($originalDate));

$originalDate1 = $hasil1['tanggal_solved'];
$newDate1 = date("d-M-Y", strtotime($originalDate1));

?>

<div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>

<div class="row">
<div class="col-lg-12">
<div class="widget-container fluid-height">
  <div class="heading tabs">
    <i class="icon-sitemap" ></i>Detail Pengaduan   
    <ul class="nav nav-tabs pull-right" data-tabs="tabs" id="tabs">
      <li class="active">
        <a data-toggle="tab" href="#tab1"><i class="icon-comments"></i><span>Detail Pengirim</span></a>
      </li>
      <li>
        <a data-toggle="tab" href="#tab2"><i class="icon-user"></i><span>Detail Pengaduan</span></a>
      </li>
      <li>
        <a data-toggle="tab" href="#tab3"><i class="icon-paper-clip"></i><span>Detail Tanggapan</span></a>
      </li>
    </ul>
  </div>
  <div class="tab-content padded" id="my-tab-content">
    <div class="tab-pane active" id="tab1">
      <h3>
        DETAIL PENGIRIM
      </h3>
      <p>

        <div class="form-group has-success" class="">
              <label class="control-label" for="inputSuccess">Nama Pengirim</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['nama']; ?>" readonly="">
        </div>

        <div class="form-group has-success" class="">
              <label class="control-label" for="inputSuccess">Email Pengirim</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['email']; ?>" readonly="">
        </div>

        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">No Telepon</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['no_telp']; ?>" readonly="">
        </div>

        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Biro</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['biro']; ?>" readonly="">
        </div>
      </p>
    </div>
    <div class="tab-pane" id="tab2">
      <h3>
        DETAIL PENGADUAN
      </h3>
      <p>
        <div class="form-group has-success" class="">
              <label class="control-label" for="inputSuccess">Judul</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['judul_permasalahan']; ?>" readonly="">
        </div>

        <div class="form-group has-success" class="">
              <label class="control-label" for="inputSuccess">Tanggal Kirim Pengaduan</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $newDate; ?>" readonly="">
        </div>

        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Ditujukan Kepada</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['nama_bagian']; ?>" readonly="">
        </div>

        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Note Dari PIC</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['note_pic']; ?>" readonly="">
        </div>
        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Deskripsi Pengaduan</label>
              <textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil1['deskripsi'];?>" readonly=""><?php echo $hasil1['deskripsi'];?></textarea>
        </div>
      </p>
    </div>
    <div class="tab-pane" id="tab3">
      <h3>
        DETAIL TANGGAPAN
      </h3>
      <p>
      	<div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Nama Department</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['nama_bagian']; ?>" readonly="">
        </div>
        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Tanggapan dari Department</label>
              <textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil1['tanggapan'];?>" readonly=""><?php echo $hasil1['tanggapan'];?></textarea>
        </div>
        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Status Pengaduan</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['status']; ?>" readonly="">
        </div>
        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Tanggal Solved</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $newDate1; ?>" readonly="">
        </div>
        <div class="form-group has-success">
              <label class="control-label" for="inputSuccess">Time Solved</label>
              <input class="form-control" id="inputSuccess" type="text" value="<?php echo $hasil1['time_solving'] . " Hari"; ?>" readonly="">
        </div>
      </p>
    </div>
  </div>
</div>
<a href="media.php?page=list_rangkuman"><button class="btn btn-lg btn-block btn-primary">Kembali</button></a>
</div>