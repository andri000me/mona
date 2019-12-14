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
		$this->load->library('form_validation');
		if(empty($this->session->userdata('authenticated'))){
	      redirect('auth','refresh');
	    }
	}

	public function index()
	{
		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		if (empty($biodata)) {
			echo "Lengkapi Biodata";
		} else {
			$data = array(
				'title' 	=> 'Calon Pegawai', 
				'dataUser' 	=> $biodata,
				'jadwal' 	=> $this->JadwalModel->fetch_all_jadwal_aktif_by_level($sekarang, $level), 
				// 'soal' 		=> $this->SoalModel->fetch_soal_by_pekerjaan($level, $idUser), 
				'dikerjakan'=> $this->SoalModel->get_jum_dikerjakan($idUser), 
			);
		}		
		echo json_encode($data);
	}

	public function isi_jawaban()
	{
		$idUser 	= $this->session->userdata('id_user');
		$sekarang = date('Y-m-d H:i:s');
		$idSoal 	= $this->input->post('id_soal');
		$jawaban 	= $this->input->post('jawaban');

		$sudah 		= $this->SoalModel->cek_jawaban_calon_by_id_soal($idUser, $idSoal);
		$kunci 		= $this->SoalModel->get_jawaban_soal($idSoal);
		
		if ($kunci->kunci == $jawaban) {
			$status=1;
		} else {
			$status=0;
		}		

		if ($sudah) {
			echo $this->SoalModel->update_jawaban_soal($idUser, $idSoal, $jawaban, $status, $sekarang);
		} else {
			$isi = array(
				'id_user' 	=> $idUser, 
				'id_soal' 	=> $idSoal, 
				'jawaban' 	=> $jawaban, 
				'status' 	=> $status, 
			);
			echo $this->SoalModel->isi_jawaban_soal($isi);
		}
	}


}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */