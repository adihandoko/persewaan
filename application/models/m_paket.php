<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_paket extends CI_Model {

	public $table='paket';

	public function __construct()
	{
		parent::__construct();
		
	}

	public function buat_kode($value='')
	{
		$this->db->select('RIGHT(paket.id_paket,4) as kode', FALSE);
		  $this->db->order_by('id_paket','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('paket');      //cek dulu apakah ada sudah ada kode di tabel.    
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
		  $kodejadi = "PKT-$ym-".$kodemax;    // hasilnya ODJ-9921-0001 dst.
		  return $kodejadi;  
	}

	public function tampil_paket()
	{
		$this->db->select(["id_paket", "nama","durasi"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function tampil_paket_pilihan()
	{
		$this->db->select(["id_paket", "nama"])
			->from($this->table);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->result_array();
		$data['total_data']=$this->db->count_all_results();
		return $data;
	}

	public function detail_paket($id_paket)
	{
		$this->db->select()
			->from($this->table)
			->where("id_paket", $id_paket);
		$query=$this->db->get_compiled_select();

		$data['result']=$this->db->query($query)->row();

		return $data;
	}

	public function tambah_paket($data)
	{
		$query=$this->db->set($data)->get_compiled_insert('paket');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}

	public function ubah_paket($data)
	{
		$this->db->where("id_paket", $this->input->post('id_paket'));
		$query=$this->db->set($data)->get_compiled_update('paket');
		// print('<pre>'); print_r($query); exit();

		$this->db->query($query);
	}
	public function delete($id)
	{
    // Attempt to delete the row
    $this->db->where('id_paket', $id);
    $this->db->delete('paket');
    // Was the row deleted?
    if ($this->db->affected_rows() == 1)
        return TRUE;
    else
        return FALSE;
	}
	public function get_all_paket()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->get('paket');
    	return $query->result_array();
    }
}

/* End of file m_paket.php */
/* Location: ./application/models/m_paket.php */