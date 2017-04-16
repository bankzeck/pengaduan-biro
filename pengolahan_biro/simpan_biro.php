<?php 
include "../config/koneksi.php";

$kd_biro = isset($_POST['kd_biro']) ? $_POST['kd_biro']:"";
$biro = isset($_POST['biro']) ? $_POST['biro']:"";
$alamat = isset($_POST['alamat']) ? $_POST['alamat']:"";

if ($kd_biro=="" || $biro == "" || $alamat == "") {
	echo "Data Gagal Tersimpan";
} else {
	$query = mysqli_query($koneksi,"INSERT INTO `biro`
            (`kd_biro`,
             `biro`,
             `alamat`)
	VALUES ('$kd_biro',
    	    '$biro',
        	'$alamat');") or die (mysqli_error($koneksi));
 	?>
 <script language="JavaScript">
 alert('Data Berhasil Disimpan');
 document.location='../media.php?page=list_biro';
 </script>

 <?php  
 }
 ?>