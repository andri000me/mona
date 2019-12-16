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
	}

	public function index()
	{
		
		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		$data = array(
			'title' 		=> 'Dashboard', 
			'dataUser'	 	=> $biodata,
		);
		
		$this->load->view('admin/dashboard', $data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */