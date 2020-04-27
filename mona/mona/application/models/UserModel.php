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

	public function fetch_level_non_management()
	{
		return $this->db->get('level')->result();
	}

	public function cek_username($username)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->count_all_results();
	}

	public function register($data)
	{
		return $this->db->insert('user', $data);
	}

	public function fetch_kategori_test()
	{
		$this->db->select('id_level, concat("Calon ",nama_level) as nama_level');
		$this->db->where('id_level >', 2);
		return $this->db->get('level')->result();
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

	public function delete_user($id)
	{
		$this->db->set('deleted', 1);
		$this->db->where('id_user', $id);
		return $this->db->update('user');
	}

	public function hidupkan_user($id)
	{
		$this->db->set('deleted', 0);
		$this->db->where('id_user', $id);
		return $this->db->update('user');
	}

	public function fetch_deleted()
	{
		$this->db->select('user.id_user as idUser, user.*, biodata.*, level.nama_level');
		$this->db->from('user');
		$this->db->join('biodata', 'biodata.id_user = user.id_user', 'left');
		$this->db->join('level', 'level.id_level = user.id_level');
		$this->db->where('deleted', 1);
		return $this->db->get()->result();
	}

	public function cout_karyawan()
	{
		$this->db->where('is_karyawan', 1);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('deleted', 0);
		return $this->db->count_all_results();
	}

	public function cout_pendaftar()
	{
		$this->db->where('is_karyawan', 0);
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('deleted', 0);
		$this->db->where('id_level >', 2);
		return $this->db->count_all_results();
	}

	public function cout_pendaftar_komplit()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('biodata', 'biodata.id_user = user.id_user');
		$this->db->where('is_karyawan', 0);
		$this->db->where('deleted', 0);
		return $this->db->count_all_results();
	}

	public function cout_pendaftar_belum_komplit()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('biodata', 'biodata.id_user = user.id_user','left');
		$this->db->where('id_biodata', null);
		$this->db->where('is_karyawan', 0);
		$this->db->where('deleted', 0);
		return $this->db->count_all_results();
	}

}