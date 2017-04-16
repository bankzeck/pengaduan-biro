
<div class="mail">
	<h1>Kirim Pengajuan Keluhan</h1>
	<form action="send_mail.php" method="post" onsubmit="return confirm('Apakah Anda Sudah Yakin Dengan Tujuan Kirim Keluhan Anda ?');">
		
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $nama_user;?>" readonly>
			<input type="hidden" name="username" class="form-control" value="<?php echo $username;?>" readonly>
		</div>

		<div>
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email'];?>" readonly>
		</div>

		<div>
			<label for="name">Biro</label>
			<input type="text" name="biro" class="form-control" value="<?php echo $biro;?>" readonly>
		</div>

		<div>
			<label for="name">Judul</label>
			<input type="text" class="form-control" name="judul_permasalahan">
		</div>

		<div>
			<label for="name">Tujuan</label>
			<select class="form-control" name="tujuan" value="PILIH TUJUAN ">
                     <?php 
                        $query1 = "SELECT * FROM `bagian`;";
                        $sql1 = mysqli_query($koneksi,$query1);
                        while ( $baris = mysqli_fetch_array($sql1)) {
                            if ($kd_jabatan == $baris['kd_bagian']){
                                echo "<option value=$baris[kd_bagian] selected>$baris[nama_bagian]</option>";
                            }else {
                                echo "<option value=$baris[kd_bagian]>$baris[nama_bagian]</option>";
                            }
                        }
                     ?>
                    </select>
		</div>

		<div>
			<label for="name">Deskripsi</label>
			<textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" name="deskripsi"></textarea>
		</div>
		<div><input type="hidden" value="<?php echo $_SESSION['kd_biro'];?>" name="kd_biro"></div>
		<div><input type="submit" class="btn btn-success" value="KIRIM KELUHAN" ></div>
	</form>
</div>
<script type="text/javascript">
	var el = document.getElementById('myCoolForm');

el.addEventListener('submit', function(){
    return confirm('Apakah Anda Yakin Akan mengirim keluhan ke <?php echo $baris[nama_bagian] ?>?');
}, false);
</script>