<?php 
include "../config/koneksi.php";
if (isset($_GET['id'])) {
	$kd_pic = $_GET['id'];
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($kd_pic) && $kd_pic != "") {
		$query = "DELETE FROM pic where kd_pic = '$kd_pic'";
		$sql   = mysqli_query($koneksi,$query);

		if($sql){
			header("location:../media.php?page=list_pica");
		} else {
			echo "data gagal terhapus";
		}
	}
 ?>