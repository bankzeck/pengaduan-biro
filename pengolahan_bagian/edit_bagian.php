<?php 
include "config/koneksi.php";

if (isset($_GET['id'])) {
	$kd_bagian = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query1 =  "SELECT * FROM bagian where kd_bagian = '$kd_bagian';";

$sql = mysqli_query($koneksi,$query1);
$hasil = mysqli_fetch_array($sql);
$kd_bagian = $hasil['kd_bagian'];
$nama_bagian = $hasil['nama_bagian'];


// proses edit
if(isset($_POST['edit'])){
$kd_bagian1 = $_POST['kd_bagian1'];
$nama_bagian1 = $_POST['nama_bagian1'];
$nama_pic1 = $_POST['nama_pic1'];

// update data
$query = "UPDATE `bagian` SET `kd_bagian` = '$kd_bagian1' , `nama_bagian` = '$nama_bagian1' , `kd_pic` = '$nama_pic1' 
          WHERE `kd_bagian` = '$kd_bagian';";
$sql = mysqli_query($koneksi,$query);
if ($sql) {
	echo "<meta http-equiv='refresh' content='0; url=media.php?page=list_bagian'>";
} else {
	?>
    <div class="widget-content padded">
    <div class="alert alert-danger">
      <button class="close" data-dismiss="alert" type="button">&times;</button>Gagal Mengubah Data Bagian.<br>Kode Bagian <b><?php echo $kd_bagian1; ?></b>
      sudah ada.
    </div>
    </div>
    <?php
	}
}	
 ?>
<div class="page-title">
  <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
          <i class="icon-table"></i>EDIT BAGIAN I-NEWS</i>
        </div>
        <div class="widget-content padded clearfix">
            <form class="form-horizontal" action="" method="post" enctype="multypart/form-data" name="edit" id="edit">     
            <div class="form-group">
                <label for="contact-name" class="col-lg-3 control-label">KODE BAGIAN : </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode Bagian" name="kd_bagian1" value="<?php echo $kd_bagian ?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <label for = "contact-msg" class="col-lg-3 control-label">NAMA BAGIAN : </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama Bagian" name="nama_bagian1" value="<?php echo $nama_bagian ?>">
                </div>
            </div>

            <div class="form-group">
                <label for = "contact-msg" class="col-lg-3 control-label">NAMA PIC </label>
                <div class="col-lg-6">
                   <select class="form-control" name="nama_pic1" value="<?php echo $nama_pic1 ?>">
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
            </div> 
            
            <div class="form-action no-margin-bottom" style="margin-left:40%">
            <input class="btn btn-primary" type="submit" name="edit" id="edit" value="Edit">
            <a href="media.php?page=list_bagian" class="btn btn-primary">Keluar</a>
            </div>
        </form>
    </div>
    </div>
</div>
