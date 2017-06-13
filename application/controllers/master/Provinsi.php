<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$this->load->model('My_models');
		
	}

	public function index()
	{

		$data['result'] = $this->My_models->selectProvinsi()->result_array();
		$data['judul']='<small>Data</small> <strong>Provinsi</strong>';
		$property['konten']=$this->load->view('master/provinsi',$data,true);
		$this->load->view('welcome_message', $property);
	}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/Lokasi.php */