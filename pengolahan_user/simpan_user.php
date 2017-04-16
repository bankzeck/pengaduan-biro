<?php 
include "../config/koneksi.php";

$username = isset($_POST['username']) ? $_POST['username']:"";
$password = isset($_POST['password']) ? $_POST['password']:"";
$re_password = isset($_POST['re_password']) ? $_POST['re_password']:"";
$nama = isset($_POST['nama']) ? $_POST['nama']:"";
$email = isset($_POST['email']) ? $_POST['email']:"";
$kd_biro = isset($_POST['biro']) ? $_POST['biro']:"";
$level = isset($_POST['level']) ? $_POST['level']:"";
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp']:"";
$status_akun = isset($_POST['status_akun']) ? $_POST['status_akun']:"";
$tanggal_register = date("Y-m-d");

if ($password != $re_password) {
	?>
	<script type="text/javascript">
	alert("GAGAL TAMBAH USER !!!\n Password yang anda masukkan tidak sama");
	 document.location='../media.php?page=list_user';
	</script>
	<?php
} else {

$password = md5($password);

if ($username=="" || $password == "" || $email == "") {
	echo "Data Gagal Tersimpan";
} else {
	$query = mysqli_query($koneksi,"INSERT INTO `user` (`username`, `password`, `level`, `nama`, `email`, `no_telp`, `status_akun`, `kd_biro`, `tanggal_register`) 
		VALUES ('$username', '$password', '$level', '$nama', '$email', '$no_telp', '$status_akun', '$kd_biro', '$tanggal_register'); ") or die (mysqli_error($koneksi));
 	?>
 <script language="JavaScript">
 alert('Data Berhasil Disimpan');
 document.location='../media.php?page=list_user';
 </script>

 <?php  
 }
 }
 ?>