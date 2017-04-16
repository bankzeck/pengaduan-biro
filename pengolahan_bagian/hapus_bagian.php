<?php 
include "../config/koneksi.php";
if (isset($_GET['id'])) {
	$kd_bagian = $_GET['id'];
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($kd_bagian) && $kd_bagian != "") {
		$query = "DELETE FROM bagian where kd_bagian = '$kd_bagian'";
		$sql   = mysqli_query($koneksi,$query);

		if($sql){
			header("location:../media.php?page=list_bagian");
		} else {
			echo "data gagal terhapus";
		}
	}
 ?>