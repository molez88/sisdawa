<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$this->load->model('Pendidikan_model');
	}

	public function index()
	{
		$data['kembali']= FALSE;
		$data['judul'] = 'Data Pendidikan';
		$property['konten'] = $this->load->view('master/pendidikan',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function list_pendidikan()
	{
		$list = $this->Pendidikan_model->get_datatables();
		$data = array();
		$no = $_POST['start'] + 1;
		foreach ($list as $pendidikan) {
			$row = array();
			$row[] = $no++ .'.';
			$row[] = $pendidikan->nama_pendidikan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void()" title="Edit" onclick="edit_pendidikan('."'".$pendidikan->id_pendidikan."'".')"><i class="fa fa-edit"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_pendidikan('."'".$pendidikan->id_pendidikan."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Pendidikan_model->count_all(),
						"recordsFiltered" => $this->Pendidikan_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->Pendidikan_model->get_by_id($id);
		echo json_encode($data);
	}

	public function addPendidikan()
	{
		$this->_validate();
		$data = array(
				'nama_pendidikan' => $this->input->post('pendidikan')
			);
		$insert = $this->Pendidikan_model->savePendidikan($data);
		echo json_encode(array("status" => TRUE));
	}

	public function updatePendidikan()
	{
		$this->_validate();
		$data = array(
			'nama_pendidikan' => $this->input->post('pendidikan')
		);
		$this->Pendidikan_model->updatePendidikan(array('id_pendidikan' => $this->input->post('id_pendidikan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deletePendidikan($id)
	{
		$this->Pendidikan_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('pendidikan') == '')
		{
			$data['inputerror'][] = 'pendidikan';
			$data['error_string'][] = 'Harus diisi';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}
