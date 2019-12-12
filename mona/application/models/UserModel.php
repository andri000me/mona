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
        $result = $this->db->get()->row(); 
        return $result;
	}

	public function register($data)
	{
		return $this->db->insert('user', $data);
	}

	

}