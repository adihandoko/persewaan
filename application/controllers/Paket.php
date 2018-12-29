<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_paket', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel paket';
		//$data['kodeunik'] = $this->m_paket->buat_kode();
		$data['result']=$this->mod->tampil_paket()['result'];
		$data['total_data']=$this->mod->tampil_paket()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('paket/paket_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah paket';
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('paket/paket_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_paket"	=> $this->input->post('id_paket'),
			"nama"	=> $this->input->post('nama'),
			"durasi"	=> $this->input->post('durasi'),
			
		];

		$this->mod->tambah_paket($data);
		redirect(site_url('paket'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah paket';
		$data['result']=$this->mod->detail_paket($id);
		$this->parser->parse('paket/paket_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_paket"	=> $this->input->post('id_paket'),
			"nama"	=> $this->input->post('nama'),
			"durasi"	=> $this->input->post('durasi'),
		];

		$this->mod->ubah_paket($data);
		redirect(site_url('paket'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('paket'));
	}
}

/* End of file paket.php */
/* Location: ./application/controllers/paket.php */