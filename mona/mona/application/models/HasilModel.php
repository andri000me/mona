<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilModel extends CI_Model {
	public function fetch_all_hasil()
	{
		/*
			select b.nama_user, k.nama_kategori, hj.skorpsiko, sum(hj.status) as jumBenar, count(s.id_soal) as jumSoal from hasil_jawab hj
			join soal s on s.id_soal = hj.id_soal
			join biodata b on b.id_user = hj.id_user
			join kategori k on k.id_kategori = s.id_kategori
			group by s.id_kategori, hj.id_user
			order by hj.id_user, s.id_kategori;
		*/
		$this->db->select('hj.id_user, s.id_level, b.nama_user, b.pendidikan, sum(hj.status) as jumBenar');
		$this->db->from('hasil_jawab hj');
		$this->db->join('soal s', 's.id_soal = hj.id_soal');
		$this->db->join('biodata b', 'b.id_user = hj.id_user');
		$this->db->join('kategori k', 'k.id_kategori = s.id_kategori');
		$this->db->where('s.id_kategori <>', 100);
		$this->db->group_by('hj.id_user');
		$this->db->order_by('jumBenar', 'DESC');
		$this->db->order_by('hj.id_user', 'ASC');
		$this->db->order_by('s.id_kategori', 'ASC');

		return $this->db->get()->result();
	}

	public function get_jum_soal()
	{
		$this->db->select('id_level, count(id_soal) as jumSoal');
		$this->db->from('soal');
		$this->db->where('id_kategori <', 100);
		$this->db->where('deleted', 0);
		$this->db->group_by('id_level');
		return $this->db->get()->result();
	}

	public function get_hasil_psiko()
	{
		/*
			select b.nama_user, hj.id_user, hj.skorpsiko from hasil_jawab hj 
			join biodata b on b.id_user = hj.id_user
			where hj.skorpsiko>0
		*/
		$this->db->select('b.nama_user, hj.id_user, sum(hj.skorpsiko) jumPsiko');
		$this->db->from('hasil_jawab hj');
		$this->db->join('biodata b', 'b.id_user = hj.id_user');
		$this->db->where('hj.skorpsiko >', 0);
		$this->db->group_by('hj.id_user');
		return $this->db->get()->result();
	}

	public function get_jum_psiko()
	{
		$this->db->select('count(id_soal) as jumSoal');
		$this->db->from('soal');
		$this->db->where('id_kategori ', 100);
		$this->db->where('deleted', 0);
		$this->db->group_by('id_level');
		return $this->db->get()->row();
	}

	public function get_all_calon()
	{
		$this->db->select('*, user.id_user as idUser');
		$this->db->from('user');
		$this->db->join('biodata', 'user.id_user = biodata.id_user', 'LEFT');
		$this->db->join('level', 'user.id_level = level.id_level', 'LEFT');
		$this->db->where('user.id_level >', 1);
		$this->db->where('user.deleted', 0);
		$this->db->where('user.is_karyawan', 0);
		return $this->db->get()->result();
	}

	public function terima_tidak_karyawan($id, $status)
	{
		$this->db->set('is_karyawan', $status);
		if($status == 0){
			$this->db->set('deleted', 1);
		}
		
		$this->db->where('id_user', $id);
		return $this->db->update('user');
	}
	

}

/* End of file HasilModel.php */
/* Location: ./application/models/HasilModel.php */