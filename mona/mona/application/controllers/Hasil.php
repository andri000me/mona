<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('CalonModel');
		$this->load->model('SoalModel');
		$this->load->model('HasilModel');
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

		$biodata 	= $this->CalonModel->get_biodata_by_id($idUser);
		$hasil   	= $this->HasilModel->fetch_all_hasil();
		$hasilPsiko	= $this->HasilModel->get_hasil_psiko();
		$jumSoalPsiko	= $this->HasilModel->get_jum_psiko();
		$jumSoalDb 	= $this->HasilModel->get_jum_soal();
		$allCalon 	= $this->HasilModel->get_all_calon();

		$jumSoal = array();
		foreach ($jumSoalDb as $val) {
			$jumSoal[$val->id_level] = $val->jumSoal;
		}
		
		$data = array(
			'title' 			=> 'Hasil', 
			'dataUser'	 		=> $biodata,
			'dataCalon'			=> $allCalon
			// 'hasilAkademik'		=> $hasil,
			// 'hasilNonAkademik'	=> $hasilPsiko,
		);

		$bobot;
		$jumNilai=0;
		$i=0;
		$bobotAkademik		= array();
		$bobotNonAkademik		= array();
		$bobotPendidikan	= array();

		// HITUNG SKOR AKADEMIK DAN PENDIDIKAN
		foreach ($hasil as $val) {
			$jumNilai = (($val->jumBenar/$jumSoal[$val->id_level])*100);

			if ($jumNilai >= 75 && $jumNilai<=100) {
				$bobot = 4;
			}else if ($jumNilai >= 50 && $jumNilai<75) {
				$bobot = 3;
			}else if ($jumNilai >= 25 && $jumNilai<50) {
				$bobot = 2;
			}else{
				$bobot = 1;
			}
			array_push($bobotAkademik,$bobot);
			array_push($bobotPendidikan,$val->pendidikan);

			$data['perolehan'][$i]=array(
				'nilai' 			=> $jumNilai,
				'id_user' 			=> $val->id_user,
				'nama' 				=> $val->nama_user,
				'bobotAkademik'		=> $bobot,
				'bobotPendidikan'	=> $val->pendidikan,
			);
			$i++;
		}

		// HITUNG SKOR PSIKOLOGI
		foreach ($hasilPsiko as $v) {
			foreach ($hasil as $valh) {
				if($v->id_user == $valh->id_user){
					$h = 0;	
					$h = ($v->jumPsiko / $jumSoalPsiko->jumSoal)*10;
					if($h > 30 && $h<=40){
						$bobotPsiko = 4;
					}else if($h > 20 && $h <= 30){
						$bobotPsiko = 3;
					}if($h > 10 && $h <= 20){
						$bobotPsiko = 2;
					}if($h > 0 && $h <=10){
						$bobotPsiko = 1;
					}
					$data['perolehanPsiko'][]= array(
						'id_user'		=> $v->id_user,
						'skorPsiko'		=> $h,
						'bobotPsiko'	=> $bobotPsiko,
					);
					array_push($bobotNonAkademik, $bobotPsiko);
				}
			}
		}

		// HITUNG NILAI AKHIR
		if(!empty($hasilPsiko)){
			$perhitunganBobot	= [5,3,2];	// akademik, pendidikan, psiko
			foreach ($data['perolehanPsiko'] as $valP) {
				foreach ($data['perolehan'] as $valh) {
					if($valP['id_user'] == $valh['id_user']){
						$nil = 0;
						$nil = (($valh['bobotAkademik'])/max($bobotAkademik))*$perhitunganBobot[0];
						$nil = $nil + (($valh['bobotPendidikan'])/max($bobotPendidikan))*$perhitunganBobot[1];
						$nil = $nil + (($valP['bobotPsiko'])/max($bobotNonAkademik))*$perhitunganBobot[2];
						$data['hasilAkhir'][]= array(
							'id_user'		=> $valP['id_user'],
							'nama'			=> $valh['nama'],
							'bAkademik'		=> $valh['bobotAkademik'],
							'bNonAkademik'	=> $valP['bobotPsiko'],
							'bPendidikan'	=> $valh['bobotPendidikan'],
							'sAkademik'		=> $valh['nilai'],
							'sNonAkademik'	=> $valP['skorPsiko'],
							'totalNilai'	=> $nil,
							'max'			=> max($bobotNonAkademik),
						);
					}
				}
			}
		}else{
			$data['perolehanPsiko'][]=null;
			$data['hasilAkhir'][]=null;
		}

		// echo json_encode($data);
		$this->load->view('admin/hasil/hasil', $data);
	}


	public function terima_karyawan($id, $status)
	{
		if($this->HasilModel->terima_tidak_karyawan($id, 1)){
			$data = array(
				'result' 	=> true,
				'pesan'		=> 'Berhasil terimakaryawan'
			);
		}else{
			$data = array(
				'result' 	=> false,
				'pesan'		=> 'Error, Gagal terima karyawan'
			);
		}
		echo json_encode($data);
	}

	public function phk($id, $status)
	{
		if($this->HasilModel->terima_tidak_karyawan($id, 0)){
			$data = array(
				'result' 	=> true,
				'pesan'		=> 'Berhasil PHK karyawan'
			);
		}else{
			$data = array(
				'result' 	=> false,
				'pesan'		=> 'Error, Gagal PHK karyawan'
			);
		}
		echo json_encode($data);
	}

}

/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */