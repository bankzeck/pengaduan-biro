<?php 
include "../config/koneksi.php";

$kd_pengaduan = isset($_POST['kd_pengaduan']) ? $_POST['kd_pengaduan']:"";
$tanggapan = isset($_POST['tanggapan']) ? $_POST['tanggapan']:"";
$tanggal_pengajuan = isset($_POST['tanggal_pengajuan']) ? $_POST['tanggal_pengajuan']:"";
$tanggal_solved = date("Y-m-d");

$time_solving = ((abs(strtotime ($tanggal_solved) - strtotime ($tanggal_pengajuan)))/(60*60*24));

if ($kd_pengaduan=="" || $tanggapan == "") {
	echo "Data Gagal Tersimpan";
} else {
	$query = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `status` = 'Solved' , 
				`tanggapan` = '$tanggapan' , 
				`tanggal_solved` = '$tanggal_solved',
				`time_solving` = '$time_solving' 
				WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
 	?>
 <script language="JavaScript">
 alert('Data Berhasil Disimpan');
 document.location='../media.php?page=home&id=<?php echo $kd_pengaduan ?>';
 </script>

 <?php  
 }
 ?>