<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE || $this->session->userdata('level') != 'admin') {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$this->load->model('Kelas_model');
	}

	public function index()
	{
		$data['kembali']= FALSE;
		$data['judul'] = 'Data Kelas';
		$property['konten'] = $this->load->view('master/kelas',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function list_kelas()
	{
		$list = $this->Kelas_model->get_datatables();
		$data = array();
		$no = $_POST['start']+1;
		foreach ($list as $kelas) {
			$row = array();
			$row[]= $no++ . '.';
			$row[] = $kelas->nm_kelas;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-info" href="javascript:void()" title="Edit" onclick="edit_kelas('."'".$kelas->id_kelas."'".')"><i class="fa fa-edit"></i> Edit</a> || &nbsp<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kelas('."'".$kelas->id_kelas."'".')"><i class="fa fa-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Kelas_model->count_all(),
						"recordsFiltered" => $this->Kelas_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function editKelas($id)
	{
		$data = $this->Kelas_model->get_by_id($id);
		echo json_encode($data);
	}

	public function addKelas()
	{
		$this->_validate();
		$data = array(
				'nm_kelas' => $this->input->post('kelas'),
			);
		$insert = $this->Kelas_model->saveKelas($data);
		echo json_encode(array("status" => TRUE));
	}

	public function updateKelas(){
		$this->_validate();
		$data = array(
			'nm_kelas' => $this->input->post('kelas')
		);
		$this->Kelas_model->updateKelas(array('id_kelas' => $this->input->post('id_kelas')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deleteKelas($id)
	{
		$this->Kelas_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('kelas') == '')
		{
			$data['inputerror'][] = 'kelas';
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

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */