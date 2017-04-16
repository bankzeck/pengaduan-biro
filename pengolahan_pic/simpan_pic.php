<?php 
include "../config/koneksi.php";

$kd_pic = isset($_POST['kd_pic']) ? $_POST['kd_pic']:"";
$nama_pic = isset($_POST['nama_pic']) ? $_POST['nama_pic']:"";
$email_pic = isset($_POST['email_pic']) ? $_POST['email_pic']:"";

if ($kd_pic=="" || $nama_pic == "" ) {
	echo "Data Gagal Tersimpan";
} else {
	$query = mysqli_query($koneksi,"INSERT INTO `pic`
            (`kd_pic`,
             `nama_pic`
             )
	VALUES ('$kd_pic',
    	    '$nama_pic');") or die (mysqli_error($koneksi));
 	?>
 <script language="JavaScript">
 alert('Data Berhasil Disimpan');
 document.location='../media.php?page=list_pica';
 </script>

 <?php  
 }
 ?>