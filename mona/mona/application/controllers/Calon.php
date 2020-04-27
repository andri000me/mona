<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('CalonModel');
		$this->load->model('SoalModel');
		$this->load->model('JadwalModel');
		$this->load->helper(array('form','url'));
		$this->load->helper('form');
		$this->load->library('form_validation');
		if(empty($this->session->userdata('authenticated'))){
	      redirect('auth','refresh');
	    }
	}

	public function index()
	{
		if(empty($this->session->userdata('authenticated'))){
	      redirect('auth','refresh');
	    }
		$idUser = $this->session->userdata('id_user');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		$level 	= $biodata->id_level;
		if (empty($biodata->id_biodata)) {
			$data = array(
				'title' 	=> 'Calon Pegawai', 
				'piye'		=> 'data blm lengkap',
				'biodata'	=> $biodata,
			);			
			// echo json_encode($data);
			$this->load->view('calon/biodata', $data);
		} else {
			$data = array(
				'title' 		=> 'Calon Pegawai', 
				'dataUser'	 	=> $biodata,
				'sekarang'	 	=> $sekarang,
				'jadwal' 		=> $this->JadwalModel->fetch_all_jadwal_aktif_by_level($sekarang, $level), 
				'jadwalLevel'	=> $this->JadwalModel->fetch_all_jadwal_by_level($level), 
				'kategori'		=> $this->SoalModel->fetch_kategori_soal_by_level($level),
				'psiko'			=> $this->SoalModel->fetch_kategori_soal_by_level(null),
				'dikerjakan'	=> $this->SoalModel->get_jum_dikerjakan($idUser, $level), 
				'terjawab'		=> $this->SoalModel->get_terjawab($idUser), 
			);
			// echo json_encode($data);
			$this->load->view('calon/dashboard', $data);
		}		
	}

	public function isi_jawaban()
	{
		if(empty($this->session->userdata('authenticated'))){
	      redirect('auth','refresh');
	    }

		$idUser 	= $this->session->userdata('id_user');
		$sekarang = date('Y-m-d H:i:s');
		$idSoal 	= $this->input->post('idSoal');
		$jawaban 	= $this->input->post('terpilih');

		$sudah 		= $this->SoalModel->cek_jawaban_calon_by_id_soal($idUser, $idSoal);
		$soal_kateg	= $this->SoalModel->get_jawaban_soal($idSoal);
		
		if ($soal_kateg->id_kategori!=100) {
			if ($soal_kateg->kunci == $jawaban) {
				$status=1;
			} else {
				$status=0;
			}
			$skorpsiko=0;
		} else {
			$status=0;
			switch ($jawaban) {
				case 1:
					$skorpsiko=1;
					break;
				case 2:
					$skorpsiko=2;
					break;
				case 3:
					$skorpsiko=3;
					break;
				case 4:
					$skorpsiko=4;
					break;
				
				default:
					$skorpsiko=0;
					break;
			}
		}
					
		
		if ($sudah) {
			$res =  $this->SoalModel->update_jawaban_soal($idUser, $idSoal, $jawaban, $status, $skorpsiko, $sekarang);
		} else {
			$isi = array(
				'id_user' 	=> $idUser, 
				'id_soal' 	=> $idSoal, 
				'jawaban' 	=> $jawaban, 
				'status' 	=> $status, 
				'skorpsiko'	=> $skorpsiko, 
			);
			$res =  $this->SoalModel->isi_jawaban_soal($isi);
		}
		
		echo json_encode($res);
	}

	public function mengerjakan($id_kategori)
	{
		if(empty($this->session->userdata('authenticated'))){
	      redirect('auth','refresh');
	    }
		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

	    if(empty($this->JadwalModel->fetch_all_jadwal_aktif_by_level($sekarang, $level))){
	    	redirect('calon','refresh');
	    }

		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		$dikerjakan = $this->SoalModel->kategori_soal_calon($idUser, $level);

		foreach ($dikerjakan as $val) {
			if ($val->id_kategori == $id_kategori) {
				$test = $val->nama_kategori;
			}
		}

		if (empty($test)) {
			redirect('calon');
		}
		$data = array(
			'title' 	=> 'Mengerjakan', 
			'dataUser' 	=> $biodata,
			'kategori' 	=> strtoupper($test),
			'soal' 		=> $this->SoalModel->fetch_soal_by_pekerjaan($level, $id_kategori),
			'dikerjakan'=> $dikerjakan, 
			'terjawab'	=> $this->SoalModel->get_terjawab($idUser), 
			'waktu'		=> '30', 
		);
		// echo json_encode($data);
		$this->load->view('calon/mengerjakan', $data);
	}

	public function isi_biodata()
	{	
		$config['upload_path'] 		= './assets/image/';
		$config['allowed_types'] 	= 'gif|jpg|jpeg|png';
		$config['max_size']  		= '1024';
		$config['file_name']		= substr(md5($this->session->userdata('username')), 0,10).substr(rand(), 0,10);
		
		$cek = $this->load->library('upload', $config);
		$error = array();
		if ($_FILES['foto']['name']!=null) {
			if ( ! $this->upload->do_upload('foto')){
				$data = 'Foto => '.$this->upload->display_errors();
				// $error['foto'] = $data;
				?>
					<script>
						alert('gagal simpan, cek dokumen foto anda');
					</script>
				<?php
			}
			else{
				$foto = $this->upload->data('file_name');
			}
		}

		if ($_FILES['suratlamaran']['name']!=null) {
			if ( ! $this->upload->do_upload('suratlamaran')){
				$data = 'Surat Lamaran => '.$this->upload->display_errors();
				// $error['suratlamaran'] = $data;
				?>
					<script>
						alert('gagal simpan, cek dokumen surat lamaran anda');
					</script>
				<?php
			}
			else{
				$suratlamaran = $this->upload->data('file_name');
			}
		} 

		if ($_FILES['ijazah']['name']!=null) {
			if ( ! $this->upload->do_upload('ijazah')){
				$data = 'ijazah => '.$this->upload->display_errors();
				// $error['ijazah'] = $data;
				?>
					<script>
						alert('gagal simpan, cek dokumen ijazah anda');
					</script>
				<?php
			}
			else{
				$ijazah = $this->upload->data('file_name');
			}
		} 
		if (empty($data)) {
			$isi = array(
				'id_user' 		=> $this->session->userdata('id_user'),
				'nama_user'		=> $this->input->post('nama_user'),
				'jkel'			=> $this->input->post('jkel'),
				'email'			=> $this->input->post('email'),
				'alamat'		=> $this->input->post('alamat'),
				'pendidikan'	=> $this->input->post('pendidikan'),
				'foto'			=> $foto,
				'surat_lamaran'	=> $suratlamaran,
				'ijazah'		=> $ijazah,
			);
			if($this->CalonModel->isi_biodata($isi)){
				redirect('auth','refresh');
			}
		}else{
			redirect('calon','refresh');
		}

		
	}


}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */