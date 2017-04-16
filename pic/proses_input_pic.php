<?php 
	session_start();
	include "../config/koneksi.php";
	$username = $_SESSION['username'];
	$kd_pic = isset($_POST['kd_pic']) ? $_POST['kd_pic']:"";

	if ($kd_pic == "") {
		?>
		<script type="text/javascript">
			alert("Anda harus memilih PIC, Jika PIC tidak tersedia Hubungi Administrator !!");
			document.location = '../index.php';
		</script>
		<?php
		session_destroy();
	} else {
	mysqli_query($koneksi, "UPDATE `pic` SET `username` = '$username' WHERE `kd_pic` = '$kd_pic';");
	header("location:masuk_bagian.php?proses=masuk");
	}

?>