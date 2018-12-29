<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_booking extends CI_Model {

	public $table='booking';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(booking.id_booking,4) as kode', FALSE);
		  $this->db->order_by('id_booking','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('booking');      //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
		   //jika kode ternyata sudah ada.      
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
		  $ym = date('ym');
		  $kodejadi = "TRB-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	function tampil_booking()
	{
		// $this->db->select('v_booking')
		// 	->from($this->table);
		// $query=$this->db->get_compiled_select();

		// $data['result']=$this->db->query($query)->result();
		// $data['total_data']=$this->db->count_all_results();
		// return $data;
		$this->db->select('*');
    $this->db->from('booking');
    //$this->db->join('produk', 'produk.id_produk = booking.id_produk');
    $this->db->join('karyawan', 'karyawan.id_karyawan = booking.id_karyawan');
    $this->db->join('customer', 'customer.id_customer = booking.id_customer');
    $query=$this->db->get_compiled_select();
    $data['result']=$this->db->query($query)->result();
	$data['total_data']=$this->db->count_all_results();
		return $data;
	}
	

		

	public function detail_booking($id_booking)
	{
		$this->db->select()
			->from($this->table)
			->where("id_booking", $id_booking);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_booking($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('booking');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_booking($data)
	{
		$this->db->where("id_booking", $this->input->post('id_booking'));
		$query=$this->db->set($data)->get_compiled_update('booking');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_booking', $id);
    $this->db->delete('booking');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_booking.php */
/* Location: ./application/models/m_booking.php */