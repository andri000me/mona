<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
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
			'title' 		=> 'Karyawan', 
			'dataUser'	 	=> $biodata,
		);

		$this->load->view('admin/karyawan/karyawan', $data);
	}

	public function jab($jab)
	{
		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		if ($jab==10) {
			$tit ="Management";
		}elseif ($jab==1) {
			$tit ="Karyawan";
		}else{
			$tit ="Calon Karyawan";
		}

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		$data = array(
			'title' 		=> $tit, 
			'dataUser'	 	=> $biodata,
			'jab'	 		=> $jab,
			'level'	 		=> $this->UserModel->fetch_level_non_management(),
		);
		// echo json_encode($data);

		$this->load->view('admin/karyawan/karyawan', $data);
	}

	public function edit_biodata()
	{
		$id_user = $this->input->post('id_user');
		$id_biodata = $this->input->post('id_biodata');
		$nama_user = $this->input->post('nama_user');
		$jkel = $this->input->post('jkel');
		$pendidikan = $this->input->post('pendidikan');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$telp = $this->input->post('telp');
		$level = $this->input->post('level');
		$edit = array(
			'nama_user' => $nama_user, 
			'jkel' => $jkel, 
			'pendidikan' => $pendidikan, 
			'email' => $email, 
			'telp' => $telp, 
			'alamat' => $alamat, 
		);
		if($this->CalonModel->edit_biodata($edit, $id_biodata) && $this->CalonModel->edit_level($level, $id_user)){
			echo json_encode("oke");
		}else{
			echo json_encode("ora");
		}
	}

	public function hapus($id_user)
	{
		$data = array();
		if ($this->UserModel->delete_user($id_user)) {
			$data['pesan'] = 'Berhasil Dihapus';
		} else {
			$data['pesan'] = 'Gagal Dihapus';
		}

		echo json_encode($data);		
	}	

	public function kembalikan_hapus($id_user)
	{
		$data = array();
		if ($this->UserModel->hidupkan_user($id_user)) {
			$data['pesan'] = 'Berhasil Mengaktifkan';
		} else {
			$data['pesan'] = 'Gagal Mengaktifkan';
		}

		echo json_encode($data);		
	}

	public function deleted()
	{
		$idUser = $this->session->userdata('id_user');
		$level 	= $this->session->userdata('level');
		$sekarang = date('Y-m-d H:i:s');

		$biodata = $this->CalonModel->get_biodata_by_id($idUser);
		$data = array(
			'title' 		=> 'Deleted', 
			'dataUser'	 	=> $biodata,
			'deleted'		=> $this->UserModel->fetch_deleted()
		);
		// echo json_encode($data);
		$this->load->view('admin/karyawan/deleted', $data);
	}

	public function ajax_karyawan($status)
	{
		$data = array(
			'karyawan' => $this->CalonModel->get_karyawan($status)
		);
		$this->load->view('admin/karyawan/ajax_karyawan', $data);
	}

	public function ajax_biodata_by_id($id)
	{
		$data = array(
			'karyawan' => $this->CalonModel->get_biodata_by_id($id)
		);
		echo json_encode($data);
	}



}

/* End of file Karyawan.php */
/* Location: ./application/controllers/Karyawan.php */