<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<style>
    .putih{
        background: #f9f9f9;
        margin: 20px;
    }
</style>

<body class="putih">
    <?php $this->load->view('nav'); ?>
    <div class="row">
        <div class="col-mod-12">
            <div class="text-center">
                <h1>Selamat Datang</h1>
                <h1>
                    <?php echo $this->session->userdata('nama_user'); ?>
                </h1>
                Jadwal test untuk semua kategori soal test  
                <h2>
                  <u>
                    <?php 
                      if(!empty($jadwal)) {
                        echo $jadwalLevel->tgl_mulai?> sampai <?php echo $jadwalLevel->tgl_selesai;
                      }
                    ?>                      
                  </u>
                </h2>
            </div>
            <hr>
        </div>
    </div>
    <div class="row" style="">
        <div class="row top_tiles">
            <?php
                if(!empty($jadwal)){
                    foreach ($kategori as $kateg) { 
                        $jum[$kateg->id_kategori] = 0;
                        foreach ($dikerjakan as $kerja) {
                            if($kateg->id_kategori == $kerja->id_kategori){
                                $jum[$kateg->id_kategori] = $kerja->terjawab;
                            }
                        }
                        ?>  
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" 
                                onclick="mengerjakan(<?php echo $kateg->id_kategori; ?>)">
                                <div class="tile-stats" title="Klik Untuk Mulai Mengerjakan <?php echo $kateg->nama_kategori; ?>">
                                    <p>Test Kategori</p>
                                    <div class="count"><?php echo $kateg->nama_kategori; ?></div>
                                    <h3><?php echo $jum[$kateg->id_kategori]    ; echo "/"; echo $kateg->jumSoal; ?> Soal</h3>
                                </div>
                            </div>
                        <?php                         
                    }
                    /*MENAMPILKAN SOAL PSIKOTES*/
                    foreach ($dikerjakan as $kerja) {
                        if(100 == $kerja->id_kategori){
                            $jum = $kerja->terjawab;
                        }
                    }
                    ?>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" 
                            onclick="mengerjakan(<?php echo $psiko->id_kategori; ?>)">
                            <div class="tile-stats" title="Klik Untuk Mulai Mengerjakan <?php echo $kateg->nama_kategori; ?>">
                                <p>Test Kategori</p>
                                <div class="count"><?php echo $psiko->nama_kategori; ?></div>
                                <h3><?php echo $jum; echo "/"; echo $psiko->jumSoal; ?> Soal</h3>
                            </div>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="tile-stats">
                                <div class="text-center">
                                    <h1>Maaf Jadwal Test Belum Ada</h1>
                                    <h2>Jadwal Dilaksanakan pada...</h2>
                                    <h2>
                                        <u>
                                            <?php
                                            if (!empty($jadwalLevel)) {
                                                echo $jadwalLevel->tgl_mulai?> sampai <?php echo $jadwalLevel->tgl_selesai;
                                             } 
                                            ?>
                                        </u>
                                    </h2>
                                </div>
                            </div>
                        </div>

                    <?php
                }
            ?>
        </div>
    </div> 
</body>
</html>

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>build/js/custom.min.js"></script>

<!-- Chart JS -->
<script src="<?php echo base_url() ?>assets/Chart.js/dist/Chart.min.js"></script>
<!-- jQuery Smart Wizard -->
<script src="<?php echo base_url() ?>assets/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<script>
    function mengerjakan(id_kategori) {
        window.location = url+'calon/mengerjakan/'+id_kategori;
    }
</script>