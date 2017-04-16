<?php 
    session_start();
    include "../config/koneksi.php";

    
 ?>
<title>
      Pilih PIC
    </title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="http://fonts.googleapis.com/css?family=Lato:100,300,400,700" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="../stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
    <link href="../stylesheets/color/yellow.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
    <link href="../stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
    <link href="../stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
    <link href="../stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
    <script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="../javascripts/raphael.min.js" type="text/javascript"></script>
    <script src="../javascripts/selectivizr-min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="../javascripts/fullcalendar.min.js" type="text/javascript"></script>
    <script src="../javascripts/gcal.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="../javascripts/excanvas.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="../javascripts/isotope_extras.js" type="text/javascript"></script>
    <script src="../javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="../javascripts/select2.js" type="text/javascript"></script>
    <script src="../javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="../javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="../javascripts/summernote.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="../javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="../javascripts/typeahead.js" type="text/javascript"></script>
    <script src="../javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="../javascripts/date.js" type="text/javascript"></script>
    <script src="../javascripts/morris.min.js" type="text/javascript"></script>
    <script src="../javascripts/skycons.js" type="text/javascript"></script>
    <script src="../javascripts/fitvids.js" type="text/javascript"></script>
    <script src="../javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../javascripts/main.js" type="text/javascript"></script>
    <script src="../javascripts/respond.js" type="text/javascript"></script>
  </head>
  <body>
  <div class="container-fluid main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height">
              <div class="heading">
                <i class="icon-edit"></i>Selamat Datang
              </div>
              <div class="widget-content">
                <div class="wizard" id="wizard">
                  <div class="padded">
                    <ul class="wizard-nav">
                    <!--   <li>
                      
                          
                        <a data-toggle="tab" href="#tab1">1</a>
                      
                      </li> -->
                      <!-- <li>
                        <a data-toggle="tab" href="#tab2">2 </a>
                      </li> -->
                      
                      <li>
                        <a data-toggle="tab" href="#tab3">3</a>
                      </li>
                    </ul>
                    <div class="progress progress-striped active">
                      <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="0" class="progress-bar" role="progressbar"></div>
                    </div>

                    <!-- tampilan utama masuk pic -->
                    <?php 
                        $username   = $_SESSION['username'];
                        $email      = $_SESSION['email'];
                        $level      = $_SESSION['level'];
                        
                        $query      = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND email='$email'");
                        $result     = mysqli_fetch_array($query);
                        $nama       = $result['nama'];

                  

                     ?>
                    <div class="tab-content">
                      <div class="tab-pane" id="tab1">
                        <h2>
                          Pilih PIC
                        </h2>
                        <form role="form" method="POST" action="proses_input_pic.php">
                          <div class="form-group">
                            <label for="email">Nama</label><input class="form-control" id="name" value="<?php echo "$nama"; ?>" readonly>
                          </div>
                        <div class="pager">
                            <div class="btn btn-default">
                                <i class="icon-long-arrow-left"></i>Back
                            </div>
                            <input class="btn btn-primary" type="submit">
                        </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="tab2">
                        <h2>
                          Pilih Bagian
                        </h2>
                        <form role="form" method="POST" action="proses_input_bagian.php">
                        <div class="pager">
                            <div class="btn btn-default">
                                <i class="icon-long-arrow-left"></i>Back
                            </div>
                            <input class="btn btn-primary" type="submit" name="submit">
                        </div>  
                        </form>
                      </div>
                      <div class="tab-pane" id="tab3">
                        <form role="form">
                        <?php 
                        $query1      = mysqli_query($koneksi,"SELECT * FROM pic WHERE username='$username' ");
                        $result1     = mysqli_fetch_array($query1);
                        $nama_pic    = $result1['nama_pic'];
                        $kd_pic      = $result1['kd_pic']; 

                        $_SESSION['kd_pic'] = $kd_pic;

                       
                                                 
                         ?>
                          <div class="form-group">
                            <label for="nama">PIC Bagian</label><input class="form-control" id="name" value="<?php echo "$nama_pic"; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="nama">Nama</label><input class="form-control" id="name" value="<?php echo "$nama"; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label for="bagian PIC">Email</label><input class="form-control" id="name" value="<?php echo "$email"; ?>" readonly>
                          </div>
                         <div class="form-group">
                            <label for="bagian PIC">Bagian yang Di ambil</label>
                        <?php 
                         $query2      = mysqli_query($koneksi,"SELECT * FROM bagian WHERE kd_pic='$kd_pic' ");
                         while ($result2 = mysqli_fetch_array($query2)) {
                           # code...
                         ?>
                            <input class="form-control" id="name" value="<?php echo $result2['nama_bagian']; ?>" readonly>
                         <?php 
                          }
                          ?>
                          </div>
                          <div class="pager">
                            <!-- <a href="masuk_bagian.php?proses='kembali'" class="btn btn-default">Kembali</a> -->
                            <a href="../pic.php" class="btn btn-primary">Masuk</a>
                        </div>
                        </form>
                        </div>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
  </body>
  </html>