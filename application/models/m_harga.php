<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_harga extends CI_Model {

	public $table='harga';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(harga.id_harga,4) as kode', FALSE);
		  $this->db->order_by('id_harga','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('harga');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "HRG-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_harga()
	{
		$this->db->select(["id_harga", "id_produk","id_paket","harga"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_harga($id_harga)
	{
		$this->db->select()
			->from($this->table)
			->where("id_harga", $id_harga);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_harga($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('harga');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_harga($data)
	{
		$this->db->where("id_harga", $this->input->post('id_harga'));
		$query=$this->db->set($data)->get_compiled_update('harga');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_harga', $id);
    $this->db->delete('harga');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
}

/* End of file m_harga.php */
/* Location: ./application/models/m_harga.php */