<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Users_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('users/login','refresh');
		}

		$data['judul'] = 'Data Users';
		$property['konten'] = $this->load->view('users',$data,TRUE);
		$this->load->view('template',$property);
	}
	public function list_users()
	{
		$users = $this->Users_model->get_datatables();
		$data = array();
		$no = $_POST['start'] + 1;
		foreach ($users as $user) {
			$row = array();
			$row[] = $no++.'.';
			$row[] = '<a href="'.base_url('assets/img/users/'.$user->foto).'" target="_blank"><img src="'.base_url('assets/img/users/'.$user->foto).'" class="img-responsive" height="100px" width="100px"/></a>';
			$row[] = $user->username;
			$row[] = $user->password;
			$row[] = $user->nama;
			$row[] = $user->email;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$user->id."'".')"><i class="glyphicon glyphicon-edit"></i> Edit</a>||
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Users_model->count_all(),
						"recordsFiltered" => $this->Users_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
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