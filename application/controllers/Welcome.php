<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data['judul']='Dashboard';
		$property['konten']=$this->load->view('master/dashboard',$data,true);
		$this->load->view('welcome_message', $property);
	}
}
