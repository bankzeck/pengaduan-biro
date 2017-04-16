<?php 
include "../config/koneksi.php";

$kd_bagian = isset($_POST['kd_bagian']) ? $_POST['kd_bagian']:"";
$nama_bagian = isset($_POST['nama_bagian']) ? $_POST['nama_bagian']:"";
$kd_pic = isset($_POST['kd_pic']) ? $_POST['kd_pic']:"";

if ($kd_bagian=="" || $nama_bagian == "" || $kd_pic == "") {
	echo "Data Gagal Tersimpan";
} else {
	$query = mysqli_query($koneksi,"INSERT INTO `bagian`
            (`kd_bagian`,
             `nama_bagian`,
             `kd_pic`)
	VALUES ('$kd_bagian',
    	    '$nama_bagian',
        	'$kd_pic');") or die (mysqli_error($koneksi));
 	?>
 <script language="JavaScript">
 alert('Data Berhasil Disimpan');
 document.location='../media.php?page=list_bagian';
 </script>

 <?php  
 }
 ?>