<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUsers()
	{
		// $this->db->order_by('id', 'desc');
		return $this->db->query('SELECT * FROM user ORDER BY level ASC');
	}
	public function getUserId($id)
	{
		return $this->db->get_where('user', array('id' => $id))->row_array();
	}

	//login
	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user');
	}

	public function users_input()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level')
			);
		return $this->db->insert('user', $data);
	}

	public function user_hapus($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('user');
	}
	// public function users_edit($id)
	// {
	// 	$id=$this->input->post('id');
	// 	$data = array(
	// 			'username' => $this->input->post('username'),
	// 			'password' => md5($this->input->post('password')),
	// 			'nama' => $this->input->post('nama'),
	// 			'email' => $this->input->post('email'),
	// 			'level' => $this->input->post('level')
	// 		);
	// 	$this->db->where('id', $id);
	// 	return $this->db->update('user', $data);
	// }

	public function user_profile($username)
	{
		return $this->db->get_where('user', array('username' => $username))->row_array();
	}
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */