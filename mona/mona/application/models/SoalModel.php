<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalModel extends CI_Model {

	public function isi($isi)
	{
		return $this->db->insert('soal', $isi);
	}

	public function fetch_all_soal()
	{
		$this->db->where('deleted', 0);
		return $this->db->get('soal')->result();
	}

	public function update($data, $id_soal)
	{
		$this->db->where('id_soal', $id_soal);
		return $this->db->update('soal', $data);
	}

	public function fetch_soal_by_pekerjaan($idLevel, $idKategori)
	{
		$this->db->select('s.*');
		$this->db->from('soal s');
		if ($idKategori!=100) {			
			$this->db->where('s.id_level', $idLevel);
		}
		$this->db->where('s.id_kategori', $idKategori);
		$this->db->where('s.deleted', 0);
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

	public function update_jawaban_soal($idUser, $idSoal, $jawaban, $status, $skorpsiko, $sekarang)
	{
		$this->db->set('jawaban', $jawaban);
		$this->db->set('status', $status);
		$this->db->set('skorpsiko', $skorpsiko);
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
		$this->db->select('*');
		$this->db->where('id_soal', $idSoal);
		return $this->db->get('soal')->row();
	}

	public function get_jum_dikerjakan($idUser, $idLevel)
	{
		$this->db->select('k.id_kategori, k.nama_kategori, count(hj.id_hasil) as terjawab');
		$this->db->from('soal s');
		$this->db->join('kategori k', 'k.id_kategori = s.id_kategori');
		$this->db->join('hasil_jawab hj', 'hj.id_soal = s.id_soal', 'left');
		// $this->db->where('s.id_level', $idLevel);
		$this->db->where('hj.id_user', $idUser);
		$this->db->where('s.deleted', 0);
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
		$this->db->where('s.deleted', 0);
		$this->db->group_by('k.id_kategori');
		if($level==null){
			return $this->db->get()->row();	
		}else{
			return $this->db->get()->result();
		}
		
	}

	public function kategori_soal_calon($idUser, $level)
	{
		$this->db->select('kategori.id_kategori, kategori.nama_kategori');
		$this->db->from('kategori');
		$this->db->join('soal', 'kategori.id_kategori = soal.id_kategori');
		$this->db->where('soal.id_level', $level);
		$this->db->or_where('soal.id_level', null);
		$this->db->group_by('kategori.id_kategori');
		
		return $this->db->get()->result();
	}

	public function fetch_soal_by_admin($id_level, $id_kategori)
	{
		$this->db->select('soal.*, kategori.nama_kategori, level.nama_level');
		$this->db->from('soal');
		$this->db->join('kategori', 'kategori.id_kategori = soal.id_kategori');
		$this->db->join('level', 'level.id_level = soal.id_level','left');
		$this->db->where('deleted', 0);
		if(empty($id_kategori) && empty($id_level)){
			$this->db->order_by('kategori.nama_kategori', 'asc');
		}else if (empty($id_level)) {
			$this->db->where('soal.id_kategori', $id_kategori);
		} else if(empty($id_kategori)){
			$this->db->where('soal.id_level', $id_level);
		}else if(!empty($id_kategori) && !empty($id_level)){
			$this->db->where('soal.id_kategori', $id_kategori);
			$this->db->where('soal.id_level', $id_level);
		}
		$this->db->order_by('kategori.nama_kategori', 'asc');
		
		return $this->db->get()->result();
	}

	public function fetch_soal_by_id($id)
	{
		$this->db->where('id_soal', $id);
		return $this->db->get('soal')->row();
	}

	public function hapus_by_id($id)
	{
		$this->db->set('deleted', 1);
		$this->db->where('id_soal', $id);
		return $this->db->update('soal');
	}



	/*========================= KATEGORI ================================*/
	/*========================= KATEGORI ================================*/
	/*========================= KATEGORI ================================*/
	public function add_kategori($data)
	{
		return $this->db->insert('kategori', $data);
	}

	public function edit_kategori($nama, $id)
	{
		$this->db->set('nama_kategori', $nama);
		$this->db->where('id_kategori', $id);
		return $this->db->update('kategori');
	}

	public function fetch_all_kategori()
	{
		$this->db->select('kategori.*, soal.id_soal');
		$this->db->from('kategori');
		$this->db->join('soal', 'soal.id_kategori = kategori.id_kategori', 'left');
		$this->db->group_by('kategori.id_kategori');
		$this->db->order_by('kategori.id_kategori', 'desc');
		return $this->db->get()->result();
	}

	public function fetch_kategori_by_id($id)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->get('kategori')->row();
	}

	public function delete_ketegori($id)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->delete('kategori');
	}

	

}

/* End of file SoalModel.php */
/* Location: ./application/models/SoalModel.php */