<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksikelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$this->load->model('Transaksi_model');
		$this->load->helper('tanggal');

	}

	public function index()
	{
		$data['kembali']= FALSE;
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
		$data['kembali']= FALSE;
		$data['judul'] = 'Form Transaksi Kelas';
		$data['kelas'] = $this->Transaksi_model->getKelas()->result_array();
		$data['siswa'] = $this->Transaksi_model->getSiswa()->result_array();
		$data['th_akademik'] = $this->Transaksi_model->getThakademik()->result_array();

		$this->form_validation->set_rules('nis', 'nis','required');
		$this->form_validation->set_rules('id_kelas', 'id_kelas','required');
		$this->form_validation->set_rules('id_th_akademik', 'id_th_akademik','required');
		if ($this->form_validation->run() == FALSE) {
			$property['konten'] = $this->load->view('transaksi/input',$data,TRUE);
			$this->load->view('template',$property);
		} else {
			$this->Transaksi_model->transaksi_input();
			$this->session->set_flashdata('insert_transaksi', 'Kenaikan kelas berhasil ditambahkan');
			redirect('transaksikelas','refresh');
		}
	}

	public function hapus($id)
	{
		$this->Transaksi_model->hapus($id);
		$this->session->set_flashdata('delete_transaksi', 'Kenaikan kelas berhasil dihapus');
		redirect('Transaksikelas','refresh');
	}

}

/* End of file Transaksikelas.php */
/* Location: ./application/controllers/Transaksikelas.php */