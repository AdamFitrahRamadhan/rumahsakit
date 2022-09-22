<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_obat','ob');
	}
	public function index()
	{
		$data['konten'] = "obat";
		$data['tampil_obat']=$this->ob->getDataObat();
		$this->load->view('template', $data);		
	}
	public function detail_obat($id)
	{
		$data=$this->ob->detail($id);
		echo json_encode($data);
	}
	public function tambah_obat()
	{	
		if ($this->ob->simpan_obat()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('obat','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('obat','refresh');
		}
	}
	public function ubah()
	{
		if ($this->ob->edit_obat()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('obat','refresh');
	}
	public function hapus($id_obat)
	{
		if ($this->ob->hapus($id_obat)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'tidak berhasil dihapus, gagal');
		}
		redirect('obat','refresh');
	}

}

