
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $title; ?></title>

<!-- Bootstrap -->
<link href="<?php echo base_url() ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Animate.css -->
<link href="<?php echo base_url() ?>assets/animate.css/animate.min.css" rel="stylesheet">

<!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url() ?>assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo base_url() ?>assets/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<!-- Datatables -->
<link href="<?php echo base_url() ?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?php echo base_url() ?>build/css/custom.min.css" rel="stylesheet">

<!-- Switchery -->
<!-- <link href="<?php echo base_url() ?>assets/switchery/dist/switchery.min.css" rel="stylesheet"> -->
<style>
      .right_col{
          background: #ffffff !important;
      }
  </style>

<!-- Modal Loading -->
<div class="modal fade" id="modalLoading" aria-hidden="true">
  <div class="text-center">
    <img src="<?php echo base_url()?>assets/image/loading.gif">
  </div>
</div>

<!-- MODAL ERROR -->
<div class="modal" id="modalError" aria-hidden="true">
  <div class="text-center">
    <img src="<?php echo base_url()?>assets/image/loading.gif">
  </div>
</div>

<!-- MODAL PERINGATAN -->
<div class="modal fade" id="modalWarning" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">              
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">PERINGATAN <i class="fa fa-exclamation-triangle"></i></h4>
        </div>
        <div class="modal-body text-center">    
        	<strong>Apakah Yakin ingin <h3 id="pesanWarning" class="red"></h3></strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Ora</button>
          <button type="submit" class="btn btn-primary" id="btn-warning-ya">Oke</button>
        </div>
      </div>
  </div>
</div>

<!-- Modal Loading -->
<div class="modal fade" id="modalLoading" aria-hidden="true">
  <div class="text-center">
    <img src="<?php echo base_url()?>assets/image/loading.gif">
  </div>
</div>


<script>
  var url = '<?php echo site_url() ?>';
</script>