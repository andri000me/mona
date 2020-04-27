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
                    <div class="col-md-12">
                        <strong><h2>Data <?php echo $title ?></h2></strong>
                    </div>
                </div>

                <div class="row">           
                    <div class="col-md-4">
                        <select class="form-control" name="kategori" id="kategori" required>
                            <option value="" selected disabled>~~ Pilih Kategori ~~</option>
                            <?php
                                foreach ($kategori as $kateg) {
                                    ?>
                                        <option value="<?php echo $kateg->id_kategori ?>"><?php echo $kateg->nama_kategori ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                    </div>           
                    <div class="col-md-4">
                        <select class="form-control" name="level" id="level" required>
                            <option value="" selected disabled>~~ Pilih Level ~~</option>
                            <?php
                                foreach ($levelCalon as $level) {
                                    ?>
                                        <option value="<?php echo $level->id_level ?>"><?php echo $level->nama_level ?></option>
                                    <?php
                                }
                            ?>
                        </select>  
                    </div>         
                    <div class="col-md-4">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="<?php echo site_url('soal/tambah')?>">
                                <li class="fa fa-plus"></li> Tambah Soal
                            </a>
                        </div>  
                    </div>  
                </div>
                <div class="row">
                    <div class="row">                        
                        <div class="col-md-12">
                            <br>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="data_soal"></div>
                    </div>
                </div>
            </div>

            <!-- MODAL DETAIL SOAL -->
            <div class="modal fade" id="modalDetailSoal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">              
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h4 class="modal-title">Detail Soal</h4>
                    </div>
                    <div class="modal-body">    
                        <div class="row">
                            <div class="col-md-12">
                                <label>Pertanyaan</label>  
                                <p id="pertanyaan"></p>  
                                <hr>
                                <label>Jawaban A</label>  
                                <p id="jawaban1"></p>     
                                <hr>
                                <label>Jawaban B</label>  
                                <p id="jawaban2"></p>   
                                <hr>  
                                <label>Jawaban C</label>  
                                <p id="jawaban3"></p>    
                                <hr>  
                                <label>Jawaban D</label>  
                                <p id="jawaban4"></p>     
                                <hr>
                                <label>Kunci Jawaban</label>  
                                <p id="kunci"></p>                              
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" data-dismiss="modal">Oke</button>
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
		load_data();
	});
	function tambahKategori() {
		$('#modalTambahKategori').modal('show');
	}

	function load_data() {
		$('#modalLoading').modal('show');
		$.ajax({
			url: url+'soal/ajax_soal',
			type: 'GET',
			dataType: 'html',
		})
		.done(function(e) {
			$('#data_soal').html(e);
		})
		.always(function() {
			$('#modalLoading').modal('hide');
		});
	}
</script>

<script>
    $('#kategori').change(function(e) {
        $('#modalLoading').modal('show');
        if ($(this).val()==100) {
            var data ={
                'id_kategori' : $(this).val(),
                'id_level' : null
            } 
            $('#level').css('display','none');
        }else{
            var data ={
                'id_kategori' : $(this).val(),
                'id_level' : $('#level').val()
            } 
            $('#level').css('display','block');
        }
               
        $.ajax({
            url: url+'soal/ajax_soal',
            type: 'POST',
            dataType: 'HTML',
            data: data,
        })
        .done(function(e) {
            $('#data_soal').html(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $('#modalLoading').modal('hide');
        });
        console.log(data);
    });


    $('#level').change(function(e) {
        $('#modalLoading').modal('show');
        var data ={
            'id_level' : $(this).val(),
            'id_kategori' : $('#kategori').val()
        }
        $.ajax({
            url: url+'soal/ajax_soal',
            type: 'POST',
            dataType: 'HTML',
            data: data,
        })
        .done(function(e) {
            $('#data_soal').html(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            $('#modalLoading').modal('hide');
        });
        console.log(data);
    });
</script>

<script>
    function detail_soal(id) {
        $('#modalLoading').modal('show');
        $.ajax({
            url: url+'soal/fetch_soal_by_id/'+id,
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(e) {
            console.log(e);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function(e) {
            $('#modalLoading').modal('hide');
            setTimeout(function () {
                $.each(e, function(index, val) {
                    $('#pertanyaan').html(val.pertanyaan)
                    $('#jawaban1').html(val.jawab_a)
                    $('#jawaban2').html(val.jawab_b)
                    $('#jawaban3').html(val.jawab_c)
                    $('#jawaban4').html(val.jawab_d)
                    ganti(val.kunci);
                });
                $('#modalDetailSoal').modal('show');                
            },500);
        });    
    }

    function ganti(kunci) {
        var k='Tidak ada kunci';
        if (kunci==1) {
            k='A';
        }else if(kunci==2){
            k='B';
        }else if(kunci==3){
            k='C';            
        }else if(kunci==4){
            k='D';            
        }
        $('#kunci').html(k);
        console.log(k)
    }

</script>

<script>
    function hapus_soal(id) {
        if (confirm('Yakin ingin menghapus??')) {
            $('#modalLoading').modal('show');
            $.ajax({
                url: url+'soal/delete_soal/'+id,
                type: 'GET',
                dataType: 'JSON',
            })
            .done(function() {
                load_data();
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                $('#modalLoading').modal('hide');
            });
            
        }
    }
</script>