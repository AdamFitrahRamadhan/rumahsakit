<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_wilayah','wil');
	}
	public function index()
	{
		$data['konten'] = "wilayah";
		$data['tampil_wilayah']=$this->wil->getDataWilayah();
		$this->load->view('template', $data);		
	}
	public function detail_wilayah($id)
	{
		$data=$this->wil->detail($id);
		echo json_encode($data);
	}
	public function tambah_wilayah()
	{	
		if ($this->wil->simpan_wilayah()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('wilayah','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('wilayah','refresh');
		}
	}
	public function ubah()
	{
		if ($this->wil->edit_wilayah()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('wilayah','refresh');
	}
	public function hapus($id_wilayah)
	{
		if ($this->wil->hapus($id_wilayah)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'tidak berhasil dihapus, gagal');
		}
		redirect('wilayah','refresh');
	}

}

/* End of file Wilayah.php */
/* Location: ./application/controllers/Wilayah.php */