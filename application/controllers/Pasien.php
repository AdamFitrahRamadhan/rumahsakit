<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pasien','pas');
	}
	public function index()
	{
		$data['konten'] = "pasien";
		$data['tampil_pasien']=$this->pas->getDataPasien();
		$this->load->view('template', $data);		
	}
	public function detail_pasien($id)
	{
		$data=$this->pas->detail($id);
		echo json_encode($data);
	}
	public function tambah_pasien()
	{	
		if ($this->pas->simpan_pasien()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('pasien','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('pasien','refresh');
		}
	}
	public function tambah_pasien_pendaftaran()
	{	
		if ($this->pas->simpan_pasien()) {
			$this->session->set_flashdata('pesan', 'sukses menambah');
			redirect('pasien/pendaftaran','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menambah');
			redirect('pasien/pendaftaran','refresh');
		}
	}
	public function ubah()
	{
		if ($this->pas->edit_pasien()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('pasien','refresh');
	}
	public function hapus($id_pasien)
	{
		if ($this->pas->hapus($id_pasien)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');
		} else {
			$this->session->set_flashdata('pesan', 'tidak berhasil dihapus, gagal');
		}
		redirect('pasien','refresh');
	}
	public function pendaftaran()
	{
		$data['konten'] = "pendaftaran";
		$data['tampil_pendaftaran'] = $this->pas->getDataPendaftaran();
		$this->load->view('template', $data);
	}
	public function verifikasi()
	{
		$data['konten'] = "verifikasi";
		$data['tampil_pendaftaran'] = $this->pas->getDataPendaftaran();
		$this->load->view('template', $data);
	}
	public function pembayaran()
	{
		$data['konten'] = "pembayaran";
		$data['tampil_pendaftaran'] = $this->pas->getDataPembayaran();
		$this->load->view('template', $data);
	}
	public function veri_tindakan()
	{
		if ($this->pas->verifikasi_obat_tindakan()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('pasien/verifikasi','refresh');
	}
	public function bayar()
	{
		if ($this->pas->pembayaran_akhir()) {
			$this->session->set_flashdata('pesan', 'berhasil');
		}
		else{
			$this->session->set_flashdata('pesan', 'gagal');
		}
		redirect('pasien/pembayaran','refresh');
	}
	public function histori()
	{
		$data['konten'] = "histori";
		$data['tampil_histori'] =$this->pas->getDataHistori();
		$this->load->view('template', $data);
	}

}

