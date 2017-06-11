<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Users_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			redirect('users/login','refresh');
		}

		$data['user'] = $this->Users_model->getUsers()->result_array();

		$data['judul'] = 'Data Users';
		$property['konten'] = $this->load->view('users/view',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function tambahusers()
	{
		$data['judul'] = 'Form Tambah User';

		$this->form_validation->set_rules('username', 'username','required|is_unique');
		$this->form_validation->set_rules('password', 'password','required');
		$this->form_validation->set_rules('nama', 'nama','required');
		$this->form_validation->set_rules('email', 'email','required');
		if ($this->form_validation->run() == FALSE) {
			$property['konten'] = $this->load->view('users/input',$data,TRUE);
			$this->load->view('template',$property);
		} else {
			$this->Transaksi_model->transaksi_input();
			redirect('transaksikelas','refresh');
		}
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
						'level' => $data->level,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($user_data);
				}
				redirect('home','refresh');
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
		//$this->session->sess_destroy();

		redirect('users/login','refresh');
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */