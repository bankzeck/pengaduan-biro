<?php 
	session_start();
	include "../config/koneksi.php";
	$username   = $_SESSION['username'];

	$q   		= mysqli_query($koneksi, "SELECT kd_pic FROM `pic` WHERE username='$username'");
	$r  		= mysqli_fetch_array($q);
	$kd_pic	 	= $r['kd_pic'];
	// $id 	= $_SESSION['kd_pic'];
				// echo "$kd_pic";
				// echo "string";
	if(isset($_POST['submit'])){
		if(!empty($_POST['kd_bagian'])){
			foreach($_POST['kd_bagian'] as $kd_bagian){
			mysqli_query($koneksi,"UPDATE `bagian` SET `kd_pic` = '$kd_pic' WHERE `kd_bagian` = '$kd_bagian';");
				// echo "$kd_bagian"."<br>";
			}
		}
	}

	// mysqli_query($koneksi, "UPDATE `bagian` SET `kd_pic` = '' WHERE `kd_bagian` = '1';");
	
	header("location:masuk_detail.php?kd_pic=$kd_pic");
?>