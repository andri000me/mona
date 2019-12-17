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
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		if (empty($biodata)) {
			$data = array(
				'title' 	=> 'Calon Pegawai', 
				'piye'		=> 'data blm lengkap'
			);			
			// echo json_encode($data);
			$this->load->view('calon/biodata', $data);
		} else {
			$data = array(
				'title' 		=> 'Calon Pegawai', 
				'dataUser'	 	=> $biodata,
				'jadwal' 		=> $this->JadwalModel->fetch_all_jadwal_aktif_by_level($sekarang, $level), 
				'jadwalLevel'	=> $this->JadwalModel->fetch_all_jadwal_by_level($level), 
				'kategori'		=> $this->SoalModel->fetch_kategori_soal_by_level($level),
				'dikerjakan'	=> $this->SoalModel->get_jum_dikerjakan($idUser, $level), 
				'terjawab'		=> $this->SoalModel->get_terjawab($idUser), 
			);
			echo json_encode($data);
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
		$kunci 		= $this->SoalModel->get_jawaban_soal($idSoal);
		
		if ($kunci->kunci == $jawaban) {
			$status=1;
		} else {
			$status=0;
		}		

		if ($sudah) {
			$res =  $this->SoalModel->update_jawaban_soal($idUser, $idSoal, $jawaban, $status, $sekarang);
		} else {
			$isi = array(
				'id_user' 	=> $idUser, 
				'id_soal' 	=> $idSoal, 
				'jawaban' 	=> $jawaban, 
				'status' 	=> $status, 
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
		$dikerjakan = $this->SoalModel->get_jum_dikerjakan($idUser, $level);

		foreach ($dikerjakan as $val) {
			if ($val->id_kategori == $id_kategori) {
				$test = $val->nama_kategori;
			}
		}
		$data = array(
			'title' 	=> 'Mengerjakan', 
			'dataUser' 	=> $biodata,
			'kategori' 	=> strtoupper($test),
			'soal' 		=> $this->SoalModel->fetch_soal_by_pekerjaan($level, $id_kategori),
			'dikerjakan'=> $dikerjakan, 
			'terjawab'	=> $this->SoalModel->get_terjawab($idUser), 
		);
		// echo json_encode($data);
		$this->load->view('calon/mengerjakan', $data);
	}

	public function isi_biodata()
	{
     	/*$targetDir = "D:/xampp/htdocs/asih/admin/img/";
		$folder="admin";
		$fileName = basename($_FILES["file"]["name"]);
		$fileSave = $fileName;
		$targetFilePath = $targetDir . $fileSave;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		$allowTypes = array('PNG','JPEG','JPG','jpg','png','jpeg','gif');*/
		$foto = $_FILES['foto'];

		$config['upload_path'] = 'assets';
		$config['allowed_types'] = 'image/png|gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo "success";
		}

		print_r($foto);

		
		if ($foto==''){}else{
			
		}
		/*
		$name       = $_FILES['file']['name'];  
		$temp_name  = $_FILES['file']['tmp_name'];  
		if(isset($name)){
			if(!empty($name)){      
				$location = '../uploads/';      
				if(move_uploaded_file($temp_name, $location.$name)){
				    echo 'File uploaded successfully';
				}
			}       
		} else {
			echo 'You should select a file to upload !!';
		}
		*/
	}


}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */