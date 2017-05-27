<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUsers()
	{
		// $this->db->order_by('id', 'desc');
		$this->db->select('username, nama, email, level');
		return $this->db->get('user');
	}

	//login
	public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user');
	}

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */