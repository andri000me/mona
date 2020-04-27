<div class="modal fade" id="modal-register">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="form_register_calon">
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
							<input type="text" class="form-control" name="username_reg" placeholder="Username" autocomplete="off" required maxlength="10" />
						</div>							
					</div>
					
					<div class="form-group">							
						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-key"></i>
							</div>								
							<input type="password" class="form-control" name="password_reg" placeholder="Password" autocomplete="off" required />
						</div>						
					</div>

					<div class="form-group">							
						<div class="input-group">
							<div class="input-group-addon">
								<i class="entypo-tools"></i>
							</div>								
							<select class="form-control" name="level" id="level" required >
								<option value="" selected disabled>~~ Pilih Posisi Pekerjaan ~~</option>
								<option value="3">Calon Dokter</option>
								<option value="4">Calon Pemijat</option>
								<option value="5">Calon Apoteker</option>
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