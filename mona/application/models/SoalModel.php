<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalModel extends CI_Model {

	public function fetch_all_soal()
	{
		return $this->db->get('soal')->result();
	}

	public function fetch_soal_by_pekerjaan($idpekerjaan, $idUser)
	{
		$this->db->select('s.*, hj.status');
		$this->db->from('soal s');
		$this->db->join('hasil_jawab hj', 'hj.id_soal = s.id_soal', 'left');
		$this->db->where('s.id_level', $idpekerjaan);
		$this->db->where('hj.id_user', $idUser);
		$this->db->or_where('hj.id_user', null);
		return $this->db->get()->result();
	}

	public function cek_jawaban_calon_by_id_soal($idUser, $idSoal)
	{
		$this->db->select('*');
		$this->db->from('hasil_jawab');
		$this->db->where('id_user', $idUser);
		$this->db->where('id_soal', $idSoal);

		$jum =  $this->db->count_all_results();
		if ($jum>0) {
			return true;
		} else {
			return false;
		}		
	}

	public function update_jawaban_soal($idUser, $idSoal, $jawaban, $status, $sekarang)
	{
		$this->db->set('jawaban', $jawaban);
		$this->db->set('status', $status);
		$this->db->set('tgl_isi', $sekarang);
		$this->db->where('id_soal', $idSoal);
		$this->db->where('id_user', $idUser);
		return $this->db->update('hasil_jawab');		
	}

	public function isi_jawaban_soal($data)
	{
		$this->db->insert('hasil_jawab', $data);	
	}

	public function get_jawaban_soal($idSoal)
	{
		$this->db->select('kunci');
		return $this->db->get('soal')->row();
	}

	public function get_jum_dikerjakan($idUser)
	{
		$this->db->select('id_hasil');
		$this->db->from('hasil_jawab');
		$this->db->where('id_user', $idUser);

		return $this->db->count_all_results();
	}

	

}

/* End of file SoalModel.php */
/* Location: ./application/models/SoalModel.php */