<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('header'); ?>
</head>
<style>
    .putih{
        background: #ffffff;
        margin: 20px;
    }

    .terjawab{
      background: aqua;
    }

    body{
      color: #000000 !important;
    }
</style>

<body class="putih">
    <div class="row">
        <div class="col-mod-12">
            <div class="text-center">
              <h1>Selamat Datang</h1>
              <h1>
                  <?php echo $this->session->userdata('nama_user'); ?>
              </h1>
              <h3>SEMANGAT MENGERJAKAN <?php echo $kategori;?></h3>
            </div>
            <hr>
        </div>
    </div>
    <div class="row" style=""></div>

    <div id="wizard" class="form_wizard wizard_horizontal">
      <ul class="wizard_steps">
        <!-- SETTING NOMOR SOAL -->
        <?php
          foreach ($soal as $no => $s) {
            $centang=false;
            foreach ($terjawab as $ter) {
              if($ter->id_soal == $s->id_soal){
                $centang=true;
              }
            }
            ?>
              <li>
                <a href="#step-<?php echo $no+1; ?>">
                  <span class="step_no"><?php echo $no+1; ?></span>
                  <span class="step_descr">
                    <?php  
                    if ($centang) {
                      ?> <i class="fa fa-check"></i> <?php
                    }                    
                    ?>
                  </span>
                </a>
              </li>
            <?php
          }
        ?>
      </ul>

        <!-- SETTING HALAMAN SOAL -->
        <?php
          foreach ($soal as $no => $s) {
              $j1= false;
              $j2= false;
              $j3= false;
              $j4= false;
            foreach ($terjawab as $ter) {
              if($ter->id_soal == $s->id_soal){
                if ($ter->jawaban==1) {
                  $j1=true;
                }
                if ($ter->jawaban==2) {
                  $j2=true;
                }
                if ($ter->jawaban==3) {
                  $j3=true;
                }
                if ($ter->jawaban==4) {
                  $j4=true;
                }
              }
            }
            ?>
              <div id="step-<?php echo $no+1; ?>">
                <form class="form-horizontal form-label-left">
                  <div class="form-group">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="col-md-7 col-sm-7 col-xs-7">
                        <label>Pertanyaan.</label>
                        <h4>
                          <?php echo html_entity_decode($s->pertanyaan); ?>
                        </h4>                        
                      </div>
                      <div class="col-md-5 col-sm-5 col-xs-5">
                        <label>Jawaban.</label>
                        <?php
                          if ($j1) {?>
                            <div class="tile-stats" id="jawab_1_<?php echo $s->id_soal ?>" style="background: aqua">
                              A. <?php echo $s->jawab_a; ?>
                            </div>
                          <?php } else {?>
                            <div class="tile-stats" id="jawab_1_<?php echo $s->id_soal ?>">
                              A. <?php echo $s->jawab_a; ?>
                            </div>
                          <?php }
                          
                          if ($j2) {?>
                            <div class="tile-stats" id="jawab_2_<?php echo $s->id_soal ?>" style="background: aqua">
                              B. <?php echo $s->jawab_b; ?>
                            </div>
                          <?php } else {?>
                            <div class="tile-stats" id="jawab_2_<?php echo $s->id_soal ?>">
                              B. <?php echo $s->jawab_b; ?>
                            </div>
                          <?php }
                          
                          if ($j3) {?>
                            <div class="tile-stats" id="jawab_3_<?php echo $s->id_soal ?>" style="background: aqua">
                              C. <?php echo $s->jawab_c; ?>
                            </div>
                          <?php } else {?>
                            <div class="tile-stats" id="jawab_3_<?php echo $s->id_soal ?>">
                              C. <?php echo $s->jawab_c; ?>
                            </div>
                          <?php }

                          if ($j4) {?>
                            <div class="tile-stats" id="jawab_4_<?php echo $s->id_soal ?>" style="background: aqua">
                              D. <?php echo $s->jawab_d; ?>
                            </div>
                          <?php } else {?>
                            <div class="tile-stats" id="jawab_4_<?php echo $s->id_soal ?>">
                              D. <?php echo $s->jawab_d; ?>
                            </div>
                          <?php }                          
                        ?>

                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php
          }
        ?>

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
        window.location = url+'auth/logout';
    }
</script>

<script>
  $(document).ready(function() {
   $(".tile-stats").click(function(e){
    $('#modalLoading').modal('show');
    var id = e.target.id.split('_');
    var terpilih  = id[1];
    var idSoal    = id[2];   
    matikan_warna(idSoal);
    isi_jawaban(terpilih, idSoal);
    $('#jawab_'+terpilih+'_'+idSoal).css({"background-color":"#62ff00"}); 
   });
  });

  function matikan_warna(idSoal) { 
     $('#jawab_1_'+idSoal).css({"background-color":"#ffffff"});
     $('#jawab_2_'+idSoal).css({"background-color":"#ffffff"});
     $('#jawab_3_'+idSoal).css({"background-color":"#ffffff"});
     $('#jawab_4_'+idSoal).css({"background-color":"#ffffff"});
  }

  function isi_jawaban(terpilih, idSoal) {
    var param = {
      'terpilih':terpilih,
      'idSoal':idSoal
    }
    $.ajax({
      url: url+'/calon/isi_jawaban',
      type: 'POST',
      dataType: 'JSON',
      data: param,
    })
    .done(function(e) {
      // console.log(e);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      $('#modalLoading').modal('hide');      
    });  
  }
</script>