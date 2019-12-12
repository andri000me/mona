<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header') ?>
	<style>
		.judul{
			font-size: x-large;
    		color: #303641;
		}
	</style>
</head>
<body class="page-body  page-fade">
<div class="page-container">
	<div class="row">
		<div class="text-center">
			<img src="<?php echo base_url() ?>assets/images/mona/beautysky.png">
		</div>
	</div>

	<table width="100%">
		<tr>
			<td colspan="3" align="center">
				<b class="judul">-- SILAHKAN LOGIN --</b>
			</td>
		</tr>
		<tr>
			<td width="30%"></td>
			<td align="center">
				<div class="login-form">		
					<div class="login-content">							
						<form id="form_login" class="validate">						
							<div class="form-group">							
								<div class="input-group">
									<div class="input-group-addon">
										<i class="entypo-user"></i>
									</div>								
									<input type="text" class="form-control" name="username" placeholder="Username" data-validate="required,username" />
								</div>							
							</div>
							
							<div class="form-group">							
								<div class="input-group">
									<div class="input-group-addon">
										<i class="entypo-key"></i>
									</div>								
									<input type="password" class="form-control" name="password" data-validate="required,password" placeholder="Password" />
								</div>						
							</div>
							
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block btn-login">
									<i class="entypo-login"></i>
									Login In
								</button>
							</div>							
						</form>			
					</div>		
				</div>
			</td>
			<td width="30%"></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<a onclick="daftar()" class="entypo-pencil" title="Klik untuk daftar karyawan baru">
					Daftar Karyawan Baru
				</a>
			</td>
		</tr>
	</table>
</div>
	<?php //$this->load->view('calon/modal') ?>
	<?php $this->load->view('footer') ?>

</body>
</html>

<script>
	function daftar() {
		$('#modal-register').modal('show');
		console.log('daftar')
	}

	$('#form_login').submit(function(e) {
    	e.preventDefault();
    	console.log(e)
		/*$.ajax({
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
		});	*/		
	});
</script>
<script>
	/*$('#form_register_calon').submit(function(e) {
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
	});*/
</script>