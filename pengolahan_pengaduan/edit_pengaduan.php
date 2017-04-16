<?php 
include "config/koneksi.php";
if (isset($_GET['id'])) {
  $kd_pengaduan = $_GET['id'];
  $ket = isset($_GET['ket']) ? $_GET['ket']:"";
} else {
  die ("Error, Tidak ada kode terpilih");
}
// tampilkan data
$query1 =  "SELECT * FROM pengaduan WHERE kd_pengaduan = '$kd_pengaduan';";
$sql = mysqli_query($koneksi,$query1);
$hasil = mysqli_fetch_array($sql);

if ($hasil['status'] == "Solved") {
  $status = "UnSolved";
} else {
  $status = "Solved";
}

$query = "UPDATE `pengaduan` SET `status` = '$status' WHERE `kd_pengaduan` = '$kd_pengaduan';";
$sql = mysqli_query($koneksi,$query);
if ($ket == "belum") {
?>
 <script language="JavaScript">
 document.location='media.php?page=list_pengaduan_blm_terselesaikan';
 </script>
 <?php 	
} elseif ($ket == "selesai") {
	?>
 <script language="JavaScript">
 document.location='media.php?page=list_pengaduan_terselesaikan';
 </script>
 <?php 
}else{
?>
 <script language="JavaScript">
 document.location='media.php?page=list_pengaduan';
 </script>
 <?php 
}
  ?>