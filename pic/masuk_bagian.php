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
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body>
  <div class="container-fluid main-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="widget-container fluid-height">
              <div class="heading">
                <i class="icon-edit"></i>Selamat Datang, anda sebagai PIC pilih bagian teknisi
              </div>
              <div class="widget-content">
                <div class="wizard" id="wizard">
                  <div class="padded">
                    <ul class="wizard-nav">
                    <!--   <li>
                      
                          
                        <a data-toggle="tab" href="#tab1">1</a>
                      
                      </li> -->
                      <li>
                        <a data-toggle="tab" href="#tab2">2 </a>
                      </li>
                      
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

                        $q      = mysqli_query($koneksi,"SELECT kd_pic FROM bagian");
                        $r      = mysqli_fetch_array($q);
                        $s      = $r['kd_pic'];

                        

                  

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
                            <div class="btn btn-default-outline btn-previous">
                                <i class="icon-long-arrow-left"></i>Back
                            </div>
                            <input class="btn btn-primary-outline btn-next" type="submit">
                            
                        </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="tab2">
                        <h2>
                          Pilih Bagian Teknisi
                        </h2>
                        <form role="form" method="POST" action="proses_input_bagian.php">
                          <div class="form-group">

                          <?php 
                              $check      = mysqli_query($koneksi, "SELECT * FROM bagian");
                              while ($checkbox = mysqli_fetch_array($check)) {
                          ?>
                          <?php
                          //validasi pertama masuk
                            if ($_GET['proses'] == 'masuk') {
                               
                               //validasi apabila kd_pic telah terpilih
                              if ($checkbox['kd_pic'] == NULL) {
                            ?>
                            <label class="checkbox text-left"><input type="checkbox" name="kd_bagian[]" value="<?php echo $checkbox['kd_bagian']; ?>">
                            <span><?php echo $checkbox['nama_bagian']; ?></span>
                            </label>
                          <?php
                              } 

                            //validasi kembali dari menu detail
                            } else {
                              if ($checkbox['kd_pic'] == NULL) { 
                                # code...
                          ?>
                              <label class="checkbox text-left"><input type="checkbox" name="kd_bagian[]" value="<?php echo $checkbox['kd_bagian']; ?>">
                            <span><?php echo $checkbox['nama_bagian']; ?></span>
                            </label>
                              <?php 
                              } else {
                                ?>
                                <label class="checkbox text-left"><input type="checkbox" name="kd_bagian[]" value="<?php echo $checkbox['kd_bagian']; ?>" checked>
                                <span><?php echo $checkbox['nama_bagian']; ?></span>
                                </label>
                                <?php 
                              }
                            }
                            }
                          ?>
                          </div>
                        <div class="pager">
                            <!-- <a href="masuk_pic.php?proses='kembali'" class="btn btn-default">Kembali</a> -->
                            <input class="btn btn-primary btn-next" type="submit" name="submit" value="Selanjutnya">
                        </div>  
                        </form>
                      </div>
                      <div class="tab-pane" id="tab3">
                        <form role="form">
                         
                        <div class="pager">
                            <div class="btn btn-default-outline btn-previous">
                                <i class="icon-long-arrow-left"></i>Back
                            </div>
                            <div class="btn btn-primary-outline btn-next">
                                Continue
                            </div>
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
        
  </body>
  </html>