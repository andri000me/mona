<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {

	public function add_jadwal($isi)
	{
		return $this->db->insert('jadwal_test', $isi);
	}

	public function edit_jadwal($isi, $id)
	{
		$this->db->where('id_level', $id);
		return $this->db->update('jadwal_test', $isi);
	}

	public function fetch_all_jadwal()
	{		
		$this->db->select('jadwal_test.*, level.nama_level');
		$this->db->from('jadwal_test');
		$this->db->join('level', 'level.id_level = jadwal_test.id_level');
		return $this->db->get()->result();
	}

	public function delete_jadwal($id_jadwal)
	{
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->delete('jadwal_test');
	}

	public function fetch_all_jadwal_aktif($sekarang)
	{		
		$this->db->where('tgl_mulai <=', $sekarang);
		$this->db->where('tgl_selesai >=', $sekarang);
		return $this->db->get('jadwal_test')->result();
	}

	public function fetch_all_jadwal_aktif_by_level($sekarang, $level)
	{		
		$this->db->where('id_level', $level);
		$this->db->where('tgl_mulai <=', $sekarang);
		$this->db->where('tgl_selesai >=', $sekarang);
		return $this->db->get('jadwal_test')->row();
	}

	public function fetch_all_jadwal_by_level($id_level)
	{		
		$this->db->where('id_level', $id_level);
		return $this->db->get('jadwal_test')->row();
	}

	public function fetch_jadwal_by_id($id_jadwal)
	{		
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->get('jadwal_test')->row();
	}

}

/* End of file JadwalModel.php */
/* Location: ./application/models/JadwalModel.php */