<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('id_user')) {
			redirect(site_url('auth'));
		}
		$this->load->model('m_booking', 'mod');
	}


	public function index()
	{
		$data['title']='Tabel booking';
		//$data['kodeunik'] = $this->m_booking->buat_kode();
		$data['result']=$this->mod->tampil_booking()['result'];
		$data['total_data']=$this->mod->tampil_booking()['total_data'];

		// print('<pre>'); print_r($data); exit();
		$this->parser->parse('booking/booking_tampil', $data);
	}

	public function tambah()
	{
		$data['title']='Tambah booking';
		$data['kodeunik'] = $this->mod->buat_kode();
		$this->parser->parse('booking/booking_tambah', $data);
	}

	public function tambah_proses()
	{
		$data=[
			"id_booking"	=> $this->input->post('id_booking'),
			"nama"	=> $this->input->post('nama'),
			
		];

		$this->mod->tambah_booking($data);
		redirect(site_url('booking'));
	}

	public function ubah($id)
	{
		$data['title']='Ubah booking';
		$data['result']=$this->mod->detail_booking($id);
		$this->parser->parse('booking/booking_ubah', $data);
	}

	public function ubah_proses()
	{
		$data=[
			"id_booking"	=> $this->input->post('id_booking'),
			"nama"	=> $this->input->post('nama')
		];

		$this->mod->ubah_booking($data);
		redirect(site_url('booking'));
	}
	public function delete($id)
	{
		 $this->mod->delete($id);
		redirect(site_url('booking'));
	}
}

/* End of file booking.php */
/* Location: ./application/controllers/booking.php */