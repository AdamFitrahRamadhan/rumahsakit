<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pasien extends CI_Model {

	public function getDataPasien()
	{
		return $this->db->get('pasien')->result();
	}
	public function detail($a)
	{
		return $this->db->where('id_pasien', $a)->get('pasien')->row();
	}	
	public function simpan_pasien()
	{
		$object = array(
		'nama_pasien' => $this->input->post('nama_pasien'),
		'alamat' => $this->input->post('alamat'),
		'jenis_kelamin' => $this->input->post('jenis_kelamin'),
		'telepon' => $this->input->post('telepon'),
		'jenis_obat' => $this->input->post('jenis_obat'),
		'jenis_tindakan' => $this->input->post('jenis_tindakan'),
		'total_harga' => $this->input->post('total_harga'),
		'status_obat' => "0",
		'status_bayar' =>"0"
		);
		return $this->db->insert('pasien', $object);
	}
	public function hapus($id_pasien)
	{
		return $this->db->where('id_pasien', $id_pasien)->delete('pasien');
	}
	public function edit_pasien()
	{
		$object = array(
			'nama_pasien' => $this->input->post('nama_pasien') ,
			'alamat' => $this->input->post('alamat') ,
			'jenis_kelamin' => $this->input->post('jenis_kelamin') ,
			'telepon' => $this->input->post('telepon') ,
			'jenis_obat' => $this->input->post('jenis_obat') ,
			'jenis_tindakan' => $this->input->post('jenis_tindakan') ,
			'status_obat' => "1",
			'total_harga' => $this->input->post('total_harga') 
		);
		return $this->db->where('id_pasien', $this->input->post('id_pasien'))->update('pasien', $object);
	}
	public function getDataPendaftaran()
	{
		 $query = $this->db->query('SELECT * FROM pasien WHERE status_obat="0"')->result();
		 return $query;
	}
	public function getDataPembayaran()
	{
		 $query = $this->db->query('SELECT * FROM pasien WHERE status_obat="1"')->result();
		return $query;
	}
	public function verifikasi_obat_tindakan()
	{
		$object = array(
		'jenis_obat' => $this->input->post('jenis_obat'),
		'jenis_tindakan' => $this->input->post('jenis_tindakan'),
		'status_obat' => "1",
		'total_harga' => $this->input->post('total_harga'),
		);
		return $this->db->where('id_pasien', $this->input->post('id_pasien'))->update('pasien', $object);
	}
	public function pembayaran_akhir()
	{
		$object = array(
		'status_obat' => "2",
		'status_bayar' => "1",
		'total_bayar' => $this->input->post('total_bayar'),
		'tanggal_bayar'=>date('Y-m-d')
		);
		return $this->db->where('id_pasien', $this->input->post('id_pasien'))->update('pasien', $object);
	}
	public function getDataHistori()
	{
		 $query = $this->db->query('SELECT * FROM pasien WHERE status_bayar="1"')->result();
		return $query;
	}

}

