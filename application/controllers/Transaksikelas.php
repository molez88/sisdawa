<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksikelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		$this->load->helper('tanggal');
	}

	public function index()
	{
		$data['judul'] = 'Transaksi Kelas Siswa';

		$data['kelas'] = $this->Transaksi_model->getKelas();
		$data['thakademik'] = $this->Transaksi_model->getThakademik();

		$kelas = $this->input->post('kelas');
		$thakademik = $this->input->post('th_akademik');
		
		$data['transaksi'] = $this->Transaksi_model->semuatransaksi($kelas,$thakademik)->result_array();

		$property['konten'] =$this->load->view('transaksi/view', $data, TRUE);
		$this->load->view('template', $property);
	}

	public function tambahtransaksi()
	{
		$data['judul'] = 'Form Transaksi Kelas';
		$data['kelas'] = $this->Transaksi_model->getKelas()->result_array();
		$data['siswa'] = $this->Transaksi_model->getSiswa()->result_array();
		$data['th_akademik'] = $this->Transaksi_model->getThakademik()->result_array();

		$this->form_validation->set_rules('nisn', 'nisn','required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas','required');
		$this->form_validation->set_rules('id_th_akademik', 'id_th_akademik','required');
		if ($this->form_validation->run() == FALSE) {
			$property['konten'] = $this->load->view('transaksi/input',$data,TRUE);
			$this->load->view('template',$property);
		} else {
			$this->Transaksi_model->transaksi_input();
			redirect('transaksikelas','refresh');
		}
	}

}

/* End of file Transaksikelas.php */
/* Location: ./application/controllers/Transaksikelas.php */