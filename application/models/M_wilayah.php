<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wilayah extends CI_Model {

	public function getDataWilayah()
	{
		return $this->db->get('wilayah')->result();
	}
	public function detail($a)
	{
		return $this->db->where('id_wilayah', $a)->get('wilayah')->row();
	}	
	public function simpan_wilayah()
	{
		$object = array(
		'nama_wilayah' => $this->input->post('nama_wilayah')
		);
		return $this->db->insert('wilayah', $object);
	}
	public function hapus($id_wilayah)
	{
		return $this->db->where('id_wilayah', $id_wilayah)->delete('wilayah');
	}
	public function edit_wilayah()
	{
		$object = array(
			'nama_wilayah' => $this->input->post('nama_wilayah') ,
		);
		return $this->db->where('id_wilayah', $this->input->post('id_wilayah'))->update('wilayah', $object);
	}

}

/* End of file M_wilayah.php */
/* Location: ./application/models/M_wilayah.php */