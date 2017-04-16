<?php 
include "../config/koneksi.php";

$kd_bagian = isset($_POST['kd_bagian']) ? $_POST['kd_bagian']:"";
$kd_pengaduan = isset($_POST['kd_pengaduan']) ? $_POST['kd_pengaduan']:"";
$acc_kabiro = isset($_POST['acc_kabiro']) ? $_POST['acc_kabiro']:"";
$note_kabiro = isset($_POST['note_kabiro']) ? $_POST['note_kabiro']:"";

if ($kd_pengaduan=="") {
	echo "Data Gagal Tersimpan";
} elseif($acc_kabiro == 'accept') {
	$query = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `acc_kabiro` = '$acc_kabiro' , 
				`note_kabiro` = '$note_kabiro'
			WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
	?>
	 <script language="JavaScript">
	 alert('Data Berhasil Disimpan');
	 document.location='../kabiro.php';
	 </script>

 <?php  
  }else {
  	$query1 = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `acc_kabiro` = '$acc_kabiro' , 
				`note_kabiro` = '$note_kabiro'
			WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
 	?>
	 <script language="JavaScript">
	 alert('Data Berhasil Disimpan');
	 document.location='../kabiro.php';
	 </script>

 <?php  
 }
 ?>