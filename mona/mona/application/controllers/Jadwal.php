<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
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
	    if($this->session->userdata('level')!=1){
	    ?>
	    <script>
	    	alert('Anda Bukan Admin');
	    </script>
	    <?php
	      redirect('auth','refresh');
	    }
	}

	public function index()
	{
		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		$data = array(
			'title' 		=> 'Jadwal', 
			'dataUser'	 	=> $biodata,
		);

		$this->load->view('admin/jadwal/jadwal', $data);
	}

	public function ajax_jadwal()
	{
		$data = array(
			'jadwal'	 	=> $this->JadwalModel->fetch_all_jadwal(), 
		);

		$this->load->view('admin/jadwal/ajax_jadwal', $data);
	}

	public function add_jadwal()
	{
		$jdwlA 		= $this->input->post('date_awal');
		$jdwlB 		= $this->input->post('date_akhir');
		$idLevel 	= $this->input->post('level');
		$new_awal = date('Y-m-d H:i:s', strtotime($jdwlA));
		$new_akhir = date('Y-m-d H:i:s', strtotime($jdwlB));
		
		$carijadwal = $this->JadwalModel->fetch_all_jadwal_by_level($idLevel);
		$data = array(
			'tgl_mulai' 	=> $new_awal,
			'tgl_selesai' 	=> $new_akhir,
			'id_level' 		=> $idLevel,
		);

		if (empty($carijadwal)) {
			// $data['hasil']= "bikin jadwal baru";
			if($this->JadwalModel->add_jadwal($data)){
				$data['result']	= true;
				$data['pesan']	= 'Berhasil Bikin Jadwal Baru :)';
			}else{
				$data['result']	= false;
				$data['pesan']	= 'Gagal Bikin Jadwal Baru :)';
			}
		} else {
			// $data['hasil']= "edit jadwal";

			$edit = array(
				'tgl_mulai' 	=> $new_awal,
				'tgl_selesai' 	=> $new_akhir,
			);
			if($this->JadwalModel->edit_jadwal($edit, $idLevel)){
				$data['result']	= true;
				$data['pesan']	= 'Jadwal Telah Diperbarui';
			}
		}
		echo json_encode($data);
	}

	public function fetch_jadwal_by_level($id_jadwal)
	{
		$data = array('jadwal' => $this->JadwalModel->fetch_jadwal_by_id($id_jadwal));
		echo json_encode($data);
	}

	public function hapus_jadwal($id_jadwal)
	{
		$data = array();
		if ($this->JadwalModel->delete_jadwal($id_jadwal)) {
			$data['pesan'] = 'Berhasil Dihapus';
		} else {
			$data['pesan'] = 'Gagal Dihapus';
		}

		echo json_encode($data);
		
	}

}

/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */