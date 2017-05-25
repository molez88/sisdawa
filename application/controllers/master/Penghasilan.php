<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penghasilan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			redirect('users/login','refresh');
		}
		$this->load->model('Penghasilan_model');
	}

	public function index()
	{
		$data['judul'] = 'Data Penghasilan';
		$property['konten'] = $this->load->view('master/penghasilan',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function list_penghasilan()
	{
		$list = $this->Penghasilan_model->get_datatables();
		$data = array();
		$no = $_POST['start']+1;
		foreach ($list as $penghasilan) {
			$row = array();
			$row[]= $no++ . '.';
			$row[] = $penghasilan->penghasilan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_penghasilan('."'".$penghasilan->id_penghasilan."'".')"><i class="glyphicon glyphicon-edit"></i> Edit</a> || &nbsp<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_penghasilan('."'".$penghasilan->id_penghasilan."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Penghasilan_model->count_all(),
						"recordsFiltered" => $this->Penghasilan_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function editPenghasilan($id)
	{
		$data = $this->Penghasilan_model->get_by_id($id);
		echo json_encode($data);
	}

	public function addPenghasilan()
	{
		$this->_validate();
		$data = array(
				'penghasilan' => $this->input->post('penghasilan'),
			);
		$insert = $this->Penghasilan_model->savePenghasilan($data);
		echo json_encode(array("status" => TRUE));
	}

	public function updatePenghasilan(){
		$this->_validate();
		$data = array(
			'penghasilan' => $this->input->post('penghasilan')
		);
		$this->Penghasilan_model->updatePenghasilan(array('id_penghasilan' => $this->input->post('id_penghasilan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deletePenghasilan($id)
	{
		$this->Penghasilan_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('penghasilan') == '')
		{
			$data['inputerror'][] = 'penghasilan';
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

/* End of file Penghasilan.php */
/* Location: ./application/controllers/Penghasilan.php */