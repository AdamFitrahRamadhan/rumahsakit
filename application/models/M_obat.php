<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {

	public function getDataObat()
	{
		return $this->db->get('obat')->result();
	}
	public function detail($a)
	{
		return $this->db->where('id_obat', $a)->get('obat')->row();
	}	
	public function simpan_obat()
	{
		$object = array(
		'nama_obat' => $this->input->post('nama_obat'),
		'harga' => $this->input->post('harga')
		);
		return $this->db->insert('obat', $object);
	}
	public function hapus($id_obat)
	{
		return $this->db->where('id_obat', $id_obat)->delete('obat');
	}
	public function edit_obat()
	{
		$object = array(
			'nama_obat' => $this->input->post('nama_obat') ,
			'harga' => $this->input->post('harga') ,
		);
		return $this->db->where('id_obat', $this->input->post('id_obat'))->update('obat', $object);
	}

}

