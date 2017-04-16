<?php 
include "../config/koneksi.php";
if (isset($_GET['id'])) {
	$username = $_GET['id'];
} else {
	die ("Error tidak ada kode yang dipilih");
}
	if (!empty($username) && $username != "") {
		$query = "DELETE FROM user where username = '$username'";
		$sql   = mysqli_query($koneksi,$query);

		if($sql){
			header("location:../media.php?page=list_user");
		} else {
			?>
			<script type="text/javascript">
			alert("Gagal Menghapus Data");
			</script>
		<?php
		}
	}
 ?>