<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_customer extends CI_Model {

	public $table='customer';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(customer.id_customer,4) as kode', FALSE);
		  $this->db->order_by('id_customer','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('customer');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "CUST-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_customer()
	{
		$this->db->select(["id_customer", "nama","no_id","jenis_id","alamat","no_hp"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_customer($id_customer)
	{
		$this->db->select()
			->from($this->table)
			->where("id_customer", $id_customer);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_customer($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('customer');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_customer($data)
	{
		$this->db->where("id_customer", $this->input->post('id_customer'));
		$query=$this->db->set($data)->get_compiled_update('customer');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_customer', $id);
    $this->db->delete('customer');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_customer.php */
/* Location: ./application/models/m_customer.php */