<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('header'); ?>
    <style>
        .putih{
            background: #ffffff;
        }
    </style>
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
            <div class="right_col putih" role="main">
                <div class="row">
                    <div class="row">                        
                        <div class="col-md-12">
                            <strong><h2>Data <?php echo $title ?></h2></strong>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-md-12">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Posisi</th>
                                    <th>#</th>  
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                        foreach ($deleted as $val) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $val->username; ?></td>
                                                    <td><?php echo $val->nama_user; ?></td>
                                                    <td><?php echo $val->alamat; ?></td>
                                                    <td><?php echo $val->nama_level; ?></td>
                                                    <td>
                                                        <button class="btn btn-info" title="Hidupkan kembali" onclick="hidupkan(<?php echo $val->idUser; ?>)">
                                                            <li class="fa fa-recycle"></li>
                                                        </button>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                            $no++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>           

        <!-- /page content -->
        <?php $this->load->view('footer.php')?>
        </div>
    </div>
</body>
<script>
    function hidupkan(id){
        $('#modalLoading').modal('show');
        $.ajax({
            url: url+'karyawan/kembalikan_hapus/'+id,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function() {
            $('#modalLoading').modal('hide');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(e) {
            alert(e.pesan);
            location.reload();
        });
        
    }
</script>
</html>
