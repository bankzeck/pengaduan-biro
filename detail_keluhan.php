<?php 
if (isset($_GET['id'])) {
	$kd_pengaduan = $_GET['id'];
} else {
	die ("Error, Tidak ada kode terpilih");
}
 
 // tampilkan data
    $query4 = mysqli_query($koneksi,"SELECT * FROM pengaduan JOIN bagian USING (`kd_bagian`) WHERE `kd_pengaduan`='$kd_pengaduan'");
    $hasil = mysqli_fetch_array($query4);
    $originalDate = $hasil['tanggal_pengajuan'];
    $newDate = date("d-M-Y", strtotime($originalDate));
    $day = date ("l");
	switch ($day) {
	case 'Sunday' : $hari = "Minggu"; break;
	case 'Monday' : $hari = "Senin"; break;
	case 'Tuesday' : $hari = "Selasa"; break;
	case 'Wednesday' : $hari = "Rabu"; break;
	case 'Thursday' : $hari = "Kamis"; break;
	case 'Friday' : $hari = "Jum'at"; break;
	case 'Saturday' : $hari = "Sabtu"; break;
	default : $hari = "Kiamat";
	}
 ?>
<div class="mail">
	<h1>Detail Keluhan </h1>

		<div> 
			<label for="name">Nama Pengirim</label>
			<input type="text"  class="form-control" value="<?php echo $nama_user;?>" readonly>
		</div>

		<div>
			<label for="email">Email Pengirim</label>
			<input type="text"  class="form-control" value="<?php echo $_SESSION['email'];?>" readonly>
		</div>

		<div>
			<label for="name">Tanggal Kirim</label>
			<input type="text"  class="form-control" value="<?php echo $hari." / ". $newDate;?>" readonly>
		</div>

		<div>
			<label for="name">Judul Keluhan</label>
			<input type="text"  class="form-control" value="<?php echo $hasil['judul_permasalahan'];?>" readonly="">
		</div>

		<div>
			<label for="name">Status</label>
			<input type="text"  class="form-control" value="<?php echo $hasil['status'];?>" readonly="">
		</div>

		<div>
			<label for="name">Tujuan Kirim</label>
			<input type="text"  class="form-control" value="<?php echo $hasil['nama_bagian'];?>" readonly="">
		</div>

		<div>
			<label for="name">Deskripsi</label>
			<textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil['deskripsi'];?>" readonly=""><?php echo $hasil['deskripsi'];?></textarea>
		</div>
		<div><a href="user.php" class="btn btn-success" value="Kembali" >Kembali </div></a>

</div>
