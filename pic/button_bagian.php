<style type="text/css">
  p{
    text-align: justify;
  }
  .biro{
    color: #FF9D45;
    font-weight: bold;
    top: auto;
    font-size: 16px;
    vertical-align: top;
  }
</style>

<?php

if (isset($_GET['username'])) {
  $kd_bagian_user = $_GET['username'];
} else {
  $kd_bagian_user = $_SESSION['kd_pic'];
}


$query_bagian = mysqli_query($koneksi,"SELECT *
                                      FROM `pengaduan` JOIN `bagian` USING(`kd_bagian`) 
                                      JOIN `user` ON(`pengaduan`.`username`=`user`.`username`)
                                      JOIN `pic` USING(`kd_pic`) WHERE `kd_pic` = '$kd_bagian_user'");
$hasil_bagian = mysqli_fetch_array($query_bagian);
$kd_bagian = $hasil_bagian['kd_bagian'];

 ?>
<div class="page-title">
    <img src="images/inews.png" width="120px" height="40px">
  </div>
  <br>
<div class="row">
<div class="col-lg-3">
</div>
<div class="col-lg-6">
  <div class="widget-container scrollable list task-widget">
    <div class="heading">
      <i class="icon-bullhorn"></i>LIST PENGADUAN<i class="icon-refresh pull-right"></i>
    </div>
    <div class="widget-content">
      <ul>
        <ul>
        <?php 
        $q = mysqli_query($koneksi,"SELECT * FROM bagian WHERE kd_pic=$kd_bagian_user");
        while ($r = mysqli_fetch_array($q)) {
        // $kd_bagian1  = $r['kd_bagian'];
         ?>
        <a href="pic.php?page=list_pic&id=<?php echo $r['kd_bagian'] ?>">
        <li>
        </li><li>
        <label>
          
          <button class="btn btn-lg btn-block btn-danger">
            <?php 
            echo $r['nama_bagian'];
             ?>
          </button>
        </label>
        </li>
        <?php 
        }
         ?>
        </a>
      </ul>
        <!-- end Media Post -->
      </ul>
    </div>
  </div>
</div>
</div>
<!-- end pengaduan -->

</div>