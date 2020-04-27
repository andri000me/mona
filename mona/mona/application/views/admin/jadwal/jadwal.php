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
                    <button class="btn btn-primary" onclick="tambahJadwal()"><li class="fa fa-plus"></li> Jadwalkan Test</button>
                </div>
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
                        <div id="data_jadwal"></div>
                    </div>
                </div>
            </div>

            <!-- MODAL TAMBAH JADWAL -->
            <div class="modal fade" id="modalTambahJadwal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">              
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Set Jadwal TEST <i class="fa fa-crosshairs"></i></h4>
                    </div>
                    <form id="form_jadwal">
                        <div class="modal-body text-center">    
                            <div class="row">                            
                                <div class='col-sm-4'>
                                    <div class="form-group">                           
                                        <select class="form-control" name="level" id="level" required ></select>
                                    </div>
                                </div> 
                                <div class='col-sm-4'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' class="form-control" name="date_awal" id="tgl_awal" placeholder="tanggal awal" required />
                                            <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-sm-4'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker7'>
                                            <input type='text' class="form-control" name="date_akhir" id="tgl_akhir" placeholder="tanggal akhir" required />
                                            <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>           
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                </form>
              </div>
            </div>
             <!-- /page content -->
             <?php $this->load->view('footer.php')?>
        </div>
    </div>

</body>
</html>
<script>

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
<script>
    $(document).ready(function() {
        load_jadwal();
    });

    function load_jadwal() {
        $('#modalLoading').modal('show');
        $.ajax({
            url: url+'admin/getLevel',
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
            var dd =" <option value='' selected disabled>Pilih Level</option>";
            $.each(e.level, function(index, val) {
                dd +="<option value="+val.id_level+">"+val.nama_level+"</option>"
            });
            $('#level').html(dd);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

        $.ajax({
            url: url+'jadwal/ajax_jadwal',
            type: 'GET',
            dataType: 'HTML',
        })
        .done(function(e) {
            $('#data_jadwal').html(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {            
            $('#modalLoading').modal('hide');
        });
        
    }
</script>

<script>
    function tambahJadwal(argument) {
        $('#modalTambahJadwal').modal('show');
    }

    $('#form_jadwal').submit(function(e) {
        $('#modalLoading').modal('show');
        e.preventDefault();
        $.ajax({
            url: url+'jadwal/add_jadwal',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
        })
        .done(function(e) {
            $('#modalTambahJadwal').modal('hide');
            location.reload();
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(e) {
            $('#modalLoading').modal('hide');
            alert(e.pesan)
        });
        
    });
</script>

<script>
    function edit_jadwal(id) {
        $('#modalTambahJadwal').modal('show');
        $('#modalLoading').modal('show');

        $.ajax({
            url: url+'jadwal/fetch_jadwal_by_level/'+id,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
            $.each(e, function(index, val) {
                $('#level').val(val.id_level);
                $('#tgl_awal').val(val.tgl_mulai);
                $('#tgl_akhir').val(val.tgl_selesai);
            });
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(e) {
            $('#modalLoading').modal('hide');
        });
        
    }
</script>

<script>
    function hapus_jadwal(id) {
        if (confirm('Yakin mau menghapus jadwal ?')) {
            $('#modalLoading').modal('show');
            $.ajax({
                url: url+'jadwal/hapus_jadwal/'+id,
                type: 'GET',
                dataType: 'JSON',
            })
            .done(function(e) {
                console.log(e)
                alert(e.pesan)
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                load_jadwal();
                $('#modalLoading').modal('hide');
            });            
        }
    }
</script>