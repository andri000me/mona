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
                    <div class="col-md-12">
                        <div id="data_karyawan"></div>
                    </div>
                </div>
            </div>
            <!-- MODAL DETAIL KARYAWAN -->
            <div class="modal fade" id="modalDetailKaryawan" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">              
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Dertail User</h4>
                    </div>
                    <div class="modal-body text-center">    
                        <table width="100%" style="text-align: left" >
                            <tr>
                                <td>Username</td>
                                <td><b id="username"></b></td>
                            </tr>
                            <tr>
                                <td width="20%">Nama</td>
                                <td width="50%"><b id="nama"></b></td>
                                <td width="30%" align="center" rowspan="4"><img src="" id="foto" width="50%"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><b id="email"></b></td>
                            </tr>
                            <tr>
                                <td>Jns. Kelamin</td>
                                <td><b id="jkel"></b></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><b id="alamat"></b></td>
                            </tr>
                            <tr>
                                <td>Pendidikan Terakhir</td>
                                <td><b id="alamat"></b></td>
                            </tr>
                            <tr>
                                <td  align="center" colspan="3">
                                    <br>
                                    <a class="btn btn-default">
                                        <div class="surat_lamaran">
                                            <input type="hidden" id="surat_lamaran_val">
                                            <li class="fa fa-file-word-o"></li> Surat Lamaran                                            
                                        </div>
                                    </a>
                                    <a class="btn btn-default">
                                        <div class="file_ijazah">
                                            <input type="hidden" id="file_ijazah_val">
                                            <li class="fa fa-graduation-cap"></li> Ijazah
                                        </div>                                        
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Oke</button>
                    </div>
                  </div>
              </div>
            </div>

            <!-- MODAL DETAIL KARYAWAN -->
            <div class="modal fade" id="modalEditKaryawan" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">              
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Edit User</h4>
                    </div>
                    <div class="modal-body text-center">    
                        <div class="row">
                          <div class="x_content">
                            <form id="form_edit_biodata">
                                <input type="hidden" name="id_biodata" id="id_biodata">
                                <input type="hidden" name="id_user" id="id_user">
                                <div data-parsley-validate class="form-horizontal form-label-left">
                                  <div class="form-group form-horizontal form-label-left">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="text" name="nama_user" id="name" required="required" class="form-control col-md-9 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jkel">Jenis Kelamin <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <select class="form-control col-md-9 col-xs-12" name="jkel" id="jkeldd">
                                        <option value="" selected disabled="">~~Pilih Jenis Kelamin~~</option>
                                        <option value="1">Laki - Laki</option>
                                        <option value="0">Perempuan</option>
                                      </select>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="level">Level <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <select class="form-control col-md-9 col-xs-12" name="level" id="level">
                                        <option value="" selected disabled="">~~Pilih Level~~</option>
                                        <?php
                                            foreach ($level as $val) {
                                            ?>
                                                <option value="<?php echo $val->id_level ?>"><?php echo $val->nama_level ?></option>
                                            <?php
                                            }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="email" id="emailedit" name="email" required="required" class="form-control col-md-9 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telp">No Telepon <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <input type="number" id="telp" name="telp" required="required" class="form-control col-md-9 col-xs-12">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                      <textarea id="alamatedit" name="alamat" required="required" class="form-control col-md-9 col-xs-12"></textarea>
                                    </div>
                                  </div>
                                  <div class="ln_solid"></div>
                                  <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                      <button class="btn btn-danger" type="reset">Reset</button>
                                      <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
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
    $(document).ready(function() {
        $('#modalLoading').modal('show');
    });
    var ke = url+'karyawan/ajax_karyawan/'+<?php echo $jab?>;
    $.ajax({
        url: ke,
        type: 'GET',
        dataType: 'HTML',
    })
    .done(function(e) {
        $('#data_karyawan').html(e)
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        $('#modalLoading').modal('hide');
    });
    

    $('tombol').click(function(event) {
        console.log('klik')
    });
</script>

<script>
    function detail_karyawan(id) {
        $('#modalDetailKaryawan').modal('show');
        $.ajax({
            url: url+'karyawan/ajax_biodata_by_id/'+id,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
            $.each(e, function(index, val) {
                $('#username').html(val.username)
                $('#nama').html(val.nama_user)
                $('#email').html(val.email)
                $('#alamat').html(val.alamat)
                if(val.jkel==0){
                    $('#jkel').html('Perempuan')
                }else{
                    $('#jkel').html('Laki - Laki')
                }
                if(val.foto!=null){
                    $('#foto').attr('src',url+'assets/image/'+val.foto);
                } else{
                    $('#foto').attr('src',url+'assets/image/tanda.png');
                }

                if(val.surat_lamaran!=null){
                    $('#surat_lamaran_val').val(val.surat_lamaran);
                } else{
                    $('#surat_lamaran_val').val('tanda.png');
                }

                if(val.ijazah!=null){
                    $('#file_ijazah_val').val(val.ijazah);
                } else{
                    $('#file_ijazah_val').val('tanda.png');
                }
            });
            console.log(e)
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });   
    }
</script>

<script>
    $('.file_ijazah').click(function(event) {
        window.open(url+'assets/image/'+$('#file_ijazah_val').val());
    });
    $('.surat_lamaran').click(function(event) {
        window.open(url+'assets/image/'+$('#surat_lamaran_val').val());
    });
</script>

<script>
    function edit_karyawan(id) {
        $('#modalEditKaryawan').modal('show');
        $.ajax({
            url: url+'karyawan/ajax_biodata_by_id/'+id,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
            console.log(e)
            $.each(e, function(index, val) {
                $('#id_biodata').val(val.id_biodata);
                $('#id_user').val(val.id_user);
                $('#name').val(val.nama_user);
                $('#jkeldd').val(val.jkel);
                $('#pendidikan').val(val.pendidikan);
                $('#emailedit').val(val.email);
                $('#telp').val(val.telp);
                $('#alamatedit').val(val.alamat);
                $('#alamatedit').val(val.alamat);
                $('#level').val(val.id_level);
            });
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });        
    }

    $('#form_edit_biodata').submit(function(e) {
        e.preventDefault();
        var data =$(this).serialize();
        $.ajax({
            url: url+'karyawan/edit_biodata',
            type: 'POST',
            dataType: 'JSON',
            data: data,
        })
        .done(function(e) {
            location.reload();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $('#modalEditKaryawan').modal('show');
        });
        
    });
</script>

<script>
    function hapus_karyawan(id) {
        if (confirm('Yakin mau menghapus user ???')) {
            $('#modalLoading').modal('show');
            $.ajax({
                url: url+'karyawan/hapus/'+id,
                type: 'GET',
                dataType: 'JSON',
            })
            .done(function(e) {
                alert(e.pesan);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function(e) {
                location.reload();
                $('#modalLoading').modal('hide');
            });
        }        
    }
</script>

<script>
    function phk(id) {
        if (confirm('Yakin mau PHK user ???')) {
            $('#modalLoading').modal('show');
            $.ajax({
                url: url+'hasil/phk/'+id+'/0',
                type: 'GET',
                dataType: 'JSON',
            })
            .done(function(e) {
                alert(e.pesan);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function(e) {
                location.reload();
                $('#modalLoading').modal('hide');
            });
        }        
    }
</script>