<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function get_user($username,$password)
	{
		$this->db->select('user.*, biodata.foto, biodata.nama_user');
		$this->db->from('user');
		$this->db->join('biodata', 'biodata.id_user = user.id_user', 'left');
		$this->db->where('user.username', $username); 
		$this->db->where('user.password', $password); 
		// $this->db->where('user.status', 0); 
        $result = $this->db->get()->row(); 
        return $result;
	}

	public function register($data)
	{
		return $this->db->insert('user', $data);
	}

	public function fetch_all_user()
	{
		$this->db->select('*');	
		$this->db->from('user');
		$this->db->join('biodata', 'biodata.id_user = user.id_user', 'left');
		$this->db->order_by('user.id_user', 'desc');
		return $this->db->get();
	}

	public function fetch_all_user_aktif()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('biodata', 'biodata.id_user = user.id_user', 'left');
		$this->db->where('user.status', 0); 
		$this->db->order_by('user.id_user', 'desc');
		return $this->db->get();
	}

	public function terima_user($id)
	{
		$this->db->set('status', 1);
		$this->db->where('id_user', $id);
		return $this->db->update('user');
	}

	public function edit_jabatan($id, $id_level)
	{
		$this->db->set('id_level', $id_level);
		$this->db->where('id_user', $id);
		return $this->db->update('user');
	}

	public function edit_password($id, $password)
	{
		$this->db->set('password', $password);
		$this->db->where('id_user', $id);
		return $this->db->update('user');
	}

}