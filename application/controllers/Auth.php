<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('m_auth', 'mod');
	}

	public function index()
	{
		$data['title']='Authentification';
		$this->parser->parse('auth/auth', $data);
	}
	public function auth()
	{
	$data = array('username' => htmlspecialchars($this->input->post('username', TRUE)),
						'password' => md5(htmlspecialchars($this->input->post('password', TRUE)))
					);
		$hasil = $this->mod->cek_user($data);
		if ($hasil) {
				$sess_data['id_user'] = $hasil->id_user;
				$sess_data['username'] = $hasil->username;
				$sess_data['nama_user'] = $hasil->nama_user;
				$sess_data['hak_akses'] = $hasil->hak_akses;
				$this->session->set_userdata($sess_data);

				redirect('dashboard');
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}

	}
	public function logout()
	{
		session_destroy();
		redirect('dashboard');

	}

	public function ubah_password()
	{	 
		//$this->load->model('m_auth');
	    $user = $this->session->userdata('username');
	    $opass = $this->input->post('old_password');
	    $npass = $this->input->post('new_password');
	    $rpass = $this->input->post('repeat_password');
	 
	    $cek = $this->mod->cek_username($user,'users');
	 
	    if($rpass == $npass){
		  if($cek->num_rows() > 0){
			$row = $cek->row();
			if($opass == $row->password){
			    $data = array('password' => md5($npass));
			    $this->mod->ubah_password($user,$data,'users');
			    redirect('auth/auth');
			}else{
				redirect('auth/ubah_password');
			}
		 } 
		}
	}

	 
}


/* End of file  */
/* Location: ./application/controllers/ */