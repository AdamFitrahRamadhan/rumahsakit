<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tindakan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tindakan','tin');
	}
	public function index()
	{
		$data['konten'] = "tindakan";
		$data['tampil_tindakan']=$this->tin->getDataTindakan();
		$this->load->view('template', $data);		
	}
	public function detail_tindakan($id)
	{
		$data=$this->tin->detail($id);
		echo json_encode($data);
	}
	public function tambah_tindakan()
	{	
		if ($this->tin->simpan_tindakan()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('tindakan','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('tindakan','refresh');
		}
	}
	public function ubah()
	{
		if ($this->tin->edit_tindakan()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('tindakan','refresh');
	}
	public function hapus($id_tindakan)
	{
		if ($this->tin->hapus($id_tindakan)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'tidak berhasil dihapus, gagal');
		}
		redirect('tindakan','refresh');
	}

}

