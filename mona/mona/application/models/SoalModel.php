<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalModel extends CI_Model {

	public function fetch_all_soal()
	{
		return $this->db->get('soal')->result();
	}

	public function fetch_soal_by_pekerjaan($idpekerjaan, $idUser)
	{
		$this->db->select('s.*');
		$this->db->from('soal s');
		$this->db->where('s.id_level', $idpekerjaan);
		$this->db->where('s.id_kategori', $idUser);
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
		return $this->db->insert('hasil_jawab', $data);	
	}

	public function get_jawaban_soal($idSoal)
	{
		$this->db->select('kunci');
		return $this->db->get('soal')->row();
	}

	public function get_jum_dikerjakan($idUser, $idLevel)
	{
		/*
		SELECT k.id_kategori, k.nama_kategori, count(hj.id_hasil) from soal s
		JOIN kategori k on k.id_kategori = s.id_kategori 
		left join hasil_jawab hj on hj.id_soal = s.id_soal
		WHERE s.id_level=4 OR hj.id_user=2
		GROUP by k.id_kategori
		*/
		$this->db->select('k.id_kategori, k.nama_kategori, count(hj.id_hasil) as terjawab');
		$this->db->from('soal s');
		$this->db->join('kategori k', 'k.id_kategori = s.id_kategori');
		$this->db->join('hasil_jawab hj', 'hj.id_soal = s.id_soal', 'left');
		$this->db->where('s.id_level', $idLevel);
		$this->db->or_where('hj.id_user', $idUser);
		$this->db->group_by('k.id_kategori');

		return $this->db->get()->result();
	}

	public function get_terjawab($idUser)
	{
		$this->db->select('*');
		$this->db->from('hasil_jawab');
		$this->db->where('id_user', $idUser);

		return $this->db->get()->result();
	}

	public function fetch_kategori_soal_by_level($level)
	{
		$this->db->select('k.id_kategori, k.nama_kategori, count(s.id_soal) as jumSoal');
		$this->db->from('soal s');
		$this->db->join('kategori k', 'k.id_kategori = s.id_kategori');
		$this->db->where('s.id_level', $level);
		$this->db->group_by('k.id_kategori');

		return $this->db->get()->result();
	}

	

}

/* End of file SoalModel.php */
/* Location: ./application/models/SoalModel.php */