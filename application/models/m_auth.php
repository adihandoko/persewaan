<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_auth extends CI_Model {

	public $variable;
	

    public function __construct()
    {
        parent::__construct();
    }

	function cek_user($data)
	{
		$data = $this->db
		->get_where('users', $data)
		->row();
		//	$query=$this->db->get_compiled_select();
		//$data = $this->db->query($query)->row();
			return $data;
	}
    function cek_username($user,$table)
    {
        $this->db->where('username',$user);
        return $this->db->get('users');
    }
    function ganti_password($user,$data,$table)
    {
    $this->db->where('username',$user);
    $this->db->update('users',$data);
    } 
    

}

/* End of file  */
/* Location: ./application/models/ */