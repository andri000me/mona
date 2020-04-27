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
                <form method="post" action="<?php echo site_url('soal/'); echo $link; ?>">           
                  <!-- <form id="form_soal"> -->
                    <input type="hidden" name="id_soal" id="id_soal">      
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
                    </div>

                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <label>Pertanyaan</label>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="soal" id="soal" required>  </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <div class="col-md-6">
                              <div class="col-md-2">
                                  <label>Jawaban 1</label>
                              </div>
                              <div class="col-md-12">
                                  <textarea class="form-control" name="jawab1" id="jawab1" required>  </textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="col-md-2">
                                  <label>Jawaban 2</label>
                              </div>
                              <div class="col-md-12">
                                  <textarea class="form-control" name="jawab2" id="jawab2" required>  </textarea>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <div class="col-md-6">
                              <div class="col-md-2">
                                  <label>Jawaban 3</label>
                              </div>
                              <div class="col-md-12">
                                  <textarea class="form-control" name="jawab3" id="jawab3" required>  </textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="col-md-2">
                                  <label>Jawaban 4</label>
                              </div>
                              <div class="col-md-12">
                                  <textarea class="form-control" name="jawab4" id="jawab4" required>  </textarea>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <hr>
                      <div class="col-md-9">
                        <div class="col-md-6">
                          <div class="col-md-6">
                            <label><div id="labele">Kunci Jawaban</div></label>
                          </div>
                          <div class="col-md-12">
                            <select class="form-control" name="kunci" id="kunci" required >
                              
                            </select>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right" style="margin-top: 20px">
                        <li class="fa fa-save"> Simpan Soal</li>
                      </button>
                    </div>

                </form>
            </div>
             <!-- /page content -->
             <?php $this->load->view('footer.php')?>
             <script src="<?php echo base_url()?>assets/tinymce/tinymce.min.js"></script>
        </div>
    </div>

</body>
</html>
<script type='text/javascript'> 
  // tinymce.init({ selector:'textarea', menubar:'true', theme: 'modern'});
  tinymce.init({
    selector: 'textarea',
    skin: 'lightgray',
    menubar: false,
    plugins: [
        "eqneditor advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor",
        "code fullscreen youtube autoresize tiny_mce_wiris"
      ],
    toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent table | fullscreen" ,
    toolbar2: "| fontsizeselect | styleselect | forecolor backcolor | code",
    image_advtab: true,
    fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
    relative_urls: false,
    remove_script_host: false,
  });
</script>

<script>
  $(function() {
    var k  ='<option value="" selected disabled>~~Pilih Kunci~~</option>';
        k+='<option value="1">Jawaban A</option>';
        k+='<option value="2">Jawaban B</option>';
        k+='<option value="3">Jawaban C</option>';
        k+='<option value="4">Jawaban D</option>';
    $('#kunci').html(k);
  });

  /*$('#form_soal').submit(function(e) {
      e.preventDefault();
      $('#sub').click(function(event) {
        console.log($(e).serialize())
      });
      e.preventDefault();
      console.log($(this).serialize())
      var tit = '<?php echo $title; ?>';
      if (tit == 'Tambah Soal') {
        var ke = 'add_soal';
      }else{
        var ke = 'update_soal';
      }
      $.ajax({
        url: url+'soal/'+ke,
        type: 'POST',
        dataType: 'JSON',
        data: $(this).serialize(),
      })
      .done(function(e) {
        console.log(e);
      })
      .fail(function(e) {
        console.log("error");
      })
      .always(function(e) {
        console.log("complete");
      });
      
  });*/
</script>

<script>
  $(document).ready(function() {
    var tit = '<?php echo $title; ?>';
    var id = '<?php echo $id; ?>';
    if (tit=="Edit Soal") {
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
        $.each(e, function(index, val) {
          if (val.id_kategori==100) {
            kunci_psikotes();
          }else{
            kunci_akademik();
          }
          if(val.id_level!=null){
            $('#level').val(val.id_level);
          }

          $('#id_soal').val(val.id_soal);          
          $('#kategori').val(val.id_kategori);
          $('textarea#soal').val(val.pertanyaan);
          $('#jawab1').val(val.jawab_a);
          $('#jawab2').val(val.jawab_b);
          $('#jawab3').val(val.jawab_c);
          $('#jawab4').val(val.jawab_d);
          $('#kunci').val(val.kunci);
          
        });
      });
      
    }
  });  
</script>

<script>
  $('#kategori').change(function(event) {
    var kategori = $(this).val();
    if (kategori<100) {
      kunci_akademik();
    }else{
      kunci_psikotes();
    }
  });
</script>

<script>
  function kunci_psikotes() {
    $('#labele').html('Bobot Soal');
    var k  ='<option value="" selected disabled>~~Pilih Bobot Psikotes~~</option>';
        k+='<option value="1">1</option>';
        k+='<option value="2">2</option>';
        k+='<option value="3">3</option>';
        k+='<option value="4">4</option>';
    $('#kunci').html(k);
    $("#level").css("display", "none");
    $("#level").prop('required',false);
  }

  function kunci_akademik() {
    $('#labele').html('Kunci Jawaban');
    var k  ='<option value="" selected disabled>~~Pilih Kunci~~</option>';
        k+='<option value="1">Jawaban A</option>';
        k+='<option value="2">Jawaban B</option>';
        k+='<option value="3">Jawaban C</option>';
        k+='<option value="4">Jawaban D</option>';
    $('#kunci').html(k);
    $("#level").css("display", "block");
    $("#level").prop('required',true);
  }
</script>