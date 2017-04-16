<?php 
include "../config/koneksi.php";
if (isset($_GET['id'])) {
	$kd_biro = $_GET['id'];
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($kd_biro) && $kd_biro != "") {
		$query = "DELETE FROM biro where kd_biro = '$kd_biro'";
		$sql   = mysqli_query($koneksi,$query);

		if($sql){
			header("location:../media.php?page=list_biro");
		} else {
			echo "data gagal terhapus";
		}
	}
 ?>