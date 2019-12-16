<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Login</title>

     <?php $this->load->view('header');?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form_login">
              <h1>Login Form</h1>
              <div>
                <input type="text" id="userName" name="username" class="form-control" placeholder="Username" required="required" />
              </div>
              <div>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" />
              </div>
              <div>
                <button type="submit" class="btn btn-success" id="btn-login">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div>
                  <a href="#" onclick="daftar()" class="entypo-pencil" title="Klik untuk daftar karyawan baru">
                  Daftar Karyawan Baru
                </a>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>

  <?php $this->load->view('calon/modal') ?>

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo base_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?php echo base_url() ?>build/js/custom.min.js"></script>

  <script>
    function daftar() {
      $('#modal-register').modal('show');
      console.log('daftar')
    }

    $('#form_login').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url: url+'auth/cek_login',
        type: 'post',
        dataType: 'json',
        data: $(this).serialize(),
      })
      .done(function(e) {
        console.log(e);     
        alert(e.ket);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {
        if(e.result)
          location.reload();  
      });   
    });
  </script>
  <script>
    $('#form_register_calon').submit(function(e) {
      e.preventDefault(); 
      $.ajax({
        url: url+'auth/register',
        type: 'post',
        dataType: 'json',
        data: $(this).serialize(),
      })
      .done(function(e) {
        console.log(e);     
        alert(e.ket);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function(e) {  
        $('#modal-register').modal('hide');         
      });
    });
  </script>
  </body>
</html>