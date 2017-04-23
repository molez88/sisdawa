<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('My_models');
	}

	public function index(){
		$data['result'] = $this->My_models->selectKelas()->result_array();
		$data['judul']='<small>Data</small> <strong>Kelas</strong>';
		$property['konten']=$this->load->view('master/kelas',$data,true);
		$this->load->view('welcome_message', $property);
	}

	public function addKelas()
	{
		$data = array(
			'kelas' => $this->input->post('kelas')
		);
		$insert = $this->My_models->addKelas($data);
		echo json_encode(array("status" => TRUE));
	}

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */