<?php 
if (isset($_GET['id'])) {
  $kd_pengaduan = $_GET['id'];
} else {
  die ("Error, Tidak ada kode terpilih");
}
 $detail_histori_tanggapan = mysqli_query($koneksi,"SELECT *, SUBSTRING(judul_permasalahan,1,100) AS judul_permasalahan
                                            FROM pengaduan 
                                            JOIN `user` USING (`username`) 
                                            JOIN biro USING(`kd_biro`)  
                                            JOIN `bagian` ON(`pengaduan`.`kd_bagian` =`bagian`.`kd_bagian`)
                                            WHERE `kd_pengaduan`='$kd_pengaduan' 
                                            ORDER BY `tanggal_pengajuan` DESC");
  $hasil_tanggapan = mysqli_fetch_array($detail_histori_tanggapan);
   // Convert Tanggal
  $originalDate = $hasil_tanggapan['tanggal_solved'];
  $newDate = date("d-M-Y", strtotime($originalDate));

 ?>
<form  action="#" method="post">

          <!--  tanggal solved-->
         <div class="form-group">
         <label class="title">TANGGAL DITANGGAPI :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-calendar"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $newDate;?>">
            </div>
         </div>
         
          <!--  Bagian yang menangani -->
         <div class="form-group">
          <label class="title">Dari Bagian :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-mail-forward"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $hasil_tanggapan['nama_bagian']; ?>">
            </div>
         </div>

         <!--  tujuan -->
         <div class="form-group">
          <label class="title">JUDUL PENGADUAN :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $hasil_tanggapan['judul_permasalahan']; ?>">
            </div>
         </div>

         <!-- deskripsi -->
          <div class="form-group">
            <label for="name">DESKRIPSI :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-file-text"></i></span><textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil_tanggapan['tanggapan'];?>" readonly=""><?php echo $hasil_tanggapan['tanggapan'];?></textarea>
            </div>
          </div>

      </div>
          <center><a href="user.php?page=histori_keluhan&id=<?php echo $username; ?>"><button type="button" class="btn btn-primary" >Kembali</button>
      </div>
      </form>
    </div>
  </div>