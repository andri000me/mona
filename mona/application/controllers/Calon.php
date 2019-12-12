<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}

	public function index()
	{
		echo "calon";
	}

}

/* End of file Calon.php */
/* Location: ./application/controllers/Calon.php */