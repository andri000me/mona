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
                    <div class="col-md-12">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Calon</th>
                                <th style="text-align: center;">Minat</th>
                                <th style="text-align: center;">B. Akademik (Skor)</th>
                                <th style="text-align: center;">B. PSIKOLOGI (Skor)</th>
                                <th style="text-align: center;">B. Pendidikan</th>
                                <th style="text-align: center;">Tot Skor</th>
                                <th style="text-align: center;">?</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    if(!empty($perolehanPsiko)){
                                        foreach ($dataCalon as $valC) {
                                            foreach ($hasilAkhir as $valD) {
                                                if($valC->id_user == $valD['id_user']){?>
                                                    <tr>
                                                        <td style="text-align: center;"><?php echo $no; ?></td>
                                                        <td style="text-align: center;"><?php echo $valC->nama_user; ?></td>
                                                        <td style="text-align: center;"><?php echo $valC->nama_level; ?></td>
                                                        <td style="text-align: center;"><?php echo $valD['bAkademik']; echo " ("; echo $valD['sAkademik'];  echo ")"; ?></td>
                                                        <td style="text-align: center;"><?php echo $valD['bNonAkademik']; echo " ("; echo $valD['sNonAkademik']; echo ")"; ?></td>
                                                        <td style="text-align: center;"><?php echo $valD['bPendidikan']; ?></td>
                                                        <td style="text-align: center;"><?php echo $valD['totalNilai']; ?></td>
                                                        <td style="text-align: center;">
                                                            <button class="btn btn-info" title="terima karyawan" onclick="terima(<?php echo $valC->id_user; ?>)">
                                                                <li class="fa fa-check"></li>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $no++;
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             <!-- /page content -->
             <?php $this->load->view('footer.php')?>
        </div>
    </div>

</body>
</html>

<script>
    function terima(id) {
        $('#modalLoading').modal('show');
        $.ajax({
            url: 'hasil/terima_karyawan/'+id+'/1',
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(e) {
            $('#modalLoading').modal('hide');
            location.reload();
        });
        
    }
</script>