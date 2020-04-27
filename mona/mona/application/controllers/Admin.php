<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			'title' 			=> 'Dashboard', 
			'dataUser'	 		=> $biodata,
			'total'	 			=> $this->UserModel->cout_karyawan(),
			'pendaftar'			=> $this->UserModel->cout_pendaftar(),
			'pendaftarKomplit'	=> $this->UserModel->cout_pendaftar_komplit(),
			'pendaftarBelum'	=> $this->UserModel->cout_pendaftar_belum_komplit(),
		);
		// echo json_encode($data);
		$this->load->view('admin/dashboard', $data);
	}

	public function getLevel()
	{
		$level = array('level' => $this->UserModel->fetch_kategori_test());
		echo json_encode($level);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */