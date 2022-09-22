<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pegawai','peg');
	}
	public function index()
	{
		$data['konten'] = "pegawai";
		$data['tampil_pegawai']=$this->peg->getDataPegawai();
		$this->load->view('template', $data);		
	}
	public function detail_pegawai($id)
	{
		$data=$this->peg->detail($id);
		echo json_encode($data);
	}
	public function tambah_pegawai()
	{	
		if ($this->peg->simpan_pegawai()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('pegawai','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('pegawai','refresh');
		}
	}
	public function ubah()
	{
		if ($this->peg->edit_pegawai()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('pegawai','refresh');
	}
	public function hapus($id_pegawai)
	{
		if ($this->peg->hapus($id_pegawai)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'tidak berhasil dihapus, gagal');
		}
		redirect('pegawai','refresh');
	}


}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */