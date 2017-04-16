  <style type="text/css">

  #tengah{
    text-align: center;
  }

  </style>
    <div class="page-title">
  </div>
  <br>
  <!-- modal biro-->
  <?php 
  include "config/koneksi.php";
   ?>



    <!-- DataTables Example -->
  <div class="row">
    <div class="col-lg-12">
      <div class="widget-container fluid-height clearfix">
        <div class="heading">
          <i class="icon-table"></i>DAFTAR PENGADUAN USER 
          <div></div>
        </div>
        <div class="widget-content padded clearfix">
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th width="25px" id="tengah"> NO</th>  
            <th width="100px">
              TANGGAL KIRIM
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              BIRO
            </th>  
            <th class="hidden-xs" id="tengah">
              JUDUL PENGADUAN
            </th>         
            <th class="hidden-xs" id="tengah" width="100px">
              DIKIRIM KE BAGIAN
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              DETAIL PENGADUAN
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              DETAIL TANGGAPAN
            </th>
          </thead>
          <tbody>
          <?php 
          $histori = mysqli_query($koneksi,"SELECT *, SUBSTRING(judul_permasalahan,1,100) AS judul_permasalahan
                                            FROM pengaduan 
                                            JOIN `user` USING (`username`) 
                                            JOIN biro USING(`kd_biro`)  
                                            JOIN `bagian` ON(`pengaduan`.`kd_bagian` =`bagian`.`kd_bagian`)
                                            WHERE user.username='$username' 
                                            ORDER BY `tanggal_pengajuan` DESC");
          
          $i = 0 ;
          if ($query != null) {
          while ($hasil_histori = mysqli_fetch_array($histori)) {
          $i++;
          // Deklarasi
          $tujuan = $hasil_histori['nama_bagian'];
          $judul = $hasil_histori['judul_permasalahan'];
          $deskripsi = $hasil_histori['deskripsi'];
          $kd_pengaduan = $hasil_histori['kd_pengaduan'];


            // Convert Tanggal
            $originalDate = $hasil_histori['tanggal_pengajuan'];
            $newDate = date("d-M-Y", strtotime($originalDate));

           ?>
            <tr>
              <td><?php echo $i;?></td>
              <td>
                <?php echo $newDate;?>
              </td>
              <td class="hidden-xs">
                <?php echo $hasil_histori['biro']; ?>
              </td>
              <td>
                <?php echo $hasil_histori['judul_permasalahan']; ?>
              </td id="tengah">           
              <td class="hidden-xs">
                <?php echo $hasil_histori['nama_bagian'];?>
              </td>
              <td>
              <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="user.php?page=detail_histori_keluhan&id=<?php echo $kd_pengaduan; ?>"><i class="icon-external-link"></i></a>                 
              </div>
              <td>
              <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="user.php?page=detail_histori_tanggapan&id=<?php echo $kd_pengaduan; ?>"><i class="icon-external-link"></i></a>   
              </div>
              </td>
            </tr>
            <?php     
              }
            } else {
                echo "Data Kosong";
              }
             ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

   <center><a href="user.php"><button class="btn btn-primary">Kembali</button></a></center>
  <!-- end DataTables Example -->