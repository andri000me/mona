<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalonModel extends CI_Model {

	public function isi_biodata($data)
	{
		return $this->db->insert('biodata', $data);
	}

	public function edit_biodata($edit, $id_biodata)
	{
		$this->db->where('id_biodata', $id_biodata);
		return $this->db->update('biodata', $edit);
	}

	public function edit_level($level, $id_user)
	{
		$this->db->set('id_level', $level);
		$this->db->where('id_user', $id_user);
		return $this->db->update('user');
	}

	public function get_biodata_by_id($id)
	{
		$this->db->select('user.*, biodata.*');
		$this->db->from('user');
		$this->db->join('biodata', 'user.id_user = biodata.id_user','left');
		$this->db->where('user.id_user', $id);
		$this->db->where('user.deleted', 0);
		return $this->db->get()->row();
	}

	public function get_karyawan($status)
	{
		$this->db->select('*, user.id_user as idUser');
		$this->db->from('user');
		$this->db->join('biodata', 'user.id_user = biodata.id_user', 'LEFT');
		$this->db->join('level', 'user.id_level = level.id_level', 'LEFT');
		/*PISAH ADMIN DAN KARYAWAN*/
		if ($status == 10) {
			$this->db->where('user.id_level <', 3);
			$this->db->where('user.deleted', 0);
		}else{	
			$this->db->where('user.is_karyawan', $status);
			$this->db->where('user.id_level !=', 1);
			$this->db->where('user.id_level !=', 2);
			$this->db->where('user.deleted', 0);
		}

		return $this->db->get()->result();
	}

	public function get_karyawan_management()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('biodata', 'user.id_user = biodata.id_user', 'left');
		$this->db->join('level', 'user.id_level = level.id_level');
		$this->db->where('user.is_karyawan', 1);
		$this->db->where('user.id_level =', 1);
		$this->db->where('user.id_level =', 2);

		return $this->db->get()->result();
	}

}