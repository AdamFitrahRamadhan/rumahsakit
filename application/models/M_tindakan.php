<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tindakan extends CI_Model {

	public function getDataTindakan()
	{
		return $this->db->get('tindakan')->result();
	}
	public function detail($a)
	{
		return $this->db->where('id_tindakan', $a)->get('tindakan')->row();
	}	
	public function simpan_tindakan()
	{
		$object = array(
		'nama_tindakan' => $this->input->post('nama_tindakan'),
		'harga' => $this->input->post('harga')
		);
		return $this->db->insert('tindakan', $object);
	}
	public function hapus($id_tindakan)
	{
		return $this->db->where('id_tindakan', $id_tindakan)->delete('tindakan');
	}
	public function edit_tindakan()
	{
		$object = array(
			'nama_tindakan' => $this->input->post('nama_tindakan') ,
			'harga' => $this->input->post('harga') ,
		);
		return $this->db->where('id_tindakan', $this->input->post('id_tindakan'))->update('tindakan', $object);
	}

}

