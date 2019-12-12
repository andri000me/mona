<div class="modal fade" id="modal-register">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form_register_calon" class="validate">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Form Registrasi Karyawan Baru</h4>
				</div>
				
				<div class="modal-body">	
					<div class="form-group">							
						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-user"></i>
							</div>								
							<input type="text" class="form-control" name="username_reg" placeholder="Username" data-validate="required,username_reg" autocomplete="off" />
						</div>							
					</div>
					
					<div class="form-group">							
						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-key"></i>
							</div>								
							<input type="password" class="form-control" name="password_reg" data-validate="required,password_reg" placeholder="Password" autocomplete="off" />
						</div>						
					</div>

					<div class="form-group">							
						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-tools"></i>
							</div>								
							<select class="form-control" name="level" id="level" data-validate="required,level" >
								<option value="" selected disabled>~~ Pilih Posisi Pekerjaan ~~</option>
								<option value="4">Calon Dokter</option>
								<option value="5">Calon Pemijat</option>
								<option value="6">Calon Apoteker</option>
							</select>
						</div>						
					</div>	
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Simpan</button>
				</div>
			</form>	
		</div>
	</div>
</div>