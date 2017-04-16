<?php 
if (isset($_GET['id'])) {
	$kd_pengaduan = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
 
 // tampilkan data
    $query6 = mysqli_query($koneksi,"SELECT * FROM pengaduan where `kd_pengaduan`='$kd_pengaduan'");
    $hasil3 = mysqli_fetch_array($query6);
 ?>
<div class="mail">
	<h1>Detail Keluhan </h1>

		<div>
			<label for="name">Judul Keluhan</label>
			<input type="text"  class="form-control" value="<?php echo $hasil3['judul_permasalahan'];?>" readonly="">
		</div>

		<div>
			<label for="name">Deskripsi</label>
			<textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil3['deskripsi'];?>" readonly=""><?php echo $hasil3['deskripsi'];?></textarea>
		</div>

		<div>
			<label for="name">Tanggapan Keluhan</label>
			<textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil3['Tanggapan'];?>" readonly=""><?php echo $hasil3['tanggapan'];?></textarea>
		</div>
		<div><a href="user.php" class="btn btn-success" value="Kembali" >Kembali </div></a>

</div>
