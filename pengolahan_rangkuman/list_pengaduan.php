  <style type="text/css">
  #tengah{
    text-align: center;
  }
  </style>
    <div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
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
          <i class="icon-table"></i>DAFTAR PENGADUAN iNewsTV BIRO
        </div>
        <br>
              
      <?php
        include "config/koneksi.php";
         ?>
        <form method="post">
        <div class="row">
          <div class="col-md-1" align="center">
          <p>FILTER :</p>
          </div>
            <div class="col-md-3">
              <div class="widget-container fluid-height">
                <select class="form-control" name="tampil_menurut">
                <option value="">-TAMPILKAN MENURUT-</option>
                <option value="kd_pic">PIC</option>
                <option value="kd_bagian">BAGIAN KERJA</option>
                   ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="widget-container fluid-height">
                <select class="form-control" name="filter_waktu">
                    <option value="">-PILIH FILTER WAKTU-</option>
                    <option value="bulanan">BULANAN</option>
                    <option value="tahunan">TAHUNAN</option>
                </select>
              </div>
            </div>
            <div class="col-md-2">
                 <input type="submit" name="submit" class="form-control btn btn-success" value="TAMPILKAN">
            </div>
          </div>
          </form>
        <br>
        <div class="widget-content padded clearfix">
        
        <!-- menampilkan list jumlah pengaduan -->
        <?php 
        if (isset($_POST['submit'])) {

          $tampil_menurut = isset($_POST['tampil_menurut']) ? $_POST['tampil_menurut']:"";
          $filter_waktu = isset($_POST['filter_waktu']) ? $_POST['filter_waktu']:"";
          if (($tampil_menurut!="")||($filter_waktu!="")) {
          if ($tampil_menurut == "kd_pic") {
            $judul_filter = "PIC";
          } elseif($tampil_menurut == "kd_bagian") {
            $judul_filter = "BAGIAN";
          } else {
            $tampil_menurut = "tanggal";
            $judul_filter = "BULANAN";
          }
          if ($filter_waktu == "bulanan") {
              $bulanan_filter = "`tanggal`";
              $koma = ",";
              $kriteria_tanggal = "7";
          } elseif ($filter_waktu == "tahunan"){
              $bulanan_filter = "`tanggal`";
              $koma = ",";
              $kriteria_tanggal = "4";
          } else {
              $bulanan_filter = "";
              $kriteria_tanggal = "7";
              $koma = "";
          }
          $select_bagian = mysqli_query($koneksi,"SELECT `kd_pic`,`nama_pic`,`kd_bagian`,`nama_bagian`,`judul_permasalahan`, SUBSTR(`tanggal_pengajuan`,1,$kriteria_tanggal) AS tanggal, COUNT(`kd_bagian`) AS jml_pengaduan FROM `pengaduan` JOIN `bagian` USING(`kd_bagian`) JOIN `pic` USING(`kd_pic`) GROUP BY `$tampil_menurut`$koma$bulanan_filter ;");
          echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>DI FILTER BERDASARKAN ".$judul_filter."</b></p>";
          echo "<table>";
          $tanggal_tampil = "";
          $tahun_tampil = "";
          while ($hasil_bagian = mysqli_fetch_array($select_bagian)) {
                $tahun_tampil = substr($hasil_bagian['tanggal'],0,4);
              if ($filter_waktu== "bulanan") {
                // ambil nama bulan
                switch (substr($hasil_bagian['tanggal'],6,2)) {
                  case '01': $tanggal_tampil = "Januari"; break;
                  case '02': $tanggal_tampil = "Februari"; break;
                  case '03': $tanggal_tampil = "Maret"; break;
                  case '04': $tanggal_tampil = "April"; break;
                  case '05': $tanggal_tampil = "Mei"; break;
                  case '06': $tanggal_tampil = "Juni"; break;
                  case '07': $tanggal_tampil = "Juli"; break;
                  case '08': $tanggal_tampil = "Agustus"; break;
                  case '09': $tanggal_tampil = "September"; break;
                  case '10': $tanggal_tampil = "Oktober"; break;
                  case '11': $tanggal_tampil = "November"; break;
                  case '12': $tanggal_tampil = "Desember"; break;
                  default:   $tanggal_tampil = "";
                    break;
                }
              } 
              $hdr_tgl = substr($hasil_bagian['tanggal'],5,2);
              if ($tampil_menurut=="kd_bagian") {
                echo "<tr><td width='20px'></td><td>$tanggal_tampil</td><td>$tahun_tampil</td><td width='30px'></td><td><u><a href='media.php?page=list_rangkuman&kd_bagian=$hasil_bagian[kd_bagian]&bulan=$hdr_tgl&kriteria=$kriteria_tanggal'>".$hasil_bagian['nama_bagian']." (".$hasil_bagian['jml_pengaduan'].")</a></u></td></tr>";
              } else {
                echo "<tr><td width='20px'></td><td>$tanggal_tampil</td><td>$tahun_tampil</td><td width='30px'></td><td><u><a href='media.php?page=list_rangkuman&kd_pic=$hasil_bagian[kd_pic]&bulan=$hdr_tgl&kriteria=$kriteria_tanggal'>".$hasil_bagian['nama_pic']." (".$hasil_bagian['jml_pengaduan'].")</a></u></td></tr>";
              }
            }
          echo "</table>";
        } else {
          $select_bagian = mysqli_query($koneksi,"SELECT COUNT(`kd_pengaduan`) AS jml_pegadauan FROM `pengaduan`");
          $hasil_bagian = mysqli_fetch_array($select_bagian);
            echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;<b>JUMLAH SEMUA PENGADUAN ADALAH  ".$hasil_bagian['jml_pegadauan']."</b></p>";
          }
        }
          echo "<br>";
          $kd_bagian_url = isset($_GET['kd_bagian']) ? $_GET['kd_bagian']:"";
          $kd_pic_url = isset($_GET['kd_pic']) ? $_GET['kd_pic']:"";
          $bln_filter = isset($_GET['bulan']) ? $_GET['bulan']:"";
          $kriteria_tgl = isset($_GET['kriteria']) ? $_GET['kriteria']:"";

          if (($kd_bagian_url != null)|| ($kd_pic_url!=null)) {
            if ($kd_bagian_url==null) {
                $query = mysqli_query($koneksi,"SELECT *,`nama_bagian`,`kd_pic`,`nama_pic`, SUBSTRING(judul_permasalahan,1,100) AS judul_permasalahan,
                                          DATEDIFF(`tanggal_solved`, `tanggal_pengajuan`) AS time_solved, SUBSTR(`tanggal_pengajuan`,1,$kriteria_tgl) AS tanggal FROM pengaduan 
                                          JOIN `bagian` USING(`kd_bagian`) JOIN pic USING(`kd_pic`) JOIN `user` ON(`pengaduan`.`username`=`user`.`username`) 
                                          JOIN `biro` ON(`user`.`kd_biro` = `biro`.`kd_biro`) WHERE `kd_pic`='$kd_pic_url' AND `tanggal_pengajuan` LIKE '%-$bln_filter-%' ORDER BY `tanggal_pengajuan` DESC;");

            } else {
                $query = mysqli_query($koneksi,"SELECT *, SUBSTRING(judul_permasalahan,1,100) AS judul_permasalahan,
                                          DATEDIFF(`tanggal_solved`, `tanggal_pengajuan`) AS time_solved, SUBSTR(`tanggal_pengajuan`,1,$kriteria_tgl) AS tanggal
                                          FROM pengaduan 
                                          JOIN `user` USING (`username`) 
                                          JOIN biro USING(`kd_biro`) WHERE `pengaduan`.`kd_bagian`='$kd_bagian_url'  AND `tanggal_pengajuan` LIKE '%-$bln_filter-%'
                                          ORDER BY `tanggal_pengajuan` DESC;");
            }
            
          ?>
            <!-- tampilkan tabel -->
          <table class="table table-bordered table-striped" id="dataTable1">
          <thead>
            <th width="25px"> NO</th>  
            <th width="150px">
              TANGGAL KIRIM
            </th>
            <th class="hidden-xs" id="tengah">
              JUDUL PENGADUAN
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              BIRO
            </th>
            <th class="hidden-xs" id="tengah" width="100px">
              TANGGAL SOLVE
            </th>
            <th class="hidden-xs" id="tengah" width="80px">
              TIME SOLVE
            </th>
            <th class="sorting" width="150px" id="tengah">
              AKSI
            </th>
          </thead>
          <tbody>

          <?php 
          
          
          $i = 0 ;
          if ($query != null) {
          while ($result = mysqli_fetch_array($query)) {
          $i++;

            // Convert Tanggal
            $originalDate = $result['tanggal_pengajuan'];
            $newDate = date("d-M-Y", strtotime($originalDate));

            $originalDate1 = $result['tanggal_solved'];
            $newDate1 = date("d-M-Y", strtotime($originalDate1));
            $time_solved = $result['time_solved'];
            if($originalDate1 == '0000-00-00' || $originalDate1 == NULL){
              $newDate1 = "Belum Solved";
            } 

           ?>
            <tr>
              <td><?php echo $i;?></td>
              <td>
                <?php echo $newDate;?>
              </td>
              <td>
                <?php echo $result['judul_permasalahan']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $result['biro']; ?>
              </td>
              <td class="hidden-xs">
                <?php echo $newDate1;?>
              </td>
              <td class="hidden-xs">
                <?php echo $time_solved . "  Hari"; ?>
              </td>
              <td>
                <div class="action-buttons" id="tengah">
                  <a class="table-actions" href="media.php?page=detail_rangkuman&id=<?php echo $result['kd_pengaduan']; ?>"><i class="icon-external-link"> Detail Pengaduan</i></a> 
                </div>
              </td>
            </tr>
            <?php
                }     
              }
            }
             ?>
          </tbody>
          </table>
        </div>
        <!-- akhir tabel -->
         <br>
      </div>
    </div>
  </div>
  <!-- end DataTables Example -->