<?php 
include "../config/koneksi.php";

$kd_bagian = isset($_POST['kd_bagian']) ? $_POST['kd_bagian']:"";
$kd_pengaduan = isset($_POST['kd_pengaduan']) ? $_POST['kd_pengaduan']:"";
$acc_pic = isset($_POST['acc_pic']) ? $_POST['acc_pic']:"";
$note_pic = isset($_POST['note_pic']) ? $_POST['note_pic']:"";
$tanggapan = isset($_POST['tanggapan']) ? $_POST['tanggapan']:"";
$solved_by = isset($_POST['solved_by']) ? $_POST['solved_by']:"";


if ($kd_pengaduan=="") {
	echo "Data Gagal Tersimpan";
} elseif($acc_pic == 'accept' && $tanggapan == Null) {
	$query = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `acc_pic` = '$acc_pic' , 
				`note_pic` = '$note_pic'
			WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
	?>
	 <script language="JavaScript">
	 alert('Data Berhasil Disimpan');
	 document.location='../pic.php';
	 </script>

 <?php  
  }elseif ($acc_pic == 'reject' && $tanggapan == Null) {
  	$query1 = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `acc_pic` = '$acc_pic' , 
				`tanggapan` = '$note_pic'
			WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
 	?>
	 <script language="JavaScript">
	 alert('Data Berhasil Disimpan');
	 document.location='../pic.php';
	 </script>

 <?php  
 } elseif ($acc_pic == 'accept' && $tanggapan != Null) {
 	$query = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `acc_pic` = '$acc_pic' , 
				`note_pic` = '$note_pic',
				`tanggapan` = '$tanggapan',
				`solved_by` = 'pic',
				`status` = 'Solved'
			WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
	?>
	 <script language="JavaScript">
	 alert('Data Berhasil Disimpan');
	 document.location='../pic.php';
	 </script>

 <?php  
 } else {
 	$query = mysqli_query($koneksi,"UPDATE `pengaduan` 
			SET `acc_pic` = '$acc_pic' , 
				`note_pic` = '$note_pic',
				`tanggapan` = '$tanggapan',
				`solved_by` = 'pic',
				`status` = 'Solved'
			WHERE `kd_pengaduan` = '$kd_pengaduan';") or die (mysqli_error($koneksi));
	?>
	 <script language="JavaScript">
	 alert('Data Berhasil Disimpan');
	 document.location='../pic.php';
	 </script>

 <?php 
 }
 ?>