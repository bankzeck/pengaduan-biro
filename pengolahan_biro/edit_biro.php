<?php 
include "config/koneksi.php";

if (isset($_GET['id'])) {
	$kd_biro = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query1 =  "SELECT * FROM biro where kd_biro = '$kd_biro';";

$sql = mysqli_query($koneksi,$query1);
$hasil = mysqli_fetch_array($sql);
$kd_bagian = $hasil['kd_biro'];
$biro = $hasil['biro'];
$alamat = $hasil['alamat'];
$username = $hasil['username'];

// proses edit
if(isset($_POST['edit'])){
$kd_biro1 = $_POST['kd_biro1'];
$biro1 = $_POST['biro1'];
$alamat1 = $_POST['alamat1'];
$username1 = $_POST['username1'];

// update data
$query = "UPDATE `biro` SET `kd_biro` = '$kd_biro1' , `biro` = '$biro1' , `alamat` = '$alamat1' , `username` = '$username1' WHERE `kd_biro` = '$kd_biro';";    
$sql = mysqli_query($koneksi,$query);
if ($sql) {
	echo "<meta http-equiv='refresh' content='0; url=media.php?page=list_biro'>";
} else {
	?>
    <div class="widget-content padded">
    <div class="alert alert-danger">
      <button class="close" data-dismiss="alert" type="button">&times;</button>Gagal Mengubah Data Biro.<br>Kode Biro <b><?php echo $kd_biro1; ?></b>
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
          <i class="icon-table"></i>EDIT BIRO i-NewsTV</i>
        </div>
        <div class="widget-content padded clearfix">
            <form class="form-horizontal" action="" method="post" enctype="multypart/form-data" name="edit" id="edit">     
            <div class="form-group">
                <label for="contact-name" class="col-lg-3 control-label">KODE : </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="contract-name" placeholder="Masukan Kode Bagian" name="kd_biro1" value="<?php echo $kd_biro ?>">
                </div>
            </div>

            <div class="form-group">
                <label for = "contact-msg" class="col-lg-3 control-label">BIRO : </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="contract-name" placeholder="Masukan Nama Bagian" name="biro1" value="<?php echo $biro ?>">
                </div>
            </div>

            <div class="form-group">
                <label for = "contact-msg" class="col-lg-3 control-label">ALAMAT </label>
                <div class="col-lg-6">
                  <textarea class="form-control" rows="3" name="alamat1" placeholder="Masukan alamat biro"><?php echo $alamat; ?></textarea>
                </div>
            </div> 

              <div class="form-group">
                <label for = "contact-msg" class="col-lg-3 control-label">KEPALA BIRO </label>
                <div class="col-lg-6">
                   <select class="form-control" name="username1" value="<?php echo $username ?>">
                     <?php 
                        $query1 = "SELECT * FROM `user`;";
                        $sql1 = mysqli_query($koneksi,$query1);
                        while ( $baris = mysqli_fetch_array($sql1)) {
                            if ($kd_biro == $baris['username']){
                                echo "<option value=$baris[username] selected>$baris[username]</option>";
                            }else {
                                echo "<option value=$baris[username]>$baris[username]</option>";
                            }
                        }
                     ?>
                    </select>
                </div>
            </div> 

            
            <div class="form-action no-margin-bottom" style="margin-left:40%">
            <input class="btn btn-primary" type="submit" name="edit" id="edit" value="Edit">
            <a href="media.php?page=list_biro" class="btn btn-primary">Keluar</a>
            </div>
        </form>
    </div>
    </div>
</div>
