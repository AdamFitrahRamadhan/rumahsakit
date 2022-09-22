<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function getDataPegawai()
	{
		$total = $this->db->query('SELECT * FROM user')->result();
		return $total;

	}
	public function detail($a)
	{
		return $this->db->where('id_user', $a)->get('user')->row();
	}	
	public function simpan_pegawai()
	{
		$object = array(
		'nama_user' => $this->input->post('nama_user'),
		'password' => $this->input->post('password'),
		'level' => $this->input->post('level'),
		);
		return $this->db->insert('user', $object);
	}
	public function hapus($id_user)
	{
		return $this->db->where('id_user', $id_user)->delete('user');
	}
	public function edit_pegawai()
	{
		$object = array(
			'nama_user' => $this->input->post('nama_user') ,
			'password' => $this->input->post('password') ,
			'level' => $this->input->post('level') ,
		);
		return $this->db->where('id_user', $this->input->post('id_user'))->update('user', $object);
	}

}

