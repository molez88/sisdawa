<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function index()
	{
		$data['kembali']= FALSE;
		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}

		$data['user'] = $this->Users_model->getUsers()->result_array();

		$data['judul'] = 'Data Users';
		$property['konten'] = $this->load->view('users/view',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function tambahusers()
	{

		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$data['kembali']= FALSE;
		$data['judul'] = 'Form Tambah User';

		$this->form_validation->set_rules('username', 'username','required');
		// $this->form_validation->set_rules('email', 'email','required|is_unique');
		if ($this->form_validation->run() == FALSE) {
			$property['konten'] = $this->load->view('users/input',$data,TRUE);
			$this->load->view('template',$property);
		} else {
			$this->Users_model->users_input();
			redirect('users','refresh');
		}
	}
	public function hapususer($id)
	{
		$this->Users_model->user_hapus($id);
		redirect('users','refresh');
	}

	// public function editusers($id=0)
	// {
	// 	if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
	// 		echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
	// 		redirect('users/login','refresh');
	// 	}
	// 	$data['judul'] = 'Form Edit User';


	// 	$this->form_validation->set_rules('username', 'username','required');
	// 	// $this->form_validation->set_rules('email', 'email','required|is_unique');
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data['user_id'] = $this->Users_model->getUserId($id);
	// 		$property['konten'] = $this->load->view('users/edit',$data,TRUE);
	// 		$this->load->view('template',$property);
	// 	} else {
	// 		$this->Users_model->users_edit($id);
	// 		redirect('users','refresh');
	// 	}
	// }
	
	public function profile($username='')
	{
		$data['kembali']= FALSE;
		$data['judul'] = 'Profile User';
		$data['users'] = $this->Users_model->user_profile($username);
		$property['konten'] = $this->load->view('users/profile', $data, TRUE);
		$this->load->view('template', $property);
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
		// session_unset('username');
		// session_unset('nama');
		// session_unset('foto');
		// session_unset('level');
		$this->session->sess_destroy();

		redirect('users/login',TRUE);
	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */