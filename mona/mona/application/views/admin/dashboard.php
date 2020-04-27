<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('header'); ?>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!-- sidebar menu -->
                    <?php $this->load->view('sidebar') ?>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <?php $this->load->view('nav')?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="row top_tiles">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-group"></i></div>
                                <div class="count"><?php echo $total; ?></div>
                                <h3>Karyawan</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-pencil"></i></div>
                                <div class="count"><?php echo $pendaftar; ?></div>
                                <h3>Total Pendaftar</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-check"></i></div>
                                <div class="count"><?php echo $pendaftarKomplit; ?></div>
                                <h3>Pendaftar (Biodata)</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-meh-o"></i></div>
                                <div class="count"><?php echo $pendaftarBelum; ?></div>
                                <h3>Pendaftar (-Biodata)</h3>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            <!-- /page content -->
             <?php $this->load->view('footer.php')?>
        </div>
    </div>
<!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
</body>
</html>