<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			redirect('users/login','refresh');
		}
	}

	public function index()
	{
		$data['kembali']= FALSE;
		$data['judul']='Dashboard';
		$property['konten']=$this->load->view('home',$data,true);
		$this->load->view('template', $property);
	}
}
