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
                    <button class="btn btn-primary" onclick="tambahKategori()"><li class="fa fa-plus"></li> Kategori Test</button>
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
                        <div id="data_kategori"></div>
                    </div>
                </div>
            </div>

            <!-- MODAL TAMBAH KATEGORI -->
            <div class="modal fade" id="modalTambahKategori" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">              
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Set Kategori TEST <i class="fa fa-file-code-o"></i></h4>
                    </div>
                    <form id="form_kategori">
                        <div class="modal-body text-center">    
                            <div class="row">    
                                <div class='col-sm-12'>
                                    <div class="form-group">
                                        <div class='input-group text'>
                                            <input type='text' class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori" required />
                                            <span class="input-group-addon">
                                                    <span class="fa fa-flag-o"></span>
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

            <!-- MODAL EDIT KATEGORI -->
            <div class="modal fade" id="modalEditKategori" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">              
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Edit Kategori TEST <i class="fa fa-file-code-o"></i></h4>
                    </div>
                    <form id="form_kategori_edit">
                        <div class="modal-body text-center">    
                            <div class="row">    
                                <div class='col-sm-12'>
                                    <div class="form-group">
                                        <div class='input-group text'>
                                            <input type="hidden" name="id_kategori" id="id_kategori">
                                            <input type='text' class="form-control" name="nama_kategori_edit" id="nama_kategori_edit" placeholder="Nama Kategori" required />
                                            <span class="input-group-addon">
                                                    <span class="fa fa-flag-o"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>           
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Edit</button>
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
	$(document).ready(function() {
		load_data();
	});
	function tambahKategori() {
		$('#modalTambahKategori').modal('show');
	}

	function load_data() {
		$('#modalLoading').modal('show');
		$.ajax({
			url: url+'kategori/fetch_all_kategori',
			type: 'GET',
			dataType: 'html',
		})
		.done(function(e) {
			$('#data_kategori').html(e);
		})
		.always(function() {
			$('#modalLoading').modal('hide');
		});
	}
</script>

<script>
	$('#form_kategori').submit(function(e) {
		$('#modalLoading').modal('show');
		e.preventDefault();
		$.ajax({
			url: url+'kategori/add_kategori',
			type: 'POST',
			dataType: 'JSON',
			data: $(this).serialize(),
		})
		.done(function(e) {
			console.log(e);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function(e) {
			alert(e.pesan);
			location.reload();
		});

	});
</script>

<script>
    function edit_kategori(id) {
        $('#modalLoading').modal('show');
        $.ajax({
            url: url+'kategori/fetch_kategori_by_id/'+id,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function() {
            $('#modalLoading').modal('hide');
            $('#modalEditKategori').modal('show');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(e) {
            $.each(e, function(index, val) {
                $('#nama_kategori_edit').val(val.nama_kategori);
                $('#id_kategori').val(val.id_kategori);
            });
        });        
    }

    $('#form_kategori_edit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: url+'kategori/edit_kategori',
            type: 'POST',
            dataType: 'JSON',
            data: $(this).serialize(),
        })
        .done(function() {
            console.log("success");
        })
        .fail(function(e) {
            console.log(e);
        })
        .always(function() {
            load_data();
            $('#modalEditKategori').modal('hide');

        });
        
    });

    function delete_kategori(id) {
        if(confirm('Yakin Mau Menghapus Kategori ini ?')){        
            $('#modalLoading').modal('show');
            $.ajax({
                url: url+'kategori/hapus_kategori/'+id,
                type: 'GET',
                dataType: 'JSON',
            })
            .done(function() {
                load_data(); 
            })
            .fail(function() {
                console.log("error");
            })
            .always(function(e) {           
                $('#modalLoading').modal('hide');   
            });        
    
        }
    }
</script>