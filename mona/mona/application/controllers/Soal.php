<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

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

		$idUser 	= $this->session->userdata('id_user');
		$level 		= $this->session->userdata('level');
		$sekarang 	= date('Y-m-d H:i:s');

		$biodata 	= $this->CalonModel->get_biodata_by_id($idUser);
		$levelCalon	= $this->UserModel->fetch_kategori_test();
		$kategori 	= $this->SoalModel->fetch_all_kategori();

		$data = array(
			'title' 		=> 'Soal',
			'dataUser' 		=> $biodata,
			'levelCalon' 	=> $levelCalon,
			'kategori' 		=> $kategori,
		);

		echo json_encode($data);
		// $this->load->view('admin/soal/soal', $data);
	}

	public function ajax_soal()
	{
		$id_kategori 	= $this->input->post('id_kategori');
		$id_level 		= $this->input->post('id_level');

		$soal = $this->SoalModel->fetch_soal_by_admin($id_level, $id_kategori);
		$data = array('soal' => $soal);

		$this->load->view('admin/soal/ajax_soal', $data);
	}

	public function tambah()
	{
		$idUser 	= $this->session->userdata('id_user');
		$level 		= $this->session->userdata('level');
		$sekarang 	= date('Y-m-d H:i:s');

		$biodata 	= $this->CalonModel->get_biodata_by_id($idUser);
		$levelCalon	= $this->UserModel->fetch_kategori_test();
		$kategori 	= $this->SoalModel->fetch_all_kategori();

		$data = array(
			'title' 		=> 'Tambah Soal',
			'dataUser' 		=> $biodata,
			'levelCalon' 	=> $levelCalon,
			'kategori' 		=> $kategori,
			'link' 			=> 'add_soal',
		);

		$this->load->view('admin/soal/form_soal', $data);
	}

	public function edit($id)
	{
		$idUser 	= $this->session->userdata('id_user');
		$level 		= $this->session->userdata('level');
		$sekarang 	= date('Y-m-d H:i:s');

		$biodata 	= $this->CalonModel->get_biodata_by_id($idUser);
		$levelCalon	= $this->UserModel->fetch_kategori_test();
		$kategori 	= $this->SoalModel->fetch_all_kategori();

		$data = array(
			'title' 		=> 'Edit Soal',
			'dataUser' 		=> $biodata,
			'levelCalon' 	=> $levelCalon,
			'kategori' 		=> $kategori,
			'link' 			=> 'update_soal',
			'id' 			=> $id,
		);

		$this->load->view('admin/soal/form_soal', $data);
	}


	public function add_soal()
	{
		$level		=	$this->input->post('level');
		$kategori	=	$this->input->post('kategori');
		$soal		=	$this->input->post('soal');
		$jawab1		=	$this->input->post('jawab1');
		$jawab2		=	$this->input->post('jawab2');
		$jawab3		=	$this->input->post('jawab3');
		$jawab4		=	$this->input->post('jawab4');
		$kunci		=	$this->input->post('kunci');

		if (empty($soal) && empty($jawab1) && empty($jawab2) && empty($jawab3) && empty($jawab4)) {
			$data = array(
				'result' 	=> false,
				'pesan'		=> 'Periksa Komponen soal / jawaban !!!' 
			);
			?>
			    <script>
			    	alert('Periksa Komponen soal / jawaban !!!');
			    </script>
		    <?php
		}else{
			$isi = array(
				'id_level' 		=> $level, 
				'id_kategori' 	=> $kategori, 
				'pertanyaan' 	=> $soal, 
				'jawab_a' 	=> $jawab1, 
				'jawab_b' 	=> $jawab2, 
				'jawab_c' 	=> $jawab3, 
				'jawab_d' 	=> $jawab4, 
				'kunci' 	=> $kunci, 
			);
			if ($this->SoalModel->isi($isi)) {
				?>
				    <script>
				    	alert('Berhasil Eksekusi');
				    </script>
			    <?php
			    redirect('soal');
			}
		}
	}


	public function update_soal()
	{
		$id_soal	=	$this->input->post('id_soal');
		$level		=	$this->input->post('level');
		$kategori	=	$this->input->post('kategori');
		$soal		=	$this->input->post('soal');
		$jawab1		=	$this->input->post('jawab1');
		$jawab2		=	$this->input->post('jawab2');
		$jawab3		=	$this->input->post('jawab3');
		$jawab4		=	$this->input->post('jawab4');
		$kunci		=	$this->input->post('kunci');

		if ($kategori==100) {
			$level=null;
		}
		if (empty($soal) && empty($jawab1) && empty($jawab2) && empty($jawab3) && empty($jawab4)) {
			$data = array(
				'result' 	=> false,
				'pesan'		=> 'Periksa Komponen soal / jawaban !!!' 
			);
			?>
			    <script>
			    	alert('Periksa Komponen soal / jawaban !!!');
			    </script>
		    <?php
		}else{
			$isi = array(
				'id_level' 		=> $level, 
				'id_kategori' 	=> $kategori, 
				'pertanyaan' 	=> $soal, 
				'jawab_a' 	=> $jawab1, 
				'jawab_b' 	=> $jawab2, 
				'jawab_c' 	=> $jawab3, 
				'jawab_d' 	=> $jawab4, 
				'kunci' 	=> $kunci, 
			);
			if ($this->SoalModel->update($isi, $id_soal)) {
				?>
				    <script>
				    	alert('Berhasil Eksekusi');
				    </script>
			    <?php
			    redirect('soal');
			}
		}
	}

	public function fetch_soal_by_id($id)
	{
		$data = array(
			'soal' => $this->SoalModel->fetch_soal_by_id($id), 
		);
		echo json_encode($data);
	}

	public function delete_soal($id)
	{
		$del = $this->SoalModel->hapus_by_id($id);
		$data = array('id' => $del, );
		echo json_encode($data);
	}

}

/* End of file Soal.php */
/* Location: ./application/controllers/Soal.php */