<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModel extends CI_Model {

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

}

/* End of file JadwalModel.php */
/* Location: ./application/models/JadwalModel.php */