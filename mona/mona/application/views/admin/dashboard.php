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
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                <div class="count"><?php //echo $jumTopup->jum; ?>2095</div>
                                <h3>TopUp</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                <div class="count"><?php //echo $jumTopup->jum; ?>2095</div>
                                <h3>TopUp</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                <div class="count"><?php //echo $jumTopup->jum; ?>2095</div>
                                <h3>TopUp</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                <div class="count"><?php //echo $jumTopup->jum; ?>2095</div>
                                <h3>TopUp</h3>
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="detailTopup()">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                                <div class="count"><?php //echo $jumTopup->jum; ?>2095</div>
                                <h3>TopUp</h3>
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