<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Users_model');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		}else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$cek = $this->Users_model->login($username, $password);

			if ($cek->num_rows() == 1) {
				foreach($cek->result() as $data){
					$user_data = array(
						'username' => $data->username,
						'nama' => $data->nama,
						'foto' => $data->foto,
						'level' => $data->level,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($user_data);
				}
				redirect('welcome','refresh');
			}else{
				$this->session->set_flashdata('gagal_login', 'Kombinasi Username dan Password salah');
				redirect('users/login');
			}
		}
		
	}
	public function logout()
	{
		session_unset('username');
		session_unset('nama');
		session_unset('foto');
		session_unset('level');

		redirect('users/login','refresh');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */