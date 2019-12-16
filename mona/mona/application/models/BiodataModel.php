<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BiodataModel extends CI_Model {
	
	public function isi_biodata($data)
	{
		return $this->db->insert('biodata', $data);
	}

	public function edit_biodata($data)
	{
		$this->db->update('biodata', $data);
	}

	
	

}

/* End of file BiodataModel.php */
/* Location: ./application/models/BiodataModel.php */