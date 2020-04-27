<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
			'title' 		=> 'Kategori', 
			'dataUser'	 	=> $biodata,
		);
		$this->load->view('admin/kategori/kategori', $data);
	}

	public function add_kategori()
	{
		$nama = $this->input->post('nama_kategori');
		$data = array(
			'nama_kategori' => $nama
		);
		
		if ($this->SoalModel->add_kategori($data)) {
			$data['result'] = true;
			$data['pesan'] = "Berhasil Insert Kategori";
		} else {
			$data['result'] = false;
			$data['pesan'] = "Gagal Insert Kategori";
		}

		echo json_encode($data);
		
	}

	public function edit_kategori()
	{
		$id 	= $this->input->post('id_kategori');
		$nama 	= $this->input->post('nama_kategori_edit');
		if ($this->SoalModel->edit_kategori($nama, $id)) {
			$data['result'] = true;
			$data['pesan'] = "Berhasil Edit Kategori";
		} else {
			$data['result'] = false;
			$data['pesan'] = "Gagal Edit Kategori";
		}		

		echo json_encode($data);
	}

	public function hapus_kategori($id)
	{
		$data = array();
		if ($this->SoalModel->delete_ketegori($id)) {
			$data['pesan'] = 'Berhasil Dihapus';
		} else {
			$data['pesan'] = 'Gagal Dihapus';
		}

		echo json_encode($data);
	}

	public function fetch_kategori_by_id($id)
	{
		$data = array(
			'kategori' => $this->SoalModel->fetch_kategori_by_id($id), 
		);
		echo json_encode($data);
		
	}

	public function fetch_all_kategori()
	{
		$data = array(
			'kategori' => $this->SoalModel->fetch_all_kategori(), 
		);
		// echo json_encode($data);
		$this->load->view('admin/kategori/ajax_kategori', $data);
	}


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */