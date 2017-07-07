<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agama extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$this->load->model('Agama_model');
	}

	public function index()
	{
		$data['kembali']= FALSE;
		$data['judul'] = 'Data Agama';
		$property['konten'] = $this->load->view('master/agama',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function list_agama()
	{
		$list = $this->Agama_model->get_datatables();
		$data = array();
		$no = $_POST['start']+1;
		foreach ($list as $agama) {
			$row = array();
			$row[]= $no++ . '.';
			$row[] = $agama->agama;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void()" title="Edit" onclick="edit_agama('."'".$agama->id_agama."'".')"><i class="fa fa-edit"></i> Edit</a> || &nbsp<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_agama('."'".$agama->id_agama."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Agama_model->count_all(),
						"recordsFiltered" => $this->Agama_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function editAgama($id)
	{
		
		$data = $this->Agama_model->get_by_id($id);
		echo json_encode($data);
	}

	public function addAgama()
	{
		$this->_validate();
		$data = array(
				'agama' => $this->input->post('agama'),
			);
		$insert = $this->Agama_model->saveAgama($data);
		echo json_encode(array("status" => TRUE));
	}

	public function updateAgama(){
		$this->_validate();
		$data = array(
			'agama' => $this->input->post('agama')
		);
		$this->Agama_model->updateAgama(array('id_agama' => $this->input->post('id_agama')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deleteAgama($id)
	{
		$this->Agama_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('agama') == '')
		{
			$data['inputerror'][] = 'agama';
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

/* End of file Agama.php */
/* Location: ./application/controllers/Agama.php */