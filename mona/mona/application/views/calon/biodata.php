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

    .labele{
        text-align: right;
    }
</style>

<body class="putih">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h1>Selamat Datang</h1>
                <h1>
                    <?php echo $this->session->userdata('nama_user'); ?>
                </h1>
            </div>
            <hr>
        </div>
    </div>
    <div class="row">
    <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Biodata Kamu <small>Silahkan Lengkapi Biodata Kamu :)  </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!-- <form id="form_biodata" metod="post" action="<?php echo base_url() ?>calon/isi_biodata" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data"> -->
                    <?php echo form_open_multipart('calon/isi_biodata'); ?>
                    <div data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group form-horizontal form-label-left">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Lengkap <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nama_user" id="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jkel">Jenis Kelamin <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="jkel" id="jkel" required>
                            <option value="" selected disabled="">~~Pilih Jenis Kelamin~~</option>
                            <option value="1">Laki - Laki</option>
                            <option value="0">Perempuan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telp">No Telepon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="telp" name="telp" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telp">Pendidikan Terakhir <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control col-md-7 col-xs-12" name="pendidikan" id="pendidikan" required>
                            <option value="" selected disabled="">~~Pilih Pendidikan~~</option>
                            <option value="1">SD</option>
                            <option value="2">SMP</option>
                            <option value="3">SMA / SMK</option>
                            <option value="4">Sarjana ( S1 )</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="alamat" name="alamat" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" name="foto" id="foto" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="suratlamaran" class="control-label col-md-3 col-sm-3 col-xs-12">Surat Lamaran <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" name="suratlamaran" id="suratlamaran" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ijazah" class="control-label col-md-3 col-sm-3 col-xs-12">Ijazah Terakhir <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="file" name="ijazah" id="ijazah" required="required">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-danger" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    <!-- </form> -->
                  </div>
                    <?php echo form_close(); ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php //$this->load->view('footer'); ?>
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

<script>
    $('#form_biodata').submit(function(e){
      // e.preventDefault();
      // var data =$(this).serialize();
      // console.log(data)
    });
</script>
