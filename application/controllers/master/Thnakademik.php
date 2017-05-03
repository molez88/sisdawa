<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thnakademik extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Thnakademik_model');
	}

	public function index()
	{
		$data['judul'] = 'Data Tahun Akademik';
		$property['konten'] = $this->load->view('master/thnakademik',$data,TRUE);
		$this->load->view('template',$property);
	}

	public function list_thnakademik()
	{
		$list = $this->Thnakademik_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$numb = 1;
		foreach ($list as $thnakademik) {
			$no++;
			$row = array();
			$row[]= $numb++ . '.';
			$row[] = $thnakademik->th_ajaran;
			$row[] = $thnakademik->keterangan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_thnakademik('."'".$thnakademik->id_th_akademik."'".')"><i class="glyphicon glyphicon-edit"></i></a> ||
				  &nbsp<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_thnakademik('."'".$thnakademik->id_th_akademik."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Thnakademik_model->count_all(),
						"recordsFiltered" => $this->Thnakademik_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function editThnakademik($id)
	{
		$data = $this->Thnakademik_model->get_by_id($id);
		echo json_encode($data);
	}

	public function addThnakademik()
	{
		$this->_validate();
		$data = array(
				'th_ajaran' => $this->input->post('th_ajaran'),
				'keterangan' => $this->input->post('keterangan')
			);
		$insert = $this->Thnakademik_model->saveThnakademik($data);
		echo json_encode(array("status" => TRUE));
	}

	public function updateThnakademik(){
		$this->_validate();
		$data = array(
			'th_ajaran' => $this->input->post('th_ajaran'),
			'keterangan' => $this->input->post('keterangan')
		);
		$this->Thnakademik_model->updateThnAkademik(array('id_th_akademik' => $this->input->post('id_th_akademik')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deleteThnakademik($id)
	{
		$this->Thnakademik_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('th_ajaran') == '')
		{
			$data['inputerror'][] = 'th_ajaran';
			$data['error_string'][] = 'Harus diisi';
			$data['status'] = FALSE;
		}
		if($this->input->post('keterangan') == '')
		{
			$data['inputerror'][] = 'keterangan';
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

/* End of file Thnkakademik.php */
/* Location: ./application/controllers/Thnkakademik.php */