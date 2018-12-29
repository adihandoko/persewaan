<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Harga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->helper('form');
		$this->load->model('m_harga', 'mod');
		$this->load->model('m_paket');
		
	}


	public function index()
	{
		$data['title']='Tabel harga';
		//print_r($data);
		//$data['kodeunik'] = $this->m_harga->buat_kode();
		$data['result']=$this->mod->tampil_harga()['result'];
		$data['total_data']=$this->mod->tampil_harga()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('harga/harga_tampil', $data);
	}

	public function tambah()
	{
		$this->load->model('m_paket');
		$data['title']='Tambah harga';
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id_produk','id_produk','required');
		$data['kodeunik'] = $this->mod->buat_kode();
		$data['result_paket_pilihan'] = $this->m_paket->tampil_paket_pilihan()['result'];
		//print_r($data); exit();

		$this->parser->parse('harga/harga_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_harga"	=> $this->input->post('id_harga'),
			"id_produk"	=> $this->input->post('id_produk'),
			"id_paket"	=> $this->input->post('id_paket'),
			"harga"	=> $this->input->post('harga'),
			
			
		];

		$this->mod->tambah_harga($data);
		redirect(site_url('harga'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah harga';
		$data['result']=$this->mod->detail_harga($id);
		$this->parser->parse('harga/harga_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_harga"	=> $this->input->post('id_harga'),
			"id_produk"	=> $this->input->post('id_produk'),
			"id_paket"	=> $this->input->post('id_paket'),
			"harga"	=> $this->input->post('harga'),
		];

		$this->mod->ubah_harga($data);
		redirect(site_url('harga'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('harga'));
	}
}

/* End of file harga.php */
/* Location: ./application/controllers/harga.php */