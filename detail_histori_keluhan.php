<?php 
if (isset($_GET['id'])) {
  $kd_pengaduan = $_GET['id'];
} else {
  die ("Error, Tidak ada kode terpilih");
}
 $detail_histori = mysqli_query($koneksi,"SELECT *, SUBSTRING(judul_permasalahan,1,100) AS judul_permasalahan
                                            FROM pengaduan 
                                            JOIN `user` USING (`username`) 
                                            JOIN biro USING(`kd_biro`)  
                                            JOIN `bagian` ON(`pengaduan`.`kd_bagian` =`bagian`.`kd_bagian`)
                                            WHERE `kd_pengaduan`='$kd_pengaduan' 
                                            ORDER BY `tanggal_pengajuan` DESC");
 $hasil_detail_histori = mysqli_fetch_array($detail_histori);
   // Convert Tanggal
  $originalDate = $hasil_detail_histori['tanggal_pengajuan'];
  $newDate = date("d-M-Y", strtotime($originalDate));

 ?>
 <h1> DETAIL HISTORI PENGADUAN </h1>
 <hr>
<form  action="#" method="post">

          <!--  tanggal kirim-->
         <div class="form-group">
         <label class="title">TANGGAL KIRIM :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-calendar"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $newDate;?>">
            </div>
         </div>

         <!--  Wilayah Biro-->
         <div class="form-group">
         <label class="title">BIRO :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-building"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $hasil_detail_histori['biro']; ?>">
            </div>
         </div>

            <!--  alamat biro -->
        
         <div class="form-group">
            <label for="name">ALAMAT BIRO</label>
            <div class="input-group">
               <span class="input-group-addon"><i class="icon-road"></i></span><textarea  id="" cols="30" rows="3" class="form-control" value="<?php echo $hasil_detail_histori['alamat']; ?>" readonly=""><?php echo $res['alamat']; ?></textarea>
          </div>

         <!-- nama pengirim -->
         <div class="form-group">
         <label class="title">NAMA PENGIRIM :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-user"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $hasil_detail_histori['nama']; ?>">
            </div>
          </div>
         
          <!--  tujuan -->
         <div class="form-group">
          <label class="title">TUJUAN :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-mail-forward"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $hasil_detail_histori['nama_bagian']; ?>">
            </div>
         </div>

         <!--  tujuan -->
         <div class="form-group">
          <label class="title">JUDUL PENGADUAN :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-envelope"></i></span><input class="form-control" type="text" readonly="" value="<?php echo $hasil_detail_histori['judul_permasalahan']; ?>">
            </div>
         </div>

         <!-- deskripsi -->
          <div class="form-group">
            <label for="name">DESKRIPSI :</label>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-file-text"></i></span><textarea  id="" cols="30" rows="10" class="form-control" value="<?php echo $hasil_detail_histori['deskripsi'];?>" readonly=""><?php echo $hasil_detail_histori['deskripsi'];?></textarea>
            </div>
          </div>

      </div>
          <center><a href="user.php?page=histori_keluhan&id=<?php echo $username; ?>"><button type="button" class="btn btn-primary" >Kembali</button>
      </div>
      </form>
    </div>
  </div>