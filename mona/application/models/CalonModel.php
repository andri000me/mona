<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CalonModel extends CI_Model {

	public function get_biodata_by_id($id)
	{
		$this->db->select('biodata.*');
		$this->db->from('biodata');
		$this->db->join('user', 'user.id_user = biodata.id_user');
		$this->db->where('user.id_user', $id);
		return $this->db->get()->row();
	}

}