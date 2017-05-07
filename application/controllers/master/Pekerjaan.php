<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pekerjaan_model');
	}

	public function index()
	{
		$data['judul'] = 'Data Pekerjaan';
		$property['konten'] = $this->load->view('master/pekerjaan',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function list_pekerjaan()
	{
		$list = $this->Pekerjaan_model->get_datatables();
		$data = array();
		$no = $_POST['start']+1;
		foreach ($list as $pekerjaan) {
			$row = array();
			$row[]= $no++ . '.';
			$row[] = $pekerjaan->nama_pekerjaan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_pekerjaan('."'".$pekerjaan->id_pekerjaan."'".')"><i class="glyphicon glyphicon-edit"></i> Edit</a> || &nbsp<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_pekerjaan('."'".$pekerjaan->id_pekerjaan."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Pekerjaan_model->count_all(),
						"recordsFiltered" => $this->Pekerjaan_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function editPekerjaan($id)
	{
		$data = $this->Pekerjaan_model->get_by_id($id);
		echo json_encode($data);
	}

	public function addPekerjaan()
	{
		$this->_validate();
		$data = array(
				'nama_pekerjaan' => $this->input->post('pekerjaan'),
			);
		$insert = $this->Pekerjaan_model->savePekerjaan($data);
		echo json_encode(array("status" => TRUE));
	}

	public function updatePekerjaan(){
		$this->_validate();
		$data = array(
			'nama_pekerjaan' => $this->input->post('pekerjaan')
		);
		$this->Pekerjaan_model->updatePekerjaan(array('id_pekerjaan' => $this->input->post('id_pekerjaan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deletePekerjaan($id)
	{
		$this->Pekerjaan_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('pekerjaan') == '')
		{
			$data['inputerror'][] = 'pekerjaan';
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

/* End of file Pekerjaan.php */
/* Location: ./application/controllers/Pekerjaan.php */